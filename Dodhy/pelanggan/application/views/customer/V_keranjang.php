<div class="container mt-3">
  <?php if($this->cart->total_items() == 0) {?>

    <center><img src="<?php echo base_url('assets/img/keranjang.png')?>" alt=""></center>
  <?php }else{ ?>

  <div class="row">
    <div class="col-lg-8">
    <?php
    foreach($this->cart->contents() as $items) :
    ?>
    
                <div class="card mb-3">
                  <h5 class="card-header"><?= $items['shop']?></h5>
                  <div class="card-body">
                    <h5 class="card-title"><?= $items['name']?></h5>
                    <p class="card-text"><?= $items['qty']?> x Rp. <?= number_format($items['price'], 0, ',', '.')?> </p>
                  </div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col">
                            <p>Subtotal</p>
                          </div>
                          <div class="col">
                            <h4>Rp. <?= number_format($items['subtotal'], 0, ',', '.')?></h4>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
    <?php
endforeach;?>
    </div>
    <div class="col-lg-4">
      <div class="card" style="max-width: 18rem;">
        <div class="card-header text-white bg-danger">Ringkasan Belanja</div>
        <div class="card-body">
          <h5 class="card-title">Total Harga</h5>
         <h5 class="card-text">Rp. <?= number_format($this->cart->total(), 0, ',', '.')?></h5>
          <div class="border-bottom mt-2"></div>
         <center><a href="#" data-toggle="modal" data-target="#tambah_menu"><div class="btn btn-sm btn-success mt-2">Beli</div></a></center>
        </div>
      </div>
    </div>
<?php } ?>
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
        <form action="<?= base_url('customer/dashboardpelanggan/beli')?>" method="post" enctype="multipart/form-data" >
       
                <div class="form-group">
                    <input readonly hidden type="text" class="form-control" id="nama" value="<?php echo $pelanggan['id_pelanggan']?>" name="id_pelanggan">
                </div>

                <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <input type="text" class="form-control" name="alamat">
                </div>

                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="metode_bayar" class="form-control">
                      <option>-- Pilih Metode Pembayaran --</option>
                      <option value="bayar ditempat">Bayar Ditempat</option>
                      <option >Bank</option>
                    </select>
                </div>

                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" clear-data>Beli</button>
      </div>


      </form>
      
    </div>
  </div>
</div>