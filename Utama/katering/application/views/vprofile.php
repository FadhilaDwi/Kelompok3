 
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ubah Profil</h1>
     
    </div>


    <div class="row">

      <!-- Area Chart -->
      <div class="col">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
            <div class="container mt-3">
<?= form_open_multipart('Profil') ?>
  <div class="row">
    
        <div class="col-4">
            
            <div class="file-field">
                <div class="z-depth-3-half mb-2 ml-2">
                <img src="<?= base_url('assets/img/admin/') . $admin ['foto']; ?>" class=" z-depth-1-half avatar-pic"
                    alt="example placeholder" width="300" height="250">
                </div>
                <div class="d-flex justify-content-center">
                <div class="btn btn-mdb-color btn-rounded float-left">
                    <input type="file" name="foto">
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-8">
 
  <!-- Grid row -->
  <div class="row">
  <div class="col-md-12">
  <div class="md-form form-group">
      <label for="name" hidden>Username</label>
        <input type="text" class="form-control" id="nama" value="<?php echo $admin['username']?>" name="username" placeholder="Username">
        <?=form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
</div>
  <div class="col-md-12">
  <div class="md-form form-group">
      <label for="name" hidden>Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" value="<?php echo $admin['nama_admin']?>" name="nama_admin" placeholder="Nama Admin">
        <?=form_error('nama_admin', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
</div>
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="no_telepon" hidden></label>
        <input type="text" class="form-control" id="no_telepon" value="<?php echo $admin['no_telepon']?>" name="no_telepon" placeholder="No Telepon">
      </div>
    </div>
    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="alamat" hidden></label>
        <input type="textarea" class="form-control" id="email" value="<?php echo $admin['alamat']?>" name="alamat" placeholder="alamat">
      </div>
    </div>
    <!-- Grid column -->
    <!-- Grid column -->
  <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="no_telepon" hidden></label>
        <input type="text" class="form-control" id="no_telepon" value="<?php echo $admin['no_telepon']?>" name="no_telepon" placeholder="No Telepon">
      </div>
    </div>
    <!-- Grid column -->
  </div>

  <button type="submit" class="btn btn-primary btn-md mb-2">Ganti</button>

        </div>  
  </div>
  </form>
</div>

            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      
    </div>

    

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url("login/logout") ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
