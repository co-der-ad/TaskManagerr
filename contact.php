<?php
session_start();
require_once('includes/config.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert form data into the database
    $query = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if($result) {
        echo "<script>alert('Your message has been sent successfully. We will get back to you soon.');</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tooplate's Little Fashion - Contact Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css"/>
    <link href="css/tooplate-little-fashion.css" rel="stylesheet">
</head>
<body>
<section class="preloader">
    <div class="spinner">
        <span class="sk-inner-circle"></span>
    </div>
</section>

<main>

<nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                        <strong><span>Task</span> Manager</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="signin.php" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.php" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="admin_login.html">Admin</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="signin.php" class="bi-person custom-icon me-3"></a>

                            <a href="product-detail.php" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>


    <header class="site-header section-padding-img site-header-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 header-info">
                    <h1>
                        <span class="d-block text-primary">Say hello to us</span>
                        <span class="d-block text-dark">love to hear you</span>
                    </h1>
                </div>
            </div>
        </div>
        <img src="images/header/positive-european-woman-has-break-after-work.jpg" class="header-image img-fluid" alt="">
    </header>

    <section class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Let's <span>begin</span></h2>
                    <form class="contact-form me-lg-5 pe-lg-3" role="form" method="post">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                            <label for="name">Full name</label>
                        </div>
                        <div class="form-floating my-4">
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating my-4">
                            <input type="subject" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                            <label for="subject">Subject</label>
                        </div>
                        <div class="form-floating mb-4">
                            <textarea id="message" name="message" class="form-control" placeholder="Leave a comment here" required style="height: 160px"></textarea>
                            <label for="message">Tell us about the project</label>
                        </div>
                        <div class="col-lg-5 col-6">
                            <button type="submit" name="submit" class="form-control">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12 mt-5 ms-auto">
                    <!-- Contact info -->
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.php">Task</a> Manager</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2024 <strong>Task Management System</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">TMS</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
