
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
                                    foreach($data->result_object() as $i){
                                       
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $i->nama_pasien;?></td>
                                        <td><?php echo $i->gender_pasien;?></td>
                                        <td>
                                            <?php echo anchor('antrian/hapus/'.$i->id_rekam_medis, ' Hapus', array('class'=>'fa fa-trash-o btn btn-danger'));
                                            ?>
                                            <?php echo anchor('antrian/bayar/'.$i->id_rekam_medis, ' Bayar', array('class'=>'fa fa-money btn btn-success'));
                                            ?>


                                           
                                        </td>
                                       
                                    </tr>
                                    <?php } ?>   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>

                        
                                
                        <div ><?php echo $this->session->flashdata('info'); ?></div>
                        
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


