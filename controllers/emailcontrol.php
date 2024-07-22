<?php

require_once 'vendor/autoload.php';
require_once 'connect/constants.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to send email verification link
function sendVerificationEmail($email, $token)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL; // SMTP username
        $mail->Password = PASSWORD; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom(EMAIL, 'Eticketing');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Verify your email address';
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">
                <p>
                    Thank you for signing up on our Eticketing. Please click the link below to verify your email.
                </p>
                <a href="http://localhost/SchoolProject/Final_Project/home.php?token=' . $token . '">
                    Verify Email Address
                </a>
            </div>
        </body>
        </html>';

        $mail->send();
        echo 'Verification email sent successfully.';
    } catch (Exception $e) {
        echo "Failed to send verification email. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to send password reset email
function sendPasswordResetLink($email, $token)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL; // SMTP username
        $mail->Password = PASSWORD; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom(EMAIL, 'Eticketing');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset your password';
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password</title>
        </head>
        <body>
            <div class="wrapper">
                <p>
                    Hello there,
                    Please click the link below to reset your password.
                </p>
                <a href="http://localhost/SchoolProject/Final_Project/home.php?password-token=' . $token . '">
                    Reset Your Password
                </a>
            </div>
        </body>
        </html>';

        $mail->send();
        echo 'Password reset email sent successfully.';
    } catch (Exception $e) {
        echo "Failed to send password reset email. Mailer Error: {$mail->ErrorInfo}";
    }
}



// Function to send email booking details
function sendBookingDetails($email, $bookingcode, $seats, $scheduleId)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL; // SMTP username
        $mail->Password = PASSWORD; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom(EMAIL, 'Eticketing');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Details';
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">
                <p>
                    Thank you for booking on our Eticketing. Please find below your travel details.
                </p>
                <table>
                    <tr>
                        <th>Route</th>
                        <th>Seats Booked</th>
                        <th>Booking Code</th>
                    </tr>
                    <tr>
                        <td>' .  $scheduleId . '</td>
                        <td>' . $seats . '</td>
                        <td>' . $bookingcode . '</td>
                    </tr>
                
                </table>
            </div>
        </body>
        </html>';

        $mail->send();
        echo 'Booking email sent successfully.';
    } catch (Exception $e) {
        echo "Failed to send Booking email. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
