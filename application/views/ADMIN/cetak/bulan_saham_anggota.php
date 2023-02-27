<h4 style="text-align:center;">BULAN SAHAM ANGGOTA</h4>
<table style="margin-bottom:40px;">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $bulan_saham['data_diri']['nama_anggota']; ?></td>
    </tr>
    <tr>
        <td>No. Buku</td>
        <td>:</td>
        <td><?= $bulan_saham['data_diri']['no_buku']; ?></td>
    </tr>
</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
    <tbody>
        <tr style="background-color:#c1bcbc;">
            <td>BULAN</td>
            <td>JUMLAH UANG</td>
            <td>JUMLAH SAHAM</td>
            <td>BULAN SAHAM</td>
        </tr>
        <tr>
            <td style="background-color:#c1bcbc;">s.d 31 Desember <?= $this->session->userdata('tahun') - 1; ?></td>
            <td></td>
            <td></td>
            <td class="saldo_0"><?= $bulan_saham['bulan_saham'][0] ?></td>
        </tr>
        <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
            <?php if ($i < 12): ?>
                <tr>
                    <?php if ($i < count($bulan_saham['bulan_saham'])) { ?>
                        <td style="background-color:#c1bcbc;"><?= $b; ?></td>
                        <td><?php if(isset($bulan_saham['jumlah_saham'][$i])) { 
                            echo($bulan_saham['jumlah_uang'][$i]);
                             } else { echo('0'); }?></td>
                        <td><?= $bulan_saham['jumlah_saham'][$i]; ?></td>
                        <td><?= $bulan_saham['bulan_saham'][$i]; ?></td>
                    <?php } else { ?>
                        <td style="background-color:#c1bcbc;"><?= $b; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                </tr>
            <?php else: ?>
                <tr>
                    <td style="background-color:#c1bcbc;">Desember</td>
                    <td><?php if(isset($bulan_saham['jumlah_saham'][$i])) { 
                        echo($bulan_saham['jumlah_uang']['des']);
                         } else { echo('0'); }?></td>
                    <td><?= $bulan_saham['jumlah_saham']['des']; ?></td>
                    <td><?= $bulan_saham['bulan_saham']['des']; ?></td>
                </tr>
                <tr>
                    <td style="background-color:#c1bcbc;">Jumlah</td>
                    <td><?php if(isset($bulan_saham['jumlah_saham'][$i])) { 
                        echo($bulan_saham['jumlah_uang'][$i]);
                         } else { echo('0'); }?></td>
                    <td><?= $bulan_saham['jumlah_saham'][$i]; ?></td>
                    <td><?= $bulan_saham['bulan_saham'][$i]; ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </tbody>
</table>