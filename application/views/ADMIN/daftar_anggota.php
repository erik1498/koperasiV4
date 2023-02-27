<div class="row">
    <div class="col-lg-9">
        <div class="card shadow" style="height:78.2vh;">
            <div class="card-header border-0">
                <h3 class="card-title"><b>Daftar Anggota Koperasi</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4">
                <table class="table table-sm table-head-fixed text-nowrap" id="example1">
                    <thead>
                        <tr>
                            <th width="20">No. Urut</th>
                            <th width="20">No. Anggota</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($anggota as $a) : ?>
                            <tr class="anggota_<?=$a['id_anggota']?>">
                                <td><?= $i++; ?></td>
                                <td><?= $a['no_buku']; ?></td>
                                <td><?= $a['nama_anggota']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary btn-edit menu" data-id="<?=$a['id_anggota']?>" data-no_buku = "<?=$a['no_buku'];?>" data-nama="<?=$a['nama_anggota'];?>" data-tahun="<?=explode('-',$a['tgl_daftar'])[0];?>" data-bulan="<?=intval(explode('-',$a['tgl_daftar'])[1]);?>" data-tanggal="<?=explode('-',$a['tgl_daftar'])[2];?>" data-page="editAnggota" data-felement="#nama_anggota_edit"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-sm btn-danger btn-hapus-anggota" data-toggle="modal" data-no="<?=$a['no_buku'];?>" data-target="#modal-hapus-anggota" data-id="<?=$a['id_anggota'];?>" data-nama="<?=$a['nama_anggota'];?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="card-title form-title"><b>Tambah Anggota</b></h3>
            </div>
            <div class="card-body">
                <form action="" method="post" class="menus tambahAnggota">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nomor Anggota</label>
                                <input type="text" class="form-control no_buku" name="no_buku" value="<?=$no_buku;?>">
                                <p class="text-center bg-red rounded alert-buku" style="display:none"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="tanggal" value="<?=$_SESSION['hari'];?>">
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Bulan</label>
                                <select name="bulan" class="form-control form-control-sm">
                                    <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                        <option value="<?=$i?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control form-control-sm" name="tahun" value="<?=$_SESSION['tahun'];?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="nama_anggota_tambah" name="nama">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Simp. Pokok</label>
                                <input type="text" class="form-control form-control-sm rupiah" name="simpanan_pokok">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Uang Pangkal</label>
                                <input type="text" class="form-control form-control-sm rupiah" name="uang_pangkal">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Adm Pelayanan</label>
                                <input type="text" class="form-control form-control-sm rupiah" name="administrasi_pelayanan">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Jumlah Tanggungan</label>
                                <input type="text" class="form-control form-control-sm rupiah" name="tanggungan">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block btn-tambah-anggota-save"><i class="fa fa-save"></i> <b>Simpan Anggota</b></button>
                        </div>
                    </div>
                </form>
                <form action="" class="menus editAnggota" method="post" style="display:none">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nomor Buku</label>
                                <input type="text" class="form-control" id="no_buku_edit" name="no_buku" value="<?=$no_buku;?>">
                                <p class="text-center bg-red rounded alert-buku-edit" style="display:none"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="tanggal" id="tanggal_edit" value="<?=$_SESSION['hari'];?>">
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Bulan</label>
                                <select name="bulan" id="bulan_edit" class="form-control form-control-sm">
                                    <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                        <option value="<?=$i?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control form-control-sm" name="tahun" id="tahun_edit" value="<?=$_SESSION['tahun'];?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="nama_anggota_edit" name="nama">
                                <input type="hidden" class="form-control" id="id_anggota_edit" name="id">
                                <input type="hidden" name="edit" value="true">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Simp. Pokok</label>
                                <input type="text" class="form-control form-control-sm rupiah" id="simpanan_pokok_edit" name="simpanan_pokok">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Uang Pangkal</label>
                                <input type="text" class="form-control form-control-sm rupiah" id="uang_pangkal_edit" name="uang_pangkal">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Adm Pelayanan</label>
                                <input type="text" class="form-control form-control-sm rupiah" id="administrasi_pelayanan_edit" name="administrasi_pelayanan">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Jumlah Tanggungan</label>
                                <input type="text" class="form-control form-control-sm rupiah" id="tanggungan_edit" name="tanggungan">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block btn-edit-anggota-save"><i class="fa fa-save"></i> <b>Simpan Anggota</b></button>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <button class="btn btn-danger btn-block menu btn-batal" data-page="tambahAnggota" data-felement="#nama_anggota_tambah" type="button"><i class="fa fa-times"></i> <b>Batal</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-hapus-anggota">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('index.php/admin/anggota_keluar');?>" method="post">
            <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal</label>            
                            <input type="text" id="tanggal" class="form-control form-control-sm" name="tanggal_keluar" value="<?=$_SESSION['hari'];?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="bulan" class="form-label">Bulan</label>
                            <select id="bulan" class="form-control form-control-sm" name="bulan_keluar">
                                <?php $i=1; foreach (_daftarBulanList() as $b) : ?>
                                    <option value="<?=$i?>" <?= $i == intval($_SESSION['bulan']) ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tahun" class="form-label">Tahun</label>            
                            <input type="text" id="tahun" class="form-control form-control-sm" name="tahun_keluar" value="<?=$_SESSION['tahun'];?>">
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <table class="table-sm">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Nama</th>
                                    <td>:</td>
                                    <td class="nama-anggota"></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">No. Anggota</th>
                                    <td>:</td>
                                    <td class="no-anggota"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <p class="lead"><b>Detail Simpanan Anggota</b></p>
                        
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Pokok</th>
                                        <td class="pokok-detail">Rp. 0</td>
                                    </tr>
                                    <tr>
                                        <th>Wajib</th>
                                        <td class="wajib-detail">Rp. 0</td>
                                    </tr>
                                    <tr>
                                        <th>Sukarela</th>
                                        <td class="sukarela-detail">Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="lead"><b>Detail Pinjaman Anggota</b></p>
                        
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Pinjaman</th>
                                        <td class="pinjaman-detail">Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Total Simpanan</th>
                                        <td class="total-simpanan">Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Total Pinjaman</th>
                                        <td class="pinjaman-detail">Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Total</th>
                                    <td class="total-anggota">Rp. 0</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Potongan Administrasi</th>
                                    <td>Rp. 250.000</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Di Ambil Anggota</th>
                                    <td class="diambil-anggota">Rp. 0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_anggota" class="id-anggota-hapus">
                <button type="submit" class="btn btn-danger">Hapus Anggota</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->