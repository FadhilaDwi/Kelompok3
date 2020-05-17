


  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard Mitra</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_menu"><i class="fas fa-download fa-sm text-white-50"></i> Tambah menu</a>
    </div>

    <!-- Content Row -->
    <div class="row">


      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Masuk</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Diterima</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
            <table class="table table-bordered">

<tr>
    <th style="text-align : center">No</th>
    <th style="text-align : center">ID Mitra</th>
    <th style="text-align : center">Username</th>
    <th style="text-align : center">Nama Catering</th>
    <th style="text-align : center">Nama Pemilik</th>
    <th style="text-align : center">Foto Lokasi</th>
    <th colspan="3" style="text-align : center"> Aksi</th>
</tr>



<tr>
    <td>    </td>
    <td> </td>

    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
    
    <td ><div class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </div></td>
    
    <td><div class="btn btn-danger  btn-sm"> <i class="fas fa-trash"></i> </div></td>
</tr>



</table>

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

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>



<div class="modal fade" id="tambah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <p class="text-danger" >Tambah Menu</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <form action="<?php echo base_url(). 'mitra/tambahmenu' ?>" method="post" enctype="multipart/form-data" >
       
                <div class="form-group">
                    <label>Id Mitra</label>
                    <input type="text" class="form-control"  name="id_mitra" value="<?php echo $mitra['id_mitra']?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" class="form-control"  value="<?php echo $mitra['nama_katering']?>" readonly>
                </div>

                <div class="form-group">
                    <label>Id Menu</label>
                    <input type="text" name="id_menu" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control">
                </div>

                <div class="form-group">
                    <label>Harga Menu</label>
                    <input type="text" name="harga_menu" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Jadwal Menu </label>
                    <input type="date" name="tgl_set" class="form-control">
                </div>

                <div class="form-group">
                    <label>Gambar Menu </label>
                    <input type="file" name="foto" class="form-control">
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" clear-data>Simpan</button>
      </div>


      </form>
      
    </div>
  </div>
</div>