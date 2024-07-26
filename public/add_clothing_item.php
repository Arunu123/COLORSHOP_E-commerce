<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Connect to the database
require '../classes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sizes = $_POST['sizes'];

    // Convert the sizes array to a JSON string
    $sizes_json = json_encode($sizes);

    // Handle the photo upload
    $photo = $_FILES['photo'];
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    $photo_name = $upload_dir . basename($photo['name']);
    move_uploaded_file($photo['tmp_name'], $photo_name);

    // Insert the item into the database
    $query = "INSERT INTO clothing_items (name, photo, price, sizes, published) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $published = 1; // Automatically publish the item
    $stmt->bind_param('ssdsi', $name, $photo_name, $price, $sizes_json, $published);

    if ($stmt->execute()) {
        header('Location: admin_dashboard.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
