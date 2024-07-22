<?php
// connecting to the database
require '../../connect/db_connect.php';

// Check if the bus ID is set
if(isset($_GET['allocation_id'])) {
    // Get the set bus ID 
    $id = $_GET['allocation_id'];

    // delete the set bus from the database
    $sql = "DELETE FROM driverallocation WHERE allocation_id = $id";

    // if the deletion is successful, redirect to the buses page
    if ($conn->query($sql) === TRUE) {
        echo "Allocation deleted successfully";
        header('location: ../driverallocation.php');
            exit();

    } else {
        echo "Error deleting allocation: " . $conn->error;
    }
} else {
    
    echo "ID not provided!";
}


$conn->close();
?>
