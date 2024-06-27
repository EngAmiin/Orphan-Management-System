<?php

include '../application/config/conn.db.php'

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bilciye management system</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
* Template Name: Append
* Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
* Updated: Mar 17 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
    <!-- <style>
        .hidden-inputs {
            display: none;
        }
    </style> -->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <!-- End Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between ">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="text-dark " style="font-size:36px">Bilciye</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="./index.php#hero" class="active text-dark " style="font-size:24px">Home</a></li>
                    <li><a href="./child gallery.php" class="text-dark " style="font-size:24px">Child Gallery</a></li>

                    <li><a href="./Donate.php" class="text-dark" style=" font-size:24px">Donate</a></li>
                    <li><a href="./photo gallery.php" class="text-dark " style="font-size:24px">Photo Gallery</a></li>
                    <li><a href="./programs.php" class="text-dark " style="font-size:24px">Programs</a></li>
                    <li><a href="./feedback.php" class="text-dark " style="font-size:24px">Feedback</a></li>
                  
                   
                    <button id="pointsButton" class="btn btn-success rounded-circle points" style="font-size:16px"
                        title="points"></button </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav><!-- End Nav Menu -->

            <div>
                <!-- <a class="btn-getstarted btn btn-success text-white bg-success" href="./request.php"><span
                        style="font-size:16px">Codso</span></a> -->
                <a class="signup logout text-white btn bg-danger" style="cursor:pointer"><span
                        style="font-size:16px">logout</span></a>

            </div>


        </div>
    </header>

    <main id="main">
        <section id="about" class="bg-white">



        </section>
        <!-- Report Section - Home Page -->
        <section id="contact" class="contact">



<section id="photo" class="photo">

<div class="ui container">
    <div class="ui grid">
        <!-- right content -->
        <div class="twelve wide column">
            <h1>Photo Gallery</h1>
            <!-- <p><strong>CCDF</strong> is a non-profit, non-government and voluntary organization committed to the care & development and voluntary organization committed to the care and development of the underprivileged children.</p>
            <p><strong>CCDF is a group</strong> of quanlified, hardworking, dedicated, like-minded people trying to make a difference in the life of the underrepresented, disadvantaged and marginalized sections of the society. It have been established to work as a platform to channelize and make optimum use of the resources and infrastructure available and people's desire to give back to society a bit of what they owe to it.</p>
            <p><strong>It is out effort</strong> at CCDF to guide and motivate people to use their resources in a construction in changing the lives of these street children.</p> <p><strong>We are working</strong> in the field of education and over all development of the destitute children by providing then with an opportunity to realize their full potentials and lead a dignified and respectable life.</p> -->

            <h2 class="ui block header">AAKAR - the first step</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-1.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-2.png">
                <img class="ui medium rounded image" src="img/orphan-gallery-3.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-4.jpg">
            </div>

            <h2 class="ui block header">AHAR APURTI</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-5.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-6.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-7.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-8.jpg">
            </div>

            <h2 class="ui block header">AVSAR - a chance</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-9.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-10.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-11.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-12.jpg">
            </div>

            <h2 class="ui block header">Lakshya</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-13.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-14.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-15.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-16.jpg">
            </div>

            <h2 class="ui block header">PARIVARTAN - change of direction</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-17.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-18.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-19.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-20.jpg">
            </div>
            
            <h2 class="ui block header">UPHAAR - gift a smile</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/orphan-gallery-1.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-3.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-5.jpg">
                <img class="ui medium rounded image" src="img/orphan-gallery-7.jpg">
            </div>
            
            <h2 class="ui block header">RAKTHADHAAN - save a child</h2>
            <div class="ui medium images">
                <img class="ui medium rounded image" src="img/blooddonationcamp1.jpg">
                <img class="ui medium rounded image" src="img/blooddonationcamp2.jpg">
                <img class="ui medium rounded image" src="img/blooddonationcamp3.jpg">
                <img class="ui medium rounded image" src="img/blooddonationcamp4.jpg">
            </div>

            <span class="p-20"></span>
        </div>
    </div>

</div>


  
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

<div class="container footer-top">
    <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
                <span>Bilciye</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                valies darta
                donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links d-flex mt-4">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>

            <p>Mogadishu , Somalia</p>

            <p class="mt-4"><strong>Phone:</strong> <span>+252 610 000000</span></p>
            <p><strong>Email:</strong> <span>bilciye@gmail.org</span></p>
        </div>

    </div>
</div>

<div class="container copyright text-center mt-4">
    <p>&copy; <span>Copyright</span> <strong class="px-1">Bilciye</strong> <span>All Rights Reserved</span></p>

</div>

</footer>

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
<div></div>
<div></div>
<div></div>
<div></div>
</div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="./app.js"></script>
<script src="./app.js"></script>

<script src="./operation.js"></script>


</body>

</html>
