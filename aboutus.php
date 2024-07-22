<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/reg_log_authcontroller.php';

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
    <title>About Us</title>
    <link rel="stylesheet" href="css/styless.css">
</head>
<body>
    <div class="backimage">
        <!-- navigation bar -->
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

        <!-- body area starts here -->
        <div class="hero">
            <h1>YOUNG TRAVEL Ltd</h1>
            <p>Get to know more about Young Coach, as its the leading <br> sacco in offering transport 
            services in East Africa</p>

        </div>
    </div>
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
    
    <div class="about-us">
        <div class="title">
            <h1>About Us</h1>
        </div>
        <div class="aboutus-desc">
            <section class="sec">
                <div class="about-img">
                    <img src="images/background.jpeg" alt="">
                </div>
                <div class="describe">
                    <h4>Youngtravel LTD</h4>
                    <p>Youngcoach LTD is a leading transport company in Kenya and East Africa that
                        provides reliable, comfortable, and affordable bus services to travelers 
                        across the country. Established in 2015, Youngcoach has grown to become one 
                        of the most trusted and preferred bus operators in Kenya, serving thousands 
                        of customers every day.
                    </p>
                    <p>
                        At Youngcoach, we believe that traveling should be a hassle-free and enjoyable 
                        experience. That's why we strive to provide our customers with high-quality 
                        services that meet their needs and exceed their expectations. Whether you're 
                        traveling for business, leisure, or any other purpose, you can count on 
                        Youngcoach to get you to your destination safely and comfortably.
                    </p>
                    <p>
                        Thank you for choosing Youngcoach LTD for your travel
                    </p>
                </div>
            </section>
        </div>
    </div>
    
    <div class="about-nums">
        <div class="title">
            <h1>Our Numbers Say Everything</h1>
        </div>
        <div class="nums">
            <div class="us">
                <h2>20+</h2>
                <p>Buses</p>
            </div>
            <div class="us">
                <h2>80+</h2>        
                <p>Destinations</p>
            </div>
            <div class="us">
                <h2>5 Million+</h2>
                <p>Bookings and Counting</p>
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
