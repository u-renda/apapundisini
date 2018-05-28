<section role="main" class="content-body">
	<header class="page-header">
		<h2>Tipe Produk Detail</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Produk</span></li>
				<li><span>Tipe Produk Detail</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row" id="produk_tipe_detail_lists_page">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel">
				<div class="panel-body">
					<h3><?php echo strtoupper($product_type->name); ?></h3>
					<a href="<?php echo $this->config->item('link_admin_produk_tipe_detail_create').'?id='.$product_type->id_product_type; ?>" type="button" class="mb-xl mt-xs mr-xs btn btn-primary">
						<i class="fa fa-plus"></i> Tambah Baru
					</a>
					<a href="<?php echo $this->config->item('link_admin_produk_tipe'); ?>" type="button" class="mb-xl mt-xs mr-xs btn btn-default">
						Kembali
					</a>
					<?php
                    if ($msg == TRUE)
                    {
                        if ($msg == 'success')
                        {
                            echo '<div class="alert alert-success">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo 'Success '.$type.' data! </div>';
                        }
                        else
                        {
                            echo '<div class="alert alert-danger">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo 'Failed '.$type.' data! </div>';
                        }
                    }
                    ?>
					<div id="multipleTable"></div>
				</div>
			</section>
		</div>
	</div>
