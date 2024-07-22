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
            <div class="payment">
                <h2>payment Report</h2>
                <div class="statusform">
                    <form action="paymentreport.php" method="post">
                        <label for="p_status"><b>Payment Status</b></label>
                        <select id="p_status" name="p_status">
                            <option  value="">Select payment Status</option>
                            <option value="Completed">Completed</option>
                            <option value="Pedding">Pedding</option>
                        </select>
                        <?php if (isset($errors['p_status'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['p_status']; ?></li>
                            </div>
                        <?php endif; ?><br><br><br>
                        <button name="payment-r">SUBMIT</button>
                    </form>
                </div>

                <div class="displayreport">
                    <h2>payment Reports</h2>
                    <!-- Display all details in a table -->
                    <table>
                    <thead>
                        <tr>
                            <th>Payment Id</th>
                            <th>Booking Id</th>
                            <th>Amount Paid</th>
                            <th>Payment Date</th>
                            <th>Transaction Id</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // fetching payments data from the database and displaying it
                        if (isset($paymentresult) && $paymentresult->num_rows > 0) {
                            while ($pay_r = $paymentresult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $pay_r["payment_id"] . "</td>";
                                echo "<td>" . $pay_r["bookingid"] . "</td>";
                                echo "<td>" . $pay_r["amountpaid"] . "</td>";
                                echo "<td>" . $pay_r["paymentdate"] . "</td>";
                                echo "<td>" . $pay_r["transactionid"] . "</td>";
                                echo "<td>" . $pay_r["paymentstatus"] . "</td>";
                                echo "</tr>";
                            }
                        }else {
                            echo "<tr><td colspan='4'>No such payment was found</td></tr>";
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
