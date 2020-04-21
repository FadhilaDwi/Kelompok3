<?php 
  session_start();
  if (isset($_SESSION['STATUS'], $_SESSION['USERNAME']))
  {
       
       if ($_SESSION['STATUS'] == "admin")
     {  
          header("Location:../home/index_admin.php");

     }

     else if ($_SESSION['STATUS'] == "developer")
     {
          header("Location:../home/index_developer.php");
     }
     else if ($_SESSION['STATUS'] == "customer")
     {
          header("Location:../home/index_customer.php");
     }
  }

?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
     <?php
          header('Last-Modified:'.  gmdate('D, d M Y H:i:s').'GMT');
          header('Cache-Control: no-store, no-cache, must-revalidate');
          header('Cache-Control: post-check=0, pre-check=0',false);
          header('Pragma: no-cache');
?>
    <!-- Meta-Information -->
    <title>carirumah.com | Halaman Login</title>
    <meta charset="utf-8">
    <meta name="description" content="Glade is a clean and powerful ready to use responsive AngularJs Admin Template based on Latest Bootstrap version and powered by jQuery, Glade comes with 3 amazing Dashboard layouts. Glade is completely flexible and user friendly admin template as it supports all the browsers and looks awesome on any device.">
    <meta name="keywords" content="admin, admin dashboard, angular admin, bootstrap admin, dashboard, modern admin, responsive admin, web admin, web app, bitlers">
    <meta name="author" content="bitlers">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/apple-touch-icon-114x114.png">

</head>


<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Our Website Content Goes Here -->
<div class="account-user-sec">
     <div class="account-sec">
                   <div class="row">
                   <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='insert_sukses'){
                        ?>

                        <div class="col-md-6 col-md-offset-3">
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Daftar sukses!</strong> Silahkan login untuk melanjutkan ke menu utama.
                        </div>
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                         <div class="col-md-6 col-md-offset-3">
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Login Gagal!</strong> Username atau password yang anda masukkan salah.
                        </div>
                        </div>
                        <?php } else if($alert=='login_required'){ ?>
                         <div class="col-md-6 col-md-offset-3">
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Gagal Masuk ke Halaman ini!</strong> Anda harus login telebih dahulu.
                        </div>
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                         <div class="col-md-6 col-md-offset-3">
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus sukses!</strong> Penghapusan data perumahan berhasil.
                        </div>
                        </div>
                        <?php } } ?>
                        </div>
          <div class="acount-sec">
               <div class="container">
                    <div class="row">
                         <div class="col-md-4">
                              <div class="account-detail">
                                   <ul>
                                        <li>
                                             <h3><i class="fa  fa-television"></i>  Login </h3>
                                             <p align="justify">Dengan melakukan login menggunakan akun anda,
                                                 Anda dapat masuk kehalaman dashboard sesuai status anda
                                             </p>
                                        </li>
                                        <li>
                                             <h3><i class="fa fa-map-o"></i> Butuh bantuan?</h3>
                                             <p align="justify">Anda butuh bantuan? Silakan hubungi admin melalui kontak yang tersedia di
                                                 halaman utama web.
                                             </p>
                                        </li>
                                        <li>
                                             <h3><i class="fa  fa-send-o"></i> Sederhana, Elegan & Super Cepat</h3>
                                             <p>Website kami menyediakan interface yang sederhana, elegan, dan cepat untuk menangani kebutuhan pengguna</p>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-md-8">
                              <div class="contact-sec">
                                   <div class="row">
                                        <div class="col-md-8 col-md-offset-2">   
                                             <div class="widget-title">
                                                  <br>
                                                  <h3 ><a href="../home/index.php">carirumah.com | Halaman Login</a></h3>                                                  
                                             </div><!-- Widget title -->
                                             <div class="account-form">
                                                  <form action="login_proses.php" method="post">
                                                       <div class="row">
                                                            <div class="feild col-md-12">
                                                            <label> USERNAME </label>
                                                                 <input type="text" name="USERNAME" required placeholder="Masukkan username" />
                                                            
                                                            </div>
                                                            <div class="feild col-md-12">
                                                            <label> PASSWORD </label>
                                                                 <input type="password" name="PASSWORD" required placeholder="Masukkan password" />
                                                            </div>
                                                            <div class="feild col-md-12">
                                                            <d3> Belum memiliki akun ? 
                                                            <d3 ><a href="daftar.php"> Daftar Disini </a></d3>
                                                            </d3>
                                                            </div>
                                                            <div class="feild col-md-12">
                                                                 <input type="submit" name="login" value="Login" />                                                       
                                                            </div>                                                       
                     
                                                       </div>
                                                  </form>
                                             </div>
                                        </div>
                                        
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <footer>
              <div class="container">
      
              </div>
          </footer>
     </div><!-- Account Sec -->
</div>
<!-- Vendor: Javascripts -->
<script src="js/jquery-2.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyDrlCWSCEGTYat1yFIybvtjXe6v24wXY04" 
        async="" 
        type="text/javascript">
</script>

<!-- Our Website Javascripts -->
<script src="js/app.js"></script>
<script src="js/common.js"></script>
</body>
</html>