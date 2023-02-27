<h4 style="text-align:center;">DAFTAR SIBULAN KSP UME MNASI</h4>
<h5 style="text-align:center;">PER 31 <?= strtoupper(_getBulan($bulan)) ?> <?= isset($tahun) ? $tahun : $this->session->userdata('tahun'); ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>NO. URUT</td>
            <td>NO. BUKU</td>
            <td>NAMA</td>
            <td>JUMLAH UANG</td>
            <td>JUMLAH SAHAM</td>
            <td>BULAN SAHAM</td>
        </tr>
        <?php $total = 0; $i = 1; foreach ($bulan_saham_daftar['anggota'] as $a) : $total += floatval(str_replace(',', '', $a['detail']['bulan_saham'])); ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['no_buku']; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <td><?= $a['detail']['jumlah_uang']; ?></td>
                <td><?= $a['detail']['jumlah_saham']; ?></td>
                <td><?= $a['detail']['bulan_saham']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Jumlah</td>
            <td><?= number_format($total, 0, '.', ','); ?></td>
        </tr>
    </tbody>
</table>