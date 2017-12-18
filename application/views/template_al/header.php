<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Magazin AM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo admin("bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo admin("bower_components/font-awesome/css/font-awesome.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo admin("bower_components/Ionicons/css/ionicons.min.css") ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo admin("bower_components/jvectormap/jquery-jvectormap.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo admin("dist/css/AdminLTE.min.css") ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo admin("dist/css/skins/_all-skins.min.css") ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>AM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Magazin | </b>AM</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if (isset($_SESSION['ADMIN'])) {?>
                <img src="<?php echo img_url('images_admin/images/'.$_SESSION['ADMIN']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['CAISSIER'])) {?>
                <img src="<?php echo img_url('images_caissier/images/'.$_SESSION['CAISSIER']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['ADMIN'])) {?>
                <span class="hidden-xs"><?php echo $_SESSION['ADMIN']['info_personne']['nom'].' '.$_SESSION['ADMIN']['info_personne']['prenom'] ?></span>
              <?php } ?>

               <?php if (isset($_SESSION['CAISSIER'])) {?>
                <span class="hidden-xs"><?php echo $_SESSION['CAISSIER']['info_personne']['nom'].' '.$_SESSION['CAISSIER']['info_personne']['prenom'] ?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php if (isset($_SESSION['ADMIN'])) {?>
                <img src="<?php echo img_url('images_admin/images/'.$_SESSION['ADMIN']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['CAISSIER'])) {?>
                <img src="<?php echo img_url('images_caissier/images/'.$_SESSION['CAISSIER']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              
              <?php if (isset($_SESSION['ADMIN'])) {?>                  
                  <p>
                    <?php echo $_SESSION['ADMIN']['info_personne']['nom'].' '.$_SESSION['ADMIN']['info_personne']['prenom'] ?>
                    <small><?php  echo $_SESSION['ADMIN']['info_personne']['telephone']['liste'][0].' '.$_SESSION['ADMIN']['info_personne']['telephone']['liste'][1] ?></small>
                  </p>
              <?php } ?>


              <?php if (isset($_SESSION['CAISSIER'])) {?>                  
                  <p>
                    <?php echo $_SESSION['CAISSIER']['info_personne']['nom'].' '.$_SESSION['CAISSIER']['info_personne']['prenom'] ?>
                    <small><?php  echo $_SESSION['CAISSIER']['info_personne']['telephone']['liste'][0].' '.$_SESSION['CAISSIER']['info_personne']['telephone']['liste'][1] ?></small>
                  </p>
              <?php } ?>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if (isset($_SESSION['ADMIN'])) {?>
                    <a href="<?php echo site_url(array('Administration','index')) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php } ?>

                  <?php if (isset($_SESSION['CAISSIER'])) {?>
                    <a href="<?php echo site_url(array('Caissier','index')) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php } ?>
                </div>
                <div class="pull-right">
                   <?php if (isset($_SESSION['ADMIN'])) {?>
                       <a href="<?php echo site_url(array('Administration','deconnexion')) ?>" class="btn btn-default btn-flat">Deconnexion</a>
                   <?php } ?>

                    <?php if (isset($_SESSION['CAISSIER'])) {?>
                       <a href="<?php echo site_url(array('Caissier','deconnexion')) ?>" class="btn btn-default btn-flat">Deconnexion</a>
                   <?php } ?>
                  
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  