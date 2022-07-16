<!-- third party css -->
<link href="<?= _backEnd() ?>css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="<?= _backEnd() ?>css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

<!-- third party css end -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">

				</ol>
			</div>
			<h4 class="page-title"><?= $title ?></h4>
		</div>
	</div>
</div>
<!-- end page title -->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-sm-4">
						<a href="<?= base_url("admin/items/create") ?>" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> New Items</a>
					</div>
					<div class="col-sm-8">
					</div><!-- end col-->
				</div>

				<table id="basic-datatable" class="table dt-responsive">
					<thead>
						<tr>
							<th class="all" style="width: 20px;">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="customCheck1">
									<label class="form-check-label" for="customCheck1">&nbsp;</label>
								</div>
							</th>
							<th>Items</th>
							<th>Tipe</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $c) : ?>
							<tr>
								<td>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="customCheck2">
										<label class="form-check-label" for="customCheck2">&nbsp;</label>
									</div>
								</td>
								<td>
									<?= $c->title ?>
								</td>
								<td><?php
									if ($c->tipe == 'forsale') {
										echo '<span class="badge bg-primary">For Sale</span>';
									} else if ($c->tipe == 'free') {
										echo '<span class="badge bg-success">Free</span>';
									} else if ($c->tipe == 'member') {
										echo '<span class="badge bg-info">Member</span>';
									}
									?></td>
								<td><?= ($c->status == 1) ? "Publish" : "Draft" ?></td>
								<td class="table-action">
									<div class="dropdown">
										<button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="uil-arrow-circle-down"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-end">
											<a href="<?= base_url("admin/items/vers/$c->id") ?>" class="dropdown-item"> <i class="uil-game-structure"></i> List Version</a>
											<a href="<?= base_url("admin/items/edit/$c->id") ?>" class="dropdown-item"> <i class="mdi mdi-square-edit-outline"></i> Edit</a>
											<a href="<?= base_url("admin/items/delete/$c->id") ?>" class="delete-confirm dropdown-item"> <i class="mdi mdi-delete"></i> Delete</a>
										</div>
									</div>

								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div> <!-- end card-body-->
		</div> <!-- end card-->
	</div> <!-- end col -->
</div>
<!-- end row -->


<script src="<?= _backEnd() ?>js/vendor.min.js"></script>
<script src="<?= _backEnd() ?>js/app.min.js"></script>
<!-- third party js -->
<script src="<?= _backEnd() ?>js/vendor/jquery.dataTables.min.js"></script>
<script src="<?= _backEnd() ?>js/vendor/dataTables.bootstrap5.js"></script>
<script src="<?= _backEnd() ?>js/vendor/dataTables.responsive.min.js"></script>
<script src="<?= _backEnd() ?>js/vendor/responsive.bootstrap5.min.js"></script>
<script src="<?= _backEnd() ?>js/vendor/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->
<script src="<?= _backEnd() ?>js/pages/demo.datatable-init.js"></script>
<script src="<?= _backEnd() ?>js/sweetalert.min.js"></script>
<script>
	$('.delete-confirm').on('click', function(event) {
		event.preventDefault();
		const url = $(this).attr('href');
		swal({
			title: 'Are you sure?',
			text: 'This record and it`s details will be permanantly deleted!',
			icon: 'warning',
			buttons: ["Cancel", "Yes!"],
		}).then(function(value) {
			if (value) {
				window.location.href = url;
			}
		});
	});
</script>