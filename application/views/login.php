<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="<?php echo base_url('assets') ?>/vendor/img/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(''); ?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url(''); ?>/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/css/style-responsive.css" rel="stylesheet">
</head>
<body>  
  <div id="login-page">
    <div class="container site-min-height">
      <form class="form-login " action="<?php echo base_url('home/index') ?>" method="post">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <?php 
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('pesan');
                echo '</div>';
                }
              echo form_open('home/index');

           ?>
          <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input type="password"name="password" class="form-control" placeholder="Password">
          <br>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        </div>
      </form>
      <?php  echo form_close(); ?>
    </div>
  </div>
  <br>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets') ?>/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("<?php echo base_url('assets') ?>/img/login-bg.jpg", {
      speed: 500
    });
  </script>





