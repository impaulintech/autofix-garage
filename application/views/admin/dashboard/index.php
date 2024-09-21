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
</head>

<body>

</body>

</html>
