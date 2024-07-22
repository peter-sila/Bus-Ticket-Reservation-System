<?php
// connecting to the database
require '../../connect/db_connect.php';

// Check if the bus ID is set
if(isset($_GET['bus_id'])) {
    // Get the set bus ID 
    $id = $_GET['bus_id'];

    // delete the set bus from the database
    $sql = "DELETE FROM buses WHERE bus_id = $id";

    // if the deletion is successful, redirect to the buses page
    if ($conn->query($sql) === TRUE) {
        echo "Bus deleted successfully";
        header('location: ../buses.php');
            exit();

    } else {
        echo "Error deleting bus: " . $conn->error;
    }
} else {
    
    echo "Bus ID not provided!";
}


$conn->close();
?>
