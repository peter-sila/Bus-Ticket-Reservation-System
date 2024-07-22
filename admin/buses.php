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
    <title>Bus Management</title>
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
    <!-- main content container -->
    <div class="main-content">
        <!-- main content top navigation bar -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <button class="btn" onclick="toggleAddBus(true)"><b>ADD BUS</b></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-content">
            <h1 id="buslist">Bus Management</h1>
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
            <div class="bus-list active">
                <!-- Bus List on a table  -->
                 <h2>Bus List</h2>
                <table>
                    <tr>
                        <th>Bus Id</th>
                        <th>Bus Number</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    // fetching bus data from the buses table in the database and displaying it
                    $sql = "SELECT * FROM buses";
                    $result = $conn->query($sql);
                    // Output data of each row from database and displaying on table
                    while($bus_r = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $bus_r["bus_id"] . "</td>";
                        echo "<td>" . $bus_r["busnumber"] . "</td>";
                        echo "<td>" . $bus_r["capacity"] . "</td>";
                        echo "<td>" . $bus_r["status"] . "</td>";
                        echo "<td class='action-column'>";
                        echo "<button class='edit'><a href='edit/editbus.php?bus_id=" . $bus_r["bus_id"] . "'><b>Edit</b></a></button>";
                        echo "<button class='delete' name='deletebus'><a href='delete/deletebus.php?bus_id=" . $bus_r["bus_id"] . "' 
                        onclick='return confirm(\"Are you sure you want to delete this bus?\");'><b>Delete</b></a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
                
            </div>
            <div class="busform">
                <!-- Form to add a new bus -->
                <h2 id="busform">Add Bus</h2>
                <form action="buses.php"  method="POST">
                    <label for="busnumber"><b>Bus Number:</b></label>
                    <input type="text" id="busnumber" name="busnumber" >
                    <?php if (isset($errors['busnumber'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['busnumber']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="capacity"><b>Capacity:</b></label>
                    <input type="number" id="capacity" name="capacity" >
                    <?php if (isset($errors['capacity'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['capacity']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="status"><b>Status:</b></label>
                    <select id="status" name="status" >
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <?php if (isset($errors['status'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['status']; ?></li>
                        </div>
                    <?php endif; ?><br><br>
                    <div class="bbtn">
                        <button type="submit" name="addbus"><b>Add Bus</b></button>
                        <button class="cancel" type="button" onclick="toggleAddBus(false)"><b>Cancel</b></button>
                
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../javascript/admin.js"></script>
</body>
</html>
