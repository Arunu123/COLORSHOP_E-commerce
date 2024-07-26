<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions - COLORSHOP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .promotion-section {
            padding: 50px 0;
        }
        .promotion-img {
            width: 100%;
            height: auto;
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start slightly down */
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .promotion-item {
            margin-bottom: 30px;
        }
        .visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">COLORSHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            
            <li class="nav-item"><a class="nav-link" href="promotion.php">Promotion</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">My Profile</a></li>
        </ul>
    </div>
</nav>

<!-- Promotion Section -->
<div class="container promotion-section">
    <h2>Current Promotions</h2>
    <p>Check out our latest promotions and discounts!</p>
    <div class="row">
        <div class="col-md-4 promotion-item">
            <img src="../images/5.avif" alt="Promotion 1" class="promotion-img">
            <h3>Summer Sale</h3>
            <p>Get up to 50% off on summer collections!</p>
        </div>
        <div class="col-md-4 promotion-item">
            <img src="../images/6.avif" alt="Promotion 2" class="promotion-img">
            <h3>Buy 1 Get 1 Free</h3>
            <p>Buy one, get one free on selected items!</p>
        </div>
        <div class="col-md-4 promotion-item">
            <img src="../images/5.jpg" alt="Promotion 3" class="promotion-img">
            <h3>Free Shipping</h3>
            <p>Free shipping on orders over $100!</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>At COLORSHOP, fashion is an art. We offer a diverse range of stylish and high-quality clothing that reflects individuality and current trends. 
                    Our goal is to provide affordable, comfortable apparel that helps you express your unique style. Discover your next favorite outfit with us!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="index.php" class="text-dark">Home</a></li>
                    <li><a href="#" class="text-dark">Shop</a></li>
                    <li><a href="promotion.php" class="text-dark">Promotion</a></li>
                    <li><a href="contact.php" class="text-dark">Contact</a></li>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    $(document).ready(function() {
        // Check if element is in viewport
        function isInViewport(element) {
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            return elementBottom > viewportTop && elementTop < viewportBottom;
        }

        // Add visible class to elements in viewport
        function checkElementsInViewport() {
            $('.promotion-img').each(function() {
                if (isInViewport(this)) {
                    $(this).addClass('visible');
                }
            });
        }

        // Check elements on scroll and on page load
        $(window).on('scroll resize', checkElementsInViewport);
        checkElementsInViewport();
    });
</script>
</body>
</html>
