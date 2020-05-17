<!-- form edit data -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

<!------ Include the above in your HEAD tag ---------->



<div class="container">


            <form class="form-horizontal" role="form" action="<?php echo base_url(). 'admin/update'; ?>" method="post">
            <?php foreach($mitra as $u){ ?>
                <h2>Edit Data</h2>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Id Mitra</label>
                    <div class="col-sm-9">
                        <input readonly type="text" id="firstName"  name = "id_mitra" class="form-control" value = "<?php echo $u->id_mitra ?>" autofocus >
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName"  name = "username" class="form-control" value="<?php echo $u->username ?>"  autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Nama Usaha</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "nama_katering" value="<?php echo $u->nama_katering ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Pemilik</label>
                    <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "nama_pemilik" value="<?php echo $u->nama_pemilik ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label" >Alamat</label>
                    <div class="col-sm-9">
                    <input type="text" id="lastName" placeholder="Kasus" name ="alamat" value = "<?php echo $u->alamat ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label" >No.Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" id="birthDate" placeholder="Jadwal Sidang" name="no_telepon" value = "<?php echo $u->no_telepon?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label" >Email</label>
                    <div class="col-sm-9">
                    <input type="text" id="birthDate" placeholder="Jadwal Sidang" name="email" value = "<?php echo $u->email?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label" >Password</label>
                    <div class="col-sm-9">
                    <input type="text" id="birthDate" placeholder="Jadwal Sidang" name="password" value = "<?php echo $u->password?>" class="form-control">
                    </div>
                </div>

                <div >
                    <label  class="col-sm-3 control-label" >Foto Lokasi</label>
                    <div class="col-sm-9">
                    <input type="file"  name="foto_lokasi" value = "<?php echo $u->foto_lokasi?>" class="form-control">
                </div>

               
               
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" >Kirim</button>
                <?php } ?>
                <button   class="btn btn-primary btn-block" action="<?php echo base_url(). 'data_mitra/cancel';?>" >Cancel</button>
                
            </form>
           <!-- /form -->
        </div> <!-- ./container -->