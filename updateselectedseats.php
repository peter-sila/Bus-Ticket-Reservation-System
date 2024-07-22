<?php
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the count of selected seats from the request body
    $seat_count = json_decode(file_get_contents('php://input'), true);
    $selectedSeatsCount = isset($seat_count['selectedSeatsCount']) ? $seat_count['selectedSeatsCount'] : 0;
    
    // Update the session variable with the count of selected seats
    $_SESSION['selected_seats_count'] = $selectedSeatsCount;

    // Send a response back to the client indicating success
    echo 'Session variable updated successfully';
} else {
    // If the request method is not POST, send a 405 Method Not Allowed response
    echo 'Method Not Allowed';
}
?>
