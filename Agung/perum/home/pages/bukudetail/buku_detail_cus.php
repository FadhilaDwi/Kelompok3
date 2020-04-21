
<?php

    $KD_CLUSTER = $_GET['KD_CLUSTER'];
    $USERNAME=$_SESSION['USERNAME'];
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
    $queryKomentar = "SELECT diskusi.KD_DIS, diskusi.ISI_DIS, diskusi.TGLWAKTU_DIS, user.USERNAME, user.USERNAME, user.STATUS, perum.KD_PERUM, perum.NAMA_PERUM, cluster.KD_CLUSTER, cluster.NAMA_CLUSTER, cluster.GAMBAR, pt.KD_PT, pt.NAMA_PT
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

    $queryReview = "SELECT review.KD_REV, review.ISI_REV, review.TGLWAKTU_REV, review.RATING, review.FOTO_REV, user.USERNAME, user.USERNAME, user.STATUS, perum.KD_PERUM, perum.NAMA_PERUM, cluster.KD_CLUSTER, cluster.NAMA_CLUSTER, cluster.GAMBAR, pt.KD_PT, pt.NAMA_PT
    FROM review
    INNER JOIN cluster
    ON review.KD_CLUSTER=cluster.KD_CLUSTER
    INNER JOIN perum
    ON cluster.KD_PERUM=perum.KD_PERUM
    INNER JOIN pt
    ON perum.KD_PT=pt.KD_PT
    INNER JOIN user
    ON review.USERNAME=user.USERNAME
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
          <a href="index_customer.php">Beranda</a>
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
<d3 ><a href="#" data-toggle="modal" data-target=".tambah" class="fa fa-flag" > Laporkan iklan </a></d3>

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
                        <li >
                        <a href="#tab-chat" data-toggle="tab">Chat</a>
                        </li> 
                                           
                    </ul> <!-- end tabs -->
                    
                    <!-- tab content -->
                    <div class="tab-content">

                        
                    <div class="tab-pane fade in active" id="tab-description">
                        <p align="justify">
                            <?php echo htmlspecialchars_decode(stripcslashes($row['FASILITAS'])); ?>
                        </p>
                        </div>     
                 
                        <div class="tab-pane fade" id="tab-chat">
                    <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <input name="USERNAME" type="hidden" value="<?php echo $_SESSION['USERNAME']; ?>">
                    <input name="KD_CLUSTER" type="hidden" value="<?php echo $_GET['KD_CLUSTER']; ?>">
                        <?php
                    $query_edit = mysqli_query($konek, "SELECT * FROM cluster
                    INNER JOIN perum
                    ON cluster.KD_PERUM=perum.KD_PERUM
                    INNER JOIN pt
                    ON perum.KD_PT=pt.KD_PT
                    INNER JOIN user
                    ON pt.USERNAME=user.USERNAME
                    INNER JOIN marketing
                    ON user.USERNAME=marketing.USERNAME
                    WHERE cluster.KD_CLUSTER=$KD_CLUSTER");
                        //$result = mysqli_query($conn, $query);
                        while ($row123 = mysqli_fetch_array($query_edit)) {  
                        ?>
               
                    
                    <input name="PENERIMA" type="hidden" value="<?php echo $row123['USERNAME']; ?>">
                    
                    <?php }?> 
                        <center><label for="ISI_CHAT">Masukkan Isi Chat</label></center>
                        </br>
                        <textarea type="text" name="ISI_CHAT" placeholder="Masukkan isi chat" class="form-control"></textarea>
                     </div>
                <div align="center" class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md" name="chat3">Kirim Chat</button>
                
                </div>
                </div>
               
</form>
                                    
                 

 
<div class="tab-pane fade" id="tab-reviews">

<div class="reviews">
    <ul class="reviews-list">
    <form action="lib/proses.php" name="komentar" method="post">
    <div align="right" class="streaming-table">
    <a href="#" data-toggle="modal" data-target=".tambah1" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Diskusi</a>
     </div>
        </form> 
        </br>
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
    <form action="lib/proses.php" name="ulasan" method="post">
    <div align="right" class="streaming-table">
                            <a href="#" data-toggle="modal" data-target=".tambah2" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Review</a>
                             </div>
                                </form>
                                </br>
    <?php if(mysqli_num_rows($rsReview)==0) { ?>
        <div class="ulasan-body">
        <div class="ulasan-content">
            <h3 class="text-center">Belum ada review </h3>
        </div>
        </div>
    <?php 
        } else { 
            while($row1=mysqli_fetch_assoc($rsReview)){ 
    ?>
    
    <li>
        <div class="ulasan-body">
        <div class="ulasan-content">
            <p class="ulasan-author"><strong><?php echo $row1['USERNAME']; ?></strong><i><small> - <?php echo $row1['TGLWAKTU_REV']; ?></small></i></p>
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
    <div class="modal fade tambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Laporkan Iklan ini</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <input name="KD_CLUSTER" type="hidden" value="<?php echo $_GET['KD_CLUSTER']; ?>">
                    <input name="USERNAME" type="hidden" value="<?php echo $_SESSION['USERNAME']; ?>">

                    
                    <div class="form-group">
                        <label for="ISI_REP">Isi Laporan</label>
                        <textarea type="text" name="ISI_REP" placeholder="Masukkan isi laporan" class="form-control"></textarea>
                     </div>
                        
            <div class="modal-footer">
                <div align="center" class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md" name="report3">Kirim Laporan</button>
                
                </div>
                </div>
                </div>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>

    <div class="modal fade tambah1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Diskusi</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="form-group">
                    <input name="USERNAME" type="hidden" value="<?php echo $_SESSION['USERNAME']; ?>">
                    <input name="KD_CLUSTER" type="hidden" value="<?php echo $_GET['KD_CLUSTER']; ?>">
                        <?php
                    $query_edit = mysqli_query($konek, "SELECT * FROM cluster
                    INNER JOIN perum
                    ON cluster.KD_PERUM=perum.KD_PERUM
                    INNER JOIN pt
                    ON perum.KD_PT=pt.KD_PT
                    INNER JOIN user
                    ON pt.USERNAME=user.USERNAME
                    INNER JOIN marketing
                    ON user.USERNAME=marketing.USERNAME
                    WHERE cluster.KD_CLUSTER=$KD_CLUSTER");
                        //$result = mysqli_query($conn, $query);
                        while ($row123 = mysqli_fetch_array($query_edit)) {  
                        ?>
               
                    
                    <input name="PENERIMA" type="hidden" value="<?php echo $row123['USERNAME']; ?>">
                    
                    <?php }?> 
                    
                    <div class="form-group">
                        <label for="ISI_DIS">Isi Diskusi</label>
                        <textarea type="text" name="ISI_DIS" placeholder="Masukkan isi diskusi" class="form-control"></textarea>
                     </div>
                        
            <div class="modal-footer">
                <div align="center" class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md" name="komentar3">Kirim Diskusi</button>
                
                </div>
                </div>
                </div>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>

    <div class="modal fade tambah2" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Review</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="form-group">
                    <input name="USERNAME" type="hidden" value="<?php echo $_SESSION['USERNAME']; ?>">
                    <input name="KD_CLUSTER" type="hidden" value="<?php echo $_GET['KD_CLUSTER']; ?>">
                        <?php
                    $query_edit = mysqli_query($konek, "SELECT * FROM cluster
                    INNER JOIN perum
                    ON cluster.KD_PERUM=perum.KD_PERUM
                    INNER JOIN pt
                    ON perum.KD_PT=pt.KD_PT
                    INNER JOIN user
                    ON pt.USERNAME=user.USERNAME
                    INNER JOIN marketing
                    ON user.USERNAME=marketing.USERNAME
                    WHERE cluster.KD_CLUSTER=$KD_CLUSTER");
                        //$result = mysqli_query($conn, $query);
                        while ($row123 = mysqli_fetch_array($query_edit)) {  
                        ?>
               
                    
                    <input name="PENERIMA" type="hidden" value="<?php echo $row123['USERNAME']; ?>">
                    
                    <?php }?> 
                    
                    <div class="form-group">
                        <label for="ISI_REV">Isi Review</label>
                        <textarea type="text" name="ISI_REV" placeholder="Masukkan isi review" class="form-control"></textarea>
                     </div>
                     <div class="form-group">
                            <label for="RATING">Rating</label>
                            <select name="RATING" id="RATING" class="form-control" style="font-family:'FontAwesome', Arial; color:#f39c12;">
                                <option value="0">
                                    &#xf006;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="1">
                                    &#xf005;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="2">
                                    &#xf005;&#xf005;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="3">
                                    &#xf005;&#xf005;&#xf005;&#xf006;&#xf006;
                                </option>
                                <option value="4">
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf006;
                                </option>
                                <option value="5">
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf005;
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="FOTO_REV">Foto Review</label>
                            <input type="file" id="FOTO_REV" name="FOTO_REV" class="form-control">
                        </div>
            <div class="modal-footer">
                <div align="center" class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md" name="ulasan3">Kirim Review</button>
                
                </div>
                </div>
                </div>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>