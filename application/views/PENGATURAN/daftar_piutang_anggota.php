<div class="row">
    <div class="col-lg-12 daftar-piutang">
        <div class="card shadow" style="height:76.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Daftar Piutang Anggota</b></h3>
                    </div>
                </div>
                <form action="<?=base_url('index.php/cetak/riwayat_pinjaman_lalu');?>" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan</label>
                                <select class="form-control select2" style="width: 100%;" id="bulan_pinjaman" name="bulan">
                                    <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
                                        <option value="<?=$i;?>"
                                            <?php if ($i == 12) {
                                                echo('selected');
                                            } ?>
                                        ><?= $b; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" class="form-control total-piutang" disabled>
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
                <table class="table table-head-fixed table-sm text-nowrap">
                    <thead>
                        <tr>
                            <th width="20">No. Urut</th>
                            <th width="20">No. Buku</th>
                            <th>Nama</th>
                            <th>Sisa Pinjaman</th>
                            <th>Waktu Pinjaman</th>
                            <th>Lama Pinjaman</th>
                            <th>Jatuh Tempo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="daftar-piutang-anggota" style="font-size:13px;">
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-4 detail-riwayat" style="display:none">
        <div class="card shadow" style="height:76.2vh;">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-title"><b>Riwayat Pinjaman</b></h3>
                        <button class="btn btn-sm btn-danger btn-close-riwayat float-right"><i class="fa fa-times"></i></button>
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
            <div class="card-body table-responsive pl-4 pr-4 pt-0 pb-4" style="height: 300px;">
                <p class="jatuh-tempo-label"></p>
                <table class="table text-center table-head-fixed table-sm text-nowrap">
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
        </div>
    </div>
</div>