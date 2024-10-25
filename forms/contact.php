<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "roger4lk@dukes.jmu.edu";  // Recipient email address
    $subject = "Form Submission from " . $_POST["name"];
    $message = $_POST["message"];
    $headers = "From: " . $_POST["email"];

    // Send email
    if (mail($to, $subject, $message, $headers)) {
      echo "Email sent successfully!";
    } else {
      echo "Failed to send email.";
    }
  }
?>
