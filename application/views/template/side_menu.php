<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- preloader area start -->
<!-- <div id="preloader">
    <div class="loader"></div>
</div> -->
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="#"><img src="<?= base_url('assets/'); ?>images/icon/logo1.png"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="<?= base_url('home'); ?>"><i class="ti-home"></i> <span>Home</span></a>
                        </li>
                        <hr>
                        <?php if ($user['id_level'] == 1) : ?>
                            <li>
                                <a href="<?= base_url('info/akun') ?>"><i class="ti-user"></i> <span>Akun User</span></a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url('info/gantipass'); ?>"><i class="ti-key"></i> <span>Edit Password</span></a>-->
                            <!--</li>-->
                            
                            <hr>
                            
                            <li>
                                <a href="<?= base_url('menu'); ?>"><i class="ti-plus"></i> <span>Tambah Menu <i class="fas fa-map-marker-minus"></i></span></a>
                            </li>
                            <hr>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo base_url('info/gantipass'); ?>"><i class="ti-key"></i> <span>Edit Password</span></a>
                        </li>
                        <hr>

                        <?php
                        $_user = &get_instance();
                        $pamarMenu = $_user->callMenu(0);
                        echo $pamarMenu;
                        ?>
                        <hr>
                        <li>
                            <a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout<i class="fas fa-map-marker-minus"></i></span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-box pull-left">
                        <form action="<?= base_url('file_arsip/search'); ?>" method="post">
                            <input type="text" name="search" placeholder="Search...">
                            <i class="ti-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- main content area end -->