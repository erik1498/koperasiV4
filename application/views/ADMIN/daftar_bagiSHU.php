<div class="row">
    <div class="col-lg-9 daftar-sibulan">
        <div class="card shadow" style="height:81vh">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Daftar Bagi SHU</b></h3>
                    </div>
                </div>
                <form action="<?=base_url('index.php/cetak/daftar_bagiSHU');?>" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan</label>
                                <select class="form-control select2" style="width: 100%;" id="bulan_saham" name="bulan">
                                    <option value="0">Desember <?= $_SESSION['tahun'] - 1; ?></option>
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
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Jlh Saham</label>
                                <input type="text" class="form-control total-saham" disabled >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Jlh Bulan Saham</label>
                                <input type="text" class="form-control total-bulanSaham" disabled >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Jlh BJS</label>
                                <input type="text" class="form-control total-bjs" disabled >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Jlh BJP</label>
                                <input type="text" class="form-control total-bjp" disabled >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button type="submit" class="btn btn-danger form-control btn-loading"><i class="fa fa-sticky-note"></i> <b>Lihat PDF</b></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px;">
                <table class="table table-sm table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th width="20">No. Urut</th>
                            <th width="20">No. Anggota</th>
                            <th>Nama</th>
                            <th>Jumlah Saham</th>
                            <th>Jumlah Bulan Saham</th>
                            <th>BJS</th>
                            <th>BJP</th>
                            <th>Total</th>
                            <th>Diterima</th>
                            <th>Sisa</th>
                        </tr>
                    </thead>
                    <tbody class="daftar-bagiSHU">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card shadow" style="height:81vh">
            <!-- /.card-header -->
            <div class="card-header border-0">
                <h3 class="card-title"><b>Detail</b></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>SHU Murni</td>
                            <td>:</td>
                            <td class="shu"></td>
                        </tr>
                        <tr>
                            <td>Bagian Jasa</td>
                            <td>:</td>
                            <td class="jasa"></td>
                        </tr>
                        <tr>
                            <td>BJS</td>
                            <td>:</td>
                            <td class="bjs"></td>
                        </tr>
                        <tr>
                            <td>BJP</td>
                            <td>:</td>
                            <td class="bjp"></td>
                        </tr>
                        <tr>
                            <td>DCU</td>
                            <td>:</td>
                            <td class="dcu"></td>
                        </tr>
                        <tr>
                            <td>DCR</td>
                            <td>:</td>
                            <td class="dcr"></td>
                        </tr>
                        <tr>
                            <td>Dana Pengurus</td>
                            <td>:</td>
                            <td class="pengurus"></td>
                        </tr>
                        <tr>
                            <td>Diterima</td>
                            <td>:</td>
                            <td class="total_di_terima"></td>
                        </tr>
                        <tr>
                            <td>Sisa</td>
                            <td>:</td>
                            <td class="total_sisa"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button class="btn btn-success btn-block btn-validasi-bagi_SHU btn-loading"><i class="fa fa-check"></i> <b>Validasi</b></button>
                                <button class="btn btn-danger btn-block btn-batalvalidasi-bagi_SHU btn-loading"><i class="fa fa-times"></i> <b>Batal Validasi</b></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>