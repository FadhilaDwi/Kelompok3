<div class="container">

    
        <div class="jumbotron jumbotron-fluid makanan">
        <div class="container">
            <h1 class="display-4 text-center text-white">Menu Hari Ini</h1>
        </div>
        </div>


<?php if($this->db->get_where('detail_menu', 'tgl_set') != null){?>
    <div class="row mb-3">
    <?php foreach($detail_menu as $dm) {?>
        <div class="col-lg-4 col-md-5 ">
            <div class="card h-100 text-center" >
                <img src="<?= base_url('assets/img/mitra/').$dm->foto?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $dm->nama_menu ?></h5>
                    <a class="card-text"><?= $dm->nama_katering?></a><br>
                    <span class="badge badge-pill badge-success">Rp. <?= number_format($dm->harga_menu,0,',','.')?></span></br>
                    <?= anchor('customer/dashboardpelanggan/tambah_keranjang/'.$dm->id_menu,'<div class="btn btn-sm btn-primary mt-2">Tambahkan Keranjang</div>')?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php }else{?>
       <img class="container" src="<?= base_url('assets/img/menukosong.jpg');?>" alt=""  width="500px" height="500px" >
    <?php }?>
     
  
    </div>

</div>