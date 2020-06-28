



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
              <form >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pesan</th>
                      <th hidden>ID Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Nama Menu</th>
                      <th>Nama Katering</th>
                      <th>Jumlah Pesanan</th>
                      <th>Total Harga</th>
                      <th>Status Pesanan</th>
                      <th>Bukti Pembayaran</th>
                      <th>Alamat Pemesanan</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                $no=1;
                foreach ($pesanan as $b) {?>

                <tr>
                    <td><?php echo $no++  ?></td>
                    <td ><?php echo $b['id_pesan']?></td>
                    <td hidden><?php echo $b['id_pelanggan']?> </td>
                    <td><?php echo $b['nama_pelanggan']?> </td>
                    <td><?php echo $b['nama_menu']?> </td>
                    <td><?php echo $b['nama_katering']?></td>
                    <td><?php echo $b['jumlah_pesanan']?> </td>
                    <td><?php echo $b['total_harga']?> </td>
                    <td><?php echo $b['status_pesanan']?> </td>
                    <td><?php echo $b['bukti_pembayaran']?> </td>
                    <td><?php echo $b['alamat_pesanan']?> </td>

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
  

