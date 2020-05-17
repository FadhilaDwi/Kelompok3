 
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
                <img src="<?= base_url('assets/img/profil/') . $mitra ['foto_lokasi']; ?>" class=" z-depth-1-half avatar-pic"
                    alt="example placeholder" width="300" height="250">
                </div>
                <div class="d-flex justify-content-center">
                <div class="btn btn-mdb-color btn-rounded float-left">
                    <input type="file" name="foto_lokasi">
                </div>
                </div>
            </div>
        </div>
        <div class="col-8">
        <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <label for="username" hidden></label>
        <input type="text" class="form-control" id="username" value="<?php echo $mitra['username']?>" name="username" readonly>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="name" hidden>Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" value="<?php echo $mitra['nama_katering']?>" name="nama_katering">
        <?=form_error('nama_katering', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="email" hidden></label>
        <input type="email" class="form-control" id="email" value="<?php echo $mitra['email']?>" name="email">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="alamat" hidden></label>
        <input type="textarea" class="form-control" id="alamat" value="<?php echo $mitra['alamat']?>" name="alamat">
      </div>
    </div>
    <!-- Grid column -->
  <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="no_telepon" hidden></label>
        <input type="text" class="form-control" id="no_telepon" value="<?php echo $mitra['no_telepon']?>" name="no_telepon">
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

