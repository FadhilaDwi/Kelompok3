

<body>
  <?php
  include 'lib/koneksi.php';
  ?>

<div class="panel-content">
          <div class="main-title-sec">
               <div class="row">
                   <div class="col-md-12 column">
                       <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='insert_sukses'){
                        ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Sukses!</strong> Penambahan data review baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data review baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data review berhasil.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data review berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Review</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                             
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Review</li>
          </ul>
          <div class="main-content-area">
               <div class="row">

              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="buku" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                            
                                        <th>Kode Review</th>
                                          <th>Username</th>
                                          <th>Status</th>
                                          <th>Isi Review</th>
                                          <th>Nama Perumahan</th>
                                          <th>Nama Cluster</th>
                                          <th>Tanggal Review</th>
                                          <th>Foto Review</th>
                                          <th>Rating</th>
                                          <th>Hapus Review</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                             
                                          $query = mysqli_query($konek, "SELECT *
                                          FROM review
                                          INNER JOIN cluster
                                          ON review.KD_CLUSTER=cluster.KD_CLUSTER
                                          INNER JOIN perum
                                          ON cluster.KD_PERUM=perum.KD_PERUM
                                          INNER JOIN user
                                          ON user.USERNAME=review.USERNAME
                                          WHERE review.USERNAME='$USERNAME'");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                        <td><?php echo $data['KD_REV']; ?></td>
                                        <td><?php echo $data['USERNAME']; ?></td>
                                        <td><?php echo $data['STATUS']; ?></td>
                                            
                                            <td>
                                                <?php
                                                    $text = $data['ISI_REV'];
                                                    $strip = strip_tags(stripcslashes($text), '<a>');
                                                    // echo $strip;
                                                ?>
                                                <div role="alert" class="alert color skyblue-bg">
                                                    <?php
                                                        echo substr($strip, 0, 80);
                                                        if(strlen(trim($strip))>80) echo " [...]";
                                                    ?>
                                                </div>
                                            </td>
                                            <td><?php echo $data['NAMA_PERUM']; ?></td>
                                            <td><?php echo $data['NAMA_CLUSTER']; ?></td>
                                            <td><?php echo $data['TGLWAKTU_REV']; ?></td>
                                            <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['FOTO_REV']; ?>">
                                                    <img src="../../home/img/<?php echo $data['FOTO_REV']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td>
                                                <?php 
                                                    $x = $data['RATING'];
                                                    $j = 5-$x;
                                                    for ($i=0; $i<$x ; $i++) {
                                                ?>
                                                <i class="fa fa-star" style="color:#f39c12;"></i>
                                                <?php } for ($i=0; $i<$j ; $i++) { ?>
                                                <i class="fa fa-star-o" style="color:#f39c12;"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['KD_REV']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#myModal1<?php echo $data['KD_REV']; ?>" class="c-btn small red-bg buzz delete_button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                    
     
     <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['KD_REV']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Review</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/review/editrev.php" method="post" enctype="multipart/form-data">
            <?php
                        $KD_REV = $data['KD_REV']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM review
                        INNER JOIN user
                        ON review.USERNAME=user.USERNAME
                        INNER JOIN cluster
                        ON review.KD_CLUSTER=cluster.KD_CLUSTER
                        INNER JOIN perum
                        ON cluster.KD_PERUM=perum.KD_PERUM
                        WHERE KD_REV='$KD_REV'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="KD_REV" value="<?php echo $row['KD_REV']; ?>">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="USERNAME" class="form-control" readonly value="<?php echo $row['USERNAME']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" name="STATUS" class="form-control" readonly value="<?php echo $row['STATUS']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Isi Review</label>
                          <textarea type="text" name="ISI_REV" class="form-control" readonly ><?php echo $row['ISI_REV']; ?></textarea>      
                        </div>
                        <div class="form-group">
                          <label>Nama Perumahan</label>
                          <input type="text" name="NAMA_PERUM" class="form-control" readonly value="<?php echo $row['NAMA_PERUM']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Nama Cluster</label>
                          <input type="text" name="NAMA_CLUSTER" class="form-control" readonly value="<?php echo $row['NAMA_CLUSTER']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Tanggal & Waktu Review</label>
                          <input type="text" name="TGLWAKTU_REV" class="form-control" readonly value="<?php echo $row['TGLWAKTU_REV']; ?>">      
                        </div>
                        <div class="form-group">
                        <label>Foto Review</label>
			                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			                      <input type="file" name="FOTO_REV" class="form-control"> 
                          </div>
                          <div class="form-group">
                            <label for="RATING">Rating</label>
                            <select name="RATING" id="RATING" class="form-control" style="font-family:'FontAwesome', Arial; color:#f39c12;">
                                
                                <option value=""<?php if( $row['RATING'] == ''){ echo 'selected';}  ?>>
                                    &#xf006;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="1"  <?php if( $row['RATING'] == '1'){ echo 'selected';}  ?>>
                                    &#xf005;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="2" <?php if( $row['RATING'] == '2'){ echo 'selected';}  ?>>
                                    &#xf005;&#xf005;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="3"  <?php if( $row['RATING'] == '3'){ echo 'selected';}  ?>>
                                    &#xf005;&#xf005;&#xf005;&#xf006;&#xf006;
                                </option>
                                <option value="4" <?php if( $row['RATING'] == '4'){ echo 'selected';}  ?>>
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf006;
                                </option>
                                <option value="5" <?php if( $row['RATING'] == '5'){ echo 'selected';}  ?>>
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf005;
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>

     <div class="modal fade" tabindex="-3" id="myModal1<?php echo $data['KD_REV']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Review</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/review/delrev.php" method="get">
            <?php
                        $KD_REV = $data['KD_REV']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM review
                        INNER JOIN user
                        ON review.USERNAME=user.USERNAME
                        INNER JOIN cluster
                        ON review.KD_CLUSTER=cluster.KD_CLUSTER
                        INNER JOIN perum
                        ON cluster.KD_PERUM=perum.KD_PERUM
                        WHERE KD_REV='$KD_REV'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="KD_REV" value="<?php echo $row['KD_REV']; ?>">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="USERNAME" class="form-control" readonly value="<?php echo $row['USERNAME']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" name="STATUS" class="form-control" readonly value="<?php echo $row['STATUS']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Isi Review</label>
                          <input type="text" name="ISI_REV" class="form-control" readonly value="<?php echo $row['ISI_REV']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Nama Perumahan</label>
                          <input type="text" name="NAMA_PERUM" class="form-control" readonly value="<?php echo $row['NAMA_PERUM']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Nama Cluster</label>
                          <input type="text" name="NAMA_CLUSTER" class="form-control" readonly value="<?php echo $row['NAMA_CLUSTER']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Tanggal & Waktu Review</label>
                          <input type="text" name="TGLWAKTU_REV" class="form-control" readonly value="<?php echo $row['TGLWAKTU_REV']; ?>">      
                        </div>
                        <p>Apakah Anda yakin akan menghapus data di atas?</p>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Delete</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>

           
            <?php               
          } 
          ?>
        </tbody>
      </table>   
      <div class="modal fade tambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Perumahan</h4>
            </div>
            <div class="modal-body">
                <form action="pages/perum/tamperum.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                  
                    <div class="form-group">
                            <label for="KD_PT"> Nama PT</label>
                            <select name="KD_PT" id="KD_PT" class="form-control">
                                <?php 
                                    $kat=mysqli_query($konek, "SELECT *
                                    FROM pt
                                    INNER JOIN user
                                    ON pt.USERNAME=user.USERNAME
                                    WHERE user.USERNAME='$USERNAME'");
                                    while($data=mysqli_fetch_assoc($kat)){ ?>
                                    <option value="<?php echo $data['KD_PT']; ?>" id="<?php echo $data['KD_PT']; ?>"><?php echo $data['NAMA_PT']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="NAMA_PERUM">Nama Perumahan</label>
                        <input type="text" name="NAMA_PERUM" placeholder="Masukkan nama perumahan" class="form-control">
                     </div>
                        <div class="form-group">
                         <label for="LOKASI">Lokasi</label>
                            <input type="text" name="LOKASI" placeholder="Masukkan lokasi" class="form-control">
                     </div>
                     <div class="form-group">
                            <label for="GAMBAR_PERUM">Gambar</label>
                            <input type="file" id="GAMBAR_PERUM" name="GAMBAR_PERUM" class="form-control" required>
                        </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-success">Tambah</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>
      
      </body>

</html>
      
