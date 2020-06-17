<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-8">
    <?php foreach ($mitra as $m) {?>
      <img class="w-100 mt-4" src="<?php echo base_url('assets/img/mitra/').$m['foto_lokasi']?>" style="height: 260px;">
    </div>
    <div class="col-lg-4 ">
        <div class="list-group text-center" id="list-tab" role="tablist" style="font-family: 'DM Mono', monospace;">
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile"
            role="tab" aria-controls="profile" onclick="kelihatan('nomor');">Hubungi</a>
            <div id="nomor" style="display: none;"><?=$m['no_telepon']?></div>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages"
            role="tab" aria-controls="messages" onclick="kelihatan('alamat')">Alamat</a>
            <div id="alamat" style="display: none;"><?=$m['alamat']?></div>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings"
            role="tab" aria-controls="settings">Settings</a>
        </div>
    </div>
    <?php }?>
  </div>

    
  <h5 class="mt-3">Menu Hari Ini</h5>
    <div class="row mb-4">
  <?php foreach ($detail_menu as $dm){?>
      <div class="col-lg-3 ">
        <div class="card text-center" style="width: 18rem;">
          <img src="<?= base_url('assets/img/mitra/').$dm->foto?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $dm->nama_menu ?></h5>
            <span class="badge badge-pill badge-success">Rp. <?= number_format($dm->harga_menu,0,',','.')?></span></br>
            <?= anchor('customer/dashboardpelanggan/tambah_keranjang/'.$dm->id_menu,'<div class="btn btn-sm btn-primary mt-2">Tambahkan Keranjang</div>')?>
          </div>
        </div>
        
      </div>
      
    <?php } ?>
    </div>

</div>