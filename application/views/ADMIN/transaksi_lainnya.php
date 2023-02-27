<div class="row">
    <div class="col-lg-3 card shadow" style="height:81.2vh;">
        <div class="card-header">
            <h3 class="card-title"><b>Inputan Transaksi Simpanan</b></h3>
        </div>
        <div class="card-body">
            <div class="row menus SimpananPage">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" value="<?=date($_SESSION['tahun'].'-'.$_SESSION['bulan'].'-'.$_SESSION['hari']);?>">
                    </div>
                </div>
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
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-block btn-simpan-transaksi-lainnya"><i class="fa fa-check"></i> <b>Validasi Transaksi</b></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow" style="height:81vh;">
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
</div>