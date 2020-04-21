
<?php
    include "lib/koneksi.php";
    session_start();
    define('MyConst', TRUE);
    if(!isset($_SESSION['USERNAME'])){
      header("location:../../login/login.php?a=login_required");
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

    <!-- Meta-Information -->
    <title>carirumah.com | Admin </title>
    <meta charset="utf-8">
    <meta name="description" content="Glade is a clean and powerful ready to use responsive AngularJs Admin Template based on Latest Bootstrap version and powered by jQuery, Glade comes with 3 amazing Dashboard layouts. Glade is completely flexible and user friendly admin template as it supports all the browsers and looks awesome on any device.">
    <meta name="keywords" content="admin, admin dashboard, angular admin, bootstrap admin, dashboard, modern admin, responsive admin, web admin, web app, bitlers">
    <meta name="author" content="bitlers">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="css/fancybox/jquery.fancybox.min.css" />

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="../../home/img/favicon.ico">
    <link rel="apple-touch-icon" href="../../home/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../home/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../home/img/apple-touch-icon-114x114.png">

</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php include "inc/navbar.php"; ?>

<div class="main-content">
    <?php
        if(isset($_GET["p"])) {
            $page = "pages/".$_GET["p"].".php";
            if(is_file($page)) {
                include($page);
            } else {
                include "pages/404.php";
            }
        } else {
            include "pages/dashboard.php";
        }
    ?>
</div>

<div class="modal fade logout" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Keluar</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Akan Keluar?</p>
      </div>
      <div class="modal-footer">
        <div class="col-md-4 col-md-offset-4">
                <a href="../../login/logout.php" class="c-btn large blue-bg" >Ya</a>
                
                <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Vendor: Javascripts -->
<script src="js/jquery-2.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Our Website Javascripts -->
<script src="js/app.js"></script>
<script src="js/common.js"></script>
<?php if(!isset($_GET['p'])) { ?>
    <script src="js/home1.js"></script>
<?php } ?>
<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='pt/pt'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>

<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='perum/perum'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>

<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='cluster/cluster'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>
<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='user/admin'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>

<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='user/developer'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>


<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='user/customer'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>

<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='diskusi/diskusi'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#komentar').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>


<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='review/review'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>

<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='chat/chat'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#komentar').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>


<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='slider/slider'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#buku').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>



<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='report/report'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				$('#komentar').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                responsive: true
                });
			} );
           
        </script>

<?php } } ?>



</body>
</html>
<?php  ?>