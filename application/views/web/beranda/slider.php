<div class="slider-container rev_slider_wrapper">
	<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 1170, "gridheight": 500}'>
		<ul>
			<?php foreach ($slider as $row) { ?>
			<li data-transition="fade">
				<img src="<?php echo $row->photo; ?>"  
					alt="<?php echo $this->config->item('title'); ?>"
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat" 
					class="rev-slidebg">
			</li>
			<?php } ?>
		</ul>
	</div>
</div>