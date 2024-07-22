<?php
//here we connect our file with the admincontroller which help us to connect to the database
require_once '../../controllers/adminreportscontroller.php';

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
    <title>Driver Management</title>
    <link rel="stylesheet" href="../../css/reports.css">
</head>
<body>
    <!-- sidebar navigation menu -->
    <div class="sidebar">
        
        <h2>ADMIN DASHBOARD</h2>
        <ul>
            <li><a href="../index.php">DASHBOARD</a></li>
            <li><a href="../buses.php">BUS MANAGEMENT</a></li>
            <li><a href="../locations.php">LOCATION MANAGEMENT</a></li>
            <li><a href="../schedules.php">SCHEDULE MANAGEMENT</a></li>
            <li><a href="../bookings.php">BOOKING MANAGEMENT</a></li>
            <li><a href="../users.php">USER MANAGEMENT</a></li>
            <li><a href="../drivers.php">DRIVER MANAGEMENT</a></li>
            <li><a href="../driverallocation.php">DRIVER ALLOCATION</a></li>
            <li><a href="../payments.php">PAYMENT MANAGEMENT</a></li>
            <li><a href="../reports.php">REPORTS</a></li>
            
        </ul>
    </div>
    <!-- main content to display information of the selected page -->
    <div class="main-content">
        <!-- top navigation bar in the main content area -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <a href=""></a>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout">LOG OUT</a></button>
                </div>
            </div>
        </div>
        <div class="b-reports">
            <div class="message">
                

                <div class="displayreport">
                    <h2>message Reports</h2>
                    <!-- Display all details in a table -->
                    <table>
                        <thead>
                            <tr>
                                <th>message Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                        
                            $sql = "SELECT * FROM messages ORDER BY lastupdated DESC";
                            $messageresult = $conn->query($sql);
                            while ($message_r = $messageresult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $message_r["message_id"] . "</td>";
                                echo "<td>" . $message_r["name"] . "</td>";
                                echo "<td>" . $message_r["email"] . "</td>";
                                echo "<td>" . $message_r["message"] . "</td>";
                                echo "</tr>";
                            }
                            
                    
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../javascript/reports.js"></script>
</body>
</html>
