<!-- Our Website Content Goes Here -->
<?php 
$USERNAME=$_SESSION['USERNAME'];
$user=mysqli_query($konek, "SELECT * FROM user WHERE user.USERNAME='$USERNAME'");
$pt=mysqli_query($konek, "SELECT pt.KD_PT, pt.NAMA_PT, user.USERNAME FROM pt INNER JOIN user ON pt.USERNAME=user.USERNAME WHERE user.USERNAME='$USERNAME'");
$perum=mysqli_query($konek, "SELECT KD_PERUM 
FROM user
INNER JOIN pt ON user.USERNAME=pt.USERNAME
INNER JOIN perum ON pt.KD_PT=perum.KD_PT
WHERE user.USERNAME='$USERNAME'");
$cluster=mysqli_query($konek, "SELECT perum.KD_PERUM, cluster.KD_CLUSTER, user.USERNAME, pt.KD_PT
FROM cluster 
INNER JOIN perum ON cluster.KD_PERUM=perum.KD_PERUM 
INNER JOIN pt ON perum.KD_PT=pt.KD_PT
INNER JOIN user ON pt.USERNAME=user.USERNAME
WHERE user.USERNAME='$USERNAME'");
$diskusi=mysqli_query($konek, "SELECT *
FROM diskusi
INNER JOIN cluster
ON diskusi.KD_CLUSTER=cluster.KD_CLUSTER
INNER JOIN perum
ON cluster.KD_PERUM=perum.KD_PERUM
INNER JOIN user
ON user.USERNAME=diskusi.USERNAME
WHERE diskusi.USERNAME='$USERNAME' OR diskusi.PENERIMA_DIS='$USERNAME'");
$review=mysqli_query($konek, "SELECT *
FROM review
INNER JOIN cluster
ON review.KD_CLUSTER=cluster.KD_CLUSTER
INNER JOIN perum
ON cluster.KD_PERUM=perum.KD_PERUM
INNER JOIN user
ON user.USERNAME=review.USERNAME
WHERE review.USERNAME='$USERNAME' OR review.PENERIMA_REV='$USERNAME'");

$chat=mysqli_query($konek, "SELECT DISTINCT USERNAME
FROM chat WHERE chat.PENERIMA='$USERNAME'");




$marketing=mysqli_query($konek, "SELECT  user.USERNAME, marketing.NAMA, marketing.NO_TELEPON, marketing.KD_MARKET
FROM user
INNER JOIN marketing
ON user.USERNAME=marketing.USERNAME
WHERE user.USERNAME='$USERNAME'");
?>
<header class="simple-normal">
     <div class="top-bar">
          <div class="logo">
               <a href="../../home/index_developer.php" title=""><i class="fa fa-bullseye"></i> carirumah.com</a>
          </div>
          <div class="menu-options"><span class="menu-action"><i></i></span></div>
          <div class="top-bar-quick-sec">
               <a href="#" data-toggle="modal" data-target=".logout"><span class="full-screen-btn"><i class="fa fa-sign-out"></i></span></a>
               <span id="toolFullScreen" class="full-screen-btn"><i class="fa fa-arrows-alt fa-spin"></i></span>
          </div>
     </div><!-- Top Bar -->
     <div class="side-menu-sec" id="header-scroll">
         <br>
          <div class="side-menus">
               <span>MENU UTAMA</span>
               <nav>
                    <ul class="parent-menu">
                         <li class="<?php if(!isset($_GET['p'])) echo 'active'; ?>">
                              <!--badge red <i class="badge red-bg">HOT</i>-->
                              <a title="Halaman Utama" href="index.php"><i class="ti-desktop"></i><span>Dashboard</span></a>
                         </li>
                         <li class="menu-item-has-children <?php if(isset($_GET['p'])) if($_GET['p']=='perum'||$_GET['p']=='cluster'||$_GET['p']=='pt') echo 'active'; ?>">
                              <a title="Area administrasi buku"><i class="ti-book"></i><span>Setting Akun</span></a>
                              <ul <?php if(isset($_GET['p'])) if($_GET['p']=='buku'||$_GET['p']=='data'||$_GET['p']=='pt') { ?> style="display: block;" <?php } ?>>
                              <li><a href="?p=profil/profil">Data Profil </a></li>     
                              <li><a href="?p=marketing/marketing">Data Marketing <i class="badge blue-bg"><?php echo mysqli_num_rows($marketing); ?></i></a></li> 
                               
                         </ul>
                        </li>
                         <li class="menu-item-has-children <?php if(isset($_GET['p'])) if($_GET['p']=='perum'||$_GET['p']=='cluster'||$_GET['p']=='pt') echo 'active'; ?>">
                              <a title="Area administrasi buku"><i class="ti-home"></i><span>Rumah</span></a>
                              <ul <?php if(isset($_GET['p'])) if($_GET['p']=='buku'||$_GET['p']=='data'||$_GET['p']=='pt') { ?> style="display: block;" <?php } ?>>
                              <li><a href="?p=pt/pt">Data PT <i class="badge blue-bg"><?php echo mysqli_num_rows($pt); ?></i></a></li>     
                              <li><a href="?p=perum/perum">Data Perumahan <i class="badge blue-bg"><?php echo mysqli_num_rows($perum); ?></i></a></li> 
                              <li><a href="?p=cluster/cluster">Data Cluster <i class="badge blue-bg"><?php echo mysqli_num_rows($cluster); ?></i></a></li> 
                                   
                         </ul>
                        </li>
                       
                        <li class="menu-item-has-children <?php if(isset($_GET['p'])) if($_GET['p']=='buku'||$_GET['p']=='data'||$_GET['p']=='pt') echo 'active'; ?>">
                              <a title="Area administrasi buku"><i class="ti-comments"></i><span>Lainnya</span></a>
                              <ul <?php if(isset($_GET['p'])) if($_GET['p']=='buku'||$_GET['p']=='data'||$_GET['p']=='pt') { ?> style="display: block;" <?php } ?>>
                              <li><a href="?p=chat/chat">Data Chat <i class="badge blue-bg"><?php echo mysqli_num_rows($chat); ?></i></a></li> 
                              <li><a href="?p=diskusi/diskusi">Data Diskusi <i class="badge blue-bg"><?php echo mysqli_num_rows($diskusi); ?></i></a></li>     
                              <li><a href="?p=review/review">Data Review <i class="badge blue-bg"><?php echo mysqli_num_rows($review); ?></i></a></li> 
                             
                             
                                   
                         </ul>
                        </li>
                        <li class="">
                              <a title="Keluar dari Halaman Admin" href="#logout" data-toggle="modal" data-target=".logout"><i class="ti-export"></i><span>Log Out</span></a>
                        </li>
                    </ul>
               </nav>
          </div>
     </div>
</header>