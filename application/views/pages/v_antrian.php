<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
           
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- isi konten -->
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
    <script>
    $(document).ready(function() {
        $('#dataTables-pasien').DataTable({
            responsive: true
        });
    });
    </script>
