<div class="container mt-3">
<?php foreach ($pesanan as $pesan) {?>
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
            <a href="#collapseExample<?php echo $pesan->id_pesan?>" class="btn btn-primary" data-toggle="collapse">Detail</a>
            <div class="collapse mt-2" id="collapseExample<?php echo $pesan->id_pesan?>">
                <div class="collapse-content">
                <div class="card-text">
                    <table cellspacing="0" width="70%" style="font-size:16px;">
                    <tr>
                        <td>Nama Menu</td>
                        <td>Nama Katering</td>
                        <td>Harga Menu</td>
                        <td>Jumlah Pembelian</td>
                        <td>Subtotal</td>
                    </tr>

                    <tr>
                        <td><?php echo $pesan->nama_menu?></td>
                        <td><?php echo $pesan->nama_katering?></td>
                        <td><?php echo $pesan->harga_menu?></td>
                        <td><?php echo $pesan->jumlah_pesanan?></td>
                        <?php $subtotal = $pesan->jumlah_pesanan*$pesan->harga_menu?>
                        <td><?php echo $subtotal?></td>
                    
                    </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
