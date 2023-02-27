<?php 
    $jumlah_tahun_lalu = 0;
    $jumlah_tahun_ini = 0;
    $jumlah_hingga_des = 0;
    $jumlah_tiap_bulan = [];

?>

<div class="card shadow p-3 mb-3" style="height:78.2vh">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
            Laporan Simpanan <?= $judul; ?>
            <small class="float-right">Hari/Tanggal : <?= _cetakWaktu(date('Y-m-d')); ?></small>
            </h4>
        </div>
    <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="card-body" style="font-size:13px;height: 450px;">
            <table class="table text-center table-sm text-nowrap table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th width="20">No. Urut</th>
                        <th>Nama</th>
                        <th>s.d Des <?= date('Y') - 2; ?></th>
                        <?php $i=0; foreach (_daftarBulanList() as $b) : ?>
                            <?php $jumlah_tiap_bulan[$i++] = 0; ?>
                            <th><?= substr($b,0,3); ?></th>
                        <?php endforeach; ?>
                        <th>Jumlah <?= date('Y') - 1; ?></th>
                        <th>s.d Des <?= date('Y') - 1; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $a) : ?>
                        <?php if ($a['detail']['jumlah_'.$jenis.'_des'] > 0) { ?>
                            <tr>
                                <td><?= $a['id_anggota']; ?></td>
                                <td><?= $a['nama_anggota']; ?></td>
                                <td><?= $a['detail'][$jenis.'_tahun_lalu']; ?></td>
                                <?php $jumlah_tahun_lalu += floatval(str_replace(',','',$a['detail'][$jenis.'_tahun_lalu'])); ?>
                                <?php $i=0; foreach ($a['detail'][$jenis] as $simp) : ?>
                                    <td><?= number_format($simp,0,'.',','); ?></td>
                                    <?php $jumlah_tiap_bulan[$i++] += floatval($simp); ?>
                                <?php endforeach; ?>
                                <td><?= $a['detail']['jumlah_'.$jenis]; ?></td>
                                    <?php $jumlah_hingga_des += floatval(str_replace(',','',$a['detail']['jumlah_'.$jenis])); ?>
                                <td><?= $a['detail']['jumlah_'.$jenis.'_des']; ?></td>
                                    <?php $jumlah_tahun_ini += floatval(str_replace(',','',$a['detail']['jumlah_'.$jenis.'_des'])); ?>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.col -->
    <div class="row">
        <div class="card-body table-responsive" style="font-size:13px;">
                <table class="table text-center table-sm table-head-fixed text-nowrap table-bordered table-striped">
                    <thead>
                        <th>s.d Des <?= date('Y') - 2; ?></th>
                        <?php foreach (_daftarBulanList() as $b) : ?>
                            <th><?= substr($b,0,3); ?></th>
                        <?php endforeach; ?>
                        <th>Jumlah <?=date('Y') - 1?></th>
                        <th>s.d Des <?=date('Y') - 1?></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= number_format($jumlah_tahun_lalu,0,'.',','); ?></td>
                            <?php for ($i=0; $i < 12; $i++) { ?>
                                <td><?= number_format($jumlah_tiap_bulan[$i],0,'.',','); ?></td>
                            <?php } ?>
                            <td><?= number_format($jumlah_hingga_des,0,'.',','); ?></td>
                            <td><?= number_format($jumlah_tahun_ini,0,'.',','); ?></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

    <!-- this row will not appear when printing -->
    <div class="row p-2">
        <div class="col-lg-12">
            <a href="<?=base_url('index.php/cetak/laporan_simpanan_lalu/'.$jenis);?>" class="btn btn-danger float-right" style="margin-right: 5px;">
                <i class="fas fa-sticky-note"></i> <b>Lihat PDF</b>
            </a>
        </div>
    </div>
</div>