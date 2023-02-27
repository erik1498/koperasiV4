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
          <i class="fa fa-plus"></i> <b>Tambah Tak Terduga Masuk</b>
      </button>
  </div>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="modal-tambah_pengeluaran_masuk">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tak Terduga Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
          </div>
      
          <form action="<?=base_url();?>/admin/tambah_pengeluaran_masuk" method="post">
              <div class="form-group">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="Uraian">Uraian</label>
                      <div class="row">
                        <div class="col-12">
                          <textarea class="form-control" name="uraian" id="Uraian" cols="30" rows="10"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control rupiah" id="Jumlah">
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
              <h3 class="card-title">Daftar Pengeluaran Tak Terduga ( Masuk )</h3>
          </div>
          <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Uraian</th>
                              <th>Jumlah</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1; foreach ($daftar as $d) { ?>
                              <tr>
                                  <td><?= $i++; ?></td>
                                  <td><?= $d['uraian']; ?></td>
                                  <td>Rp. <?= number_format($d['jumlah'],0,',','.'); ?></td>
                                  <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?=$d['id_daftar_takterduga_masuk'];?>">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    <div class="modal fade" id="editModal<?=$d['id_daftar_takterduga_masuk'];?>" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?=$d['id_daftar_takterduga_masuk'];?>">Form Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?=base_url('admin/edit_pengeluaran_takterduga_masuk/'.$d['id_daftar_takterduga_masuk']);?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                          <label for="Uraian">Uraian</label>
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <textarea class="form-control" name="uraian" id="Uraian" cols="30" rows="10"><?= $d['uraian']; ?></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="editJumlah<?=$d['id_daftar_takterduga_masuk'];?>">Jumlah</label>
                                                            <input type="text" name="jumlah" class="form-control rupiah" id="editJumlah<?=$d['id_daftar_takterduga_masuk'];?>" value="<?=number_format($d['jumlah'],0,',','.');?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#hapusModal<?=$d['id_daftar_takterduga_masuk'];?>">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="hapusModal<?=$d['id_daftar_takterduga_masuk'];?>" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?=$d['id_daftar_takterduga_masuk'];?>">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <p for="editNama<?=$d['id_daftar_takterduga_masuk'];?>">Yakin Hapus <b><?= $d['uraian']; ?></b> ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="<?=base_url('admin/hapus_pengeluaran_takterduga_masuk/'.$d['id_daftar_takterduga_masuk']);?>" class="btn btn-danger">Hapus</a>
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
                      <th>Uraian</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="text" name="" class="form-control"  >
                      </td>
                      <td>
                          <input type="number" class="form-control" placeholder="Rp.">
                      </td>
                    </tr>
                  </tbody>
                </table>
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
            </div>
          </div> -->
