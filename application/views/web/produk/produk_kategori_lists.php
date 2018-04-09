<div role="main" class="main shop">

	<div class="container">

		<div class="row mt-xl">
			<div class="col-md-6">
				<h1 class="mb-none"><strong><?php echo ucwords($product_category->name); ?></strong></h1>
				<p>Showing 1–12 of 25 results.</p>
			</div>
		</div>

		<div class="row">

			<ul class="products product-thumb-info-list" data-plugin-masonry>
				<?php foreach ($product as $row) { ?>
				<li class="col-md-3 col-sm-6 col-xs-12 product">
					<span class="product-thumb-info">
						<a href="<?php echo base_url('produk').'/'.$product_category->slug.'/'.$row->slug; ?>">
							<span class="product-thumb-info-image">
								<span class="product-thumb-info-act">
									<span class="product-thumb-info-act-left"><em>View</em></span>
									<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
								</span>
								<img alt="<?php echo ucwords($row->name); ?>" class="img-responsive" src="<?php echo $row->photo; ?>">
							</span>
						</a>
						<span class="product-thumb-info-content">
							<a href="<?php echo base_url('produk').'/'.$product_category->slug.'/'.$row->slug; ?>">
								<h4><?php echo $row->name; ?></h4>
								<span class="price">
									<span class="amount"><?php echo 'Rp '.number_format($row->price,0,',','.'); ?></span>
								</span>
							</a>
						</span>
					</span>
				</li>
				<?php } ?>
			</ul>

		</div>

		<div class="row">
			<div class="col-md-12">
				<ul class="pagination pull-right">
					<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
				</ul>
			</div>
		</div>

	</div>

</div>
