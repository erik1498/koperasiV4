<?php 
    $jumlah_jenis = [];
    $total_jumlah_tahun_lalu = 0;
    $total_jumlah_tahun_ini = 0;
    $total_jumlah_hingga_des = 0;
    $total_bagi = 0;
?>



<div class="card shadow p-3 mb-3" style="height:78.2vh">
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
        <div class="card-body" style="font-size:11.2px;height: 450px;">
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
                        <th rowspan="2" width="25">Jumlah s.d Des <?= date('Y') - 1; ?></th>
                        <th rowspan="2" width="25">Jumlah <?= date('Y'); ?></th>
                        <th rowspan="2" width="25">Jumlah s.d Des <?= date('Y'); ?></th>
                        <th rowspan="2" width="25" width="20"> Bagi 5000</th>
                    </tr>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <td>s.d Des <?= date('Y') - 1; ?></td>
                            <td><?= date('Y'); ?></td>
                            <td>s.d Des <?= date('Y'); ?></td>
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
                                
                                if (explode('-', $a['tgl_daftar'])[0]) {
                                    $total_bagi += floatval($a['detail']['bagi5000']);
                                }

                                // number_format($bagi[0],0,'.',',');
                                // if(isset($bagi[1])) { echo '.'.$bagi[1]; } 
                                // else { echo '.00'; }
                            ?>

                            <td><?= $a['detail']['bagi5000'] ?></td>

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
                        <th rowspan="2">Total Jumlah s.d Des <?= date('Y') - 1; ?></th>
                        <th rowspan="2">Total Jumlah <?= date('Y'); ?></th>
                        <th rowspan="2">Total Jumlah s.d Des <?= date('Y'); ?></th>
                        <th rowspan="2">Total Bagi 5000</th>
                    </tr>
                    <tr>
                        <?php foreach ($jenis as $j) : ?>
                            <td>s.d Des <?= date('Y') - 1; ?></td>
                            <td><?= date('Y'); ?></td>
                            <td>s.d Des <?= date('Y'); ?></td>
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
                        <td><?=number_format($total_bagi[0],0,'.',',')?><?php if(isset($total_bagi[1])) { echo '.'.$total_bagi[1]; } else { echo '.00'; } ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

   
    <!-- this row will not appear when printing -->
    <div class="row p-2">
        <div class="col-lg-12">
            <a href="<?=base_url('index.php/cetak/laporan_simpanan_lalu/rekap');?>" class="btn btn-danger float-right" style="margin-right: 5px;">
                <i class="fas fa-sticky-note"></i> <b>Lihat PDF</b>
            </a>
        </div>
    </div>
</div>