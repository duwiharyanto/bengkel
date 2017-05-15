<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bengkel X</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/fontawesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/ionicons/css/ionicons.min.css">
      <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
$level=$this->session->userdata('level');
?>
<body class="hold-transition login-page">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url('index.php/Cbengkelnew/Cdashboard');?>">Fajar Paper</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Asset
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="<?php if($level=='operator bengkel' or $level=='operator gudang' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cmasterasset');?>">Master</a></li>
          <li><a href="<?php echo base_url('index.php/Cbengkelnew/Casset');?>">Asset</a></li>
          
        </ul>
      </li>
      <li class="dropdown <?php if($level=='operator bengkel' or $level=='user'){ echo "hide";}?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Stok
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('index.php/Cbengkelnew/Csuplier');?>">Suplier</a></li>
          <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cpart');?>">Part</a></li>
        </ul>
      </li>
      <li class="dropdown <?php if($level=='operator gudang'){ echo "hide";}?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Working Out
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout/vtambah');?>">Tambah Working Out</a></li>
            <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout');?>">Daftar Working Out</a></li>
            <li><a href="">Pencarian</a></li>
        </ul>
      </li>
      <li class="dropdown <?php if($level=='user'){ echo "hide";}?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Part
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="<?php if($level=='operator gudang' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cpartrequest');?>">Part Request</a></li>
            <li class="<?php if($level=='operator bengkel' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cpartout');?>">Part Out</a></li>
            <li class="<?php if($level=='operator bengkel' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cpartorder');?>">Part Order</a></li>
        </ul>
      </li>
      <li class="<?php if($level=='operator bengkel' or $level=='operator gudang' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cuser');?>">Daftar User</a></li>
      <li class="<?php if($level=='operator bengkel' or $level=='operator gudang' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Cdivisi');?>">Divisi</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="<?php if($level=='operator gudang' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Claporan/partreq');?>">Part Request</a></li>
            <li class="<?php if($level=='operator bengkel' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Claporan/partout');?>">Part Out</a></li>
            <li class="<?php if($level=='operator bengkel' or $level=='user'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Claporan/partorder');?>">Part Order</a></li>
            <li class="<?php if($level=='operator bengkel' or $level=='operator gudang'){ echo "hide";}?>"><a href="<?php echo base_url('index.php/Cbengkelnew/Claporan/workingout');?>">Working Out</a></li>
        </ul>
      </li>    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username')?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"><?php echo $level?></a></li>
          <li><a href="<?php echo base_url('index.php/Clogin/logout');?>">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>
