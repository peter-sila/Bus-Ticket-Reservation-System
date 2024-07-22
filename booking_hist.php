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
    <title>Young Coach Travellers - Easy Travel</title>
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
            <h1 class="anim">Young Coach<br>Travel Easy, Travel Safe</h1>
            <p class="anim">Young Coach take a moment to say thank you for all ways choosing to travel with us
            <br>your safety is our concern.</p>
            <p class="anim">Welcome again and welcome everytime.</p>
            
        </div>
    </div>

    <div class="hist">

        <div class="avail-bus-list">
            
            <table>
                <tr>
                    <th>#Id</th>
                    <th>Date</th>
                    <th>Route</th>
                    <th>No of Seats</th>
                    <th>Booking Code</th>
                    <th>Total Coast</th>
                    
                </tr>
                <?php

                    $u_id = $_SESSION['user_id'];
                    // fetching all booking data from the bookings database 
                    $sql = "SELECT * FROM bookings WHERE userid=$u_id ORDER BY lastupdated DESC";
                    $result = $conn->query($sql);
                    // Output data of each row from database and putting them on the table
                    while($booking_r = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $booking_r["booking_id"] . "</td>";
                        echo "<td>" . $booking_r["bookingdate"] . "</td>";
                        echo "<td>" . $booking_r["scheduleid"] . "</td>";
                        echo "<td>" . $booking_r["numberseats"] . "</td>";
                        echo "<td>" . $booking_r["bookingcode"] . "</td>";
                        echo "<td>" . $booking_r["fare"] . "</td>";
                        echo "</tr>";
                    }
                        
                ?>
            </table>
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
