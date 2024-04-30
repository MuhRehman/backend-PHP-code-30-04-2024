<?php

// To Remove unwanted errors
// error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Add your connection Code
// include "connection.php";

header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$mysqli = new mysqli("localhost", "root", "", "bazaar_db");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

    // echo "Successfully to connect to MySQL: ";


// Important Files (Please check your file path according to your folder structure)
// require "./PHPMailer-master/src/PHPMailer.php";
// require "./PHPMailer-master/src/SMTP.php";
// require "./PHPMailer-master/src/Exception.php";
require "./PHPMailer.php";
require "./SMTP.php";
require "./Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$send_to_email = $_POST["email"];

// Generate Random 6-Digit OTP
$verification_otp = random_int(100000, 999999);

// Full Name of User
$send_to_name = $_POST["username"];

function sendMail($send_to, $otp, $name) {

   
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "m.rehman5353@gmail.com";
    $mail->Password = "yihusyqiewgduras";
    
    // Your email ID and Email Title
    $mail->setFrom("m.rehman5353@gmail.com", "Online Bazzar");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, {$name}\nYour account registration is successfully Online Bazaar!.";
    $mail->send();
  
    echo "Successfully to connect to Sent  123456";
}

sendMail($send_to_email, $verification_otp, $send_to_name);

// Message to print email success!
echo "Email Sent Successfully!";

?>