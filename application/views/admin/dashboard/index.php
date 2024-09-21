<?php
// Check if the admin session exists
if (
	isset($_SESSION['role_id']) &&
	$_SESSION['role_id'] != 1
) {
	$site_url = site_url('admin/login');
	// Redirect to the login page if not an admin
	header('Location: ' . $site_url);
	exit(); // Stop the script after redirecting
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: Arial, sans-serif;
		}

		body {
			display: flex;
			min-height: 100vh;
			background-color: #f4f4f4;
		}

		.sidebar {
			width: 250px;
			background-color: #333;
			color: white;
			position: fixed;
			height: 100%;
			top: 0;
			left: 0;
			padding-top: 20px;
			transition: width 0.3s ease;
		}

		.sidebar ul {
			list-style: none;
			padding: 0;
		}

		.sidebar ul li {
			padding: 15px;
			text-align: center;
		}

		.sidebar ul li a {
			color: white;
			text-decoration: none;
			display: block;
			padding: 10px 0;
			transition: background-color 0.2s;
		}

		.sidebar ul li a:hover {
			background-color: #575757;
		}

		.content {
			margin-left: 250px;
			padding: 20px;
			width: 100%;
			background-color: #f9f9f9;
		}

		.header {
			background-color: #4CAF50;
			color: white;
			padding: 15px;
			text-align: center;
		}

		.main-content {
			margin-top: 20px;
		}

		.card {
			background-color: white;
			padding: 20px;
			margin-bottom: 20px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		@media (max-width: 768px) {
			.sidebar {
				width: 200px;
			}

			.content {
				margin-left: 200px;
			}
		}

		@media (max-width: 600px) {
			.sidebar {
				width: 150px;
			}

			.content {
				margin-left: 150px;
			}

			.sidebar ul li {
				font-size: 14px;
			}
		}
	</style>
</head>

<body>

	<div class="sidebar">
		<ul>
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Users</a></li>
			<li><a href="#">Settings</a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Logout</a></li>
		</ul>
	</div>

	<div class="content">
		<div class="header">
			<h1>Admin Dashboard</h1>
		</div>

		<div class="main-content">
			<div class="card">
				<h2>Statistics</h2>
				<p>This is where you can show some statistics or important info.</p>
			</div>

			<div class="card">
				<h2>User Management</h2>
				<p>Manage your users, view activity, or delete accounts here.</p>
			</div>

			<div class="card">
				<h2>Settings</h2>
				<p>Manage website settings, configurations, and preferences here.</p>
			</div>
		</div>
	</div>

</body>

</html>
