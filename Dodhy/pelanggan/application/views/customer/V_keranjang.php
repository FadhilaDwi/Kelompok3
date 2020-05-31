<div class="container mt-3">
    <?php
    $no = 1;

    foreach($this->cart->contents() as $items) :
            // if($this->cart->product_options($items['shop_id']) as $barang => $items['shop_id']) :
    ?>
            <div class="card mb-3" >
                <div class="card-header">
                    <?= $items['shop_id']?>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $items['name']?></td>
                      <td><?= $items['qty']?></td>
                      <td>Rp. <?= number_format($items['price'], 0, ',', '.')?></td>
                      <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.')?></td>
                    </tr>
                  </tbody>
                </table>
                <!-- <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="row">
                                <input type="text"  name="jumlah" id="jumlah" readonly value="">
                                <p class="card-text ml-2">x Rp. ?></p>
                            </div>
                            <div class="row mt-2">
                                <p class="card-text ">Total Harga</p>
                                <p class="card-text ml-4">Rp. </p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
    <?php
    // endif; 
endforeach;?>
    




</div>