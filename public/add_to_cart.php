<?php
session_start();
require '../classes/db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$item_id = $_GET['id'];

// Check if the cart session array exists, if not create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add the item to the cart
if (!in_array($item_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $item_id;
}

header('Location: cart.php');
exit();
?>
