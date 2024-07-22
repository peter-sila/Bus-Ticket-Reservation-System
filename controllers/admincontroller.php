<?php

session_start();

require '../connect/db_connect.php';
// require_once 'emailcontrol.php';

$errors = array();
$status = '';

// if user click on add bus button
if (isset($_POST['addbus'])) {
    $busnumber = $_POST['busnumber'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];

    // validating entered details in the form
    if (empty($busnumber)) {
        $errors['busnumber'] = "Bus no required";
    }
    if (empty($capacity)) {
        $errors['capacity'] = "Bus capacity required";
    }
    if (empty($status)) {
        $errors['status'] = "Select status";
    }
    

    if (count($errors) === 0) {

        $insert_bus_sql = "INSERT INTO buses (busnumber, capacity, status) VALUES (?,?,?)";
        $st_sucess = $conn->prepare($insert_bus_sql);
        $st_sucess->bind_param('sis', $busnumber, $capacity, $status);
        
        if ($st_sucess->execute()) {
            
            $_SESSION['success_p'] = "New bus added successfully";
            header('location: #busform');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {

        $_SESSION['error_p'] = "Error adding new bus, Try again: " . $conn->error;
    }

}





// if user click on add location button
if (isset($_POST['addlocation'])) {
    $city = $_POST['city'];
    $county = $_POST['county'];


    // validating entered details in the form
    if (empty($city)) {
        $errors['city'] = "City required";
    }
    if (empty($county)) {
        $errors['county'] = "County required";
    }
   

    if (count($errors) === 0) {

        $loc_sql = "INSERT INTO locations (city, county) VALUES (?,?)";
        $loc_st = $conn->prepare($loc_sql);
        $loc_st->bind_param('ss',$city, $county);
        
        if ($loc_st->execute()) {
            
            $_SESSION['success_p'] = "New location added successfully";
            header('location: locations.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_p'] = "Error adding new location, Try again: " . $conn->error;
    
    }

}





// if user click on add schedules button
if (isset($_POST['addschedule'])) {
    $sdate = $_POST['sdate'];
    $bus = $_POST['bus'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departuretime = $_POST['departuretime'];
    $fare = $_POST['fare'];


    // validating entered details in the form
    if (empty($sdate)) {
        $errors['sdate'] = "schedule date required";
    }
    if (empty($bus)) {
        $errors['bus'] = "Select a bus required";
    }
    if (empty($origin)) {
        $errors['origin'] = "origin required";
    }
    if (empty($destination)) {
        $errors['destination'] = "destination required";
    }
    if (empty($departuretime)) {
        $errors['departuretime'] = "Departuretime required";
    }
    if (empty($fare)) {
        $errors['fare'] = "Fare required";
    }
    
    

    if (count($errors) === 0) {

        $sched_sql = "INSERT INTO schedules (sdate, bus, origin, destination, departuretime, fare) VALUES (?,?,?,?,?,?)";
        $sched_st = $conn->prepare($sched_sql);
        $sched_st->bind_param('sssssd', $sdate, $bus, $origin, $destination, $departuretime, $fare);
        
        if ($sched_st->execute()) {
            
            $_SESSION['success_p'] = "New schedule added successfully";
            header('location: schedules.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_p'] = "Error adding new schedule, Try again: " . $conn->error;
    
    }

}








// if user click on add location button
if (isset($_POST['alocatedriver'])) {
    $driver = $_POST['driver'];
    $bus = $_POST['bus'];


    // validating entered details in the form
    if (empty($driver)) {
        $errors['driver'] = "Driver required";
    }
    if (empty($bus)) {
        $errors['bus'] = "Bus required";
    }
   

    if (count($errors) === 0) {

        $aloc_sql = "INSERT INTO driverallocation (driverid, busid) VALUES (?,?)";
        $aloc_st = $conn->prepare($aloc_sql);
        $aloc_st->bind_param('ii',$driver, $bus);
        
        if ($aloc_st->execute()) {
            $_SESSION['success_p'] = "New driver allocation successfully";
            
            header('location: driverallocation.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_p'] = "Error allocating driver, Try again: " . $conn->error;

    }

}








// if user click on add user button
if (isset($_POST['add-new-user'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $idpassport = $_POST['idpassport'];
    $phonenumber =$_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // validating entered details in the form
    if (empty($firstname)) {
        $errors['firstname'] = "Name required";
    }
    if (empty($middlename)) {
        $errors['middlename'] = "Name required";
    }
    if (empty($lastname)) {
        $errors['lastname'] = "Name required";
    }
    if (empty($gender)) {
        $errors['gender'] = "Gender required";
    }
    if (empty($idpassport)) {
        $errors['idpassport'] = "Id/Passport required";
    }
    if (empty($phonenumber)) {
        $errors['phonenumber'] = "Phonenumber required";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    $check_email_exist = "SELECT * FROM users WHERE email=? LIMIT 1";
    $user_st = $conn->prepare($check_email_exist);
    $user_st->bind_param('s', $email);
    $user_st->execute();

    $result = $user_st->get_result();
    $userCount  = $result->num_rows;
    $user_st->close();

    if ($userCount > 0) {
        $errors['email'] = "Email address already exists";
    }    

    if (count($errors) === 0) {

        $password = password_hash($password,PASSWORD_BCRYPT);
        $token  = bin2hex(random_bytes(20));
        $verified = false;

        $user_sql = "INSERT INTO users (firstname, middlename, lastname, phonenumber, idpassport, email, gender, password, verified, token) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $user_st = $conn->prepare($user_sql);
        $user_st->bind_param('ssssssssis', $firstname, $middlename, $lastname, $phonenumber, $idpassport, $email, $gender, $password, $verified, $token);
        
        
        if ($user_st->execute()) {
            
            $_SESSION['success_p'] = "New user added successfully";
            header('location: users.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        
        $_SESSION['error_p'] = "Error adding new user, Try again: " . $conn->error;
    }

}





// if user click on add driver button
if (isset($_POST['adddriver'])) {
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $idpassport = $_POST['idpassport'];


    // validating entered details in the form
    if (empty($name)) {
        $errors['name'] = "driver name required";
    }
    if (empty($phonenumber)) {
        $errors['phonenumber'] = "driver phonenumber required";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($idpassport)) {
        $errors['idpassport'] = "Idpassport required";
    }
    
    

    if (count($errors) === 0) {

        $driver_sql = "INSERT INTO drivers (name, phonenumber, email, idpassport) VALUES (?,?,?,?)";
        $driver_st = $conn->prepare($driver_sql);
        $driver_st->bind_param('ssss', $name, $phonenumber, $email, $idpassport);
        
        if ($driver_st->execute()) {
            
            $_SESSION['success_p'] = "New driver added successfully";
            header('location: drivers.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_p'] = "Error adding new driver, Try again: " . $conn->error;
    
    }

}

// Searching a user
$user_email = '';


// Check if the form is submitted
if (isset($_POST['search-user'])) {
    // GET input values from the form
    $user_email = $_POST['email'];

    if (empty($user_email)) {
        $errors['email'] = "Email required";
    }

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $user_sgls = "SELECT * FROM users WHERE email = '$user_email' OR user_id = '$user_email'";

        $userresult = $conn->query($user_sgls);
    } else {
        $user_sgls = "SELECT * FROM users LIMIT 10"; // Fetch first ten bookings
    
        $userresult = $conn->query($user_sgls);
    }


}else {
    // Form is not submitted, fetch default schedules (first ten bookings)
    $user_sgls = "SELECT * FROM users LIMIT 10"; // Fetch first ten bookings
    
    $userresult = $conn->query($user_sgls);
}






$date = '';
$customer = '';

// Searching a user booking
// Check if the form is submitted
if (isset($_POST['search-book'])) {
    // Get input values from the form
    $date = $_POST['date'];
    $customer = $_POST['userid'];

    if (empty($date)) {
        $errors['date'] = "Booking date required";
    }
    if (empty($customer)) {
        $errors['customer'] = "User Id required";
    }

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $book_sql = "SELECT * FROM bookings
        WHERE bookingdate = '$date' AND userid = '$customer' ORDER BY bookingdate DESC";
        
        $bookingresult = $conn->query($book_sql);
    } else {
        // Form is not submitted, fetch default schedules (first ten bookings)
        $book_sql = "SELECT * FROM bookings ORDER BY bookingdate DESC LIMIT 10 "; // Fetch first ten bookings
        
        $bookingresult = $conn->query($book_sql);
    }

}else {
    // Form is not submitted, fetch default schedules (first ten bookings)
    $book_sql = "SELECT * FROM bookings ORDER BY bookingdate DESC LIMIT 10"; // Fetch first ten bookings
    
    $bookingresult = $conn->query($book_sql);
    
}





$bcode = '';

// Searching a user booking using booking code
// Check if the form is submitted
if (isset($_POST['search-book-code'])) {
    // Get input values from the form
    $bcode = $_POST['b-code'];

    if (empty($bcode)) {
        $errors['bcode'] = "Booking code required";
    }


    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $book_sql = "SELECT * FROM bookings
        WHERE bookingcode = '$bcode' ORDER BY bookingdate DESC";
        
        $bookingresult = $conn->query($book_sql);
    } else {
        // Form is not submitted, fetch default schedules (first ten bookings)
        $book_sql = "SELECT * FROM bookings ORDER BY bookingdate DESC LIMIT 10 "; // Fetch first ten bookings
        
        $bookingresult = $conn->query($book_sql);
    }

}else {
    // Form is not submitted, fetch default schedules (first ten bookings)
    $book_sql = "SELECT * FROM bookings ORDER BY bookingdate DESC LIMIT 10"; // Fetch first ten bookings
    
    $bookingresult = $conn->query($book_sql);
    
}




// logging out user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['firstname']);
    unset($_SESSION['phonenumber']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    unset($_SESSION['verified']);

    header('location: ../login.php');
    exit();
}



// if admin click on add user button
if (isset($_POST['new-user-btn'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $idpassport = $_POST['idpassport'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    //validating entered details in the form
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


    $check_email_exist = "SELECT * FROM users WHERE email=? LIMIT 1";
    $user_st = $conn->prepare($check_email_exist);
    $user_st->bind_param('s', $email);
    $user_st->execute();
    $result = $user_st->get_result();
    $userCount  = $result->num_rows;
    $user_st->close();

    if ($userCount > 0) {
        $errors['email'] = "Email address already exists";
    }

    if (count($errors) === 0) {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $token  = bin2hex(random_bytes(20));
        $verified = false;

        $insert_user = "INSERT INTO users (firstname, middlename, lastname, gender, phonenumber, idpassport, email, role, 
        password, verified, token) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $user_st = $conn->prepare($insert_user);
        $user_st->bind_param('sssssssssis', $firstname, $middlename, $lastname, $gender, $phonenumber, $idpassport, $email, $role, 
        $password, $verified, $token);
        
        if ($user_st->execute()) {
            // sending email to the registered user
            // sendVerificationEmail($email, $token);

            // welcome message
            $_SESSION['success_p'] = "New user added successfully";
            
            header('location: users.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_p'] = "Error adding new user, Try again: " . $conn->error;
    
    }

}


?>
