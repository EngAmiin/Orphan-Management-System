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

    <style>
      /* Form Styling */
.ui.form {
    background-color: #ffffff; /* White background for the form */
    padding: 20px;
    border-radius: 15px; /* Rounded corners for the form */
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    max-width: 700px; /* Set a max-width for the form and center it */
    margin: 20px auto;
}

.ui.form h4.ui.dividing.header {
    color: #333; /* Dark grey color for the text */
    padding-bottom: 10px;
    margin-bottom: 20px;
    border-bottom: 2px solid #0056b3; /* Blue bottom border for headers */
}

/* Input and Radio Button Styling */
.ui.form .field input[type=text],
.ui.form .field input[type=email],
.ui.form .field input[type=tel],
.ui.form .field input[type=number] {
    width: 100%; /* Full width */
    padding: 8px; /* Padding for spacing within the input */
    border: 1px solid #ccc; /* Light grey border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Include padding in width calculation */
}

/* Radio Button Enhancements */
.ui.radio.checkbox label {
    padding-left: 5px; /* Space after radio button */
}

.ui.radio.checkbox input {
    margin-right: 5px; /* Space before label */
}

/* Button Styling */
.ui.form .button,
.ui.form .buttons .button {
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.2s; /* Smooth transition for hover effect */
}

.ui.form .button:hover,
.ui.form .buttons .button:hover {
    background-color: #0056b3; /* Darker shade for hover effect */
}

/* Ensure the reset button has the same style */
.ui.form .buttons .reset-btn {
    background-color: #6c757d; /* Bootstrap secondary color */
}

.ui.form .buttons .reset-btn:hover {
    background-color: #5a6268; /* Darker shade for hover effect */
}

/* Layout and Spacing for buttons */
.ui.form .form-buttons {
    display: flex;
    justify-content: space-between; /* Space between submit and reset buttons */
    margin-top: 20px; /* Space above the button area */
}
.donate{
  margin-top: 50px;
  text-align: center;
}
.infor{
  margin-top: 10px;
}
.check{
  margin-top: 10px;
}
.sub{
  margin-top: 10px;
}
.res{
  margin-top: 10px;
  margin-left: 75%;
  background-color: green;
  border: none;
  border-radius: 4px;
  padding: 10px 15px;
  cursor: pointer;
  color: white;
}

    </style>

    <main id="main">
        <section id="about" class="bg-white">


<div class="twelve wide column">

                <h1 class="donate">Donation Application</h1>

                <?php

                  if(isset($_POST['submit_donation'])) {
                    $program = $_POST['program'];
                    $amount = $_POST['amount'];
                    $checkno = $_POST['check'];
                    $bank_name = $_POST['bank_name'];
                    $place = $_POST['place'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];

                    $sql = "INSERT INTO donation (program, amount, checkno, bank_name, place, d_name, email, phone, d_address) 
                            VALUES ('$program', '$amount', '$checkno', '$bank_name', '$place', '$name', '$email', '$phone', '$address')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script> alert('Successfully Donation form Submitted'); </script>";
                    } else {
                        echo "<script> alert('Error in Insertion'); </script>";
                    }
                    
                    $conn->close();


                  }

                ?>

                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">

                    <h4 class="ui dividing header">Select the program to sponsor</h4>
                    <div class="grouped fields">
                        <label for="program">Programs: </label>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="aakar" value="Aakar">
                            <label for="aakar">AAKAR - the first step</label>
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="ahar" value="Ahar">
                            <label for="ahar">AHAR APURTI</label>
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="avsar" value="Avsar">
                            <label for="avsar">AVSAR - a chance</label>
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="lakshya" value="Lakshya">
                            <label for="lakshya">Lakshya</label>
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="parivartan" value="Parivartan">
                            <label for="parivartan">PARIVARTAN - change of direction</label>
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui radio checkbox">
                            <input type="radio" name="program" tabindex="0" class="hidden" id="uphaar" value="Uphaar">
                            <label for="uphaar">UPHAAR - gift a smile</label>
                          </div>
                        </div>
                    </div>

                    <div class="field">
                      <label>Amount</label>
                      <input type="number" name="amount" min="1" placeholder="Amount" required>
                    </div>

                    <h4 class="ui dividing check header">Check and Demand Draft</h4>
                    <div class="field">
                      <label>Check / DD no.</label>
                      <input type="text" name="check" placeholder="Check / DD no." required>
                    </div>
                    <div class="field">
                      <label>Bank Name</label>
                      <input type="text" name="bank_name" placeholder="Bank Name" required>
                    </div>
                    <div class="field">
                      <label>Place</label>
                      <input type="text" name="place" placeholder="Place" required>
                    </div>

                    <h4 class="ui dividing infor header">Personal Information</h4>
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="field">
                        <label>Phone no.</label>
                        <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                    <button name="submit_donation" class="ui primary sub button" type="submit">Submit</button>
                    <button class="ui  res" type="reset">Reset</button>


                </form>

                <span class="p-20"></span>
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