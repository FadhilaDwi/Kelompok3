<?php 
  if(!isset($_GET['cari'])){ 

    $KD_PERUM = $_GET['KD_PERUM'];
    $new = "SELECT perum.KD_PERUM, perum.NAMA_PERUM, perum.LOKASI, cluster.KD_CLUSTER, cluster.NAMA_CLUSTER, cluster.TIPE, cluster.STOK, cluster.HARGA, cluster.FASILITAS, cluster.GAMBAR
    FROM cluster 
    INNER JOIN perum
    ON cluster.KD_PERUM=perum.KD_PERUM
    WHERE perum.KD_PERUM='$KD_PERUM'";
    $rsNew = mysqli_query($konek, $new);
    
?>
    <!-- New Arrivals -->
    <section class="section-wrap new-arrivals pb-40">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>CLUSTER</small></h2>
          </div>
        </div>

        <div class="row row-10">              
          <?php while($row=mysqli_fetch_assoc($rsNew)){ ?>
            <div class="col-md-3 col-xs-12 animated-from-left">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="img/<?php echo $row['GAMBAR']; ?>" alt="" style="height:347px; width:277px;">
                    <img src="img/<?php echo $row['GAMBAR']; ?>" alt="" class="back-img">
                  </a>
                  <a href="?p=bukudetail/buku_detail_dev&KD_CLUSTER=<?php echo $row['KD_CLUSTER']; ?>" class="product-quickview">Lihat Selengkapnya</a>
                </div>
                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?p=bukudetail/buku_detail_dev&KD_CLUSTER=<?php echo $row['KD_CLUSTER']; ?>"><b><?php echo substr($row['NAMA_CLUSTER'], 0, 35); if(strlen($row['NAMA_CLUSTER'])>35) echo  "..." ?></b></a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="ammount text-danger">
                        <?php
                          $harga = number_format($row['TIPE']);
                          echo " TIPE ".$harga;
                        ?>
                      </span>
                    </ins>
                  </span>
                </div>
              </div>
            </div>     
          <?php } ?>
        </div> <!-- end row -->
      </div>
    </section> <!-- end new arrivals -->

  <?php } else { 
    $key=$_GET['judul'];
    $queryCari = "SELECT KD_CLUSTER, NAMA_CLUSTER, TIPE, STOK, FASILITAS, GAMBAR FROM cluster WHERE NAMA_CLUSTER like '%$key%' ORDER BY KD_CLUSTER DESC";
    $rsCari = mysqli_query($konek, $queryCari);
  ?>
    <section class="section-wrap new-arrivals pb-40">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>Hasil Pencarian</small></h2>
          </div>
        </div>

        <div class="row row-10">              
          <?php while($row=mysqli_fetch_assoc($rsCari)){ ?>
            <div class="col-md-3 col-xs-12 animated-from-left">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="img/<?php echo $row['GAMBAR']; ?>" alt="" style="height:347px; width:277px;">
                    <img src="img/<?php echo $row['GAMBAR']; ?>" alt="" class="back-img">
                  </a>
                  <a href="?p=buku&KD_CLUSTER=<?php echo $row['KD_CLUSTER']; ?>" class="product-quickview">Lihat Selengkapnya</a>
                </div>
                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?p=buku&KD_CLUSTER=<?php echo $row['KD_CLUSTER']; ?>"><b><?php echo substr($row['NAMA_CLUSTER'], 0, 35); if(strlen($row['NAMA_CLUSTER'])>35) echo  "..." ?></b></a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="ammount text-danger">
                        <?php
                          $harga = number_format($row['TIPE'], 2, ",", ".");
                          echo "".$harga;
                        ?>
                      </span>
                    </ins>
                  </span>
                </div>
              </div>
            </div>     
          <?php } ?>
        </div> <!-- end row -->
      </div>
    </section>
  <?php } ?>            

    <!-- Partners -->
    <!--<section class="section-wrap partners pt-0 pb-50">
      <div class="container">
        <div class="row">

          <div id="owl-partners" class="owl-carousel owl-theme">

            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_1.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_2.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_3.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_4.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_5.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_6.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_1.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="img/partners/partner_logo_dark_2.png" alt="">
              </a>
            </div>

          </div>
          
        </div>
      </div>
    </section> -->
    <!-- end partners -->