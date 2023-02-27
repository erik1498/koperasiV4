<?php 
    $jumlah_jenis = [];
    $total_jumlah_tahun_lalu = 0;
    $total_jumlah_tahun_ini = 0;
    $total_jumlah_hingga_des = 0;
?>

<h4 style="text-align:center;">Rekap Simpanan Anggota Koperasi UME MNASI</h4>
<h6 style="text-align:center;">Sampai dengan <?= _cetakWaktu(date($this->session->userdata('tahun').'-'.$this->session->userdata('bulan').'-'.$this->session->userdata('hari'))); ?></h6>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
    <tr style="background-color:#c1bcbc;">
            <th rowspan="2">No Anggota</th>
            <th rowspan="2">Nama</th>
            <?php foreach ($jenis as $j) : ?>
                <th colspan="3"><?= strtoupper($j); ?></th>
                <?php
                    $jumlah_jenis[$j][0] = 0;
                    $jumlah_jenis[$j][1] = 0;
                    $jumlah_jenis[$j][2] = 0;
                ?>
            <?php endforeach; ?>
            <th rowspan="2">Jumlah s.d Des <?= $this->session->userdata('tahun') - 1; ?></th>
            <th rowspan="2">Jumlah <?= $this->session->userdata('tahun'); ?></th>
            <th rowspan="2">Jumlah s.d Des <?= $this->session->userdata('tahun'); ?></th>
        </tr>
        <tr style="background-color:#c1bcbc;">
            <?php foreach ($jenis as $j) : ?>
                <td>s.d Des <?= $this->session->userdata('tahun') - 1; ?></td>
                <td><?= $this->session->userdata('tahun'); ?></td>
                <td>s.d Des <?= $this->session->userdata('tahun'); ?></td>
            <?php endforeach; ?>
        </tr>
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
    <tfoot>
        <tr style="background-color:#c1bcbc;">
            <td colspan="2">Jumlah</td>
            <?php foreach ($jumlah_jenis as $j) : ?>
                <td><?= number_format($j[0],0,'.',',');; ?></td>
                <td><?= number_format($j[1],0,'.',',');; ?></td>
                <td><?= number_format($j[2],0,'.',',');; ?></td>
            <?php endforeach; ?>
            <td><?= number_format($total_jumlah_tahun_ini,0,'.',','); ?></td>
            <td><?= number_format($total_jumlah_hingga_des,0,'.',','); ?></td>
            <td><?= number_format($total_jumlah_tahun_ini,0,'.',','); ?></td>
        </tr>
    </tfoot>
</table>