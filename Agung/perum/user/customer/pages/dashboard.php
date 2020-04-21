<?php
    if(!defined('MyConst')){
            die('Akses langsung tidak diperbolehkan');
        }
    $USERNAME=$_SESSION['USERNAME'];
  
    $diskusi=mysqli_query($konek, "SELECT diskusi.KD_DIS, user.USERNAME  FROM diskusi INNER JOIN user ON diskusi.USERNAME=user.USERNAME WHERE user.USERNAME='$USERNAME'");
    $review=mysqli_query($konek, "SELECT review.KD_REV, user.USERNAME FROM review INNER JOIN user ON review.USERNAME=user.USERNAME WHERE user.USERNAME='$USERNAME'");
    $report=mysqli_query($konek, "SELECT report.KD_REP, user.USERNAME  FROM report INNER JOIN user ON report.USERNAME=user.USERNAME WHERE user.USERNAME='$USERNAME'");
?>
<div class="panel-content">
        <div class="main-title-sec">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='sukses_login'){
                    ?>
                    <div role="alert" class="alert color green-bg fade in alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Berhasil login!</strong> selamat, Anda berhasil login sebagai administrator Zurin Bookstore.
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-md-20 column">
                    <div class="heading-profile">
                        <h2>Dashboard</h2>
                        <p align=right> Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
                    </div>
                </div>
                
            </div>
        </div><!-- Heading Sec -->
        <ul class="breadcrumbs">
            <li><a href="#" title="">Beranda</a></li>
            <li><a href="index.php" title="">Dashboard</a></li>
        </ul>
        <div class="main-content-area">
            <div class="row">
                  </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Chat</span>
                            <h4>
                                <?php echo mysqli_num_rows($chat); ?>
                            </h4>
                            <i class="fa fa-comments skyblue-bg"></i>
                            <h5>Total Chat : <?php echo mysqli_num_rows($chat); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Diskusi</span>
                            <h4>
                                <?php echo mysqli_num_rows($diskusi); ?>
                            </h4>
                            <i class="fa fa-comments skyblue-bg"></i>
                            <h5>Total Diskusi : <?php echo mysqli_num_rows($diskusi); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Review</span>
                            <h4>
                                <?php echo mysqli_num_rows($review); ?>
                            </h4>
                            <i class="fa fa-book skyblue-bg"></i>
                            <h5>Total Review : <?php echo mysqli_num_rows($review); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                
            </div>
        </div>
    </div><!-- Panel Content -->