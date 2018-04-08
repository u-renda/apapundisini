<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="<?php echo $this->config->item('link_admin_home'); ?>" class="logo">
                    <img src="<?php echo base_url('assets/img').'/logo-admin.png'; ?>" height="35" alt="<?php echo $this->config->item('title'); ?>" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
        
            <!-- start: search & user box -->
            <div class="header-right">
                <span class="separator"></span>
                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <div class="profile-info" data-lock-nama="<?php echo $this->session->userdata('name'); ?>" data-lock-email="<?php echo $this->session->userdata('email'); ?>">
                            <span class="name"><?php echo $this->session->userdata('name'); ?></span>
                        </div>
        
                        <i class="fa custom-caret"></i>
                    </a>
        
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('link_admin_logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        
        <div class="inner-wrapper">