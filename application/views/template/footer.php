</div>
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <!--<p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>-->
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->

<!-- jquery latest version -->
<script src="<?= base_url('assets/'); ?>js/jquery-3.2.1.js"></script>
<!-- bootstrap 4 js -->
<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/metisMenu.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.slicknav.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="<?= base_url('assets/'); ?>js/line-chart.js"></script>
<!-- all pie chart -->
<script src="<?= base_url('assets/'); ?>js/pie-chart.js"></script>

<!-- Start datatable js -->
<!-- Data Table -->
<script src="<?php echo base_url('assets/datatables/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables/js/dataTables.bootstrap4.js') ?>"></script>

<!-- others plugins -->
<script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/myscript.js"></script>
<!-- upload -->
<script src="<?php print base_url('assets/') ?>upload/jquery.uploadfile.min.js"></script>

<script>
    var count = 0;
    $("#customupload1").uploadFile({
        url: "<?php echo base_url('File_arsip/upload'); ?>",
        // multiple: true,
        dragDrop: true,
        allowedTypes: "ppt,doc,docx,pdf,txt,pptx,csv,xlsx,xls,jpg,jpeg,png,gif",
        acceptFiles: "file/*",
        fileName: "file",
        showDelete: true,
        showProgress: true,
        allowDuplicates: true,
        maxFileSize: 6024 * 1024,
        maxFileCount: 1,
        showFileCounter: false,
        returnType: "json",
        sizeErrorStr: "Maksimal File Size :",
        uploadErrorStr: "Upload Gagal Mohon Di cek kembali",
        maxFileCountErrorStr: "Upload File Diperbolehkan : ",
        duplicateErrorStr: "File Sudah Ada",
        onSubmit: function(files) {
            $("#eventsmessage").html($("#eventsmessage").html() + "<br/>Submitting:" + JSON.stringify(files));
            document.getElementById("btn_upload").disabled = true;
            // return true;
        },
        onSuccess: function(files, data, xhr, pd) {
            $("#eventsmessage").html($("#eventsmessage").html() + "<br/>Success for: " + JSON.stringify(data));
            document.getElementById("btn_upload").disabled = false;
        },
        deleteCallback: function(data, pd) {
            for (var i = 0; i < data.length; i++) {
                $.post("<?php echo base_url('File_arsip/delfile'); ?>", {
                        op: "delete",
                        name: data[i]
                    },
                    function(resp, textStatus, jqXHR) {
                        //Show Message	
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.
        }
    });
</script>


<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
<script>
    // Tampil Menu
    $(document).ready(function() {
        $(document).on('change', '.menuTree', function() {
            var id = $(this).val();
            var Sid = $(this).attr('id');
            var tes = ++Sid;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url('menu/form_menu_option'); ?>",
                data: {
                    'id': id,
                    'tes': Sid
                },
                success: function(data) {
                    if (document.getElementById(tes) == null) {
                        // console.log(id);
                        $('#dropdown_container').append(data);
                    } else {
                        document.getElementById(tes).innerHTML = data;
                    }
                    var elems = document.querySelectorAll(".menuTree");
                    var len = elems.length;
                    var lastelement = len < 1 ? "" : elems[len - 1];
                }
            })
        });
    });
</script>

<script>
    $('#btn_simpanmenu').on('click', function() {
        var menuNama = document.getElementsByName("namaMenu")[0].value;
        var elems = document.querySelectorAll(".menuTree");
        var len = elems.length;
        var lastelement = len < 1 ? "" : elems[len - 1];
        var parent;
        // console.log(lastelement.id);
        if ((lastelement.id - 1) < 0) {
            parent = 0;
        } else {
            parent = document.getElementById(lastelement.id - 1).value;
        }
        var status = 1;
        // console.log(parent);

        $.ajax({
            url: "<?php echo base_url('menu/addmenu'); ?>",
            type: 'post',
            data: {
                'menu_name': menuNama,
                'link': '#',
                'parent_id': parent,
                'status': status
            },
            success: function(data) {
                alert('Berhasil Menambahkan Menu');
                document.location.href = "<?php echo base_url('menu'); ?>";
            }
        });
        return fasle;
    });

    function showMe() {
        var chkds = $("input[name='chek_ambil']:checkbox");
        if (chkds.is(":checked")) {
            $('#btn-ftp').show();
            $('#btn-pc').hide();
            $.ajax({
                url: "<?php echo base_url('file_arsip/ambilisiftp'); ?>",
                method: 'post',
                data: {},
                success: function(data) {
                    // console.log('Kosong');
                    document.getElementById('div_option').innerHTML = data;
                }
            });
        } else {
            $('#btn-ftp').hide();
            $('#btn-pc').show();
        }
    }
</script>

</body>

</html>