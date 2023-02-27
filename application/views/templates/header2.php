<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Koperasi</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/adminlte.min.css">

  <style>
    .info-box:hover{
      transition:.3s;
      cursor:pointer;
      box-shadow:5px 5px 10px 5px rgba(0,0,0,0.1);
      margin:-2px;
    }
    a{
      color:black;
    }
    a:hover{
      color:black;
    }
    .container{
      max-width:98%;
    }
    .paginate_button{
      font-size:10px;
      font-weight:bolder;
    }
    .anggota-tbody{
      height:110px;
    }
    .riwayat-keuangan-tbody{
      height:47vh;
    }
    .card{
      border-radius:none;
    }
    .badge{
      border:none;
      padding:5px;
    }
    .table-pinjaman tbody{
      height: 50px;
      overflow: hidden;
    }
    .content-header{
      min-height:none;
      overflow:hidden;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav" style="scrollbar-width:none;">
<div class="wrapper" style="scrollbar-width:none;">
  <!-- Navbar -->
  <nav class="main-header navbar pb-2" style="position:fixed; width:100%; z-index:999; background-color:black;">
    <div class="container">
      <a href="<?=base_url('index.php/admin/')?>" class="navbar-brand">
        <span class="brand-text" style="color:white"><b>Koperasi UME MNASI</b></span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md shadow navbar-light navbar-white" style="position:fixed; width:100%; z-index:999; margin-top:3.5rem;">
    <div class="container">
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle pl-0"><b>Laporan</b></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Simpanan</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/pengaturan/laporan_simpanan/rekap')?>" class="dropdown-item">Rekap Simpanan</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/pengaturan/laporan_simpanan/pokok')?>" class="dropdown-item">Simpanan Pokok</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/pengaturan/laporan_simpanan/wajib')?>" class="dropdown-item">Simpanan Wajib</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/pengaturan/laporan_simpanan/sukarela')?>" class="dropdown-item">Simpanan Sukarela</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown-divider"></li>
              
              <li><a href="<?=base_url('index.php/pengaturan/laporan_sumsuk/');?>" class="dropdown-item">SUM & SUK</a></li>
              <li><a href="<?=base_url('index.php/pengaturan/daftar_piutang_anggota');?>" class="dropdown-item">Daftar Piutang Anggota</a></li>
              <li><a href="<?=base_url('index.php/pengaturan/daftar_sibulan');?>" class="dropdown-item">SiBulan</a></li>
              <li><a href="<?=base_url('index.php/pengaturan/bulan_saham');?>" class="dropdown-item">Bulan Saham</a></li>
              <li><a href="<?=base_url('index.php/pengaturan/daftar_bagiSHU');?>" class="dropdown-item">Daftar Bagi SHU</a></li>

              </ul>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link btn btn-primary text-white" data-toggle="modal" data-target="#BukuBaru">
                <i class="fa fa-book mr-2"></i> <b>Buka Buku Baru</b>
            </button>  
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i> <b> &nbsp;<?= $this->session->userdata('nama'); ?></b>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Menu</span>
            <div class="dropdown-divider"></div>
            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#EditUser">
                <i class="fa fa-user-edit mr-2"></i> Edit Data
            </button>
            <div class="dropdown-divider"></div>
            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#LogOut">
                <i class="fa fa-sign-out-alt mr-2"></i> Keluar
            </button>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="overflow:hidden; scrollbar-width:none; height:100vh;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mt-5 pt-5"></div>
        <div class="row mt-3 pt-2"></div>
        <div class="row">
          <div class="col-12">
            <?php if( $this->session->flashdata('editAdmin') ) {?>
                <?=$this->session->flashdata('editAdmin');?>
            <?php } ?>
          </div>
        </div>

