<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$name = htmlspecialchars($_POST["name"]);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST["message"]);

  // ===== EMAIL TO YOU =====
$to = "yourname@email.com";
$subject = "Portfolio Contact: $name";
$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
$headers = "From: $email";

mail($to, $subject, $body, $headers);

  // ===== VERIFICATION EMAIL TO RECRUITER =====
$confirmSubject = "Thanks for contacting me";
$confirmBody = "Hi $name,\n\nThanks for reaching out through my portfolio.
I’ve received your message and will respond as soon as possible.\n\n— Your Name";
$confirmHeaders = "From: yourname@email.com";

mail($email, $confirmSubject, $confirmBody, $confirmHeaders);

echo "Message sent successfully.";
}
?>