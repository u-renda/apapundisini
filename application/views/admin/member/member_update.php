<section role="main" class="content-body">
	<header class="page-header">
		<h2>Pembeli</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pembelis</span></li>
				<li><span>Ubah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-featured">
                <header class="panel-heading">
                    <h2 class="panel-title">Ubah Data</h2>
                </header>
                <form action="<?php echo $this->config->item('link_admin_member_update').'?id_member='.$id; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $result['name']); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Email:</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" value="<?php echo set_value('email', $result['email']); ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Telp:</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone', $result['phone']); ?>">
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="address" class="form-control" value="<?php echo set_value('address', $result['address']); ?>"><?php echo set_value('address', $result['address']); ?></textarea>
                                <?php echo form_error('address'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Provinsi:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_provinsi" id="id_provinsi">
                                    <option value="">-- Pilih Salah Satu --</option>
									<?php foreach ($provinsi_lists as $key => $val) { ?>
										<option value="<?php echo $val->id_provinsi; ?>" <?php if ($result['id_provinsi'] == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('id_provinsi', $val->id_provinsi); ?>><?php echo $val->name; ?></option>
									<?php } ?>
                                </select>
                                <?php echo form_error('id_provinsi'); ?>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ubah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_member'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>