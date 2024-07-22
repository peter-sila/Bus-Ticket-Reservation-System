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
    <title>Payment Management</title>
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
    <!-- main content area for the page content -->
    <div class="main-content">
        <!-- main content top  navigation area -->
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

        <div class="b-content">
            <h1>Payment Management</h1>
            <!-- displaying all payments made -->
            <div class="payment-transactions">
                <h2>Payment Transactions</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>Payment Id</th>
                            <th>Amount Paid</th>
                            <th class="pdate">Payment Date</th>
                            <th class="transid">Transaction Id</th>
                            <th>Phone Number</th>
                            <th>Payment Status</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // fetching payments data from the database and displaying it
                        $sql = "SELECT * FROM payments";
                        $result = $conn->query($sql);
                        // Output data of each row from database
                        while($pay_r = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $pay_r["payment_id"] . "</td>";
                            echo "<td>" . $pay_r["amountpaid"] . "</td>";
                            echo "<td class='pdate'>" . $pay_r["paymentdate"] . "</td>";
                            echo "<td class='transid'>" . $pay_r["transactionid"] . "</td>";
                            echo "<td>" . $pay_r["phonenumber"] . "</td>";
                            echo "<td>" . $pay_r["paymentstatus"] . "</td>";
                            echo "<td class='action action-column'>";
                            echo "<a href='edit/editpayment.php?payment_id=" . $pay_r["id"] . "'>Edit</a>";
                            echo "<a href='confirmpayment.php?payment_id=" . $pay_r["id"] . "' 
                            onclick='return confirm(\"Are you sure you want to confirm this payment as received?\");'>Confirm</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</body>
</html>
