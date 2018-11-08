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
    <script>
    $(document).ready(function() {
        $('#dataTables-pasien').DataTable({
            responsive: true
        });
    });
    </script>
                        