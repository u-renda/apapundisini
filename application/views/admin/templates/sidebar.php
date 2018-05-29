<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="list-main">
                        <a href="<?php echo $this->config->item('link_admin_home'); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="list-main">
                        <a href="<?php echo $this->config->item('link_admin_slider'); ?>">
                            <i class="fa fa-th-large" aria-hidden="true"></i>
                            <span>Slider (Banner Utama)</span>
                        </a>
                    </li>
                    <li class="list-main">
                        <a href="<?php echo $this->config->item('link_admin_seller'); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Penjual</span>
                        </a>
                    </li>
                    <li class="nav-parent list-parent" id="produk">
                        <a>
                            <i class="fa fa-building" aria-hidden="true"></i>
                            <span>Produk</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_admin_produk'); ?>">
                                     Daftar Produk
                                </a>
                            </li>
                            <li class="list-child" id="tipe_produk">
                                <a href="<?php echo $this->config->item('link_admin_produk_kategori'); ?>">
                                     Kategori Produk
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-main">
                        <a href="<?php echo $this->config->item('link_admin_order'); ?>">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span>Order</span>
                        </a>
                    </li>
                    <li class="nav-parent list-parent" id="lainnya">
                        <a>
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>Lainnya</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_admin_akun_saya'); ?>">
                                     Akun Saya
                                </a>
                            </li>
                            <li class="list-child">
                                <a href="<?php echo $this->config->item('link_admin_ongkir'); ?>">
                                     Ongkos Kirim
                                </a>
                            </li>
							<?php if ($this->session->userdata('role_name') == 'Administrator' || $this->session->userdata('role_name') == 'administrator') { ?>
                            <li class="list-child" id="admin">
                                <a href="<?php echo $this->config->item('link_admin_lists'); ?>">
                                     Daftar Admin
                                </a>
                            </li>
                            <li class="list-child" id="admin_role">
                                <a href="<?php echo $this->config->item('link_admin_role_lists'); ?>">
                                     Tipe Admin
                                </a>
                            </li>
							<?php } ?>
                        </ul>
                    </li>
                </ul>
            </nav>

            <hr class="separator" />
        </div>

    </div>

</aside>
<!-- end: sidebar -->
