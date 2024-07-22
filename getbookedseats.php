<?php
session_start();

// Database connection 
require_once 'connect/db_connect.php';

$s_id = $_SESSION['selected_scheduleid'];

// Fetch booked seats from the database
$sql = "SELECT seats FROM bookings WHERE scheduleid = $s_id";
$result = $conn->query($sql);

$bookedSeats = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Split the comma-separated string into an array of seats
        $seats = explode(", ", $row["seats"]);
        // Add each seat to the bookedSeats array
        $bookedSeats = array_merge($bookedSeats, $seats);
    }
    
}

// Close the connection
$conn->close();

// Return booked seats in JSON format
header('Content-Type: application/json');
echo json_encode(['bookedSeats' => $bookedSeats]);
?>
