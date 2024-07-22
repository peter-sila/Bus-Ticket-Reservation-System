<?php


session_start();

require 'connect/db_connect.php';
require_once 'controllers/emailcontrol.php';

$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve necessary information from sessions
    $scheduleId = $_SESSION['selected_scheduleid'];
    $userid = $_SESSION['user_id'];
    $numberseats = $_SESSION['selected_seats_count'];
    $seats = implode(', ', $_SESSION['selected_seat_names']); //have stored seat numbers as comma-separated values
    $paymentstatus = "pedding";
    $bookingDate = date("Y-m-d"); // Current date
    $phoneNumber = $_POST['mpesano'];
    $totalfare = $_SESSION['total_amount'];
    $bookingcode = hexdec(substr(md5(uniqid($seats . $totalfare, true)), 0, 6));
    $_SESSION['bookingcode'] = $bookingcode;
    $email = $_SESSION['email'];
    

    if (empty($phoneNumber)) {
        $errors['mpesano'] = "Phone number required";
    } else {
        if (!preg_match('/^(2541|2547)/', $phoneNumber)) {
            $errors['mpesano'] = "Phone number must start with 2541, or 2547";
        }
        if (strlen($phoneNumber) < 10) {
            $errors['mpesano'] = "Phone number must be at least 10 characters long";
        }
    }


    if (count($errors) === 0) {
        // M-Pesa API credentials
        $consumerKey = 'CpAt5V328RRp9nUnobwDGV2pUAqZrVASBcADT18RByA8m8lN';
        $consumerSecret = 'kzrrHfwmhdKDhY8IEpGnEioQTD6gegbgCitiDXl9lBA3MNg1xwbKHBeHifxIs2X5';

        // Get the OAuth token
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $credentials = base64_encode($consumerKey . ':' . $consumerSecret);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($curl);
        if ($response === false) {
            die('Curl error: ' . curl_error($curl));
        }

        $result = json_decode($response);
        if (isset($result->access_token)) {
            $accessToken = $result->access_token;
        } else {
            die('Failed to obtain access token. Response: ' . $response);
        }

        curl_close($curl);

        echo 'Access Token: ' . $accessToken . '<br>';
    

        // Prepare STK Push request
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $timestamp = date('YmdHis');
        $shortcode = '174379';
        $lipaNaMpesaOnlinePasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $password = base64_encode($shortcode . $lipaNaMpesaOnlinePasskey . $timestamp);

        $curl_post_data = array(
            'BusinessShortCode' => $shortcode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $totalfare,  // Change the amount as needed
            'PartyA' => $phoneNumber,
            'PartyB' => $shortcode,
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => 'https://d854-154-155-185-159.ngrok-free.app/SchoolProject/Final_Project/mpesa/callback.php',  // Update with your callback URL
            'AccountReference' => 'Eticketing',
            'TransactionDesc' => 'Payment'
        );

        $data_string = json_encode($curl_post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $response = curl_exec($curl);

        if ($response === false) {
            die('Curl error: ' . curl_error($curl));
        } else {
            echo 'STK Push Response: ' . $response;

            curl_close($curl);
            
            // Insert the booking information into the database
            $insert_sql = "INSERT INTO bookings (scheduleid, userid, paymentnumber, numberseats, seats, fare, paymentstatus, bookingcode, bookingdate) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param('iisisisss', $scheduleId, $userid, $phoneNumber, $numberseats, $seats, $totalfare, $paymentstatus, $bookingcode, $bookingDate);
            
            if ($stmt->execute()) {
            
                // welcome message
                $_SESSION['message'] = "Booking successful!";
                $_SESSION['alert-class'] = "alert-success";

                // sending email to the registered user
               sendBookingDetails($email, $bookingcode, $seats, $scheduleId);

                unset($_SESSION['selected_scheduleid']);
                unset($_SESSION['selected_bus']);
                unset($_SESSION['selected_departuretime']);
                unset($_SESSION['selected_seats_count']);
                unset($_SESSION['selected_seat_names']); //have stored seat numbers as comma-separated values
                unset($_SESSION['total_amount']);

                header('location: successpages/bookingfinish.php');
                exit();

            } else {
                $errors['db_error'] = "Database error: failed to register";
                header('location: successpages/bookingfail.php');
                exit();
            }
        }


       exit();
    } else {
        $_SESSION['error_send'] = "Check the phone number format you entered";
       
    }
}


?>