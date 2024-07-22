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
                    <button class="btn" onclick="toggleAddDriver(true)"><b>ADD DRIVER</b></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-content">
            <h1 id="driverlist">Driver Management</h1>
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
            <br><br>
            <div class="driver-list active">
                <!-- Driver List table -->
                <table>
                    <tr>
                        <th>Driver Id</th>
                        <th>Driver Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Id/Passport</th>
                        <th class="action">Action</th>
                    </tr>
                    <?php
                    // fetching Driver data from the database and displaying it
                    $sql = "SELECT * FROM drivers";
                    $result = $conn->query($sql);
                    // Output data of each row from database
                    while($drivers_r = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $drivers_r["driver_id"] . "</td>";
                        echo "<td>" . $drivers_r["name"] . "</td>";
                        echo "<td>" . $drivers_r["phonenumber"] . "</td>";
                        echo "<td>" . $drivers_r["email"] . "</td>";
                        echo "<td>" . $drivers_r["idpassport"] . "</td>";
                        echo "<td class='action action-column'>";
                        echo "<button><a href='edit/editdriver.php?driver_id=" . $drivers_r["driver_id"] . "'>Edit</a></button>";
                        echo "<button><a href='delete/deletedriver.php?driver_id=" . $drivers_r["driver_id"] . "' 
                        onclick='return confirm(\"Are you sure you want to delete this Driver?\");'>Delete</a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                    
                </table>
            </div>
            <div class="driverform">
                <!-- Form to add new drivers by the admin -->
                <h2 id="driverform">Add Driver</h2>
                <form action="drivers.php"  method="POST">
                    <label for="name"><b>Driver Name:</b></label>
                    <input type="text" id="name" name="name">
                    <?php if (isset($errors['name'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['name']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="phonenumber"><b>Phone Number:</b></label>
                    <input type="number" id="phonenumber" name="phonenumber">
                    <?php if (isset($errors['phonenumber'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['phonenumber']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="email"><b>Email:</b></label>
                    <input type="text" id="email" name="email">
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['email']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="idpassport"><b>Id/Passport:</b></label>
                    <input type="text" id="idpassport" name="idpassport">
                    <?php if (isset($errors['idpassport'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['idpassport']; ?></li>
                        </div>
                    <?php endif; ?><br><br>
                    <div class="bbtn">
                        <button type="submit" name="adddriver">Add Driver</button>
                        <button type="button" class="cancel" onclick="toggleAddDriver(false)">Cancel</button>
                    </div>
                 </form>
            </div>
        </div>
    </div>
    <script src="../javascript/admin.js"></script>
</body>
</html>
