<table width="100%" cellpadding="10">
	<tr>
		<th colspan="3" style="text-align: center; font-size:10px;"><h4>Buku Besar Tahun <?= $this->session->userdata('tahun') ?></h4></th>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Kas</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['kas_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['kas_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['kas_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['kas_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['kas']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Sibuhari</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['sibuhari_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['sibuhari_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['sibuhari_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['sibuhari_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibuhari']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Piutang Pinjaman Anggota</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['piutang_pinjaman_anggota_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['piutang_pinjaman_anggota_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['piutang_pinjaman_anggota_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['piutang_pinjaman_anggota_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_pinjaman_anggota']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Piutang Arisan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['piutang_arisan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['piutang_arisan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['piutang_arisan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['piutang_arisan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['piutang_arisan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Simapan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['simapan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['simapan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['simapan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['simapan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simapan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Persediaan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['persediaan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['persediaan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['persediaan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['persediaan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['persediaan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Inventaris</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['inventaris_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['inventaris_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['inventaris_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['inventaris_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['inventaris']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Sibulan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= $bukuBesar[$i]['sibulan']['sibulan_masuk'] ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibulan']['sibulan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibulan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= $bukuBesar[$i]['sibulan']['sibulan_masuk'] ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibulan']['sibulan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['sibulan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Biaya Yang Masih Harus DiBayar</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['biaya_yg_masih_harus_dibayar_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['biaya_yg_masih_harus_dibayar_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['biaya_yg_masih_harus_dibayar_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['biaya_yg_masih_harus_dibayar_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_yg_masih_harus_dibayar']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Simpanan Wajib Tarik Yang Masih Harus DiBayar</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['simpanan_wajib_tarik_yg_masih_harus_dibayar_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['simpanan_wajib_tarik_yg_masih_harus_dibayar_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['simpanan_wajib_tarik_yg_masih_harus_dibayar_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['simpanan_wajib_tarik_yg_masih_harus_dibayar_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib_tarik_yg_masih_harus_dibayar']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Investasi Simapan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['investasi_simapan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['investasi_simapan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['investasi_simapan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['investasi_simapan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['investasi_simapan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Hibah / Donasi</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['hibah_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['hibah_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['hibah_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['hibah_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['hibah']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Simpanan Pokok</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['simpanan_pokok_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['simpanan_pokok_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['simpanan_pokok_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['simpanan_pokok_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_pokok']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Simpanan Wajib</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['simpanan_wajib_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['simpanan_wajib_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['simpanan_wajib_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['simpanan_wajib_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_wajib']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Simpanan Sukarela</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['simpanan_sukarela_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['simpanan_sukarela_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['simpanan_sukarela_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['simpanan_sukarela_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_sukarela']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Dana Cadangan Umum</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['dcu_masuk'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['dcu_keluar'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['saldo'], 2, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['dcu_masuk'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['dcu_keluar'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcu']['saldo'], 2, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Dana Cadangan Resiko</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['dcr_masuk'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['dcr_keluar'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['saldo'], 2, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['dcr_masuk'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['dcr_keluar'], 2, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dcr']['saldo'], 2, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Titipan Simpanan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['titipan_simpanan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['titipan_simpanan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['titipan_simpanan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['titipan_simpanan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_simpanan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Titipan Konsumsi</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['titipan_konsumsi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['titipan_konsumsi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['titipan_konsumsi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['titipan_konsumsi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_konsumsi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Titipan Arisan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['titipan_arisan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['titipan_arisan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['titipan_arisan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['titipan_arisan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['titipan_arisan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Saldo Uang Duka</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo_uang_duka_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo_uang_duka_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo_uang_duka_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo_uang_duka_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['saldo_uang_duka']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : SHU</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['shu_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['shu_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['shu_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['shu_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['shu']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Pendapatan Bunga Pinjaman</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['bunga_pinjaman_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['bunga_pinjaman_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['bunga_pinjaman_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['bunga_pinjaman_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_pinjaman']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Provisi Kredit</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['provisi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['provisi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['provisi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['provisi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['provisi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Uang Pangkal</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['uang_pangkal_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['uang_pangkal_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['uang_pangkal_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['uang_pangkal_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['uang_pangkal']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Bunga Sibuhari Swastisari</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['bunga_sibuhari_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['bunga_sibuhari_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['bunga_sibuhari_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['bunga_sibuhari_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['bunga_sibuhari']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Laba Penjualan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['laba_penjualan_barang_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['laba_penjualan_barang_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['laba_penjualan_barang_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['laba_penjualan_barang_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['laba_penjualan_barang']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Administrasi Pelayanan</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['administrasi_pelayanan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['administrasi_pelayanan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['administrasi_pelayanan_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['administrasi_pelayanan_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['administrasi_pelayanan']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Pendapatan Lainnya</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['pendapatan_lainnya_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['pendapatan_lainnya_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['pendapatan_lainnya_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['pendapatan_lainnya_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['pendapatan_lainnya']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Biaya Bunga Simpanan Non Saham</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['simpanan_non_saham_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['simpanan_non_saham_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['simpanan_non_saham_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['simpanan_non_saham_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['simpanan_non_saham']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Biaya Organisasi</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['biaya_organisasi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['biaya_organisasi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['biaya_organisasi_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['biaya_organisasi_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['biaya_organisasi']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Beban Simpanan Wajib Tarik</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_simpanan_wajib_tarik']['beban_simpanan_wajib_tarik_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_simpanan_wajib_tarik']['beban_simpanan_wajib_tarik_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= $bukuBesar[$i]['beban_simpanan_wajib_tarik']['saldo'] ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_simpanan_wajib_tarik']['beban_simpanan_wajib_tarik_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_simpanan_wajib_tarik']['beban_simpanan_wajib_tarik_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= $bukuBesar[$i]['beban_simpanan_wajib_tarik']['saldo'] ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Beban Biaya Pengurus</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['beban_biaya_pengurus_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['beban_biaya_pengurus_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['beban_biaya_pengurus_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['beban_biaya_pengurus_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['beban_biaya_pengurus']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Foto Copy</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['foto_copy_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['foto_copy_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['foto_copy_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['foto_copy_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['foto_copy']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Dana Duka</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['dana_duka_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['dana_duka_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['dana_duka_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['dana_duka_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['dana_duka']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
		<td>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="4" style="text-align: center; font-size:10px;">Nama Rekening : Biaya RAT</th>
				</tr>
				<tr>
					<td style="text-align: center; font-size:10px;">Bulan</td>
					<td style="text-align: center; font-size:10px;">Debit</td>
					<td style="text-align: center; font-size:10px;">Kredit</td>
					<td style="text-align: center; font-size:10px;">Jumlah</td>
				</tr>
				<?php for ($i=0; $i < 13; $i++) { if (isset($bukuBesar[$i])) { ?>
					<?php if ($i > 0) { ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= _getBulan($i) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['rat_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['rat_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } else{ ?>
						<tr>
							<td style="text-align: center; font-size:10px;"><?= 'Desember '.($this->session->userdata('tahun') - 1) ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['rat_masuk'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['rat_keluar'], 0, '.', ',') ?></td>
							<td style="text-align: right; font-size:10px;"><?= number_format($bukuBesar[$i]['rat']['saldo'], 0, '.', ',') ?></td>
						</tr>
					<?php } ?>
				<?php } } ?>
			</table>
		</td>
	</tr>
</table>