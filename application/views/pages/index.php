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
                        <form method="post" accept-charset="utf-8" action="<?php echo site_url();?>inputAntriPeriksa">
                            <div class="panel-body">
                                <input list="list_pasien" class="form-control" name="id" id="id" placeholder="ID PASIEN" autocomplete="off" onchange="showPasien(this.value)">
                                <datalist id="list_pasien">
                                    <?php foreach ($pasien as $pasien): ?>
                                     <option value="<?= $pasien->id_pasien ?>">
                                         <?= $pasien->id_pasien?>
                                     </option>
                                    <?php endforeach ?>
                                </datalist>
                                <input class="form-control" type="text" name="nama" placeholder="NAMA PASIEN"  id="nama" readonly="readonly">
                            </div>
                            <div class="panel-footer" style="">
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
        
        function showPasien(str) {
            if (str == "") {
                $('#nama').val('');
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readystate == 4 && xmlhttp.status == 200) {
                        document.getElementById("nama").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "<?= base_url('Dashboard/ambilPasien') ?>/"+str,true);
                xmlhttp.send();
            }
        }
    </script>  