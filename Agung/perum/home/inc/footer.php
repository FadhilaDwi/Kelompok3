<?php 
  $katfoot="SELECT * FROM perum ORDER BY NAMA_PERUM LIMIT 6";
  $rsKatFoot=mysqli_query($konek, $katfoot);
?>
<!-- Footer Type-1 -->
    <footer class="footer footer-type-1 bg-dark">
      <div class="container">
        <div class="footer-widgets top-bottom-dividers pb-mdm-20">
          <div class="row">

            <div class="col-md-3 col-sm-4 col-xs-4 col-xxs-12">
              <div class="widget footer-links">
                <h5 class="widget-title uppercase">Informasi</h5>
                <ul class="list-no-dividers">
                  <li><a href="?p=about">Tentang Kami</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-4 col-xxs-12">
              <div class="widget footer-links">
                <h5 class="widget-title uppercase">Bantuan</h5>
                <ul class="list-no-dividers">                  
                  <li><a href="?p=contact">Kontak Kami</a></li>
                  <li><a href="?p=faq">F.A.Q</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-4 col-xxs-12">
              <div class="widget footer-links">
                <h5 class="widget-title uppercase">Perumahan</h5>
                <ul class="list-no-dividers">
                  <?php while($row=mysqli_fetch_assoc($rsKatFoot)){ ?>
                    <li><a href="?p=buku&KD_PERUM=<?php echo $row['KD_PERUM']; ?>&halaman=1"><?php echo $row['NAMA_PERUM']; ?></a></li>
                  <?php } ?>
                  <li>.........</li>
                </ul>
              </div>
            </div>              

            <div align="justify" class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                <h5 class="widget-title uppercase">tentang kami</h5>
                <p class="mb-0">
                carirumah.com adalah situs web untuk mencari perumahan. Terdapat fitur login untuk customer dan developer. Dalam situs carirumah.com, user dapat melakukan diskusi, review, dan report. Untuk membeli perumahan, situs ini menyediakan kontak developer perumahan. Jadi, dapat memudahkan customer dalam melakukan transaksi pembelian.
                </p>
              </div>
            </div>

       

          </div>
        </div>    
      </div> <!-- end container -->

      <div class="bottom-footer bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 copyright sm-text-center">
              <span>
                &copy; 2019 carirumah.com | By Kelompok 4
              </span>
            </div>

            <div class="col-sm-4 text-center">
              <div id="back-to-top">
                <a href="#top">
                  <i class="fa fa-angle-up"></i>
                </a>
              </div>
            </div>

            <!--<div class="col-sm-4 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
              <i class="fa fa-cc-paypal"></i>
              <i class="fa fa-cc-visa"></i>
              <i class="fa fa-cc-mastercard"></i>
              <i class="fa fa-cc-discover"></i>
              <i class="fa fa-cc-amex"></i>
            </div>-->
          </div>
        </div>
      </div> <!-- end bottom footer -->
    </footer> <!-- end footer -->