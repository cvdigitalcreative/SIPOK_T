<!DOCTYPE html>
<html lang="en">
<head>
<title>SIPPOK PUSRI</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/matrix-media.css" />
<link href="<?php echo base_url(); ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.gritter.css" />
<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1 > </h1>
</div>
<!--close-Header-part--> 
<?php 
  
  $tipe = "";

  $username = $model->getUsername();
  $id = $model->getIdAccount();

  if($id == 1){
    $tipe = "operator";
  }
  else if($id == 2){
     $tipe = "User";
  }


?>
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="<?php echo base_url()?>Unit/ubah_data" ><i class="icon icon-user"></i>  <span class="text"><?php echo $username." (".$tipe.")"; ?></span></a>
    </li>

    <li class=""><a title="" href="<?php echo base_url();?>Unit/1"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--close-top-Header-menu-->