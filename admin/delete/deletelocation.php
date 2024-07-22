<?php

require '../../connect/db_connect.php';

// Check if Location ID is set
if(isset($_GET['location_id'])) {
    // Get the set Location ID 
    $id = $_GET['location_id'];

    // delete location with the set id from the database
    $sql = "DELETE FROM locations WHERE location_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Location deleted successfully";
        header('location: ../locations.php');
            exit();

    } else {
        echo "Error deleting Location: " . $conn->error;
    }
} else {
    
    echo "Location ID not provided!";
}


$conn->close();
?>
