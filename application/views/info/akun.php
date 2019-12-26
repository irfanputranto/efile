<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Dashboard</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><span><?= $this->session->flashdata('berhasil'); ?></span></li>
                    </li>
                </ul>
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
                    <h5 class="header-title"><?= $title; ?>
                        <a href="<?= base_url('info/tambahakun'); ?>" class="btn btn-outline-primary btn-sm float-right mb-3">Tambah</a>
                    </h5>
                    <!-- <button type="submit" onclick="Swal.fire('Hallo', 'Latihan', 'success')">Sweet</button> -->
                    <div class="data-tables datatable-dark">
                        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('akun'); ?>"></div>
                        <table id="dataTable3" class="text-left">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Level</th>
                                    <th><b>username</b>/<i>Password</i></th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($akun as $a) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $a['level']; ?></td>
                                        <td><?= "<b>" . $a['username'] . "</b>" . "/" . "<i>" . $a['password'] . "</i>"; ?></td>
                                        <td>
                                            <a href="<?= base_url('info/editakun/') . $a['id_user']; ?>" class=" mr-1"><i class="ti-pencil"></i></a>
                                            <?php if ($user['username'] == $a['username']) : ?>
                                                <a href="#"><i class=" ti-user text-success" title="Aktif"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('info/hapusakun/') . $a['id_user']; ?>" class="tombol-hapus"><i class=" ti-trash text-danger"></i></a>
                                            <?php endif; ?>
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