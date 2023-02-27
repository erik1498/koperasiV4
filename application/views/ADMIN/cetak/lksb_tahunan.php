<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size: 10px; text-align: center;" colspan="2">
      <b>D. LAPORAN KEUANGAN DAN STATISTIK KSP "UME MNASI" KUPANG <br>
      TAHUN BUKU <?= $this->session->userdata('tahun') ?></b>
    </td>
  </tr>
  <tr>
		<td>
			<table width="100%" style="border: 1px solid rgba(0,0,0, .5); border-top: unset; border-left: unset;">
              <thead>
                <tr>
                  <th colspan="4" style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">NERACA</th>
                </tr>
                <tr>
                  <th rowspan="2" width="5" style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">No PERK</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">AKTIVA 1</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">AKTIVA LANCAR 1</th>
                  <th style="text-align: center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" class="bulan-lksb"><?= $lksb_tahunIni[12]['bulan'] ?> <?= $lksb_tahunIni[12]['tahun'] ?></th>
                  <th style="text-align: center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" class="bulan-ini-lksb"><?= $lksb_tahunLalu[0]['bulan'] ?> <?= $lksb_tahunLalu[0]['tahun'] ?></th>
                </tr>
              </thead>
                            
              <tbody>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">100</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">KAS</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= $lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['kas'] ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= $lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['kas'] ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">120</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SI BUHARI SWASTISARI</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['sibuhari_swastisari'], 0 , '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['sibuhari_swastisari'], 0 , '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">150</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PIUTANG PINJAMAN ANGGOTA</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'], 0 , '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'], 0 , '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">151</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PIUTANG ARISAN</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['piutang_arisan'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['piutang_arisan'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">191</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PIUTANG KONSUMSI</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['piutang_konsumsi'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['piutang_konsumsi'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">195</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">INVESTASI</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['investasi'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['investasi'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">196</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SIMAPAN</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['simapan'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['simapan'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">340</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PERSEDIAAN BARANG</td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['persediaan_barang'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['persediaan_barang'], 0, '.', ',') ?></td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL</th>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_lancar_1']['total'], 0, '.', ',') ?></td>
                  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_lancar_1']['total'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">AKTIVA TETAP 2</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">300</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TANAH</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_tetap_2']['tanah'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_tetap_2']['tanah'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">310</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">GEDUNG</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_tetap_2']['gedung'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_tetap_2']['gedung'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">340</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">INVENTARIS</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_tetap_2']['inventaris'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_tetap_2']['inventaris'], 0, '.', ',') ?></td>
                </tr> 
              </tbody>
              <thead>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL AKTIVA TETAP</th>
 	              <th style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['Aktiva_tetap_2']['total'], 0, '.', ',') ?></th>
                  <th style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['Aktiva_tetap_2']['total'], 0, '.', ',') ?></th>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL AKTIVA 1 + 2</th>
				  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Neraca']['total'], 0, '.', ',') ?></td>
				  <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Neraca']['total'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;; height: 10px;" colspan="4"></th>
                </tr>
                <tr>
                  <th style="text-align:center; border-left: 1px solid rgba(0,0,0, .5); font-size:9px;" colspan="4">PASIVA</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">KEWAJIBAN/UTANG</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['kewajiban'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['kewajiban'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">405</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SI ANAS / SIBULAN</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['sibulan'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['sibulan'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">450</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">BIAYA YANG MASIH HARUS DIBAYAR</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['biaya_yg_masih_harus_dibayar'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['biaya_yg_masih_harus_dibayar'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">451</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SIMPANAN WAJIB TARIK YANG HRS DIBAYAR</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['simpanan_wajib_tarik'], 2, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['simpanan_wajib_tarik'], 2, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">452</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">INVESTASI SIMAPAN</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['investasi_simapan'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['investasi_simapan'], 0, '.', ',') ?></td>
                </tr> 
              </tbody>
              <thead>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL KEWAJIBAN</th>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Pasiva']['total'], 2, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Pasiva']['total'], 2, '.', ',') ?></td>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;; height: 10px;" colspan="4"></th>
                </tr>
                <tr>
                  <th style="text-align:center; border-left: 1px solid rgba(0,0,0, .5); font-size:9px;" colspan="4">MODAL</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">500</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SIMPANAN POKOK</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['simpanan_pokok'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['simpanan_pokok'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">501</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SIMPANAN WAJIB</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['simpanan_wajib'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['simpanan_wajib'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">510</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SIMPANAN SUKARELA</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['simpanan_sukarela'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['simpanan_sukarela'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">520</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">HIBAH/DONASI</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['hibah'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['hibah'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">540</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">DANA CADANGAN UMUM</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['dana_cadangan_umum'], 2, '.', ','); ?></td>
                 	<td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['dana_cadangan_umum'], 2, '.', ','); ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">541</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">DANA CADANGAN RESIKO</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['dana_cadangan_resiko'], 2, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['dana_cadangan_resiko'], 2, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">542</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TITIPAN SIMPANAN</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['titipan_simpanan'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['titipan_simpanan'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">543</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TITIPAN KONSUMSI</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['titipan_konsumsi'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['titipan_konsumsi'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">544</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SALDO UANG DUKA</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['saldo_uang_duka'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['saldo_uang_duka'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">546</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SHU</td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['SHU_Murni'], 2, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['SHU_Murni'], 2, '.', ',') ?></td>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL MODAL SENDIRI</th>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Modal']['total'], 0, '.', ',') ?></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Modal']['total'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL 1 + 2</th>
                    <td style="text-align:right;border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= $lksb_tahunIni[12]['total'] ?></td>
                 	<td style="text-align:right;border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= $lksb_tahunLalu[0]['total'] ?></td>
                </tr>
                <tr>
                    <td style="padding: 9px; text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" colspan="4">
                    <table width="100%">
                      <tr>
                        <td style="text-align: center; font-size: 9px;"></td>
                        <td style="text-align: center; font-size: 9px;">PENGURUS</td>
                        <td style="text-align: center; font-size: 9px;"></td>
                      </tr>
                      <tr>
                        <th style="text-align: center; font-size: 9px;">KETUA</th>
                        <th style="text-align: center; font-size: 9px;">BENDAHARA</th>
                        <th style="text-align: center; font-size: 9px;">JURU BUKU 3</th>
                      </tr>
                      <tr>
                        <th style="text-align: center; font-size: 9px; height: 19px;"></th>
                      </tr>
                      <tr>
                        <th style="text-align: center; font-size: 9px;">ALEX DA COSTA</th>
                        <th style="text-align: center; font-size: 9px;">ALEXANDER LELAN</th>
                        <th style="text-align: center; font-size: 9px;">ALBINUS SALEM</th>
                      </tr>
                    </table>
                </td>
                </tr>
              </tbody>
            </table>
		</td>




		<td>
			<table width="100%" style="border: 1px solid rgba(0,0,0, .5); border-top: unset; border-left: unset;">
              <thead>
                <tr>
                  <th colspan="4" style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">LAPORAN SHU</th>
                </tr>
                <tr>
                  <th rowspan="2" width="5" style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">No PERK</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" rowspan="2">PENDAPATAN</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                </tr>
                <tr>
                  <th style="text-align: center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" class="bulan-lksb"><?= $lksb_tahunIni[12]['bulan'] ?> <?= $lksb_tahunIni[12]['tahun'] ?></th>
                  <th style="text-align: center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" class="bulan-ini-lksb"><?= $lksb_tahunLalu[0]['bulan'] ?> <?= $lksb_tahunLalu[0]['tahun'] ?></th>
                </tr>
              </thead>
                            
              <tbody>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">600</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">BUNGA PINJAMAN</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['bunga_pinjaman'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['bunga_pinjaman'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">603</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PROVISI KREDIT</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['provisi'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['provisi'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">604</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">UANG PANGKAL</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['uang_pangkal'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['uang_pangkal'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">610</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">BUNGA SIBUHARI SWASTISARI</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['bunga_sibuhari_swastisari'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['bunga_sibuhari_swastisari'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">619</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">LABA PENJUALAN BARANG</td><td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['laba_penjualan_barang'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['laba_penjualan_barang'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">620</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">ADM. PELAYANAN</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['administrasi_pelayanan'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['administrasi_pelayanan'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">621</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">PENDAPATAN LAIN LAIN</td><td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['pendapatan_lainnya'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['pendapatan_lainnya'], 0, '.', ',') ?></td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:left; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th><td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['pendapatan']['jumlah'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['pendapatan']['jumlah'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">622</td>
                  <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">NON USAHA ( DUKA ) SAMPAI DENGAN</td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Non_usaha']['uang_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Non_usaha']['uang_duka'], 0, '.', ',') ?></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" rowspan="2">BIAYA - BIAYA</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH</th>
                </tr>
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?=$lksb_tahunIni[12]['bulan']?> <?=$lksb_tahunIni[12]['tahun']?></th>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?=$lksb_tahunIni[12]['bulan']?> <?=$lksb_tahunIni[12]['tahun']?></th>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">700</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">1. SIMPANAN NON SAHAM</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['simpanan_non_saham'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['simpanan_non_saham'], 0, '.', ',') ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">2. BIAYA ORGANISASI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['biaya_organisasi'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['biaya_organisasi'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">3. BEBAN SIMPANAN WAJIB TARIK</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">4. BEBAN BIAYA PENGURUS</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['beban_biaya_pengurus'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['beban_biaya_pengurus'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">5. CETAK SUM DAN SUK</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['cetak_sum_suk'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['cetak_sum_suk'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">6. KALKULATOR + FC + JILID + NOTEBOOK + B. SIBUHARI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['kalkulator'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['kalkulator'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">7. BIAYA JASA KARYAWAN</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['biaya_jasa_karyawan'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['biaya_jasa_karyawan'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">8. BIAYA RAT</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['biaya_rat'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['biaya_rat'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">9. PAJAK</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['pajak'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['pajak'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">810</td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">BAYAR SANTUNAN DUKA</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['bayar_santunan_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['bayar_santunan_duka'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px; height: 16px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                 	<td style="text-align:right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">TOTAL BIAYA</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['jumlah'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['jumlah'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SALDO UANG DUKA SAMPAI DENGAN</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['biaya']['saldo_uang_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['biaya']['saldo_uang_duka'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SHU SEBELUM BEBEAN</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['SHU_Sebelum_Beban'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['SHU_Sebelum_Beban'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"></td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SHU MURNI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Laporan_SHU']['SHU_Murni'], 2, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Laporan_SHU']['SHU_Murni'], 2, '.', ',') ?></td>
                </tr>
                <tr>
                  <th colspan="4"></th>
                </tr>
                <tr>
                  <th colspan="4"></th>
                </tr> 
                <tr>
                  <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px; height: 30px;" colspan="4">DATA STATISTIK</th>
                </tr>
                <tr>
                  <th colspan="4"></th>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;" colspan="2">TANGGAL PEMBENTUKAN : 01 MARET 2007 <br> WILAYAH KERJA : KOTA KUPANG</td>
                    <th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?=
                    $lksb_tahunIni[12]['bulan'] ?> <?= $lksb_tahunIni[12]['tahun'] ?></th>
                 	<th style="text-align:center; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?=
                    $lksb_tahunLalu[0]['bulan'] ?> <?= $lksb_tahunLalu[0]['tahun'] ?></th>
                </tr>
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">1. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH ANGGOTA</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['jumlah_anggota'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['jumlah_anggota'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">2. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH SIMPANAN SAHAM SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['simpanan_saham'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['simpanan_saham'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">3. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH SIMPANAN NON SAHAM SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= is_numeric($lksb_tahunIni[12]['Data_Statistik']['simpanan_non_saham']) ? number_format($lksb_tahunIni[12]['Data_Statistik']['simpanan_non_saham'], 0, '.', ','): $lksb_tahunIni[12]['Data_Statistik']['simpanan_non_saham']; ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= is_numeric($lksb_tahunLalu[0]['Data_Statistik']['simpanan_non_saham']) ? number_format($lksb_tahunLalu[0]['Data_Statistik']['simpanan_non_saham'], 0, '.', ',') : $lksb_tahunLalu[0]['Data_Statistik']['simpanan_non_saham']; ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">4. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH KELALAIAN PINJAMAN SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['kelalaian_pinjaman'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['kelalaian_pinjaman'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">5. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH PINJAMAN SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['pinjaman'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['pinjaman'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">6. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH PINJAMAN SEJAK BERDIRI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['pinjaman_sejak_berdiri'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['pinjaman_sejak_berdiri'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">7. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH UANG DUKA SEJAK BERDIRI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['uang_duka_sejak_berdiri'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['uang_duka_sejak_berdiri'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">8. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">JUMLAH UANG DUKA SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['uang_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['uang_duka'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">9. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SANTUNAN UANG DUKA SD BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['santunan_uang_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['santunan_uang_duka'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">10. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SANTUNAN DUKA SEJAK BERDIRI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['santunan_uang_duka_sejak_berdiri'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['santunan_uang_duka_sejak_berdiri'], 0, '.', ',') ?></td>
                </tr> 
                <tr>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">11. </td>
                    <td style="border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;">SALDO UANG DUKA BULAN INI</td>
                    <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunIni[12]['Data_Statistik']['saldo_uang_duka'], 0, '.', ',') ?></td>
                  <td style="text-align: right; border: 1px solid rgba(0,0,0, .5); border-bottom: unset; border-right: unset; font-size:9px;"><?= number_format($lksb_tahunLalu[0]['Data_Statistik']['saldo_uang_duka'], 0, '.', ',') ?></td>
                </tr> 
                
            </table>
		</td>
	</tr>
</table>