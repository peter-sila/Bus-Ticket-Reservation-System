<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/reg_log_authcontroller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
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
            <h2>Reset Password</h2>
        
            <?php
            if (count($errors) > 0):
            ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <form action="reset_password.php" method="post">
                <div class="form-group">
                    <label for="password">Enter password:</label>
                    <input type="password" id="password" name="password" >
                </div>
                <div class="form-group">
                    <label for="confpassword">Confirm Password:</label>
                    <input type="password" id="confpassword" name="confpassword" >
                </div>
                <div class="form-group">
                    <button type="submit" name="reset-btn" class="reset-btn">Reset Password</button>
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
