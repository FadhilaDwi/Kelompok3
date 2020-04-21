<?php
    if(!defined('MyConst')){
            die('Akses langsung tidak diperbolehkan');
        }
    $user=mysqli_query($konek, "SELECT USERNAME FROM user");
    $pt=mysqli_query($konek, "SELECT KD_PT FROM pt");
    $perum=mysqli_query($konek, "SELECT KD_PERUM FROM perum");
    $cluster=mysqli_query($konek, "SELECT KD_CLUSTER FROM cluster");
    $diskusi=mysqli_query($konek, "SELECT KD_DIS FROM diskusi");
    $review=mysqli_query($konek, "SELECT KD_REV FROM review");
    $report=mysqli_query($konek, "SELECT KD_REP FROM report");
    $slider=mysqli_query($konek, "SELECT KD_SLIDER FROM slider");
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
                        <p align=right>Halo <b><?php echo $_SESSION['USERNAME']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['STATUS']; ?></b>.</p>
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
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>User</span>
                            <h4>
                                <?php echo mysqli_num_rows($user); ?>
                            </h4>
                            <i class="fa fa-user red-bg"></i>
                            <h5>Total User : <?php echo mysqli_num_rows($user); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>PT</span>
                            <h4>
                                <?php echo mysqli_num_rows($pt); ?>
                            </h4>
                            <i class="fa fa-briefcase skyblue-bg"></i>
                            <h5>Total PT : <?php echo mysqli_num_rows($pt); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Perumahan</span>
                            <h4>
                                <?php echo mysqli_num_rows($perum); ?>
                            </h4>
                            <i class="fa fa-home green-bg"></i>
                            <h5>Total Perumahan : <?php echo mysqli_num_rows($perum); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Cluster</span>
                            <h4 class="number">
                                <?php echo mysqli_num_rows($cluster); ?>
                            </h4>
                            <i class="fa fa-building blue-bg"></i>
                            <h5>Total Cluster : <?php echo mysqli_num_rows($cluster); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Diskusi</span>
                            <h4>
                                <?php echo mysqli_num_rows($pt); ?>
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
                            <i class="fa fa-comments skyblue-bg"></i>
                            <h5>Total Review : <?php echo mysqli_num_rows($review); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Report</span>
                            <h4>
                                <?php echo mysqli_num_rows($report); ?>
                            </h4>
                            <i class="fa fa-book skyblue-bg"></i>
                            <h5>Total Report : <?php echo mysqli_num_rows($report); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Slider</span>
                            <h4>
                                <?php echo mysqli_num_rows($slider); ?>
                            </h4>
                            <i class="fa fa-book red-bg"></i>
                            <h5>Total Slider : <?php echo mysqli_num_rows($slider); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
            </div>
        </div>
    </div><!-- Panel Content -->