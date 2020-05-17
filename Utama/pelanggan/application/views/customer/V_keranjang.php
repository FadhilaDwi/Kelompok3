<div class="container mt-3">
    <div class="row">
    <?php
    foreach($this->cart->contents() as $items) :?>
       
        <div class="col-sm-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header">
                    <?= $items['shop']?>
                </div>
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $items['name']?></h5>
                            <div class="row">
                                <input type="text"  name="jumlah" id="jumlah" readonly value="<?= $items['qty']?>">
                                <p class="card-text ml-2">x Rp. <?= number_format($items['price'], 0, ',','.')?></p>
                            </div>
                            <div class="row mt-2">
                                <p class="card-text ">Total Harga</p>
                                <p class="card-text ml-4">Rp. <?= number_format($items['subtotal'], 0, ',','.')?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
        <div class="col-sm-4">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Harga</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Secondary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    
    
    </div>




</div>