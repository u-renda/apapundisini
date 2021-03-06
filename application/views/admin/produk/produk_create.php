<section role="main" class="content-body">
	<header class="page-header">
		<h2>Produk</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Produk</span></li>
				<li><span>Tambah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <div class="row" id="produk_create_page">
        <div class="col-md-12">
            <section class="panel panel-featured">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Baru - <?php echo $seller->name; ?></h2>
                </header>
                <form action="<?php echo $this->config->item('link_admin_produk_create').'?id_seller='.$seller->id_seller; ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Kategori Produk:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_product_category" id="id_product_category">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <?php foreach ($product_category_lists as $key => $val) {
										echo '<option id="'.$val->id_product_category.'" value="'.$val->id_product_category.'"'.set_select('id_product_type', $val->id_product_category).'>'.ucwords($val->name).'</option>';
                                    } ?>
                                </select>
                                <?php echo form_error('id_product_category'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Harga:</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" value="<?php echo set_value('price'); ?>">
                                <?php echo form_error('price'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Stok:</label>
                            <div class="col-sm-10">
                                <input type="text" name="stock" class="form-control" value="<?php echo set_value('stock'); ?>">
                                <?php echo form_error('stock'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Keterangan:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Foto:</label>
                            <div class="col-sm-10">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Ubah</span>
                                            <span class="fileupload-new">Pilih file</span>
                                            <input type="file" name="produk_url" />
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                    </div>
                                </div>
								<span class="help-block">* Ukuran file max 2MB</span>
                                <?php echo form_error('produk_url'); ?>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Tambah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_produk'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>