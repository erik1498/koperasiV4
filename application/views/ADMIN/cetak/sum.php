<h4 style="text-align:center;">SLIP UANG MASUK</h4>
<h5 style="text-align:center;"><?= strtoupper(_getBulan($bulan)) ?> <?= $tahun ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
  <tbody>
    <tr style="background-color:#c1bcbc;">
      <td width="20">No</td>
      <td>No. Anggota</td>
      <td>Nama</td>
      <td>Pokok</td>
      <td>Wajib</td>
      <td>Sukarela</td>
      <td>Uang Pangkal</td>
      <td>Piutang Anggota</td>
      <td>Adm. Pelayanan</td>
      <td>Uang Buku</td>
      <td>Bunga</td>
      <td>Sibulan</td>
      <td>Materai</td>
      <td>Provisi</td>
      <td>Dana Kematian</td>
      <td>Uang Konsumsi</td>
      <td>Jumlah</td>
    </tr>
    <?php $i = 1; foreach ($laporan['masuk']['anggota'] as $a) : ?>
      <tr>
        <td><?=$i++?></td>
        <td><?=$a['no_buku'];?></td>
        <td><?=$a['nama_anggota'];?></td>
        <td><?=number_format($a['pokok'],0,'.',',');;?></td>
        <td><?=number_format($a['wajib'],0,'.',',');;?></td>
        <td><?=number_format($a['sukarela'],0,'.',',');;?></td>
        <td><?=number_format($a['uang_pangkal'],0,'.',',');;?></td>
        <td><?=number_format($a['piutang_anggota'],0,'.',',');;?></td>
        <td><?=number_format($a['administrasi_pelayanan'],0,'.',',');;?></td>
        <td><?=number_format($a['uang_buku'],0,'.',',');;?></td>
        <td><?=number_format($a['bunga'],0,'.',',');;?></td>
        <td>0</td>
        <td><?=number_format($a['materai'],0,'.',',');?></td>
        <td><?=number_format($a['provisi'],0,'.',',');?></td>
        <td><?=number_format($a['dana_kematian'],0,'.',',');?></td>
        <td><?=number_format($a['uang_konsumsi'],0,'.',',');?></td>
        <td><?=number_format($a['jumlah_masuk'],0,'.',',');?></td>
      </tr>
    <?php endforeach; ?>
    <?php if (count($laporan['masuk']['sibulan']) > 0) { ?>
      <tr>
          <td colspan="2" rowspan="<?=count($laporan['masuk']['sibulan']) + 1?>">Sibulan</td>
      </tr>
      <?php foreach ($laporan['masuk']['sibulan'] as $s) : ?>
        <tr>
            <td><?= $s['nama_anggota']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= number_format($s['sibulan'],0,'.',','); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= number_format($s['sibulan'],0,'.',','); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php } ?>
    <?php foreach ($laporan['masuk']['tak_terduga_masuk'] as $t) : ?>
      <tr>
          <td colspan="3"><?= $t['uraian']; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?= number_format($t['jumlah'],0,'.',','); ?></td>
      </tr>
    <?php endforeach; ?>

    <tr>
      <td colspan="3">Jumlah</td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][0],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][1],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][2],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][3],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][4],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][5],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][6],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][7],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][8],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][9],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][10],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][11],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['totalSUMArray'][12],0,'.',',');?></td>
      <td><?=number_format($laporan['masuk']['total'],0,'.',',');;?></td>
  </tr>
  </tbody>
</table>
