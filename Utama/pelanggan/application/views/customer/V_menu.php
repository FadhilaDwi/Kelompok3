<div class="container">

    
        <div class="jumbotron jumbotron-fluid makanan mt-2">
        <div class="container">
            <h1 class="display-4 text-center text-white">Mitra Kami</h1>
        </div>
        </div>

    <div class="row mt-4 text-center">

      <?php foreach ($mitra as $m) :?>
        
          <div class="col-lg-4 col-md-5 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?= base_url().'assets/img/mitra/'.$m->foto_lokasi?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a><?= $m->nama_katering ?></a>
                </h4>
                <h5><?= $m->alamat ?></h5>
                <?= anchor('dashboardpelanggan/detail/'.$m->id_mitra,'<div class="btn btn-sm btn-success">Detail</div>')?>
              </div>
              
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
      <?php endforeach;?>
    </div>
</div>