<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            position: relative;
            height: 100vh; /* Full viewport height */
            overflow: hidden; /* Ensure no scroll bars */
        }
        .carousel-inner {
            height: 100%;
        }
        .carousel-item img {
            width: 100%;
            height: 100vh; /* Full viewport height for images */
            object-fit: cover; /* Ensure the image covers the area without distortion */
        }
        .carousel-caption {
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            color: white; /* Ensure text is readable */
        }
        .category-img {
            width: 90%;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">COLORSHOP</a>
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

<!-- Hero Section with Carousel -->
<div id="heroCarousel" class="carousel slide hero-section" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#heroCarousel" data-slide-to="1"></li>
        <li data-target="#heroCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/image.jpg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h1>Get up to 30% Off New Arrivals</h1>
                <a href="#" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../images/6.jpg" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h1>Explore Our Latest Collections</h1>
                <a href="#" class="btn btn-primary">Discover More</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../images/7.jpg" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h1>Seasonal Sale is Here</h1>
                <a href="#" class="btn btn-primary">Shop Sale</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<!-- Introduction Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Welcome to COLORSHOP</h2>
            <p>At COLORSHOP, fashion is an art. We offer a diverse range of stylish and high-quality clothing that reflects individuality and current trends. Our goal is to provide affordable, comfortable apparel that helps you express your unique style. Discover your next favorite outfit with us!</p>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <img src="../images/1.jpg" alt="Women's" class="category-img">
            <h2>Women's</h2>
        </div>
        <div class="col-md-4">
            <img src="../images/3.jpg" alt="Accessories" class="category-img">
            <h2>Accessories</h2>
        </div>
        <div class="col-md-4">
            <img src="../images/2.jpg" alt="Men's" class="category-img">
            <h2>Men's</h2>
        </div>
    </div>
</div>
<BR><BR></BR></BR>
<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>At COLORSHOP, fashion is an art. 
                    We offer a diverse range of stylish and high-quality clothing that reflects individuality and current trends.
                     Our goal is to provide affordable, comfortable apparel that helps you express your unique style. Discover your next favorite outfit with us!</p>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
