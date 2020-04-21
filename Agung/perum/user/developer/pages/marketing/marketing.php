

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
                            <strong>Insert Sukses!</strong> Penambahan data marketing baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data marketing baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data marketing berhasil.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data marketing berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Marketing</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                         
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Marketing</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
               <div class="streaming-table">
                    <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Data Marketing</a>
                  </div>
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="buku" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                            
                                            <th>Kode Marketing</th>
                                            <th>Nama Marketing</th>
                                            <th>No Telepon</th>
                                            <th>Operasi</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                             
                               $query = mysqli_query($konek, "SELECT * FROM marketing INNER JOIN user ON marketing.USERNAME=user.USERNAME WHERE marketing.USERNAME='$USERNAME'");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                            
                                            <td><?php echo $data['KD_MARKET'] ?></td>
                                            <td><?php echo $data['NAMA'] ?></td>
                                            <td><?php echo $data['NO_TELEPON'] ?></td>
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['KD_MARKET']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#myModal1<?php echo $data['KD_MARKET']; ?>" class="c-btn small red-bg buzz delete_button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                    
     
     <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['KD_MARKET']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Marketing</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/marketing/editmar.php" method="get">
                        <?php
                        $KD_MARKET = $data['KD_MARKET']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM marketing WHERE KD_MARKET='$KD_MARKET'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="KD_MARKET" value="<?php echo $row['KD_MARKET']; ?>">
                        <div class="form-group">
                          <label>Nama Marketing</label>
                          <input type="text" pattern="[A-Za-z ]+" title="Masukkan data huruf" name="NAMA" class="form-control" value="<?php echo $row['NAMA']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>No Telepon</label>
                          <input type="tel" pattern="^\d{10}$" title="Masukkan data angka (minimal 10 karakter)" name="NO_TELEPON" class="form-control" value="<?php echo $row['NO_TELEPON']; ?>">      
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

     <div class="modal fade" tabindex="-3" id="myModal1<?php echo $data['KD_MARKET']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Kategori</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/marketing/delmar.php" method="get">
                        <?php
                        $KD_MARKET = $data['KD_MARKET']; 
                        $query_edit = mysqli_query($konek, "SELECT * FROM marketing WHERE KD_MARKET='$KD_MARKET'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="KD_MARKET" value="<?php echo $row['KD_MARKET']; ?>">
                        <div class="form-group">
                          <label>Nama Marketing</label>
                          <input type="text" name="NAMA" class="form-control" readonly value="<?php echo $row['NAMA']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>No telepon</label>
                          <input type="text" name="NO_TELEPON" class="form-control" readonly value="<?php echo $row['NO_TELEPON']; ?>">      
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
                <h4 class="modal-title">Tambah Data PT</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="pages/marketing/tammar.php" method="post">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                        <label for="USERNAME"></label>
                                        <input type="hidden" name="USERNAME" value="<?php echo $_SESSION['USERNAME']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="NAMA">Nama Marketing</label>
                                        <input type="text" pattern="[A-Za-z ]+" title="Masukkan data huruf" name="NAMA" placeholder="Masukkan nama marketing" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="NO_TELEPON">No Telepon</label>
                                        <input type="tel" pattern="^\d{10}$" title="Masukkan data angka (minimal 10 karakter)" name="NO_TELEPON" placeholder="Masukkan no telepon" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                              </div>
                         </div>
                    </div>      
               </div>
          </div>
     </div><!-- Panel Content -->       
  </div>
      </body>

</html>
      
