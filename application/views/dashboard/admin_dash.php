<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Page Title</title>

	<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/main.min.css' rel='stylesheet' />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

	<style>
		.flex {
			display: flex;
			justify-content: space-between;
		}

		.calendar {
			border: 1px solid #ccc;
			padding: 10px;
			min-width: 200px;
			height: 100%;
		}

		/* Modal styles */
		.modal {
			display: none;
			position: fixed;
			z-index: 9999;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.6);
			justify-content: center;
			align-items: center;
		}

		.modal-content {
			background-color: #fff;
			width: 400px;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
			position: relative;
			animation: fadeIn 0.3s;
		}

		.close {
			color: #aaa;
			position: absolute;
			top: 10px;
			right: 15px;
			font-size: 20px;
			font-weight: bold;
			transition: color 0.3s;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		h2 {
			margin: 0 0 10px;
			font-size: 1.5em;
		}

		p {
			font-size: 1em;
			line-height: 1.5;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}
	</style>
</head>

<body>
	<div class="content-wrapper" style="padding: 30px 20px;">
		<section class="content">
			<div class="container-fluid">
				<div class="flex">
					<div class="flex-grow" style="width: 27%; height: 100%;">
						<!-- Total Users -->
						<div>
							<div class="small-box bg-info text-center">
								<div class="inner">
									<h3><?= $totalUsers ?></h3>
									<p>Total Users</p>
								</div>
								<div class="icon">
									<i class="ion ion-person"></i>
								</div>
								<a href="<?= site_url('User') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<!-- Total Schedules -->
						<div>
							<div class="small-box bg-success">
								<div class="inner text-center">
									<h3><?= $totalSchedules ?></h3>
									<p>Total Schedules</p>
								</div>
								<div class="icon">
									<i class="ion ion-calendar"></i>
								</div>
								<a href="#schedules" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<!-- Total Schedules This Week -->
						<div>
							<div class="small-box bg-danger">
								<div class="inner text-center">
									<h3><?= $totalSchedulesThisWeek ?></h3>
									<p>Schedules This Week</p>
								</div>
								<div class="icon">
									<i class="ion ion-calendar"></i>
								</div>
								<a href="#weekly-schedules" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<!-- Total Schedules Today -->
						<div>
							<div class="small-box bg-primary">
								<div class="inner text-center">
									<h3><?= $totalSchedulesToday ?></h3>
									<p>Schedules Today</p>
								</div>
								<div class="icon">
									<i class="ion ion-calendar"></i>
								</div>
								<a href="#daily-schedules" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>

					<div class="calendar-container" style="width: 69%;">
						<div class="calendar">
							<div id="calendar"></div>
						</div>
					</div>
				</div>

				<br><br>

				<!-- Schedule List Table -->
				<div class="col" id="schedules">
					<h4>Schedule List</h4>
					<table class="table-list table table-striped table-bordered text-center" id="myTable">
						<thead style="background-color: Red;" class="text-white">
							<tr>
								<th>Customer Name</th>
								<th>Contact</th>
								<th>Schedule</th>
								<th>Service</th>
								<th>Status</th>
								<th>Actions</th> <!-- Added Actions Column -->
							</tr>
						</thead>

						<tbody>
							<?php foreach ($schedules as $schedule): ?>
								<tr>
									<td><?= $schedule->full_name ?? 'N/A' ?></td>
									<td><?= $schedule->contact ?? 'N/A' ?></td>
									<td><?= $schedule->date_from ?? 'N/A' ?> : <?= $schedule->time_from ?? 'N/A' ?></td>
									<td><?= $schedule->dow ?? 'N/A' ?></td>
									<td>
										<?php if ($schedule->status != 2): ?>
											<button class="btn <?= $schedule->status == 1 ? 'btn-default' : 'btn-success' ?> approve-btn"
												data-id="<?= $schedule->schedule_id ?? '' ?>"
												data-name="<?= $schedule->full_name ?? '' ?>"
												data-datefrom="<?= $schedule->date_from ?? '' ?>"
												data-timefrom="<?= $schedule->time_from ?? '' ?>"
												data-dow="<?= $schedule->dow ?? '' ?>"
												<?= $schedule->status == 0 ? '' : 'disabled="true"' ?>
												data-status="<?= $schedule->status == 0 ? 'Pending' : 'Approved' ?>">
												<?= $schedule->status == 0 ? 'Approve' : 'Approved' ?>
											</button>
										<?php endif; ?>

										<?php if ($schedule->status != 1): ?>
											<button class="btn btn-danger cancel-btn"
												data-id="<?= $schedule->schedule_id ?? '' ?>"
												data-name="<?= $schedule->full_name ?? '' ?>"
												<?= $schedule->status == 0 ? '' : 'disabled="true"' ?>
												<?= $schedule->status == 2 && 'disabled="true"' ?>
												data-status="Cancelled">
												<?= $schedule->status == 2 ? 'Cancelled' : 'Cancel' ?>
											</button>
										<?php endif; ?>
									</td>
									<td>
										<button class="btn btn-info view-btn"
											data-id="<?= $schedule->schedule_id ?? '' ?>"
											data-name="<?= $schedule->full_name ?? '' ?>"
											data-address="<?= $schedule->address ?? '' ?>"
											data-contact="<?= $schedule->contact ?? '' ?>"
											data-datefrom="<?= $schedule->date_from ?? '' ?>"
											data-timefrom="<?= $schedule->time_from ?? '' ?>"
											data-dow="<?= $schedule->dow ?? '' ?>"
											data-status="<?= $schedule->status == 0 ? 'Pending' : 'Approved' ?>"
											data-toggle="modal" data-target="#scheduleModal">
											View
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<!-- Modal -->
						<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

						<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content" style="width: 100%;">
									<div class="modal-header">
										<h5 class="modal-title" id="scheduleModalLabel">Client Schedule Details</h5>
									</div>
									<div class="modal-body">
										<p><strong>Customer Name:</strong> <span id="modalName"></span></p>
										<p><strong>Contact:</strong> <span id="modalContact"></span></p>
										<p><strong>Address:</strong> <span id="modalAddress"></span></p>
										<p><strong>Schedule:</strong> <span id="modalSchedule"></span></p>
										<p><strong>Service:</strong></p>
										<ul id="modalServiceList"></ul>
										<p><strong>Status:</strong> <span id="modalStatus"></span></p>
									</div>
									<!--<div class="modal-footer">
										<button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div> -->
								</div>
							</div>
						</div>

						<script>
							$('.view-btn').on('click', function() {
								let name = $(this).data('name');
								let contact = $(this).data('contact');
								let address = $(this).data('address');
								let datefrom = $(this).data('datefrom');
								let timefrom = $(this).data('timefrom');
								let dow = $(this).data('dow');
								let status = $(this).data('status');

								$('#modalName').text(name);
								$('#modalContact').text(contact);
								$('#modalAddress').text(address);
								$('#modalSchedule').text(datefrom + ' : ' + timefrom);
								$('#modalStatus').text(status);

								if (dow) {
									var serviceList = dow.split(',');
									$('#modalServiceList').empty();
									serviceList.forEach(function(service) {
										$('#modalServiceList').append('<li>' + service.trim() + '</li>');
									});
								} else {
									$('#modalServiceList').empty();
								}

								$('#scheduleModal').modal('show');
							});

							$('#scheduleModal').on('hidden.bs.modal', function() {
								$('#modalName, #modalContact, #modalAddress, #modalSchedule, #modalService, #modalStatus').text('');
								$('#modalServiceList').empty();

								removeBackdrop();
							});

							function removeBackdrop() {
								const backdrops = document.querySelectorAll('.modal-backdrop');
								backdrops.forEach(function(backdrop) {
									backdrop.remove();
								});
							}

							$('#closebtn').on('click', function() {
								$('#scheduleModal').modal('hide');
								removeBackdrop();
							});
						</script>

						<!-- Modal for Approving Schedule -->
						<div id="approveModal" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<h2 id="approveModalTitle"></h2>
								<p id="approveModalDetails"></p>
								<button id="confirmApprove" class="btn btn-success">Confirm</button>
								<button class="btn btn-secondary close">x</button>
							</div>
						</div>
						<script>
							// Handle the 'Approve' button click
							document.addEventListener('click', function(e) {
								if (e.target.classList.contains('approve-btn')) {
									const userName = e.target.getAttribute('data-name');
									const dateFrom = e.target.getAttribute('data-datefrom');
									const timeFrom = e.target.getAttribute('data-timefrom');
									const service = e.target.getAttribute('data-dow');
									const status = e.target.getAttribute('data-status');
									const scheduleId = e.target.getAttribute('data-id');
									console.log(scheduleId);
									document.getElementById('approveModalTitle').innerText = `Approve Schedule for ${userName}`;
									document.getElementById('approveModalDetails').innerText = `Service: ${service}\nDate: ${dateFrom}\nTime: ${timeFrom}\nStatus: ${status}`;
									document.getElementById('approveModal').style.display = "flex";

									document.getElementById('confirmApprove').onclick = function() {
										approveSchedule(scheduleId);
									};
								}
							});

							const devURL = window.location.origin + window.location.pathname;

							function approveSchedule(scheduleId) {
								$.ajax({
									url: devURL + '/../api/schedules/approve_schedule',
									method: 'POST',
									data: {
										id: scheduleId,
									},
									success: function(response) {
										const res = JSON.parse(response);
										if (res.success) {
											alert(res.message);
											document.getElementById('approveModal').style.display = "none";
											location.reload();
										} else {
											alert(res.message);
										}
									},
									error: function(xhr, status, error) {
										console.error('Error approving schedule:', error);
										alert('An error occurred while trying to approve the schedule.');
									}
								});
							}

							document.querySelectorAll('.close').forEach(function(closeBtn) {
								closeBtn.onclick = function() {
									document.getElementById('approveModal').style.display = "none";
								};
							});

							window.onclick = function(event) {
								if (event.target === document.getElementById('approveModal')) {
									document.getElementById('approveModal').style.display = "none";
								}
							};
						</script>

						<div id="cancelModal" class="modal">
							<div class="modal-content">
								<span class="close2" style="cursor:pointer">&times;</span>
								<h2 id="cancelModalTitle"></h2>
								<p id="cancelModalDetails"></p>
								<button id="confirmCancel" class="btn btn-danger">Confirm Cancel</button>
							</div>
						</div>
						<script>
							document.addEventListener('click', function(e) {
								if (e.target.classList.contains('cancel-btn')) {
									const userName = e.target.getAttribute('data-name');
									const scheduleId = e.target.getAttribute('data-id');
									console.log(scheduleId);

									// Set modal content for cancel confirmation
									document.getElementById('cancelModalTitle').innerText = `Cancel Schedule for ${userName}`;
									document.getElementById('cancelModalDetails').innerText = `Are you sure you want to cancel the schedule for ${userName}?`;
									document.getElementById('cancelModal').style.display = "flex";

									document.getElementById('confirmCancel').onclick = function() {
										cancelSchedule(scheduleId);
									};
								}
							});

							function cancelSchedule(scheduleId) {
								const devURL = window.location.origin + window.location.pathname;

								$.ajax({
									url: devURL + '/../api/schedules/cancel_schedule',
									method: 'POST',
									data: {
										id: scheduleId,
									},
									success: function(response) {
										const res = JSON.parse(response);
										if (res.success) {
											alert(res.message);
											document.getElementById('cancelModal').style.display = "none";
											location.reload(); // Reload the page to reflect changes
										} else {
											alert(res.message);
										}
									},
									error: function(xhr, status, error) {
										console.error('Error canceling schedule:', error);
										alert('An error occurred while trying to cancel the schedule.');
									}
								});
							}

							// Close modal when clicking the close button or outside the modal
							document.querySelectorAll('.close2').forEach(function(closeBtn) {
								closeBtn.onclick = function() {
									document.getElementById('cancelModal').style.display = "none";
								};
							});

							window.onclick = function(event) {
								if (event.target === document.getElementById('cancelModal')) {
									document.getElementById('cancelModal').style.display = "none";
								}
							};
						</script>
					</table>
				</div>
			</div>
		</section>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2 id="modal-title"></h2>
			<p id="modal-details"></p>
		</div>
	</div>

	<script>
		function uni_modal(title, userName, scheduleDate, scheduleTime, service, status) {
			document.getElementById('modal-title').innerText = title;
			document.getElementById('modal-details').innerText = `Service: ${service}\nDate: ${scheduleDate}\nTime: ${scheduleTime}\nStatus: ${status} `;
			document.getElementById('myModal').style.display = "flex";
		}

		document.querySelector('.close').onclick = function() {
			document.getElementById('myModal').style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target === document.getElementById('myModal')) {
				document.getElementById('myModal').style.display = "none";
			}
		}

		document.addEventListener('DOMContentLoaded', function() {
			const calendarEl = document.getElementById('calendar');
			let calendar;
			const devURL = window.location.origin + window.location.pathname;
			// const prodURL = window.location.origin + '/api/schedules';

			// Fetching the schedules from the API
			$.ajax({
				url: devURL + '/../api/schedules', // Adjust the URL as needed
				method: 'GET',
				success: function(resp) {
					if (resp) {
						const events = [];

						// Construct the events array from the response data
						resp.data.forEach(function(schedule) {
							events.push({
								title: `${schedule.firstname} ${schedule.lastname}`,
								start: schedule.date_from + 'T' + schedule.time_from,
								end: schedule.date_to + 'T' + schedule.time_to,
								id: schedule.id,
								dow: schedule.dow,
								status: schedule.status
							});
						});

						// Initialize the calendar
						calendar = new FullCalendar.Calendar(calendarEl, {
							headerToolbar: {
								left: 'prev,next today',
								center: 'title',
								right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
							},
							initialDate: '<?php echo date('Y-m-d'); ?>',
							editable: false,
							selectable: true,
							events: events,
							eventClick: function(info) {
								const userName = info.event.title;
								const scheduleDate = info.event.start.toLocaleDateString();
								const scheduleTime = `${info.event.start.toLocaleTimeString()}`;
								const service = `${info.event.extendedProps.dow}`;
								const status = `${info.event.extendedProps.status}`;
								let statusMessage = (status == 2) ? 'Cancelled' : (status == '0' ? 'Pending for Approval' : 'Approved');

								uni_modal(info.event.title, userName, scheduleDate, scheduleTime, service, statusMessage);
							}
						});

						calendar.render(); // Render the calendar
					}
				},
				error: function(xhr, status, error) {
					console.error("Error fetching schedule:", error);
				}
			});
		});
	</script>

</body>

</html>
