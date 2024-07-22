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
    <title>Booking Management</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- admin sidebar menu -->
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

    <!-- admin main content area where we display information of the selected page -->
    <div class="main-content">
        <!-- main content top navigation bar -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <button class="btn"><a href="#book" class="btn"><b>BOOK</b></a></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-content">
            <h1>Booking Management</h1>
            <?php
                if (isset($_SESSION['success_p'])) {
            ?>
            <div class="alert-success">
                <b><?php
                    echo $_SESSION['success_p'];
                ?></b>
            </div>
            <?php
                unset($_SESSION['success_p']);
                } else {
                if (isset($_SESSION['error_p'])) {
            ?>
            <div class="alert-error">
                <b><?php
                    echo $_SESSION['error_p'];
                ?></b>
            </div>
            <?php
                unset($_SESSION['error_p']);
                }
                }
            ?>
            <!-- Booking Search Form, where admin can search the bookings he/she wants-->
            <div class="book-forms">
                <div class="form1">
                    <form action="bookings.php" method="POST">
                        <h2>Search Bookings</h2>
                        <label for="date"><b>Booking Date:</b></label>
                        <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br>
                        <?php if (isset($errors['date'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['date']; ?></li>
                            </div>
                        <?php endif; ?>
                        <label for="userid"><b>User Id:</b></label>
                        <input type="number" id="userid" name="userid" value="<?php echo $customer; ?>" placeholder="Enter userid"><br><br>
                        <?php if (isset($errors['customer'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['customer']; ?></li>
                            </div>
                        <?php endif; ?>
                        <button type="submit" name="search-book"><b>Search</b></button>
                    </form>
                </div>
                <div class="form2">
                    <form action="bookings.php" method="POST">
                        <h2>Search Bookings</h2>
                        <label for="b-code"><b>Booking Code:</b></label>
                        <input type="text" id="b-code" name="b-code" value="<?php echo $bcode; ?>" placeholder="Enter booking code"><br>
                        <?php if (isset($errors['bcode'])): ?>
                            <div class="alert alert-danger">
                                <li><?php echo $errors['bcode']; ?></li>
                            </div>
                        <?php endif; ?>
                        
                        <button type="submit" name="search-book-code"><b>Search</b></button>
                    </form>
                </div>
            </div>

            <div class="booking-list">
                <h2>Manage Bookings</h2>
                <!-- Display all booking details in a table -->
                <table>
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th class="userid">User Id</th>
                            <th class="bookdate">Booking Date</th>
                            <th>Schedule</th>
                            <th class="noseats">No Seats</th>
                            <th>Amount</th>
                            <th class="bookcode">Booking Code</th>
                            <th class="paystatus">Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($bookingresult) && $bookingresult->num_rows > 0) {
                            while ($booking_r = $bookingresult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $booking_r["booking_id"] . "</td>";
                                echo "<td class='userid'>" . $booking_r["userid"] . "</td>";
                                echo "<td class='bookdate'>" . $booking_r["bookingdate"] . "</td>";
                                echo "<td>" . $booking_r["scheduleid"] . "</td>";
                                echo "<td class='noseats'>" . $booking_r["numberseats"] . "</td>";
                                echo "<td>" . $booking_r["fare"] . "</td>";
                                echo "<td class='bookcode'>" . $booking_r["bookingcode"] . "</td>";
                                echo "<td class='paystatus'>" . $booking_r["paymentstatus"] . "</td>";
                                echo "<td class='action-column'>";
                                echo "<button><a href='edit/editbooking.php?booking_id=" . $booking_r["booking_id"] . "'>Edit</a></button>";
                                echo "<button><a href='delete/deletebooking.php?booking_id=" . $booking_r["booking_id"] . "' 
                                onclick='return confirm(\"Are you sure you want to delete this booking?\");'>Delete</a></button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No booking was found</td></tr>";
                        }
                        
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
