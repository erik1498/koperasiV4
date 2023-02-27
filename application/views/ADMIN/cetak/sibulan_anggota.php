<h4 style="text-align:center;">SIBULAN ANGGOTA</h4>
<table style="margin-bottom:40px;">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $detail['nama_anggota']; ?></td>
    </tr>
    <tr>
        <td>No. Buku</td>
        <td>:</td>
        <td><?= $detail['id_anggota_sibulan']; ?></td>
    </tr>
</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>BULAN</td>
            <td>BUNGA</td>
            <td>DEBET</td>
            <td>TOTAL DEBET</td>
            <td>KREDIT</td>
            <td>SALDO</td>
        </tr>
        <tr>
            <td style="background-color:#c1bcbc;">s.d 31 Desember <?= $this->session->userdata('tahun') - 1; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="saldo_0"><?= number_format($sibulan['saldo_tiap_bulan'][0],0,'.',','); ?></td>
        </tr>
        <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
            <tr>
                <?php if ($i < count($sibulan['bunga_tiap_bulan'])) { ?>
                    <td style="background-color:#c1bcbc;"><?= $b; ?></td>
                    <td><?php if(isset($sibulan['bunga_tiap_bulan'][$i])) { 
                        echo($sibulan['bunga_tiap_bulan'][$i]);
                         } else { echo('0'); }?></td>
                    <td><?= number_format($sibulan['debet_tiap_bulan'][$i],0,'.',','); ?></td>
                    <td><?php if(isset($sibulan['total_debet_tiap_bulan'][$i])) { echo(number_format($sibulan['total_debet_tiap_bulan'][$i],0,'.',',')); } else { echo('0'); } ?></td>
                    <td><?= number_format($sibulan['kredit_tiap_bulan'][$i],0,'.',','); ?></td>
                    <td><?= number_format($sibulan['saldo_tiap_bulan'][$i],0,'.',','); ?></td>
                <?php } else { ?>
                    <td style="background-color:#c1bcbc;"><?= $b; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>