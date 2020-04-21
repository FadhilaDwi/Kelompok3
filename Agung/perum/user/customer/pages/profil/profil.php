<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }
    $USERNAME=$_SESSION['USERNAME'];
    $pt=mysqli_query($konek, "SELECT * FROM user WHERE USERNAME='$USERNAME'");
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
                            <strong>Insert Sukses!</strong> Penambahan data profil baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Gagal!</strong> Pembaharuan data profil gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data profil berhasil.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data profil berhasil.
                        </div>
                        <?php } } ?>
          <div class="main-title-sec">
               <div class="row">
                   <div class="col-md-12 column">
                        <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Profil</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                             </div>
                             <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Profil</li>
          </ul>
          
                    <div class="col-md-10">
                               </div><!-- Widget Controls -->
                              </div>
                              <div class="with-padding">                                          
                                  <form action="pages/profil/proses.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <?php 
                                            
                                        while ($row=mysqli_fetch_assoc($pt)) {
                                        ?>
                                       
                                       
                                        <img src="../../home/img/<?php echo $row['FOTO']; ?>" height="100px" width="100px" >
                                        <br>

                                        <input type="file" name="FOTO" class="form-control" value="<?php echo $row['FOTO']; ?>">
                                       
                                        <label for="USERNAME">Username</label>
                                        <input type="text" name="USERNAME" class="form-control" readonly value="<?php echo $row['USERNAME']; ?>">
                                        <label for="EMAIL">Email</label>
                                        <input type="text" name="EMAIL" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Masukkan email (contoh : xyz@something.com)" class="form-control" value="<?php echo $row['EMAIL']; ?>">
                                      

                                           
                                        <label for="NAMA_LENGKAP">Nama Lengkap</label>
                                        <input type="text" name="NAMA_LENGKAP" pattern="[A-Za-z ]+" title="Masukkan data huruf saja" class="form-control" value="<?php echo $row['NAMA_LENGKAP']; ?>">
                                    

                                   
                                        <label for="TGL_LAHIR">Tanggal Lahir</label>
                                        <input type="text" name="TGL_LAHIR" class="form-control" readonly value="<?php echo $row['TGL_LAHIR']; ?>">
                                    

                                    
                                        <label for="JENIS_KELAMIN">Jenis Kelamin</label>
                                        <input type="text" name="JENIS_KELAMIN" class="form-control" readonly value="<?php echo $row['JENIS_KELAMIN']; ?>">
                                    
                                        <label for="PASSWORD">Password</label>
                                        <input type="password" name="PASSWORD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Masukkan password dengan huruf besar, huruf kecil, dan angka (minimal 8 karakter)" class="form-control" placeholder ="Biarkan kosong jika tidak ingin mengubah password!">
                                       
                                        <label for="PASSWORD1">Ulangi Password</label>
                                        <input type="password" name="PASSWORD1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Masukkan password dengan huruf besar, huruf kecil, dan angka (minimal 8 karakter)" class="form-control" placeholder ="Biarkan kosong jika tidak ingin mengubah password!">

                                       
                                    
   
                                    <?php 
                                    }
                                     ?>                               
                                    </div>
                                            
                                    <div class="form-group">
                                        <button type="submit" class="c-btn large blue-bg" >Simpan</button>
                                        </div>
                                </form>
                              </div>
                         </div>
                    </div>      

               </div>
          </div>
     </div><!-- Panel Content -->
                                            
                                          