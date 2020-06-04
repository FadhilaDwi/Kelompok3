<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cari Makanan Sehat Yuk</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/') ?>css/shop-homepage.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/') ?>css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">  -->
  <link href="https://fonts.googleapis.com/css?family=DM+Mono&display=swap" rel="stylesheet">  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand">LA-RING</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('customer/dashboardpelanggan');?>">Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=  base_url('customer/dashboardpelanggan/mitra');?>">Mitra Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Info Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pembayaran</a>
          </li>
          <?php if($this->session->has_userdata('nama')){ 
            
            ?>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->session->userdata('nama'); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url(). 'login/logout' ?>" >Keluar</a>
                <a class="dropdown-item" href="<?php echo base_url(). 'customer/profil' ?>" >Lihat Profil</a>
                <a class="dropdown-item" href="<?= base_url().'customer/dashboardpelanggan/keranjang'?>" >Keranjang <span class="badge badge-danger"><?php echo $this->cart->total_items();?></span></a>
              </div>
          </li>

          <?php }else{ ?>
          <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Masuk
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(). 'login' ?>" >Masuk Sebagai Customer</a>
                    <!-- <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalLoginForm">Masuk Sebagai Barbershop</a> -->
                    </div>
          </li>
          <?php } ?>
          
        </ul>
      </div>
    </div>
  </nav>