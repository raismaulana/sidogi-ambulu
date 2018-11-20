<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- isi konten -->

                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Mendaftarkan Antrian Periksa
                        </div>
                            <div class="panel-body">
                                <form class="form" id="form_input_antrian" role="form">
                                    <div class="form-group">
                                        
                                <input list="list_pasien" class="form-control reset" name="id" id="id" placeholder="ID PASIEN" autocomplete="off" onchange="showPasien(this.value)">
                                <datalist id="list_pasien">
                                    <?php foreach ($pasien as $pasien): ?>
                                     <option value="<?= $pasien->id_pasien ?>">
                                         <?= $pasien->id_pasien?>
                                     </option>
                                    <?php endforeach ?>
                                </datalist>
                            </div>

                                <div class="form-group">
                                    <input class="form-control reset" type="text" name="nama" id="nama" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <input class="form-control reset" type="text" name="keluhan" placeholder="Keluhan" id="keluhan">
                                </div>

                            </div>
                            <div class="panel-footer" style="">
                                <div class="form-group">
                                <button type="button" id="submit_antrian" class="btn btn-primary" onclick="addAntrian()">Simpan</button>
                            </div>
                            </div>
                        </form>
                    </div>

                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Daftar Antrian Saat Ini
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pasien">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($data->result_array() as $i):
                                        $nama_pasien=$i['nama_pasien'];
                                        $gender_pasien=$i['gender_pasien'];
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $nama_pasien;?></td>
                                        <td><?php echo $gender_pasien;?></td>
                                        <td>
                                            <a  class="btn btn-danger" href="<?php echo base_url();?>antrian/hapus/$i[id_produk]"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <button class="btn btn-success" href="<?php echo base_url();?>antrian/bayar"><i class="fa  fa-money"></i> Bayar</button>
                                        </td>
                                       
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
    <!-- <script src="<?php //echo base_url()?>tatarias/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php //echo base_url()?>tatarias/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php //echo base_url()?>tatarias/vendor/datatables-responsive/dataTables.responsive.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>tatarias/dist/js/sb-admin-2.js"></script>

    <script>

        function showPasien(str) {
            if (str == "") {
                $('#nama').val('JANCUK');
                $('#reset').hide();
                return;
            } else {
                $.ajax({
                    type:"POST",
                    url: "<?= site_url('Dashboard/getPasienById');?>",
                    data: "id="+str,
                    // dataType:"json",
                    success:function(response){
                        //console.log(response['nama_pasien']);
                        $('#nama').val(response['nama_pasien']);
                    },
                    error: function(){
                        alert("error");
                    }
                });
            }
        }

        function addAntrian(){
            var id_pasien = $("#id").val();
            var keluhan = $("#keluhan").val();
            if(id_pasien == ''){
                $('#id').focus();
            } else if(keluhan == ''){
                $('#keluhan').focus();
            } else {
                $.ajax({
                    url: "<?= site_url('Dashboard/inputAntriPeriksa')?>",
                    type: "POST",
                    data: $('#form_input_antrian').serialize(),
                    dataType: "JSON",
                    success: function(data){
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding data');
                    }
                });

                    // $('.reset').val('');
            }
        }


    </script>
</body>
</html>