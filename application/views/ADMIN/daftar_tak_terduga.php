<div class="row mb-3">
      <div class="col">
          <a href="<?=base_url('admin');?>" class="btn btn-warning">
              <i class="fa fa-list"></i> <b>Menu</b>
          </a>
      </div>
    </div>
    <div class="row mb-2 mt-2">
      <div class="col-lg-12">
        <h1><?= $judul; ?></h1>
      </div>
    </div>
    <div class="row">
        <?php foreach ($daftar as $ds) { ?>
            <a href="<?=base_url('admin/'.$ds['page']);?>" class="col-3 col-sm-6 col-md-3">
                <div class="info-box">
                   
                    <div class="info-box-content">
                        <span class="info-box-text"><b><?= $ds['jenis']; ?></b></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
            <!-- /.col -->
        <?php } ?>
    </div>
