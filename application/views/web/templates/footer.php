			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Hubungi Kami</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Alamat:</strong> <?php echo 'alamat'; ?></p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Telp:</strong> <?php echo 'telp'; ?></p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?php echo 'email'; ?>"><?php echo 'email'; ?></a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Ikuti Kami</h4>
							<ul class="social-icons">
								<li class="social-icons-facebook"><a href="<?php echo 'facebook'; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-youtube"><a href="<?php echo 'youtube'; ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
								<li class="social-icons-instagram"><a href="<?php echo 'instagram'; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p>© Copyright <?php echo date('Y'); ?>. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!--Modal-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body"></div>
				</div>
			</div>
		</div>
		<!--END Modal-->
		<!-- Vendor -->
		<script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/owl.carousel').'/owl.carousel.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/magnific-popup').'/jquery.magnific-popup.js'; ?>"></script>

		<script src="<?php echo base_url('assets/vendor/bootstrap/js').'/bootstrap.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/common').'/common.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/jquery.validate.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/isotope').'/jquery.isotope.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/fuelux/js').'/spinner.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/pnotify').'/pnotify.custom.js'; ?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url('assets/js').'/theme.js'; ?>"></script>
		
		<!-- Specific Page Vendor and Views -->
		<script src="<?php echo base_url('assets/vendor/rs-plugin/js').'/jquery.themepunch.tools.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/rs-plugin/js').'/jquery.themepunch.revolution.min.js'; ?>"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url('assets/js').'/custom.js'; ?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url('assets/js').'/theme.init.js'; ?>"></script>

	</body>
</html>
