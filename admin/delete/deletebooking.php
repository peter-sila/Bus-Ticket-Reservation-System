<?php
// connecting to database
require '../../connect/db_connect.php';

// Check if booking ID is set before it continues
if(isset($_GET['booking_id'])) {
    // Get the selected booking ID 
    $id = $_GET['booking_id'];

    // sql query to delete the booking with the set id from the database
    $sql = "DELETE FROM bookings WHERE booking_id = $id";

    // if the booking is deleted successfully it redirects back to the bookings page
    if ($conn->query($sql) === TRUE) {
        echo "booking deleted successfully";
        header('location: ../bookings.php');
            exit();

    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    
    echo "booking ID not provided!";
}


$conn->close();
?>