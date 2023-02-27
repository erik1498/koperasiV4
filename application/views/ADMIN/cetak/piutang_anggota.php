<h4 style="text-align:center;">PINJAMAN ANGGOTA</h4>
<table style="margin-bottom:40px;">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $data['nama_anggota']; ?></td>
    </tr>
    <tr>
        <td>No. Buku</td>
        <td>:</td>
        <td><?= $data['id_anggota']; ?></td>
    </tr>
</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>TANGGAL</td>
            <td>BESARAN PINJAMAN</td>
            <td>ANGSURAN</td>
            <td>SISA PINJAMAN</td>
            <td>KET</td>
        </tr>
        <?php foreach ($detail['riwayat_pinjaman'] as $r) : ?>
            <tr>
                <td><?= $r['waktu']; ?></td>
                <td><?php if ($r['besaran'] > 0) {
                    echo number_format($r['besaran'],0,'.',',');
                } ?></td>
                <td><?= number_format($r['angsuran'],0,'.',','); ?></td>
                <td><?= number_format($r['sisa'],0,'.',','); ?></td>
                <td><?= $r['ket'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>