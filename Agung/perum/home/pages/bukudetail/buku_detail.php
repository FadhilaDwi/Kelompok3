
<?php

    $KD_CLUSTER = $_GET['KD_CLUSTER'];
 

    $queryProduct = "SELECT *
    FROM cluster
    INNER JOIN perum
    ON cluster.KD_PERUM=perum.KD_PERUM
    INNER JOIN pt
    ON perum.KD_PT=pt.KD_PT
    INNER JOIN user
    ON pt.USERNAME=user.USERNAME
    INNER JOIN marketing
    ON user.USERNAME=marketing.USERNAME
    WHERE cluster.KD_CLUSTER=$KD_CLUSTER";
    
    $rsProduct = mysqli_query($konek, $queryProduct);
     $row = mysqli_fetch_assoc($rsProduct);
     

     $queryProduct13 = "SELECT *
    FROM cluster
    INNER JOIN perum
    ON cluster.KD_PERUM=perum.KD_PERUM
    INNER JOIN pt
    ON perum.KD_PT=pt.KD_PT
    INNER JOIN user
    ON pt.USERNAME=user.USERNAME
    INNER JOIN marketing
    ON user.USERNAME=marketing.USERNAME
    WHERE cluster.KD_CLUSTER=$KD_CLUSTER";
    
    $rsProduct13 = mysqli_query($konek, $queryProduct13);

    $queryKomentar = "SELECT diskusi.KD_DIS, diskusi.ISI_DIS, diskusi.TGLWAKTU_DIS, user.USERNAME, user.USERNAME, user.STATUS, perum.KD_PERUM, perum.NAMA_PERUM, cluster.KD_CLUSTER, cluster.NAMA_CLUSTER, cluster.GAMBAR, cluster.GAMBAR1, cluster.GAMBAR2,  pt.KD_PT, pt.NAMA_PT
    FROM diskusi
    INNER JOIN cluster
    ON diskusi.KD_CLUSTER=cluster.KD_CLUSTER
    INNER JOIN perum
    ON cluster.KD_PERUM=perum.KD_PERUM
    INNER JOIN pt
    ON perum.KD_PT=pt.KD_PT
    INNER JOIN user
    ON diskusi.USERNAME=user.USERNAME
    WHERE diskusi.KD_CLUSTER=$KD_CLUSTER";
    $rsKomentar = mysqli_query($konek, $queryKomentar);

    $queryReview = "SELECT *
    FROM review
    INNER JOIN cluster
    ON review.KD_CLUSTER=cluster.KD_CLUSTER
    WHERE review.KD_CLUSTER=$KD_CLUSTER";
    $rsReview = mysqli_query($konek, $queryReview);
    $query=  "SELECT AVG(RATING) FROM review WHERE KD_CLUSTER='$KD_CLUSTER'";
    $rsq= mysqli_query($konek, $query);

    $c=array();
    $s='{0}';
    $q="SELECT * 
    FROM diskusi INNER JOIN cluster
    ON diskusi.KD_CLUSTER=cluster.KD_CLUSTER
    WHERE diskusi.KD_CLUSTER=$KD_CLUSTER ";
    $k=mysqli_query($konek, $q);

?>
<!-- Breadcrumbs -->
    <div class="container">
      <ol class="breadcrumb">
        <li>=
          <a href="index.php">Beranda</a>
        </li>
        <li>
          <a href="?p=buku&halaman=1">Cluster</a>
        </li>
        <li class="active">
          <?php echo $row['NAMA_CLUSTER']; ?>
        </li>
      </ol> <!-- end breadcrumbs -->
    </div>

    <!-- Single Product -->
    <section class="section-wrap single-product">
      <div class="container relative">
        <div class="row">
        <?php 
            if(isset($_GET['a'])){ 
                $alert = $_GET['a'];
                if ($alert=='komentar_sukses'){
        ?>
        <div class="col-sm-12 col-xs-12">
            <div class="alert alert-success fade in alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Komentar Anda telah ditambahkan
            </div>
        </div>
            <?php } else { ?>
        <div class="col-sm-12 col-xs-12">
            <div class="alert alert-danger fade in alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Gagal!</strong> Komentar Anda gagal ditambahkan
            </div>
        </div>
        <?php } } ?>

          <div class="col-sm-6 col-xs-12 mb-60">

            <div class="flickity  mfp-hover" id="gallery-main">

              <div class="gallery-cell">
                <a href="img/<?php echo $row['GAMBAR']; ?>" class="lightbox-img">
                  <img src="img/<?php echo $row['GAMBAR']; ?>" alt="" />
                  
                </a>
                </div>
                <div class="gallery-cell">
                <a href="img/<?php echo $row['GAMBAR1']; ?>" class="lightbox-img">
                  <img src="img/<?php echo $row['GAMBAR1']; ?>" alt="" />
                  
                </a>
                </div>
                <div class="gallery-cell">
                <a href="img/<?php echo $row['GAMBAR2']; ?>" class="lightbox-img">
                  <img src="img/<?php echo $row['GAMBAR2']; ?>" alt="" />
                  
                </a>
              </div>
              
            </div> <!-- end gallery main -->

          </div> <!-- end col img slider -->

          <div class="col-sm-6 col-xs-12 product-description-wrap">
            <h1 class="product-title"><?php echo $row['NAMA_CLUSTER']; ?></h1>
            <span>
            <?php 
            while ($data = mysqli_fetch_assoc($rsq))
{
    ?>
            <?php 
                $x = $data['AVG(RATING)'];
                $j = 5-$x;
                for ($i=0; $i<$x ; $i++) {
            ?>
              <span class="icon_star" style="color:#f39c12;"></span>
            <?php } for ($i=0; $i<$j ; $i++) { ?>
              <span class="icon_star_alt" style="color:#f39c12;"></span>
            <?php } }?>
            </span>
            <span class="price">
              <ins>
                <span class="ammount text-danger">
                    <?php
                        $harga = number_format($row['HARGA'], 2, ",", ".");
                        echo "Rp.".$harga;
                    ?>
                </span>
              </ins>
            </span>
            

            <div class="product_meta">
                <table class="table table-hover table-responsive">
                   <tr>
                        <td width="5px"><span class="fa fa-building"></span></td>
                        <td><span class="sku">LOKASI</td>
                        <td><?php echo $row['LOKASI']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"><span class="icon_book"></span></td>
                        <td><span class="sku">TIPE</td>
                        <td><?php echo $row['TIPE']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"><span class="icon_documents"></span></td>
                        <td><span class="tagged_as">LUAS TANAH</td>
                        <td><?php echo $row['LUAS_TANAH']; ?> </span></td>
                    </tr>
                    <tr>
                        <td width="5px"><span class="icon_printer-alt"></span></td>
                        <td><span class="posted_in">STOK</td>
                        <td><?php echo $row['STOK']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"><span class="icon_briefcase"></span></td>
                        <td><span class="posted_in">NAMA PT</td>
                        <td><?php echo $row['NAMA_PT']; ?></a></span></td>
                    </tr>
                    <tr>
                        <td width="5px"><span class="fa fa-home"></span></td>
                        <td><span class="posted_in">NAMA PERUM</td>
                        <td><a href="?p=buku&KD_PERUM=<?php echo $row['KD_PERUM'] ?>&halaman=1" target="_blank">
                            <?php echo $row['NAMA_PERUM']; ?></a></span></td>
                    </tr>
                   
                    <?php
                    while ($data = mysqli_fetch_assoc($rsProduct13))
{
    ?>              <tr>
 
                        <td width="5px"><span class="fa fa-phone"></span></td>
                        <td><span class="posted_in">KONTAK</td>
                        <td> <?php echo $data['NO_TELEPON']; ?></a></span></td>
                        <td> <?php echo $data['NAMA']; ?></a></span></td>
                                   
                    </tr>
                    <?php } ?>       
                    
                </table>
                <!-- tabs -->
                <div class="row">
                <div class="col-md-12">
                    <div class="tabs tabs-bb">
                    <ul class="nav nav-tabs">                                 
                        <li class="active">
                        <a href="#tab-description" data-toggle="tab">Fasilitas</a>
                        </li>    
                        <li>
                        <a href="#tab-reviews" data-toggle="tab">Diskusi</a>
                        </li>                               

                        <li >
                        <a href="#tab-ulasan" data-toggle="tab">Review</a>
                        </li>                                  
                      
                                           
                    </ul> <!-- end tabs -->
                    
                    <!-- tab content -->
                    <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab-description">
                        <p align="justify">
                            <?php echo htmlspecialchars_decode(stripcslashes($row['FASILITAS'])); ?>
                        </p>
                        </div>     
 
                        
<div class="tab-pane fade" id="tab-reviews">

<div class="reviews">
    <ul class="reviews-list">
    <form action="lib/proses.php" name="komentar" method="post">
    <div align="right" class="streaming-table">
    
     </div>
        </form> 
        
    <?php if(mysqli_num_rows($rsKomentar)==0) { ?>
        <div class="review-body">
        <div class="review-content">
            <h3 class="text-center">Belum ada diskusi</h3>
        </div>
        </div>
        <?php 
        } else { 

while($r=mysqli_fetch_assoc($k)) {
  $t='';
  if(!isset($c[$r['KD_DISP']])) {$t='<div>';$c[$r['KD_DISP']]='{'.$r['KD_DISP'].'}';}
  $s=str_replace('{'.$r['KD_DISP'].'}',$t.'<div><div> <strong>'.$r['USERNAME'].'</strong><small><i> - '.$r['TGLWAKTU_DIS'].'</i></small> </div> </br> '.$r['ISI_DIS'].' <div align=right></br> </br>{'.$r['KD_DIS'].'}</div>{'.$r['KD_DISP'].'} </div>',$s);
}
$s=str_replace($c,'</div>',$s);
$s=preg_replace('/\{\d+\}/','',$s);
echo $s;

        }
    ?>
   
    </ul>    
         
</div> <!--  end reviews -->
</div> 


<div class="tab-pane fade" id="tab-ulasan">

<div class="ulasan">
    <ul class="ulasan-list">
    <?php if(mysqli_num_rows($rsReview)==0) { ?>
        <div class="ulasan-body">
        <div class="ulasan-content">
            <h3 class="text-center">Belum ada review</h3>
        </div>
        </div>
    <?php 
        } else { 
            while($row1=mysqli_fetch_assoc($rsReview)){ 
    ?>
    
    <li>
        <div class="ulasan-body">
        <div class="ulasan-content">
            <p class="ulasan-author"><strong><?php echo $row1['USERNAME']; ?></strong><small><i> - <?php echo $row1['TGLWAKTU_REV']; ?></i> </small></p>
            <p align="justify">
             
            <td>
                                                <?php 
                                                    $x = $row1['RATING'];
                                                    $j = 5-$x;
                                                    for ($i=0; $i<$x ; $i++) {
                                                ?>
                                                <i class="fa fa-star" style="color:#f39c12;"></i>
                                                <?php } for ($i=0; $i<$j ; $i++) { ?>
                                                <i class="fa fa-star-o" style="color:#f39c12;"></i>
                                                <?php } ?>
                                            </td>
                                                </br></br>
              <?php
                     echo $row1['ISI_REV'];
                     
                ?>
                </br></br>
                <td>
                     <a data-fancybox="gallery" href="../home/img/<?php echo $row1['FOTO_REV']; ?>">
                      <img src="../home/img/<?php echo $row1['FOTO_REV']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                        </a>
                          </td>
            </p>
        </div>
        </div>
    </li>
    <br><hr><br>
    <?php  }} ?>
    </ul>         
</div>


                        </div>
                      
                    </div> <!-- end tab content -->

                    </div>
                </div> <!-- end tabs -->
                </div> <!-- end row -->
            </div>

          </div> <!-- end col product description -->
        </div> <!-- end row -->

                                  
        
      </div> <!-- end container -->
    </section> <!-- end single product -->