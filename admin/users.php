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
    <title>Customers Management</title>
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
        <!-- main content area top navigation bar -->
        <div class="header">
            <div class="nav">
                <div class="user">
                    <button class="btn"><a href="newuser.php" class="btn"><b>ADD USER</b></a></button>
                    <div class="img-case">
                        <a href="adminprofile.php"><img src="../images/user.png"></a>
                    </div>
                    <button class="log-btn"><a href="index.php?logout=1" style="color: red;" class="logout"><b>LOG OUT</b></a></button>
                </div>
            </div>
        </div>
        <div class="b-content">
            <div class="bsform">
                <h1>Users Management</h1>
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
                <form action="users.php" method="POST">
                    <h2>Search user</h2>
                    <label for="email"><b>User Email or Id:</b></label>
                    <input type="text" id="email" name="email" value="<?php echo $user_email; ?>" placeholder="Enter user email or Id"><br>
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger">
                            <li><?php echo $errors['email']; ?></li>
                        </div>
                    <?php endif; ?>
                    <button type="submit" name="search-user"><b>Search</b></button>
                </form>
            </div>

            <div class="customer-list">
                <h2>Manage Users</h2>
                <!-- displaying all users from the database -->
                
                <table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Full name</th>
                            <th class="email">Email</th>
                            <th class="idpass">Id/Passport</th>
                            <th>Phone No</th>
                            <th class="role">Role</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        if (isset($userresult) && $userresult->num_rows > 0) {
                            while ($user_r = $userresult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $user_r["user_id"] . "</td>";
                                echo "<td>" . $user_r["firstname"] . " " . $user_r["lastname"] . "</td>";
                                echo "<td class='email'>" . $user_r["email"] . "</td>";
                                echo "<td class='idpass'>" . $user_r["idpassport"] . "</td>";
                                echo "<td>" . $user_r["phonenumber"] . "</td>";
                                echo "<td class='role'>" . $user_r["role"] . "</td>";
                                echo "<td class='action action-column'>";
                                echo "<button><a href='delete/deleteuser.php?user_id=" . $user_r["user_id"] . "' 
                                onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a></button>";
                                echo "</td>";
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
</body>
</html>
