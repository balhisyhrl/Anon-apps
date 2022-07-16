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
						<button class="btn btn-primary mx-1" type="submit" name="save" value="saves">Update</button>
						<button class="btn btn-secondary" type="submit" name="save" value="saveexit">Update & Exit</button>
					</div>
					<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
						<li class="nav-item"> <a href="#general" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active"> <i class="uil-window d-md-none d-block"></i> <span class="d-none d-md-block">General</span> </a> </li>
						<li class="nav-item"> <a href="#seo" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0"> <i class="uil-arrow-growth d-md-none d-block"></i> <span class="d-none d-md-block">SEO Settings</span> </a> </li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="general">

							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" class="form-control" name="title" value="<?= $row->title ?>" placeholder="Title Items" required>
							</div>
							<div class="row">
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="form-control" name="status" required>
											<option <?= ($row->status == '1') ? "selected" : "" ?> value="1">Publish</option>
											<option <?= ($row->status == '0') ? "selected" : "" ?> value="0">Draft</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Tipe</label>
										<select class="form-control" name="tipe" required>
											<option <?= ($row->tipe == 'forsale') ? "selected" : "" ?> value="forsale">For Sale</option>
											<option <?= ($row->tipe == 'member') ? "selected" : "" ?> value="member">Member</option>
											<option <?= ($row->tipe == 'free') ? "selected" : "" ?> value="free">Free</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Price</label>
										<input type="number" class="form-control" name="price" value="<?= $row->price ?>" placeholder="price">
									</div>
								</div>
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Tags</label>
										<select class="max-length select2 form-control select2-multiple" name="tag[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
											<?php
											$t = explode(",", $row->tags);
											foreach ($tag as $cate) :
												$pler = '';
												foreach ($t as $tt) {
													if ($cate->slug == $tt) {
														$pler = 'selected';
													}
												}
											?>
												<option <?= $pler ?> value="<?= $cate->slug ?>"><?= $cate->title ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Btn Whatsapp Buy</label>
										<input type="text" class="form-control" name="btn_wabuy" value="<?= $row->btn_wabuy ?>" placeholder="//wa.me/">
									</div>
								</div>
								<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="mb-3">
										<label class="form-label">Btn Detail</label>
										<input type="text" class="form-control" name="btn_detail" value="<?= $row->btn_detail ?>" placeholder="//detail.com">
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
										<textarea name="description" id="desc-content"></textarea>
									</div>
								</div>
								<div class="tab-pane " id="docs">
									<div class="mb-3">
										<label class="form-label">Docs</label>
										<textarea name="docs" id="docs-content"></textarea>
									</div>
								</div>
								<div class="tab-pane " id="thumb">
									<div class="row justify-content-center">
										<div class="col-12 col-xxl-4 col-xl-4 col-lg-5 col-md-5">
											<input type="hidden" name="old_thumb" value="<?= $row->thumbnail ?>">
											<div class="mb-3">
												<label for="formFile" class="form-label">Preview</label>
												<div class="card">
													<img id="output" class="shadow card-img" src="<?= _storage("thumbnails/$row->thumbnail") ?>" width="100%" alt="">
												</div>
											</div>
											<div class="mb-3">
												<label for="formFile" class="form-label">Thumbnail</label>
												<input class="form-control" name="thumb" accept="image/*" onchange="loadFile(event)" type="file" id="formFile">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="tab-pane" id="seo">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-12">
									<div class="mb-3">
										<label class="form-label">SEO Url</label>
										<input type="text" class="form-control seo_input" name="seo_slug" id="seo_slug" value="<?= $row->seo_url ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">SEO Description</label>
										<textarea type="text" class="form-control seo_input" rows="6" name="seo_description" id="seo_description"><?= $row->seo_description ?></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label">SEO Keywords</label>
										<input type="text" class="form-control" name="seo_keywords" id="seo_keywords" value="<?= $row->seo_keywords ?>">
									</div>
								</div>
								<div class="col">
									<div class="card border" style="background: #f9f9f9;">
										<div class="card-body">
											<h4 class="m-0" style="color: #1a0cab;"><?= $row->title ?></h4>
											<div style="color: #006622;" id="slug_rev"><?= base_url($row->seo_url) ?></div>
											<small id="description_rev"><?= $row->seo_description ?></small>
										</div>
									</div>
									<small><i class="uil-comment-notes"></i> Mange your page title, meta description, keywords and unique friendly URL. This help you to manage how this topic shows up on search engines.</small>
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
	$(".seo_input").keyup(function() {
		$("#slug_rev").text("<?= base_url() ?>" + slugify($("#seo_slug").val()))
		$("#description_rev").text($("#seo_description").val())
		$("#seo_slug").val(slugify($("#seo_slug").val()))
	});

	function slugify(string) {
		return string
			.toString()
			.trim()
			.toLowerCase()
			.replace(/\s+/g, "-")
			.replace(/[^\w\-]+/g, "")
			.replace(/\-\-+/g, "-")
			.replace(/^-+/, "")
			.replace(/-+$/, "");
	}
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

	tinymce.init({
		selector: '#desc-content',
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
		setup: function(editor) {
			editor.on('init', function(e) {
				editor.setContent(`<?= $row->description ?>`);
			});
		},
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

	tinymce.init({
		selector: '#docs-content',
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
		setup: function(editor) {
			editor.on('init', function(e) {
				editor.setContent(`<?= $row->docs ?>`);
			});
		},
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