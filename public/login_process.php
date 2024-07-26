<?php
session_start();
require '../classes/db_connection.php';// Make sure to include your database connection file

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query to check user credentials
$query = "SELECT * FROM users WHERE email = ? AND role = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $email, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] === 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit();
    }
}

echo 'Invalid credentials or role.';
?>
