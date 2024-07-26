<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Connect to the database
require '../classes/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the clothing item details
    $query = "SELECT * FROM clothing_items WHERE id = '$id'";
    $result = $conn->query($query);
    $item = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sizes = json_encode($_POST['sizes']);
    
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp, "uploads/$photo");
        $query = "UPDATE clothing_items SET name = '$name', photo = 'uploads/$photo', price = '$price', sizes = '$sizes' WHERE id = '$id'";
    } else {
        $query = "UPDATE clothing_items SET name = '$name', price = '$price', sizes = '$sizes' WHERE id = '$id'";
    }
    
    if ($conn->query($query) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Clothing Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Clothing Item</h2>
        <form method="post" action="edit_clothing_item.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
                <small class="form-text text-muted">Leave blank to keep the current photo.</small>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sizes">Sizes</label>
                <select class="form-control" id="sizes" name="sizes[]" multiple required>
                    <?php foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size): ?>
                        <option value="<?php echo $size; ?>" <?php echo in_array($size, json_decode($item['sizes'], true)) ? 'selected' : ''; ?>><?php echo $size; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
