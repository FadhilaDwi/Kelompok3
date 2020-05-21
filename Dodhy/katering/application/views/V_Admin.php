



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          

  <!-- Scroll to Top Button-->
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengurus</h6>
            </div>
            <div class="card-body">
            <p class="mb-4"><a href="#" class="btn btn-light btn-icon-split" data-toggle="modal" data-target="#inputModal">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text" >Tambahkan Nama Pengurus</span>
                  </a></p>
              <div class="table-responsive">
              <form action="<?php echo base_url('admin/tampil_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama Admin</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    <tr>
                    <?php 
                  $no = 1;
                  foreach($admin as $a){
                  
                  ?>
                    <td><?php echo $no++ ?></td>
                      <td><?php echo $a->username ?></td>
                      <td><?php echo $a->nama_admin ?></td>
                      <td><?php echo $a->alamat ?></td>
                      <td><?php echo $a->no_telepon ?></td>
                      <td>
                        <img src="<?php echo base_url(); ?>uploads/<?php echo $a->foto; ?>" width="90" height="100">
                      </td>
                      <td><a href="<?php echo base_url('admin/hapus/'.$a->id_admin); ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
                      <td><a href="" data-toggle="modal" data-target="#editModal<?=$a->id_admin; ?>"class="btn btn-success">Edit data</a></td>
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
        <form action="<?php echo base_url('admin/tambah_data'); ?>" method="post">
            <h6>Username</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
            <h6 class="mt-2">Nama Admin</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin disini" name="nama_admin">
            <h6 class="mt-2">Alamat</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="alamat">
            <h6 class="mt-2">No Telepon</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan No Telepon disini" name="no_telepon">
            <h6 class="mt-2">Foto</h6>
            <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  name="foto">
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

  <!-- Modal Edit Data -->
  <?php 
    $no = 0;
    foreach($admin as $a){ ?>
  <div class="modal fade" id="editModal<?=$a->id_admin ?>" tabindex="-1" role="dialog" 
  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Admin</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('admin/edit/'.$a->id_admin); ?>" method="post">
        <input type="hidden" readonly value="<?=$a->id_admin ?>" name="id_admin" class="form-control">
            <h6>Username</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan Username" name="username" value="<?=$a->username?>">
            <h6>Nama Admin</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan Nama Admin disini" name="nama_admin" value="<?=$a->nama_admin?>">
            <h6 class="mt-2">Alamat</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="alamat" value="<?=$a->alamat ?>">
            <h6 class="mt-2">No Telepon</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan No Telepon" name="no_telepon" value="<?=$a->no_telepon ?>">
            <h6 class="mt-2">Password</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan Password" name="password" value="<?=$a->password ?>">
            </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Tambah" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>
    <?php }?>
  

