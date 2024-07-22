<?php

require '../../connect/db_connect.php';

// Check if schedule ID is set
if(isset($_GET['schedule_id'])) {
    // Get the schedule ID 
    $id = $_GET['schedule_id'];

    $sql = "DELETE FROM schedules WHERE schedule_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "schedule deleted successfully";
        header('location: ../schedules.php');
            exit();

    } else {
        echo "Error deleting schedule: " . $conn->error;
    }
} else {
    
    echo "schedule ID not provided!";
}


$conn->close();
?>
