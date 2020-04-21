

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
                            <strong>Insert Sukses!</strong> Penambahan data slider berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan slider baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan slider berhasil.
                        </div>
                        
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data slider berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Slider</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                         
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Slider</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
               <div class="streaming-table">
                    <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Slider</a>
                  </div>
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="buku" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                        <th><span>Kode Slider</span></th>
                                             <th><span>Judul</span></th>
                                             <th><span>Keterangan</span></th>
                                             <th><span>Gambar</span></th>
                                             <th><span>Urutan</span></th>
                                             <th><span>Operasi</span></th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                             
                                          $query = mysqli_query($konek, "SELECT *
                                          FROM slider");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                            
                                        <td><?php echo $data['KD_SLIDER']; ?></td>
                                            <td><?php echo $data['JUDUL']; ?></td>
                                            <td><?php echo $data['KETERANGAN']; ?></td>
                                       

                                                <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['GAMBAR_SLIDER']; ?>">
                                                    <img src="../../home/img/<?php echo $data['GAMBAR_SLIDER']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td><?php echo $data['URUTAN']; ?></td>
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['KD_SLIDER']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#myModal1<?php echo $data['KD_SLIDER']; ?>" class="c-btn small red-bg buzz delete_button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                    
     
     <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['KD_SLIDER']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Slider</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/slider/editslider.php" method="post" enctype="multipart/form-data">
                        <?php
                        
                        $KD_SLIDER = $data['KD_SLIDER']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM slider WHERE KD_SLIDER='$KD_SLIDER'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_SLIDER" value="<?php echo $row['KD_SLIDER']; ?>">
                        <div class="form-group">
                          <label>Judul</label>
                          <input type="text" name="JUDUL" class="form-control" value="<?php echo $row['JUDUL']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" name="KETERANGAN" class="form-control" value="<?php echo $row['KETERANGAN']; ?>">      
                        </div>
                     
                        <div class="form-group">
                        <label>Gambar</label>
			                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah gambar<br>
			                      <input type="file" name="GAMBAR_SLIDER" class="form-control"> 
                          </div>
                          <div class="form-group">
                          <label>Urutan</label>
                          <input type="text" name="URUTAN" class="form-control" value="<?php echo $row['URUTAN']; ?>">      
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

     <div class="modal fade" tabindex="-3" id="myModal1<?php echo $data['KD_SLIDER']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Slider</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/slider/delslider.php" method="get">
            <?php
                        
                        $KD_SLIDER = $data['KD_SLIDER']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM slider WHERE KD_SLIDER='$KD_SLIDER'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_SLIDER" value="<?php echo $row['KD_SLIDER']; ?>">
                        <div class="form-group">
                          <label>Judul</label>
                          <input type="text" name="JUDUL" class="form-control" readonly value="<?php echo $row['JUDUL']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>keterangan</label>
                          <input type="text" name="KETERANGAN" class="form-control" readonly value="<?php echo $row['KETERANGAN']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Urutan</label>
                          <input type="text" name="URUTAN" class="form-control" readonly value="<?php echo $row['URUTAN']; ?>">      
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
                <form action="pages/slider/tamslider.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                  

                    <div class="form-group">
                        <label for="JUDUL">Judul</label>
                        <input type="text" name="JUDUL" placeholder="Masukkan judul" class="form-control">
                     </div>
                        <div class="form-group">
                         <label for="KETERANGAN">Keterangan</label>
                            <input type="text" name="KETERANGAN" placeholder="Masukkan keterangan" class="form-control">
                     </div>
                     

                     <div class="form-group">
                            <label for="GAMBAR_SLIDER">Gambar</label>
                            <input type="file" id="GAMBAR_SLIDER" name="GAMBAR_SLIDER" class="form-control" required>
                        </div>
                        <div class="form-group">
                         <label for="URUTAN">Urutan</label>
                            <input type="text" name="URUTAN" placeholder="Masukkan urutan" class="form-control">
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
      
