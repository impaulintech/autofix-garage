<?php
// Check if the admin session exists
if (
	isset($_SESSION['role_id']) &&
	$_SESSION['role_id'] == 1
) {
	$site_url = site_url('/dashboard');
	// Redirect to the admin dashboard page if currently login as admin
	header('Location: ' . $site_url);
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
	<style>
		body {
			background-color: #f3f4f6;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}

		.container {
			max-width: 400px;
			margin: auto;
			padding: 50px;
			background: white;
			border-radius: 8px;
			box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>

<body>
	<div class="container">
		<h1 class="text-2xl font-bold text-center text-gray-700 mb-10">Admin Login</h1>
		<?php if ($this->session->flashdata('error')): ?>
			<div class="text-red-500 text-center mb-4">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>
		<form action="<?= site_url('login/login') ?>" method="post">
			<div class="mb-4">
				<label for="username" class="block text-gray-600">Username:</label>
				<input type="text" name="username" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
			</div>
			<div class="mb-4">
				<label for="password" class="block text-gray-600">Password:</label>
				<input type="password" name="password" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
			</div>
			<button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-500 transition duration-200">Login</button>
		</form>
	</div>
</body>

</html>
