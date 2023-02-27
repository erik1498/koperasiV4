<div class="row">
    <div class="col-lg-12 daftar-sibulan">
        <div class="card shadow" style="height:78.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Daftar Bulan Saham</b></h3>
                    </div>
                </div>
                <form action="<?=base_url('index.php/cetak/daftar_sibulan');?>" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan</label>
                                <select class="form-control select2" style="width: 100%;" id="bulan_saham" name="bulan">
                                    <option value="0">Desember <?= date('Y') - 1; ?></option>
                                    <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
                                        <option value="<?=$i;?>"><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Jlh Uang</label>
                                <input type="text" class="form-control total-uang" disabled >
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
                                <label for="">&nbsp;</label>
                                <button type="submit" class="btn btn-danger form-control"><i class="fa fa-sticky-note"></i> <b>Lihat PDF</b></button>
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
                            <th>Jumlah Uang</th>
                            <th>Jumlah Saham</th>
                            <th>Bulan Saham</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="daftar-bulan-saham-anggota">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-4 detail-sibulan" style="display:none">
        <div class="card shadow" style="height:78.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Detail Bulan Saham</b></h3>
                        <button class="btn btn-sm btn-danger btn-close-sibulan float-right"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <table cellpadding="6" cellspacing="5">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="nama-anggota"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px; font-size:12px;">
                <p class="jatuh-tempo-label"></p>
                <table class="table text-center table-sm table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Jml Uang</th>
                            <th>Jml Saham</th>
                            <th>Bulan Saham</th>
                        </tr>
                    </thead>
                    <tbody class="sibulan-anggota">
                        <tr>
                            <td>s.d 31 Des <?= date('y') - 1; ?></td>
                            <td class="uang_0">0</td>
                            <td class="saham_0">0</td>
                            <td class="bulanSaham_0">0</td>
                        </tr>
                        <?php $i=0; foreach (_daftarBulanList() as $b) : $i++; ?>
                            <tr>
                                <td><?= substr($b,0,3); ?></td>
                                <td class="uang_<?=$i?>">0</td>
                                <td class="saham_<?=$i?>">0</td>
                                <td class="bulanSaham_<?=$i?>">0</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>