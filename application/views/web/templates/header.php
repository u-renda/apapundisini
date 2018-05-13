<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title><?php echo $this->config->item('title'); ?></title>	

		<meta name="keywords" content="" />
		<meta name="description" content="Apapun Disini">
		<meta name="author" content="renda.innovation@gmail.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/img').'/logo.jpg'; ?>" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo base_url('assets/img').'/logo.jpg'; ?>">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css').'/bootstrap.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css').'/font-awesome.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/owl.carousel/assets').'/owl.carousel.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/owl.carousel/assets').'/owl.theme.default.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/magnific-popup').'/magnific-popup.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/pnotify').'/pnotify.custom.css'; ?>">
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme-elements.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme-shop.css'; ?>">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/rs-plugin/css').'/settings.css'; ?>" media="screen">
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins').'/default.css'; ?>">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/custom.css'; ?>">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/vendor/modernizr').'/modernizr.js'; ?>"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo base_url('assets/css').'/ie.css'; ?>">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="<?php echo base_url('assets/vendor/respond').'/respond.js'; ?>"></script>
			<script src="<?php echo base_url('assets/vendor/excanvas').'/excanvas.js'; ?>"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
			<header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 0, "stickySetTop": "0"}'>
				<div class="header-body">
					<?php $this->load->view('web/templates/header_nav'); ?>
				</div>
			</header>
