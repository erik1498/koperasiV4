<?php 

class bukuBesar_model extends CI_model{
	public function getDatail()
	{
		$lksb = [];
		for ($i=1; $i <= intval($this->session->userdata('bulan')); $i++) { 
			$lksb_i = $this->lksb_model->getLKSB($i);
			if (!is_null($lksb_i)) {
				$keys = array_keys($lksb_i);
				foreach ($keys as $k) {
					if (!isset($lksb[$k])) {
						$lksb[$k] = $lksb_i[$k];
					}
				}
			}
		}
		$return = [];
		$keys = array_keys($lksb);
		$sibuhari = $this->sibuhari_model->akumulasi($_SESSION['tahun']);
		$bunga_sibuhari = $this->bunga_sibuhari_model->akumulasi($_SESSION['tahun']);
		$sibuhari = $this->mergeRekening($sibuhari, $bunga_sibuhari);

		$persediaan = $this->persediaan_model->akumulasi($_SESSION['tahun']);
		$kalkulator = $this->kalkulator_model->akumulasi($_SESSION['tahun']);
		$biaya_organisasi = $this->biaya_organisasi_model->akumulasi($_SESSION['tahun']);
		$piutang_arisan = $this->piutang_arisan_model->akumulasi($_SESSION['tahun']);
		$piutang_konsumsi = $this->piutang_konsumsi_model->akumulasi($_SESSION['tahun']);
		$inventaris = $this->inventaris_model->akumulasi($_SESSION['tahun']);
		$shu = $this->shu_model->akumulasi($_SESSION['tahun']);
		$investasi_simapan = $this->investasi_simapan_model->akumulasi($_SESSION['tahun']);
		$hibah_donasi = $this->hibah_donasi_model->akumulasi($_SESSION['tahun']);
		$dcu = $this->dcu_model->akumulasi($_SESSION['tahun']);
		$dcr = $this->dcr_model->akumulasi($_SESSION['tahun']);
		$titipan_simpanan = $this->titipan_simpanan_model->akumulasi($_SESSION['tahun']);
		$titipan_konsumsi = $this->titipan_konsumsi_model->akumulasi($_SESSION['tahun']);
		$titipan_arisan = $this->titipan_arisan_model->akumulasi($_SESSION['tahun']);
		$rat = $this->rat_model->akumulasi($_SESSION['tahun']);

		$biaya_organisasi = $this->biaya_organisasi_model->akumulasi($_SESSION['tahun']);
		$pelunasan_biaya_organisasi = $this->pelunasan_biaya_organisasi_model->akumulasi($_SESSION['tahun']);
		$biaya_yg_masih_harus_dibayar = $this->getBiayaYgMasihHarusDibayar($rat, $biaya_organisasi, $pelunasan_biaya_organisasi);


		$beban_biaya_pengurus = $this->beban_biaya_pengurus_model->akumulasi($_SESSION['tahun']);
		$beban_simpanan_wajib_tarik = $this->beban_simpanan_wajib_tarik_model->akumulasi($_SESSION['tahun']);
		$simpanan_wajib_tarik_yg_masih_harus_dibayar = $this->getSimpananWajibTarikYgMasihHarusDibayar($beban_biaya_pengurus, $beban_simpanan_wajib_tarik);

		$simapan = $this->simapan_model->akumulasi($_SESSION['tahun']);
		$bunga_simapan = $this->bunga_simapan_model->akumulasi($_SESSION['tahun']);
		$simapan = $this->mergeRekening($simapan, $bunga_simapan);

		foreach ($keys as $k) {

			$return[$k]['kas'] = $this->getKas($lksb[$k]);

			$return[$k]['sibuhari'] = intval($k) > 0 ? $this->getNormalisasiKey($sibuhari[$k], 'sibuhari') : $this->getZero($lksb[$k]['Neraca']['Aktiva_lancar_1']['sibuhari_swastisari'], 'sibuhari');

			$return[$k]['piutang_arisan'] = intval($k) > 0 ? $this->getNormalisasiKey($piutang_arisan[$k], 'piutang_arisan') : $this->getZero($lksb[$k]['Neraca']['Aktiva_lancar_1']['piutang_arisan'], 'piutang_arisan');
			
			$return[$k]['piutang_konsumsi'] = intval($k) > 0 ? $this->getNormalisasiKey($piutang_konsumsi[$k], 'piutang_konsumsi') : $this->getZero($lksb[$k]['Neraca']['Aktiva_lancar_1']['piutang_konsumsi'], 'piutang_konsumsi');
			
			$return[$k]['simapan'] = intval($k) > 0 ? $this->getNormalisasiKey($simapan[$k], 'simapan') : $this->getZero($lksb[$k]['Neraca']['Aktiva_lancar_1']['simapan'], 'simapan');


			$return[$k]['persediaan'] = intval($k) > 0 ? $this->getNormalisasiKey($persediaan[$k], 'persediaan') : $this->getZero($lksb[$k]['Neraca']['Aktiva_lancar_1']['persediaan_barang'], 'persediaan');

			$return[$k]['inventaris'] = intval($k) > 0 ? $this->getNormalisasiKey($inventaris[$k], 'inventaris') : $this->getZero($lksb[$k]['Neraca']['Aktiva_tetap_2']['inventaris'], 'inventaris');

			$return[$k]['investasi_simapan'] = intval($k) > 0 ? $this->getNormalisasiKey($investasi_simapan[$k], 'investasi_simapan') : $this->getZero($lksb[$k]['Pasiva']['investasi_simapan'], 'investasi_simapan');

			$return[$k]['hibah'] = intval($k) > 0 ? $this->getNormalisasiKey($hibah_donasi[$k], 'hibah') : $this->getZero($lksb[$k]['Modal']['hibah'], 'hibah');

			$return[$k]['dcu'] = intval($k) > 0 ? $this->getNormalisasiKey($dcu[$k], 'dcu') : $this->getZero($lksb[$k]['Modal']['dana_cadangan_umum'], 'dcu');

			$return[$k]['dcr'] = intval($k) > 0 ? $this->getNormalisasiKey($dcr[$k], 'dcr') : $this->getZero($lksb[$k]['Modal']['dana_cadangan_resiko'], 'dcr');


			$return[$k]['shu'] = intval($k) > 0 ? $this->getNormalisasiKey($shu[$k], 'shu') : $this->getZero($lksb[$k]['Laporan_SHU']['SHU_Murni'], 'shu');

			$return[$k]['titipan_simpanan'] = intval($k) > 0 ? $this->getNormalisasiKey($titipan_simpanan[$k], 'titipan_simpanan') : $this->getZero($lksb[$k]['Modal']['titipan_simpanan'], 'titipan_simpanan');

			$return[$k]['titipan_konsumsi'] = intval($k) > 0 ? $this->getNormalisasiKey($titipan_konsumsi[$k], 'titipan_konsumsi') : $this->getZero($lksb[$k]['Modal']['titipan_konsumsi'], 'titipan_konsumsi');

			$return[$k]['titipan_arisan'] = intval($k) > 0 ? $this->getNormalisasiKey($titipan_arisan[$k], 'titipan_arisan') : $this->getZero($lksb[$k]['Modal']['titipan_arisan'], 'titipan_arisan');

			$return[$k]['biaya_yg_masih_harus_dibayar'] = intval($k) > 0 ? $this->getNormalisasiKey($biaya_yg_masih_harus_dibayar[$k], 'biaya_yg_masih_harus_dibayar') : $this->getZero($lksb[$k]['Pasiva']['biaya_yg_masih_harus_dibayar'], 'biaya_yg_masih_harus_dibayar');

			$return[$k]['simpanan_wajib_tarik_yg_masih_harus_dibayar'] = intval($k) > 0 ? $this->getNormalisasiKey($simpanan_wajib_tarik_yg_masih_harus_dibayar[$k], 'simpanan_wajib_tarik_yg_masih_harus_dibayar') : $this->getZero($lksb[$k]['Pasiva']['simpanan_wajib_tarik'], 'simpanan_wajib_tarik_yg_masih_harus_dibayar');


			$return[$k]['simpanan_pokok'] = $this->getSimpanan($lksb[$k], 'pokok');
			$return[$k]['simpanan_wajib'] = $this->getSimpanan($lksb[$k], 'wajib');
			$return[$k]['simpanan_sukarela'] = $this->getSimpanan($lksb[$k], 'sukarela');


			$return[$k]['piutang_pinjaman_anggota'] = $this->getPiutangPinjamanAnggota($lksb[$k]);
			$return[$k]['sibulan'] = $this->getSibulan($lksb[$k]);
			$return[$k]['saldo_uang_duka'] = $this->getSaldoUangDuka($lksb[$k]);
			$return[$k]['bunga_pinjaman'] = $this->getBungaPinjaman($lksb[$k]);
			$return[$k]['provisi'] = $this->getProvisi($lksb[$k]);
			$return[$k]['uang_pangkal'] = $this->getUangPangkal($lksb[$k]);
			$return[$k]['bunga_sibuhari'] = intval($k) > 0 ? $this->getNormalisasiKey($bunga_sibuhari[$k], 'bunga_sibuhari') : $this->getZero($lksb[$k]['Laporan_SHU']['pendapatan']['bunga_sibuhari_swastisari'], 'bunga_sibuhari');
			$return[$k]['laba_penjualan_barang'] = $this->getLabaPenjualanBarang($lksb[$k]);
			$return[$k]['administrasi_pelayanan'] = $this->getAdministrasiPelayanan($lksb[$k]);
			$return[$k]['pendapatan_lainnya'] = $this->getPendapatanLainnya($lksb[$k]);



			$return[$k]['simpanan_non_saham'] = $this->getSimpananNonSaham($lksb[$k]);
			$return[$k]['rat'] = intval($k) > 0 ? $this->getNormalisasiKey($rat[$k], 'rat', 'total') : $this->getZero($lksb[$k]['Laporan_SHU']['biaya']['biaya_rat'], 'rat');
			$return[$k]['biaya_organisasi'] = intval($k) > 0 ? $this->getNormalisasiKey($biaya_organisasi[$k], 'biaya_organisasi') : $this->getZero($lksb[$k]['Laporan_SHU']['biaya']['biaya_organisasi'], 'biaya_organisasi');


			$return[$k]['beban_simpanan_wajib_tarik'] = $this->getBebanSimpananWajibTarik($lksb[$k], $k, $beban_simpanan_wajib_tarik);
			$return[$k]['beban_biaya_pengurus'] = $this->getBebanBiayaPengurus($lksb[$k], $k, $beban_biaya_pengurus);

			$return[$k]['foto_copy'] = intval($k) > 0 ? $this->getNormalisasiKeyNoDebitKredit($kalkulator[$k], 'foto_copy') : $this->getZero($lksb[$k]['Laporan_SHU']['biaya']['kalkulator'], 'foto_copy');


			$return[$k]['dana_duka'] = $this->getDanaDuka($lksb[$k]);


		}
		foreach ($keys as $k) {
			$return[$k]['bulan'] = _getBulan($k);
		}
		return $return;
	}

	public function getDanaDuka($lksb)
	{
		return [
			'saldo' => $lksb['Data_Statistik']['saldo_uang_duka'],
			'dana_duka_masuk' => $lksb['Laporan_SHU']['biaya']['saldo_uang_duka_masuk'],
			'dana_duka_keluar' => $lksb['Laporan_SHU']['biaya']['saldo_uang_duka_keluar'],
		];
	}

	public function getBebanSimpananWajibTarik($lksb, $k, $beban_simpanan_wajib_tarik)
	{
		$jum = 0;
		$kre = 0;
		if ($k < 1 && $_SESSION['tahun'] == '2021') {
			// $jum = $lksb['Laporan_SHU']['SHU_Murni'] * 60 / 100;
		// }else{
			$jum = $lksb['Laporan_SHU']['SHU_Sebelum_Beban'] * 60 / 100;
		}elseif ($k < 1 && $_SESSION['tahun'] !== '2021') {
			$jum = $lksb['Laporan_SHU']['SHU_Murni'] * 60 / 100;
		}
		elseif ($k > 0 && $_SESSION['tahun'] !== '2021') {
			$jum = $beban_simpanan_wajib_tarik[$k]['debit'];
			$kre = $beban_simpanan_wajib_tarik[$k]['kredit'];
		}
		return [
			'saldo' => number_format($jum - $kre, 2, '.',','),
			'beban_simpanan_wajib_tarik_masuk' => $jum,
			'beban_simpanan_wajib_tarik_keluar' => $kre,
		];
	}

	public function getBebanBiayaPengurus($lksb, $k, $beban_biaya_pengurus)
	{
		$jum = 0;
		$kre = 0;
		// if ($k < 12) {
		if ($k < 1 && $_SESSION['tahun'] == '2021') {
		// 	$jum = $lksb['Laporan_SHU']['SHU_Murni'] * 20 / 100;
		// }else{
			// $jum = $lksb['Laporan_SHU']['SHU_Sebelum_Beban'] * 20 / 100;
			$jum = $lksb['Laporan_SHU']['SHU_Sebelum_Beban'] * 20 / 100;
		}elseif ($k < 1 && $_SESSION['tahun'] !== '2021') {
			$jum = $lksb['Laporan_SHU']['SHU_Murni'] * 60 / 100;
		}
		elseif ($k > 0 && $_SESSION['tahun'] !== '2021') {
			$jum = $beban_biaya_pengurus[$k]['debit'];
			$kre = $beban_biaya_pengurus[$k]['kredit'];
		}
		return [
			'saldo' => $jum - $kre,
			'beban_biaya_pengurus_masuk' => $jum,
			'beban_biaya_pengurus_keluar' => $kre,
		];
	}

	public function getSimpananNonSaham($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['biaya']['simpanan_non_saham'],
			'simpanan_non_saham_masuk' => $lksb['Laporan_SHU']['biaya']['simpanan_non_saham_masuk'],
			'simpanan_non_saham_keluar' => 0,
		];
	}

	public function getKas($lksb)
	{
		return [
			'saldo' => str_replace(',', '', $lksb['Neraca']['Aktiva_lancar_1']['kas']),
			'kas_masuk' => $lksb['Neraca']['Aktiva_lancar_1']['kas_masuk'],
			'kas_keluar' => $lksb['Neraca']['Aktiva_lancar_1']['kas_keluar'],
		];
	}

	public function getBungaPinjaman($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['bunga_pinjaman'],
			'bunga_pinjaman_masuk' => $lksb['Laporan_SHU']['pendapatan']['bunga_pinjaman'],
			'bunga_pinjaman_keluar' => 0,
		];
	}

	public function getProvisi($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['provisi'],
			'provisi_masuk' => $lksb['Laporan_SHU']['pendapatan']['provisi'],
			'provisi_keluar' => 0,
		];
	}

	public function getAdministrasiPelayanan($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['administrasi_pelayanan'],
			'administrasi_pelayanan_masuk' => $lksb['Laporan_SHU']['pendapatan']['administrasi_pelayanan'],
			'administrasi_pelayanan_keluar' => 0,
		];
	}

	public function getPendapatanLainnya($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['pendapatan_lainnya'],
			'pendapatan_lainnya_masuk' => $lksb['Laporan_SHU']['pendapatan']['pendapatan_lainnya'],
			'pendapatan_lainnya_keluar' => 0,
		];
	}

	public function getLabaPenjualanBarang($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['laba_penjualan_barang'],
			'laba_penjualan_barang_masuk' => $lksb['Laporan_SHU']['pendapatan']['laba_penjualan_barang'],
			'laba_penjualan_barang_keluar' => 0,
		];
	}

	public function getUangPangkal($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['pendapatan']['uang_pangkal'],
			'uang_pangkal_masuk' => $lksb['Laporan_SHU']['pendapatan']['uang_pangkal'],
			'uang_pangkal_keluar' => 0,
		];
	}

	public function getSaldoUangDuka($lksb)
	{
		return [
			'saldo' => $lksb['Laporan_SHU']['biaya']['saldo_uang_duka'],
			'saldo_uang_duka_masuk' => $lksb['Laporan_SHU']['biaya']['saldo_uang_duka_masuk'],
			'saldo_uang_duka_keluar' => $lksb['Laporan_SHU']['biaya']['saldo_uang_duka_keluar'],
		];
	}

	public function getSimpanan($lksb, $key)
	{
		return [
			'saldo' => $lksb['Modal']['simpanan_'.$key],
			'simpanan_'.$key.'_masuk' => $lksb['Modal']['simpanan_'.$key.'_masuk'],
			'simpanan_'.$key.'_keluar' => $lksb['Modal']['simpanan_'.$key.'_keluar'],
		];
	}

	public function getPiutangPinjamanAnggota($lksb)
	{
		return [
			'saldo' => $lksb['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'],
			'piutang_pinjaman_anggota_masuk' => $lksb['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota_masuk'],
			'piutang_pinjaman_anggota_keluar' => $lksb['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota_keluar'],
		];
	}

	public function getSibulan($lksb)
	{
		return [
			'saldo' => $lksb['Pasiva']['sibulan'],
			'sibulan_masuk' => $lksb['Pasiva']['sibulan_masuk'],
			'sibulan_keluar' => round($lksb['Pasiva']['sibulan_keluar']),
		];
	}

	public function getNormalisasiKey($data, $key, $jum_key = null)
	{
		return [
			'saldo' => is_null($jum_key) ? $data['jumlah'] : $data[$jum_key],
			$key.'_masuk' => $data['debit'],
			$key.'_keluar' => $data['kredit']
		];
	}


	public function getNormalisasiKeyNoDebitKredit($data, $key)
	{
		return [
			'saldo' => $data['total'],
			$key.'_masuk' => $data['jumlah'],
			$key.'_keluar' => 0
		];
	}

	public function getZero($value, $key)
	{
		return [
			'saldo' => $value,
			$key.'_masuk' => $value,
			$key.'_keluar' => 0,
		];
	}

	public function mergeRekening($rek1, $rek2)
	{
		for ($i=1; $i < 13; $i++) { 
			$rek1[$i]['debit'] += $rek2[$i]['debit'];
			$rek1[$i]['kredit'] += $rek2[$i]['kredit'];
			$rek1[$i]['jumlah'] += $rek2[$i]['jumlah'];
		}
		return $rek1;
	}

	public function getBiayaYgMasihHarusDibayar($rat , $biaya_organisasi, $pelunasan)
	{
		$rek1 = [];
		$jumlah = 0;
		for ($i=1; $i < 13; $i++) { 
			$rek1[$i]['debit'] = $rat[$i]['debit'] + $biaya_organisasi[$i]['selisih'] + $pelunasan[$i]['debit'] + $rat[$i]['kredit'];
			$rek1[$i]['kredit'] = $pelunasan[$i]['debit'] + $rat[$i]['kredit'];
			$jumlah += $rek1[$i]['debit'] - $rek1[$i]['kredit'];
			$rek1[$i]['jumlah'] = $jumlah;
		}

		return $rek1;
	}

	public function getSimpananWajibTarikYgMasihHarusDibayar($beban_biaya_pengurus , $beban_simpanan_wajib_tarik)
	{
		$rek1 = [];
		for ($i=1; $i < 13; $i++) { 
			$rek1[$i]['debit'] = $beban_simpanan_wajib_tarik[$i]['debit'] + $beban_biaya_pengurus[$i]['debit']; 
			$rek1[$i]['kredit'] = $beban_simpanan_wajib_tarik[$i]['kredit'] + $beban_biaya_pengurus[$i]['kredit']; 
			$rek1[$i]['jumlah'] = floatval(str_replace(',', '', $beban_simpanan_wajib_tarik[$i]['jumlah'])) + floatval(str_replace(',', '', $beban_biaya_pengurus[$i]['jumlah']));
		}

		return $rek1;
	}
}