<div class="row mb-3">
  <div class="col-3">
      <a href="<?=base_url('admin');?>" class="btn btn-warning">
          <i class="fa fa-list"></i> <b>Menu</b>
      </a>
  </div>
</div>

<?php if( $this->session->flashdata('input_slip_masuk_message') ) {?>
    <?=$this->session->flashdata('input_slip_masuk_message');?>
<?php } ?>

<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Daftar Anggota</h3>
          </div>
          <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width:60px">Nama</th>
                          <th>Jenis Simpanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($data_anggota as $anggota) : ?>
                          <tr>
                            <form action="<?=base_url("/admin/simpan_slip_uang_masuk");?>" method="post">
                              <td>
                                <?= $anggota['nama_anggota']; ?>
                                <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">
                              </td>
                              <td>
                                <div class="row">
                                  <?php foreach($jenis_simpanan_masuk as $pilihan) :?>
                                      <?php if (!is_numeric(array_search($pilihan['id_jenis_simpanan'], $id_sembunyi))) { ?>
                                        <div class="col-3">
                                          <label><?= $pilihan['nama_jenis_simpanan'] ?></label>
                                          <input style="font-size:14px" type="number" name="<?=$pilihan['id_jenis_simpanan'];?>" class="form-control" placeholder="Rp. " >
                                        </div>
                                      <?php } ?>
                                  <?php endforeach; ?>
                                        <div class="col-3">
                                          <label>&nbsp;</label>
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-icon-split">
                                              <span class="icon text-white-50">
                                                  <i class="fas fa-check"></i>
                                              </span>
                                              <span class="text">Simpan</span>
                                            </button>
                                          </div>
                                        </div>
                                </div>
                              </td>
                            </form>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="width:60px">Nama</th>
                          <th>Jenis Simpanan</th>
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