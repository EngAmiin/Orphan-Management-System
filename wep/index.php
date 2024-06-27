<?php

include '../application/config/conn.db.php'

?>


<?php
session_start();
// echo $_SESSION['type'];
if (!isset($_SESSION['type'])) {
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
  </head>

  <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 style="font-size:36px">Bilciye</h1>
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
              title="points"></button>
          </ul>

          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

        <!-- <div>
          <a class="btn-getstarted" href="index.html#about">Codso</a>
          <a class="signup logout" style="cursor:pointer">Logout</a>
        </div> -->
          <div>
          <a class="btn-getstarted" href="../application/view/pages-sign-in.php" style="font-size:18px">Login</a>
          <!-- <a class=" signup" href="index.html#about">Signup</a>   -->
        </div>



      </div>
    </header><!-- End Header -->

    <main id="main">

      <!-- Hero Section - Home Page -->
      <section id="hero" class="hero">

        <img
          src="../application/uploads/b1.jpg"
          alt="" data-aos="fade-in">

        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <h2 data-aos="fade-up" data-aos-delay="100">KUSOO DHAWAADA BILCIYE </h2>
              <p data-aos="fade-up" data-aos-delay="200">kuso Dhawaada Bilciye Waxaan Ka Shaqaynaa Qurxinta Deegaanka Iyo
                Bilicda Dalka</p>
            </div>
            <div class="col-lg-5">
              <input type="submit" class="btn btn-primary" value="Wax badan naga ogaaw...">
            </div>
          </div>
        </div>



        <div class="ui container">

<!-- BODY Content -->
<div class="ui grid">
   
    
    <!-- right content -->
    <div class="twelve wide column">
        <h1>Sponsor this Child</h1>


        <?php

            if(isset($_POST['submit'])) {
                $cid = $_GET['cid'];
                $noofyear = $_POST['noofyear'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $amount = $_POST['amount'];
                $checkno = $_POST['checkno'];

                $sql = "INSERT INTO sponsorer (spn_firstname, spn_lastname, spnd_date, spn_noofyears, spn_email, spn_phone, spn_bill_address, spn_amount, spn_checkno, cid) 
                            VALUES ('$firstname', '$lastname', NOW(), '$noofyear', '$email', '$phone', '$address', '$amount', '$checkno', '$cid')";
                        
                $sql2 = "UPDATE children SET sponsored=1 WHERE cid='$cid' ";

                if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                        $unsponsored_page = './child-gallery-sponsored.php';
                        header('Location: ' . $unsponsored_page);
                        echo "<script> alert('New record created successfully'); </script>";
                } else {
                    echo "<script> alert('Error in Insertion'); </script>";
                }
                $conn->close();
            } else {

            }

        ?>



      </section><!-- End Hero Section -->





      <!-- About Section - Home Page -->
      <section id="about" class="about">




<section id="child" class="child">








 



    
<style>
    .child-detailss {
        display: flex;
        align-items: center;
    }
    .child-detailss img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 20px;
    }
    .child-detailss .description {
        display: flex;
        flex-direction: column;
    }
    .ui.form .field label {
        font-weight: bold;
    }
</style>







  </section><!-- End About Section -->



  
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="container footer-top">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Bilciye</span>
            </a>
            <p>kuso dhawaada bilciye Waxaan ka shaqaynaa qurxinta deegaanka iyo Bilicda Dalka . " Soo aruuri
              caagaga/Bacaha oo hel dhibco kuna badalo adeeg bilaash ah".</p>
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

    </footer><!-- End Footer -->

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
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="./app.js"></script>
    <script src="./operation.js"></script>


  </body>

  </html>

  <?php
} else {
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
  </head>

  <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 style="font-size:36px">Bilciye</h1>
          <span>.</span>
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php#hero" class="active" style="font-size:24px">Home</a></li>
            <li><a href="index.php#about" style="font-size:24px">About</a></li>


            <li><a href="index.php#contact" style="font-size:24px">Contact</a></li>
            <li><a href="./reports.php" style="font-size:24px">Report Illegal Dump</a></li>
            <li><a href="./requests.php" style="font-size:24px">Request Pickup</a></li>
            <button id="pointsButton" class="btn btn-success rounded-circle points" style="font-size:16px"
              title="points"></button>
          </ul>

          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

        <!-- <div>
          <a class="btn-getstarted" href="index.html#about">Codso</a>
          <a class="signup logout" style="cursor:pointer">Logout</a>
        </div> -->
        <div>
          <!-- <a class="btn-getstarted btn btn-success text-white bg-success" href="./request.php"><span
              style="font-size:16px">Codso</span></a> -->

          <!-- <a class="signup logout text-white btn bg-danger" style="cursor:pointer;border:none"><span
              style="font-size:16px"><i class="bi bi-box-arrow-in-left"></i></span></a> -->
          <button class="signup logout btn btn-danger rounded" title="Logout"><i class="bi bi-box-arrow-in-left"
              style="font-size:20px"></i></button>

        </div>


      </div>
    </header><!-- End Header -->

    <main id="main">

      <!-- Hero Section - Home Page -->
      <section id="hero" class="hero">

        <img
          src="https://img.freepik.com/free-photo/man-collecting-scattered-plastic-bottles-from-ground_1268-20044.jpg?t=st=1712933044~exp=1712936644~hmac=ef9ddcca8f8dab9ea1709868b440b71b96ecd5705464efeaef9fd13cb3ddab67&w=1060"
          alt="" data-aos="fade-in">

        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <h2 data-aos="fade-up" data-aos-delay="100">KUSOO DHAWAADA BILCIYE </h2>
              <p data-aos="fade-up" data-aos-delay="200">kuso Dhawaada Bilciye Waxaan Ka Shaqaynaa Qurxinta Deegaanka Iyo
                Bilicda Dalka</p>
            </div>
            <div class="col-lg-5">
              <input type="submit" class="btn btn-primary" value="Wax badan naga ogaaw...">
            </div>
          </div>
        </div>

      </section><!-- End Hero Section -->





      <!-- About Section - Home Page -->
      <section id="about" class="about">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center gy-5">

            <div class="col-xl-5 content">
              <h3>About Us</h3>
              <!-- <h2>Ducimus rerum libero reprehenderit cumque</h2> -->
              <p>kuso dhawaada bilciye Waxaan ka shaqaynaa qurxinta deegaanka iyo Bilicda Dalka .
                " Soo aruuri caagaga/Bacaha oo hel dhibco kuna badalo adeeg bilaash ah"
              </p>
              <a href="#" class="read-more"><span>Adeegyadeena </span><i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="col-xl-7">
              <div class="row gy-4 icon-boxes">

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-recycle"></i>
                    <h3>⁠Dib-u warshadaynta Caagaga/Bacaha</h3>
                    <p>waxan kaa iibsan doona caagadaha oo loogu talagalay in dib loo warshadeyo si an u ilaalino
                      deegankena oona uga ilaalino awal marina waxan kaga dhigo dona khashin qaadid oo free ah
                      muwadinkednow</p>
                  </div>
                </div> <!-- End Icon Box -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-trash2-fill"></i>
                    <h3>Qaadida Qashinka</h3>
                    <p>waxan kugu xiro doona shirkadaha khashinada qaada si khashinkada lgaga qaado xili walbo xiligad
                      ubaahato</p>
                  </div>
                </div> <!-- End Icon Box -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-exclamation-octagon-fill"></i>
                    <h3>⁠soo gudbinta qashin daadinta sharci darada ah</h3>
                    <p>waxana ka hor tagi doona khashinada sida sharci daradaha loogu daadiyo wadooyinka adigo noogu soo
                      gudbin doona qeybta dacweynta(reportka) waxana kgu awal marin doona muwadinkeenow in an rate kaada
                      kordhino

                    </p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-buildings-fill"></i>
                    <h3>⁠isku xir shirkadaha iyo wazarada</h3>
                    <p>waxan isku xiri doona muwadinka iyo shirkadaha sido kale shirkadaha iyo wazarada</p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-buildings-fill"></i>
                    <h3>Hel Dhibco Abaal marin</h3>
                    <p>Markasta ood so gudbiso Baco/Caagag/Qashin waxaad helaysa dhibco abaal marineed oo laguugu badalayo
                      Adeeg bilaash ah.</p>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>

      </section><!-- End About Section -->






















      <!-- Contact Section - Home Page -->
      <section id="contact" class="contact">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Inagala so xariir halkaan </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

            <div class="col-lg-6">

              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>Mogadishu, Somalia</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+252 610 000000</p>
                    <p>+252 610 111111</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>bilciye@gmail.org</p>

                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="500">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>Sabti - Arbaco</p>
                    <p>9:00AM - 05:00PM</p>
                  </div>
                </div><!-- End Info Item -->

              </div>

            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                data-aos-delay="200">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                  </div>

                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                  </div>

                </div>
              </form>
            </div><!-- End Contact Form -->

          </div>

        </div>

      </section><!-- End Contact Section -->

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="container footer-top">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Bilciye</span>
            </a>
            <p>kuso dhawaada bilciye Waxaan ka shaqaynaa qurxinta deegaanka iyo Bilicda Dalka . " Soo aruuri
              caagaga/Bacaha oo hel dhibco kuna badalo adeeg bilaash ah".</p>
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

    </footer><!-- End Footer -->

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
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="./app.js"></script>
    <script src="./operation.js"></script>


  </body>

  </html>
  <?php
}
?>