<div class="container mt-3">
<?= form_open_multipart('customer/profil') ?>

<?= $this->session->flashdata('message');?>
  <div class="row">
    
        <div class="col-4">
            
            <div class="file-field">
                <div class="z-depth-1-half mb-4 ml-2">
                <img src="<?= base_url('assets/img/profil/') . $pelanggan['foto']; ?>" class=" z-depth-1-half avatar-pic"
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
        <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <label for="username" hidden></label>
        <input type="text" class="form-control" id="username" value="<?php echo $pelanggan['username']?>" name="username" readonly>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="name" hidden>Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" value="<?php echo $pelanggan['nama_pelanggan']?>" name="nama_pelanggan">
        <?=form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
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
        <input type="email" class="form-control" id="email" value="<?php echo $pelanggan['email']?>" name="email">
        <?=form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="alamat" hidden></label>
        <input type="textarea" class="form-control" id="alamat" value="<?php echo $pelanggan['alamat']?>" name="alamat">
        <?=form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
    </div>
    <!-- Grid column -->
  <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
      <label for="no_telepon" hidden></label>
        <input type="text" class="form-control" id="no_telepon" value="<?php echo $pelanggan['no_telepon']?>" name="no_telepon">
        <?=form_error('no_telepon', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
    </div>
    <!-- Grid column -->
  </div>

  <button type="submit" class="btn btn-primary btn-md mb-2">Ganti</button>

        </div>  
  </div>
  </form>
</div>