<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "tahri.houssam1@gmail.com";
    $subject = "New Contact Form Submission";

    $name = strip_tags(trim($_POST["full-name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone-number"]));
    $message = strip_tags(trim($_POST["message"]));

    $email_content = "You have received a new message from your website contact form:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        echo "Success";
    } else {
        echo "Error sending message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission.";
}
?>
