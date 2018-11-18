<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pasien</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- isi konten -->
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Pasien
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pasien">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Gender</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data->result_array() as $i):
                                        $nama_pasien=$i['nama_pasien'];
                                        $tanggallahir_pasien=$i['tanggallahir_pasien'];
                                        $gender_pasien=$i['gender_pasien'];
                                        $hp_pasien=$i['hp_pasien'];
                                        $alamat_pasien=$i['alamat_pasien'];
                                    ?>
                                    <tr>
                                        <td><?php echo $nama_pasien;?></td>
                                        <td><?php echo $tanggallahir_pasien;?></td>
                                        <td><?php echo $gender_pasien;?></td>
                                        <td><?php echo $hp_pasien;?></td>
                                        <td><?php echo $alamat_pasien;?></td>
                                    </tr>
                                    <?php endforeach;?>   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel-footer" style="">
                            
                        </div>
                </div>
            </div>
            <!-- /.row -->
            
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
                        