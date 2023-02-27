<div class="row">
    <div class="col-lg-3">
        <div class="row card shadow" style="height:auto;">
            <div class="card-header">
               <h3 class="card-title"><b>Inputan Transaksi Tak Terduga</b></h3>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan Data Tampil</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" id="bulan_tampil">
                                    <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
                                        <?php if ($i <= intval($_SESSION['bulan'])) { ?>
                                            <option value="<?=$i;?>"
                                                <?php if ($i == intval($_SESSION['bulan'])) {
                                                    echo('selected');
                                                } ?>
                                            ><?= $b; ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tanggal" class="form-label">Tanggal</label>            
                                <input type="text" id="tanggal" class="form-control form-control-sm" value="<?=$_SESSION['hari'];?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="bulan" class="form-label">Bulan</label>
                                <select id="bulan" class="form-control form-control-sm">
                                    <?php $i=1; foreach (_daftarBulanList() as $b) : ?>
                                        <option value="<?=$i?>" <?= $i == intval($_SESSION['bulan']) ? 'selected' : ''; $i++;?>><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tahun" class="form-label">Tahun</label>            
                                <input type="text" id="tahun" class="form-control form-control-sm" value="<?=$_SESSION['tahun'];?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Jenis Tak Terduga</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input tak-terduga-masuk" type="radio" id="customRadio2" name="customRadio" checked="">
                                            <label for="customRadio2" class="custom-control-label">Masuk</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input tak-terduga-keluar" type="radio" id="customRadio1" name="customRadio">
                                            <label for="customRadio1" class="custom-control-label">Keluar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Uraian</label>
                                <textarea id="uraian-masuk" id="" cols="30" rows="5" class="form-control"></textarea>
            
                                <input type="text" id="uraian-keluar" class="form-control form-control-sm" style="display:none">

                            </div>
                        </div>
                        <div class="col-lg-12 keterangan-keluar-form" style="display:none">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea id="keterangan-keluar" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" class="form-control form-control-sm rupiah" id="jumlah">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-danger btn-block btn-batal" style="display:none"><i class="fa fa-times"></i> <b>Batal</b></button>
                        </div>
                        <div class="col-lg-12 btn-validasi">
                            <button class="btn btn-primary btn-block btn-simpan-tak-terduga" data-id=""><i class="fa fa-check"></i> <b>Validasi</b></button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow" style="height: 37.2vh;">
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Tak Terduga Masuk</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px; scrollbar-weight:none;">
                        <table class="table table-sm table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Uraian</th>
                                    <th>Jumlah</th>
                                    <th>Aksi / Ket</th>
                                </tr>
                            </thead>
                            <tbody class="riwayat-takterduga-masuk">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow" style="height: 37.2vh;">
                    <div class="card-header border-0">
                        <h3 class="card-title"><b>Tak Terduga Keluar</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px; scrollbar-weight:none;">
                        <table class="table table-sm table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Uraian</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="riwayat-takterduga-keluar">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>