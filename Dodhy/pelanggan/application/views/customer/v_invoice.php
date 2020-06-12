
<center><a href="<?= base_url('customer/dashboardpelanggan/index')?>"><button class="add btn btn-success mt-2">Beli Lagi</button></a></center>
<?= form_open_multipart('customer/dashboardpelanggan/beli')?>
<div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="container">
                <div class="card mt-1" style="width: 31rem;">
                    <div class="card-body">
                        <p class="card-text">Status</p>
                        <?php if(($pesanan['status_pesanan']) == 'selesai'){ ?>
                        <h6 class="transaksi-sukses">Transaksi Berhasil</h6>
                        <!-- Transaksi Jika gagal -->
                        <?php }else if(($pesanan['status_pesanan']) == 'proses'){ ?>
                        <h6 class="transaksi-sukses">Proses Pengiriman</h6>
                        <?php }else if(($pesanan['status_pesanan']) == 'batal'){ ?>
                        <h6 class="transaksi-gagal">Transaksi Gagal</h6>
                        <!-- akhir -->
                        <?php }else if(($pesanan['status_pesanan']) == 'belum membayar'){?>
                        <h6 class="verifikasi">Belum Membayar</h6>
                        <?php }?>
                        <?php }else if(($pesanan['status_pesanan']) == 'menunggu'){?>
                        <h6 class="verifikasi">Menunggu Konfirmasi</h6>
                        <?php }?>
                        <div class="border-bottom"></div>
                        <div class="row mt-2">
                            <div class="col">
                                <p class="card-text">Tanggal </p>
                            </div>
                            <div class="col-4 ml-5">
                                <p class="card-text tanggal">Tanggal</p>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <p class="card-text mt-2">Kode Pembelian</p>
                        <p class="card-text"><?= $pesanan['id_pesan']?></p>
                    </div>
                </div>
                <div class="card detil" style="width: 31rem;">
                    <div class="card-body">
                        <p class="card-title">Detail Pembayaran</p>
                        <div class="row mt-2">
                            <div class="col">
                                <p class="card-text">Nama Menu</p>
                                <!-- Perulangan mulai dari sini -->
                                <p class="card-text produk"><?= $pesanan['nama_menu']?></p>
                                <!-- akhir -->
                            </div>
                            <div class="col">
                                <p class="card-text">Jumlah</p>
                                <p class="card-text"><?= $pesanan['jumlah_pesanan']?></p>
                            </div>
                            <div class="col">
                                <p class="card-text">Subtotal</p>
                                <!-- perulangan mulai dari sini -->
                                <?php $subtotal = $pesanan['jumlah_pesanan']*$pesanan['harga_menu']?>
                                <p class="card-text produk">Rp. <?=number_format($subtotal,0,',','.')?></p>
                                <!-- akhir -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card detil" style="width: 31rem;">
                    <div class="card-body">
                        <p class="card-title">Informasi Pembayaran</p>
                        <div class="row mt-2">
                            <div class="col">
                                <p class="card-text">Metode Pembayaran</p>
                            </div>
                            <div class="col-4 ml-5">
                                <p class="card-text tanggal">Cash</p>
                            </div>
                            
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="card-text tanggal">Total Pembayaran</h6>
                            </div>
                            <div class="col-4 ml-5">
                                <p class="card-text harga">Rp. <?= $pesanan['total_harga']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>