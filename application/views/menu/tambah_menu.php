<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
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
                            <form method="post">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Menu</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="namaMenu" class="form-control" placeholder="Masukan Nama Menu" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Parent Menu</label>
                                    <div class="col-sm-6">
                                        <select name="menuTree" class="form-control menuTree" id="0">
                                            <option value="0">Select</option>
                                            <?php
                                            foreach ($menu as $r) : ?>
                                                <option value="<?= $r['menu_id']; ?>"><?= $r['Menu'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">-</label>
                                    <div class="col-sm-6" id="dropdown_container">
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-outline-primary mt-3 mr-2" id="btn_simpanmenu"><i class="ti-save"></i> Simpan</button>
                                <a href="<?= base_url('menu'); ?>" class="btn btn-outline-danger mt-3"><i class="ti-arrow-left"></i> Kembali</a>
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