<?php
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
$interest = trim($_POST['interest'] ?? '');
$date = trim($_POST['date'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '') {
  respond(false, 'Please fill all required fields.');
}

$to = 'you@example.com'; // TODO: replace with your email
$subject = 'New Booking Request - Study in Italy';
$body = "Name: $name\nEmail: $email\nPhone: $phone\nInterested Programs: $interest\nPreferred Date: $date\n\nNotes:\n$message\n";
$headers = 'From: no-reply@example.com' . "\r\n" . 'Reply-To: ' . $email;

if (@mail($to, $subject, $body, $headers)) {
  respond(true, 'Booking request received! We will confirm via email.');
} else {
  respond(false, 'Failed to submit booking. Please try again later.');
}


