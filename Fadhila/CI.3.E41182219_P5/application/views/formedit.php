
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<?php
$provinsi = array(
                  '1'  => 'Nanggro Aceh Darussalam',
                  '2'    => 'Sumatera Utara',
                  '3'   => 'Sumatera Barat',
                  '4'   => 'Riau',
                  '5'   => 'Kepulauan Riau',
                  '6'   => 'Jambi',
                );
?>
<div class="container">


            <form class="form-horizontal" role="form" action="<?php echo base_url(). 'admin/update'; ?>" method="post">
            <?php foreach($pendaftaran as $u){ ?>
                <h2>Pendaftaran</h2>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">No Pendaftaran</label>
                    <div class="col-sm-9">
                        <input readonly type="text" id="firstName"  name = "idpendaftaran" class="form-control" value = "<?php echo $u->idpendaftaran ?>" autofocus >
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Id Admin</label>
                    <div class="col-sm-9">
                        <input readonly type="text" id="firstName"  name = "idadmin" class="form-control" value="<?php echo $u->idadmin ?>"  autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Nama Pendaftar</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "nama_pen" value="<?php echo $u->nama_pen ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "jk" value="<?php echo $u->jk ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label" >Kasus</label>
                    <div class="col-sm-9">
                    <input type="text" id="lastName" placeholder="Kasus" name ="kasus" value = "<?php echo $u->kasus ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label" >Jadwal Sidang</label>
                    <div class="col-sm-9">
                    <input type="date" id="birthDate" placeholder="Jadwal Sidang" name="sidang" value = "<?php echo $u->sidang ?>" class="form-control">
                    </div>
                </div>
                
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" value = "tambah">Kirim</button>
                <?php } ?>
            </form> <!-- /form -->
        </div> <!-- ./container -->