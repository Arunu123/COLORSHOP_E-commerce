<?php
session_start();
require '../classes/db_connection.php';// Include your database connection file

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$role = $_POST['role'];

// Validate role input
if ($role !== 'user' && $role !== 'admin') {
    die('Invalid role selected.');
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare SQL query to insert data into the database
$query = "INSERT INTO users (username, email, password, address, telephone, role) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssssss', $username, $email, $hashed_password, $address, $telephone, $role);

// Execute the query
if ($stmt->execute()) {
    // Registration successful
    $_SESSION['user_id'] = $stmt->insert_id; // Store the newly created user's ID
    $_SESSION['role'] = $role;

    // Redirect to the appropriate dashboard
    if ($role === 'admin') {
        header('Location: admin_dashboard.php');
    } else {
        header('Location: user_dashboard.php');
    }
    exit();
} else {
    // Registration failed
    echo 'Error: ' . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
