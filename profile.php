<?php

//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/profile.php';

// this checks if a user is logged in and if not it redirects to the login page

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profiles.css">
</head>
<body>
    <div class="prof">
        <div class="container">
            <h1>User Profile</h1>

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
            
            
            <!-- Profile Information Display -->
            <div class="profile-info active">
                
                <input type="hidden" id="id" name="id" value="<?php  echo $user_id ?>">
                <div class="name">
                    <p><strong>First Name:</strong> <br><br><span id="firstname"><i><?php  echo $firstname ?></i></span></p>
                    <p><strong>Middle Name:</strong> <br><br><span id="middlename"><i><?php  echo $middlename ?></i></span></p>
                </div>
                <div class="name">
                    <p><strong>Last Name:</strong> <br><br><span id="lastname"><i><?php  echo $lastname ?></i></span></p>
                </div>
                <div class="name1">
                    <p><strong>Gender:</strong> <br><br><span id="gender"><i><?php echo $gender ?></i></span></p>
                    <p><strong>ID/Passport:</strong> <br><br><span id="idpassport"><i><?php  echo $idpassport ?></i></span></p>
                </div>
                <div class="name2">
                    <p><strong>Phone Number:</strong> <br><br><span id="phonenumber"><i><?php  echo $phonenumber ?></i></span></p>
                    <p><strong>Email:</strong> <br><br><span id="email"><i><?php  echo $email ?></i></span></p>
                </div>
                
                <div class="buttons">
                    <button class="edit" onclick="toggleEdit(true)">Edit</button>
                </div>
                <div class="form-group">
                    <p>Go back home? <a href="home.php" style="color: purple;"><b>Home</b></a></p>
                </div>
            </div>
            
            <!-- Profile Information Edit Form -->
            <div class="edit-form">
                <form action="profile.php" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php  echo $user_id ?>">
                        <label for="firstname">First Name: <?php  echo $firstname ?></label><br>
                        <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
                        <?php if (isset($errors['firstname'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['firstname']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>    
                    <div class="form-group">
                        <label for="middlename">Middle Name: <?php echo $middlename ?></label><br>
                        <input type="text" id="middlename" name="middlename" value="<?php echo $middlename; ?>">
                        <?php if (isset($errors['middlename'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['middlename']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>   
                    <div class="form-group">
                        <label for="lastname">Last Name: <?php echo $lastname ?></label><br>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                        <?php if (isset($errors['lastname'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['lastname']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender: <?php echo $gender; ?></label><br><br>
                        <select id="gender" name="gender">
                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <?php if (isset($errors['gender'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['gender']; ?></li>
                            </div>
                        <?php endif; ?><br><br>
                    </div>    
                    <div class="form-group">
                        <label for="idpassport">ID/Passport: <?php  echo $idpassport ?></label><br>
                        <input type="text" id="id/passport" name="idpassport" value="<?php echo $idpassport; ?>">
                        <?php if (isset($errors['idpassport'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['idpassport']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>  
                    <div class="form-group">  
                        <label for="phonenumber">Phone number:  <?php  echo $phonenumber ?></label><br>
                        <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>">
                        <?php if (isset($errors['phonenumber'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['phonenumber']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>    
                    <div class="form-group">
                        <label for="email">Email:  <?php  echo $email ?></label><br>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        <?php if (isset($errors['email'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['email']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div> 
                    <div class="buttons">
                        <button class="save" type="submit" name="save">Save</button>
                        <button class="cancel" type="button" onclick="toggleEdit(false)">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        
        
        <script src="javascript/profile.js"></script>
    </div>
</body>
</html>
