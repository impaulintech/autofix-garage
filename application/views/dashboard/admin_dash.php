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
								<th>ID</th>
								<th>Customer Name</th>
								<th>Address</th>
								<th>Contact</th>
								<th>Scheduled From</th>
								<th>Scheduled To</th>
								<th>Service</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($schedules as $schedule): ?>
								<tr>
									<td><?= $schedule->id ?? 'N/A' ?></td>
									<td><?= $schedule->full_name ?? 'N/A' ?></td>
									<td><?= $schedule->address ?? 'N/A' ?></td>
									<td><?= $schedule->contact ?? 'N/A' ?></td>
									<td><?= $schedule->date_from ?? 'N/A' ?> : <?= $schedule->time_from ?? 'N/A' ?></td>
									<td><?= $schedule->date_to ?? 'N/A' ?> : <?= $schedule->time_to ?? 'N/A' ?></td>
									<td><?= $schedule->dow ?? 'N/A' ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>

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
		function uni_modal(title, userName, scheduleDate, scheduleTime, service) {
			document.getElementById('modal-title').innerText = title;
			document.getElementById('modal-details').innerText = `Service: ${service}\nDate: ${scheduleDate}\nTime: ${scheduleTime}`;
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
								dow: schedule.dow
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
								uni_modal(info.event.title, userName, scheduleDate, scheduleTime, service);
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
