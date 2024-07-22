<?php

session_start();

require 'connect/db_connect.php';
require_once 'emailcontrol.php';

$errors = array();
$firstname = "";
$middlename = "";
$lastname = "";
$gender = "";
$idpassport = "";
$phonenumber = "";
$email = "";
$password = "";

// if user clicks on register button
if (isset($_POST['register-btn'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $idpassport = $_POST['idpassport'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    // validating entered details in the form
    if (empty($firstname)) {
        $errors['firstname'] = "First name required";
    }
    if (empty($middlename)) {
        $errors['middlename'] = "Middle name required";
    }
    if (empty($lastname)) {
        $errors['lastname'] = "Last name required";
    }
    if (empty($gender)) {
        $errors['gender'] = "Select a gender";
    }
    if (empty($idpassport)) {
        $errors['idpassport'] = "ID/Passport required";
    } else {
        if (strlen($idpassport) < 8) {
            $errors['idpassport'] = "Id or Passport must be at least 8 characters long";
        }
    }
    if (empty($phonenumber)) {
        $errors['phonenumber'] = "Phone number required";
    } else {
        if (!preg_match('/^(07|01|\+2541|\+2547)/', $phonenumber)) {
            $errors['phonenumber'] = "Phone number must start with 07, 01, +2541, or +2547";
        }
        if (strlen($phonenumber) < 10) {
            $errors['phonenumber'] = "Phone number must be at least 10 characters long";
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    } else {
        if (strlen($password) < 8) {
            $errors['password'] = "Password must be at least 8 characters long";
        } elseif (!preg_match('/[A-Za-z]/', $password)) {
            $errors['password'] = "Password must include at least one letter";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "Password must include at least one number";
        } elseif (!preg_match('/[\W_]/', $password)) {
            $errors['password'] = "Password must include at least one special character";
        }
    }
    if ($password !== $confpassword) {
        $errors['password'] = "The two passwords do not match";
    }

    $query_email = "SELECT * FROM users WHERE email=? LIMIT 1";
    $user_st = $conn->prepare($query_email);
    $user_st->bind_param('s', $email);
    $user_st->execute();
    $result = $user_st->get_result();
    $userCount  = $result->num_rows;
    $user_st->close();

    if ($userCount > 0) {
        $errors['email'] = "Email address already exists";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';
        $token  = bin2hex(random_bytes(20));
        $verified = false;

        $sql = "INSERT INTO users (firstname, middlename, lastname, phonenumber, idpassport, email, gender, role, 
        password, verified, token) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssis', $firstname, $middlename, $lastname, $phonenumber, $idpassport, $email, $gender, $role, 
        $password, $verified, $token);
        
        if ($stmt->execute()) {
            // if executed successfully, log in user
            $user_id = $conn->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['phonenumber'] = $phonenumber;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            // sending email to the registered user
            sendVerificationEmail($email, $token);

            // welcome message
            $_SESSION['message'] = "You are logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: home.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    }
}

// when user logs in
if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validating entered details in the form
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $userCount  = $result->num_rows;

    if ($userCount > 0) {
        $errors['email'] = "Email address already exists";
    }

    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] === 'user') {
            // login success
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phonenumber'] = $user['phonenumber'];
            $_SESSION['verified'] = $user['verified'];

            // welcome message
            $_SESSION['message'] = "You are logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: home.php');
            exit();
        } else if ($user['role'] === 'admin') {
            // login success
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['verified'] = $user['verified'];

            // welcome message
            $_SESSION['message'] = "You are logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: admin/index.php');
            exit();
        }
        
    } else {
        $errors['login_fail'] = "Wrong credentials";
    }
}

// logging out user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['firstname']);
    unset($_SESSION['phonenumber']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit();
}


// verify user by token
function verifyUser($token) {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $update_query)) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['phonenumber'] = $user['phonenumber'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;

            // welcome message
            $_SESSION['message'] = "Your email address was successfully verified!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: home.php');
            exit();
        }
    } else {
        echo 'User not found';
    }
}

// Recovering user password
if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];

        sendPasswordResetLink($email, $token);

        header('location: successpages/password_message.php');
        exit();
    }
}

// user resetting password
if (isset($_POST['reset-btn'])) {
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    if (empty($password)) {
        $errors['password'] = "Password required";
    } else {
        if (strlen($password) < 8) {
            $errors['password'] = "Password must be at least 8 characters long";
        } elseif (!preg_match('/[A-Za-z]/', $password)) {
            $errors['password'] = "Password must include at least one letter";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "Password must include at least one number";
        } elseif (!preg_match('/[\W_]/', $password)) {
            $errors['password'] = "Password must include at least one special character";
        }
    }
    if ($password !== $confpassword) {
        $errors['password'] = "The two passwords do not match";
    }

    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $email = $_SESSION['email'];

        $sql = "UPDATE users SET password=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $password, $email);

        if ($stmt->execute()) {
            header('location: login.php');
            exit();
        }
    }
}

function resetPassword($token) {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password.php');
    exit();
}

?>
