



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
              <form action="<?php echo base_url('dashboard/tampil_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pengurus</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    <tr>
                    <?php 
                  $no = 1;
                  foreach($pengurus_masjid as $p){
                  
                  ?>
                    <td><?php echo $no++ ?></td>
                      <td><?php echo $p->nama ?></td>
                      <td><?php echo $p->alamat ?></td>
                      <td><a href="<?php echo base_url('dashboard/hapus/'.$p->idpengurus); ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
                      <td><a href="" data-toggle="modal" data-target="#editModal<?=$p->idpengurus; ?>"class="btn btn-success">Edit data</a></td>
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
        <form action="<?php echo base_url('dashboard/tambah_data'); ?>" method="post">
            <h6>Nama Pengurus</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama pengurus disini" name="nama">
            <h6 class="mt-2">Keterangan</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="alamat">
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
    foreach($pengurus_masjid as $p){ $no++?>
  <div class="modal fade" id="editModal<?=$p->idpengurus ?>" tabindex="-1" role="dialog" 
  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pengurus</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('dashboard/edit/'.$p->idpengurus); ?>" method="post">
        <input type="hidden" readonly value="<?=$p->idpengurus ?>" name="idpengurus" class="form-control">
            <h6>Nama Pengurus</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan Nama pengurus disini" name="nama" value="<?=$p->nama?>">
            <h6 class="mt-2">Alamat</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" 
            aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="alamat" value="<?=$p->alamat ?>">
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
  

