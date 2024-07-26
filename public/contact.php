<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - COLORSHOP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('') no-repeat center center fixed;
            background-color: #ddd;
            background-size: cover;
        }
        .contact-section {
            padding: 60px 0;
        }
        .contact-info, .contact-form {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8); /* Lowered opacity */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-section h2 {
            margin-bottom: 30px;
            font-weight: bold;
        }
        .contact-info h3, .contact-form h3 {
            margin-bottom: 20px;
        }
        .contact-info p {
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        .form-control, .form-control-file, .btn {
            border-radius: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer-content {
            padding: 30px 0;
        }
        .footer-content p, .footer-content a {
            color: #6c757d;
            font-size: 0.9em;
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
            
            <li class="nav-item"><a class="nav-link" href="#">Promotion</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">My Profile</a></li>
        </ul>
    </div>
</nav>

<!-- Contact Us Section -->
<div class="container contact-section">
    <h2 class="text-center">Contact Us</h2>
    <p class="text-center">We'd love to hear from you! If you have any questions or feedback, feel free to reach out.</p>
    <div class="row justify-content-center">
        <!-- Contact Information -->
        <div class="col-md-5">
            <div class="contact-info">
                <h3>Contact Information</h3>
                <p><strong>Email:</strong> colorshop@gmail.com</p>
                <p><strong>Phone:</strong> +94 763096425</p>
                <p><strong>Address:</strong> 123 Main Street,Kurunegala </p>
                <p><strong>Working Hours:</strong> 24 Hours Working</p>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="contact-form">
                <h3>Get in Touch</h3>
                <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullName">Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Type your message here" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Attachment (Optional)</label>
                        <input type="file" class="form-control-file" id="attachment" name="attachment">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container footer-content">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>At COLORSHOP, fashion is an art. We offer a diverse range of stylish and high-quality clothing that reflects individuality and current trends. Our goal is to provide affordable, comfortable apparel that helps you express your unique style. Discover your next favorite outfit with us!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Promotion</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
