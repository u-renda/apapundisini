<div role="main" class="main shop">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<hr class="tall">
			</div>
		</div>

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

					<form method="post" class="cart" action="<?php echo $this->config->item('link_cart'); ?>">
						<div class="col-md-4 pl-none">
							<div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": <?php echo $product->stock; ?> }'>
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

						<button type="submit" class="btn btn-primary btn-icon" value="Beli"><i class="fa fa-shopping-cart"></i>Beli</button>
						
					</form>

					<div class="product_meta mt-sm">
						<span class="posted_in">Kategori: <a rel="tag" href="<?php echo base_url('produk').'/'.$product->product_category_slug; ?>"><?php echo ucwords($product->product_category_name); ?></a>.</span>
					</div>

				</div>


			</div>
		</div>
	</div>

</div>
