<h4 style="text-align:center;">DAFTAR JATUH TEMPO KSP UME MNASI</h4>
<h5 style="text-align:center;">PER 30 <?= strtoupper(_getBulan($bulan)) ?> <?= isset($tahun) ? $tahun : $this->session->userdata('tahun'); ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>NO. BUKU</td>
            <td>NAMA</td>
            <td>PINJAMAN</td>
            <td>SISA</td>
            <td>WAKTU PINJAMAN</td>
            <td>LAMA PINJAMAN</td>
            <td>JATUH TEMPO</td>
            <td>LALAI</td>
        </tr>
        <?php $total_angsuran = 0; $i = 0; foreach ($anggota_valid as $a) : if (is_numeric($a['lalai'])) { $total_angsuran += $a['pinjaman']['angsuran']['sisa'];?>
            <tr>
                <td><?= $a['no_buku']; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <td><?= number_format($a['pinjaman']['jumlah'], 0, '.', ','); ?></td>
                <td><?= number_format($a['pinjaman']['angsuran']['sisa'], 0 , '.', ','); ?></td>
                <td><?= $a['pinjaman']['waktu']; ?></td>
                <td><?= $a['pinjaman']['lama_pinjaman']; ?> Bulan</td>
                <td><?= $a['pinjaman']['jatuh_tempo']; ?></td>
                <td><?= number_format($a['pinjaman']['angsuran']['sisa'], 0 , '.', ','); ?></td>
            </tr>
        <?php } endforeach; ?>
        <tr>
            <td colspan="7">Jumlah</td>
            <td><?= number_format($total_angsuran, 0, '.', ','); ?></td>
        </tr>
    </tbody>
</table>