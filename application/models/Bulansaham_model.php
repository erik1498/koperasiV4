<?php 

class bulansaham_model extends CI_model{
    public function daftarBagiSHU($bulan, $anggota)
    {
        $tahun = $_SESSION['tahun'];
        $bulan = intval($bulan);
        $SHUBulan = $this->lksb_model->getLKSB($bulan);
        if ($bulan == 0) {
            if ($bulan == 0 && $_SESSION['tahun'] == '2021') {
                $SHUBulan = $SHUBulan['Laporan_SHU']['SHU_Sebelum_Beban'];
                $bulan = 12;
                $tahun--;
            }else{
                $SHUBulan = $SHUBulan['Laporan_SHU']['SHU_Murni'];
                $bulan = 12;
                $tahun--;
            }
        }else{
            $SHUBulan = $SHUBulan[$bulan]['Laporan_SHU']['SHU_Murni'];
        }
        $BagianJasa = $SHUBulan * 60 / 100;
        
        $BJS = $BagianJasa * 70 / 100;
        $BJP = $BagianJasa * 30 / 100;
        if ($tahun == '2020') {
            $BJS = $BagianJasa * 75 / 100;
            $BJP = $BagianJasa * 25 / 100;
        }
        
        $DCU = $SHUBulan * 10 / 100;
        $DCR = $SHUBulan * 10 / 100;
        $Dana_Pengurus = $SHUBulan * 20 / 100;
        $totalSaham = 0;
        $totalBJS = 0;
        $totalBJP = 0;
        $totalBulanSaham = 0;
        $totalBulanPinjam = 0;
        $anggota_valid = [];
        for ($i=0; $i < count($anggota); $i++) { 
            $data = $this->getDetailAnggotaBulanSaham($anggota[$i]['id_anggota']);
            if (intval($_SESSION['tahun']) != ($tahun + 1)) {
                $data['bulan_saham'][0] = number_format((floatval(str_replace(',', '', $data['data']['jumlah_tahun_lalu'])) / 5000) * 12, 2, '.', ',');
            }
            $anggota[$i]['detail'] = [
                'jumlah_uang' => $this->getTotalSebelumBulan($tahun < $_SESSION['tahun'] ? 0 : $bulan, $data['jumlah_uang'], $anggota[$i]['tgl_keluar'], $tahun),
                'jumlah_saham' => $this->getTotalSebelumBulan($tahun < $_SESSION['tahun'] ? 0 : $bulan, $data['jumlah_saham'], $anggota[$i]['tgl_keluar'], $tahun),
                'bulan_saham' => $this->getTotalSebelumBulan($tahun < $_SESSION['tahun'] ? 0 : $bulan, $data['bulan_saham'], $anggota[$i]['tgl_keluar'], $tahun),
                // 'bunga' => $this->getTotalSebelumBulan($bulan, $data['bunga']),
                'bunga' => $_SESSION['tahun'] == $tahun + 1 ? $data['bunga'][0] : $data['bunga'][$bulan],
            ];
            // if ($anggota[$i]['id_anggota'] == 2) {
            //     echo json_encode($data['bunga']);
            //     die();
            // }
            // if (intval(explode('-',$anggota[$i]['tgl_daftar'])[1]) <= $bulan || explode('-',$anggota[$i]['tgl_daftar'])[0] <= $tahun){
            //     if (is_null($anggota[$i]['tgl_keluar'])){
            //         $totalSaham += floatval(str_replace(',','',$anggota[$i]['detail']['jumlah_saham']));
            //         $totalBulanSaham += floatval(str_replace(',','',$anggota[$i]['detail']['bulan_saham']));
            //         $totalBulanPinjam += floatval(str_replace(',','',$anggota[$i]['detail']['bunga']));
            //     }else{
            //         if (intval(explode('-',$anggota[$i]['tgl_keluar'])[1]) > $bulan) {
                        $totalSaham += floatval(str_replace(',','',$anggota[$i]['detail']['jumlah_saham']));
                        $totalBulanSaham += floatval(str_replace(',','',$anggota[$i]['detail']['bulan_saham']));
                        $totalBulanPinjam += floatval(str_replace(',','',$anggota[$i]['detail']['bunga']));
                    // }
                // }
            // }
        }
        $total_di_terima = 0;
        $total_di_terima_bulatkan = 0;
        $total_sisa = [];
        $lainnya = [];
        for ($i=0; $i < count($anggota); $i++) { 
            $totalBJS += $jumlahBJS = $totalBulanSaham > 0 ? (floatval(str_replace(',','',$anggota[$i]['detail']['bulan_saham'])) / $totalBulanSaham) * $BJS : 0;
            $totalBJP += $jumlahBJP = $totalBulanPinjam > 0 ? (floatval(str_replace(',','',$anggota[$i]['detail']['bunga'])) / $totalBulanPinjam) * $BJP : 0;
            // $anggota[$i]['detail']['bjs'] = number_format($jumlahBJS,2,'.',',');
            $anggota[$i]['detail']['bjs'] = number_format($jumlahBJS,2,'.',',');
            $anggota[$i]['detail']['bjp'] = number_format($jumlahBJP,2,'.',',');
            $anggota[$i]['detail']['total_di_terima'] = number_format($jumlahBJS + $jumlahBJP,2,'.',',');

            $explode = explode('.', $jumlahBJP + $jumlahBJS);
            $explode[1] = isset($explode[1]) ? '.'.$explode[1] : '';
            // if ($anggota[$i]['id_anggota'] == 2) {
            //     echo json_encode(strlen(number_format($jumlahBJS + $jumlahBJP,2,'.','')));
            //     die();
            // }
            $digit = 3;
            // if (strlen(number_format($jumlahBJS + $jumlahBJP,2,'.','')) > 8) {
            //     $digit = strlen(number_format($jumlahBJS + $jumlahBJP,2,'.','')) - 5;
            // }
            $diterima = ($jumlahBJP + $jumlahBJS) - floatval(strrev(substr(strrev($explode[0]), 0, $digit)).''.$explode[1]);
            $anggota[$i]['detail']['diterima'] = $diterima > 0 ? $diterima : 0;
            $anggota[$i]['detail']['sisa'] = number_format(($jumlahBJP + $jumlahBJS) - $anggota[$i]['detail']['diterima'], 2, '.', ',');

            $total_di_terima_bulatkan += floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
            $total_sisa []= ($jumlahBJP + $jumlahBJS) - $anggota[$i]['detail']['diterima'];
            $total_di_terima += $jumlahBJS + $jumlahBJP;
            $anggota[$i]['detail']['diterima'] = number_format($anggota[$i]['detail']['diterima'], 2, '.', ',');

            // if (intval(explode('-',$anggota[$i]['tgl_daftar'])[1]) <= $bulan || explode('-',$anggota[$i]['tgl_daftar'])[0] < $tahun){
            //     if (is_null($anggota[$i]['tgl_keluar']))
            //         $anggota_valid[] = $anggota[$i];
            //     else{
                    // if (intval(explode('-',$anggota[$i]['tgl_keluar'])[1]) > $bulan) {
                    // }
                // }
            // }
            if (!is_null($anggota[$i]['tgl_keluar'])) {
                $waktu = explode('-', $anggota[$i]['tgl_keluar']);
                if (intval($waktu[1]) <= $bulan && intval($waktu[0]) == $tahun) {
                    $total_sisa[] = floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
                    $total_di_terima -= floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
                    $total_di_terima_bulatkan -= floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
                    $lainnya[] = $anggota[$i];
                    $lainnya[count($lainnya) - 1]['no_buku'] = '';
                    $lainnya[count($lainnya) - 1]['nama_anggota'] = $anggota[$i]['nama_anggota'].' ( Keluar )';
                    $lainnya[count($lainnya) - 1]['detail']['diterima'] = 0;
                    $lainnya[count($lainnya) - 1]['detail']['total_di_terima'] = $anggota[$i]['detail']['total_di_terima'];
                    $lainnya[count($lainnya) - 1]['detail']['sisa'] = 0;
                }else{
                    if (intval($waktu[0]) >= intval($tahun)) {
                        $anggota_valid[] = $anggota[$i];
                    }
                }
            }else{
                $anggota_valid[] = $anggota[$i];
            }

            // echo json_encode($anggota[$i]);
            // echo json_encode([intval($tahun), $bulan]);
            // die();



            // if (intval(explode('-',$anggota[$i]['tgl_daftar'])[1]) <= $bulan || explode('-',$anggota[$i]['tgl_daftar'])[0] < $tahun){
            //     if (is_null($anggota[$i]['tgl_keluar'])){
            //         $anggota[$i]['detail']['diterima'] = ($jumlahBJP + $jumlahBJS) - floatval(strrev(substr(strrev($explode[0]), 0, $digit)).''.$explode[1]);
            //         $anggota[$i]['detail']['sisa'] = number_format(($jumlahBJP + $jumlahBJS) - $anggota[$i]['detail']['diterima'], 2, '.', ',');
            //         $anggota[$i]['detail']['diterima'] = number_format($anggota[$i]['detail']['diterima'], 2, '.', ',');

            //         $total_di_terima_bulatkan += floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
            //         $total_sisa []= floatval(str_replace(',', '', $anggota[$i]['detail']['sisa']));
            //         $total_di_terima += $jumlahBJS + $jumlahBJP;
            //         $anggota_valid[] = $anggota[$i];
            //     }
            //     else{
            //         if (intval(explode('-',$anggota[$i]['tgl_keluar'])[1]) > $bulan) {
            //             $anggota_valid[] = $anggota[$i];
            //             $anggota[$i]['detail']['diterima'] = ($jumlahBJP + $jumlahBJS) - floatval(strrev(substr(strrev($explode[0]), 0, $digit)).''.$explode[1]);
            //             $anggota[$i]['detail']['sisa'] = number_format(($jumlahBJP + $jumlahBJS) - $anggota[$i]['detail']['diterima'], 2, '.', ',');
            //             $anggota[$i]['detail']['diterima'] = number_format($anggota[$i]['detail']['diterima'], 2, '.', ',');

            //             $total_di_terima_bulatkan += floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
            //             $total_sisa []= floatval(str_replace(',', '', $anggota[$i]['detail']['sisa']));
            //             $total_di_terima += $jumlahBJS + $jumlahBJP;
            //         }else{
            //             $anggota[$i]['detail']['diterima'] = 0;
            //             $anggota[$i]['detail']['sisa'] = number_format(($jumlahBJP + $jumlahBJS) - floatval(strrev(substr(strrev($explode[0]), 0, $digit)).''.$explode[1]));
            //             $anggota[$i]['detail']['diterima'] = number_format($anggota[$i]['detail']['diterima'], 2, '.', ',');

            //             $total_di_terima_bulatkan += floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
            //             $total_sisa []= floatval(str_replace(',', '', $anggota[$i]['detail']['sisa']));
            //             $total_di_terima += $jumlahBJS + $jumlahBJP;
            //         }
            //     }
            // }else{
            //     $anggota[$i]['detail']['diterima'] = 0;
            //     $anggota[$i]['detail']['sisa'] = number_format(($jumlahBJP + $jumlahBJS) - floatval(strrev(substr(strrev($explode[0]), 0, $digit)).''.$explode[1]));
            //     $anggota[$i]['detail']['diterima'] = number_format($anggota[$i]['detail']['diterima'], 2, '.', ',');

            //     $total_di_terima_bulatkan += floatval(str_replace(',', '', $anggota[$i]['detail']['diterima']));
            //     $total_sisa []= floatval(str_replace(',', '', $anggota[$i]['detail']['sisa']));
            //     $total_di_terima += $jumlahBJS + $jumlahBJP;
            // }
        }
        foreach ($lainnya as $l) {
            $anggota_valid[] = $l;
        }
        return [
            'anggota' => $anggota_valid,
            'total_bjs' => number_format($totalBJS,2,'.',','),
            'total_bjp' => number_format($totalBJP,2,'.',','),
            'total_saham' => number_format($totalSaham,2,'.',','),
            'total_bulanSaham' => number_format($totalBulanSaham,2,'.',','),
            'total_bulanPinjam' => number_format($totalBulanPinjam,2,'.',','),
            'SHUBulanSaham' => number_format($SHUBulan, 2, '.', ','),
            'BagianJasa' => number_format($BagianJasa, 2, '.', ','),
            'BJS' => number_format($BJS, 2, '.', ','),
            'BJP' => number_format($BJP, 2, '.', ','),
            'DCU' => number_format($DCU, 2, '.', ','),
            'DCR' => number_format($DCR, 2, '.', ','),
            'Dana_Pengurus' => number_format($Dana_Pengurus, 2, '.', ','),
            'bulan' => $bulan,
            'total_di_terima' => $total_di_terima,
            'total_di_terima_bulatkan' => number_format($total_di_terima_bulatkan,2,'.',','),
            'total_sisa' => number_format(array_sum($total_sisa), 2, '.', ','),
        ];
    }

    public function getTotalSebelumBulan($bulan, $data, $tgl_keluar, $tahun)
    {
        
        $jumlah = 0;
        for ($i=0; $i <= $bulan; $i++) { 
            if (!is_null($tgl_keluar)) {
                $waktu = explode('-', $tgl_keluar);
                if (intval($waktu[1]) <= $bulan && intval($waktu[0]) <= $tahun) {
                    return number_format(0,2,'.',',');
                }
            }
            $jumlah += floatval(str_replace(',','', $data[$i]));
        }
        $jumlah = $bulan == 12 ? str_replace(',','', $data[12]) : $jumlah;
        return number_format($jumlah,2,'.',',');
    }

    public function daftarBulanSaham($bulan, $anggota)
    {
        $bulan = intval($bulan);
        $totalSaham = 0;
        $totalUang = 0;
        $totalBulanSaham = 0;
        $anggota_valid = [];
        for ($i=0; $i < count($anggota); $i++) { 
            $data = $this->getDetailAnggotaBulanSaham($anggota[$i]['id_anggota']);
            $anggota[$i]['detail'] = [
                'jumlah_uang' => $data['jumlah_uang'][$bulan],
                'jumlah_saham' => $data['jumlah_saham'][$bulan],
                'bulan_saham' => $data['bulan_saham'][$bulan],
            ];
            if (floatval(str_replace(',','',$anggota[$i]['detail']['jumlah_uang'])) >= 0) {
                if (intval(explode('-',$anggota[$i]['tgl_daftar'])[1]) <= $bulan || explode('-',$anggota[$i]['tgl_daftar'])[0] < $_SESSION['tahun']) {
                    if (is_null($anggota[$i]['tgl_keluar'])){
                        $totalUang += floatval(str_replace(',','',$data['jumlah_uang'][$bulan]));
                        $totalSaham += floatval(str_replace(',','',$data['jumlah_saham'][$bulan]));
                        $totalBulanSaham += floatval(str_replace(',','',$data['bulan_saham'][$bulan]));
                        $anggota_valid[] = $anggota[$i];
                    }
                    else{
                        if ($bulan < intval(explode('-',$anggota[$i]['tgl_keluar'])[1])) {
                            $totalUang += floatval(str_replace(',','',$data['jumlah_uang'][$bulan]));
                            $totalSaham += floatval(str_replace(',','',$data['jumlah_saham'][$bulan]));
                            $totalBulanSaham += floatval(str_replace(',','',$data['bulan_saham'][$bulan]));
                            $anggota_valid[] = $anggota[$i];
                        }
                    }
                }
            }
        }
        return [
            'anggota' => $anggota_valid,
            'total_uang' => number_format($totalUang,0,'.',','),
            'total_saham' => number_format($totalSaham,2,'.',','),
            'total_bulanSaham' => number_format($totalBulanSaham,2,'.',','),
            'bulan' => $bulan
        ];
    }

    public function getBulanSahamTahunLalu($id)
    {
        if (file_exists(FCPATH.'assets/bulansaham_json/'.($_SESSION['tahun'] - 1).'.json')) {            
            $json = file_get_contents(FCPATH.'assets/bulansaham_json/'.($_SESSION['tahun'] - 1).'.json');
            $json = json_decode($json, true);
            foreach ($json['anggota'] as $a) {
                if ($a['id_anggota'] == $id) {
                    return $a['detail']['bulan_saham'];
                }
            }
            return 0;
        }else{            
            $tahunIni = $_SESSION['tahun'];
            $_SESSION['tahun'] = $tahunIni - 1;
            $bulan = 12;
            $anggota = $this->anggota_model->daftar_anggota_full();
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota);
            $data = $this->bulansaham_model->daftarBulanSaham($bulan, $anggota);
            $_SESSION['tahun'] = $tahunIni;
            file_put_contents(FCPATH.'assets/bulansaham_json/'.($_SESSION['tahun'] - 1).'.json', json_encode($data));
            foreach ($data['anggota'] as $a) {
                if ($a['id_anggota'] == $id) {
                    return $a['detail']['bulan_saham'];
                }
            }
            return 0;
        }
    }

    public function getDetailAnggotaBulanSaham($id, $tahunLalu = null, $cek = null)
    {
        $data = [];
        if (is_null($tahunLalu)) {
            $data = $this->anggota_model->getDetailAnggota($id);
        }else{
            $data = $this->anggota_model->getDetailAnggota($id);
            $simpanan_wajib = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $id, 'jenis' => 'simpanan_wajib', 'waktu <= ' => ($_SESSION['tahun'] - 1).'-12-31'])->result_array();
            for ($i=1; $i < 12; $i++) {
                $data['wajib'][$i] = 0;
                $data['pokok'][$i] = 0;
                $data['sukarela'][$i] = 0;
            }
            foreach ($simpanan_wajib as $sw) {
                $waktu = explode('-', $sw['waktu']);
                $data['wajib'][intval($waktu[1])] = floatval($sw['jumlah']);
            }
           $simpanan_sukarela = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $id, 'jenis' => 'simpanan_sukarela', 'waktu <= ' => ($_SESSION['tahun'] - 1).'-12-31'])->result_array();
            foreach ($simpanan_sukarela as $ss) {
                $waktu = explode('-', $ss['waktu']);
                $data['sukarela'][intval($waktu[1])] = floatval($ss['jumlah']);
            }
            $simpanan_pokok = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $id, 'jenis' => 'simpanan_pokok', 'waktu <= ' => ($_SESSION['tahun'] - 1).'-12-31'])->result_array();
            foreach ($simpanan_pokok as $sp) {
                $waktu = explode('-', $sp['waktu']);
                $data['pokok'][intval($waktu[1])] = floatval($sp['jumlah']);
            }
        }

        $data['bunga'] = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $id, 'jenis'=> 'bunga'])->result_array();
        
        $jumlahSaham = [];
        $jumlahBulanSaham = [];
        $jumlahUang = [];
        $totalBulanSaham = 0;
        $bunga = [];
        $totalBunga = 0;
        $bunga[0] = $this->ambilBunga(12, $data['bunga'], true);
        $jumlahUang[0] = str_replace(',','',$data['jumlah_tahun_lalu']);
        $jumlahSaham[0] = floatval($jumlahUang[0]) / 5000;
        $totalBulanSaham += $jumlahSaham[0] * 12;
        $jumlahBulanSaham[0] = $_SESSION['tahun'] == '2021' ? $data['bulan_saham'] : $this->getBulanSahamTahunLalu($id);
        if (!is_null($cek)) {
           $jumlahBulanSaham[0] = number_format($totalBulanSaham, 2, '.', ',');
        }
        // $jumlahBulanSaham[0] = $_SESSION['tahun'] == '2021' ? $data['bulan_saham'] : $jumlahSaham[0] * 12;
        $jumlahUang[0] = number_format($jumlahUang[0],0,'.',',');
        $jumlahSaham[0] = number_format($jumlahSaham[0],2,'.',',');
        
        for ($i=1; $i < 12; $i++) {
            $totalBunga += $bunga[$i] = $this->ambilBunga($i, $data['bunga'], null);
            $jumlahUang[$i] = $data['pokok'][$i] + $data['wajib'][$i] + $data['sukarela'][$i];
            $jumlahUang[$i] = $jumlahUang[$i] > 0 ? $jumlahUang[$i] : 0;
            $jumlahSaham[$i] = $jumlahUang[$i] / 5000;
            $totalBulanSaham += $jumlahSaham[$i] * (12 - $i);
            $jumlahBulanSaham[$i] = number_format($jumlahSaham[$i] * (12 - $i),2,'.',',');
            $jumlahSaham[$i] = number_format($jumlahSaham[$i],2,'.',',');
            $jumlahUang[$i] = number_format($jumlahUang[$i],0,'.',',');
        } 
        // $bunga[12] = $totalBunga;
        $bunga[12] = $this->ambilBunga(12, $data['bunga'], null);
        $jumlahUang[12] = str_replace(',','',$data['jumlah_tahun_ini_des']);
        $jumlahSaham[12] = floatval($jumlahUang[12]) / 5000;
        $totalJumlahSaham = $jumlahSaham[12];
        $jumlahBulanSaham[12] = $jumlahSaham[12] > 0 ? number_format($totalBulanSaham, 2, '.',',') : '0.00';
        $jumlahUang[12] = number_format($jumlahUang[12],0,'.',',');
        $jumlahSaham[12] = number_format($jumlahSaham[12],2,'.',',');


        $jumlahUang['des'] = $data['pokok'][12] + $data['wajib'][12] + $data['sukarela'][12];
        $jumlahSaham['des'] = floatval($jumlahUang['des']) / 5000;
        $jumlahBulanSaham['des'] = number_format($jumlahSaham['des'] * (12 - 12), 2, '.', ',');
        $jumlahUang['des'] = number_format($jumlahUang['des'],0,'.',',');
        $jumlahSaham['des'] = number_format($jumlahSaham['des'],2,'.',',');

        // Akumulasi Bunga
        // for ($i=1; $i < 13; $i++) { 
        //     if ($bunga[$i] == null) {
        //         $bunga[$i] = 0;
        //     }
        //     if ($i > 1) {
        //         $bunga[$i] += $bunga[$i - 1];
        //     }
        // }
        
        return [
            'jumlah_uang' => $jumlahUang,
            'jumlah_saham' => $jumlahSaham,
            'bulan_saham' => $jumlahBulanSaham,
            'bulan_saham_tahun_lalu' => $_SESSION['tahun'] != '2021' ? $this->getBulanSahamTahunLalu($id) : $data['bulan_saham'],
            'bunga' => $bunga,
            'data' => $data,
            'data_diri' => $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array()
        ];
    }

    private function ambilBunga($bulan, $data, $tahunLalu = null, $riwayat = false)
    {
        $tahun = is_null($tahunLalu) ? $_SESSION['tahun'] : $_SESSION['tahun'] - 1;
        $bulan = is_null($tahunLalu) ? $bulan : 12;
        // foreach ($riwayat as $r) {
        //     $waktu = explode(' ', $r['waktu']);
        //     if (_getBulanAngka($waktu[1]) <= $bulan && $waktu[2] == $tahun) {
        //         if ($r['sisa'] < 1) {
        //             return null;
        //         }
        //     }
        // }
        $return = 0;
        foreach ($data as $d) {
            if (floatval(explode('-', $d['waktu'])[1]) <= $bulan && floatval(explode('-', $d['waktu'])[0]) == $tahun) {
                $return += floatval($d['jumlah']);
            }
        }
        return $return;
    }
}