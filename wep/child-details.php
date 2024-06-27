<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bilciye Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .container {
            max-width: 900px;
            margin-bottom: 10px;
            padding: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .form-section h4 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .child-details img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .child-details .description {
            display: inline-block;
            margin-left: 20px;
            vertical-align: top;
        }
        .child-details .description div {
            margin-bottom: 10px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field label {
            font-weight: bold;
        }
        .field select,
        .field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .field select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .field select:focus,
        .field input:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .form-buttons {
            text-align: right;
        }
        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-buttons button:hover {
            background-color: #0056b3;
        }
 
        .space{
            margin: 10px;
        }
        .img{
            width: 500px;
            height: 400px;
        }



    </style>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="text-dark" style="font-size:36px">Bilciye</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="./index.php#hero" class="active text-dark" style="font-size:24px">Home</a></li>
                    <li><a href="./child gallery.php" class="text-dark" style="font-size:24px">Child Gallery</a></li>
                    <li><a href="./Donate.php" class="text-dark" style="font-size:24px">Donate</a></li>
                    <li><a href="./photo gallery.php" class="text-dark" style="font-size:24px">Photo Gallery</a></li>
                    <li><a href="./programs.php" class="text-dark" style="font-size:24px">Programs</a></li>
                    <li><a href="./feedback.php" class="text-dark" style="font-size:24px">Feedback</a></li>
                    <button id="pointsButton" class="btn btn-success rounded-circle points" style="font-size:16px" title="points"></button>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div>
                <a class="signup logout text-white btn bg-danger" style="cursor:pointer"><span style="font-size:16px">logout</span></a>
            </div>
        </div>
    </header>

    <main id="main">
        <section id="about" class="bg-white"></section>
   
            <div class="container margin-top: 300px">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <h1>Sponsor This Child</h1>
                    <div class="form-section">
                        <h6>Child's Details</h6>
                        <div class="child-details">
                        <img src="img/defaultimg.png" alt="Child Image" class="img">
                            <div style="display: flex; align-items: center; justify-content: space-between  ; justify-content: start; padding: 10px; background-color: #f4f4f4; border: 1px solid #ddd; margin-top: 10px; font-family: 'Arial', sans-serif;">
                                <?php
                                // Database connection setup
                                include '../application/config/conn.db.php';

                                // Check if 'cid' is set in the GET request
                                if (isset($_GET['cid']) && !empty($_GET['cid'])) {
                                    $cid = htmlspecialchars($_GET['cid']);
                                    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE cid = ?";

                                    // Prepare statement to avoid SQL injection
                                    if ($stmt = $conn->prepare($sql)) {
                                        $stmt->bind_param("i", $cid);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $dob = $row["cdob"];
                                                $age = (date('Y') - date('Y', strtotime($dob)));
                                                ?>
                                                <div class="space">Name: <br><?php echo $row["cname"]; ?></br></div>
                                                <div class="space">Age: <br><?php echo $age; ?></br></div>
                                                <div class="space">Class: <br><?php echo $row["cclass"]; ?></strong></div>
                                                <div class="space">Year of enrollment: <br><?php echo $row["cyoe"]; ?></br></div>
                                                <?php
                                            }
                                        } else {
                                            echo '<div class="ui error message">No child found with the provided ID.</div>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<div class="ui error message">Error preparing the database query.</div>';
                                    }
                                } else {
                                    echo '<div class="ui error message">Child ID is not provided.</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Sponsor Type</h4>
                        <div class="field">
                            <select name="noofyear" required>
                                <option value="">Number of Years</option>
                                <option value="1">1 Year</option>
                                <option value="2">2 Years</option>
                                <option value="3">3 Years</option>
                                <option value="5">5 Years</option>
                            </select>
                        </div>
                        <div>
                            * 1 year, pay Rs.4800 or $112 USD <br>
                            * 2 years, pay Rs.9600 or $224 USD <br>
                            * 3 years, pay Rs.15000 or $335 USD <br>
                            * 5 years, pay Rs.25000 or $581 USD <br>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Personal Information</h4>
                        <div class="field">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                        </div>
                        <div class="field">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <label for="phone">Phone No.</label>
                            <input type="tel" id="phone" name="phone" placeholder="Phone / Mobile" required>
                        </div>
                        <div class="field">
                            <label for="address">Billing Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Billing Information</h4>
                        <div class="field">
                            <label for="amount">Amount</label>
                            <input type="number" id="amount" name="amount" min="1" placeholder="Amount" required>
                        </div>
                        <div class="field">
                            <label for="checkno">Check / DD no.</label>
                            <input type="text" id="checkno" name="checkno" required>
                        </div>
                    </div>

                    <div class="form-buttons">
                        <button name="submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Bilciye</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>Mogadishu, Somalia</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+252 610 000000</span></p>
                    <p><strong>Email:</strong> <span>bilciye@gmail.org</span></p>
                </div>
            </div>
        </div>

        <div class="container text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1">Bilciye</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
