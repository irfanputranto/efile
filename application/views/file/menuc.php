<?php
$_user = &get_instance();
$user['param1'] = $_user->get_row_arsip($_GET['menuId']);
$user['params'] = $_user->getmenuparent($_GET['menuId']);
?>
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Dashboard</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><span><?= $user['params']; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $user['username'] ?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Edit Password</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Log Out</a>
                </div>
            </div>
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
                    <h5 class="header-title"><?= $title . "&nbsp" . $user['param1']; ?><a href="" class="btn btn-outline-primary btn-sm float-right mb-3">Tambah</a></h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-left">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Rapat</th>
                                        <th>Nama Alkep</th>
                                        <th>Notulen</th>
                                        <th>Tgl Deadline</th>
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
                                            <td><?= date('d M', strtotime($f['tglrapat'])); ?></td>
                                            <td><?= $f['deskripsi']; ?></td>
                                            <td><?= $f['notulen']; ?></td>
                                            <td><?= date('d M', strtotime($f['tgldetline'])); ?></td>
                                            <td><?= $f['desc_file']; ?></td>
                                            <td><?= $f['nama_file']; ?></td>
                                            <td><?= "<b>" . $f['log_user'] . "</b>" . "/" . date('d M', strtotime($f['tgl_upload'])); ?></td>
                                            <td>
                                                <a href="http://" class="badge badge-primary mr-1">Edit</a>
                                                <a href="http://" class="badge badge-danger mr-1">Hapus</a>
                                                <a href="http://" class="badge badge-info">View</a>
                                                <a href="http://" class="badge badge-success">Download</a>
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