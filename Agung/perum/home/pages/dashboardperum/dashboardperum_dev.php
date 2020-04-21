<?php 
include "inc/slider.php";
  if(!isset($_GET['cari'])){ 
    
    $new = "SELECT KD_PERUM, NAMA_PERUM, LOKASI, GAMBAR_PERUM FROM perum ORDER BY KD_PERUM DESC LIMIT 10 ";
    $rsNew = mysqli_query($konek, $new);
    
?>
 
    <!-- New Arrivals -->
    <section class="section-wrap new-arrivals pb-40">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>PERUMAHAN</small></h2>
          </div>
        </div>

        <div class="row row-10">              
          <?php while($row=mysqli_fetch_assoc($rsNew)){ ?>
            <div class="col-md-3 col-xs-12 animated-from-left">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="img/<?php echo $row['GAMBAR_PERUM']; ?>" alt="" style="height:347px; width:277px;">
                    <img src="img/<?php echo $row['GAMBAR_PERUM']; ?>" alt="" class="back-img">
                  </a>
                  <a href="?p=dashboard/dashboard_dev&KD_PERUM=<?php echo $row['KD_PERUM']; ?>" class="product-quickview">Lihat Selengkapnya</a>
                  
                   
                </div>
                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?p=buku_detail&KD_PERUM=<?php echo $row['KD_PERUM']; ?>"><b><?php echo substr($row['NAMA_PERUM'], 0, 35); if(strlen($row['NAMA_PERUM'])>35) echo  "..." ?></b></a>

                  </h3>
                  <h3> <a class="product-title" href="?p=buku_detail&KD_PERUM=<?php echo $row['KD_PERUM']; ?>"><b><?php echo substr($row['LOKASI'], 0, 35); if(strlen($row['LOKASI'])>35) echo  "..." ?></b></a></h3>
                </div>
              </div>
            </div>     
          <?php } ?>
        </div> <!-- end row -->
      </div>
    </section> <!-- end new arrivals -->

  <?php } else { 
    $key=$_GET['judul'];
    $queryCari = "SELECT KD_PERUM, NAMA_PERUM, GAMBAR_PERUM FROM perum WHERE NAMA_PERUM like '%$key%' ORDER BY KD_PERUM DESC";
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
                    <img src="img/<?php echo $row['GAMBAR_PERUM']; ?>" alt="" style="height:347px; width:277px;">
                    <img src="img/<?php echo $row['GAMBAR_PERUM']; ?>" alt="" class="back-img">
                  </a>
                  <a href="?p=dashboard/dashboard&KD_PERUM=<?php echo $row['KD_PERUM']; ?>" class="product-quickview">Lihat Selengkapnya</a>
                </div>
                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?p=dashboard&KD_PERUM=<?php echo $row['KD_PERUM']; ?>"><b><?php echo substr($row['NAMA_PERUM'], 0, 35); if(strlen($row['NAMA_PERUM'])>35) echo  "..." ?></b></a>
                  </h3>
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