<?php

session_start();

require '../../connect/db_connect.php';


// // Check if booking ID is provided

if(isset($_GET['booking_id'])) {

    // Get the booking ID
    $id = $_GET['booking_id'];

    $book_sql = "SELECT * FROM bookings WHERE booking_id = $id";
    $result = $conn->query($book_sql);

    if ($result->num_rows > 0) {
        
        $book_edit = $result->fetch_assoc();

        $id = $book_edit['booking_id'];
        $paymentstatus = $book_edit['paymentstatus'];
        
    } 
}
 

// Check if form is submitted
if (isset($_POST['updatebooking'])) {
    // Get form data
    $id = $_POST['id'];
    $paymentstatus = $_POST['paymentstatus'];
    
    
    // Update booking data in the database
    $update_sql = "UPDATE bookings SET paymentstatus='$paymentstatus' WHERE booking_id=$id";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success_p'] = "Booking updated successfully";
        header('location: ../bookings.php');
        exit();
    } else {
        $_SESSION['error_p'] = "Error updating booking: " . $conn->error;
    }
}




// Check if Bus ID is provided
if(isset($_GET['bus_id'])) {

    // GET the bus ID
    $id = $_GET['bus_id'];

    $sql = "SELECT * FROM buses WHERE bus_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $bus = $result->fetch_assoc();

        $id = $bus['bus_id'];
        $busnumber = $bus['busnumber'];
        $capacity = $bus['capacity'];
        $status = $bus['status'];
        
    }
} 

// Check if form is submitted
if (isset($_POST['updatebus'])) {
    // Get form data
    $id = $_POST['id'];
    $busnumber = $_POST['busnumber'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    
    // Update bus data in the database
    $update_sql = "UPDATE buses SET bus_id='$id', busnumber='$busnumber', capacity='$capacity', status='$status' WHERE bus_id=$id";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success_p'] = "Bus updated successfully";
        header('location: ../buses.php');
        exit();
    } else {
        $_SESSION['error_p'] = "Error updating bus: " . $conn->error;
    }
}



// Check if location ID is provided
if(isset($_GET['location_id'])) {

    // GET the location ID
    $id = $_GET['location_id'];

    $sql = "SELECT * FROM locations WHERE location_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $location = $result->fetch_assoc();

        $id = $location['location_id'];
        $city = $location['city'];
        $county = $location['county'];
        
    }
} 

// Check if form is submitted
if (isset($_POST['updatelocation'])) {
    // Get form data
    $id = $_POST['id'];
    $city = $_POST['city'];
    $county = $_POST['county'];

    
    // Update location data in the database
    $update_sql = "UPDATE locations SET location_id='$id', city='$city', county='$county' WHERE location_id=$id";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success_p'] = "location updated successfully";
        header('location: ../locations.php');
        exit(); 
    } else {
        $_SESSION['error_p'] = "Error updating location: " . $conn->error;
    }
}



// Check if schedules ID is provided
if(isset($_GET['schedule_id'])) {

    // Get the schedules ID
    $id = $_GET['schedule_id'];

    $sql = "SELECT * FROM schedules WHERE schedule_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $schedule = $result->fetch_assoc();

        $id = $schedule['schedule_id'];
        $sdate = $schedule['sdate'];
        $busnumber = $schedule['bus'];
        $origin = $schedule['origin'];
        $destination = $schedule['destination'];
        $departuretime = $schedule['departuretime'];
        $fare = $schedule['fare'];
        
    }
}

// Check if form is submitted
if (isset($_POST['updateschedule'])) {
    // Get form data
    $id = $_POST['id'];
    $sdate = $_POST['sdate'];
    $busnumber = $_POST['bus'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departuretime = $_POST['departuretime'];
    $fare = $_POST['fare'];
    
    
    // Update schedule data in the database
    $update_sql = "UPDATE schedules SET sdate='$sdate', bus='$busnumber', 
    origin='$origin', destination='$destination', departuretime='$departuretime', fare='$fare' WHERE schedule_id=$id";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success_p'] = "schedule updated successfully";
        header('location: ../schedules.php');
        exit();
    } else {
        $_SESSION['error_p'] = "Error updating schedule: " . $conn->error;
    }
}




// Check if drivers ID is provided
if(isset($_GET['driver_id'])) {

    // Get the drivers ID
    $id = $_GET['driver_id'];

    $sql = "SELECT * FROM drivers WHERE driver_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $driver = $result->fetch_assoc();

        $id = $driver['driver_id'];
        $name = $driver['name'];
        $phonenumber = $driver['phonenumber'];
        $email = $driver['email'];
        $idpassport = $driver['idpassport'];
        
    }
} 

// Check if form is submitted
if (isset($_POST['updatedriver'])) {
    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $idpassport = $_POST['idpassport'];
    
    
    // Update driver data in the database
    $update_sql = "UPDATE drivers SET name='$name', phonenumber='$phonenumber', 
    email='$email', idpassport='$idpassport' WHERE driver_id=$id";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success_p'] = "driver updated successfully";
        header('location: ../drivers.php');
        exit();
    } else {
        $_SESSION['error_p'] = "Error updating driver: " . $conn->error;
    }
}





?>