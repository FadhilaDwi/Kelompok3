

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard Mitra</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_menu"><i class="fas fa-download fa-sm text-white-50"></i> Tambah menu</a>
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
            <form action="<?php echo base_url(). 'admin/update'; ?>" method="post">
<table class="table table-bordered" >

<tr>
    <th style="text-align : center" >No</th>
    <th style="text-align : center"hidden>ID Mitra</th>
    <th style="text-align : center">ID Menu</th>
    <th style="text-align : center">Nama Catering</th>
    <th style="text-align : center">Nama Menu</th>
    <th style="text-align : center">Harga Menu</th>
    <th style="text-align : center">Gambar Menu</th>
    
    <th colspan="3" style="text-align : center"> Aksi</th>
</tr>

<?php 
$no=1;
foreach ($detail_menu as $b) {?>

<tr>
    <td><?php echo $no++  ?></td>
    <td hidden><?php echo $b['id_mitra']?></td>
    <td><?php echo $b['id_menu']?> </td>
    <td><?php echo $b['nama_katering']?> </td>
    <td><?php echo $b['nama_menu']?> </td>
    <td><?php echo $b['harga_menu']?> </td>
    <td><?php echo $b['foto']?> </td>
    
    
    <td> <div data-toggle="modal" data-target="#formedit<?=$b['id_menu'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </div></td>

    <td><div data-toggle="modal" data-target="#hapus" class="btn btn-danger  btn-sm"> <i class="fas fa-trash"></i></div></td>
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

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- modal Hapus-->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Hapus Menu?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Apakah anda akan menghapus menu?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <?php echo anchor('mitra/tambahmenu/hapus/'.$b ['id_menu'],'<button class="btn btn-primary">Hapus</button>'); ?>
  </div>
</div>
</div>
</div>

<!-- modal edit-->
<div class="modal fade" id="editmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Menu?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Apakah anda ingin mengubah data menu?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
    <?php echo anchor('mitra/tambahmenu/editmenu/'.$b ['id_menu'],'<button class="btn btn-primary" data-toggle="modal" data-target="#formedit">Ubah</button>'); ?>
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
    <a class="btn btn-primary" href="<?php echo base_url("mitra/login/logout") ?>">Logout</a>
  </div>
</div>
</div>
</div>

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
                    <label hidden>Id Menu</label>
                    <input type="text" name="id_menu" class="form-control" hidden>
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
                    <input type="date" name="hari" class="form-control">
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

<?php 
$no=1;
foreach ($detail_menu as $b) {?>
<div class="modal fade" id="formedit<?=$b['id_menu'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <p class="text-danger" >Edit Menu</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <form action="<?php echo base_url(). 'mitra/tambahmenu/editmenu' ?>" method="post" enctype="multipart/form-data" >
       
                <div class="form-group">
                    <label>Id Mitra</label>
                    <input type="text" class="form-control"  name="id_mitra" value="<?php echo $b['id_mitra']?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" class="form-control"  value="<?php echo $b['nama_katering']?>" readonly>
                </div>

                <div class="form-group">
                    <label hidden>Id Menu</label>
                    <input type="text" name="id_menu" class="form-control" value="<?php echo $b['id_menu']?>" readonly hidden>
                </div>

                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" value="<?php echo $b['nama_menu']?>">
                </div>

                <div class="form-group">
                    <label>Harga Menu</label>
                    <input type="text" name="harga_menu" class="form-control"value="<?php echo $b['harga_menu']?>">
                </div>
                
               <div class="form-group">
                    <label>Jadwal Menu </label>
                    <input type="date" name="hari" class="form-control" value="<?php echo $b['hari']?>">
                </div>
                
                <div class="form-group">
                <img src="<?php echo base_url(); ?>./assets/img/gambar_menu/<?php echo $b['foto']; ?>" width="400" height="400">
                </div>

                <div class="form-group">
                    <label>Gambar Menu </label>
                    <input type="file" name="foto" class="form-control"value="<?php echo $b['foto']?>">
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
<?php }?>