<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
// require_once 'controllers/bookcontroller.php';
require_once 'mpesa/payment.php';

// this checks if a user is logged in and if not it redirects to the login page

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}


// defining some variables
$totalseats = $_SESSION['selected_seats_count'];
$seatfare = $_SESSION['selected_fare'];
$totalAmount = $totalseats*$seatfare;

// Store total amount in session variable
$_SESSION['total_amount'] = $totalAmount;

// Trim the departure time to show only hour and minutes
$departureTime = date("H:i a", strtotime($_SESSION['selected_departuretime']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    
    <link rel="stylesheet" href="css/booking.css">
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
        
        <div class="hero">
            <h1>YOUNG TRAVEL Ltd</h1>
            <p>Your final stage of making a booking. Enjoy our services.</p>
        </div>
    </div>
    <!-- Table to display selected seats and total amount -->
    <div class="bdetails">
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
        <div class="person-info">
            <div class="title">
                <h2>1) Booking Information</h2>
            </div>
            <hr>
            <table>
                <tr>
                    <th class="c3">Passanger</th>
                    <th class="c2">Seats Booked</th>
                    <th class="c4">Route</th>
                    <th class="c1">Departure Time</th>
                    <th class="c5">Travel Date</th>
                    <th class="c6">Amount</th>
                </tr>
                <tr>
                    <td class="c3"><?php echo $_SESSION['firstname']; ?></td>
                    <td class="c2"><?php echo $_SESSION['selected_seats_count']; ?></td>
                    <td class="c4"><?php echo $_SESSION['selected_route']; ?></td>
                    <td class="c1"><?php echo $departureTime; ?></td>
                    <td class="c5"><?php echo $_SESSION['schedule_date']; ?></td>
                    <td class="c6"><?php echo $_SESSION['total_amount']; ?></td>
                </tr> 
            </table>

        </div>
        <!-- payment info page where user will use to make payment before completing booking process -->
        <div class="pay-info" id="pay-detail">
            <div class="title">
                <h2>2) Payment Information</h2>
            </div>
            <hr>
            <p>Mpesa number to make payment (Your ticket will be send to this number)</p><br>
           
           
            <p>Please note that once seats are booked and paid for the cannot be changed.</p><br><br>
            <!-- an hidden form which uses values from the sessions and then stores them as booking details in the database -->
            <form action='bookingdetails.php' method='post'>
            <div class="no">
                <label for="mpesano">ENTER M-PESA NUMBER</label><br><br>
                <input type="number" id="mpesano" name="mpesano" placeholder="Enter mpesa no in this format Example: 254712345678 or 254123456789"><br>      
                <?php if (isset($errors['mpesano'])): ?>
                    <div class="alert alert-danger">
                        <li><?php echo $errors['mpesano']; ?></li>
                    </div>
                <?php endif; ?><br><br>
            </div>
            <input type='hidden' name='scheduleid' value='" <?php echo $_SESSION['selected_scheduleid']; ?>  "'>
            <input type='hidden' name='passeger' value='" <?php echo $_SESSION['fullname']; ?>  "'>
            <input type='hidden' name='bus' value='" <?php echo $_SESSION['selected_bus']; ?> "'>
            <input type='hidden' name='phonenumber' value='" <?php echo $_SESSION['phonenumber']; ?> "'>
            <input type='hidden' name='scheduledate' value='" <?php echo $_SESSION['selected_sdate']; ?> "'>
            <input type='hidden' name='route' value='" <?php echo $_SESSION['selected_route']; ?> "'>
            <input type='hidden' name='departuretime' value='" <?php echo $departureTime; ?> "'>
            <input type='hidden' name='numberseats' value='" <?php echo $_SESSION['selected_seats_count']; ?> "'>
            <input type='hidden' name='seats' value='<?php echo implode(', ', $_SESSION['selected_seat_names']); ?>'>
            <input type='hidden' name='totalAmount' value='" <?php echo $_SESSION['total_amount']; ?> "'>
            <input type='hidden' name='paymentstatus' value='" <?php echo $paymentstatus; ?>  "'>
            <input type='hidden' name='bookingdate' value='" <?php echo $bookingDate; ?>  "'>
            
            <button type="submit" name="pay-with-mpesa">PAY WITH MPESA</button>
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


