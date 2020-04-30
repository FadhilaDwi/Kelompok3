



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          

  <!-- Scroll to Top Button-->
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="p-0 font-weight-bold text-primary">Data Pelanggan</h6>
            </div>
            <div class="card-body">
                  </a></p>
              <div class="table-responsive">
              <form action="<?php echo base_url('pelanggan/tampil_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama Pelanggan</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Foto</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    <tr>
                    <?php 
                  $no = 1;
                  foreach($pelanggan as $p){
                  
                  ?>
                    <td><?php echo $no++ ?></td>
                      <td><?php echo $p->username ?></td>
                      <td><?php echo $p->nama_pelanggan ?></td>
                      <td><?php echo $p->email ?></td>
                      <td><?php echo $p->alamat ?></td>
                      <td><?php echo $p->no_telepon ?></td>
                      <td>
                        <img src="<?php echo base_url(); ?>uploads/<?php echo $p->foto; ?>" width="90" height="100">
                      </td>
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
  

