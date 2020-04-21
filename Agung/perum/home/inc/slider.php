<?php
    $slider = "SELECT * FROM slider ORDER BY urutan";
    $result = mysqli_query($konek, $slider);
?>
<!-- Hero Slider -->
    <section class="section-wrap nopadding">
      <div class="container">
        <div class="entry-slider">
          <div class="flexslider" id="flexslider-hero">
            <ul class="slides clearfix">
            <?php
                $i=1; 
                while($row=mysqli_fetch_assoc($result)){ 
            ?>
              <li>
                <img src="img/<?php echo $row['GAMBAR_SLIDER']; ?>" alt="" style="height:536px; width:100%">
                <div class="img-holder img-<?php echo $row['GAMBAR_SLIDER']; ?>"></div>
                <div class="hero-holder text-center right-align">
                  <div>
                    <h1 class="hero-heading white"><?php echo $row['JUDUL']; ?></h1>
                    <h4 class="hero-subheading white uppercase"><?php echo $row['KETERANGAN']; ?></h4>
                  </div>
                </div>
              </li>
            <?php $i++; } ?>
            </ul>
          </div>
        </div> <!-- end slider -->
      </div>
    </section> <!-- end hero slider -->