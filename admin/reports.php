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
    <title>Driver Management</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- sidebar navigation menu -->
    <div class="sidebar">
        
        <h2>ADMIN DASHBOARD</h2>
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
    <!-- main content to display information of the selected page -->
    <div class="main-content">
        <!-- top navigation bar in the main content area -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <a href=""></a>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-reports">
            <div class="reports-1">
                <div class="reportcard">
                    <h2>BUS REPORTS</h2>
                    
                    <li><a href="reports/busreport.php">By Status</a></li>

                </div>
                <div class="reportcard">
                    <h2>SCHEDULE REPORTS</h2>
                    
                    <li><a href="reports/schedulereport.php">Based on Route</a></li>
                    
                </div>
                <div class="reportcard">
                    <h2>BOOKING REPORTS</h2>
                    <li><a href="reports/bookingpaymentreport.php">Based on payment Status</a></li>
                    <li><a href="reports/bookingschedulereport.php">Based on Schedule</a></li>

                </div>
            </div>
            <div class="reports-2">
                <div class="reportcard">
                    <h2>USER REPORTS</h2>
                    
                    <li><a href="reports/userreport.php">List of Users</a></li>
                    
                </div>
                <div class="reportcard">
                    <h2>PAYMENT REPORTS</h2>
                    
                    <li><a href="reports/paymentreport.php">Based on Payment Status</a></li>
                    
                </div>
                <div class="reportcard">
                    <h2>USER MESSAGES</h2>
                    
                    <li><a href="reports/messagereport.php">View User Messages</a></li>
                    

                </div>
            </div>
           
        </div>
    </div>
    <script src="../javascript/admin.js"></script>
</body>
</html>
