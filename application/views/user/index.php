<?php
$this->load->model('user_model');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
	$user_id = $_POST['user_id'];
	$user = $this->user_model->row($user_id);

	if ($user && $user->username === 'admin') {
		$this->session->set_flashdata('message', 'Action not allowed for admin user!');
		redirect(current_url());
	}

	$this->user_model->approve_account($user_id);
	$this->session->set_flashdata('message', 'User approved successfully!');
	redirect(current_url());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['disable'])) {
	$user_id = $_POST['user_id'];
	$user = $this->user_model->row($user_id);

	if ($user && $user->username === 'admin') {
		$this->session->set_flashdata('message', 'Action not allowed for admin user!');
		redirect(current_url());
	}

	$this->user_model->disable_account($user_id);
	$this->session->set_flashdata('message', 'User disabled successfully!');
	redirect(current_url());
}
?>

<div class="content-wrapper" style="padding: 20px;">
	<table class="table-list table table-striped table-bordered text-center" id="myTable">
		<thead style="background-color:red;" class="text-white">
			<tr>
				<th>User ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Customer ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
		</thead>

		<?php foreach ($users as $user) : ?>
			<tr>
				<td><?= $user->user_id ?></td>
				<td><?= $user->username ?></td>
				<td><?= $user->password ?></td>
				<td><?= $user->emp_id ?></td>
				<td><?= $user->lname ?></td>
				<td><?= $user->fname ?></td>
				<td>
					<form method="post" style="display:inline;">
						<input type="hidden" name="user_id" value="<?= $user->user_id ?>">
						<?php if ($user->active == 0) : ?>
							<button type="submit" name="approve" class="btn btn-success" <?php if ($user->username === 'admin') echo 'disabled'; ?>>Approve</button>
						<?php else : ?>
							<button type="submit" name="disable" class="btn btn-danger" <?php if ($user->username === 'admin') echo 'disabled'; ?>>Disable</button>
						<?php endif; ?>
					</form>
				</td>
				<td>
					<a href="<?= site_url('user/show/' . $user->user_id) ?>"><img src="<?= base_url('assets/images/edit.png') ?>" style="width:15px;" alt="edit"></a>
					<a href="<?= site_url('user/delete/' . $user->user_id) ?>"><img src="<?= base_url('assets/images/delete.png') ?>" style="width:15px;" alt="delete"></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success">
			<?= $this->session->flashdata('message'); ?>
		</div>
	<?php endif; ?>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BackdropAdd">
		Add New
	</button>

	<div class="modal fade" id="BackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<h5 class="modal-title col-12 text-center" id="staticBackdropLabel">Add</h5>
					</div>
					<div class="col-lg-4">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form action="<?= site_url('user/add') ?>" method="post">
					<div class="modal-body">
						<div class="col">
							<label for="emp_id">Employee ID :</label>
							<input type="text" class="form-control" placeholder="Employee ID" id="emp_id" name="emp_id" value="" required="">
						</div>
						<div class="row">
							<div class="col">
								<label for="username">Username :</label>
								<input type="text" class="form-control" placeholder="Username" id="username" name="username" value="" required="">
							</div>
							<div class="col">
								<label for="password">Password :</label>
								<input type="text" class="form-control" placeholder="Password" id="password" name="password" value="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
