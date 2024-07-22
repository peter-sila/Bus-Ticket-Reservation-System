<?php

require '../../connect/db_connect.php';

// Check if driver ID is set
if(isset($_GET['driver_id'])) {
    // Get the set driver ID 
    $id = $_GET['driver_id'];

    // delete the driver with the given id from the database
    $sql = "DELETE FROM drivers WHERE driver_id = $id";

    // if successful redirect to the drivers page
    if ($conn->query($sql) === TRUE) {
        echo "driver deleted successfully";
        header('location: ../drivers.php');
            exit();

    } else {
        echo "Error deleting driver: " . $conn->error;
    }
} else {
    
    echo "driver ID not provided!";
}


$conn->close();
?>