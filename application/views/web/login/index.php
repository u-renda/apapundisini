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
									<form action="<?php echo $this->config->item('link_login'); ?>" id="frmSignIn" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>E-mail Address</label>
													<input type="text" value="" class="form-control input-lg" name="email">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Password</label>
													<input type="password" value="" class="form-control input-lg" name="password">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
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
									<form action="<?php echo $this->config->item('link_register'); ?>" id="frmSignUp" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>E-mail Address</label>
													<input type="email" value="" class="form-control input-lg" name="email" required>
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
												<input type="submit" value="Register" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
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
