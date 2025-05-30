<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Theme style -->
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
					<a href="<?= base_url('dashboard') ?>" class="nav-link text-white">Dasboard</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('HR_management') ?>" class="nav-link text-white">User</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Employee') ?>" class="nav-link text-white">Employee</a>
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
							<a href="#" data-toggle="modal" data-target="#BackdropHealth" class="nav-link">
								<i class="nav-icon fa-solid fa-calendar-check"></i>
								<p>
									Schedule Appointment
								</p>
							</a>
						</li>
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
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
							<h5 class="modal-title col-12 text-center" id="staticBackdropLabel">Service Appointment Form</h5>
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
									<input type="text" value="<?= $this->session->userdata('emp_id') ?>" class="form-control" placeholder="<?= $this->session->userdata('emp_id') ?>" id="member_id" name="member_id" hidden readonly>
								</div>
							</div>
							<br>
							<!--<div class="row">
								<div class="col">
									<label for="full_name">Full Name:</label>
									<input type="text" placeholder="John Doe" required value="" class="form-control" placeholder="Member Id" id="full_name" name="full_name">
								</div>
							</div>
							<br>-->
							<div class="row">
								<div class="col">
									<label>Services:</label>
									<div id="servicesContainer"></div>
								</div>
							</div>

							<script>
								const devURL = window.location.origin + window.location.pathname;
								const servicesContainer = document.getElementById("servicesContainer");

								fetch(devURL + '/../api/services')
									.then(response => response.json())
									.then(services => {
										services.forEach((service, index) => {
											const serviceDiv = document.createElement("div");
											serviceDiv.classList.add("form-check");

											const checkbox = document.createElement("input");
											checkbox.classList.add("form-check-input");
											checkbox.type = "checkbox";
											checkbox.name = "services[]";
											checkbox.value = service.name;
											checkbox.id = `service${index}`;

											const label = document.createElement("label");
											label.classList.add("form-check-label");
											label.setAttribute("for", `service${index}`);
											label.textContent = `${service.name} - ₱${service.price}`;

											serviceDiv.appendChild(checkbox);
											serviceDiv.appendChild(label);

											servicesContainer.appendChild(serviceDiv);
										});
									})
									.catch(error => {
										console.error('Error fetching services:', error);
									});
							</script>

							<br>

							<div class="row">
								<div class="col-md-6">
									<label>Select Mechanics:</label>
									<div id="mechanicCheckboxes"></div>
								</div>
								<div class="col-md-6">
									<label>Specialties:</label>
									<ul id="specialtyList" class="text-muted pl-3"></ul>
								</div>
							</div>

							<script>
								const mechanicCheckboxesContainer = document.getElementById('mechanicCheckboxes');
								const specialtyList = document.getElementById('specialtyList');

								const mechanicURL = window.location.origin + window.location.pathname + '/../api/mechanics';

								let mechanics = [];

								fetch(mechanicURL)
									.then(response => response.json())
									.then(data => {
										mechanics = data;
										data.forEach((mechanic, index) => {
											const div = document.createElement('div');
											div.className = 'form-check';

											const input = document.createElement('input');
											input.type = 'checkbox';
											input.className = 'form-check-input';
											input.name = 'mechanics[]';
											input.value = mechanic.name;
											input.id = `mechanic${index}`;

											const label = document.createElement('label');
											label.className = 'form-check-label';
											label.htmlFor = `mechanic${index}`;
											label.textContent = mechanic.name;

											input.addEventListener('change', updateSpecialties);

											div.appendChild(input);
											div.appendChild(label);
											mechanicCheckboxesContainer.appendChild(div);
										});
									})
									.catch(error => {
										console.error('Error fetching mechanics:', error);
									});

								function updateSpecialties() {
									specialtyList.innerHTML = '';
									const selected = document.querySelectorAll('input[name="mechanics[]"]:checked');
									selected.forEach(checkbox => {
										const mechanic = mechanics.find(m => m.name === checkbox.value);
										if (mechanic) {
											const li = document.createElement('li');
											li.textContent = `${mechanic.name}: ${mechanic.specialty}`;
											specialtyList.appendChild(li);
										}
									});
								}
							</script>


							<br>
							<div class="row">
								<div class="col">
									<label for="carType">Car Type:</label>
									<select class="form-control" name="carType" id="carType" required>
										<option value="">Select type</option>
										<option value="automatic">Automatic</option>
										<option value="manual">Manual</option>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<label for="carModel">Car Model:</label>
									<input type="text" class="form-control" name="carModel" id="carModel" placeholder="Enter car model" required>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<label for="appointment_date">Date of Appointment:</label>
									<input type="date" class="form-control" id="appointment_date" name="appointment_date" required="" min="<?= date('Y-m-d'); ?>">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<label for="appointment_time">Time of Appointment:</label>
									<input type="time" class="form-control" id="appointment_time" name="appointment_time" required="">
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
									<p>Employee ID : <span><?php echo $this->session->userdata('emp_id'); ?></span>
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
