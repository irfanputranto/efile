<div class="container">
    <div class="row justify-content-center ">
        <div class="col-12  col-sm-4 col-md-6 col-lg-5">
            <div class="card mt-5 mp-3">
                <div class="card-header">
                    <h4><?php echo $menus; ?></h4>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($exploler as $ex) : ?>
                        <li class="list-group-item">
                            <?php
                                $menuId = $ex['menu_id'];
                                $parent = $this->db->query("SELECT count(*) AS jml_parent FROM menu WHERE parent_id = '$menuId' ")->row_array();
                                $jmlIdparent = $parent['jml_parent'];
                                if ($jmlIdparent != 0) { ?>
                                <?php echo $ex['menu_name']; ?> <a href="<?php echo base_url('file_arsip/exploler/') . $ex['menu_id']; ?>"> <i class="ti-arrow-right"></i></a>
                            <?php } else { ?>
                                <?php echo $ex['menu_name']; ?> <a href="<?php echo base_url('file_arsip/tampilfile?menuId=') . $menuId ?>"> <i class="ti-arrow-right"></i></a>
                            <?php }; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>