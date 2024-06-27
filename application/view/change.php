<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.adminkit.io/pages-sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 07:36:14 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link rel="shortcut icon" href="../../img/icons/icon-48x48.png" />
    <!-- iziToast CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">

<!-- iziToast JS -->


    <link rel="canonical" href="pages-sign-in-2.html" />

    <title>Sign In | AdminKit Demo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet" />

    <!-- Choose your prefered color scheme -->
    <link href="../../css/light.css" rel="stylesheet">
    <link href="../../css/dark.css" rel="stylesheet">

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <!-- <link class="js-stylesheet" href="css/light.css" rel="stylesheet" />
  <script src="js/settings.js"></script>
  <style>
    body {
      opacity: 0;
    }
  </style>
  END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-120946860-10", { anonymize_ip: true });
    </script>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <main class="d-flex w-100 h-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back!</h1>
                            <p class="lead">enter your new password</p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">

                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">password</label>
                                            <input class="form-control form-control-lg password" type="email"
                                                name="email" placeholder="Enter your password" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">confirm password</label>
                                            <input class="form-control form-control-lg confirm" type="email"
                                                name="email" placeholder="Enter your password" />
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class="btn btn-lg btn-primary change">change</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Don't have an account? <a href="./pages-sign-up.php">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on("click", ".change", () => {
                if ($(".password").val() == "" || $('.confirm').val() == "") {
                    displayToast("all fields are required name", "error", 2000);

                } else if ($(".password").val() !== $('.confirm').val()) {
                    displayToast("password and confirm password  must be the same", "error", 2000);
                }

                else {
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            email: localStorage.getItem('email'),
                            password: $('.password').val(),
                            action: "changePassword",
                        },
                        url: "../api/admin.php",
                        success: (res) => {
                            displayToast("all fields are required name", "success", 2000);

                            window.location.href = "./pages-sign-in.php";
                        },
                        error: (err) => {
                            console.log(err);
                        },
                    });
                }
            });
            function displayToast(message, type, timeout) {
            if (type == "error") {
                iziToast.error({
                    title: 'Error Encountered! ',
                    message: message,
                    backgroundColor: "#D83A56",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "success") {
                iziToast.success({

                    message: message,
                    backgroundColor: "#54B435",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "ask") {
                iziToast.question({
                    timeout: timeout,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: "Condirm!",
                    message: message,
                    position: 'topRight',
                    titleColor: "#86E5FF",
                    messageColor: "white",
                    backgroundColor: "#0081C9",
                    iconColor: "white",
                    buttons: [
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function(instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function(instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function(instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function(instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }
        });
    </script>
</body>

<!-- Mirrored from demo.adminkit.io/pages-sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 07:36:15 GMT -->

</html>