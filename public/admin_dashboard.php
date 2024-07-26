<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Connect to the database
require '../classes/db_connection.php';

// Fetch clothing items from the database
$query = "SELECT * FROM clothing_items";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .clothing-item {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">COLORSHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="connection.php">User_request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <p></p>

        <div class="form-container mb-5">
            <h3>Add Clothing Item</h3>
            <form method="post" action="add_clothing_item.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="sizes">Sizes</label>
                    <select class="form-control" id="sizes" name="sizes[]" multiple required>
                        <?php foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size): ?>
                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-muted">Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.</small>
                </div>
                <button type="submit" class="btn btn-primary">Add Item</button>
            </form>
        </div>

        <h3 class="mb-4">Clothing Items</h3>
        <div class="row">
            <?php while ($item = $result->fetch_assoc()): ?>
            <div class="col-md-4 clothing-item">
                <div class="card">
                    <img src="<?php echo $item['photo']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <p class="card-text">Price: $<?php echo $item['price']; ?></p>
                        <?php 
                        $sizes = json_decode($item['sizes'], true);
                        if (is_array($sizes) && !empty($sizes)) {
                            echo '<p class="card-text">Sizes: ' . implode(', ', $sizes) . '</p>';
                        } else {
                            echo '<p class="card-text">Sizes: Not available</p>';
                        }
                        ?>
                        <a href="edit_clothing_item.php?id=<?php echo $item['id']; ?>" class="btn btn-warning">Edit</a>
                        <form method="post" action="delete_clothing_item.php" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    
    <footer class="footer mt-5 text-center">
        <p>&copy; 2024 COLORSHOP. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><
