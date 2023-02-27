

<?php $td = ''; ?>
<h4 style="text-align:center;">SLIP UANG KELUAR</h4>
<h5 style="text-align:center;"><?= strtoupper(_getBulan($bulan)) ?> <?= $tahun ?></h5>
<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align:center; font-size:10px;">
  <tbody>
    <?php if ($laporan['keluar']['ket_jum_col'] > 0) { ?>
      <tr style="background-color:#c1bcbc;">
        <td rowspan="2">Uraian</td>
        <td class="ket" colspan="<?=$laporan['keluar']['ket_jum_col']?>">Keterangan</td>
        <td rowspan="2">Pokok</td>
        <td rowspan="2">Wajib</td>
        <td rowspan="2">Sukarela</td>
        <td rowspan="2">Pinjaman</td>
        <td rowspan="2">Sibulan</td>
        <td rowspan="2">Dana Kematian</td>
        <td rowspan="2">Jumlah</td>
      </tr>
    <?php } else {?>
      <tr style="background-color:#c1bcbc;">
        <td rowspan="2">Uraian</td>
        <td rowspan="2">Pokok</td>
        <td rowspan="2">Wajib</td>
        <td rowspan="2">Sukarela</td>
        <td rowspan="2">Pinjaman</td>
        <td rowspan="2">Sibulan</td>
        <td rowspan="2">Dana Kematian</td>
        <td rowspan="2">Jumlah</td>
      </tr>
    <?php } ?>
    <tr style="background-color:#c1bcbc;">
      <?php foreach ($laporan['keluar']['daftar_keterangan'] as $dfk) : ?>
        <?php if ($dfk != 'Jumlah') { ?>
            <td><?= $dfk; ?></td>
            <?php $td.='<td></td>'; ?>
        <?php } ?>
      <?php endforeach; ?>
    </tr>

    <?php if (count($laporan['keluar']['tak_terduga_keluar']) > 0) { ?>
      <?php foreach ($laporan['keluar']['tak_terduga_keluar'] as $t) : ?>
        <tr>
            <td><?= $t['uraian']; ?></td>
            <?= _getKeterangan($t['ket'], $laporan['keluar']['daftar_keterangan']); ?>
        </tr>
      <?php endforeach; ?>
    <?php } ?>

    <?php if (count($laporan['keluar']['anggota']) > 0) { ?>
      <?php foreach ($laporan['keluar']['anggota'] as $a) : ?>
        <tr>
          <td><?=$a['nama_anggota']?></td>
          <?= $td; ?>
          <td><?=$a['pokok']?></td>
          <td><?=$a['wajib']?></td>
          <td><?=$a['sukarela']?></td>
          <td><?=$a['pinjaman']?></td>
          <td><?=$a['sibulan']?></td>
          <td><?=$a['dana_kematian']?></td>
          <td><?=$a['jumlah']?></td>
        </tr>
      <?php endforeach; ?>  
    <?php } ?>
    
    <?php $td = ''; ?>
    <?php for ($i=0; $i < $laporan['keluar']['ket_jum_col']; $i++) { ?>
      <?php $td .= '<td>'.number_format($laporan['keluar']['totalSUKArray'][$i + 1],0,',','.').'</td>' ?>
    <?php } ?>

    <tr>
      <td>Jumlah</td>
      <?= $td; ?>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['pokok'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['wajib'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['sukarela'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['pinjaman'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['sibulan'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['totalSUKArray']['dana_kematian'],0,'.',',')?></td>
      <td><?=number_format($laporan['keluar']['total'],0,'.',',')?></td>
    </tr>
  </tbody>
</table>

