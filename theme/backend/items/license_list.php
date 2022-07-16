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
				<form action="" method="post">
					<div class="mb-1">
						<label class="form-label">For Items</label>
						<select class="form-control select2" name="id_items" data-toggle="select2">
							<?php foreach ($getitems as $it) : ?>
								<option value="<?= $it->id ?>"><?= $it->title ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="mb-1">
						<label class="form-label">License</label>
						<div class="input-group">
							<input type="text" class="form-control" id="licen" placeholder="XXXX-XXXX-XXXX-XXXX" name="license" required autocomplete="off" minlength="4">
							<a href="javascript:void(0)" class="btn btn-success" onclick="random_license()">Random</a>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Create</button>
					</div>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">

				<table id="basic-datatable" class="table dt-responsive">
					<thead>
						<tr>
							<th class="all" style="width: 20px;">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="customCheck1">
									<label class="form-check-label" for="customCheck1">&nbsp;</label>
								</div>
							</th>
							<th>License</th>
							<th>For</th>
							<th>Created at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($row as $c) : ?>
							<tr>
								<td>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="customCheck2">
										<label class="form-check-label" for="customCheck2">&nbsp;</label>
									</div>
								</td>
								<td><?= $c->license ?></td>
								<td><?= $c->title_items ?></td>
								<td><?= $c->created_at ?></td>
								<td class="table-action">
									<div class="dropdown">
										<button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="uil-arrow-circle-down"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-end">
											<a href="<?= base_url("admin/license/delete/$c->id") ?>" class="delete-confirm dropdown-item"> <i class="mdi mdi-delete"></i> Delete</a>
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

	function edit(id) {
		$("#modal-edit").modal('show')
		$("#content-modal-edit").html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
		$("#content-modal-edit").load("<?= base_url("admin/items/vers/edit/") ?>" + id)
	}

	function random_license() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				$("#licen").val(xhttp.responseText)
			}
		};
		xhttp.open("GET", "<?= base_url("admin/license/generate") ?>", true);
		xhttp.send();
	}
</script>