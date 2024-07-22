<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/reg_log_authcontroller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/registers.css">
</head>
<body>
    <div class="nav-bar">
        <nav>
            <a href="index.php"><img src="images/logo.png" class="logo"></a>
            <ul>
                
                <li><marquee behavior="repeate" direction="left">WELCOME TO YOUNG COACH AND HOPE YOU ENJOY OUR SERVICES</marquee></li>
                
            </ul>
            <div class="reg-nav">
                <a href="login.php" class="reg-btn">LOG IN</a>
                <a href="register.php" class="reg-btn">SIGN UP</a>
            </div>
        </nav>
        
        
    </div>
    <div class="prof">
        <div class="container">
            <h2>Registration Form</h2>
            <p>Hello! Welcome to young travel community</p>
            
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" placeholder="Type your first name">
                    <?php if (isset($errors['firstname'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['firstname']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>    
                <div class="form-group">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" id="middlename" name="middlename" value="<?php echo $middlename; ?>" placeholder="Type your middle name">
                    <?php if (isset($errors['middlename'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['middlename']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>   
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" placeholder="Type your last name">
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
                    <input type="text" id="id/passport" name="idpassport" value="<?php echo $idpassport; ?>" placeholder="Type your ID/Passport">
                    <?php if (isset($errors['idpassport'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['idpassport']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>  
                <div class="form-group">  
                    <label for="phonenumber">Phone number:</label>
                    <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>" placeholder="Type your Phone number">
                    <?php if (isset($errors['phonenumber'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['phonenumber']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>    
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email address">
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['email']; ?></li>
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
                    <button type="submit" name="register-btn">Register</button>
                </div>  
                <div class="form-group"></div>
                    <p>Already have an account?<a href="login.php">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
<footer>
    <div class="head">
        <h3>Have a Margical Experience</h3>
    </div>
    <div class="cont">
        <img src="images/logo.png" class="logo">
        <div class="our-comp">
            <h3>Our Company</h3>
            <a href="aboutus.php">About Us</a>
            <a href="contactus.php">Contact Us</a>
            <a href="terms&cods.pdf">Terms & Conditions</a>
            <a href="privacy.txt">Privacy Policy</a>
        </div>
        <div class="our-conta">
            <div class="numbers">
                <h3>Our Contacts</h3>
                <a href="tel:+254794178635">0794178635</a>
                <a href="tel:+254716258345">0716258345</a>
                <a href="tel:+254782416883">0782416883</a>
            </div>
            <div class="emails">
                <h3>Email</h3>
                <a href="mailto:petersila2022@gmail.com">petersila2022@gmail.com</a>
                <a href="mailto:petersilakioko@gmail.com">petersilakioko@gmail.com</a>
            </div>

        </div>
        <div class="top-routes">
            <h3>Top Routes</h3>
            <p>This is our top routes</p>
        </div>
    </div>
</footer>
</html>
