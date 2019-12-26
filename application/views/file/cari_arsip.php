<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Dashboard</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li>
                        <span>
                        </span>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $user['username'] ?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('info/gantipass'); ?>">Ganti Password</a>
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
                    <h5 class="header-title"><?= $title; ?></h5>

                    <div class="data-tables datatable-dark">
                        <?php if (empty($cari)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak Ditemukan..!!
                        </div>
                        <?php else : ?>
                        <table id="dataTable3" class="text-left">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Nomor Surat</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                    foreach ($cari as $f) :
                                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $f['desc_file']; ?></td>
                                    <td><?= $f['nama_file']; ?></td>
                                    <td><?= $f['log_user']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
</div>
<!-- main content area end -->