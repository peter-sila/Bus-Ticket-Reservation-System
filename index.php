<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/reg_log_authcontroller.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Young Coach Travellers - Easy Travel</title>
    <link rel="stylesheet" href="css/styless.css">
</head>
<body>
   
<div class="backimage">
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
    <div class="hero">
        <h1 class="anim">Young Coach<br>Travel Easy, Travel Safe</h1>
        <p class="anim">Young Coach is a new public transport to make all travellers comfortable during their <br> journey to different places in the world. You can explore it down below.</p>
        <p class="anim">Experience our NEW ROUTES: <br> Which have great offers for all our customers.</p> <br><br>
        <a href="login.php" class="btn anim"><b>Book Now</b></a>
    </div>
</div>
    <div class="content">
        <h2>Experience Dignity</h2>
        <div class="about">
            <div class="us">
                <div class="title">
                    <h2>Our Vision</h2>
                </div>
            
                <p>To be the leading provider of safe, reliable and affordable transport solutions in Kenya and East Africa</p>
            </div>
            <div class="us">
                <div class="title">
                    <h2>Our Mission</h2>
                </div>
                
                <p>To provide convenient, efficient and comfortable travel experiences for our customers while maintaining the highest levels of safety and reliability</p>
            </div>
            <div class="us">
                <div class="title">
                    <h2>Core-Values</h2>
                </div>
                
                <p>Safety, Reliability Customer Satisfaction Teamwork, Integrity and Professionalism</p>
            </div>
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
            <!-- <a href="aboutus.php">About Us</a>
            <a href="contactus.php">Contact Us</a> -->
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
