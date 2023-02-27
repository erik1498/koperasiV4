<div class="row">
<!--     <div class="col-lg-3">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title border-0"><b>Pengaturan Bunga Sibulan</b></h3>
            </div>
            <div class="card-body">
                
            <?php $i=0; foreach ($bunga as $b) : ?>
                <div class="form-group row">
                    <label class="col-lg-6" for="bulan<?=$i?>"><?= _getBulan($b['bulan']); ?></label>
                    <input type="text" class="col-lg-6 form-control form-control-sm text-center bunga-field" data-id="<?=$b['id_bunga']?>" value="<?=$b['bunga']?>">
                    <?php $i++; ?>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div> -->
    <div class="col-lg-2">
        <!-- Default box -->
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title border-0"><b>Pengaturan Tahun Buku</b></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Tahun</label>
                        <select class="form-control date-session-set">
                            <?php for ($i=2021; $i <= date('Y'); $i++) { ?>
                                <option value="<?=$i?>" <?php if ($_SESSION['tahun'] == $i) {
                                    echo "selected";
                                } ?>><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
        </div>
        <!-- /.card -->
    </div>
</div>