<div class="row">
    <div class="col-lg-3 card shadow" style="height:81.2vh;">
        <div class="card-header">
            <h3 class="card-title"><b>Inputan Transaksi Pinjaman</b></h3>
        </div>
        <div class="card-body">
            <div class="row menus pinjaman">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="anggota" class="form-label">Nama</label>
                        <select class="form-control select2" style="width: 100%;" id="id_anggota">
                        <?php foreach ($anggota as $a) : ?>
                            <option value="<?=$a['id_anggota']?>"><?= $a['nama_anggota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Pinjaman Anggota</label>
                        <input type="text" class="form-control form-control-sm rupiah" id="pinjaman_anggota" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Lama Pinjaman</label>
                        <input type="text" class="form-control form-control-sm lama-pinjaman">
                    </div>
                </div>
                <div class="col-lg-6 waktuisi">
                    <div class="form-group">
                        <label for="">Waktu Pinjaman</label>
                        <input type="text" class="form-control form-control-sm" id="tanggal_pinjaman" value="<?=date($_SESSION['tahun'].'-'.$_SESSION['bulan'].'-'.$_SESSION['hari'])?>">
                    </div>
                </div>
                <div class="col-lg-6 waktuinfo" style="display:none">
                    <div class="form-group">
                        <label for="">Waktu Pinjaman</label>
                        <input type="text" class="form-control form-control-sm waktu-pinjaman" name="waktu_pinjaman" disabled value="<?= $_SESSION['hari'].' '._getBulan($_SESSION['bulan']).' '.$_SESSION['tahun'] ?>">
                    </div>
                </div>
                <div class="col-lg-12 waktuinfo" style="display:none">
                    <div class="form-group">
                        <label for="">Jatuh Tempo</label>
                        <input type="text" class="form-control form-control-sm" id="jatuh-tempo" name="lunas" disabled value="<?=_jatuhTempo(1);?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-block btn-simpan-pinjaman"><i class="fa fa-check"></i> <b>Validasi Pinjaman</b></button>
                </div>
                
                <div class="col-lg-12 mt-2 piutang-field">
                    <div class="form-group">
                        <label for="">Tanggal Piutang</label>
                        <input type="text" class="form-control form-control-sm" id="tanggal_piutang" value="<?=date($_SESSION['tahun'].'-'.$_SESSION['bulan'].'-'.$_SESSION['hari']);?>">
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
                <div class="col-lg-12 piutang-field">
                    <button type="submit" class="btn btn-primary btn-block btn-simpan-piutang"><i class="fa fa-check"></i> <b>Validasi Piutang</b></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-7">
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
            <div class="col-lg-5">
                <div class="card shadow" style="height:81vh">
                    <!-- /.card-header -->
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Riwayat Transaksi Tahun <?= $_SESSION['tahun']; ?></b></h3>
                    </div>
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 mt-4 pb-4" style="height: 450px;">
                        <table class="table table-head-fixed table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="daftar-riwayat-anggota" style="font-size: 11px;">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>