<?php
$_user = &get_instance();
$u_ser['param1'] = $_user->get_row_arsip($_GET['menuId']);
$user['params'] = $_user->getmenuparent($_GET['menuId']);
$user['parammenu'] = $_user->getidmenu($_GET['menuId']);
?>
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                    <li>
                        <span>
                            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 clearfix">
            <h5 class="pull-left">
                <?= $user['params']; ?>
            </h5>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">

        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title"><?php echo $u_ser['param1']; ?><?php echo $this->session->flashdata('img_gagal'); ?>
                        <?php if ($user['id_level'] == 1 || $user['id_level'] == 2) : ?>
                            <a href="<?= base_url('file_arsip/add_arsipa') . '?menuId=' . $user['parammenu']; ?>" class="btn btn-outline-primary btn-sm float-right mb-3">Tambah</a>
                        <?php endif; ?>
                    </h5>

                    <div class="data-tables datatable-dark">
                        <table id="table_id" class="text-left  table-bordered">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Nomor Surat</th>
                                    <th>User</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($file as $f) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $f['desc_file']; ?></td>
                                        <td><?= $f['nama_file']; ?></td>
                                         <td><?= "<b>" . $f['log_user'] . "</b>" . "/" . date('d M', strtotime($f['tgl_upload'])); ?></td>
                                        <td>
                                            <?php if ($user['id_level'] == 1 || $user['id_level'] == 2) : ?>
                                                <a href="<?= base_url('file_arsip/editarsipa/') . $f['id_arsip']; ?>" class=" mr-1"><i class="ti-pencil"></i></a>
                                                <a href="<?= base_url('file_arsip/hapusarsipfile/') . $f['id_arsip']; ?>" class="tombol-hapus mr-1"><i class="ti-trash text-danger"></i></a>
                                            <?php endif; ?>
                                            <!-- <a href="http://" class="badge badge-info">View</a> -->
                                            <a href="<?= base_url('file_arsip/download/') . $f['loc_file']; ?>" title="Download"><i class="ti-download text-info"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
</div>
<!-- main content area end -->