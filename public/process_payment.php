<?php
session_start();
require '../classes/db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$item_id = $_POST['item_id'] ?? null;
$total_price = $_POST['total_price'] ?? null;
$name = $_POST['name'] ?? null;
$address = $_POST['address'] ?? null;
$payment_method = $_POST['payment_method'] ?? null;
$card_number = $_POST['card_number'] ?? null;
$expiry_date = $_POST['expiry_date'] ?? null;
$cvv = $_POST['cvv'] ?? null;

if (!$item_id || !$total_price || !$name || !$address || !$payment_method || !$card_number || !$expiry_date || !$cvv) {
    echo "Missing required form data.";
    exit();
}

// Server-side validation
if (!preg_match('/^\d{16}$/', $card_number)) {
    echo "Invalid card number.";
    exit();
}

if (!preg_match('/^\d{3}$/', $cvv)) {
    echo "Invalid CVV.";
    exit();
}

if (!preg_match('/^(0[1-9]|1[0-2])\/\d{4}$/', $expiry_date)) {
    echo "Invalid expiry date format. Use MM/YYYY.";
    exit();
}

list($month, $year) = explode('/', $expiry_date);
if (strtotime($year . '-' . $month . '-01') < time()) {
    echo "Expiry date cannot be in the past.";
    exit();
}

// Sanitize and validate the input data
$item_id = htmlspecialchars($item_id);
$total_price = htmlspecialchars($total_price);
$name = htmlspecialchars($name);
$address = htmlspecialchars($address);
$payment_method = htmlspecialchars($payment_method);
$card_number = htmlspecialchars($card_number);
$expiry_date = htmlspecialchars($expiry_date);
$cvv = htmlspecialchars($cvv);

// Prepare and execute the SQL statement to insert payment details into the database
$query = "INSERT INTO payments (user_id, item_id, total_price, name, address, payment_method, card_number, expiry_date, cvv, payment_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("iisssssss", $_SESSION['user_id'], $item_id, $total_price, $name, $address, $payment_method, $card_number, $expiry_date, $cvv);

if ($stmt->execute()) {
    echo "Payment successful!";
    // Optionally, you can redirect the user to a confirmation page or their order history
    // header('Location: confirmation.php');
} else {
    echo "Error processing payment: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
