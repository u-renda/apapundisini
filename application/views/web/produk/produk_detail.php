<div role="main" class="main shop" id="produk_detail_page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<hr class="tall">
			</div>
		</div>

		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<div class="owl-carousel owl-theme" data-plugin-options='{"items": 1}'>
							<div>
								<div class="thumbnail">
									<img alt="<?php echo $product->name; ?>" class="img-responsive img-rounded" src="<?php echo $product->photo; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="summary entry-summary">
							<h1 class="mb-none"><strong><?php echo ucwords($product->name); ?></strong></h1>
							<p class="price">
								<span class="amount"><?php echo 'Rp '.number_format($product->price,0,',','.'); ?></span>
							</p>
							<p class="taller"><?php echo $product->description; ?></p>

							<form method="post" class="cart" action="<?php echo $this->config->item('link_cart_create'); ?>" id="the_form">
								<input type="hidden" name="id_product" value="<?php echo $product->id_product; ?>">
								<input type="hidden" name="price" value="<?php echo $product->price; ?>">
								<input type="hidden" name="stock" value="<?php echo $product->stock; ?>">
								<div class="col-md-4 pl-none">
									<div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 1, "max": <?php echo $product->stock; ?> }'>
										<div class="input-group">
											<div class="spinner-buttons input-group-btn">
												<button type="button" class="btn btn-default spinner-down">
													<i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="text" class="spinner-input form-control" name="quantity" maxlength="3" readonly>
											<div class="spinner-buttons input-group-btn">
												<button type="button" class="btn btn-default spinner-up">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" name="btnCart" id="btnCart" class="btn btn-primary btn-icon" value="Beli"><i class="fa fa-shopping-cart"></i>Beli</button>
							</form>
							
							<div class="product_meta mt-sm">
								<span class="posted_in">Kategori: <a rel="tag" href="<?php echo base_url('produk').'/'.$product->product_category_slug; ?>"><?php echo ucwords($product->product_category_name); ?></a>.</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="tabs tabs-product">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#produkKomentar" data-toggle="tab">Komentar</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="produkKomentar">
									<ul class="comments">
										<?php
										if (count($comment) > 0) {
											foreach ($comment as $row) { ?>
											<li>
												<div class="comment">
													<div class="comment-block">
														<span class="comment-by">
															<strong><?php echo $row['member_name']; ?></strong>
														</span>
														<p><?php echo $row['message']; ?></p>
													</div>
												</div>
											</li>
											<?php }
										} else { echo "Belum ada komentar."; } ?>
									</ul>
									<hr class="tall">
									<h4 class="heading-primary">Kasih Komentar</h4>
									<div class="row">
										<div class="col-md-12">

											<form action="<?php echo $this->config->item('link_comment_create'); ?>" id="submitComment" method="post">
												<input type="hidden" name="id_product" value="<?php echo $product->id_product; ?>">
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<?php if ($this->session->userdata('is_login_web') == FALSE) { ?>
															<textarea disabled="disabled" maxlength="5000" data-msg-required="Masukkan komentar Anda." rows="5" class="form-control" name="message" id="message"></textarea>
															<?php } else { ?>
															<textarea maxlength="5000" data-msg-required="Masukkan komentar Anda." rows="5" class="form-control" name="message" id="message"></textarea>
															<?php } ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<button type="submit" name="btnComment" id="btnComment" class="btn btn-primary btn-icon" value="Kasih Komentar">Kirim Komentar</button>
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
				
				<hr class="tall">
				
				<h4 class="mb-md text-uppercase">Produk Lainnya</h4>
				<div class="row">
					<ul class="products product-thumb-info-list">
						<?php foreach ($product_lists as $row) { ?>
						<li class="col-sm-3 col-xs-12 product">
							<span class="product-thumb-info">
								<a href="<?php echo base_url('produk').'/'.$row['product_category_slug'].'/'.$row['slug']; ?>">
									<span class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<span class="product-thumb-info-act-left"><em>View</em></span>
											<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
										</span>
										<img alt="<?php echo $row['name']; ?>" class="img-responsive" src="<?php echo $row['photo']?>">
									</span>
								</a>
								<span class="product-thumb-info-content">
									<a href="<?php echo base_url('produk').'/'.$row['product_category_slug'].'/'.$row['slug']; ?>">
										<h4><?php echo $row['name']; ?></h4>
										<span class="price">
											<span class="amount"><?php echo $row['price']; ?></span>
										</span>
									</a>
								</span>
							</span>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="col-md-3">
				<h5 class="heading-primary">Penjual</h5>
				<ul class="simple-post-list">
					<li>
						<div class="post-image">
							<div class="img-thumbnail">
								<img src="<?php echo $product->seller_logo; ?>" alt="<?php echo $product->seller_name; ?>" width="60" height="60" class="img-responsive">
							</div>
						</div>
						<div class="post-info">
							<strong><?php echo $product->seller_name; ?></strong>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

</div>
