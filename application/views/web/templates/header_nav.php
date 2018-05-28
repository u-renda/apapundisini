<div class="header-container container">
	<div class="header-row">
		<div class="header-column">
			<div class="header-logo">
				<a href="<?php echo base_url(); ?>">
					<img alt="<?php echo $this->config->item('title'); ?>" width="82" height="40" src="<?php echo base_url('assets/img').'/logo.jpg'; ?>">
				</a>
			</div>
		</div>
		<div class="header-column">
			<div class="header-row">
				<div class="header-nav">
					<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
						<i class="fa fa-bars"></i>
					</button>
					<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
						<nav>
							<ul class="nav nav-pills" id="mainNav">
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Kategori
									</a>
									<ul class="dropdown-menu">
										<?php foreach ($global_product_category as $row) { ?>
										<li>
											<a href="<?php echo base_url('produk').'/'.$row->slug; ?>"><?php echo ucwords($row->name); ?></a>
										</li>
										<?php } ?>
										
									</ul>
								</li>
								<li class="w-700 pt-xs ml-sm mr-sm">
									<form action="#" method="post" class="form-horizontal">
										<div class="input-group input-search">
											<input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</form>
								</li>
								<?php if ($this->session->userdata('is_login_web') == TRUE) { ?>
								<li class="dropdown dropdown-mega dropdown-mega-signin signin logged" id="headerAccount">
									<a class="dropdown-toggle" href="#">
										<i class="fa fa-user"></i> <?php echo $this->session->userdata('name'); ?>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo $this->config->item('link_cart'); ?>"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;Keranjang Belanja</a>
										</li>
										<li>
											<a href="<?php echo $this->config->item('link_logout'); ?>"><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;Keluar</a>
										</li>
									</ul>
								</li>
								<?php } else { ?>
								<li>
									<a href="<?php echo $this->config->item('link_login'); ?>">
										Masuk / Daftar
									</a>
								</li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>