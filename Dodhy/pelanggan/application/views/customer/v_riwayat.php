<div class="container mt-3">
<?php foreach ($pemesanan as $pesan) {?>
    <div class="card mb-3">
        <h5 class="card-header">Kode Pemesanan : <?= $pesan->id_pesan?></h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <div class="row mb-2">
            <div class="col">
                <strong><h5 class="card-text">Total Pembayaran</h5></strong>
            </div>
                <div class="col"><strong><h5><?= $pesan->total_harga?></h5></strong></div>
            </div>
            <a href="#" class="btn btn-primary">Detail</a>
        </div>
    </div>
<?php } ?>
</div>
