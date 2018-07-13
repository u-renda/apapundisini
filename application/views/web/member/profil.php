<div role="main" class="main shop" id="profil_page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<hr class="tall">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#daftar_transaksi" data-toggle="tab">Daftar Transaksi</a>
                        </li>
                    </ul>
                    <div class="tab-content">
						<div id="daftar_transaksi" class="tab-pane active">
							<div class="panel-group panel-group-sm" id="accordion4">
							<?php
							if (count($cart_checkout) > 0) {
								foreach ($cart_checkout as $row) { ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse4<?php echo $row['no']; ?>">
												<?php echo '#'.$row['id_cart_checkout'].' - '.$row['status']; ?>
											</a>
										</h4>
									</div>
									<div id="collapse4<?php echo $row['no']; ?>" class="accordion-body collapse">
										<div class="panel-body">
											<form class="form-horizontal">
												<div class="form-group marginbottom0">
													<label class="col-md-3 control-label fontbold">Tanggal Pemesanan</label>
													<div class="col-md-3">
														<p class="form-control-static"><?php echo $row['created_date']; ?></p>
													</div>
													<label class="col-md-3 control-label fontbold">Subtotal</label>
													<div class="col-md-3">
														<p class="form-control-static"><?php echo $row['subtotal']; ?></p>
													</div>
												</div>
												<div class="form-group marginbottom0">
													<label class="col-md-3 col-md-offset-6 control-label fontbold">Ongkos Kirim</label>
													<div class="col-md-3">
														<p class="form-control-static"><?php echo $row['shipment_cost']; ?></p>
													</div>
												</div>
												<div class="form-group marginbottom0">
													<label class="col-md-3 col-md-offset-6 control-label fontbold">Total Pembayaran</label>
													<div class="col-md-3">
														<p class="form-control-static fontbold"><?php echo $row['total']; ?></p>
													</div>
												</div>
												<div class="form-group marginbottom0">
													<label class="col-md-3 control-label fontbold">Alamat Tujuan</label>
													<div class="col-md-9">
														<p class="form-control-static"><?php echo ucwords($this->session->userdata('name')); ?></p>
														<p class="form-control-static"><?php echo $row['address']; ?></p>
													</div>
												</div>
											</form>
											<hr class="tall">
											<h5>Daftar Produk:</h5>
											<?php foreach ($row['product'] as $row2) { ?>
											<div class="row mb-sm">
												<div class="col-md-1">
													<img src="<?php echo $row2['product_image']; ?>" alt="<?php echo $row2['product_name']; ?>" class="img-responsive">
												</div>
												<div class="col-md-8">
													<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row2['product_slug']; ?>"><?php echo $row2['product_name']; ?></a>
												</div>
												<div class="col-md-3">
													Jumlah: <?php echo $row2['product_quantity']; ?>
												</div>
											</div>
											<?php }
											if ($row['status_raw'] == 2) { ?>
											<hr class="tall">
											<div class="row">
												<div class="col-md-12">
													<?php echo '<p>Silahkan transfer sebesar Rp '.$row['total'].' <br>Ke rekening '.$this->config->item('no_rekening').'</p>'; ?>
													<p><?php echo 'Jangan lupa untuk mencantumkan no pemesanan, yaitu #'.$row['id_cart_checkout']; ?></p>
												</div>
											</div>
											<?php } ?>
											<hr class="tall">
											<div class="row pull-right">
												<div class="col-md-12">
													<?php if ($row['status_raw'] == 2) { ?>
													<a href="<?php echo $this->config->item('link_konfirmasi').'?id_checkout='.$row['id_cart_checkout']; ?>" class="btn btn-primary ml-sm">Konfirmasi Pembayaran</a>
													<?php } else if ($row['status_raw'] == 1) { ?>
													<a href="<?php echo $this->config->item('link_cart'); ?>" class="btn btn-primary ml-sm">Keranjang Belanja</a>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php }
							} else {
								echo '<div class="alert alert-info">Belum ada transaksi.</div>';
							} ?>
						</div>
						</div>
                    </div>
                </div>
            </div>
		</div>
	</div>

</div>
