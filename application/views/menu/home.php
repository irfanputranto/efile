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
                    <h5 class="header-title">Total <?= $title . ": &nbsp;" . $total_rows; ?> </h5>
                    <form action="<?= base_url('menu/index'); ?>" method="post">
                        <div class="col-md-12">
                            <a href="<?= base_url('menu/tambahmenu'); ?>" class="btn btn-outline-primary btn-sm mb-3">Tambah</a>
                            <div class="col-md-4 mb-3 float-right">
                                <!-- <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Menu" name="keyword" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-primary" type="submit" name="cari">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                    <div class="data-tables datatable-dark">
                        <div class="flash-masuk" data-flashmasuk="<?php echo $this->session->flashdata('menu'); ?>"></div>
                        <table id="table_id" class="table table-hover text-left">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Parent</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 1;
                                foreach ($menu as $m) :
                                    ?>
                                    <tr>
                                        <td><?= $start++; ?></td>
                                        <td><?= $m['Menu']; ?></td>
                                        <td><?= $m['Parent']; ?></td>
                                        <td>
                                            <a href="<?= base_url('menu/editmenu/') . $m['Id']; ?>" class=" mr-1"><i class="ti-pencil"></i></a>

                                            <?php
                                                $idMenu = $m['Id'];
                                                $ambilMenu = $this->db->get_where('menu', ['menu_id' => $idMenu])->row_array();
                                                $menuId = $ambilMenu['menu_id'];
                                                // echo $menuId;
                                                $ambilParent = $this->db->get_where('menu', ['parent_id' => $menuId])->row_array();
                                                $MenuParentId = $ambilParent['parent_id'];
                                                // $MenuParentId;
                                                $arsip = $this->db->get_where('arsip', ['menu_id' => $menuId])->row_array();
                                                $menuArsip = $arsip['menu_id'];
                                                switch ($menuId) {
                                                    case ($menuId == $MenuParentId):
                                                        // echo "Sama Hapus Parent Menu"; 
                                                        ?>
                                                    <a href="<?= base_url('menu/hapusmenu/') . $m['Id']; ?>" class="tombil-hapusparent"><i class="ti-trash text-danger"></i></a>

                                                <?php break;
                                                    case ($menuId == $menuArsip):
                                                        // echo "Ada Arsip"; 
                                                        ?>
                                                    <a href="<?= base_url('menu/hapusmenu/') . $m['Id']; ?>" class="tombol-hapusarsip"><i class="ti-trash text-danger"></i></a>

                                                <?php break;
                                                    case ($menuId != $MenuParentId):
                                                        // echo "Hanya Menu Utama"; 
                                                        ?>
                                                    <a href="<?= base_url('menu/hapusmenu/') . $m['Id']; ?>" class="tombol-hapusm"><i class="ti-trash text-danger"></i></a>
                                                <?php break;
                                                }
                                                ?>
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