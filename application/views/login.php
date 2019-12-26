<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/'); ?>images/icon/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/typography.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/default-css.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url('assets/'); ?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="post">
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <h3 class="text-white">E-File</h3>
                        <div class="flash-login" data-flashlogin="<?php echo $this->session->flashdata('login'); ?>"></div>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="<?= set_value('username'); ?>" autofocus autocomplete="off">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login<i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?= base_url('assets/'); ?>js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/myscript.js"></script>
</body>

</html>