<?
$to = "aibekseitzhan002@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent from PHP.";
$headers = "From: sender@example.com\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

?>