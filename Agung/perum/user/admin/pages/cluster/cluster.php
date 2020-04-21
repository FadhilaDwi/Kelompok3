

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
                            <strong>Insert Sukses!</strong> Penambahan data cluster baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data cluster baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data cluster berhasil.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data cluster berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Cluster</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                         
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Cluster</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
               <div class="streaming-table">
                    <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Cluster</a>
                  </div>
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="buku" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                            
                                        <th>Kode Cluster</th>
                                          <th>Nama Cluster </th>
                                          <th>Nama Perumahan </th>
                                          <th>Tipe</th>
                                          <th>Luas Tanah</th>
                                          <th>Stok</th>
                                          <th>Harga</th>
                                          <th>Fasilitas</th>
                                          <th>Gambar 1</th>
                                          <th>Gambar 2</th>
                                          <th>Gambar 3</th>
                                          <th>Operasi</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                          $query = mysqli_query($konek,  "SELECT *
                               FROM cluster 
                               INNER JOIN perum
                               ON cluster.KD_PERUM=perum.KD_PERUM
                               INNER JOIN pt
                               ON perum.KD_PT=pt.KD_PT
                               INNER JOIN user
                               ON pt.USERNAME=user.USERNAME");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                            
                                        <td><?php echo $data['KD_CLUSTER']; ?></td>
                                            <td><?php echo $data['NAMA_CLUSTER']; ?></td>
                                            <td><?php echo $data['NAMA_PERUM']; ?></td>
                                          
                                            <td><?php echo $data['TIPE']; ?></td>
                                            <td><?php echo $data['LUAS_TANAH']; ?></td>
                                            <td><?php echo $data['STOK']; ?></td>
                                            <td><?php echo $data['HARGA']; ?></td>
                                            <td><?php 
                                            $ringkas= $data['FASILITAS'];
                                            $sub_ringkas=substr($ringkas,0,30);
                                            echo $sub_ringkas;                                                                                   
                                            ?></td>
                                       

                                                <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['GAMBAR']; ?>">
                                                    <img src="../../home/img/<?php echo $data['GAMBAR']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['GAMBAR1']; ?>">
                                                    <img src="../../home/img/<?php echo $data['GAMBAR1']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td>
                                                <a data-fancybox="gallery" href="../../home/img/<?php echo $data['GAMBAR2']; ?>">
                                                    <img src="../../home/img/<?php echo $data['GAMBAR2']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['KD_CLUSTER']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#myModal1<?php echo $data['KD_CLUSTER']; ?>" class="c-btn small red-bg buzz delete_button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                    
     
     <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['KD_CLUSTER']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Cluster</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/cluster/editclus.php" method="post" enctype="multipart/form-data">
                        <?php
                        
                        $KD_CLUSTER = $data['KD_CLUSTER']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM cluster WHERE KD_CLUSTER='$KD_CLUSTER'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_CLUSTER" value="<?php echo $row['KD_CLUSTER']; ?>">
                        <div class="form-group">
                          <label>Nama Cluster</label>
                          <input type="text" name="NAMA_CLUSTER" class="form-control" value="<?php echo $row['NAMA_CLUSTER']; ?>">      
                        </div>
 
                        <div class="form-group">
                          <label>Tipe</label>
                          <input type="number" min="1" name="TIPE" class="form-control" value="<?php echo $row['TIPE']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Luas Tanah</label>
                          <input type="number" min="1" name="LUAS_TANAH" class="form-control" value="<?php echo $row['LUAS_TANAH']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Stok</label>
                          <input type="number" min="0" name="STOK" class="form-control" value="<?php echo $row['STOK']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" min="1" name="HARGA" class="form-control" value="<?php echo $row['HARGA']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Fasilitas</label>
                          <textarea type="text" name="FASILITAS" class="form-control" readonly ><?php echo $row['FASILITAS']; ?></textarea>          
                        </div>
                     
                        <div class="form-group">
                        <label>Gambar 1</label>
			                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah gambar<br>
                            <input type="file" name="GAMBAR" class="form-control"> 
                          </div>
                          <div class="form-group">
                          <label>Gambar 2</label>
			                    <input type="checkbox" name="ubah_foto1" value="true"> Ceklis jika ingin mengubah gambar<br>
                            <input type="file" name="GAMBAR1" class="form-control"> 
                          </div>
                          <div class="form-group">
                          <label>Gambar 3</label>
			                    <input type="checkbox" name="ubah_foto2" value="true"> Ceklis jika ingin mengubah gambar<br>
                            <input type="file" name="GAMBAR2" class="form-control"> 
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

     <div class="modal fade" tabindex="-3" id="myModal1<?php echo $data['KD_CLUSTER']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Cluster</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/cluster/delclus.php" method="get">
            <?php
                        
                        $KD_CLUSTER = $data['KD_CLUSTER']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM cluster WHERE KD_CLUSTER='$KD_CLUSTER'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        
                        <input type="hidden" name="KD_CLUSTER" value="<?php echo $row['KD_CLUSTER']; ?>">
                        <div class="form-group">
                          <label>Nama Cluster</label>
                          <input type="text" name="NAMA_CLUSTER" class="form-control" readonly value="<?php echo $row['NAMA_CLUSTER']; ?>">      
                        </div>
 
                        <div class="form-group">
                          <label>Tipe</label>
                          <input type="text" name="TIPE" class="form-control" readonly value="<?php echo $row['TIPE']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Luas Tanah</label>
                          <input type="text" name="LUAS_TANAH" class="form-control" readonly value="<?php echo $row['LUAS_TANAH']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Stok</label>
                          <input type="text" name="STOK" class="form-control" readonly value="<?php echo $row['STOK']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="HARGA" class="form-control" readonly value="<?php echo $row['HARGA']; ?>">      
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
                <h4 class="modal-title">Tambah Data Cluster</h4>
            </div>
            <div class="modal-body">
                <form action="pages/cluster/tamclus.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                  
                    <div class="form-group">
                            <label for="KD_PERUM"> Kode Perumahan</label>
                            <select name="KD_PERUM" id="KD_PERUM" class="form-control">
                                <?php 
                                    $kat=mysqli_query($konek, "SELECT *
                                    FROM user
                                     INNER JOIN pt
                                    ON pt.USERNAME=user.USERNAME
                                    INNER JOIN perum
                                    ON perum.KD_PT=pt.KD_PT
                                    ");
                                    while($data=mysqli_fetch_assoc($kat)){ ?>
                                    <option value="<?php echo $data['KD_PERUM']; ?>" id="<?php echo $data['KD_PERUM']; ?>"><?php echo $data['NAMA_PERUM']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="NAMA_CLUSTER">Nama Cluster</label>
                        <input type="text" name="NAMA_CLUSTER" placeholder="Masukkan nama cluster" required class="form-control">
                     </div>
                        <div class="form-group">
                         <label for="TIPE">Tipe</label>
                            <input type="number" min="1" name="TIPE" placeholder="Masukkan tipe" required class="form-control">
                     </div>
                     
                        <div class="form-group">
                         <label for="LUAS_TANAH">Luas Tanah</label>
                            <input type="number" min="1" name="LUAS_TANAH" placeholder="Masukkan luas tanah" required class="form-control">
                     </div>
                     
                        <div class="form-group">
                         <label for="STOK">Stok</label>
                            <input type="number" min="0" name="STOK" placeholder="Masukkan stok" required class="form-control">
                     </div>
                     
                        <div class="form-group">
                         <label for="HARGA">Harga</label>
                            <input type="number" min="1" name="HARGA" placeholder="Masukkan harga" required class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="FASILITAS">Fasilitas</label>
                         <textarea type="text" name="FASILITAS" placeholder="Masukkan fasilitas" class="form-control"></textarea>
                     </div>
                     
                       
                     <div class="form-group">
                            <label for="GAMBAR">Gambar</label>
                            <input type="file" id="GAMBAR" name="GAMBAR" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="GAMBAR1">Gambar1</label>
                            <input type="file" id="GAMBAR1" name="GAMBAR1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="GAMBAR2">Gambar2</label>
                            <input type="file" id="GAMBAR2" name="GAMBAR2" class="form-control" required>
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
      
