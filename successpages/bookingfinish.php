<?php

session_start();

require '../connect/db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Message</title>
    <link rel="stylesheet" href="../css/registers.css">
</head>
<body>
    <div class="prof">
        <div class="container">
            <p>
                Your booking was done successfully. Below is your booking code <b>Don't share it with anybody.</b>
            </p>
            <p style="color:green; font-size:large;"><b><?php echo $_SESSION['bookingcode']; ?></b></p>
            <p>
                You can view your booking code from the booking history page. <br>Click the continue button below to proceed.
            </p>
            <button><a href="../home.php" style="color: #ccc;">Continue</a></button>
        </div>
    </div>
</body>
</html>
