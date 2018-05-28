<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="<?php echo $this->config->item('title'); ?>" />
		<meta name="description" content="<?php echo $this->config->item('title'); ?>">
		<meta name="author" content="renda.innovation@gmail.com">
		<title><?php echo $this->config->item('title'); ?></title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/img').'/logo.jpg'; ?>" type="image/x-icon" />
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css').'/bootstrap.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css').'/font-awesome.css'; ?>" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme-admin.css'; ?>" />
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins').'/default-admin.css'; ?>" />
		
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/custom-admin-login.css'; ?>">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/vendor/modernizr').'/modernizr.js'; ?>"></script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo $this->config->item('link_admin_login'); ?>" class="logo pull-left">
					<img src="<?php echo base_url('assets/img').'/logo-admin.jpg'; ?>" height="54" alt="<?php echo $this->config->item('title'); ?>" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
					</div>
					<div class="panel-body">
                        <?php
						if (isset($error) == TRUE) { 
							echo '<div class="alert alert-danger">'.$error.'</div>';
                        } ?>
						<form action="<?php echo $this->config->item('link_admin_login'); ?>" method="post">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4 col-sm-offset-8 text-right">
									<input type="submit" class="btn btn-primary hidden-xs" name="submit" value="LOGIN" />
									<input type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" name="submit" value="LOGIN" />
								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo date('Y'); ?>. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/vendor/jquery').'/jquery.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/bootstrap/js').'/bootstrap.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/nanoscroller').'/nanoscroller.js'; ?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url('assets/js').'/theme-admin.js'; ?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url('assets/js').'/theme.init-admin.js'; ?>"></script>
	</body>
</html>