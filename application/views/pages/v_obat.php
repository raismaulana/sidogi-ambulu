    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Obat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- isi konten -->
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                                Daftar Obat
                            </div>
                            <?php echo form_open('Obat/daftarObat');?>
                            <div class="panel-body">
                                <input class="form-control" name="nama" placeholder="Nama Obat">
                                <input class="form-control" name="harga" placeholder="Harga Obat/Biji">
                                <input class="form-control" name="stok" placeholder="Stok Obat">
                            </div>
                            <div class="panel-footer" style="">
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                                Daftar Tindakan
                            </div>
                            <?php echo form_open('Obat/daftarTindakan');?>
                            <div class="panel-body">
                                <input class="form-control" name="nama" placeholder="Nama Tindakan">
                                <input class="form-control" name="harga" placeholder="Harga Tindakan">
                            </div>
                            <div class="panel-footer" style="">
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <?php echo form_close();?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Obat
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                        <div class="panel-footer" style="">
                        </div>
                </div>
                
            </div>
            <!-- /.row -->

            <!-- Modal Update Produk-->
            <form id="add-row-form" action="<?php echo base_url().'Obat/update_obat'?>" method="post">
                <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Obat</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" name="id" placeholder="Id Obat" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="nama" placeholder="Nama Obat" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="harga" placeholder="Harga Obat/biji" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="stok" placeholder="Stok Obat" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="add-row" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal Hapus Produk-->
            <form id="add-row-form" action="<?php echo base_url().'Obat/delete_obat'?>" method="post">
                <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" class="form-control" placeholder="Id Obat" required>
                                <strong>Anda yakin mau menghapus obat ini?</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="add-row" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

        <!-- jQuery -->
    <script src="<?php echo base_url();?>tatarias/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>tatarias/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>tatarias/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()?>tatarias/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>tatarias/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>tatarias/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>tatarias/dist/js/sb-admin-2.js"></script>


    <script type="text/javascript">
        var save_method;
        var table;

        $(document).ready(function(){
            var table = $('#mytable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],

                "ajax": {
                "url": '<?php echo site_url('Obat/get_json');?>',
                "type": "POST"
            },

            "columns": [
                {"data": "id_obat"},
                {"data": "nama_obat"},
                {"data": "harga_obat", render: $.fn.dataTable.render.number('.', ',', '')},
                {"data": "stok_obat"},
                {"data": "action"}
            ],
            });
        });

        $('#mytable').on('click','.edit_record',function(){
            var id_obat = $(this).data('id');
            var nama_obat = $(this).data('nama');
            var harga_obat = $(this).data('harga');
            var stok_obat = $(this).data('stok');
            $('#ModalUpdate').modal('show');
            $('[name="id"]').val(id_obat);
            $('[name="nama"]').val(nama_obat);
            $('[name="harga"]').val(harga_obat);
            $('[name="stok"]').val(stok_obat);
        })

        $('#mytable').on('click','.hapus_record', function(){
            var id_obat = $(this).data('id');
            $('#ModalHapus').modal('show');
            $('[name="id"]').val(id_obat);
        })
    </script>

</body>

</html>
                        