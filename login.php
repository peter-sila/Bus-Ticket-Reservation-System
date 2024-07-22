<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/reg_log_authcontroller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            <h2>Login Form</h2>
            <p>Hello! Welcome back</p>
            <?php if (isset($errors['login_fail'])): ?>
                <div class="alert alert-danger">
                    <li><?php echo $errors['login_fail']; ?></li>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>" name="email">
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['email']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <?php if (isset($errors['password'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['password']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="login-btn" class="login-btn">Login</button>
                </div>
                    
                    <p class="reg-nav" >Don't have an account? <a href="register.php">Sign Up</a></p>

                <div class="f-pass">
                    <a href="forgotpassword.php">Forgotten Password?</a>
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
