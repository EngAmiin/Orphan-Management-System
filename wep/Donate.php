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
<style>
        /* Add the above CSS here */
        .fluid.ui.button.click {
            display: inline-block;
            background-color: #e0e0e0;
            color: black;
            text-align: center;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .fluid.ui.button.click:hover {
            background-color: #d0d0d0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

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

        <div class="ui container">       
            <!-- right content -->
            <div class="twelve wide column">
                <h1>Donations</h1>
                <p><strong>Orphan Care & Development Foundation</strong> relies on everyone's commitment to the humanitarian cause and it's underlying values. The strongest possible support from individuals, companies and foundations is essential if we are to meet the challenges we are currently facing. Your support to CCDF is more than just a donation - it is a true act of humanity.</p>
                <p><strong>Let's join</strong> hands and support more and more needy children - the future of any nation and help them come out of their ignorance and other problems which it entails by giving them a gift of education and providing them with all-round support essential for their overall well-being. Your donations are a vital source of income that will allow us to make significant positive impact on the society around us.</p>

                <p><strong>Cash donations</strong> can be made either personally or by sending an account payee Cheque / Draft through mail. (All donations are Tax Exempted U/s 80G of Income Tax Act)</p>
                <p>Info for making DD/Cheque: In favour of - <strong>Orphan Care & Development Foundation</strong> payable at: 'Hyderabad' Please send it to our Hyderabad G.P.O.</p>
                <p>Orphan Care & Development Foundation A-88, Ground Floor, Madhu Vihar, Pajagutta, Bengaluru - 560020. Ph: 080-55555555</p>
                
                <p><a class="fluid ui button click" href="./Donation Application.php">Click here to make your contribution</a></p>
                

                <strong>Guideline for making contribution:</strong>
                <ul>
                    <li>Rs.200/- a month, can give a child Nutrition at learning centre.</li>
                    <li>Rs.300/- a month, can give a child Nutrition & After-school support.</li>
                    <li>Rs.400/- a month, can give a child complete package of Nutritio, health check-up, after-school, celebration of festivals etc.</li>
                    <li>Rs.1000/- a month, can be used for Sensitization & Awareness Programs including Media campaigns, workshops, seminars and capacity building initiatives.</li>
                    <li>Rs.5000/- a month, can be used for Infrastruture set up.</li>
                    <li>Rs.50000/- a month, can be used for Corpus Fund.</li>
                </ul>

                <p><strong>We respect the intention of our donors and use the money donated by them for the purpose intended by the donor.</strong></p>



                <span class="p-20"></span>
            </div>
        </div>

    </div>


        </section><!-- End Report Section -->

    </main>

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

    <script src="./alerts.js"></script>

    <script src="./operation.js"></script>


</body>

</html>