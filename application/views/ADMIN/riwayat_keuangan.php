<div class="row mb-3">
  <div class="col-3">
      <a href="<?=base_url('admin/anggota');?>" class="btn btn-danger">
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
                  <h3 class="card-title">Daftar Riwayat Keuangan <b><?= $detail['nama_anggota']; ?></b></h3>
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Jenis Simpanan</th>
                                  <th>Jumlah</th>
                                  <th>Waktu</th>
                                  <th>Jenis</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($anggota as $a) { ?>
                                  <tr>
                                      <td><?= $a['nama_jenis_simpanan']; ?></td>
                                      <td>Rp. <?= number_format($a['jumlah'],0,',','.'); ?></td>
                                      <td><?= $a['waktu']; ?></td>
                                      <td
                                        style="
                                            background-color:<?php 
                                            if ($a['jenis'] == 'masuk')
                                                echo 'green';
                                            else
                                                echo 'red';
                                            ?>;
                                            font-weight:bold;
                                            color:white;"
                                      ><?= strtoupper($a['jenis']); ?></td>
                                  </tr>
                              <?php } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>Jenis Simpanan</th>
                                  <th>Jumlah</th>
                                  <th>Waktu</th>
                                  <th>Jenis</th>
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