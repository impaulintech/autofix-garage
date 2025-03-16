<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>


	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<!-- Site wrapper -->

	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
		<!-- Brand -->
		<a href="index.php">
			<h3 class="navbar-brand py-3">AUTOFIX GARAGE</h3>
		</a>
		</hr>
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="nav-bar collapse navbar-collapse d-lg-block" id="collapsibleNavbar">
			<ul class="navbar-nav d-lg-none">
				<li class="nav-item">
					<a href="<?= site_url('dashboard') ?>" class="nav-link text-white">Dasboard</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('User') ?>" class="nav-link text-white">Scheduling</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Employee') ?>" class="nav-link text-white">Order</a>
				</li>
				<li class="nav-item">
					<a href="#" data-toggle="modal" data-target="#BackdropHealth" class="nav-link d-lg-none d-md-block text-white">Health
						Form</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('login/logout') ?>" class="nav-link d-lg-none d-md-block text-white">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="wrapper">
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/images/Prof.jpg') ?>" class="img-circle elevation-2"
							alt="User Image">
					</div>
					<div class="info">
						<a href="#" data-toggle="modal" data-target="#BackdropProfile"
							class="d-block"><span><?php echo $this->load->session->userdata('fname'); ?></span>
							<span><?php echo $this->load->session->userdata('lname'); ?></span></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">

						<li class="nav-item">
							<a href="<?= site_url('dashboard') ?>" class="nav-link">
								<i class="nav-icon fa-solid fa-table-columns"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fa-solid fa-list-check"></i>
								<p>
									Other Option
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('User') ?>" class="nav-link">
										<i class="nav-icon fa-solid fa-user"></i>
										<p>User</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('employee') ?>" class="nav-link">
										<i class="nav-icon fa-solid fa-users"></i>
										<p>Scheduling</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('admin_sched') ?>" class="nav-link">
										<i class="nav-icon fa-solid fa-disease"></i>
										<p>Ordering</p>
									</a>
								</li>
								<!--   <li class="nav-item">
                                    <a href="<?= site_url('logs/emp_logs') ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-book"></i>
                                        <p>Employee Logs</p>
                                    </a>
                                </li> -->
								<li class="nav-item">
									<a href="<?= site_url('logs/user_logs') ?>" class="nav-link">
										<i class="nav-icon fa-solid fa-book"></i>
										<p>User Logs</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('health') ?>" class="nav-link">
								<i class="nav-icon fa-solid fa-file-lines"></i>
								<p>
									Schedule Report
								</p>
							</a>
						</li>
						<!--  <li class="nav-item">
                            <a href="#" data-toggle="modal" data-target="#BackdropHealth" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-waveform"></i>
                                <p>
                                    Customer Form
                                </p>
                            </a>
                        </li> -->
						<?php if ($this->session->userdata('role_id') == 4): ?>
							<li class="nav-item">
								<div class="nav-link d-flex align-items-center">
									<i class="nav-icon fa-solid fa-tools"></i>
									<p class="ml-2 mb-0">Maintenance</p>
									<label class="switch ml-auto">
										<input type="checkbox" id="maintenance-toggle"
											<?= ($this->session->userdata('maintenance_status') == 1) ? 'checked' : '' ?>>
										<span class="slider round"></span>
									</label>
								</div>
							</li>
						<?php endif; ?>

						<style>
							.switch {
								position: relative;
								display: inline-block;
								width: 40px;
								height: 22px;
							}

							.switch input {
								opacity: 0;
								width: 0;
								height: 0;
							}

							.slider {
								position: absolute;
								cursor: pointer;
								top: 0;
								left: 0;
								right: 0;
								bottom: 0;
								background-color: #6c757d;
								transition: 0.4s;
								border-radius: 34px;
							}

							.slider:before {
								position: absolute;
								content: "";
								height: 16px;
								width: 16px;
								left: 3px;
								bottom: 3px;
								background-color: white;
								transition: 0.4s;
								border-radius: 50%;
							}

							input:checked+.slider {
								background-color: #28a745;
							}

							input:checked+.slider:before {
								transform: translateX(18px);
							}

							.slider.round {
								border-radius: 34px;
							}
						</style>

						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
						<script src="<?= base_url('assets/js/jquery.js') ?>"></script>

						<script>
							$(document).ready(function() {
								$('#maintenance-toggle').change(function() {
									$.ajax({
										url: "<?= site_url('home/toggle_maintenance') ?>",
										type: "POST",
										dataType: "json",
										success: function(response) {
											Swal.fire({
												toast: true,
												position: 'top-end',
												icon: response.status ? 'success' : 'info',
												title: 'Maintenance mode ' + (response.status ? 'enabled' : 'disabled'),
												showConfirmButton: false,
												timer: 3000
											});

											// Update checkbox state based on response
											$('#maintenance-toggle').prop('checked', response.status);
										},
										error: function() {
											Swal.fire({
												icon: 'error',
												title: 'Failed to update maintenance mode!',
												text: 'Please try again.',
												position: 'top-end',
												toast: true,
												showConfirmButton: false,
												timer: 3000
											});
										}
									});
								});
							});
						</script>


						<li class="nav-item">
							<a href="<?= site_url('login/logout') ?>" class="nav-link">
								<i class="nav-icon fa-solid fa-right-from-bracket"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- modal -->
		<div class="modal fade" id="BackdropHealth" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-lg-4">

						</div>
						<div class="col-lg-4">
							<h5 class="modal-title col-12 text-center" id="staticBackdropLabel">Health Form
							</h5>
						</div>
						<div class="col-lg-4">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<form action="<?= site_url('health/add') ?>" method="post">
						<div class="modal-body">
							<div class="row">
								<div class="col">

									<label for="emp_id">Customer ID :</label>
									<input type="text" class="form-control" placeholder="Customer ID" id="emp_id"
										name="emp_id" value="" required="">
								</div>
							</div>
							<div class="row">
								<div class="col">

									<label for="ill_id">Schedule :</label>
									<select class="form-control" name="ill_id" id="ill_id" placeholder="Schedule" required="">
										<option value="1">Over Hole</option>
										<option value="2">Car Wash</option>
										<option value="3">Engine Cleaning</option>
										<option value="4">Ordering</option>
									</select>
								</div>
							</div>

						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- MODAL PROFILE -->
		<div class="modal fade" id="BackdropProfile" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-lg-4">

						</div>
						<div class="col-lg-4">
							<h5 class="modal-title col-12 text-center" id="staticBackdropLabel">
								Profile
							</h5>
						</div>
						<div class="col-lg-4">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<form action="<?= site_url('health/add') ?>" method="post">
						<div class="modal-body">
							<div class="row">
								<div class="col">
									<p>Last Name : <span><?php echo $this->session->userdata('lname'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>First Name : <span><?php echo $this->session->userdata('fname'); ?></span>
										</hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Address : <span><?php echo $this->session->userdata('address'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Contact : <span><?php echo $this->session->userdata('contact'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Email : <span><?php echo $this->session->userdata('email'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Role ID : <span><?php echo $this->session->userdata('role_id'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>User ID : <span><?php echo $this->session->userdata('user_id'); ?></span></hp>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Customer ID : <span><?php echo $this->session->userdata('emp_id'); ?></span>
										</hp>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
