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
						<ul class="list-group" style="max-height: 540px; overflow: scroll;">
							<?php if (!empty($schedules)): ?>
								<?php foreach (array_reverse($schedules) as $schedule): ?>
									<li class="list-group-item text-left">
										<?php echo date('Y-m-d H:i', strtotime($schedule['date_from'] . ' ' . $schedule['time_from'])); ?>
										<ul><?php foreach (explode(',', $schedule['dow']) as $dow) echo "<li>" . htmlspecialchars(trim($dow)) . "</li>"; ?></ul>
										<?php if ($schedule['status'] == 0): ?>
											<span class="badge bg-warning float-right" style="padding: 6px">Pending for Approval</span>
										<?php elseif ($schedule['status'] == 1): ?>
											<span class="badge bg-success float-right" style="padding: 6px">Approved</span>
										<?php elseif ($schedule['status'] == 2): ?>
											<span class="badge bg-danger float-right" style="padding: 6px">Cancelled</span>
										<?php endif; ?>

										<?php if ($schedule['status'] != 2): ?>
											<button class="btn btn-danger cancel-btn"
												data-id="<?= $schedule['schedule_id']; ?>">
												Cancel
											</button>
										<?php endif; ?>
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
					document.addEventListener('click', function(e) {
						if (e.target.classList.contains('cancel-btn')) {
							const scheduleId = e.target.getAttribute('data-id');

							Swal.fire({
								title: "Cancel Schedule",
								text: "Are you sure you want to cancel your schedule?",
								icon: "warning",
								showCancelButton: true,
								confirmButtonColor: "#d33",
								cancelButtonColor: "#6c757d",
								confirmButtonText: "Yes, Cancel It",
								cancelButtonText: "No, Keep It"
							}).then((result) => {
								if (result.isConfirmed) {
									cancelSchedule(scheduleId);
								}
							});
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
									Swal.fire({
										title: "Canceled!",
										text: res.message,
										icon: "success",
										confirmButtonColor: "#3085d6"
									}).then(() => {
										location.reload();
									});
								} else {
									Swal.fire({
										title: "Error",
										text: res.message,
										icon: "error",
										confirmButtonColor: "#d33"
									});
								}
							},
							error: function(xhr, status, error) {
								console.error('Error canceling schedule:', error);
								Swal.fire({
									title: "Error",
									text: "An error occurred while trying to cancel the schedule.",
									icon: "error",
									confirmButtonColor: "#d33"
								});
							}
						});
					}

					function openModals(title, service, status) {
						const serviceList = service.split(',').map(s => `<li>${s}</li>`).join('');
						let statusMessage = (status == 2) ? 'Cancelled' : (status == '0' ? 'Pending for Approval' : 'Approved');

						document.getElementById('modals-title').innerText = title;
						document.getElementById('modals-details').innerHTML = `
								<ul>${serviceList}</ul>
								<p>Status: ${statusMessage}</p>
						`;
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
											title: 'Appointment: <?= $schedule['date_from'] ?> - <?= $schedule['time_from'] ?>',
											start: '<?= $schedule['date_from'] ?>T<?= $schedule['time_from'] ?>',
											id: '<?= $schedule['status'] ?>',
											service: '<?= $schedule['dow'] ?>',
										},
									<?php endforeach; ?>
								<?php endif; ?>
							],
							eventClick: function(info) {
								openModals(info.event.title, info.event.extendedProps.service, info.event.id);
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
		<h2 id="modals-title"></h2>
		<p id="modals-details"></p>
	</div>
</div>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>

<script>
	$(document).ready(function() {
		<?php if ($this->session->flashdata('success')): ?>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				color: '#333',
				iconColor: '#48c78e',
				customClass: {
					popup: 'small-toast'
				}
			});

			Toast.fire({
				icon: 'success',
				title: "<?= $this->session->flashdata('success') ?>"
			});
		<?php endif; ?>
	});
</script>
