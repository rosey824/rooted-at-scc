<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    // Define the recipient email addresses
    $to = "erose@scciowa.edu"; // Replace with actual email addresses

    // Define the email subject
    $subject = "New Rooted Contact Form Submission";

    // Construct the email message
    $message = "Name: $name\nPhone: $phone\nEmail: $email";

    // Define the email headers
    $headers = "From: webmaster@example.com" . "\r\n" . // Replace with your "From" email
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
