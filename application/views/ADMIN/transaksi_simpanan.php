<div class="row">
    <div class="col-lg-3 card shadow" style="height:auto;">
        <div class="card-header">
            <h3 class="card-title"><b>Inputan Transaksi Anggota</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 tgl-simpanan">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control form-control-sm" id="tanggal" value="<?=$_SESSION['hari'];?>">
                    </div>
                </div>
                <div class="col-lg-4 tgl-simpanan">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select id="bulan" class="form-control form-control-sm">
                            <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                <option value="<?=$i?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 tgl-simpanan">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control form-control-sm" id="tahun" value="<?=$_SESSION['tahun'];?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="anggota" class="form-label">Nama</label>
                        <select class="form-control form-control-sm select2" style="width: 100%;" id="id_anggota">
                        <?php foreach ($anggota as $a) : ?>
                            <option value="<?=$a['id_anggota']?>"><?= $a['nama_anggota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row menus SimpananPage">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Simp. Wajib</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="simpanan_wajib">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Simp. Sukarela</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="simpanan_sukarela">
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-block btn-simpan-simpanan"><i class="fa fa-check"></i> <b>Validasi Simpanan</b></button>
                </div>
                <div class="col-lg-12 mt-2">
                    <button class="btn btn-success btn-block menu btn-pinjaman" data-page="pinjamanPage" data-felement="#pinjaman_anggota"><i class="fa fa-list"></i> <b>Pinjaman</b></button>
                </div>
                <div class="col-lg-12 mt-2">
                    <button class="btn btn-warning btn-block menu" data-page="lainnyaPage" data-felement="#uang_buku"><i class="fa fa-list"></i> <b>Lainnya</b></button>
                </div>
                <div class="col-lg-12 mt-2">
                    <button class="btn btn-danger btn-block menu btn-tarik" data-page="tarikPage" data-felement="#uang_buku"><i class="fa fa-list"></i> <b>Tarik</b></button>
                </div>
                <div class="col-lg-12 mt-2">
                    <button class="btn btn-dark btn-block menu btn-transaksi-edit" data-page="transaksiPage" data-felement="#pinjaman_anggota"><i class="fa fa-list"></i> <b>Riwayat Transaksi</b></button>
                </div>

            </div>
            <div class="row menus transaksiPage" style="display:none;">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="tipe_riwayat" disabled>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Jenis Simpanan</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="jenis_riwayat" disabled>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="tanggal_riwayat">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select id="bulan_riwayat" class="form-control form-control-sm">
                            <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                <option value="<?=$i++?>"><?= $b; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="tahun_riwayat">Tahun</label>
                        <input type="text" class="form-control form-control-sm" id="tahun_riwayat">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="jumlah_riwayat">
                    </div>
                </div>
                <div class="col-lg-12 ket-riwayat-field" style="dispaly:none;">
                    <div class="form-group">
                        <label for="">Ket</label>
                        <input type="text" class="form-control form-control-sm" id="ket_riwayat">
                        <input type="hidden" class="form-control form-control-sm rupiah" id="id_riwayat">
                    </div>
                </div>
                <div class="col-lg-12 lama-riwayat-field" style="dispaly:none;">
                    <div class="form-group">
                        <label for="">Lama Pinjaman</label>
                        <input type="text" class="form-control form-control-sm" id="lama_riwayat">
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <button class="btn btn-primary btn-block btn-simpan-riwayat-edit"><i class="fa fa-check"></i> <b>Simpan</b></button>
                </div>
                <div class="col-lg-6 mt-2">
                    <button class="btn btn-danger btn-block btn-simpanan menu" data-page="SimpananPage" data-felement="#simpanan_wajib"><i class="fa fa-times"></i> <b>Batal</b></button>
                </div>
            </div>
            <div class="row menus tarikPage" style="display:none;">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="anggota" class="form-label">Atas Nama</label>
                        <input type="text" class="form-control form-control-sm" id="ket_tarik">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Dana Kematian</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="dana_kematian_tarik">
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-primary btn-block btn-simpan-tarik"><i class="fa fa-check"></i> <b>Tarik</b></button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger btn-block menu btn-simpanan" data-page="SimpananPage" data-felement="#simpanan_wajib"><i class="fa fa-times"></i> <b>Batal</b></button>
                </div>
            </div>
            <div class="row menus lainnyaPage" style="display:none;">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Uang Buku</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="uang_buku">
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Bunga</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="bunga">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Materai</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="materai">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Provisi</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="provisi">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Dana Kematian</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="dana_kematian">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Uang Konsumsi</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="uang_konsumsi">
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-primary btn-block btn-simpan-transaksi-lainnya"><i class="fa fa-check"></i> <b>Validasi</b></button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger btn-block menu" data-page="SimpananPage" data-felement="#simpanan_wajib"><i class="fa fa-times"></i> <b>Batal</b></button>
                </div>
            </div>
            <div class="row menus pinjamanPage" style="display:none;">
                <div class="col-lg-4 waktuisi pinjaman-field">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control form-control-sm" id="tanggal_pinjaman" value="<?= $_SESSION['hari'];?>">
                    </div>
                </div>
                <div class="col-lg-4 waktuisi pinjaman-field">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select id="bulan_pinjaman" class="form-control form-control-sm">
                            <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                <option value="<?=$i?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++; ?>><?= $b; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 waktuisi pinjaman-field">
                    <div class="form-group">
                        <label for="tahun_pinjaman">Tahun</label>
                        <input type="text" class="form-control form-control-sm" id="tahun_pinjaman" value="<?=$_SESSION['tahun'];?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Pinjaman Anggota</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="pinjaman_anggota" >
                    </div>
                </div>
                <div class="col-lg-12 pinjaman-field">
                    <div class="form-group">
                        <label>Lama Pinjaman</label>
                        <input type="text" class="form-control form-control-sm lama-pinjaman">
                    </div>
                </div>
                
                <div class="col-lg-12 pinjaman-field">
                    <div class="form-group">
                        <label>Keterangan Pinjaman</label>
                        <textarea class="ket-pinjaman form-control" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="col-lg-6 waktuinfo" style="display:none">
                    <div class="form-group">
                        <label for="">Waktu Pinjaman</label>
                        <input type="text" data-waktu="<?= $_SESSION['hari'].' '._getBulan(intval($_SESSION['bulan'])).' '.$_SESSION['tahun'] ?>" class="form-control form-control-sm waktu-pinjaman" name="waktu_pinjaman" disabled value="<?= $_SESSION['hari'].' '._getBulan(intval($_SESSION['bulan'])).' '.$_SESSION['tahun'] ?>">
                    </div>
                </div>
                <div class="col-lg-6 waktuinfo" style="display:none">
                    <div class="form-group">
                        <label for="">Jatuh Tempo</label>
                        <input type="text" class="form-control form-control-sm" id="jatuh-tempo" name="lunas" disabled value="<?=_jatuhTempo(1);?>">
                    </div>
                </div>
                <div class="col-lg-6 pinjaman-field">
                    <button type="submit" class="btn btn-primary btn-block btn-simpan-pinjaman"><i class="fa fa-check"></i> <b>Validasi</b></button>
                </div>

                <div class="col-lg-4 piutang-field">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control form-control-sm" id="tanggal_piutang" value="<?= $_SESSION['hari'];?>">
                    </div>
                </div>
                <div class="col-lg-4 piutang-field">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select id="bulan_piutang" class="form-control form-control-sm">
                            <?php $i=1;  foreach (_daftarBulanList() as $b) : ?>
                                <option value="<?=$i?>" <?= $i == $_SESSION['bulan'] ? 'selected' : ''; $i++; ?>><?= $b; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 piutang-field">
                    <div class="form-group">
                        <label for="tahun_piutang">Tahun</label>
                        <input type="text" class="form-control form-control-sm" id="tahun_piutang" value="<?=$_SESSION['tahun'];?>">
                    </div>
                </div>

                <div class="col-lg-12 piutang-field">
                    <div class="form-group">
                        <label for="">Piutang Anggota</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="piutang_anggota">
                    </div>
                </div>
                <div class="col-lg-12 piutang-field">
                    <div class="form-group">
                        <label for="">Keterangan Piutang</label>
                        <input type="text" class="form-control form-control-sm" id="ket-piutang">
                    </div>
                </div>
                <div class="col-lg-6 piutang-field">
                    <button type="submit" class="btn btn-primary btn-block btn-simpan-piutang"><i class="fa fa-check"></i> <b>Validasi</b></button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger btn-block menu btn-simpanan" data-page="SimpananPage" data-felement="#simpanan_wajib"><i class="fa fa-times"></i> <b>Batal</b></button>
                </div>
                <div class="col-lg-12 mt-2 piutang-field">
                    <button class="btn btn-primary btn-tambah-pinjaman btn-block"><i class="fa fa-plus"></i> <b>Tambah Pinjaman</b></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-7 simpanan-info">
                <div class="card shadow" style="height:auto;">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Detail Keuangan Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table text-center table-sm table-bordered">
                            <thead>
                                <th>Bulan</th>
                                <th>Pokok</th>
                                <th>Wajib</th>
                                <th>Sukarela</th>
                            </thead>
                            <tbody style="font-size:11px">
                                <tr>
                                    <td>s.d 31 Desember <?= $_SESSION['tahun'] - 1; ?></td>
                                    <td class="pokok-tahun-lalu">0</td>
                                    <td class="wajib-tahun-lalu">0</td>
                                    <td class="sukarela-tahun-lalu">0</td>
                                </tr>
                                <?php foreach ($bulan as $b) : ?>
                                    <tr>
                                        <td><?= $b['nama']; ?></td>
                                        <td class="pokok_<?=$b['urut']?>">0</td>
                                        <td class="wajib_<?=$b['urut']?>">0</td>
                                        <td class="sukarela_<?=$b['urut']?>">0</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot style="font-size:11px">
                                <th>s.d 31 Desember <?= $_SESSION['tahun']; ?></th>
                                <th class="jumlah-pokok-des">0</th>
                                <th class="jumlah-wajib-des">0</th>
                                <th class="jumlah-sukarela-des">0</th>
                            </tfoot>
                            <tfoot style="font-size:11px">
                                <th>Jumlah</th>
                                <th class="jumlah-pokok">0</th>
                                <th class="jumlah-wajib">0</th>
                                <th class="jumlah-sukarela">0</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 simpanan-info">
                <div class="card shadow" style="height:50.5vh;">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Transaksi Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="daftar-riwayat-anggota" style="font-size: 14px;">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 simpanan-info">
                <div class="card shadow" style="height:10vh;">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title jum-bulan-ini-text"><b>Riwayat Transaksi Bulan</b></h3>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-4 jum-bulan-ini">Rp. 10.000</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 simpanan-info">
                <div class="card shadow"  style="height:auto;">
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Rekap Keuangan Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table text-center table-sm table-bordered">
                            <thead>
                                <th colspan="3">Simp. Pokok</th>
                                <th colspan="3">Simp. Wajib</th>
                                <th colspan="3">Simp. Sukarela</th>
                                <th colspan="3">Jumlah</th>
                            </thead>
                            <thead style="font-size:12px">
                                <th>s.d <?= $_SESSION['tahun'] - 1; ?></th>
                                <th><?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun'] - 1; ?></th>
                                <th><?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun'] - 1; ?></th>
                                <th><?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun'] - 1; ?></th>
                                <th><?= $_SESSION['tahun']; ?></th>
                                <th>s.d <?= $_SESSION['tahun']; ?></th>
                            </thead>
                            <tbody style="font-size:11px">
                                <tr>
                                    <td class="pokok-tahun-lalu"></td>
                                    <td class="jumlah-pokok">0</td>
                                    <td class="jumlah-pokok-des">0</td>
                                    <td class="wajib-tahun-lalu"></td>
                                    <td class="jumlah-wajib">0</td>
                                    <td class="jumlah-wajib-des">0</td>
                                    <td class="sukarela-tahun-lalu"></td>
                                    <td class="jumlah-sukarela">0</td>
                                    <td class="jumlah-sukarela-des">0</td>
                                    <td class="jumlah-tahun-lalu">0</td>
                                    <td class="jumlah-tahun-ini">0</td>
                                    <td class="jumlah-tahun-ini-des">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pinjaman-info" style="display:none;">
                <div class="card shadow" style="height: 81vh;">
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Pinjaman</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4 mt-4" style="height: 450px;">
                        <table class="table text-center table-sm table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Besaran</th>
                                    <th>Angsuran</th>
                                    <th>Sisa</th>
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody class="riwayat-pinjaman" style="font-size:12px;">
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-5 pinjaman-info" style="display:none">
                <div class="card shadow" style="height:81vh">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Transaksi Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="daftar-riwayat-anggota" style="font-size: 14px;">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 tarik-info" style="display:none">
                <div class="card shadow" style="height:81vh">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Penarikan Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="daftar-riwayat-tarik-anggota" style="font-size: 14px;">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 tarik-info" style="display:none">
                <div class="card shadow" style="height:81vh">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Tarik Dana Kematian</b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 14px;" class="riwayat-dana-kematian">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 transaksi-info" style="display:none">
                <div class="card shadow" style="height:81vh">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Transaksi Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="daftar-riwayat-anggota-edit" style="font-size: 14px;">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>