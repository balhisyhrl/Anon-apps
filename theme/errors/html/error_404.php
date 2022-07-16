<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html class="loading light-layout" lang="en" data-textdirection="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
	<title>Error - 404</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/colors.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/components.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/themes/dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/themes/bordered-layout.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/themes/semi-dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/core/menu/menu-types/horizontal-menu.css">
	<link rel="stylesheet" type="text/css" href="<?= _frontEnd() ?>css/pages/page-misc.css">

</head>

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
	<!-- BEGIN: Content-->
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- Error page-->
				<div class="misc-wrapper">
					<div class="misc-inner p-2 p-sm-3">
						<div class="w-100 text-center">
							<h2 class="mb-1">Page Not Found 🕵🏻‍♀️</h2>
							<p class="mb-2">Oops! 😖 The requested URL was not found on this server. <br><?php echo $message; ?></p>
							<a class="btn btn-primary mb-2 btn-sm-block" href="javascript:history.back()">Back</a>
							<br>
							<img class="img-fluid" src="<?= _frontEnd() ?>images/pages/error.svg" alt="Error page" />
						</div>
					</div>
				</div>
				<!-- / Error page-->
			</div>
		</div>
	</div>
	<!-- END: Content-->

	<script>
		$(window).on('load', function() {
			if (feather) {
				feather.replace({
					width: 14,
					height: 14
				});
			}
		})
	</script>
</body>


</html>
