<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UME MNASI APP</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/adminlte.min.css">
  <link rel="icon" href="<?=base_url('assets/logo/logo.png');?>" type="image/x-icon">
  <style>
    .lockscreen-wrapper{
      max-width:600px;
      margin:5% auto;
    }
    .lockscreen-item{
      width:50%;
    }
    .card-body{
      background-color:#e9ecef;
    }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper" style="margin-top:16%">

  

  <div class="lockscreen-logo">
    <a href="#"><b>Koperasi UME MNASI</b></a>
  </div>

  
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <?php if( $this->session->flashdata('message') ) {?>
      <?=$this->session->flashdata('message');?>
      <br>
    <?php } ?>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- /.lockscreen-image -->

      <form action="<?=base_url('index.php/auth/loginsubmit');?>" method="post">
        <div class="card-body text-center">
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control text-center" id="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
      </form>
    

  </div>
  <div class="lockscreen-footer text-center">
    <b>Koperasi</b>
    <br>
    <b>UME MNASI</b>
    <br>
    Copyright &copy; <?= date('Y'); ?>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="<?=base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>