<?php
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected seat names from the request body
    $seat_name = json_decode(file_get_contents('php://input'), true);
    $selectedSeatNames = isset($seat_name['SelectedSeatNames']) ? $seat_name['SelectedSeatNames'] : [];

    // Update the session variable with the selected seat names
    $_SESSION['selected_seat_names'] = $selectedSeatNames;

    // Send a response back to the client indicating success
    echo 'Session variable updated successfully with seat names';
} else {
    // If the request method is not POST, send a 405 Method Not Allowed response
    http_response_code(405);
    echo 'Method Not Allowed';
}
?>
