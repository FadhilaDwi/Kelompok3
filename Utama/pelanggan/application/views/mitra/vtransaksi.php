

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard Mitra</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_menu"><i class="fas fa-download fa-sm text-white-50"></i> Tambah menu</a>
    </div>

    
    <div class="row">

      <!-- Area Chart -->
      <div class="col">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form >
                <table class="table table-bordered" >

                <tr>
                    <th style="text-align : center" >No</th>
                    <th style="text-align : center">ID Pesan</th>
                    <th style="text-align : center" hidden>ID Pelanggan</th>
                    <th style="text-align : center">Nama Pelanggan</th>
                    <th style="text-align : center">Nama Menu</th>
                    <th style="text-align : center">jumlah Pesanan</th>
                    <th style="text-align : center">Total Harga</th>
                    <th style="text-align : center">Status Pesanan</th>
                    <th style="text-align : center">Bukti Pembayaran</th>
                    <th style="text-align : center">Alamat Pemesanan</th>
                  
                    <th colspan="3" style="text-align : center"> Aksi</th>
                </tr>

                <?php 
                $no=1;
                foreach ($pesanan as $b) {?>

                <tr>
                    <td><?php echo $no++  ?></td>
                    <td ><?php echo $b['id_pesan']?></td>
                    <td hidden><?php echo $b['id_pelanggan']?> </td>
                    <td><?php echo $b['nama_pelanggan']?> </td>
                    <td><?php echo $b['nama_menu']?> </td>
                    <td><?php echo $b['jumlah_pesanan']?> </td>
                    <td><?php echo $b['total_harga']?> </td>
                    <td><?php echo $b['status_pesanan']?> </td>
                    <td><?php echo $b['bukti_pembayaran']?> </td>
                    <td><?php echo $b['alamat_pesanan']?> </td>
                      
                    
                    <td> <div data-toggle="modal" data-target="#lihat<?=$b['id_pesan'];?>" class="btn btn-primary btn-sm" >  Lihat</div></td>
                  
                    <td><div data-toggle="modal" data-target="#tolak<?=$b['id_pesan'];?>"  class="btn btn-danger  btn-sm" > Tolak </div></td>
                </tr>
                <?php } ?>
                </table>
            </form>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      
    </div>



  </div>
  <!-- /.container-fluid -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<?php  foreach($pesanan as $b){ ?><!-- modal Hapus-->
<div class="modal fade" id="tolak<?=$b['id_pesan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Apakah anda akan menolak pesanan?
  <form action="<?php echo base_url(). 'tambahmenu/tolakpesanan' ?>" method="post" enctype="multipart/form-data" >
       
                <div class="form-group">
                    <label hidden>Id Pesan</label>
                    <input type="text" class="form-control"  name="id_pesan" value="<?php echo $b['id_pesan']?>" readonly hidden>
                </div>
                <div class="form-group">
                    <label hidden>status pesan</label>
                    <input type="text" class="form-control"  value="<?php echo $b['status_pesanan']?>" readonly hidden>
                </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
   <button class="btn btn-primary" name="status_pesanan" value="ditolak" <?php if ($b['status_pesanan'] == 'Sedang Proses'){ ?> disabled <?php   } ?>>Ya</button>
  </div>
</form>
</div>
</div>
</div> 
<?php } ?>



<div class="modal fade" id="tambah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tambah Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <form action="<?php echo base_url(). 'tambahmenu' ?>" method="post" enctype="multipart/form-data" >
       
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
                
               <!-- <div class="form-group">
                    <label>Jadwal Menu </label>
                    <input type="date" name="tgl_set" class="form-control">
                </div> -->

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

<?php  foreach($pesanan as $b){ ?>
<div class="modal fade" id="lihat<?=$b['id_pesan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="<?php echo base_url(). 'tambahmenu/terimapesanan' ?>" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                    <label>ID Pesan</label>
                    <input type="text" class="form-control"  name="id_pesan" value="<?php echo $b['id_pesan']?>"  readonly>
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control"  name="nama_pelanggan" value="<?php echo $b['nama_pelanggan']?>"  readonly>
                </div>

                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" class="form-control" name="nama_menu"  value="<?php echo $b['nama_menu']?>" readonly>
                </div>

                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="text" name="total_harga" value="<?php echo $b['total_harga']?>" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Status Pesanan</label>
                    <input type="text" value="<?php echo $b['status_pesanan']?>" value class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" value="<?php echo $b['bukti_pembayaran']?>"class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat Pemesan</label>
                    <input type="text" name="alamat_pesanan" value="<?php echo $b['alamat_pesanan']?>"class="form-control">
                </div>

               <!-- <div class="form-group"> 
                    <label>Status Pesanan</label>
                    <input type="text"  class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Jadwal Menu </label>
                    <input type="date" name="tgl_set" class="form-control">
                </div> -->

               

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" name="status_pesanan" value="Sedang Proses" class="btn btn-primary" <?php if ($b['status_pesanan'] == 'ditolak'){ ?> disabled <?php   } ?> clear-data>Terima</button>
      </div>
</form>
      
    </div>
  </div>
</div>
<?php }?>

