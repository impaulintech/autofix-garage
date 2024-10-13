<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<style>
		.login-container {
			top: 140px;
		}

		.login-content input[type="text"] {
			width: 220px;
			border-radius: 40px;
			letter-spacing: 0.8px;
			padding: 3px 0px 3px 10px;
		}

		.login-content input[type="text"]:focus,
		.login-content input[type="text"]:hover {
			border: 2px solid #4A9DEC;
			box-shadow: 0px 0px 0px 5px rgb(74, 157, 236, 20%);
			background-color: white;
		}

		.login-content input[type="password"] {
			width: 220px;
			border-radius: 40px;
			letter-spacing: 0.8px;
			padding: 3px 0px 3px 10px;
		}

		.login-content input[type="password"]:focus,
		.login-content input[type="password"]:hover {
			border: 2px solid #4A9DEC;
			box-shadow: 0px 0px 0px 4px rgb(74, 157, 236, 20%);
			background-color: white;
		}

		.login-content input[type="submit"] {
			width: 220px;
			border-radius: 40px;
			background-color: red;
			color: white;
			letter-spacing: 0.8px;
		}

		.login-content input[type="submit"]:hover {
			width: 220px;
			border-radius: 40px;
			background-color: #367FA9;
			color: black;
			letter-spacing: 0.8px;
		}

		.login-content h3 {
			border-bottom: solid 4px #367FA9;
			font-weight: bold;
		}

		.login-main {
			font-family: Sans-Serif;
		}
	</style>
	<form action="<?= site_url('login/login') ?>" method="post">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-2">

				</div>

				<div class="login-container col-12 col-lg-8">
					<div class="login-form d-flex shadow-lg p-5 mb-5 bg-white rounded">
						<div class="col side-image d-lg-inline-block d-none">
							<img src="<?= base_url('assets/images/autofixicon.png') ?>" alt="" class="w-100">
						</div>
						<div class="col login-main d-flex align-items-center flex-column justify-content-center">
							<div class="login-content d-flex align-items-start flex-column">
								<h3 class="mb-5">Login</h3>
								<label for="username" class="text-muted">Username</label>
								<input type="text" name="username" id="username">
								<label for="password" class="text-muted">Password</label>
								<input type="password" name="password" id="password" class="mb-3">
								<input type="submit" value="Login" class="mb-1">
								<a href="<?= site_url('register') ?>">Dont have an account?</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-2">

				</div>
			</div>
		</div>
	</form>
	<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>

</body>

</html>
