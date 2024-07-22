<?php

session_start();

require '../../connect/db_connect.php';
// require_once 'emailcontrol.php';

$errors = array();

$status = '';
// Check if the form is submitted
if (isset($_POST['busstatus'])) {
    // GET input values from the form
    $status = $_POST['status'];

    if (empty($status)) {
        $errors['status'] = "Input required";
    }

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $bus_sgls = "SELECT * FROM buses WHERE status = '$status'";

        $busresult = $conn->query($bus_sgls);
    } else {
        //echo "make a selection";
    }


}




$origin = '';
$destination = '';
$date = '';
// Check if the form is submitted
if (isset($_POST['scheduleroute'])) {
    // GET input values from the form
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];

    if (empty($origin)) {
        $errors['origin'] = "Input required";
    }
    if (empty($destination)) {
        $errors['destination'] = "Destination required";
    }
    if (empty($date)) {
        $errors['date'] = "Date required";
    }

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $schedule_sgls = "SELECT * FROM schedules WHERE origin = '$origin' AND destination = '$destination'";

        $schedule_sgls .= "AND sdate = '$date'";

        $scheduleresult = $conn->query($schedule_sgls);
    } else {
        //echo "make a selection";
    }


}





$paymentstatus = '';

// Check if the form is submitted
if (isset($_POST['book-payment'])) {
    // GET input values from the form
    $paymentstatus = $_POST['paymentstatus'];

    if (empty($paymentstatus)) {
        $errors['paymentstatus'] = "Input required";
    }
    

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $booking_sgls = "SELECT * FROM bookings WHERE paymentstatus = '$paymentstatus'";

        $bookingresult = $conn->query($booking_sgls);
    } else {
        //echo "make a selection";
    }


}







$schedule_id = '';

// Check if the form is submitted
if (isset($_POST['book-schedule'])) {
    // GET input values from the form
    $schedule_id = $_POST['schedule_id'];

    if (empty($schedule_id)) {
        $errors['schedule_id'] = "Input required";
    }
    

    if (count($errors) === 0) {
        // Query to fetch bookings based on user input
        $booking_sgls = "SELECT * FROM bookings WHERE scheduleid = '$schedule_id'";

        $book_sched_result = $conn->query($booking_sgls);
    } else {
        //echo "make a selection";
    }


}







// Check if the form is submitted
if (isset($_POST['user-r'])) {
    // GET input values from the form
    $role = $_POST['role'];

    if (empty($role)) {
        $errors['role'] = "Input required";
    }
    

    if (count($errors) === 0) {
        // Query to fetch users based on user input
        $user_sgls = "SELECT * FROM users WHERE role = '$role'";

        $userresult = $conn->query($user_sgls);
    } else {
        //echo "make a selection";
    }


}





// Check if the form is submitted
if (isset($_POST['payment-r'])) {
    // GET input values from the form
    $p_status = $_POST['p_status'];

    if (empty($p_status)) {
        $errors['p_status'] = "Input required";
    }
    

    if (count($errors) === 0) {
        // Query to fetch payments based on payment input
        $payment_sgls = "SELECT * FROM payments WHERE paymentstatus = '$p_status'";

        $paymentresult = $conn->query($payment_sgls);
    } else {
        //echo "make a selection";
    }


}







?>