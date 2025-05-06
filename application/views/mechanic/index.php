<div class="container pt-4 " style="padding-bottom: 200px;">
	<h2 class="mb-4">Mechanics</h2>
	<?= $this->session->flashdata('msg'); ?>
	<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMechanicModal">
		Add Mechanic
	</button>
	<div style="overflow-y: auto; height: 100%;">
		<table class="table table-bordered table-striped">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Specialty</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($mechanics as $mechanic): ?>
					<tr>
						<td><?= isset($mechanic->mechanic_id) ? $mechanic->mechanic_id : 'N/A'; ?></td>
						<td><?= isset($mechanic->name) ? $mechanic->name : 'N/A'; ?></td>
						<td><?= isset($mechanic->specialty) ? $mechanic->specialty : 'N/A'; ?></td>
						<td>
							<button class="btn btn-sm btn-warning edit-btn"
								data-id="<?= $mechanic->mechanic_id; ?>"
								data-name="<?= $mechanic->name; ?>"
								data-specialty="<?= $mechanic->specialty; ?>"
								data-toggle="modal"
								data-target="#editMechanicModal">
								Edit
							</button>
							<a href="<?= base_url('mechanic/delete/' . (isset($mechanic->mechanic_id) ? $mechanic->mechanic_id : '')) ?>"
								class="btn btn-sm btn-danger"
								onclick="return confirm('Are you sure you want to delete this mechanic?');">
								Delete
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Add Mechanic Modal -->
<div class="modal fade" id="addMechanicModal" tabindex="-1" role="dialog" aria-labelledby="addMechanicModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open('mechanic/add'); ?>
			<div class="modal-header">
				<h5 class="modal-title" id="addMechanicModalLabel">Add Mechanic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="name">Mechanic Name</label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<label for="specialty">Specialty</label>
					<input type="text" class="form-control" name="specialty" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Add Mechanic</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<!-- Edit Mechanic Modal -->
<div class="modal fade" id="editMechanicModal" tabindex="-1" role="dialog" aria-labelledby="editMechanicModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open('mechanic/edit'); ?>
			<div class="modal-header">
				<h5 class="modal-title" id="editMechanicModalLabel">Edit Mechanic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="edit-mechanic-id">
				<div class="form-group">
					<label for="name">Mechanic Name</label>
					<input type="text" class="form-control" name="name" id="edit-mechanic-name" required>
				</div>
				<div class="form-group">
					<label for="specialty">Specialty</label>
					<input type="text" class="form-control" name="specialty" id="edit-mechanic-specialty" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Update Mechanic</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {
		$('.edit-btn').on('click', function() {
			var id = $(this).data('id');
			var name = $(this).data('name');
			var specialty = $(this).data('specialty');
			$('#edit-mechanic-id').val(id);
			$('#edit-mechanic-name').val(name);
			$('#edit-mechanic-specialty').val(specialty);
		});
	});
</script>
