<?php
include '../application/config/conn.db.php';

// Handling the form submission
if (isset($_POST['submit_gift'])) {
    $cid = $_GET['cid'];  // Ensure 'cid' is being passed correctly in the URL
    $gift_type = $_POST['gift_type'];
    $sending_date = $_POST['sending_date'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO gift (cid, gift_type, sending_date, sender_name, email, phone, sender_address) 
            VALUES ('$cid', '$gift_type', '$sending_date', '$name', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
        

    } else {
        echo "<script>alert('Error in Insertion: " . $conn->error . "');</script>";
    }
}

// Ensure connection is not closed here if further queries are needed
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        .containers {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 60px;
            border-radius: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .form-section h4 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .child-details {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .child-details img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .child-details .description {
            margin-left: 20px;
            display: flex;
        }
      
        .child-details .description div {
            margin-bottom: 5px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field label {
            font-weight: bold;
        }
        .field input, .field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-buttons {
            display: flex;
            justify-content: space-between;
        }
        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-buttons .reset-btn {
            background-color: green;
        }
        .form-buttons button:hover {
            opacity: 0.9;
        }
        .button{
            background-color: green;
            padding: 8px;
            border: 10px;
            border-radius: 6px;
            color: #fff;
        }
        .buttons{
            background-color: grey;
            padding: 8px;
            border: 10px;
            border-radius: 6px;
            color: #fff;
        }

        .description {
            display: flex;
            justify-content: space-around; /* This will space out the child elements evenly */
            align-items: center; /* This aligns the child elements vertically in the center */
            flex-wrap: wrap; /* This allows the items to wrap onto the next line if not enough space */
        }

        .detail {
            margin: 10px; /* Adds a bit of space around each detail for better readability */
        }
        .reset{
            background-color: green;
        }

        @media (max-width: 600px) {
        .description {
            flex-direction: column;
        }
    }
    


    </style>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="text-dark " style="font-size:36px">Bilciye</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="./index.php#hero" class="active text-dark " style="font-size:24px">Home</a></li>
                    <li><a href="./child gallery.php" class="text-dark " style="font-size:24px">Child Gallery</a></li>
                    <li><a href="./Donate.php" class="text-dark" style="font-size:24px">Donate</a></li>
                    <li><a href="./photo gallery.php" class="text-dark " style="font-size:24px">Photo Gallery</a></li>
                    <li><a href="./programs.php" class="text-dark " style="font-size:24px">Programs</a></li>
                    <li><a href="./feedback.php" class="text-dark " style="font-size:24px">Feedback</a></li>
                </ul>
            </nav><!-- End Nav Menu -->

            <div>
                <a class="signup logout text-white btn bg-danger" style="cursor:pointer"><span
                        style="font-size:16px">logout</span></a>
            </div>
        </div>
    </header>

    <main id="main">
        <section id="about" class="bg-white">
            <div class="containers">
                <h1>Send a Gift</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?cid=<?php echo isset($_GET['cid']) ? htmlspecialchars($_GET['cid']) : ''; ?>" method="post">
                    <div class="form-section">
                        <h4>Child's Details</h4>
                        <div class="description">
                            <?php
                                if(isset($_GET['cid'])) {
                                    $cid = $_GET['cid'];
                                    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE cid='$cid'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $dob = $row["cdob"];
                                            $age = (date('Y') - date('Y',strtotime($dob)));
                                            echo "<div class='detail'><span>Name:</span> <br> " . $row["cname"] . "</div>";
                                            echo "<div class='detail'><span>Age:</span> <br>" . $age . "</div>";
                                            echo "<div class='detail'><span>Class:</span> <br>" . $row["cclass"] . "</div>";
                                            echo "<div class='detail'><span>Year of Enroll:</span> <br>" . $row["cyoe"] . "</div>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }
                            ?>
                        </div>

                    </div>
                    <div class="field">
                        <label>Type of Gift</label>
                        <input type="text" name="gift_type" placeholder="E.g., Dress, Toy..." required>
                    </div>
                    <div class="field">
                        <label>Sending Date</label>
                        <input type="date" name="sending_date" required>
                    </div>
                    <div class="form-section">
                        <h4>Personal Information</h4>
                        <div class="field">
                            <label>Full Name</label>
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
                    </div>
                    <div class="form-buttons">
                        <!-- <button name="submit_gift" class="button" type="submit">Submit</button> -->
                        <button name="submit_gift" class="button" type="submit">Submit</button>

                        <button type="reset" class="buttons">Reset</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Bilciye</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta
                        donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Mogadishu, Somalia<br>
                        <strong>Phone:</strong> +252 610 000000<br>
                        <strong>Email:</strong> bilciye@gmail.org<br>
                    </p>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6 text-lg-left text-center">
                    <p>&copy; Copyright <strong><span>Bilciye</strong> All Rights Reserved.</span></p>
                </div>
                <div class="col-lg-6">
                    <div class="social-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="#" class="scroll-top"><i class="bi bi-arrow-up-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
    <script src="./alerts.js"></script>
</body>

</html>

<?php
$conn->close();
?>
