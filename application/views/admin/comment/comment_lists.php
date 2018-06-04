<section role="main" class="content-body">
	<header class="page-header">
		<h2>Komentar</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Komentar</span></li>
				<li><span>Lists</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row" id="comment_lists_page">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel">
				<div class="panel-body">
					<h4><?php echo 'Komentar - '.$product->name; ?></h4>
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
					<input type="hidden" name="id_product" id="id_product" value="<?php echo $product->id_product; ?>"></span>
					<div id="multipleTable"></div>
					<div class="row">
						<div class="col-md-12 mt-sm">
							<a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_produk'); ?>">Kembali</a>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
