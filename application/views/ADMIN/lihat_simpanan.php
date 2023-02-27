<div class="row mb-3">
  <div class="col-3">
      <a href="<?=base_url('lihat_simpanan/daftar_simpanan_'.$jenis);?>" class="btn btn-danger">
          <i class="fa fa-arrow-left"></i> <b>Kembali</b>
      </a>
      <a href="<?=base_url('admin');?>" class="btn btn-warning">
          <i class="fa fa-list"></i> <b>Menu</b>
      </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Daftar Anggota</h3>
          </div>
          <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-sm table-striped">
                      <thead>
                          <tr>
                              <th>ID Anggota</th>
                              <th>Nama Anggota</th>
                              <th>S/D Desember <?= $_SESSION['tahun'] - 1 ?></th>
                              <th>S/D Desember <?= $_SESSION['tahun'] ?></th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach($simpanan as $anggota) : ?>
                          <tr>
                            <td><?=$anggota['id_anggota'];?></td>
                            <td><?=$anggota['nama_anggota'];?></td>
                            <td>Rp. <?=number_format($anggota['data_jumlah_tahun_lalu'],0,',','.');?></td>
                            <td>Rp. <?=number_format($anggota['data_jumlah_tahun_ini'] + $anggota['data_jumlah_tahun_lalu'],0,',','.');?></td>
                            <td>
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop<?=$anggota['id_anggota'];?>">
                                  <i class="fa fa-eye"></i>
                              </button>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>ID Anggota</th>
                              <th>Nama Anggota</th>
                              <th>S/D Desember <?= $_SESSION['tahun'] - 1 ?></th>
                              <th>S/D Desember <?= $_SESSION['tahun'] ?></th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
                      <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!-- /.col -->
  </div>
</div>




          
          <?php foreach($simpanan as $anggota) : ?>  
          <!-- .................................................... MODAL -->

          <div class="modal fade" id="staticBackdrop<?=$anggota['id_anggota'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
          <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Data <?=$anggota['nama_anggota'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Bulan</th>
                      <th>Nominal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $a=1; ?>
                    <?php foreach($bulan as $b) : ?>
                    <tr>
                      <td><?=$b;?></td>
                      <td>Rp. <?=number_format($anggota[strtolower($b)],0,',','.');?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><b>Jumlah</b></td>
                        <td><b>Rp. <?= number_format($anggota['data_jumlah_tahun_ini'],0,',','.') ?></b></td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>

                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>