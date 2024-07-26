<?php
session_start();
require '../classes/db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$user_query = "SELECT username FROM users WHERE id = ?";
$user_stmt = $conn->prepare($user_query);
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user = $user_result->fetch_assoc();

// Fetch clothing item details
$item_id = $_GET['id'];
$item_query = "SELECT * FROM clothing_items WHERE id = ?";
$item_stmt = $conn->prepare($item_query);
$item_stmt->bind_param("i", $item_id);
$item_stmt->execute();
$item_result = $item_stmt->get_result();
$item = $item_result->fetch_assoc();

if (!$item) {
    echo "Item not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updatePrice() {
            const price = <?php echo $item['price']; ?>;
            const quantity = document.getElementById('quantity').value;
            const total = price * quantity;
            document.getElementById('total-price').innerText = 'Total Price: $' + total.toFixed(2);
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">COLORSHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Welcome, <?php echo htmlspecialchars($user['username']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Buy Now</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($item['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                        <p class="card-text">Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                        <p class="card-text">Sizes: <?php echo htmlspecialchars($item['sizes']); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Purchase Details</h3>
                <p>Complete the form below to finalize your purchase:</p>
                <form action="payment.php" method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                    <input type="hidden" name="price" id="hidden-price" value="<?php echo $item['price']; ?>">
                    <input type="hidden" name="total_price" id="hidden-total-price" value="<?php echo $item['price']; ?>">
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <select class="form-control" id="size" name="size" required>
                            <?php 
                            $sizes = explode(',', $item['sizes']);
                            foreach ($sizes as $size) {
                                echo "<option value=\"" . htmlspecialchars($size) . "\">" . htmlspecialchars($size) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required oninput="updatePrice()">
                    </div>
                    <p id="total-price">Total Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo htmlspecialchars($user['username']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
        <label for="payment">Payment Method:</label>
        <select name="payment" id="payment" class="form-control" required>
            <option value="">Select Payment Method</option>
            <option value="credit_card">Credit Card</option>
            <option value="paypal">PayPal</option>
            <!-- Add more payment methods as needed -->
        </select>
    </div>
                    <button type="submit" class="btn btn-success">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
    
    <br><br><br><br><br><br><br>
    <footer class="footer">
       <center> <p>&copy; 2024 COLORSHOP. All rights reserved.</p></center>
    </footer>

    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            const price = <?php echo $item['price']; ?>;
            const quantity = this.value;
            const total = price * quantity;
            document.getElementById('total-price').innerText = 'Total Price: $' + total.toFixed(2);
            document.getElementById('hidden-total-price').value = total.toFixed(2);
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
