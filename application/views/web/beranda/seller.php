<div class="container">
	<div class="row">
		<div class="col-md-12 center">
			<div class="owl-carousel owl-theme mt-xl" data-plugin-options='{"items": 6, "autoplay": true, "autoplayTimeout": 3000}'>
				<?php foreach ($seller as $row) { ?>
				<div>
					<img class="img-responsive" src="<?php echo $row->logo; ?>" alt="<?php echo $row->name; ?>">
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>