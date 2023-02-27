<div class="row">
    <div class="col-lg-12 daftar-sibulan">
        <div class="card shadow" style="height:78.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Daftar Bagu SHU</b></h3>
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
                            <th>Jumlah Saham</th>
                            <th>Jumlah Bulan Saham</th>
                            <th>BJS</th>
                            <th>BJP</th>
                            <th>Total Terima</th>
                        </tr>
                    </thead>
                    <tbody class="daftar-bagiSHU">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>