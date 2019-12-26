<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                    <!-- <li><span><?= $title; ?></span></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"></h4>
                    <div class="card col-8">
                        <div class="card-header  bg-primary text-white text-left">
                            <i class="ti-layout-menu-v"></i> <?= $title; ?>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control" placeholder="*****">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-6">
                                        <select name="level" class="form-control">
                                            <option value="0">Select</option>
                                            <?php foreach ($lev as $l) : ?>
                                                <option value="<?= $l['id_level']; ?>"><?= $l['level']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-primary mt-3 mr-2""><i class=" ti-save"></i> Simpan</button>
                                <a href="<?= base_url('info/akun'); ?>" class="btn btn-outline-danger mt-3"><i class="ti-arrow-left"></i> Kembali</a>
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