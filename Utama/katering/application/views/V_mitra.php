



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Katering</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          

  <!-- Scroll to Top Button-->
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Katering</h6>
            </div>
            <div class="card-body">
            <p class="mb-4"><a href="#" class="btn btn-light btn-icon-split" data-toggle="modal" data-target="#inputModal">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text" >Tambahkan Usaha Katering</span>
                  </a></p>
              <div class="table-responsive">
              <form action="<?php echo base_url('mitra/tampil_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama Katering</th>
                      <th>Nama Pemilik</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Email</th>
                      <th>Foto Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    <tr>
                    <?php 
                  $no = 1;
                  foreach($mitra as $m){
                  
                  ?>
                    <td><?php echo $no++ ?></td>
                      <td><?php echo $m->username ?></td>
                      <td><?php echo $m->nama_katering ?></td>
                      <td><?php echo $m->nama_pemilik ?></td>
                      <td><?php echo $m->alamat ?></td>
                      <td><?php echo $m->no_telepon ?></td>
                      <td><?php echo $m->email ?></td>
                      <td>
                        <img src="<?php echo base_url(); ?>uploads/<?php echo $m->foto_lokasi; ?>" width="90" height="100">
                      </td>
                      <td><a href="<?php echo base_url('mitra/hapus/'.$m->id_mitra); ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Logout Modal-->
  <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pengurus</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('mitra/tambah_data'); ?>" method="post">
            <h6>Username</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
            <h6 class="mt-2">Nama Katering</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Katering disini" name="nama_katering">
            <h6 class="mt-2">Nama Pemilik</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama pemilik disini" name="nama_pemilik">
            <h6 class="mt-2">Alamat</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="alamat">
            <h6 class="mt-2">No Telepon</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan No Telepon disini"  name="no_telepon">
            <h6 class="mt-2">Email</h6>
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email disini" name="email">
            <h6 class="mt-2">Foto Lokasi</h6>
            <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  name="foto_lokasi">
            <h6 class="mt-2">Password</h6>
            <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan password disini" name="password">
            </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Tambah" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>

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
  

