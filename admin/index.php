<?php
//here we connect our file with the admincontroller which help us to connect to the database
require_once '../controllers/admincontroller.php';

// this checks if a user is logged in and if not it redirects to the login page
if (!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- sidebar navigation menu -->
    <div class="sidebar">
        <h2><b>ADMIN DASHBOARD</b></h2>
        <ul>
            <li><a href="index.php">DASHBOARD</a></li>
            <li><a href="buses.php">BUS MANAGEMENT</a></li>
            <li><a href="locations.php">LOCATION MANAGEMENT</a></li>
            <li><a href="schedules.php">SCHEDULE MANAGEMENT</a></li>
            <li><a href="bookings.php">BOOKING MANAGEMENT</a></li>
            <li><a href="users.php">USER MANAGEMENT</a></li>
            <li><a href="drivers.php">DRIVER MANAGEMENT</a></li>
            <li><a href="driverallocation.php">DRIVER ALLOCATION</a></li>
            <li><a href="payments.php">PAYMENT MANAGEMENT</a></li>
            <li><a href="reports.php">REPORTS</a></li>
            
        </ul>
    </div>
    <div class="main-content">
        <!-- main content navigation menu -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <button class="btn"><a href="newuser.php" class="btn"><b>ADD USER</b></a></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>100+</h1>
                        <h3>New Bookings</h3>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="box">
                        <h1>40+</h1>
                        <h3>New Users</h3>
                    </div>
    
                </div>
                <div class="card">
                    <div class="box">
                        <h1>10+</h1>
                        <h3>Destinations</h3>
                    </div>
                
                </div>
                <div class="card">
                    <div class="box">
                        <h1>100,000+</h1>
                        <h3>Income</h3>
                    </div>
                    
                </div>
            </div>
            <div class="content-2">
                <!-- Table to display the recent bookings -->
                <div class="recent-bookings">
                    <div class="title">
                        <h2>Recent Bookings</h2>
                
                    </div>
                    <table>
                        <tr>
                            <th>User</th>
                            <th>Route</th>
                            <th>No of Seats</th>
                            <th>Amount</th>
                            <th id="date">Date Booked</th>
                        </tr>
                        <?php
                        // fetching all booking data from the bookings database 
                        $sql = "SELECT * FROM bookings ORDER BY bookingdate DESC LIMIT 10";
                        $result = $conn->query($sql);
                        // Output data of each row from database and putting them on the table
                        while($booking_r = $result->fetch_assoc()) {
                            echo "<tr>";                          
                            echo "<td>" . $booking_r["userid"] . "</td>";
                            echo "<td>" . $booking_r["scheduleid"] . "</td>";
                            echo "<td>" . $booking_r["numberseats"] . "</td>";
                            echo "<td>" . $booking_r["fare"] . "</td>";
                            echo "<td id='date'>" . $booking_r["bookingdate"] . "</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                    </table>
                </div>
                <!-- Table to display recently registered users -->
                <div class="new-users">
                    <div class="title">
                        <h2>New Users</h2>
                        
                    </div>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Date Registered</th>
                        </tr>
                        <?php
                        // fetching all user data from the users table
                        $sql = "SELECT * FROM users ORDER BY lastupdated DESC LIMIT 10";
                        $result = $conn->query($sql);
                        // Output data of each row from database and putting them on the table
                        while($user_r = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $user_r["user_id"] . "</td>";
                            echo "<td>" . $user_r["firstname"]. " " .$user_r["lastname"] . "</td>";
                            echo "<td>" . $user_r["phonenumber"] . "</td>";
                            echo "<td>" . $user_r["lastupdated"] . "</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
