<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-3 text-gray-800 ">Kas</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kas Keluar</h6>
            </div>
            <div class="card-body">
            <p class="mb-4"><a href="#" class="btn btn-light btn-icon-split" data-toggle="modal" data-target="#inputModal">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text" >Tambahkan Kas</span>
                  </a></p>
              <div class="table-responsive">
              <form action="<?php echo base_url('kasmasuk/show_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Transaksi</th>
                      <th>Keterangan</th>
                      <th>Uang Keluar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($kas_keluar as $k){
                  
                  ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                      <td><?php echo $k->bulan ?></td>
                      <td><?php echo $k->keterangan ?></td>
                      <td><?php echo $k->uang ?></td> 
                    </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Total</th>
                      <th></th>
                      <th></th>
                      <th><?php echo $hitung_jumlah ->uang ?></th>
                    </tr>
                  </tfoot>
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
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Kas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('kasmasuk/input_data'); ?>" method="post">
            <h6>Tanggal Transaksi</h6>
            <input type="date" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" name="bulan">
            <h6 class="mt-2">Keterangan</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan keterangan disini" name="keterangan">
            <h6 class="mt-2">Uang Keluar</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nominal Uang disini" name="uang">
            </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Tambah" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>