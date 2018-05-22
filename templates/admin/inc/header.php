<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php ob_start();?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Ấn tượng Hội An | Trang Admin</title>
    <link rel="shortcut icon" type="image/ico" href="/hoian/templates/public/assets/img/hoian-icons.png" />
    <!-- Bootstrap core CSS -->
    <link href="/hoian/templates/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/hoian/templates/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/hoian/templates/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/hoian/templates/admin/css/owl.carousel.css" type="text/css">
    
    <!--dynamic table-->
    <link href="/hoian/templates/admin/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="/hoian/templates/admin/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="/hoian/templates/admin/assets/data-tables/DT_bootstrap.css" />

      <!--right slidebar-->
      <link href="/hoian/templates/admin/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="/hoian/templates/admin/css/style.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/style-responsive.css" rel="stylesheet" />
    <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  
 <body>
  <?php 
            if(!isset($_SESSION['user'])){
                header('location: /hoian/login.php');
            }
            else {
                $userLogin = $_SESSION['user'];
            }
        ?>
  <section id="container" >