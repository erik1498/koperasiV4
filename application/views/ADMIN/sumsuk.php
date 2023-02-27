<div class="row">
    <div class="col-lg-2">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?=base_url('index.php/cetak/sum')?>" method="post">
                <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" id="bulan_sibulan" name="bulan">
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
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button type="submit" class="btn btn-danger btn-sm form-control btn-loading form-control-sm"><i class="fa fa-sticky-note mr-2"></i><b>Lihat PDF</b></button>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="">Jenis SLIP UANG</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input slip-masuk" type="radio" id="customRadio2" name="customRadio" checked="">
                                        <label for="customRadio2" class="custom-control-label">Masuk</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input slip-keluar" type="radio" id="customRadio1" name="customRadio">
                                        <label for="customRadio1" class="custom-control-label">Keluar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table width="100%" class="table-sm" style="font-size:12px; font-weight:bold;">
                            <tr>
                                <td>Uang Masuk</td>
                                <td>:</td>
                                <td class="total-masuk"></td>
                            </tr>
                            <tr>
                                <td>Uang Keluar</td>
                                <td>:</td>
                                <td class="total-keluar"></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td class="kas-bulan-ini"></td>
                            </tr>
                        </table>
                        <hr>
                        <h4 class="pl-1"><b>Detail Kas</b></h4>
                        <table width="100%" class="table-sm" style="font-size:11px; font-weight:bold;">
                            <tr>
                                <td>Kas Tahun Lalu</td>
                                <td>:</td>
                                <td class="kas"></td>
                            </tr>
                            <?php foreach (_daftarBulanList() as $b) : ?>
                                <?php if (_getBulanAngka($b) <= $_SESSION['bulan']) { ?>
                                    <tr>
                                        <td><?= $b; ?></td>
                                        <td>:</td>
                                        <td class="kas_bulan_<?=_getBulanAngka($b)?>"></td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="card uang-masuk-card shadow" style="height:81.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="text-center"><b>SLIP UANG MASUK</b></h6>
                        <p class="text-center bulan-ket"></p>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4 text-center mt-4" style="height: 10px; font-size:11px;">
                <table class="table table-sm table-head-fixed table-bordered text-nowrap pb-4">
                    <thead>
                            <th width="20">No</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>Pokok</th>
                            <th>Wajib</th>
                            <th>Sukarela</th>
                            <th>Uang Pangkal</th>
                            <th>Piutang Anggota</th>
                            <th>Adm. Pelayanan</th>
                            <th>Uang Buku</th>
                            <th>Bunga</th>
                            <th>Sibulan</th>
                            <th>Materai</th>
                            <th>Provisi</th>
                            <th>Dana Kematian</th>
                            <th>Uang Konsumsi</th>
                            <th>Jumlah</th>
                    </thead>
                    <tbody class="daftar-sum">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
        </div>
        <div class="card uang-keluar-card shadow" style="height:81.2vh; display:none;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="text-center"><b>SLIP UANG KELUAR</b></h6>
                        <p class="text-center bulan-ket">Juni 2021</p>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4 text-center mt-4" style="height: 10px; font-size:11px;">
                <table class="table table-sm table-head-fixed table-bordered text-nowrap">
                    <thead >
                        <tr class="field-keluar">
                            
                        </tr>
                        <tr class="keluar-thead">

                        </tr>
                    </thead>
                    <tbody class="daftar-suk">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>
    </div>
</div>