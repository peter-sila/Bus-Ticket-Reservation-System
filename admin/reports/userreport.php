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
            <div class="user-rep">
                <h2>user Report</h2>
                <div class="statusform">
                    <form action="userreport.php" method="post">
                        <label for="role"><b>User Role</b></label>
                        <select id="role" name="role">
                            <option  value="">Select User Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                        <?php if (isset($errors['role'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['role']; ?></li>
                            </div>
                        <?php endif; ?><br><br><br>
                        <button name="user-r">SUBMIT</button>
                    </form>
                </div>

                <div class="displayreport">
                    <h2>user Reports</h2>
                    <!-- Display all details in a table -->
                    <table>
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Id/Passport</th>
                                <th>Phone No</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                        
                            if (isset($userresult) && $userresult->num_rows > 0) {
                                while ($user_r = $userresult->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $user_r["user_id"] . "</td>";
                                    echo "<td>" . $user_r["firstname"] . " " . $user_r["lastname"] . "</td>";
                                    echo "<td>" . $user_r["email"] . "</td>";
                                    echo "<td>" . $user_r["idpassport"] . "</td>";
                                    echo "<td>" . $user_r["phonenumber"] . "</td>";
                                    echo "<td>" . $user_r["role"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No such user was found</td></tr>";
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
