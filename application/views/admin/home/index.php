<section role="main" class="content-body">
	<header class="page-header">
		<h2>Home</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Home</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row">
		<div class="col-md-12 col-lg-12 col-xl-12">
			<section class="panel">
				<div class="panel-body">
					<p class="mt-sm">Selamat datang di sistem <?php echo $this->config->item('title'); ?></p>
				</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-lg-3 col-xl-3">
			<a href="<?php echo $this->config->item('link_admin_slider'); ?>" class="color-grey">
				<section class="panel">
					<header class="panel-heading bg-white">
						<div class="panel-heading-icon bg-primary mt-sm">
							<i class="fa fa-th-large"></i>
						</div>
					</header>
					<div class="panel-body">
						<h3 class="text-semibold mt-none text-center">Slider</h3>
					</div>
				</section>
			</a>
		</div>
		<div class="col-md-3 col-lg-3 col-xl-3">
			<a href="<?php echo $this->config->item('link_admin_keunggulan'); ?>" class="color-grey">
				<section class="panel">
					<header class="panel-heading bg-white">
						<div class="panel-heading-icon bg-primary mt-sm">
							<i class="fa fa-check"></i>
						</div>
					</header>
					<div class="panel-body">
						<h3 class="text-semibold mt-none text-center">Keunggulan</h3>
					</div>
				</section>
			</a>
		</div>
		<div class="col-md-3 col-lg-3 col-xl-3">
			<a href="<?php echo $this->config->item('link_admin_galeri'); ?>" class="color-grey">
				<section class="panel">
					<header class="panel-heading bg-white">
						<div class="panel-heading-icon bg-primary mt-sm">
							<i class="fa fa-picture-o"></i>
						</div>
					</header>
					<div class="panel-body">
						<h3 class="text-semibold mt-none text-center">Galeri</h3>
					</div>
				</section>
			</a>
		</div>
		<div class="col-md-3 col-lg-3 col-xl-3">
			<a href="<?php echo $this->config->item('link_admin_testimonial'); ?>" class="color-grey">
				<section class="panel">
					<header class="panel-heading bg-white">
						<div class="panel-heading-icon bg-primary mt-sm">
							<i class="fa fa-pencil-square-o"></i>
						</div>
					</header>
					<div class="panel-body">
						<h3 class="text-semibold mt-none text-center">Testimonial</h3>
					</div>
				</section>
			</a>
		</div>
		<div class="col-md-3 col-lg-3 col-xl-3">
			<a href="<?php echo $this->config->item('link_admin_produk'); ?>" class="color-grey">
				<section class="panel">
					<header class="panel-heading bg-white">
						<div class="panel-heading-icon bg-primary mt-sm">
							<i class="fa fa-building"></i>
						</div>
					</header>
					<div class="panel-body">
						<h3 class="text-semibold mt-none text-center">Produk</h3>
					</div>
				</section>
			</a>
		</div>
	</div>
