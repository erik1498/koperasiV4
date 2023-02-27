<h4 style="text-align:center;">DAFTAR SIBULAN KSP UME MNASI</h4>
<h5 style="text-align:center;">PER 30 <?= strtoupper(_getBulan($bulan)) ?> <?= isset($tahun) ? $tahun : $this->session->userdata('tahun'); ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>NAMA</td>
            <td>s.d Des <?= $this->session->userdata('tahun') - 1; ?></td>
            <td>BUNGA</td>
            <td>DEBET</td>
            <td>TOTAL DEBET</td>
            <td>KREDIT</td>
            <td>SALDO</td>
        </tr>
        <?php $i = 1; foreach ($anggota as $a) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <td><?= $a['detail']['bunga_tiap_bulan'][$bulan]; ?></td>
                <td><?= number_format($a['detail']['debet_tiap_bulan'][$bulan], 0, '.', ','); ?></td>
                <td><?= number_format($a['detail']['total_debet_tiap_bulan'][$bulan], 0, '.', ','); ?></td>
                <td><?= number_format($a['detail']['kredit_tiap_bulan'][$bulan], 0 , '.', ','); ?></td>
                <td><?= number_format($a['detail']['saldo_tiap_bulan_tampil'][$bulan], 0, '.', ','); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Jumlah</td>
            <td><?= $total_kredit_sibulan; ?></td>
            <td><?= $total_saldo_sibulan; ?></td>
        </tr>
    </tbody>
</table>