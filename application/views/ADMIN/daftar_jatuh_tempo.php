<div class="row">
    <div class="col-lg-12">
        <div class="card shadow" style="height:auto;">
            <div class="card-header border-0">
                <h3 class="card-title"><b>Daftar Jatuh Tempo</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <form action="<?=base_url('index.php/cetak/jatuh_tempo');?>" method="post">
                            <div class="form-group">
                                <label for="anggota" class="form-label">Bulan</label>
                                <select class="form-control select2" style="width: 100%;" id="bulan_tampil" name="bulan">
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
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-danger btn-block btn-loading"><i class="fa fa-print"></i> <b>Lihat PDF</b></button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="table-responsive" style="height: 62vh">
                    <table class="table table-sm table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th width="20">No. Urut</th>
                                <th width="50">No. Buku</th>
                                <th>Nama</th>
                                <th>Pinjaman</th>
                                <th>Sisa</th>
                                <th>Waktu Pinjaman</th>
                                <th>Lama Pinjaman</th>
                                <th>Jatuh Tempo</th>
                                <th width="50">No. Buku</th>
                                <th>Lalai</th>
                            </tr>
                        </thead>
                        <tbody class="daftar-jatuh-tempo">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- <tr class="anggota_<?=$a['id_anggota']?>">
    <td><?= $i++; ?></td>
    <td><?= $a['nama_anggota']; ?></td>
    <td><?= number_format($a['detail']['detail_pinjaman']['jumlah'],0,'.',','); ?></td>
    <td><?= $a['detail']['detail_pinjaman']['waktu']; ?></td>
    <td><?= $a['detail']['detail_pinjaman']['lama_pinjaman']; ?> Bulan</td>
    <td><?= $a['detail']['detail_pinjaman']['jatuh_tempo']; ?></td>
    <td><?= $a['detail']['detail_pinjaman']['status']; ?></td>
</tr> -->