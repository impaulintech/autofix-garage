<div class="container pt-4">
	<h2 class="mb-4">Services</h2>
	<?= $this->session->flashdata('msg'); ?>
	<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addServiceModal">
		Add Service
	</button>
	<div style="overflow-y: auto; height: 100%;">
		<table class="table table-bordered table-striped">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price (₱)</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($services as $service): ?>
					<tr>
						<td><?= $service->id; ?></td>
						<td><?= $service->name; ?></td>
						<td><?= number_format($service->price, 2); ?></td>
						<td>
							<button class="btn btn-sm btn-warning edit-btn"
								data-id="<?= $service->id; ?>"
								data-name="<?= $service->name; ?>"
								data-price="<?= $service->price; ?>"
								data-toggle="modal"
								data-target="#editServiceModal">
								Edit
							</button>
							<a href="<?= base_url('service/delete/' . $service->id); ?>"
								class="btn btn-sm btn-danger"
								onclick="return confirm('Are you sure you want to delete this service?');">
								Delete
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open('service/add'); ?>
			<div class="modal-header">
				<h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="name">Service Name</label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<label for="price">Price (₱)</label>
					<input type="number" step="0.01" class="form-control" name="price" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Add Service</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open('service/edit'); ?>
			<div class="modal-header">
				<h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="edit-service-id">
				<div class="form-group">
					<label for="name">Service Name</label>
					<input type="text" class="form-control" name="name" id="edit-service-name" required>
				</div>
				<div class="form-group">
					<label for="price">Price (₱)</label>
					<input type="number" step="0.01" class="form-control" name="price" id="edit-service-price" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Update Service</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.edit-btn').on('click', function() {
			var id = $(this).data('id');
			var name = $(this).data('name');
			var price = $(this).data('price');
			$('#edit-service-id').val(id);
			$('#edit-service-name').val(name);
			$('#edit-service-price').val(price);
		});
	});
</script>
