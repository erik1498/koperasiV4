<?php if( $this->session->flashdata('input_anggota_message') ) {?>
    <?=$this->session->flashdata('input_anggota_message');?>
<?php } ?>

<div class="row mb-3">
  <div class="col">
      <a href="<?=base_url('admin/pengeluaran_tak_terduga');?>" class="btn btn-danger">
          <i class="fa fa-arrow-left"></i> <b>Kembali</b>
      </a>
      <a href="<?=base_url('admin');?>" class="btn btn-warning">
          <i class="fa fa-list"></i> <b>Menu</b>
      </a>
  </div>
  <div class="col">
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah_pengeluaran_masuk">
          <i class="fa fa-plus"></i> <b>Tambah Tak Terduga Keluar</b>
      </button>
  </div>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="modal-tambah_pengeluaran_masuk">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tak Terduga Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
          </div>
      
          <form action="<?=base_url();?>/admin/tambah_pengeluaran_keluar" method="post">
              <div class="form-group">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Uraian</label>
                      <select class="form-control" aria-label="Default select example" name="id_takterduga_keluar">
                        <?php foreach($takterduga_keluar as $keluar) : ?>
                            <option value="<?=$keluar['id_takterduga_keluar'];?>"><?= $keluar['nama_takterduga_keluar']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control rupiah" id="Jumlah">
                    </div>
                    <div class="form-group">
                      <label for="Keterangan">Keterangan</label>
                      <div class="row">
                        <div class="col-12">
                          <textarea class="form-control" name="keterangan" id="Keterangan" cols="30" rows="10"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </div>
              </div>
          </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Daftar Pengeluaran Tak Terduga ( Keluar )</h3>
          </div>
          <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Uraian</th>
                              <th>Keterangan</th>
                              <th>Jumlah</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1; foreach ($daftar as $d) { ?>
                              <tr>
                                  <td><?= $i++; ?></td>
                                  <td><?= $d['nama_takterduga_keluar']; ?></td>
                                  <td><?= $d['keterangan']; ?></td>
                                  <td>Rp. <?= number_format($d['jumlah'],0,',','.'); ?></td>
                                  <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?=$d['id_daftar_takterduga_keluar'];?>">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    <div class="modal fade" id="editModal<?=$d['id_daftar_takterduga_keluar'];?>" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?=$d['id_daftar_takterduga_keluar'];?>">Form Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?=base_url('admin/edit_pengeluaran_takterduga_keluar/'.$d['id_daftar_takterduga_keluar']);?>" method="post">
                                                    <div class="form-group">
                                                      <div class="modal-body">
                                                        <div class="form-group">
                                                          <label>Uraian</label>
                                                          <select class="form-control" aria-label="Default select example" name="id_takterduga_keluar">
                                                            <?php foreach($takterduga_keluar as $keluar) : ?>
                                                              <option value="<?=$keluar['id_takterduga_keluar'];?>"
                                                                <?php if ($keluar['id_takterduga_keluar'] == $d['id_takterduga_keluar']) {
                                                                  echo('selected');
                                                                } ?>
                                                              >
                                                                <?= $keluar['nama_takterduga_keluar']; ?>
                                                              </option>
                                                            <?php endforeach; ?>
                                                          </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Jumlah">Jumlah</label>
                                                            <input type="text" name="jumlah" class="form-control rupiah" id="Jumlah" value="<?=number_format($d['jumlah'],0,',','.')?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="Keterangan">Keterangan</label>
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <textarea class="form-control" name="keterangan" id="Keterangan" cols="30" rows="10"><?=$d['keterangan']?></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                      </div>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#hapusModal<?=$d['id_daftar_takterduga_keluar'];?>">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="hapusModal<?=$d['id_daftar_takterduga_keluar'];?>" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?=$d['id_daftar_takterduga_keluar'];?>">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <p for="editNama<?=$d['id_daftar_takterduga_keluar'];?>">Yakin Hapus <b><?= $d['nama_takterduga_keluar']; ?></b> No Ururt <b><?= $i - 1 ?></b> ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="<?=base_url('admin/hapus_pengeluaran_takterduga_keluar/'.$d['id_daftar_takterduga_keluar']);?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Uraian</th>
                              <th>Keterangan</th>
                              <th>Jumlah</th>
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

<!-- DataTales Example -->
          <!-- <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width:400px;">Uraian</th>
                      <th style="width:200px;">Jumlah</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php for($a=0;$a<3;$a++) { ?>
                    <tr>
                      <td>
                        <select class="form-control" aria-label="Default select example">
                        <?php foreach($takterduga_keluar as $keluar) : ?>
                            <option value=""><?= $keluar['nama_takterduga_keluar']; ?></option>
                        <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                          <input type="number" class="form-control" placeholder="Rp.">
                      </td>
                      <td>
                        <div class="input-group">
                          <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
            </div>
          </div> -->
