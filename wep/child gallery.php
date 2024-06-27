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

        <style>
    .child-segment {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    .child-segment .ui.image img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
    }

.child-details .description {
    display: flex;
    align-items: center;
    flex-grow: 1; /* Allow this container to take up the remaining space */
}
.child-details .description .item {
    margin-right: 20px; /* Add margin between items */
}
    .button {
        margin-top: 30px;
        background-color: grey;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px;
    }
    .button:hover {
        background-color: burlywood;
        color: white;
    }
    .gallery{
        margin-top: 80px;
    }
  
</style>

<!-- PHP Loop to Fetch and Display Children -->
<div class="ui container">
    <h1 class="gallery">Child Gallery</h1>
    
    <?php
        $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dob = $row["cdob"];
                $age = (date('Y') - date('Y',strtotime($dob)));
    ?>

    <div class="child-segment">
        <div class="ui image">
            <img src="img/defaultimg.png" alt="Child Image">
        </div>
        <div class="child-details">
            <div class="meta">
                <strong>Child Details:</strong>
            </div>
            <div class="description">
                <div class="item">Name: <br><?php echo $row["cname"]; ?></></div>
                <div class="item">Age: <br><?php echo $age; ?></strong></div>
                <div class="item">Class: <br><?php echo $row["cclass"]; ?></strong></div>
                <div class="item">Year of enroll: <br><?php echo $row["cyoe"]; ?></br></div>
            </div>
            <div class="extra">
                <a class="button" href="./Donate.php">Donate</a>
                <a class="button" href="./child-details.php?cid=<?php echo $row['cid']; ?>">Sponsor</a>
                <a class="button" href="./send gift.php?cid=<?php echo $row['cid']; ?>">Send a gift</a>
            </div>
        </div>
    </div>

    <?php
            }
        } else {
            echo "<p>No results found</p>";
        }
    ?>
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



