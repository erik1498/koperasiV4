<div class="row">
    <div class="col-lg-9">
        <div class="card shadow" style="height:76.2vh;">
            <div class="card-header border-0">
                <h3 class="card-title"><b>Daftar Anggota Sibulan</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px;">
                <table class="table table-sm table-head-fixed text-nowrap" id="example1">
                    <thead>
                        <tr>
                            <th width="200">No. Urut</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($anggota as $a) : ?>
                            <tr class="anggota_<?=$a['id_anggota_sibulan']?>">
                                <td><?= $i++; ?></td>
                                <td><?= $a['nama_anggota']; ?></td>
                                <td>
                                    <?php if (is_null($a['id_anggota'])) { ?>
                                        <button class="btn btn-sm btn-primary btn-edit menu" data-id="<?=$a['id_anggota_sibulan']?>" data-nama="<?=$a['nama_anggota'];?>" data-tanggal="<?=explode('-',$a['waktu_daftar'])[2];?>" data-bulan="<?=intval(explode('-',$a['waktu_daftar'])[1]);?>" data-tahun="<?=explode('-',$a['waktu_daftar'])[0];?>" data-page="editAnggota" data-felement="#nama_anggota_edit"><i class="fa fa-pen"></i></button>
                                    <?php } ?>
                                    <button class="btn btn-sm btn-danger btn-hapus-anggota-sibulan" data-id="<?=$a['id_anggota_sibulan']?>" data-nama="<?=$a['nama_anggota']?>" data-toggle="modal" data-target="#modal-hapus-anggota"><i class="fa fa-trash"></i></button>
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
                                        <option value="<?=$i < 10 ? '0'.$i : $i;?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
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
                                <input type="hidden" name="jenis" value="baru">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> <b>Simpan Anggota Baru</b></button>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <button type="button" class="btn btn-primary menu btn-block" data-page="tambahAnggotaKoperasi" data-felement="#nama_anggota_tambah"><i class="fa fa-plus"></i> <b>Anggota Koperasi</b></button>
                        </div>
                    </div>
                </form>
                <form action="" method="post" class="menus tambahAnggotaKoperasi" style="display:none;">
                    <div class="row">
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
                                        <option value="<?=$i < 10 ? '0'.$i : $i;?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
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
                                <select class="form-control select2" style="width: 100%;" id="id_anggota" name="id_anggota">
                                    <?php foreach ($anggota_koperasi as $a) : ?>
                                        <option value="<?=$a['id_anggota']?>"><?= $a['nama_anggota']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="jenis" value="koperasi">
                                <input type="hidden" name="nama" value="koperasi">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> <b>Simpan Anggota Koperasi</b></button>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <button class="btn btn-danger btn-block menu" data-page="tambahAnggota" data-felement="#nama_anggota_tambah" type="button"><i class="fa fa-times"></i> <b>Batal</b></button>
                        </div>
                    </div>
                </form>
                <form action="" class="menus editAnggota" method="post" style="display:none">
                    <div class="row">
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" id="tanggal_edit" name="tanggal" value="<?=$_SESSION['hari'];?>">
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="">Bulan</label>
                                <select name="bulan" id="bulan_edit" class="form-control form-control-sm">
                                    <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                        <option value="<?=$i < 10 ? '0'.$i : $i;?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 tgl-simpanan">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control form-control-sm" id="tahun_edit" name="tahun" value="<?=$_SESSION['tahun'];?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="nama_anggota_edit" name="nama">
                                <input type="hidden" class="form-control" id="id_anggota_edit" name="id" value="">
                                <input type="hidden" name="edit" value="true">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> <b>Simpan Anggota</b></button>
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
            <form action="<?=base_url('index.php/admin/anggota_keluar_sibulan');?>" method="post">
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
                            <label for="bulan_sibulan" class="form-label">Bulan</label>
                            <select id="bulan_sibulan" class="form-control form-control-sm" name="bulan_keluar">
                                <?php $i=1; foreach (_daftarBulanList() as $b) : ?>
                                    <?php if ($i <= intval($_SESSION['bulan'])) { ?>
                                        <option value="<?=$i?>" <?= $i == intval($_SESSION['bulan']) ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                    <?php } ?>
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
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama-anggota">Nama Anggota</label>
                            <input type="text" class="form-control nama-anggota" disabled>
                            <input type="hidden" name="nama_anggota" class="form-control nama-anggota">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="text" class="form-control saldo" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="diterima">Di Terima</label>
                            <input type="text" name="diterima" class="form-control diterima rupiah" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="sisa">Sisa Dana Sibulan</label>
                            <input type="text" class="form-control sisa" disabled>
                        </div>
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