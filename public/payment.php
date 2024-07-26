<?php
session_start();
require '../classes/db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$item_id = $_POST['item_id'];
$price = $_POST['price'];
$total_price = $_POST['total_price'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$address = $_POST['address'];
$payment_method = $_POST['payment'];

// Fetch item details from the database
$query = "SELECT * FROM clothing_items WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $item_id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();

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
    <title>Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var cardNumber = document.getElementById('card_number').value;
            var expiryDate = document.getElementById('expiry_date').value;
            var cvv = document.getElementById('cvv').value;
            var currentDate = new Date();
            var expiryDateObj = new Date(expiryDate);

            if (!/^\d{16}$/.test(cardNumber)) {
                alert('Card number must be exactly 16 digits.');
                return false;
            }

            if (!/^\d{3}$/.test(cvv)) {
                alert('CVV must be exactly 3 digits.');
                return false;
            }

            if (expiryDateObj < currentDate) {
                alert('Expiration date cannot be in the past.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">COLORSHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Payment Details</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($item['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                        <p class="card-text">Size: <?php echo htmlspecialchars($size); ?></p>
                        <p class="card-text">Quantity: <?php echo htmlspecialchars($quantity); ?></p>
                        <p class="card-text">Total Price: $<?php echo htmlspecialchars($total_price); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Finalize Payment</h3>
                <p>Enter your payment details below to complete the purchase:</p>
                <form action="process_payment.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item_id); ?>">
                    <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                    <input type="hidden" name="address" value="<?php echo htmlspecialchars($address); ?>">
                    <input type="hidden" name="payment_method" value="<?php echo htmlspecialchars($payment_method); ?>">
                    <div class="form-group">
                        <label for="card_number">Card Number:</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date:</label>
                        <input type="month" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" required>
                    </div>
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
    
    <br><br><br><br><br><br><br>
    <footer class="footer">
       <center> <p>&copy; 2024 COLORSHOP. All rights reserved.</p></center>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
