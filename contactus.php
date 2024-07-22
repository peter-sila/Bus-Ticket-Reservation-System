<?php

//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/bookcontroller.php';

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
    <title>Contact Us</title>
    
    <link rel="stylesheet" href="css/styless.css">
</head>
<body>
    <div class="backimage">
        <div class="nav-bar">
            <nav>
                <a href="home.php"><img src="images/logo.png" class="logo"></a>
                <ul>
                    <li><a href="home.php"><b>Home</b></a></li>
                    <li><a href="parcels.php"><b>Parcels</b></a></li>
                    <li><a href="contactus.php"><b>Contact Us</b></a></li>
                    <li><a href="aboutus.php"><b>About Us</b></a></li>
                    <li><a href="booking_hist.php"><b>My Bookings</b></a></li>
                </ul>
                <div class="reg-nav">
                    <a href="profile.php"><img  class="profile" src="images/user.png"></a>
                    <button class="log-btn"><a href="index.php?logout=1" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </nav>
            
            
        </div>
        <div class="hero">
            <h1>Contact Us</h1>
            <p>Welcome, feel free to ask any question below and we will get to you as soon as possible. <br>
            Always welcomed to Young Coach for Queries and feedbacks.</p>
        </div>
    </div>
    <div class="cont-mess">
        <div class="message">
            
            <?php
                if (isset($_SESSION['success_send'])) {
            ?>
            <div class="alert-success">
                <?php
                    echo $_SESSION['success_send'];
                ?>
            </div>
            <?php
                unset($_SESSION['success_send']);
                } else {
                if (isset($_SESSION['error_send'])) {
            ?>
            <div class="alert-error">
                <?php
                    echo $_SESSION['error_send'];
                ?>
            </div>
            <?php
                unset($_SESSION['error_send']);
                }
                }
            ?>
            <h4>We'd love to hear from you</h4>
            <p>
                Send us a message here and we will respond as soon as possible
            </p>
            <p>
                Need to cancel or change your ticket? Email our team on 
                <a href="mailto:petersila2022@gmail.com">cancellationtickets@gmail.com</a>
            </p>
        
            <div class="form">
                <form action="contactus.php" method="post">
                <h3>Still have questions?</h3>
                <div class="two-inp">
                    <div class="nam-ema">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                        <?php if (isset($errors['name'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['name']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="nam-ema">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" placeholder="Email address">
                        <?php if (isset($errors['email'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['email']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <div class="send-mess">
                    <label for="message">Message</label>
                    <input type="text" name="message" id="message" placeholder="Write message">
                    <?php if (isset($errors['message'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['message']; ?></li>
                        </div>
                    <?php endif; ?>
                </div>
               <div class="send-mess-btn">
                    <button type="submit" name="cont-mess-btn">SEND MESSAGE</button>
               </div>
                
                </form>
            </div>
            
        </div>
        <div class="our-contacts">
            <h2>Contact Us</h2>
            
            <div class="c-us">
                <h3>Address</h3>
                <p>Maasai Mall at Tumaini, Rongai</p>
            </div>
            <div class="c-us">
                <h3>Phone</h3>
                <p>Mobile: 0794178635, 0782416883</p>
            </div>
            <div class="c-us">
                <h3>Email</h3>
                <p>support@youngcoach.com</p>
                <p>bookings@youngcoach.com</p>
                <p>parcels@youngcoach.com</p>
                <p>cancellationtickets@youngcoach.com</p>
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