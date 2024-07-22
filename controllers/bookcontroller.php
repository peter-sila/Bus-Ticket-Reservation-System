<?php

session_start();

require 'connect/db_connect.php';
// require_once 'emailcontrol.php';

$errors = array();

//message from users
// if user click on send button
if (isset($_POST['cont-mess-btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    


    // validating entered details in the form
    if (empty($name)) {
        $errors['name'] = "Name required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($message)) {
        $errors['message'] = "Write something,message can't be blank";
    }
    

    if (count($errors) === 0) {
       
        $insert_sql = "INSERT INTO messages (name, email, message) VALUES (?,?,?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param('sss', $name, $email, $message);
        
        if ($stmt->execute()) {
            $_SESSION['success_send'] = "Message send successfully";

            header('location: contactus.php');
            exit();

        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    } else {
        $_SESSION['error_send'] = "Message not send, try again";

    }

}


// setting departure date to today
$from = '';
$to = '';
$departuredate = '';
$filterdate = date('Y-m-d');
$filtertime = date('H:i');

// Searching available bus schedules
// Check if the form is submitted
if (isset($_POST['b-srch-btn'])) {
    // Get input values from the form
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departuredate = $_POST['departuredate'];

    // validating entered details in the inputs
    if (empty($from)) {
        $errors['from'] = "Departure place required";
    }
    if (empty($to)) {
        $errors['to'] = "Destination required";
    }
    if (empty($departuredate)) {
        $errors['departuredate'] = "Departure date required";
    }

    // Prepare and execute the SQL query to count the booked seats
    $count_sql = "SELECT SUM(numberseats) AS totalseats FROM bookings WHERE scheduleid = ?";
    $stmt = $conn->prepare($count_sql);
    $stmt->bind_param("i", $scheduleid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    // Fetch the count of booked seats
    $bookedSeats = $row['totalseats'];

   
    
    if (count($errors) === 0) {
        // Query to fetch schedules based on user input
        $sql = "SELECT * FROM schedules
        WHERE origin = '$from' AND destination = '$to'";

        // And schedule date match the user input
        $sql .= " AND schedules.sdate = '$departuredate'";

        $result = $conn->query($sql);
    }else{
        // Form is not submitted, fetch default schedules (first ten routes)
        // selects all columns from the schedules table (s.*) and adds an column totalseat to 
        // store the total number of seats booked for each schedule.
        $selsql = "SELECT s.*, IFNULL(b.totalseats, 0) AS totalseats 
        FROM schedules s
        -- join the two tables schedules and bookings in the query
        LEFT JOIN (
            SELECT scheduleid, SUM(numberseats) AS totalseats 
            FROM bookings 
            GROUP BY scheduleid
        ) b ON s.schedule_id = b.scheduleid
        WHERE s.sdate >= '$filterdate' AND s.departuretime >= '$filtertime' AND IFNULL(b.totalseats, 0) < 43
        LIMIT 10";

        $result = $conn->query($selsql);
    }
}else {
    // Form is not submitted, fetch default schedules (first ten routes)
    $selsql = "SELECT s.*, IFNULL(b.totalseats, 0) AS totalseats 
    FROM schedules s
    LEFT JOIN (
        SELECT scheduleid, SUM(numberseats) AS totalseats 
        FROM bookings 
        GROUP BY scheduleid
    ) b ON s.schedule_id = b.scheduleid
    WHERE s.sdate >= '$filterdate' AND s.departuretime >= '$filtertime' AND IFNULL(b.totalseats, 0) < 43
    LIMIT 10";

    $result = $conn->query($selsql);
}

   




// Check if the b-seat-btn is clicked
if (isset($_POST['b-seat-btn'])) {
    // Store the selected row details in sessions
    $_SESSION['selected_scheduleid'] = $_POST['id'];
    $_SESSION['selected_bus'] = $_POST['bus'];
    $_SESSION['selected_fare'] = $_POST['fare'];
    $_SESSION['selected_route'] = $_POST['origin'] . ' - '. $_POST['destination'];
    $_SESSION['schedule_date'] = $_POST['sdate'];
    $_SESSION['selected_departuretime'] = $_POST['departuretime'];

    $scheduleid = $_SESSION['selected_scheduleid'];

    // Prepare and execute the SQL query to count the booked seats
    $count_sql = "SELECT SUM(numberseats) AS totalseats FROM bookings WHERE scheduleid = ?";
    $stmt = $conn->prepare($count_sql);
    $stmt->bind_param("i", $scheduleid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    // Fetch the count of booked seats
    $bookedSeats = $row['totalseats'];

    if ( $bookedSeats >= 43) {
        // Redirect to seats.php page
        header('Location: userbooking.php');
        echo 'Bus is fully booked';
        exit();
    }else{
        
        header('Location: seats.php');
        exit();
    }
    

}

?>

