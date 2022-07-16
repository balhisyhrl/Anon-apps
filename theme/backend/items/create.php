<script src="<?= _backEnd() ?>tinymce/tinymce.min.js?v=123"></script>
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
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="d-flex justify-content-end mb-3">
						<button class="btn btn-primary mx-1" type="submit" name="save" value="save">Create</button>
						<!-- <button class="btn btn-secondary" type="submit" name="save" value="saveexit">Update & Exit</button> -->
					</div>
					<div class="mb-3">
						<label class="form-label">Title</label>
						<input type="text" class="form-control" name="title" value="" placeholder="Title Items" required>
					</div>
					<div class="row">
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-control" name="status" required>
									<option value="1">Publish</option>
									<option value="0">Draft</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Tipe</label>
								<select class="form-control" name="tipe" required>
									<option value="forsale">For Sale</option>
									<option value="member">Member</option>
									<option value="free">Free</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Price</label>
								<input type="number" class="form-control" name="price" value="" placeholder="price">
							</div>
						</div>
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Tags</label>
								<select class="max-length select2 form-control select2-multiple" name="tag[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
									<?php foreach ($tag as $cate) : ?>
										<option value="<?= $cate->slug ?>"><?= $cate->title ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Btn Whatsapp Buy</label>
								<input type="text" class="form-control" name="btn_wabuy" value="" placeholder="//wa.me/">
							</div>
						</div>
						<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
							<div class="mb-3">
								<label class="form-label">Btn Detail</label>
								<input type="text" class="form-control" name="btn_detail" value="" placeholder="//detail.com">
							</div>
						</div>
					</div>

					<ul class="nav nav-tabs nav-justified nav-bordered mb-3">
						<li class="nav-item">
							<a href="#desc" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
								<i class="uil-list-ul d-md-none d-block"></i>
								<span class="d-none d-md-block">Description</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#docs" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
								<i class="uil-file-shield-alt d-md-none d-block"></i>
								<span class="d-none d-md-block">Docs</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#thumb" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
								<i class="uil-scenery d-md-none d-block"></i>
								<span class="d-none d-md-block">Thumbnail</span>
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="desc">
							<div class="mb-3">
								<label class="form-label">Description</label>
								<textarea name="description" class="content-desc"></textarea>
							</div>
						</div>
						<div class="tab-pane " id="docs">
							<div class="mb-3">
								<label class="form-label">Docs</label>
								<textarea name="docs" class="content-desc"></textarea>
							</div>
						</div>
						<div class="tab-pane " id="thumb">
							<div class="row justify-content-center">
								<div class="col-12 col-xxl-4 col-xl-4 col-lg-5 col-md-5">
									<div class="mb-3">
										<label for="formFile" class="form-label">Preview</label>
										<div class="card">
											<img id="output" class="shadow card-img" src="<?= _storage("default.jpg") ?>" width="100%" alt="">
										</div>
									</div>
									<div class="mb-3">
										<label for="formFile" class="form-label">Thumbnail</label>
										<input class="form-control" name="thumb" accept="image/*" onchange="loadFile(event)" type="file" id="formFile" required>
									</div>
								</div>
							</div>

						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?= _backEnd() ?>js/vendor.min.js"></script>
<script src="<?= _backEnd() ?>js/app.min.js"></script>

<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

	tinymce.init({
		selector: '.content-desc',
		plugins: 'link lists image advlist fullscreen media code table emoticons textcolor codesample hr preview mediaGallery',
		height: 400,
		menubar: false,
		relative_urls: false,
		remove_script_host: false,
		convert_urls: true,
		skin: "oxide-dark",
		content_css: "dark",
		toolbar: [
			'formatselect | bold italic underline strikethrough forecolor backcolor bullist numlist | alignleft aligncenter alignright alignjustify | mediaGallery media link | table emoticons hr | code codesample | fullscreen',
		],
		codesample_languages: [{
				text: 'HTML/XML',
				value: 'html'
			},
			{
				text: 'JavaScript',
				value: 'javascript'
			},
			{
				text: 'CSS',
				value: 'css'
			},
			{
				text: 'PHP',
				value: 'php'
			},
			{
				text: 'Ruby',
				value: 'ruby'
			},
			{
				text: 'Python',
				value: 'python'
			},
			{
				text: 'Java',
				value: 'java'
			},
			{
				text: 'C',
				value: 'c'
			},
			{
				text: 'C#',
				value: 'csharp'
			},
			{
				text: 'C++',
				value: 'cpp'
			}
		],
	});
	tinymce.PluginManager.add('mediaGallery', function(editor, url) {
		var openDialog = function() {
			loaddir("files")
			$('#skfindershow').modal('show');
		};
		editor.ui.registry.addButton('mediaGallery', {
			icon: 'gallery',
			onAction: function() {
				// Open window
				openDialog();
			}
		});
	});
	maxLength = $('.max-length')
	maxLength.wrap('<div class="position-relative"></div>').select2({
		dropdownAutoWidth: true,
		width: '100%',
		maximumSelectionLength: 5,
		dropdownParent: maxLength.parent(),
		placeholder: 'Select maximum 2 items'
	});
</script>
<!-- Modal -->
<div class="modal fade m-0 p-0" style="z-index: 999999999999;" id="skfindershow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">SKFinder</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div> <!-- end modal header -->
			<div class="modal-body" id="skfinder">

			</div>
		</div> <!-- end modal content-->
	</div> <!-- end modal dialog-->
</div> <!-- end modal-->

<script>
	var content = $("#skfinder")
	var start = $("#showskfinder")

	function loaddir(cmd) {
		content.append('<div style="background-color: #0000008c; position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999;"><div id="status"><div class="bouncing-loader"><div></div><div></div><div></div></div></div></div>')
		content.load('<?= base_url('admin/storage/') ?>' + encodeURIComponent(cmd))
	}

	function setitem(file) {
		var ed = tinymce.activeEditor;
		var img = '<img src="' + file + '" alt="ilhamsk" style="border-radius:.25rem;">';
		ed.selection.setContent(img);
		$('#skfindershow').modal('hide');
	}
</script>