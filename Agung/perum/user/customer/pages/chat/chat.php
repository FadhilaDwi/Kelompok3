

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
                            <strong>Insert Sukses!</strong> Penambahan data chat baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data chat baru gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data chat berhasil.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data chat berhasil.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-20 column">
                         <div class="heading-profile">
                              <h2>Data Chat</h2>
                              <p align= right >Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                         
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Chat</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
               
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <span id="found" class="label label-info"></span>
                                   <table id="komentar" class='table table-responsive table-responsive table-striped table-hover'>
                                    <thead>
                                        <tr>
                                       
                                          <th>Username Pengirim</th>
                                        
                                          <th>Operasi</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php 
                                          
                                             
                                          $query = mysqli_query($konek, "SELECT DISTINCT chat.USERNAME
                                          FROM chat
                                          INNER JOIN user
                                          ON user.USERNAME=chat.USERNAME
                                          WHERE chat.PENERIMA='$USERNAME' ORDER BY TGLWAKTU_CHAT ASC");
         
                          while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        ?>
                                        
                                        <tr>
                                        
                                        <td><?php echo $data['USERNAME']; ?></td>
                                            
                                            
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $data['USERNAME']; ?>"class="c-btn small blue-bg buzz edit_button"><i class="fa fa-book"></i></a>
                                          
                                            </td>
                                        </tr>
                                        
                                   
                                
                              </div>
                         </div>
                    </div>   
                   
        <div class="modal fade" tabindex="-3" id="myModal<?php echo $data['USERNAME']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Balas Chat</h4>
            </div>
            <div class="modal-body">
                            <?php 
                                $USERNAME1 = $data['USERNAME']; 
                                
                                 $rsKomentar = mysqli_query($konek, "SELECT *
                                 FROM chat INNER JOIN user
                                 ON chat.USERNAME=user.USERNAME
                                 WHERE (chat.PENERIMA='$USERNAME' AND chat.USERNAME='$USERNAME1') OR (chat.USERNAME='$USERNAME' AND chat.PENERIMA='$USERNAME1')  ORDER BY TGLWAKTU_CHAT ASC");
                                    while($row=mysqli_fetch_assoc($rsKomentar)){           
                            ?>
                                <div align="center" class="review-body">
                                <div align="center" class="review-content">
                                    <p class="review-author"><strong><?php echo $row['USERNAME']; ?></strong><small> - <?php echo $row['TGLWAKTU_CHAT']; ?></small></p>
                                    <p align="center">
                                                <?php
                                                    $text = $row['ISI_CHAT'];
                                                    $strip = strip_tags(stripcslashes($text), '<a>');
                                                    // echo $strip;
                                                ?>
                                                <div role="alert" class="alert color skyblue-bg" class="alert color green-bg">
                                                    <?php
                                                        echo substr($strip, 0, 80);
                                                        if(strlen(trim($strip))>80) echo " [...]";
                                                    ?>
                                                </div>
                                    </p>
                                </div>
                                </div>
                                <?php } ?>
                                <form role="form" action="pages/chat/balaschat.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="USERNAME" value="<?php echo $_SESSION['USERNAME']; ?>">
                                <input type="hidden" name="PENERIMA" value="<?php echo  $USERNAME1;?>">   
                            <div class="modal-footer">
                                        <textarea type="text" name="ISI_CHAT" placeholder="Masukkan isi chat" class="form-control"></textarea>
                            </div>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Kirim</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                        </div> <!--  end reviews -->
                        </div> 
                        </div> <!--  end reviews -->
                        </div> 
                        </div> <!--  end reviews -->
                        </div> 
    
                        </form> 
            <?php               
          } 
          ?>
        </tbody>
      </table>   
     
      </body>

</html>
      
