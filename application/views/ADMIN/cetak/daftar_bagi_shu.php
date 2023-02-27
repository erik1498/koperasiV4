<h4 style="text-align:center;">DAFTAR BULAN SAHAM KSP UME MNASI</h4>
<h5 style="text-align:center;">PER 30 <?= strtoupper($bulan) ?> <?= isset($tahun) ? $tahun : $this->session->userdata('tahun'); ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>NO. BUKU</td>
            <td>NAMA</td>
            <td>SISA PINJAMAN</td>
            <td>WAKTU PINJAMAN</td>
            <td>LAMA PINJAMAN</td>
            <td>JATUH TEMPO</td>
        </tr>
        <?php foreach ($anggota as $a) : ?>
            <tr>
                <td><?= $a['no_buku']; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <td><?= number_format($a['riwayat_pinjaman']['sisa'],0,'.',','); ?></td>
                <td><?= $a['detail']['waktu']; ?></td>
                <td><?= $a['detail']['lama_pinjaman']; ?> Bulan</td>
                <td><?= $a['detail']['jatuh_tempo']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">JUMLAH</td>
            <td><?= $total; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>