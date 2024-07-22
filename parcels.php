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
    <title>Send Parcels</title>
    
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
            <h1>YOUNG TRAVEL COURIER TARRIFFS</h1>
            <p>Welcome to Young Coach couriers, we deliver your pacels and goods <br>
            safely and with proper handling by our experinced transporeters. <br>Your 
            goods are in safe hands.</p>
        </div>
    </div>
    <div class="parcels">
        <div class="parcel-intro">
            <h1>Letters and Parcels Courier Services</h1>
            <p> At our Letters and Parcels Courier Services Division, <br>we courier Medium Sized Parcels, Letters and Documents to each of the over 30 branches<br>
            where we have a presence. We take utmost care in ensuring that our customer's letters and<br> parcels reach the intended destinations in time, secure and in good condition. <br> 
            We package the letters and parcels in security tamper proof bags while on transit. <br> Our delivery time for all letters and parcels is same day and/or within 24 hours.<br></p>
        </div>
        
        <div class="courier-charges">
            <div class="title">
                <h2>1) Courier Charges Guide</h2>
                
            </div>
            <table>
                <tr>
                    <th class="c1">SIZES</th>
                    <th class="c2">AMOUNT</th>
                </tr>
                <tr>
                    <td >Small Envelopes</td>
                    <td >250</td>
                </tr>
                <tr>
                    <td >Big Envelopes with Documents</td>
                    <td >300</td>
                </tr>
                <tr>
                    <td >To Kampala</td>
                    <td >450</td>
                </tr>
                <tr>
                    <td >To Tanzania</td>
                    <td >450</td>
                </tr>
                
            </table>
        </div>
        <div class="parcel-charges">
            <div class="title">
                <h2>2) PARCELS (SIZES, WEIGHT, VOLUME, AMOUNT):</h2>
                
            </div>
            <table>
                <tr>
                
                    <th class="p1">VOLUME</th>
                    <th class="p2">KSH. 200.00 - 700.00</th>

                </tr>
                <tr>
                    <td>0-7 Kgs</td>
                    <td>KSH. 300.00</td>
                </tr>
                <tr>
                    <td>8-10 Kgs</td>
                    <td>KSH. 350.00</td>
                </tr>
                <tr>
                    <td>11-15 Kgs</td>
                    <td>KSH. 450.00</td>
                </tr>
                <tr>
                    <td>16-19 Kgs</td>
                    <td>KSH. 500.00</td>
                </tr>
                <tr>
                    <td>20-25 Kgs</td>
                    <td>KSH. 600.00</td>
                </tr>
                
            </table>
        </div>
        <div class="more">
            <p>All above rates are inclusive of value added tax (V.A.T) <br><br>
            30kgs and Above -> Kshs 30/= @ Kg inclusive of V.A.T</p>
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