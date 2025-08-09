<?php
// Simple mail handler. Ensure mail() is configured on your server.
// Alternatively, replace this with Formspree or another API.

header('Content-Type: application/json');

function respond($ok, $message) {
  echo json_encode([ 'success' => $ok, 'message' => $message ]);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  respond(false, 'Invalid request.');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
  respond(false, 'Please fill all required fields.');
}

$to = 'you@example.com'; // TODO: replace with your email
$subject = 'New Contact Form Submission - Study in Italy';
$body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message\n";
$headers = 'From: no-reply@example.com' . "\r\n" . 'Reply-To: ' . $email;

if (@mail($to, $subject, $body, $headers)) {
  respond(true, 'Thank you! We will reach out shortly.');
} else {
  respond(false, 'Failed to send email. Please try again later.');
}


