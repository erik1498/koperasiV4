<table border="1" cellpadding="2" cellspacing="0" width="100%" style="text-align: center;">
	<tr>
		<td colspan="10">Bagi SHU Bulan <?= _getBulan($bulan) ?> <?= $this->session->userdata('tahun'); ?></td>
	</tr>
	<tr>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="100">No.</td>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="100">No. Anggota</td>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="200">Nama Anggota</td>
		<td style="font-size: 13px; padding: 5px 5px;" colspan="2" width="300">Jumlah Total</td>
		<td style="font-size: 13px; padding: 5px 5px;" colspan="2" width="300">Pembagian SHU</td>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="200">Total Diterima</td>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="200">Nominal Diterima</td>
		<td style="font-size: 13px; padding: 5px 5px;" rowspan="2" width="200">Sisa</td>
	</tr>
	<tr>
		<td style="font-size: 13px; padding: 5px 5px;">Jumlah Saham</td>
		<td style="font-size: 13px; padding: 5px 5px;">Jumlah Bulan Saham</td>
		<td style="font-size: 13px; padding: 5px 5px;">BJS</td>
		<td style="font-size: 13px; padding: 5px 5px;">BJP</td>
	</tr>
	<tbody>
		<?php $i=1; foreach ($anggota as $a) { ?>
			<tr>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $i++ ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['no_buku'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['nama_anggota'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['jumlah_saham'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['bulan_saham'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['bjs'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['bjp'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['total_di_terima'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['diterima'] ?></td>
				<td style="font-size: 13px; padding: 5px 5px;"><?= $a['detail']['sisa'] ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td style="font-size: 13px; padding: 5px 5px;" colspan="3">Jumlah</td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_saham; ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_bulanSaham; ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_bjs; ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_bjp; ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $BagianJasa; ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_di_terima_bulatkan ?></td>
			<td style="font-size: 13px; padding: 5px 5px;"><?= $total_sisa ?></td>
		</tr>
	</tbody>
</table>