<?php 
    $jumlah_jenis = [];
    $total_jumlah_tahun_lalu = 0;
    $total_jumlah_tahun_ini = 0;
    $total_jumlah_hingga_des = 0;
    $total_bagi = 0;
?>



<div class="card shadow p-3 mb-3" style="height:auto">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
            <?= $judul; ?>
            </h4>
        </div>
    <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="card-body" style="font-size:14px;height: auto;">
            <table class="table table-sm text-center text-nowrap table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th rowspan="2">No. Anggota</th>
                        <th rowspan="2">Nama</th>
                        <?php foreach ($jenis as $j) : ?>
                            <th colspan="3"><?= strtoupper($j); ?></th>
                            <?php
                                $jumlah_jenis[$j][0] = 0;
                                $jumlah_jenis[$j][1] = 0;
                                $jumlah_jenis[$j][2] = 0;
                            ?>
                        <?php endforeach; ?>
                        <th rowspan="2" width="25">Jumlah s.d Des <?= $_SESSION['tahun'] - 1; ?></th>
                        <th rowspan="2" width="25">Jumlah <?= $_SESSION['tahun']; ?></th>
                        <th rowspan="2" width="25">Jumlah s.d Des <?= $_SESSION['tahun']; ?></th>
                    </tr>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <td>s.d Des <?= $_SESSION['tahun'] - 1; ?></td>
                            <td><?= $_SESSION['tahun']; ?></td>
                            <td>s.d Des <?= $_SESSION['tahun']; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $a) : ?>
                        <tr>
                            <?php 
                                $jumlah_tahun_lalu = 0;
                                $jumlah_tahun_ini = 0;
                                $jumlah_hingga_des = 0;
                            ?>
                            <td><?= $a['no_buku']; ?></td>
                            <td><?= $a['nama_anggota']; ?></td>
                            <?php foreach ($jenis as $j) : ?>
                                <td><?= $a['detail'][$j.'_tahun_lalu']; ?></td>
                                    <?php $jumlah_tahun_lalu += floatval(str_replace(',','', $a['detail'][$j.'_tahun_lalu'])); ?>
                                <td><?= $a['detail']['jumlah_'.$j]; ?></td>
                                    <?php $jumlah_hingga_des += floatval(str_replace(',','', $a['detail']['jumlah_'.$j])); ?>
                                <td><?= $a['detail']['jumlah_'.$j.'_des']; ?></td>
                                    <?php $jumlah_tahun_ini += floatval(str_replace(',','', $a['detail']['jumlah_'.$j.'_des'])); ?>
                                
                                <?php 
                                    $jumlah_jenis[$j][0] += floatval(str_replace(',','', $a['detail'][$j.'_tahun_lalu']));
                                    $jumlah_jenis[$j][1] += floatval(str_replace(',','', $a['detail']['jumlah_'.$j]));
                                    $jumlah_jenis[$j][2] += floatval(str_replace(',','', $a['detail']['jumlah_'.$j.'_des']));
                                ?>

                                
                            <?php endforeach; ?>
                            <td><?= number_format($jumlah_tahun_lalu,0,'.',',');; ?></td>
                            <td><?= number_format($jumlah_hingga_des,0,'.',',');; ?></td>
                            <td><?= number_format($jumlah_tahun_ini,0,'.',',');; ?></td>
                            
                            <?php
                                $total_jumlah_tahun_lalu += $jumlah_tahun_lalu;
                                $total_jumlah_tahun_ini += $jumlah_tahun_ini;
                                $total_jumlah_hingga_des += $jumlah_hingga_des;
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
    <div class="row pl-2 pr-2">
        <div class="col-lg-12">
            <?php $bulan = _daftarBulanList(); ?>
            <table class="table table-sm text-center table-bordered table-striped" style="font-size:11px;">
                <thead>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <th colspan="3"><?= strtoupper($j); ?></th>
                        <?php endforeach; ?>
                        <th rowspan="2">Total Jumlah s.d Des <?= $_SESSION['tahun'] - 1; ?></th>
                        <th rowspan="2">Total Jumlah <?= $_SESSION['tahun']; ?></th>
                        <th rowspan="2">Total Jumlah s.d Des <?= $_SESSION['tahun']; ?></th>
                    </tr>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <td>s.d Des <?= $_SESSION['tahun'] - 1; ?></td>
                            <td><?= $_SESSION['tahun']; ?></td>
                            <td>s.d Des <?= $_SESSION['tahun']; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <td><?= number_format($jumlah_jenis[$j][0],0,'.',','); ?></td>
                            <td><?= number_format($jumlah_jenis[$j][1],0,'.',','); ?></td>
                            <td><?= number_format($jumlah_jenis[$j][2],0,'.',','); ?></td>
                        <?php endforeach; ?>
                        <td><?=number_format($total_jumlah_tahun_lalu,0,'.',',');?></td>
                        <td><?=number_format($total_jumlah_hingga_des,0,'.',',');?></td>
                        <td><?=number_format($total_jumlah_tahun_ini,0,'.',',');?></td>

                        <?php
                            $total_bagi = explode('.',$total_bagi);
                            if (isset($total_bagi[1])) {
                                $total_bagi[1] = strlen($total_bagi[1]) < 2 ? $total_bagi[1].'0' :$total_bagi[1];
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

   
    <!-- this row will not appear when printing -->
    <div class="row p-2">
        <div class="col-lg-9">
            <?php $i = 1; foreach (_daftarBulanList() as $b) { ?>
                <?php if ($i <= intval($_SESSION['bulan'])): ?>
                    <a href="<?=base_url('index.php/admin/laporan_simpanan/rekap/'.$i);?>" class="btn <?=intval($bulan_lihat) == $i ? "btn-warning btn-loading" : "btn-primary btn-loading" ?>"><?=$b;?></a>
                <?php endif ?>
            <?php $i++; } ?>
        </div>
        <div class="col-lg-3">
            <a href="<?=base_url('index.php/cetak/laporan_simpanan/rekap/'.$bulan_lihat);?>" class="btn btn-danger float-right btn-loading" style="margin-right: 5px;">
                <i class="fas fa-sticky-note"></i> <b>Lihat PDF</b>
            </a>
        </div>
    </div>
</div>