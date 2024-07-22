<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once '../controllers/admincontroller.php';

// this checks if a user is logged in and if not it redirects to the login page
if (!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="../css/registers.css">
</head>
<body>
    <div class="prof">
        <div class="container">
        
            <h2>Add New User</h2>
            <?php
                if (isset($_SESSION['success_p'])) {
            ?>
            <div class="alert-success">
                <b><?php
                    echo $_SESSION['success_p'];
                ?></b>
            </div>
            <?php
                unset($_SESSION['success_p']);
                } else {
                if (isset($_SESSION['error_p'])) {
            ?>
            <div class="alert-error">
                <b><?php
                    echo $_SESSION['error_p'];
                ?></b>
            </div>
            <?php
                unset($_SESSION['error_p']);
                }
                }
            ?>
            <form action="newuser.php" method="post">
            <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="" placeholder="Type your first name">
                    <?php if (isset($errors['firstname'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['firstname']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>    
                <div class="form-group">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" id="middlename" name="middlename" value="" placeholder="Type your middle name">
                    <?php if (isset($errors['middlename'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['middlename']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>   
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="" placeholder="Type your last name">
                    <?php if (isset($errors['lastname'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['lastname']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>   
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" >
                        <option value="">Select one</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <?php if (isset($errors['gender'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['gender']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>  
                <div class="form-group">
                    <label for="idpassport">ID/Passport:</label>
                    <input type="text" id="id/passport" name="idpassport" value="" placeholder="Type your ID/Passport">
                    <?php if (isset($errors['idpassport'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['idpassport']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>  
                <div class="form-group">  
                    <label for="phonenumber">Phone number:</label>
                    <input type="text" id="phonenumber" name="phonenumber" value="" placeholder="Type your Phone number">
                    <?php if (isset($errors['phonenumber'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['phonenumber']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>    
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="" placeholder="Enter email address">
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['email']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>  
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="">Select Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <?php if (isset($errors['role'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['role']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>   
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                    <?php if (isset($errors['password'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['password']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>   
                <div class="form-group">
                    <label for="confpassword">Confirm Password:</label>
                    <input type="password" id="confpassword" name="confpassword" placeholder="Confirm password">
                </div>  
                <div class="form-group">
                    <button type="submit" name="new-user-btn"><b>Add User</b></button>
                </div>  
                <div class="form-group"></div>
                    <p>Go back home? <a href="users.php">Home</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
