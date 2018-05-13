<section class="section m-none">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h2 class="mb-xs"><strong>Produk</strong> Kami</h2>
			</div>
		</div>
		<div class="row mt-lg">
			<?php foreach ($product as $row) { ?>
			<div class="col-md-2 col-xs-6 center mb-lg">
				<a href="<?php echo base_url('produk').'/'.$row['product_category']['slug'].'/'.$row['slug']; ?>">
					<img src="<?php echo $row['photo']; ?>" class="img-responsive" alt="<?php echo $row['name']; ?>">
				</a>
				<h5 class="mt-sm mb-none"><?php echo $row['name']; ?></h5>
				<p class="mb-none"><?php echo $row['product_category']['name']; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
