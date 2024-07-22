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
            <h1>ENJOY YOUR TRAVEL</h1>
            <p>Search for your convinient route, incase of any problem during the booking, <br>
            feel free to reach out to our customer service and you will be helped.</p>
        </div>
    </div>
    <div class="content">
        <div class="make-bkng">
            <form action="userbooking.php" method="post">
                <div class="r-seat">
                    
                    <div class="m-bok">
                        <label for="from">From</label>
                        <input type="text" id="from" name="from" placeholder="Enter your start location" value="<?php echo $from; ?>">
                        <?php if (isset($errors['from'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['from']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="m-bok">
                        <label for="to">To</label>
                        <input type="text" id="to" name="to" placeholder="Enter your destination" value="<?php echo $to; ?>">
                        <?php if (isset($errors['to'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['to']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="m-bok">
                        <label for="date">Departure Date</label>
                        <input type="date" name="departuredate" id="date" value="<?php echo $departuredate; ?>">
                        <?php if (isset($errors['departuredate'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['departuredate']; ?></li>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="m-bok">
                        <div class="send-mess-btn">
                            <button type="submit" name="b-srch-btn">Search a Booking</button>
                        </div>
                    </div>
                    
                
                </div>
            </form>

            
        </div>

        <div class="avail-bus-list">
            
            <table>
                <tr>
                    <th>#Id</th>
                    <th>Date</th>
                    <th>Route</th>
                    <th>Departure Time</th>
                    <th>Total Coast</th>
                    <th>Action</th>
                    
                </tr>
                <?php
                    if (isset($result) && $result->num_rows > 0) {
                        while ($schedules_r = $result->fetch_assoc()) {
                            $departureTime = date("H:i a", strtotime($schedules_r['departuretime']));
                            echo "<tr>";
                            echo "<td>" . $schedules_r["schedule_id"] . "</td>";
                            echo "<td>" . $schedules_r["sdate"] . "</td>";
                            echo "<td>" . $schedules_r["origin"] . " - " . $schedules_r["destination"] . "</td>";
                            echo "<td>" . $departureTime . "</td>";
                            echo "<td>" . $schedules_r["fare"] . "</td>";
                            echo "<td class='action-column'>";
                            echo "<form action='userbooking.php' method='post'>";
                            echo "<input type='hidden' name='id' value='" . $schedules_r["schedule_id"] . "'>";
                            echo "<input type='hidden' name='sdate' value='" . $schedules_r["sdate"] . "'>";
                            echo "<input type='hidden' name='bus' value='" . $schedules_r["bus"] . "'>";
                            echo "<input type='hidden' name='origin' value='" . $schedules_r["origin"] . "'>";
                            echo "<input type='hidden' name='destination' value='" . $schedules_r["destination"] . "'>";
                            echo "<input type='hidden' name='departuretime' value='" . $schedules_r["departuretime"] . "'>";
                            echo "<input type='hidden' name='fare' value='" . $schedules_r["fare"] . "'>";
                            echo "<button type='submit' name='b-seat-btn' class='send-mess-btn'>SELECT SEAT</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No schedules found for now</td></tr>";
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