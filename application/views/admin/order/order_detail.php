<section role="main" class="content-body">
	<header class="page-header">
		<h2>Order Detail</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Order Detail</span></li>
				<li><span>Tambah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <section class="panel">
		<div class="panel-body">
			<div class="invoice">
				<header class="clearfix">
					<div class="row">
						<div class="col-sm-6 mt-md">
							<h2 class="h2 mt-none mb-sm text-dark text-bold">Detail Pesanan</h2>
							<h4 class="h4 m-none text-dark text-bold"><?php echo '#'.$id_cart_checkout; ?></h4>
						</div>
						<div class="col-sm-6 text-right mt-md mb-md">
							<div class="ib">
								<img src="<?php echo base_url('assets/img').'/logo.jpg'; ?>" alt="<?php echo $this->config->item('titla'); ?>" width="174" class="img-responsive" />
							</div>
						</div>
					</div>
				</header>
				<div class="bill-info">
					<div class="row">
						<div class="col-md-6">
							<div class="bill-to">
								<p class="h5 mb-xs text-dark text-semibold">Pemesan:</p>
								<address>
									<?php echo $member->name; ?>
									<br/>
									<?php echo $member_address->address; ?>
									<br/>
									<?php echo 'Phone: '.$member->phone; ?>
									<br/>
									<?php echo $member->email; ?>
								</address>
							</div>
						</div>
						<div class="col-md-6">
							<div class="bill-data text-right">
								<p class="mb-none">
									<span class="text-dark">Status Pesanan:</span>
									<span class="value"><?php echo $cart_checkout['status']; ?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="table-responsive">
					<table class="table invoice-items">
						<thead>
							<tr class="h4 text-dark">
								<th id="cell-id"     class="text-semibold">#</th>
								<th id="cell-item"   class="text-semibold">Barang</th>
								<th id="cell-price"  class="text-center text-semibold">Harga</th>
								<th id="cell-qty"    class="text-center text-semibold">Jumlah Barang</th>
								<th id="cell-total"  class="text-center text-semibold">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($cart as $row) { ?>
							<tr>
								<td><?php echo $row['id_cart']; ?></td>
								<td class="text-semibold text-dark"><?php echo $row['product_name']; ?></td>
								<td class="text-center"><?php echo $row['product_price']; ?></td>
								<td class="text-center"><?php echo $row['quantity']; ?></td>
								<td class="text-center"><?php echo $row['total']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			
				<div class="invoice-summary">
					<div class="row">
						<div class="col-sm-5 col-sm-offset-7">
							<table class="table h5 text-dark">
								<tbody>
									<tr class="b-top-none">
										<td colspan="2">Subtotal</td>
										<td class="text-left"><?php echo $cart_checkout['subtotal']; ?></td>
									</tr>
									<tr>
										<td colspan="2">Ongkos Kirim</td>
										<td class="text-left"><?php echo $cart_checkout['shipment_cost']; ?></td>
									</tr>
									<tr class="h4">
										<td colspan="2">Grand Total</td>
										<td class="text-left"><?php echo $cart_checkout['total']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="text-right mr-lg">
				<a href="<?php echo $this->config->item('link_admin_order'); ?>" class="btn btn-default">Kembali</a>
				<?php if ($cart_checkout['status_raw'] == 3) { ?>
				<a href="<?php echo $this->config->item('link_admin_order_konfirmasi').'?id_cart_checkout='.$id_cart_checkout; ?>" class="btn btn-primary ml-sm">Konfirmasi Pembayaran</a>
				<?php } ?>
			</div>
		</div>
	</section>
    <!-- end: page -->
</section>