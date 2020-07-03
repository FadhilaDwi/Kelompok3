  <!-- Page Content -->



      <!-- /.col-lg-3 -->
      <div class="jumbotron utama">
        <h1 class="display-4">PESAN MAKANAN SEHAT DAN TERJANGKAU DISINI</h1>
        <center><a class="btn btn-primary btn-lg mt-2 text-white"  onClick="toTarget()" role="button" style="border-radius: 25px;" >Cari Makananmu disini</a></center>
      </div>


        <div class="container-fluid">
      <center><h3 id="menu" style="font-family:'Quicksand', sans-serif;">Menu Hari Ini</h3></center>
  <div class="row mt-4 text-center">

        <?php foreach ($detail_menu as $dm){?>
    <div class="row mb-4">
      
      <div class="col-lg-4 ml-3">
        <div class="card text-center" style="width: 18rem;">
          <img src="<?= base_url('assets/img/gambar_menu/').$dm->foto?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $dm->nama_menu ?></h5>
            <h6><?= $dm->nama_katering?></h6>
            <span class="badge badge-pill badge-success">Rp. <?= number_format($dm->harga_menu,0,',','.')?></span></br>
            <?= anchor('dashboardpelanggan/tambah_keranjang/'.$dm->id_menu,'<div class="btn btn-sm btn-primary mt-2">Tambahkan Keranjang</div>')?>
          </div>
        </div>
        
      </div>
      
    </div>
    <?php } ?>
  </div>
  </div>

  <!-- /.container -->

  
