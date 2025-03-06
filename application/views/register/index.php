<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.registration-container {
			top: 140px;
		}

		.registration-content input[type="text"],
		.registration-content input[type="password"],
		.registration-content input[type="email"],
		.registration-content input[type="tel"] {
			width: 220px;
			border-radius: 40px;
			letter-spacing: 0.8px;
			padding: 3px 0px 3px 10px;
		}

		.registration-content input[type="text"]:focus,
		.registration-content input[type="password"]:focus,
		.registration-content input[type="email"]:focus,
		.registration-content input[type="tel"]:focus {
			border: 2px solid #4A9DEC;
			box-shadow: 0px 0px 0px 5px rgb(74, 157, 236, 20%);
			background-color: white;
		}

		.registration-content input[type="submit"] {
			width: 220px;
			border-radius: 40px;
			background-color: red;
			color: white;
			letter-spacing: 0.8px;
		}

		.registration-content input[type="submit"]:hover {
			background-color: #367FA9;
			color: black;
		}

		.registration-content h3 {
			border-bottom: solid 4px #367FA9;
			font-weight: bold;
		}

		.registration-main {
			font-family: Sans-Serif;
		}
	</style>
</head>

<body>
	<form action="<?= site_url('register/register') ?>" method="post">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-2">
				</div>

				<div class="registration-container col-12 col-lg-8">
					<div class="registration-form d-flex shadow-lg p-5 mb-5 bg-white rounded">
						<div class="col registration-main d-flex align-items-center justify-content-center" style="gap: 3%;">
							<img src="<?= base_url('assets/images/autofixicon.png') ?>" alt="">
							<div class="registration-content d-flex align-items-start flex-column" style="width: 50%;">
								<h3 class="mb-5">Register</h3>

								<!-- User Information -->
								<div style="display: flex; gap: 3%;">
									<div>
										<label for="username" class="text-muted">Username</label>
										<input style="width: 100%;" type="text" name="username" id="username" required>
									</div>
									<div>
										<label for="password" class="text-muted">Password</label>
										<input style="width: 100%;" type="password" name="password" id="password" required>
									</div>
								</div>
								<br>
								<label for="email" class="text-muted">Email</label>
								<input style="width: 100%;" type="email" name="email" id="email" required>
								<br>
								<!-- Employee Information -->
								<div style="display: flex; gap: 3%;">
									<div>
										<label for="fname" class="text-muted">First Name</label>
										<input style="width: 100%;" type="text" name="fname" id="fname" required>
									</div>
									<div>
										<label for="mname" class="text-muted">Middle Name</label>
										<input style="width: 100%;" type="text" name="mname" id="mname">
									</div>
								</div>
								<br>
								<label for="lname" class="text-muted">Last Name</label>
								<input style="width: 100%;" type="text" name="lname" id="lname" required>
								<br>
								<div style="display: flex; gap: 3%;">
									<div>
										<label for="address" class="text-muted">Address</label>
										<input style="width: 100%;" type="text" name="address" id="address" required>
									</div>
									<div>
										<label for="contact" class="text-muted">Contact Number</label>
										<input style="width: 100%;" type="tel" name="contact" id="contact" required>
									</div>
								</div>
								<br>
								<input style="width: 100%;height: 45px" type="submit" value="Register" class="mb-1">
								<br>
								<center><a style="width: 100%;text-align:center" href="<?= site_url('login') ?>" class="text-muted">Already have an account? Login</a></center>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-2">

				</div>
			</div>
		</div>
	</form>

	<!-- SweetAlert2 CDN -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?= base_url('assets/js/jquery.js') ?>"></script>

	<script>
		$(document).ready(function() {
			<?php if ($this->session->flashdata('alert')):
				$alert = $this->session->flashdata('alert'); ?>
				Swal.fire({
					icon: "<?= $alert['type'] ?>",
					title: "<?= ucfirst($alert['type']) ?>",
					text: "<?= $alert['message'] ?>"
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "login";
					}
				});
			<?php endif; ?>
		});
	</script>

</body>

</html>
