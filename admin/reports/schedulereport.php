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
            <div class="schedule">
                <h2>Schedule Report By Route and Date</h2>
                <div class="statusform">
                    <form action="schedulereport.php" method="post">
                        <label for="origin"><b>Origin:</b></label><br>
                        <input type="text" name="origin" id="origin" value="<?php echo $origin ?>" placeholder="Enter Origin">
                        <?php if (isset($errors['origin'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['origin']; ?></li>
                            </div>
                        <?php endif; ?><br><br>
                        <label for="destination"><b>destination:</b></label><br>
                        <input type="text" name="destination" id="destination" value="<?php echo $destination ?>" placeholder="Enter destination">
                        <?php if (isset($errors['destination'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['destination']; ?></li>
                            </div>
                        <?php endif; ?><br><br>
                        <label for="date"><b>Date:</b></label><br>
                        <input type="date" name="date" id="date" value="<?php echo $date ?>">
                        <?php if (isset($errors['date'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['date']; ?></li>
                            </div>
                        <?php endif; ?><br><br><br>
                        <button name="scheduleroute">SUBMIT</button>
                    </form>
                </div>

                <div class="displayreport">
                    <h2>Schedule Reports</h2>
                    <!-- Display all details in a table -->
                    <table>
                        <thead>
                            <tr>
                                <th>schedule Id</th>
                                <th>schedule Date</th>
                                <th>Bus</th>
                                <th>Route</th>
                                <th>Departure Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($scheduleresult) && $scheduleresult->num_rows > 0) {
                                while ($schedule_r = $scheduleresult->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $schedule_r["schedule_id"] . "</td>";
                                    echo "<td>" . $schedule_r["sdate"] . "</td>";
                                    echo "<td>" . $schedule_r["bus"] . "</td>";
                                    echo "<td>" . $schedule_r["origin"] . "-" . $schedule_r["destination"]. "</td>";
                                    echo "<td>" . $schedule_r["departuretime"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No schedule was found</td></tr>";
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
