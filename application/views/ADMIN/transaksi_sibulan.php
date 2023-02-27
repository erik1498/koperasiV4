<div class="row">
    <div class="col-lg-3">
        <div class="row card shadow">
            <div class="card-header">
                <h3 class="card-title"><b>Inputan Transaksi SiBulan</b></h3>
            </div>
            <div class="card-body" style="height: 76.2vh;">
                <div class="col-lg-12">
                    <div class="menus SimpananPage">
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
                                            <?php if ($i <= intval($_SESSION['bulan'])) { ?>
                                                <option value="<?=$i?>" <?= $i == intval($_SESSION['bulan']) ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                            <?php } ?>
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
                                    <select class="form-control select2" style="width: 100%;" id="id_anggota">
                                        <?php foreach ($anggota as $a) : ?>
                                            <option value="<?=$a['id_anggota_sibulan']?>"><?= $a['nama_anggota']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="menus-sub row inputForm">
                            <div class="col-lg-12 kredit-field">
                                <div class="form-group">
                                    <label for="nilaiKredit">Kredit</label>
                                    <input type="text" class="form-control form-control-sm rupiah" id="nilai_kredit">
                                </div>
                            </div>
                            <div class="col-lg-4 kredit-field saldo-field">
                                <button class="btn btn-warning btn-block btn-plus-kredit-all" data-kredit=""><b>Semua</b></button>
                            </div>
                            <div class="col-lg-8 mb-3 kredit-field">
                                <button class="btn btn-primary btn-block btn-plus-kredit"><i class="fa fa-check"></i> <b>Validasi Kredit</b></button>
                            </div>

                            <div class="col-lg-6 mb-3 btn-edit-kredit" style="display:none;">
                                <button class="btn btn-primary btn-block simpan-edit-kredit" data-id=""><i class="fa fa-check"></i> <b>Simpan Kredit</b></button>
                            </div>

                            <div class="col-lg-6 mb-3 btn-edit-kredit" style="display:none;">
                                <button class="btn btn-danger btn-block batal-edit-kredit"><i class="fa fa-times"></i> <b>Batal</b></button>
                            </div>
                            
                            <div class="col-lg-12 saldo-field">
                                <div class="form-group">
                                    <label for="Bunga">Bunga ( <?= _getBulan($_SESSION['bulan']); ?> )</label>
                                    <input type="text" class="form-control form-control-sm" id="Bunga" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 saldo-field">
                                <div class="form-group">
                                    <label for="saldoValue">Saldo</label>
                                    <input type="text" class="form-control form-control-sm rupiah" id="saldoValue" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 saldo-field">
                                <div class="form-group">
                                    <label for="nilaiSaldo">Saldo Masuk</label>
                                    <input type="text" class="form-control form-control-sm rupiah" id="nilai_saldo">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 saldo-field">
                                <button class="btn btn-primary btn-block btn-plus-saldo"><i class="fa fa-check"></i> <b>Validasi Saldo</b></button>
                            </div>

                            <div class="col-lg-6 mb-3 btn-edit-saldo" style="display:none;">
                                <button class="btn btn-primary btn-block simpan-edit-saldo" data-id=""><i class="fa fa-check"></i> <b>Simpan Saldo</b></button>
                            </div>

                            <div class="col-lg-6 mb-3 btn-edit-saldo" style="display:none;">
                                <button class="btn btn-danger btn-block batal-edit-saldo"><i class="fa fa-times"></i> <b>Batal</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow" style="height:81.8vh;">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Detail Sibulan Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table text-center table-sm table-bordered" style="font-size:13.4px;">
                            <thead>
                                <th>Bulan</th>
                                <th>Bunga</th>
                                <th>Debet</th>
                                <th>Total Debet</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>s.d 31 Desember <?= $_SESSION['tahun'] - 1; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="saldo_0">0</td>
                                </tr>
                                <?php foreach ($bulan as $b) : ?>
                                    <tr>
                                        <td><?= $b['nama']; ?></td>
                                        <td class="bunga_<?=$b['urut']?>">0</td>
                                        <td class="debet_<?=$b['urut']?>">0</td>
                                        <td class="total_debet_<?=$b['urut']?>">0</td>
                                        <td class="kredit_<?=$b['urut']?>">0</td>
                                        <td class="saldo_<?=$b['urut']?>">0</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow" style="height:81.8vh;">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Transaksi Sibulan Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table text-center table-sm table-bordered" style="font-size:13.4px;">
                            <thead>
                                <th>Jenis</th>
                                <th>Waktu</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody class="riwayat_sibulan">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>