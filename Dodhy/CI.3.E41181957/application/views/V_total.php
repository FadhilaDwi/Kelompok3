<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-3 text-gray-800 ">Kas</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kas Masuk</h6>
            </div>
            <div class="card-body">
            <p class="mb-4"><a href="#" class="btn btn-light btn-icon-split" data-toggle="modal" data-target="#inputModal">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text" >Tambahkan Kas</span>
                  </a></p>
              <div class="table-responsive">
              <form action="<?php echo base_url('kasmasuk/tampil_data'); ?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Transaksi</th>
                      <th>Keterangan</th>
                      <th>Uang masuk</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    <tr>
                    <?php 
                  $no = 1;
                  foreach($kas_masuk as $k){
                  
                  ?>
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
  
       
        
        </div>
      </div>
    </div>
  </div>