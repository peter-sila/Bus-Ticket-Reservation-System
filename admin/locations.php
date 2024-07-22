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
    <title>Location Management</title>
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
    <div class="main-content">
        <!-- main content navigation bar -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <button class="btn" onclick="toggleAddLoc(true)"><b>ADD LOCATION</b></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <!-- main content area display -->
        <div class="b-content">
            <h1>Location Management</h1>
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
            <div class="route-list active">
                <h2>Manage Locations</h2>
                <!-- table to display all locations in the system -->
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>City</th>
                            <th>County</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                        // fetching locations data from the database and displaying it
                        $sql = "SELECT * FROM locations";
                        $result = $conn->query($sql);
                        // Output data of each row from database
                        while($loc_r = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $loc_r["location_id"] . "</td>";
                            echo "<td>" . $loc_r["city"] . "</td>";
                            echo "<td>" . $loc_r["county"] . "</td>";
                            echo "<td class='action-column'>";
                            echo "<button><a href='edit/editlocation.php?location_id=" . $loc_r["location_id"] . "'><b>Edit</b></a></button>";
                            echo "<button><a href='delete/deletelocation.php?location_id=" . $loc_r["location_id"] . "' 
                            onclick='return confirm(\"Are you sure you want to delete this location?\");'><b>Delete</b></a></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="locform">
                <!-- form to add new locations -->
                <h2>Create Location</h2>
                <form action="locations.php" method="POST">
                    <label for="city"><b>City:</b></label>
                    <input type="text" id="city" name="city">
                    <?php if (isset($errors['city'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['city']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="county"><b>County:</b></label>
                    <input type="text" id="county" name="county">
                    <?php if (isset($errors['county'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['county']; ?></li>
                        </div>
                    <?php endif; ?><br><br>
                    <div class="bbtn">
                        <button type="submit" name="addlocation">Add Location</button>
                        <button class="cancel" type="button" onclick="toggleAddLoc(false)">Cancel</button>
                
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../javascript/admin.js"></script>
</body>
</html>
