<div role="main" class="main">

	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Masuk / Daftar</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

		<div class="row">
			<div class="col-md-12">

				<div class="featured-boxes">
					<div class="row">
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Masuk</h4>
									<?php
									if (isset($error_login) == TRUE) { 
										echo '<div class="alert alert-danger">'.$error_login.'</div>';
									} ?>
									<form action="<?php echo $this->config->item('link_login'); ?>" id="frmSignIn" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Alamat E-mail</label>
													<input type="text" value="<?php echo set_value('email'); ?>" class="form-control input-lg" name="email" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Password</label>
													<input type="password" value="" class="form-control input-lg" name="password" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Login" name="submit" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Daftar</h4>
									<?php
									if (isset($error_register) == TRUE) { 
										echo '<div class="alert alert-danger">'.$error_register.'</div>';
									} ?>
									<form action="<?php echo $this->config->item('link_register'); ?>" id="frmSignUp" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Nama</label>
													<input type="text" value="<?php echo set_value('name'); ?>" class="form-control input-lg" name="name" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>No. Telp</label>
													<input type="text" value="<?php echo set_value('phone'); ?>" class="form-control input-lg" name="phone" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Alamat E-mail</label>
													<input type="email" value="<?php echo set_value('email'); ?>" class="form-control input-lg" name="email" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-6">
													<label>Password</label>
													<input type="password" value="" class="form-control input-lg" name="password" required>
												</div>
												<div class="col-md-6">
													<label>Ulangi Password</label>
													<input type="password" value="" class="form-control input-lg" name="re_password" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" name="submit" value="Register" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

</div>
