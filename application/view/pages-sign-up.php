<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords"
		content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="pages-sign-up-2.html" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<link href="../../css/light.css" rel="stylesheet">
	<link href="../../css/dark.css" rel="stylesheet">

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<!-- <link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	<script src="js/settings.js"></script>
	<style>
		body {
			opacity: 0;
		}
	</style> -->
	<!-- END SETTINGS -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
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
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card " style="width:800px">
							<div class="card-body">
								<div class="m-sm-3">
									<form>
										<div class="mb-3">
											<label class="form-label">name</label>
											<input class="form-control form-control-lg username" type="text" name="name"
												placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">email</label>
											<input class="form-control form-control-lg email" type="email" name="email"
												placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">password</label>
											<input class="form-control form-control-lg password" type="password"
												name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">tell</label>
											<input class="form-control form-control-lg tell" type="number"
												name="password" placeholder="Enter your number" />
										</div>
										<div class="mb-3">
											<label class="form-label">image</label>
											<input class="form-control form-control-lg image" type="file"
												name="password" placeholder="Enter your image" />
										</div>
										<div class="mb-3">
											<label class="form-label">Home_number</label>
											<input class="form-control form-control-lg h_number" type="text"
												name="password" placeholder="Enter your home number" />
										</div>
										<div class="mb-3 addressDisplay">

											<select class="form-control add_no">

											</select>
										</div>

										<div class="mb-3">
											<label class="form-label">village</label>
											<input class="form-control form-control-lg village" type="text" name="name"
												placeholder="Enter your village" />
										</div>

										<div class="d-grid gap-2 mt-3">
											<a class='btn btn-lg btn-primary signup'>Sign up</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href='./pages-sign-in.php'>Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="../../js/app.js"></script>
	<!-- <Script>
		$(document).ready(() => {
			$(document).on('click', '.signup', () => {
				alert("clicked")
				if ($(".email").val() == "" || $(".password").val() == "" || $(".username").val() == "") {
					alert("please enter FILL");
				}
				else {
					// Append the file and other data to the FormData object
					var formData = new FormData();

					// Append the file and other data to the FormData object
					formData.append("profile_image", $(".image")[0].files[0]);
					formData.append("email", $(".email").val())
					formData.append("password", $(".password").val())
					formData.append("username", $(".username").val())
					formData.append("tell", $(".tell").val())
					formData.append("h_number", $(".h_number").val())
					formData.append("h_type", $(".h_type").val())
					formData.append("district", $(".district").val())
					formData.append("village", $(".village").val())
					formData.append("zone", $(".zone").val())
					formData.append("action", "createCitizen")
					$.ajax({
						method: "POST",
						dataType: "JSON",
						data: formData,
						url: "../api/admin.php",
						success: (res) => {
							alert(res.message);
						},
						error: (err) => {
							console.log(err);
						},
					});
				}
			})
		})
	</Script> -->
	<script>
		$(document).ready(() => {
			getaddress()
			$(document).on('click', '.signup', () => {
				alert("clicked")
				if ($(".email").val() == "" || $(".password").val() == "" || $(".username").val() == "") {
					alert("please enter FILL");
				}
				else {
					// Append the file and other data to the FormData object
					var formData = new FormData();

					// Append the file and other data to the FormData object
					formData.append("profile_image", $(".image")[0].files[0]);
					formData.append("email", $(".email").val())
					formData.append("password", $(".password").val())
					formData.append("username", $(".username").val())
					formData.append("tell", $(".tell").val())
					formData.append("h_number", $(".h_number").val())
					formData.append("add_no", $(".add_no").val())
					// formData.append("district", $(".district").val())
					formData.append("village", $(".village").val())
					// formData.append("zone", $(".zone").val())
					formData.append("action", "createCitizen")
					$.ajax({
						method: "POST",
						dataType: "JSON",
						data: formData,
						url: "../api/admin.php",
						success: (res) => {
							alert(res.message);
						},
						error: (err) => {
							console.log(err);
						},
						contentType: false, // Important!
						processData: false // Important!
					});
				}
			})
			function getaddress() {
				$.ajax({
					method: "POST",
					dataType: "JSON",
					url: "../api/admin.php",
					data: { action: "readAddress" },
					success: (res) => {
						var { data } = res;
						console.log(data);
						// alert(res);
						let option = '<option value="" selected>Select district</option>';
						data.forEach((values) => {
							option += `<option value="${values.add_no}">${values.district}</option>`;
						});

						$(".addressDisplay select").html(option);
					},
					error: (error) => {
						console.log(error);
					},
				});
			}
		})
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function (event) {
			setTimeout(function () {
				if (localStorage.getItem('popState') !== 'shown') {
					window.notyf.open({
						type: "success",
						message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
						duration: 10000,
						ripple: true,
						dismissible: false,
						position: {
							x: "left",
							y: "bottom"
						}
					});

					localStorage.setItem('popState', 'shown');
				}
			}, 15000);


		});
	</script>
</body>


<!-- Mirrored from demo.adminkit.io/pages-sign-up by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 07:36:17 GMT -->

</html>