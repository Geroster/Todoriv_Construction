<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "your-company-email@example.com";
    $subject = "New Contact Form Submission";
    
    $email_content = "Name: $name\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    
    $headers = "From: $email";
    
    mail($to, $subject, $email_content, $headers);
    
    // Redirect back to the thank you page
    header("Location: thank-you.html");
}
?> 