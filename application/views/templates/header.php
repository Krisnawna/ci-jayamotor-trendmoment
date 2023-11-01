<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">


  <title>Toko Jaya Motor | Metode Trend Moment</title>
  <!-- Favicons -->
  <link href="<?php echo base_url('assets') ?>/img/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets') ?>/img/favicon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets') ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url('assets') ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/css/style-responsive.css" rel="stylesheet">
  <script src="<?php echo base_url('assets') ?>/lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b><span>Toko.</span>Jaya Motor</b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
           <?php if($this->session->userdata('username')==""){ ?>
             <?php } else{ ?>
          <li><a class="logout" href="<?= base_url('home/logout') ?>">Logout</a></li>
           <?php } ?>
        </ul>
      </div>
    </header>
      <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?php echo base_url('assets') ?>/img/jayamotor.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Admin</h5>
          <li class="mt">
            <a class="active" href="<?= base_url('Home') ?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <?php if($this->session->userdata('username')==""){ ?>
          <?php } else{ ?>
          <li class="sub-menu">
            <a href="<?= base_url('DataBarang') ?>">
              <i class="fa fa-folder-open-o"></i>
              <span>Data Barang</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="<?= base_url('DataStok') ?>">
              <i class="fa fa-folder"></i>
              <span>Data Stok</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="<?= base_url('DataPeramalan') ?>">
              <i class="fa fa-bar-chart-o"></i>
              <span>Peramalan</span>
              </a>
          </li>
           <!-- <li class="sub-menu">
            <a href="<?= base_url('Home/manajemen_user') ?>" >
              <i class="fa fa-users"></i>
              <span>Pengguna</span>
              </a>
          </li> -->
           <li class="sub-menu">
            <a href="<?= base_url('DataPeramalan/tampil_hasil') ?>">
              <i class="fa fa-meh-o"></i>
              <span>Hasil</span>
              </a>
          </li>
           <?php } ?>
      </div>
    </aside>


