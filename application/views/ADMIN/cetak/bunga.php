<?php 
    
    for ($i=0; $i < count($anggota); $i++) {
        $jenisArr = [];
        // var_dump($anggota[$i]['detail']['data_selain_simpanan']);
        // die();
        foreach ($anggota[$i]['detail']['data_selain_simpanan'] as $d) {
            $waktu = explode('-', $d['waktu']);
            $tahun = $waktu[0];
            if ($d['jenis'] == $jenis && $d['tarik'] == 0 && $tahun == $_SESSION['tahun']) {
                $bulan = intval($waktu[1]);
                if (!isset($jenisArr[$bulan])) {
                    $jenisArr[$bulan] = floatval($d['jumlah']);
                }else{
                    $jenisArr[$bulan] += floatval($d['jumlah']);
                }
            }
        }
        for ($j=0; $j < 13; $j++) { 
            if (!isset($jenisArr[$j])) {
                $jenisArr[$j] = 0;
            }
        }
        $anggota[$i]['detail'] = [];
        $anggota[$i]['detail'][$jenis] = $jenisArr;
    }

    $jumlah_tahun_lalu = 0;
    $jumlah_tahun_ini = 0;
    $jumlah_hingga_des = 0;
    $jumlah_tiap_bulan = [];
?>
<h4 style="text-align:center;">Daftar Bunga Pinjaman Koperasi UME MNASI</h4>
<h6 style="text-align:center;">Sampai dengan <?= _cetakWaktu(date($this->session->userdata('tahun').'-'.$this->session->userdata('bulan').'-'.$this->session->userdata('hari'))); ?></h6>
<table width="100%" border="1" cellpadding="2" cellspacing="0" style="text-align:center; font-size:10px;">
    <tr>
        <th width="20">No Anggota</th>
        <th>Nama</th>
        <?php $i=1; foreach (_daftarBulanList() as $b) : 
            if ($i <= $bulan_lihat) { ?>
                <th><?= substr($b,0,3); ?></th>
            <?php } ?>
            <?php $jumlah_tiap_bulan[$i - 1] = 0; ?>
        <?php $i++; endforeach; ?>
        <?php $jumlah_tiap_bulan[12] = 0; ?>
        <th>Jumlah</th>
    </tr>
    <tbody>
        <?php foreach ($anggota as $a): ?>
            <?php $jumlah = 0; ?>
            <tr>
                <td><?= $a['no_buku']; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <?php $jumlah = 0; $i=1; foreach (_daftarBulanList() as $b) : 
                    if ($i <= $bulan_lihat) { $jumlah += $a['detail'][$jenis][$i]; ?>
                        <td><?= number_format($a['detail'][$jenis][$i], 0, '', ','); ?></td>
                        <?php $jumlah_tiap_bulan[$i - 1] += $a['detail'][$jenis][$i]; ?>
                    <?php } ?>
                <?php $i++; endforeach; ?>
                <td><?= number_format($jumlah, 0, '', ','); ?></td>
                <?php $jumlah_tiap_bulan[12] += $jumlah; ?>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="2">Jumlah</td>
            <?php $key = array_keys($jumlah_tiap_bulan) ?>
            <?php foreach ($key as $k): ?>
                <?php if (intval($k) < $bulan_lihat || intval($k) > 11): ?>
                    <td><?= number_format($jumlah_tiap_bulan[$k], 0, ',', '.')  ?></td>
                <?php endif ?>
            <?php endforeach ?>
        </tr>
    </tbody>
    
</table>
