

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
                            <strong>Insert Sukses!</strong> Penambahan data perumahan baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data perumahan baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data perumahan berhasil.
                        </div>
                        
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data perumahan berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Perumahan</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                         
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Perumahan</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
               <div class="streaming-table">
                    <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Perumahan</a>
                  </div>
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="buku" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                            
                                        <th>Kode Perumahan</th>
                                        <th>Nama PT</th>
                                          <th>Nama Perumahan</th>
                                          <th>Lokasi</th>
                                          <th>Gambar</th>
                                          <th>Operasi</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                             
                                          $query = mysqli_query($konek, "SELECT pt.KD_PT, pt.NAMA_PT, perum.KD_PERUM, perum.NAMA_PERUM, perum.LOKASI, perum.GAMBAR_PERUM, user.USERNAME
                                          FROM perum
                                          INNER JOIN pt
                                          ON perum.KD_PT=pt.KD_PT
                                          INNER JOIN user
                                          ON pt.USERNAME=user.USERNAME");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                            
                                        <td><?php echo $data['KD_PERUM']; ?></td>
                                            <td><?php echo $data['NAMA_PT']; ?></td>
                                            <td><?php echo $data['NAMA_PERUM']; ?></td>
                                            <td><?php echo $data['LOKASI']; ?></td>
                                       

                                                <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['GAMBAR_PERUM']; ?>">
                                                    <img src="../../home/img/<?php echo $data['GAMBAR_PERUM']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['KD_PERUM']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#myModal1<?php echo $data['KD_PERUM']; ?>" class="c-btn small red-bg buzz delete_button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                    
     
     <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['KD_PERUM']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Perumahan</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/perum/editperum.php" method="post" enctype="multipart/form-data">
                        <?php
                        
                        $KD_PERUM = $data['KD_PERUM']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM perum WHERE KD_PERUM='$KD_PERUM'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_PERUM" value="<?php echo $row['KD_PERUM']; ?>">
                        <div class="form-group">
                          <label>Nama Perumahan</label>
                          <input type="text" name="NAMA_PERUM" class="form-control" value="<?php echo $row['NAMA_PERUM']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Lokasi</label>
                          <input type="text" name="LOKASI" class="form-control" value="<?php echo $row['LOKASI']; ?>">      
                        </div>
                     
                        <div class="form-group">
                        <label>Gambar</label>
			                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah gambar<br>
			                      <input type="file" name="GAMBAR_PERUM" class="form-control"> 
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

     <div class="modal fade" tabindex="-3" id="myModal1<?php echo $data['KD_PERUM']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Perumahan</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/perum/delperum.php" method="get">
            <?php
                        
                        $KD_PERUM = $data['KD_PERUM']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM perum WHERE KD_PERUM='$KD_PERUM'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_PERUM" value="<?php echo $row['KD_PERUM']; ?>">
                        <div class="form-group">
                          <label>Nama Perumahan</label>
                          <input type="text" name="NAMA_PERUM" class="form-control" readonly value="<?php echo $row['NAMA_PERUM']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Lokasi</label>
                          <input type="text" name="LOKASI" class="form-control" readonly value="<?php echo $row['LOKASI']; ?>">      
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
                                    ON pt.USERNAME=user.USERNAME");
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
      
