<div class="container mt-3">
  <?php if($this->cart->total_items() == 0) {?>

    <center><img src="<?php echo base_url('assets/img/keranjang.png')?>" alt=""></center>
  <?php }else{ ?>
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
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
    <?php
endforeach;
}?>
    




</div>