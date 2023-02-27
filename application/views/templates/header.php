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
    .validasiLKSBModal{
      display: none;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 2000;
      background-color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    .loading{
      background: white;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 2000;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav" style="scrollbar-width:none;">
<div class="validasiLKSBModal">
  <?php _setKeyLoad(); ?>
  <?php if (!is_null($this->session->flashdata('validasiLKSB'))) { ?>
    <?php $bulanTahun = explode('-', $this->session->flashdata('validasiLKSB')); ?>
    <h1>LKSB Bulan <?= _getBulan($bulanTahun[0]) ?> Tahun <?= $bulanTahun[1]; ?> Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data</h1>
  <?php } else { ?>
    <h1 class="validasiLKSBModalText"></h1>
  <?php } ?>
  <br>
  <br>
  <button class="btn btn-danger btnClosevalidasiLKSBModal">Tutup Peringatan</button>
</div>
<div class="loading">
  <h1>Harap Menunggu....</h1>
</div>
<div class="wrapper" style="scrollbar-width:none;">
  <!-- Navbar -->
  <nav class="main-header navbar pb-2" style="position:fixed; width:100%; z-index:999; background-color:black;">
    <div class="container">
      <a href="<?=base_url('index.php/admin/')?>" class="navbar-brand">
        <span class="brand-text" style="color:white"><b>Koperasi UME MNASI [ Tahun Buku : <?= $_SESSION['tahun'] ?> ]</b></span>
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
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle pl-0"><b>Menu</b></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Daftar Anggota</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/daftar_anggota_koperasi');?>" class="dropdown-item">Koperasi</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/daftar_anggota_sibulan');?>" class="dropdown-item">SiBulan</a>
                  </li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle pl-0"><b>Transaksi</b></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?=base_url('index.php/admin/transaksi_simpanan');?>" class="dropdown-item">Anggota</a></li>
              <!-- <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li> -->

                  <!-- Level three dropdown-->
                  <!-- <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li> -->
                  <!-- End Level three -->

                  <!-- <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li> -->
              <li><a href="<?=base_url('index.php/biaya_organisasi/transaksi');?>" class="dropdown-item">Biaya Organisasi</a></li>
              <li><a href="<?=base_url('index.php/beban_biaya_pengurus/transaksi');?>" class="dropdown-item">Beban Biaya Pengurus</a></li>
              <li><a href="<?=base_url('index.php/beban_simpanan_wajib_tarik/transaksi');?>" class="dropdown-item">Beban Simpanan Wajib Tarik</a></li>
              <li><a href="<?=base_url('index.php/bunga_sibuhari/transaksi');?>" class="dropdown-item">Bunga Sibuhari Swastisari</a></li>
              <li><a href="<?=base_url('index.php/bunga_simapan/transaksi');?>" class="dropdown-item">Bunga Simapan</a></li>
              <li><a href="<?=base_url('index.php/dcu/transaksi');?>" class="dropdown-item">Dana Cadangan Umum</a></li>
              <li><a href="<?=base_url('index.php/dcr/transaksi');?>" class="dropdown-item">Dana Cadangan Resiko</a></li>
              <li><a href="<?=base_url('index.php/hibah_donasi/transaksi');?>" class="dropdown-item">Hibah / Donasi</a></li>
              <li><a href="<?=base_url('index.php/inventaris/transaksi');?>" class="dropdown-item">Inventaris</a></li>
              <li><a href="<?=base_url('index.php/investasi/transaksi');?>" class="dropdown-item">Investasi</a></li>
              <li><a href="<?=base_url('index.php/investasi_simapan/transaksi');?>" class="dropdown-item">Investasi Simapan</a></li>
              <li><a href="<?=base_url('index.php/kalkulator/transaksi');?>" class="dropdown-item">Kalkulator + FC + Jilid + Notebook + B. Sibuhari</a></li>
              <li><a href="<?=base_url('index.php/laba_penjualan/transaksi');?>" class="dropdown-item">Laba Pejualan</a></li>
              <li><a href="<?=base_url('index.php/pelunasan_biaya_organisasi/transaksi');?>" class="dropdown-item">Pelunasan Biaya Organisasi</a></li>
              <li><a href="<?=base_url('index.php/pendapatan_lainnya/transaksi');?>" class="dropdown-item">Pendapatan Lainnya</a></li>
              <li><a href="<?=base_url('index.php/persediaan/transaksi');?>" class="dropdown-item">Persediaan</a></li>
              <li><a href="<?=base_url('index.php/piutang_arisan/transaksi');?>" class="dropdown-item">Piutang Arisan</a></li>
              <li><a href="<?=base_url('index.php/piutang_konsumsi/transaksi');?>" class="dropdown-item">Piutang Konsumsi</a></li>
              <li><a href="<?=base_url('index.php/rat/transaksi');?>" class="dropdown-item">Rat</a></li>
              <li><a href="<?=base_url('index.php/admin/transaksi_sibulan');?>" class="dropdown-item">Sibulan</a></li>
              <li><a href="<?=base_url('index.php/sibuhari/transaksi');?>" class="dropdown-item">Sibuhari Swastisari</a></li>
              <!-- <li><a href="<?=base_url('index.php/shu/transaksi');?>" class="dropdown-item">SHU</a></li> -->
              <li><a href="<?=base_url('index.php/simapan/transaksi');?>" class="dropdown-item">Simapan</a></li>
              <li><a href="<?=base_url('index.php/titipan_arisan/transaksi');?>" class="dropdown-item">Titipan Arisan</a></li>
              <li><a href="<?=base_url('index.php/titipan_konsumsi/transaksi');?>" class="dropdown-item">Titipan Konsumsi</a></li>
              <li><a href="<?=base_url('index.php/titipan_simpanan/transaksi');?>" class="dropdown-item">Titipan Simpanan</a></li>
              <li><a href="<?=base_url('index.php/tanah/transaksi');?>" class="dropdown-item">Tanah</a></li>
              <li><a href="<?=base_url('index.php/admin/transaksi_tak_terduga');?>" class="dropdown-item">Tak Terduga</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle pl-0"><b>Laporan</b></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Simpanan</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/laporan_simpanan/rekap/'.$_SESSION['bulan'])?>" class="dropdown-item">Rekap Simpanan</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/laporan_simpanan/pokok/'.$_SESSION['bulan'])?>" class="dropdown-item">Simpanan Pokok</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/laporan_simpanan/wajib/'.$_SESSION['bulan'])?>" class="dropdown-item">Simpanan Wajib</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="<?=base_url('index.php/admin/laporan_simpanan/sukarela/'.$_SESSION['bulan'])?>" class="dropdown-item">Simpanan Sukarela</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown-divider"></li>
              
              <li><a href="<?=base_url('index.php/admin/bukuBesar');?>" class="dropdown-item">Buku Besar</a></li>
              <li><a href="<?=base_url('index.php/admin/laporan_simpanan/bunga/'.$_SESSION['bulan']);?>" class="dropdown-item">Bunga Pinjaman</a></li>
              <li><a href="<?=base_url('index.php/admin/bulan_saham');?>" class="dropdown-item">Bulan Saham</a></li>
              <li><a href="<?=base_url('index.php/admin/daftar_bagiSHU');?>" class="dropdown-item">Daftar Bagi SHU</a></li>
              <li><a href="<?=base_url('index.php/admin/daftar_piutang_anggota');?>" class="dropdown-item">Daftar Piutang Anggota</a></li>
              <li><a href="<?=base_url('index.php/admin/daftar_jatuh_tempo');?>" class="dropdown-item">Daftar Jatuh Tempo</a></li>
              <li><a href="<?=base_url('index.php/admin/laporan_simpanan/dana_kematian/'.$_SESSION['bulan']);?>" class="dropdown-item">Dana Kematian</a></li>
              <li><a href="<?=base_url('index.php/admin/laporan_simpanan/uang_konsumsi/'.$_SESSION['bulan']);?>" class="dropdown-item">Konsumsi</a></li>
              <li><a href="<?=base_url('index.php/admin/daftar_lksb');?>" class="dropdown-item">LKSB</a></li>
              <li><a href="<?=base_url('index.php/admin/daftar_sibulan');?>" class="dropdown-item">SiBulan</a></li>
              <li><a href="<?=base_url('index.php/admin/laporan_sumsuk/');?>" class="dropdown-item">SUM & SUK</a></li>

              </ul>
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
            <a href="<?=base_url('index.php/pengaturan');?>" class="dropdown-item"><i class="fa fa-cog mr-2"></i> Pengaturan</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a href="http://localhost/phpmyadmin/db_import.php?db=db_koperasiv4" class="dropdown-item"><i class="fa fa-upload mr-2"></i> Upload Data</a> -->
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a href="http://localhost/phpmyadmin/db_export.php?db=db_koperasiv4" class="dropdown-item"><i class="fa fa-download mr-2"></i> Backup Data</a> -->
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
  <div class="content-wrapper" style="overflow:scroll; scrollbar-width:none; height:100vh;">
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

