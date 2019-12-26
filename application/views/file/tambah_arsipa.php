<?php
$_user = &get_instance();
$user['param1'] = $_user->get_row_arsip($_GET['menuId']);
$user['parammenu'] = $_user->getidmenu($_GET['menuId']);
?>
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                    <!-- <li><a href=""><?= $user['param1']; ?></a></li>
                    <li><span><?= $title; ?></span></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Input Grid start -->
                <div class="col mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="header-title">Input Grid</h4> -->
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="id_menu" class="form-control" value="<?= $user['parammenu'] ?>">
                                <input type="hidden" name="user" class="form-control" value="<?= $user['username']; ?>">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="chek_ambil" onclick="showMe()" class="form-check-input">
                                    <label class="form-check-label" for="exampleCheck1">Pilih Dari FTP</label>
                                </div>
                                <div class="form-group row" id="btn-ftp">
                                    <div class="col" id="div_option">

                                    </div>
                                </div>
                                <div class="form-group row" id="btn-pc">
                                    <div class="col">
                                        <input type="file" name="image" id="file-1" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="text" name="nosurat" class="form-control" placeholder="Nomor Surat">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan</button>
                                <a href="<?= base_url('file_arsip/tampilfile') . '?menuId=' . $user['parammenu'] ?>" class="btn btn-danger mt-4 pr-4 pl-4">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Input Grid end -->
            </div>
        </div>
    </div>
</div>
<!-- main content area end -->