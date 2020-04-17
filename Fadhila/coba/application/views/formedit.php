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
           
                <h2>Edit Data</h2>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">No Pendaftaran</label>
                    <div class="col-sm-9">
                        <input readonly type="text" id="firstName"  name = "idpendaftaran" class="form-control"  autofocus >
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Id Admin</label>
                    <div class="col-sm-9">
                        <input readonly type="text" id="firstName"  name = "idadmin" class="form-control"   autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Nama Pendaftar</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "nama_pen"  class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="Nama Pendaftar" name = "jk"  class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label" >Kasus</label>
                    <div class="col-sm-9">
                    <input type="text" id="lastName" placeholder="Kasus" name ="kasus" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label" >Jadwal Sidang</label>
                    <div class="col-sm-9">
                    <input type="date" id="birthDate" placeholder="Jadwal Sidang" name="sidang" class="form-control">
                    </div>
                </div>
                
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" value = "tambah">Kirim</button>
                <button type="submit" class="btn btn-primary btn-block"  >Cancel</button>

            </form>
           <!-- /form -->
        </div> <!-- ./container -->