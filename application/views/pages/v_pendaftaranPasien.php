<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pendaftaran Pasien Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- isi konten -->
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Pendaftaran Pasien Baru
                        </div>
                        <?php echo form_open('PendaftaranPasien/daftarPasien');?>
                        <div class="panel-body">
                            <input class="form-control" name="nama" placeholder="Nama">
                            <input class="form-control" name="bday" placeholder="Tanggal Lahir">
                            <input class="form-control" name="gender" placeholder="Gender">
                            <input class="form-control" name="nohp" placeholder="No HP">
                            <input class="form-control" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="panel-footer" style="">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
                            
                        </div>
                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
                        