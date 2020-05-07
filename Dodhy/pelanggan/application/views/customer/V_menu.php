<div class="container">

    
        <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Menu Hari Ini</h1>
        </div>
        </div>



    <div class="row mb-3">
    <?php foreach($detail_menu as $dm) {?>
        <div class="col-lg-4 col-md-5 ">
            <div class="card h-100 text-center" >
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $dm->nama_menu ?></h5>
                    <a class="card-text"><?= $dm->nama_katering?></a><br>
                    <span class="badge badge-pill badge-success">Rp. <?= number_format($dm->harga_menu,0,',','.')?></span></br>
                    <a href="#" class="btn btn-primary mt-2">Masukkan Ke Keranjang</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>

</div>