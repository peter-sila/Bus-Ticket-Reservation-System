<?php

require '../../connect/db_connect.php';

// Check if user ID is provided
if(isset($_GET['user_id'])) {
    // Get the set user ID 
    $id = $_GET['user_id'];

    $sql = "DELETE FROM users WHERE user_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "user deleted successfully";
        header('location: ../users.php');
            exit();

    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    
    echo "user ID not provided!";
}


$conn->close();
?>
