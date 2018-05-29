<div role="main" class="main shop" id="cart_page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<hr class="tall">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="featured-boxes">
					<div class="row">
						<div class="col-md-12">
							<div class="featured-box featured-box-primary align-left mt-sm">
								<div class="box-content">
									<form method="post" action="">
										<table class="shop_table cart">
											<thead>
												<tr>
													<th class="product-remove">
														&nbsp;
													</th>
													<th class="product-thumbnail">
														&nbsp;
													</th>
													<th class="product-name">
														Produk
													</th>
													<th class="product-price">
														Harga
													</th>
													<th class="product-quantity">
														Kuantitas
													</th>
													<th class="product-subtotal">
														Total
													</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($cart as $row) { ?>
												<tr class="cart_table_item">
													<td class="product-remove">
														<a title="Remove this item" class="remove" href="#" id="<?php echo $row['id_cart']; ?>">
															<i class="fa fa-times"></i>
														</a>
													</td>
													<td class="product-thumbnail">
														<a href="<?php echo $this->config->item('link_produk').'/'.$row['product_category']['slug'].'/'.$row['product']['slug']; ?>">
															<img width="100" height="100" alt="" class="img-responsive" src="<?php echo $row['product']['photo']; ?>">
														</a>
													</td>
													<td class="product-name">
														<a href="<?php echo $this->config->item('link_produk').'/'.$row['product_category']['slug'].'/'.$row['product']['slug']; ?>"><?php echo $row['product']['name']; ?></a>
													</td>
													<td class="product-price">
														<span class="amount"><?php echo $row['product']['price']; ?></span>
													</td>
													<td class="product-quantity">
														<span class="amount"><?php echo $row['quantity']; ?></span>
													</td>
													<td class="product-subtotal">
														<span class="amount"><?php echo $row['total']; ?></span>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="featured-boxes">
					<div class="row">
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Pengiriman</h4>
									<form action="<?php echo $this->config->item('link_cart_shipment'); ?>" id="frmCalculateShipping" method="post">
										<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Alamat</label>
													<textarea class="form-control" name="address"><?php if (count($member_address) > 0) { echo $member_address['address']; } ?></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Provinsi</label>
													<select class="form-control" name="id_provinsi" id="id_provinsi">
														<option value="">-- Pilih Provinsi --</option>
														<?php
														if (count($member_address) > 0) {
															foreach ($provinsi_lists as $key => $val) { ?>
																<option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php if ($member_address['id_provinsi'] == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('id_provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->name); ?></option>
														<?php }
														} else {
															foreach ($provinsi_lists as $key => $val)
															{
																echo '<option id="'.$val->id_provinsi.'" value="'.$val->id_provinsi.'"'.set_select('id_provinsi', $val->id_provinsi).'>'.ucwords($val->name).'</option>';
															}
														} ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Ubah Total Pengiriman" class="btn btn-default pull-right mb-xl" id="btnCartShipment">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Total Keranjang Belanja</h4>
									<table class="cart-totals">
										<tbody>
											<tr class="cart-subtotal">
												<th>
													<strong>Keranjang Belanja - Subtotal</strong>
												</th>
												<td>
													<strong><span class="amount"><?php echo 'Rp '.number_format($subtotal,0,',','.'); ?></span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<th>
													Pengiriman
												</th>
												<td>
													<span id="shipping">
														<?php
														if (count($member_address) > 0) {
															echo 'Rp '.number_format($member_address['price'],0,',','.');
														} else {
															echo 'Rp 0';
														} ?>
													</span>
												</td>
											</tr>
											<tr class="total">
												<th>
													<strong>Total Order</strong>
												</th>
												<td>
													<strong>
														<span class="amount" id="amount">
															<?php
															if (count($member_address) > 0 && count($cart_checkout) > 0) {
																echo 'Rp '.number_format($cart_checkout['total'],0,',','.');
															} else {
																echo 'Rp '.number_format($subtotal,0,',','.');
															} ?>
														</span>
													</strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="actions-continue">
							
							<form action="<?php echo $this->config->item('link_cart_order'); ?>" method="post">
								<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
								<?php if (count($cart_checkout) > 0) { ?>
								<input type="hidden" name="id_cart_checkout" value="<?php echo $cart_checkout['id_cart_checkout']; ?>">
								<?php }
								if ($subtotal != 0 && count($member_address) > 0) { ?>
								<input type="submit" class="btn pull-right btn-primary btn-lg" name="submit" value="Proses Order" id="btnOrder" />
								<?php } else { ?>
								<input type="submit" disabled="disabled" class="btn pull-right btn-primary btn-lg" name="submit" value="Proses Order" id="btnOrder" />
								<!--<button class="btn pull-right btn-primary btn-lg" disabled="disabled" id="btnOrder">Proses Order</button>-->
								<?php } ?>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>