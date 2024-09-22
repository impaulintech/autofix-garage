<style>
	/* Modals styles */
	.modals {
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

	.modals-content {
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
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>

<div class="content-wrapper" style="padding: 40px 20px;">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 text-center">
					<!-- Full-width button -->
					<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#BackdropHealth">
						Schedule Appointment
					</button>

					<div class="small-box bg-info center mt-3">
						<div class="inner">
							<h3><?= $scheduledAppointment ?></h3>
							<p>Total scheduled appointment</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>

					<!-- Display current user's appointments -->
					<div class="mt-3">
						<h4>Your Appointments</h4>
						<ul class="list-group">
							<?php if (!empty($schedules)): ?>
								<?php foreach ($schedules as $schedule): ?>
									<li class="list-group-item text-left">
										<?php echo date('Y-m-d H:i', strtotime($schedule['date_from'] . ' ' . $schedule['time_from'])); ?> - <?php echo $schedule['dow']; ?>
									</li>
								<?php endforeach; ?>
							<?php else: ?>
								<li class="list-group-item">No appointments scheduled.</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<div id="calendar"></div>
				</div>

				<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

				<script>
					function openModals(title, date, time) {
						document.getElementById('modals-title').innerText = title;
						document.getElementById('modals-details').innerText = `Date: ${date}\nTime: ${time}`;
						document.getElementById('myModals').style.display = "flex";
					}

					document.querySelector('.close').onclick = function() {
						document.getElementById('myModals').style.display = "none";
					}

					window.onclick = function(event) {
						if (event.target === document.getElementById('myModals')) {
							document.getElementById('myModals').style.display = "none";
						}
					}

					document.addEventListener('DOMContentLoaded', function() {
						const calendarEl = document.getElementById('calendar');
						const calendar = new FullCalendar.Calendar(calendarEl, {
							initialView: 'dayGridMonth',
							events: [
								<?php if (!empty($schedules)) : ?>
									<?php foreach ($schedules as $schedule) : ?> {
											title: 'Appointment: <?= $schedule['dow'] ?>',
											start: '<?= $schedule['date_from'] ?>T<?= $schedule['time_from'] ?>',
										},
									<?php endforeach; ?>
								<?php endif; ?>
							],
							eventClick: function(info) {
								openModals(info.event.title, info.event.start.toISOString().split('T')[0], info.event.start.toLocaleTimeString());
							}
						});
						calendar.render();
					});
				</script>
			</div>
		</div>
	</section>
</div>

<!-- The Modals -->
<div id="myModals" class="modals">
	<div class="modals-content">
		<span class="close">&times;</span>
		<h2 id="modals-title"></h2>
		<p id="modals-details"></p>
	</div>
</div>
