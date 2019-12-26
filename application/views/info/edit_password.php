<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"></h4>
                    <div class="card col-8">
                        <div class="card-header  bg-primary text-white text-left">
                            <i class="ti-layout-menu-v"></i> <?= $title; ?>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('error'); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="curentpassword">Password Saat Ini</label>
                                    <input type="password" name="curentpassword" class="form-control" id="curentpassword" placeholder="Password Saat Ini">
                                    <?= form_error('curentpassword', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="newpassword">Password Baru</label>
                                        <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Password Baru">
                                        <?= form_error('newpassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="repeatpassword">Ulang Password</label>
                                        <input type="password" name="repeatpassword" class="form-control" id="repeatpassword" placeholder="Ulang Password">
                                        <?= form_error('repeatpassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ganti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
</div>
<!-- main content area end -->