<?php 
    $jumlah_tahun_lalu = 0;
    $jumlah_tahun_ini = 0;
    $jumlah_hingga_des = 0;
    $jumlah_tiap_bulan = [];

?>
<h4 style="text-align:center;">Daftar Simpanan <?= strtoupper($jenis)  ?> Anggota Koperasi UME MNASI</h4>
<h6 style="text-align:center;">Sampai dengan <?= _cetakWaktu(date($this->session->userdata('tahun').'-'.$this->session->userdata('bulan').'-'.$this->session->userdata('hari'))); ?></h6>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <th>No. Urut</th>
            <th width="200">Nama</th>
            <th>s.d Des <?= $this->session->userdata('tahun') - 1; ?></th>
            <?php $i=0; foreach (_daftarBulanList() as $b) : ?>
                <?php $jumlah_tiap_bulan[$i++] = 0; ?>
                <th><?= substr($b,0,3); ?></th>
            <?php endforeach; ?>
            <th>Jumlah <?= $this->session->userdata('tahun'); ?></th>
            <th>s.d Des <?= $this->session->userdata('tahun'); ?></th>
        </tr>

        <?php foreach ($anggota as $a) : ?>
            <?php if ($a['detail']['jumlah_'.$jenis.'_des'] > 0) { ?>
                <tr>
                    <td><?= $a['no_buku']; ?></td>
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
    <tfoot>
        <tr style="background-color:#c1bcbc;">
            <td colspan="2">Jumlah</td>
            <td><?= number_format($jumlah_tahun_lalu,0,'.',','); ?></td>
            <?php foreach ($jumlah_tiap_bulan as $j) : ?>
                <td><?= number_format($j,0,'.',','); ?></td>
            <?php endforeach; ?>
            <td><?= number_format($jumlah_hingga_des,0,'.',','); ?></td>
            <td><?= number_format($jumlah_tahun_ini,0,'.',','); ?></td>
        </tr>
    </tfoot>
</table>