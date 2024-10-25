<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      exit();
    }

    // Email details
    $to = "example@example.com";  // Replace with your email address
    $full_subject = "Contact Form: " . $subject;
    $body = "You have received a new message from $name ($email).\n\n" . "Message:\n$message";
    $headers = "From: $email" . "\r\n" . "Reply-To: $email";

    // Send the email
    if (mail($to, $full_subject, $body, $headers)) {
      echo "Your message has been sent. Thank you!";
    } else {
      echo "Failed to send email.";
    }
  } else {
    echo "Invalid request method";
  }
?>
