<?php 

class lksb_model extends CI_model{

    public function get_sumsuk($bulan)
    {
        $kas = str_replace(',', '', $this->getLKSB(0)['Neraca']['Aktiva_lancar_1']['kas']);
        
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
        
        $kirim = [];
        $total_masuk = [];
        $total_keluar = [];

        
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota_full = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= intval($bulan); $i++) { 
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota_full, null, null, true);
            for ($j=0; $j < count($anggota); $j++) { 
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota']);
            }
            
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan']);
            }

            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $this->tak_terduga_masuk_model->daftar_tak_terduga($i),
                'tak_terduga_keluar' => $this->tak_terduga_keluar_model->daftar_tak_terduga($i),
            ];
            $data = $this->sumsuk_model->getSUMSUK($inputParameter);
            $sumsuk[$i] = $data;
            $total_masuk[$i] = $data['masuk']['total'];
            $total_keluar[$i] = $data['keluar']['total'];
            $kas_tiap_bulan_value = $kas_tiap_bulan_value + (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
            $kas_tiap_bulan[$i] = number_format($kas_tiap_bulan_value,0,'.',',');
            $sumsuk[$i]['kas_bulan_ini'] = number_format((floatval($data['masuk']['total']) - floatval($data['keluar']['total'])),0,',','.');
        }
        $kirim['data'] = $sumsuk;
        $kirim['total_masuk'] = $total_masuk;
        $kirim['total_keluar'] = $total_keluar;
        $kirim['kas_tiap_bulan'] = $kas_tiap_bulan;
        $kirim['kas'] = number_format($kas,0,'.',',');
        $kirim['kas_bulan_ini'] = number_format($kas_bulan_ini,0,'.',',');
        $kirim['bulan'] = _getBulan($bulan).' '.$_SESSION['tahun'];
        return $kirim;
    }

    public function validasi($terima)
    {
        $data = $terima['data'];

        if (isset($terima['batal']) && $terima['batal'] == true) {
            for ($i=_getBulanAngka($data['bulan']); $i < 13; $i++) { 
                $this->db->where('bulan', $i);
                $this->db->where('tahun', $data['tahun']);
                $hasil = $this->db->delete('tbl_lksb');
                if ($hasil && file_exists(FCPATH.'assets/lksb_json/'.$i.'_'.$data['tahun'].'.json')) {
                    unlink(FCPATH.'assets/lksb_json/'.$i.'_'.$data['tahun'].'.json');
                }
            }
            return false;
        }
        else{
            $data = $terima['data'];
            $data['validasi'] = 1;
            $json = json_encode($data);
            file_put_contents(FCPATH.'assets/lksb_json/'._getBulanAngka($data['bulan']).'_'.$data['tahun'].'.json', $json);
            return $this->db->insert(
                'tbl_lksb',
                [
                    'bulan' => _getBulanAngka($data['bulan']),
                    'tahun' => $data['tahun'],
                    'file' => _getBulanAngka($data['bulan']).'_'.$data['tahun'].'.json',
                    'validasi' => 1,
                ]
            );
        }
    }

    public function getLKSB($bulan)
    {
        $tahun = intval($_SESSION['tahun']);
        $lksb_tbl = $this->db->get_where('tbl_lksb', ['bulan' => $bulan, 'tahun' => $tahun])->row_array();
        if (isset($lksb_tbl['validasi']) && $lksb_tbl['validasi'] == 1) {
            if (file_exists(FCPATH.'/assets/lksb_json/'.$lksb_tbl['file'])) {
                $json_file = file_get_contents(FCPATH.'/assets/lksb_json/'.$lksb_tbl['file']);
                $return[$bulan] = json_decode($json_file, true);
                if ($bulan == 1) {
                    $bulan = 13;
                    $tahun = $lksb_tbl['tahun'] - 1;
                }
                if (file_exists(FCPATH.'/assets/lksb_json/'.($bulan - 1).'_'.$tahun.'.json')) {
                    $json_file = file_get_contents(FCPATH.'/assets/lksb_json/'.($bulan - 1).'_'.$tahun.'.json');
                    if ($bulan == 13) {
                        $bulan = 1;
                    }
                    $return[$bulan - 1] = json_decode($json_file, true);
                }
                return $return;
            }else{
                return NULL;
            }
        }

        if($bulan > 1){
            $lksb_tbl_lalu = $this->db->get_where('tbl_lksb', ['bulan' => $bulan - 1, 'tahun' => $tahun])->row_array();
        }else{
            $lksb_tbl_lalu = $this->db->get_where('tbl_lksb', ['bulan' => 12, 'tahun' => $tahun - 1])->row_array();
        }
        if (is_null($lksb_tbl_lalu)) {
            return null;
        }

        if ($bulan == 1) {
            $bulan = 13;
            $tahun = $tahun - 1;
        }

        if ($bulan == 0) {
            if (file_exists(FCPATH.'/assets/lksb_json/12_'.($tahun - 1).'.json')) {
                return json_decode(file_get_contents(FCPATH.'/assets/lksb_json/12_'.($tahun - 1).'.json'), true);
            }
            else{
                return FALSE;
            }
        }
        if (file_exists(FCPATH.'/assets/lksb_json/'.($bulan - 1).'_'.$tahun.'.json')) {
            $lksb_lalu = json_decode(file_get_contents(FCPATH.'/assets/lksb_json/'.($bulan - 1).'_'.$tahun.'.json'), true);
        }else{
            return NULL;
        }
        if ($bulan == 13) {
            $bulan = 1;
            $tahun = $tahun + 1;
        }

        $sibuhari_swastisari_array = $this->sibuhari_model->akumulasi($tahun);
        $simapan_array = $this->simapan_model->akumulasi($tahun);
        $bungaSibuhariSwastisari_array = $this->bunga_sibuhari_model->akumulasi($tahun);
        $bungaSimapan_array = $this->bunga_simapan_model->akumulasi($tahun);
        $labaPenjualanBarang_array = $this->laba_penjualan_model->akumulasi($tahun);
        $persediaan_array = $this->persediaan_model->akumulasi($tahun);
        $pendaptanLainnya_array = $this->pendapatan_lainnya_model->akumulasi($tahun);
        $biaya_organisasi_array = $this->biaya_organisasi_model->akumulasi($tahun);
        $investasi_array = $this->investasi_model->akumulasi($tahun);
        $dcu_array = $this->dcu_model->akumulasi($tahun);
        $dcr_array = $this->dcr_model->akumulasi($tahun);
        $investasi_simapan_array = $this->investasi_simapan_model->akumulasi($tahun);
        $inventaris_array = $this->inventaris_model->akumulasi($tahun);
        $piutang_arisan_array = $this->piutang_arisan_model->akumulasi($tahun);
        $piutang_konsumsi_array = $this->piutang_konsumsi_model->akumulasi($tahun);
        $hibah_array = $this->hibah_donasi_model->akumulasi($tahun);
        $biaya_rat_array = $this->rat_model->akumulasi($tahun);
        $biaya_yg_masih_harus_dibayar_array = $this->biaya_organisasi_model->akumulasi($tahun);
        $kalkulator_array = $this->kalkulator_model->akumulasi($tahun);
        $tanah_array = $this->tanah_model->akumulasi($tahun);
        $titipan_simpanan_array = $this->titipan_simpanan_model->akumulasi($tahun);
        $titipan_konsumsi_array = $this->titipan_konsumsi_model->akumulasi($tahun);
        $titipan_arisan_array = $this->titipan_arisan_model->akumulasi($tahun);

        $anggota_koperasi = $this->anggota_model->daftar_anggota_full();
        $anggota_koperasi = $this->anggota_model->daftar_anggota_bulan_masuk($bulan, $anggota_koperasi, $tahun);
        $anggota_koperasi = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota_koperasi);
        
        // $simpanan_pokok = 0;
        // $simpanan_wajib = 0;
        // $simpanan_sukarela = 0;
        // // $pokok = [];
        // for ($i=0; $i < count($anggota_koperasi); $i++) { 
        //     // Perbaiki Ulang
        //     $anggota_koperasi[$i]['detail'] = $this->anggota_model->getDetailAnggota($anggota_koperasi[$i]['id_anggota'], null, $anggota_koperasi[$i]['tgl_daftar']);
        //     $simpanan_pokok += $this->getSimpananPokok($anggota_koperasi[$i]['detail'], $bulan, 'pokok');
        //     $simpanan_wajib += $this->getSimpananPokok($anggota_koperasi[$i]['detail'], $bulan, 'wajib');
        //     $simpanan_sukarela += $this->getSimpananPokok($anggota_koperasi[$i]['detail'], $bulan, 'sukarela');
        // }
        
        // $simpanan_saham = $simpanan_pokok + $simpanan_sukarela + $simpanan_wajib;

        $simpanan_non_saham = 0;
        $simpanan_non_saham_arr = [];

        $saldo_sibulan_masuk = 0;
        // $simpanan_non_saham = 0;

        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        // $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota);
        $sibulan = $this->sibulan_model->daftarSibulan($bulan, $anggota);
        // echo json_encode($sibulan);
        // die();
        $simpanan_non_saham = floatval(str_replace(',', '', $sibulan['total_bunga_sibulan']));

        // $sibulan_masuk = 0;
        // $sibulan_keluar = 0;
        // $simpanan_non_saham = [];
        // foreach ($sibulan['anggota_full'] as $a) {
        //     if (isset($a['detail']['bunga_tiap_bulan_float'][$bulan])) {
        //         $saldo_sibulan_masuk += $a['detail']['debet_tiap_bulan'][$bulan] - $a['detail']['kredit_tiap_bulan'][$bulan];
        //         $sibulan_masuk += $a['detail']['total_debet_tiap_bulan'][$bulan];
        //         $sibulan_keluar += $a['detail']['kredit_tiap_bulan'][$bulan];
        //         if (!is_null($a['waktu_keluar'])) {
        //             $waktu_keluar = explode('-', $a['waktu_keluar']);
        //             if ($waktu_keluar[0] <= $_SESSION['tahun'] && intval($waktu_keluar[1]) > $bulan) {
        //                 if ($a['detail']['bunga_tiap_bulan_float'][$bulan] > 0) {
        //                     $simpanan_non_saham[] = $a['detail']['bunga_tiap_bulan_float'][$bulan];
        //                 }
        //             }
        //         }else{
        //             if ($a['detail']['bunga_tiap_bulan_float'][$bulan] > 0) {
        //                 $simpanan_non_saham[] = $a['detail']['bunga_tiap_bulan_float'][$bulan];
        //             }
        //         }
        //     }else{
        //         $saldo_sibulan_masuk += 0;
        //         $sibulan_masuk += 0;
        //         $sibulan_keluar += 0;
        //     }
        //     // $simpanan_non_saham += $a['detail']['bunga_tiap_bulan_float'][$bulan - 1];
        // }
        // $simpanan_non_saham = round(array_sum($simpanan_non_saham));




        // echo json_encode($simpanan_non_saham);
        // echo json_encode($sibulan['anggota_full']);
        // die();

        // $simpanan_non_saham = 0;
        // for ($i=1; $i <= $bulan; $i++) { 
        //     $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        //     $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota);
        //     $sibulan = $this->sibulan_model->daftarSibulan($i, $anggota);

        //     // $total_saldo_sibulan += $anggota[$i]['detail']['sal']
            
        //     $simpanan_non_saham_arr [] = $sibulan['total_bunga_sibulan'];
        //     $simpanan_non_saham += round(str_replace(',','', $sibulan['total_bunga_sibulan']));
        // }
        
        $sumsuk = $this->get_sumsuk($bulan);

        $piutang = $this->anggota_model->daftarPiutang($bulan);
        
        $lalai = $this->db->get_where('tbl_lalai',[
            'bulan' => $bulan,
            'tahun' => $tahun
        ])->result_array();
        $kelalaian = 0;

        foreach ($piutang['anggota'] as $p) {
            $kelalaian += _cekLalai($p, $lalai, $bulan, $tahun) != false ? floatval($p['sisa']) : 0;
        }

        $sibuhari_swastisari = $sibuhari_swastisari_array[intval($bulan)]['jumlah'];
        $simapan = $simapan_array[intval($bulan)]['jumlah'];

        $investasi_simapan = $investasi_simapan_array[intval($bulan)]['jumlah'];

        $bungaSibuhariSwastisari = $bungaSibuhariSwastisari_array[intval($bulan)]['jumlah'];
        $bungaSimapan = $bungaSimapan_array[intval($bulan)]['jumlah'];
        $sibuhari_swastisari += $bungaSibuhariSwastisari;
        $simapan += $bungaSimapan;
        $labaPenjualanBarang = $labaPenjualanBarang_array[intval($bulan)]['jumlah'];
        $persediaan = $persediaan_array[intval($bulan)]['jumlah'];
        $pendaptanLainnya = $pendaptanLainnya_array[intval($bulan)]['jumlah'];
        $biaya_organisasi = $biaya_organisasi_array[intval($bulan)]['total_debit'];
        $investasi = $investasi_array[intval($bulan)]['jumlah'];
        $dcu = $dcu_array[intval($bulan)]['jumlah'];
        $dcr = $dcr_array[intval($bulan)]['jumlah'];

        $inventaris = $inventaris_array[intval($bulan)]['jumlah'];
        $piutang_arisan = $piutang_arisan_array[intval($bulan)]['jumlah'];
        $piutang_konsumsi = $piutang_konsumsi_array[intval($bulan)]['jumlah'];
        $hibah = $hibah_array[intval($bulan)]['jumlah'];
        $biaya_rat = $biaya_rat_array[intval($bulan)]['total'];
        if ($bulan == 1) {
            $biaya_rat = $biaya_rat_array[intval($bulan)]['debit'];
        }
        $biaya_yg_masih_harus_dibayar = $biaya_yg_masih_harus_dibayar_array[intval($bulan)]['jumlah'];
        $biaya_yg_masih_harus_dibayar += $biaya_rat;
        $kalkulator = $kalkulator_array[intval($bulan)]['total'];
        $tanah = $tanah_array[intval($bulan)]['jumlah'];
        $titipan_simpanan = $titipan_simpanan_array[intval($bulan)]['jumlah'];
        $titipan_konsumsi = $titipan_konsumsi_array[intval($bulan)]['jumlah'];
        $titipan_arisan = $titipan_arisan_array[intval($bulan)]['jumlah'];


        $lksb_tahun_lalu = $this->getLKSB(0);
        $uang_duka_tahun_lalu = $lksb_tahun_lalu['Modal']['saldo_uang_duka'];
        

        $uang_duka_masuk = $this->get_total_sumsuk($sumsuk['data'], 'masuk', 11);
        $bayar_uang_duka = $this->get_total_sumsuk($sumsuk['data'], 'keluar', 'dana_kematian');

        $uang_duka_masuk_bulan_ini = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'masuk', 11);
        $bayar_uang_duka_bulan_ini = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'keluar', 'dana_kematian');

        $simpanan_pokok_masuk = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'masuk', 0);
        $simpanan_pokok_keluar = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'keluar', 'pokok');


        $simpanan_wajib_masuk = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'masuk', 1);
        $simpanan_wajib_keluar = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'keluar', 'wajib');


        $simpanan_sukarela_masuk = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'masuk', 2);
        $simpanan_sukarela_keluar = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'keluar', 'sukarela');

        $pinjaman_masuk = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'masuk', 4);
        $pinjaman_keluar = $this->get_total_sumsuk_bulan_ini($sumsuk['data'][$bulan], 'keluar', 'pinjaman');

        $simpanan_saham = ($simpanan_pokok_masuk - $simpanan_pokok_keluar) + ($simpanan_wajib_masuk - $simpanan_wajib_keluar) + ($simpanan_sukarela_masuk - $simpanan_sukarela_keluar);
        // if ($bulan > 1) {
        //     # code...
        // }

        $shu_masuk_array = $this->db->get_where('tbl_shu', ['jenis' => 0, 'waktu >= ' => $tahun.'-'.($bulan < 10 ? '0'.$bulan : $bulan).'-01', 'waktu <= ' => $tahun.'-'.($bulan < 10 ? '0'.$bulan : $bulan).'-31'])->result_array();


        $shu_keluar_array = $this->db->get_where('tbl_shu', ['jenis' => 1, 'waktu >= ' => $tahun.'-'.($bulan < 10 ? '0'.$bulan : $bulan).'-01', 'waktu <= ' => $tahun.'-'.($bulan < 10 ? '0'.$bulan : $bulan).'-31'])->result_array();


        $shu_masuk = 0;
        foreach ($shu_masuk_array as $shu) {
            $shu_masuk += $shu['jumlah'];
        }

        $shu_keluar = 0;
        foreach ($shu_keluar_array as $shu) {
            $shu_keluar += $shu['jumlah'];
        }

        if ($bulan > 1) {
            $simpanan_non_saham += $lksb_lalu['Laporan_SHU']['biaya']['simpanan_non_saham'];
        }

        $data['Laporan_SHU'] = [
            'pendapatan' => [
                'bunga_pinjaman' => $this->get_total_sumsuk($sumsuk['data'], 'masuk', 7),
                'provisi' => $this->get_total_sumsuk($sumsuk['data'], 'masuk', 10),
                'uang_pangkal' => $this->get_total_sumsuk($sumsuk['data'], 'masuk', 3),
                'bunga_sibuhari_swastisari' => $bungaSibuhariSwastisari,
                'bunga_simapan' => $bungaSimapan,
                'laba_penjualan_barang' => $labaPenjualanBarang,
                'administrasi_pelayanan' => $this->get_total_sumsuk($sumsuk['data'], 'masuk', 5),
                'pendapatan_lainnya' => $pendaptanLainnya,
            ],
            'biaya' => [
                'simpanan_non_saham' => $simpanan_non_saham,
                'simpanan_non_saham_masuk' => $bulan > 1 ? $simpanan_non_saham - $lksb_lalu['Laporan_SHU']['biaya']['simpanan_non_saham'] : $simpanan_non_saham,
                // 'simpanan_non_saham_arr' => $simpanan_non_saham_arr,
                'biaya_organisasi' => $biaya_organisasi,
                'cetak_sum_suk' => 0,
                'kalkulator' => $kalkulator,
                'biaya_jasa_karyawan' => 0,
                'biaya_rat' => $biaya_rat,
                'bayar_santunan_duka' => $bayar_uang_duka,
                'biaya_rat' => $biaya_rat,
                'pajak' => 0,
                'saldo_uang_duka' => $uang_duka_masuk - $bayar_uang_duka,
                'saldo_uang_duka_masuk' => $uang_duka_masuk_bulan_ini,
                'saldo_uang_duka_keluar' => $bayar_uang_duka_bulan_ini
            ],
        ];
        $data['Non_usaha'] = [
            'uang_duka' => $uang_duka_masuk,
        ];
        $data['Neraca'] = [
            'Aktiva_lancar_1' => [
                'kas' => $sumsuk['kas_tiap_bulan'][$bulan],
                'kas_masuk' => $sumsuk['total_masuk'][1],
                'kas_keluar' => $sumsuk['total_keluar'][1],
                // 'piutang_pinjaman_anggota' => $piutang['total'],
                'piutang_lalu' => $lksb_lalu['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'],
                'piutang_pinjaman_anggota' => $lksb_lalu['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'] + $pinjaman_keluar - $pinjaman_masuk,
                'piutang_pinjaman_anggota_masuk' => $pinjaman_masuk,
                'piutang_pinjaman_anggota_keluar' => $pinjaman_keluar,
                'piutang_arisan' => $piutang_arisan,
                'sibuhari_swastisari' => $sibuhari_swastisari,
                'piutang_konsumsi' => $piutang_konsumsi,
                'investasi' => $investasi,
                'simapan' => $simapan,
                'persediaan_barang' => $persediaan,
            ],
            'Aktiva_tetap_2' => [
                'tanah' => $tanah,
                'gedung' => 0,
                'inventaris' => $inventaris
            ]
        ];
        $data['Modal'] = [
            'simpanan_pokok' => $lksb_lalu['Modal']['simpanan_pokok'] + $simpanan_pokok_masuk - $simpanan_pokok_keluar,
            'simpanan_pokok_masuk' => $simpanan_pokok_masuk,
            'simpanan_pokok_keluar' => $simpanan_pokok_keluar,
            'simpanan_wajib' => $lksb_lalu['Modal']['simpanan_wajib'] + $simpanan_wajib_masuk - $simpanan_wajib_keluar,
            'simpanan_wajib_masuk' => $simpanan_wajib_masuk,
            'simpanan_wajib_keluar' => $simpanan_wajib_keluar,
            'simpanan_sukarela' => $lksb_lalu['Modal']['simpanan_sukarela'] + $simpanan_sukarela_masuk - $simpanan_sukarela_keluar,
            'simpanan_sukarela_masuk' => $simpanan_sukarela_masuk,
            'simpanan_sukarela_keluar' => $simpanan_sukarela_keluar,
            'saldo_uang_duka' => $uang_duka_tahun_lalu + $uang_duka_masuk - $bayar_uang_duka,
            'hibah' => $hibah,
            'titipan_simpanan' => $titipan_simpanan,
            'titipan_konsumsi' => $titipan_konsumsi,
            'titipan_arisan' => $titipan_arisan,
            'dana_cadangan_umum' => $dcu,
            'dana_cadangan_resiko' => $dcr
        ];

        $selisih_biaya_sibulan = $data['Laporan_SHU']['biaya']['simpanan_non_saham'];
        // echo json_encode([$selisih_biaya_sibulan, $lksb_lalu['Pasiva']['sibulan']]);
        // die();
        
        if ($bulan > 1) {
            $selisih_biaya_sibulan -= $lksb_lalu['Laporan_SHU']['biaya']['simpanan_non_saham'];
        }

        $data['Pasiva'] = [
            'kewajiban' => 0,
            'sibulan_masuk' => $sibulan['total_debet'],
            'sibulan_keluar' => floatval(str_replace(',', '', $sibulan['total_kredit_sibulan'])) + $sibulan['total_kredit_sibulan_anggota_keluar'],
            'sibulan' => round($selisih_biaya_sibulan + floatval(str_replace(',', '', $sibulan['total_debet'])) - floatval(str_replace(',', '', $sibulan['total_kredit_sibulan'])) + $sibulan['total_kredit_sibulan_anggota_keluar'] + str_replace(',', '', $lksb_lalu['Pasiva']['sibulan'])),
            'total_saldo_sibulan_arr' => array_sum($sibulan['total_saldo_sibulan_arr']),
            'biaya_yg_masih_harus_dibayar' => $biaya_yg_masih_harus_dibayar,
            'simpanan_wajib_tarik' => 0,
            'investasi_simapan' => $investasi_simapan
        ];
        $data['Data_Statistik'] = [
            'jumlah_anggota' => count($anggota_koperasi),
            'simpanan_saham' => $lksb_lalu['Data_Statistik']['simpanan_saham'] + $simpanan_saham,
            'simpanan_non_saham' => $sibulan['total_saldo_sibulan'],
            'kelalaian_pinjaman' => $kelalaian,
            'pinjaman' => $bulan > 1 ? $lksb_lalu['Data_Statistik']['pinjaman'] + $pinjaman_keluar : $pinjaman_keluar,
            'uang_duka_sejak_berdiri' => $lksb_tahun_lalu['Data_Statistik']['uang_duka_sejak_berdiri'] + $uang_duka_masuk,
            'uang_duka' => $uang_duka_masuk,
            'santunan_uang_duka' => $bayar_uang_duka,
            'santunan_uang_duka_sejak_berdiri' => $lksb_tahun_lalu['Data_Statistik']['santunan_uang_duka_sejak_berdiri'] + $bayar_uang_duka,
            'saldo_uang_duka' => $uang_duka_tahun_lalu + ($uang_duka_masuk - $bayar_uang_duka)
        ];

        $data['Data_Statistik']['pinjaman_sejak_berdiri'] = $lksb_lalu['Data_Statistik']['pinjaman_sejak_berdiri'] + $pinjaman_keluar;


        $data['Laporan_SHU']['pendapatan']['jumlah'] = $data['Laporan_SHU']['pendapatan']['bunga_pinjaman'] + $data['Laporan_SHU']['pendapatan']['uang_pangkal'] + $data['Laporan_SHU']['pendapatan']['bunga_sibuhari_swastisari'] + $data['Laporan_SHU']['pendapatan']['laba_penjualan_barang'] + $data['Laporan_SHU']['pendapatan']['administrasi_pelayanan'] + $data['Laporan_SHU']['pendapatan']['pendapatan_lainnya'];


        // $data['Laporan_SHU']['biaya']['jumlah'] = $data['Laporan_SHU']['biaya']['simpanan_non_saham'] + $data['Laporan_SHU']['biaya']['biaya_organisasi'] + $data['Laporan_SHU']['biaya']['beban_biaya_pengurus'] + $data['Laporan_SHU']['biaya']['cetak_sum_suk'] + $data['Laporan_SHU']['biaya']['kalkulator'] + $data['Laporan_SHU']['biaya']['biaya_jasa_karyawan'] + $data['Laporan_SHU']['biaya']['biaya_rat'] + $data['Laporan_SHU']['biaya']['pajak'];


        $data['Laporan_SHU']['biaya']['jumlah'] = $data['Laporan_SHU']['biaya']['simpanan_non_saham'] + $data['Laporan_SHU']['biaya']['biaya_organisasi'] + $data['Laporan_SHU']['biaya']['cetak_sum_suk'] + $data['Laporan_SHU']['biaya']['kalkulator'] + $data['Laporan_SHU']['biaya']['biaya_jasa_karyawan'] + $data['Laporan_SHU']['biaya']['biaya_rat'] + $data['Laporan_SHU']['biaya']['pajak'];


        $data['Laporan_SHU']['SHU_Murni'] = $data['Laporan_SHU']['pendapatan']['jumlah'] - $data['Laporan_SHU']['biaya']['jumlah'] + $shu_masuk - $shu_keluar;

        $data['Laporan_SHU']['SHU_Sebelum_Beban'] = 0;;

        $data['Laporan_SHU']['biaya']['beban_biaya_pengurus'] = 0;
        $data['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik'] = 0;



// Komen Baru
        // // Setelah Dapat beban biaya pengurus
        // if ($bulan == 12) {

        //     $data['Laporan_SHU']['SHU_Sebelum_Beban'] = $data['Laporan_SHU']['pendapatan']['jumlah'] - $data['Laporan_SHU']['biaya']['simpanan_non_saham'] - $data['Laporan_SHU']['biaya']['biaya_organisasi'] - $data['Laporan_SHU']['biaya']['kalkulator'] - $data['Laporan_SHU']['biaya']['biaya_rat'] + $shu_masuk - $shu_keluar;;


        //     $data['Laporan_SHU']['biaya']['beban_biaya_pengurus'] = round($data['Laporan_SHU']['SHU_Sebelum_Beban'] * 20 / 100);
        //     $data['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik'] = round($data['Laporan_SHU']['SHU_Sebelum_Beban'] * 60 / 100);
        //     $data['Laporan_SHU']['biaya']['jumlah'] += $data['Laporan_SHU']['biaya']['beban_biaya_pengurus'] + $data['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik']; 

        //     $data['Laporan_SHU']['SHU_Murni'] = $data['Laporan_SHU']['pendapatan']['jumlah'] - $data['Laporan_SHU']['biaya']['jumlah'] + $shu_masuk - $shu_keluar;

        //     $data['Pasiva']['simpanan_wajib_tarik'] = $data['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik'] + $data['Laporan_SHU']['biaya']['beban_biaya_pengurus'];
        // }

// Disini

        $data['Modal']['SHU_Murni'] = $data['Laporan_SHU']['SHU_Murni'];
        $data['Modal']['total'] = $data['Modal']['SHU_Murni'] + $data['Modal']['simpanan_pokok'] + $data['Modal']['simpanan_wajib'] + $data['Modal']['simpanan_sukarela'] + $data['Modal']['saldo_uang_duka'] + $data['Modal']['hibah'] + $data['Modal']['titipan_simpanan'] + $data['Modal']['titipan_konsumsi'] + round($data['Modal']['dana_cadangan_umum']) + round($data['Modal']['dana_cadangan_resiko']);


        $data['Neraca']['Aktiva_lancar_1']['total'] = floatval(str_replace(',','', $data['Neraca']['Aktiva_lancar_1']['kas'])) + $data['Neraca']['Aktiva_lancar_1']['piutang_pinjaman_anggota'] + $data['Neraca']['Aktiva_lancar_1']['piutang_arisan'] + $data['Neraca']['Aktiva_lancar_1']['sibuhari_swastisari'] + $data['Neraca']['Aktiva_lancar_1']['piutang_konsumsi'] + $data['Neraca']['Aktiva_lancar_1']['investasi'] + $data['Neraca']['Aktiva_lancar_1']['simapan'] + $data['Neraca']['Aktiva_lancar_1']['persediaan_barang'];

        $data['Neraca']['Aktiva_tetap_2']['total'] = $data['Neraca']['Aktiva_tetap_2']['tanah'] + $data['Neraca']['Aktiva_tetap_2']['gedung'] + $data['Neraca']['Aktiva_tetap_2']['inventaris'];

        $data['Neraca']['total'] = $data['Neraca']['Aktiva_tetap_2']['total'] + $data['Neraca']['Aktiva_lancar_1']['total'];

        $data['Pasiva']['total'] = $data['Pasiva']['kewajiban'] + floatval(str_replace(',','', $data['Pasiva']['sibulan'])) + $data['Pasiva']['biaya_yg_masih_harus_dibayar'] + $data['Pasiva']['simpanan_wajib_tarik'] + $data['Pasiva']['investasi_simapan'];

        $data['total'] = number_format(round(round($data['Pasiva']['total']) + round($data['Modal']['total'])), 0, '.', ',');
        $data['total_array'] = [
            $data['Pasiva']['total'],
            $data['Modal']['total']
        ];

        $data['selisih'] = floatval(str_replace(',', '', $data['total'])) - floatval(str_replace(',', '', $data['Neraca']['Aktiva_tetap_2']['total']));
        $data['total_array_sum'] = array_sum($data['total_array']);
        $data['bulan'] = _getBulan($bulan);
        $data['tahun'] = $tahun;
        $data['validasi'] = isset($lksb_tbl['validasi']) && $lksb_tbl['validasi'] == 1 ? true : false;

        
        // encode array to json
        // $json = json_encode($data);
        // $file_json = file_put_contents(FCPATH.'/assets/lksb_json/'.intval($bulan).'_'.$tahun.'.json', $json);
        // $file_json = file_get_contents(FCPATH.'/assets/lksb_json/'.intval($bulan).'_'.$tahun.'.json');
        // $file_json = fopen(FCPATH.'/assets/lksb_json/12_2020.json','w');
        // var_dump(json_decode($file_json, true));
        // die();

        $lksb_kembali[$bulan] = $data;
        $lksb_kembali[$bulan - 1] = $lksb_lalu;
        $lksb_kembali['piutang'] = $piutang;

        return $lksb_kembali;
    }

    public function getSimpananPokok($detail, $bulan, $jenis)
    {
        $jumlah = 0;
        for ($i=1; $i <= $bulan; $i++) { 
            $jumlah += $detail[$jenis][$i];
        }
        return $jumlah + floatval(str_replace(',','', $detail[$jenis.'_tahun_lalu']));
    }
    public function get_total_sumsuk($data, $slip, $urut)
    {
        $array = $slip == 'masuk' ? 'totalSUMArray' : 'totalSUKArray';
        $return = 0;
        foreach ($data as $d) {
            $return += $d[$slip][$array][$urut];
        }
        return $return;
    }

    public function get_total_sumsuk_bulan_ini($data, $slip, $urut)
    {
        $array = $slip == 'masuk' ? 'totalSUMArray' : 'totalSUKArray';
        return $data[$slip][$array][$urut];
    }

    private function getTotal($array, $bulan, $tahunLalu = null)
    {
        $return = 0;
        $tahun = is_null($tahunLalu) ? $_SESSION['tahun'] : $_SESSION['tahun'] - 1;
        foreach ($array as $a) {
            if (intval(explode('-', $a['waktu'])[1]) <= $bulan && explode('-', $a['waktu'])[0] == $tahun) {
                $return += floatval($a['jumlah']);
            }
        }
        return $return;
    }
}