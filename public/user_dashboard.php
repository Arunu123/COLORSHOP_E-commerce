<?php
session_start();
require '../classes/db_connection.php'; // Adjust the path to your classes folder

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$user_query = "SELECT username FROM users WHERE id = $user_id";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();

// Fetch clothing items from the database
$query = "SELECT * FROM clothing_items WHERE published = 1";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .clothing-item {
            margin-bottom: 20px;
        }
        .clothing-item img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">COLORSHOP</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($user['username']); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2 class="text-center"><center>.........Enjoy Your Shopping..........</center></h2>
    <p></p>

    <h3>Clothing Items</h3>
    <div class="row">
        <?php while ($item = $result->fetch_assoc()): ?>
        <div class="col-md-4 clothing-item">
            <div class="card">
                <img src="<?php echo htmlspecialchars($item['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                    <p class="card-text">Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                    <p class="card-text">Sizes: <?php echo htmlspecialchars($item['sizes']); ?></p>
                    <a href="add_to_cart.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Add to Cart</a>
                    <a href="buy_now.php?id=<?php echo $item['id']; ?>" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
    
<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>At COLORSHOP, fashion is an art. We offer a diverse range of stylish and high-quality clothing that reflects individuality and current trends. Our goal is to provide affordable,
                     comfortable apparel that helps you express your unique style. Discover your next favorite outfit with us!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark">Home</a></li>
                    <li><a href="#!" class="text-dark">Shop</a></li>
                    <li><a href="#!" class="text-dark">Promotion</a></li>
                    <li><a href="#!" class="text-dark">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Follow Us</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#!" class="text-dark"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#!" class="text-dark"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3">
        © 2024 COLORSHOP
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
