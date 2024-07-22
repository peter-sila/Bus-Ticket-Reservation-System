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
    <title>Driver Allocation Management</title>
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
                    <button class="btn" onclick="toggleAllocate(true)"><b>ALLOCATE  DRIVER</b></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-content">
            <h1 id="driverlist">Driver Allocation Management</h1>
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
            <div class="driver-alist active">
                <!-- Driver allocation List table -->
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Driver Id</th>
                        <th>Bus Id</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    // fetching Driver data from the database and displaying it
                    $sql = "SELECT * FROM driverallocation";
                    $result = $conn->query($sql);
                    // Output data of each row from database
                    while($drivers_a = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $drivers_a["allocation_id"] . "</td>";
                        echo "<td>" . $drivers_a["driverid"] . "</td>";
                        echo "<td>" . $drivers_a["busid"] . "</td>";
                        echo "<td class='action-column'>";
                        echo "<button><a href='delete/deletedriverallocation.php?allocation_id=" . $drivers_a["allocation_id"] . "' 
                        onclick='return confirm(\"Are you sure you want to delete this Driver?\");'>Delete</a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                    
                </table>
            </div>
            <div class="driver-aform">
                <!-- Form to add new drivers by the admin -->
                <h2>Allocate Driver</h2>
                <form action="driverallocation.php"  method="POST">
                    
                    <label for="driver"><b>Driver:</b></label>
                    <select id="driver" name="driver">
                        <option value="">Select Driver</option>
                        <?php
                        // fetching schedules to display on schedule assigning
                        $sql = "SELECT driver_id, name FROM drivers";
                        $result = $conn->query($sql);
                        while($driver_al = $result->fetch_assoc()) {
                            echo "<option value='" . $driver_al["driver_id"] . "'>" . $driver_al["driver_id"] ." ". $driver_al["name"] . "</option>";
                        }
                        ?>
                    </select>
                    <?php if (isset($errors['driver'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['driver']; ?></li>
                        </div>
                    <?php endif; ?><br>
                    <label for="bus"><b>Bus:</b></label>
                    <select id="bus" name="bus">
                        <option value="">Select Bus</option>
                        <?php
                        // fetching schedules to display on schedule assigning
                        $sql = "SELECT bus_id, busnumber FROM buses WHERE status = 'active'";
                        $result = $conn->query($sql);
                        while($bus_al = $result->fetch_assoc()) {
                            echo "<option value='" . $bus_al["bus_id"] . "'>" . $bus_al["bus_id"] ." ". $bus_al["busnumber"] . "</option>";
                        }
                        ?>
                    </select>
                    <?php if (isset($errors['bus'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['bus']; ?></li>
                        </div>
                    <?php endif; ?><br><br>
                    
                    <div class="bbtn">
                        <button type="submit" name="alocatedriver">Assign Driver</button>
                        <button type="button" class="cancel" onclick="toggleAllocate(false)">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="../javascript/admin.js"></script>
</body>
</html>
