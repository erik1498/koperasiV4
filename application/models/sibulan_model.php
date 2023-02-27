<?php 

class sibulan_model extends CI_Model{
    public function TambahSibulan($data)
    {
        if (_cekKosong($data)) {
            $input = [
                'id_anggota_sibulan' => $data['id_anggota'],
                'jenis' => $data['jenis'],
                'jumlah' => str_replace(',','',$data['nilai']),
                'pilihan' => $data['pilihan'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal'])
            ];
            $this->db->insert('tbl_riwayat_sibulan', $input);
        }
    }
    public function getSaldoTahunLalu($id, $tahun)
    {
        if ($tahun > 2021) {
            $cek = $this->db->get_where('tbl_riwayat_sibulan', ['id_anggota_sibulan' => $id, 'waktu <= ' => ($tahun - 1).'-12-31', 'waktu >= ' => ($tahun - 1).'-01-01', 'pilihan' => 9])->row_array();
            if (is_null($cek)) {
                $hasil = $this->getDetailAnggotaSibulan($id, $tahun - 1);
                $inputKeDatabse = [
                    'id_anggota_sibulan' => $id,
                    'jenis' => 'saldo',
                    'waktu' => ($tahun - 1).'-12-31',
                    'jumlah' => $hasil['saldo_tiap_bulan'][12],
                    'pilihan' => 9
                ];
                $this->db->insert('tbl_riwayat_sibulan', $inputKeDatabse);
            }
        }
        else{
            $cek = $this->db->get_where('tbl_riwayat_sibulan', ['id_anggota_sibulan' => $id, 'waktu <= ' => ($tahun - 1).'-12-31', 'waktu >= ' => ($tahun - 1).'-01-01', 'pilihan' => 9])->row_array();
            if (is_null($cek)) {
                $this->db->set('pilihan', 9);
                $this->db->where('waktu <=', '2020-12-31');
                $this->db->update('tbl_riwayat_sibulan');
            }
        }

        $angka = $this->db->get_where('tbl_riwayat_sibulan', ['id_anggota_sibulan' => $id, 'waktu <= ' => ($tahun - 1).'-12-31', 'waktu >= ' => ($tahun - 1).'-01-01', 'pilihan' => 9])->row_array();
        if (is_null($angka)) {
            $status_validasi = false;
            for ($i=1; $i < 13; $i++) { 
                $validasi = _cekValidasiLKSB($i, $tahun - 1, true);
                if ($validasi) {
                    $status_validasi = true;
                }
            }
            if (!$status_validasi) {
                $data = $this->getDetailAnggotaSibulan($id, null, true);
                $insert = [
                    'id_anggota_sibulan' => $id,
                    'jenis' => 'saldo',
                    'waktu' => ($tahun-1).'-12-31',
                    'pilihan' => 1,
                    'jumlah' =>$data['saldo_tiap_bulan'][12]
                ];
                $this->db->insert('tbl_riwayat_sibulan', $insert);
                return $data['saldo_tiap_bulan'][12];
            }
        }
        return $angka['jumlah'];
    }
    public function getDetailAnggotaSibulan($id, $tahun_lalu = null, $cek = null)
    {
        $anggota_data = $this->db->get_where('tbl_anggota_sibulan', ['id_anggota_sibulan' => $id])->row_array();
        $tahun = is_null($tahun_lalu) ? $_SESSION['tahun'] : $_SESSION['tahun'] - 1;
        $bulan = is_null($tahun_lalu) ? intval($this->session->userdata('bulan')) : 12;
        $data = [];
        // REKAP BUKU BARU
        // if (!is_null($tahun_lalu)) {
        //     $dataTampung = $this->db->get_where('tbl_riwayat_sibulan',['id_anggota_sibulan' => $id])->result_array();
        //     foreach ($dataTampung as $d) {
        //         if (explode('-', $d['waktu'])[0] < $_SESSION['tahun']) {
        //             $data[] = $d;
        //         }
        //     }
        // }
        // else{
        //     $data = $this->db->get_where('tbl_riwayat_sibulan',[
        //         'id_anggota_sibulan' => $id,
        //         'waktu <' => $tahun.'-12-31',
        //         'waktu >=' => $tahun.'-01-01'
        //     ])->result_array();
        // }

        $data = $this->db->get_where('tbl_riwayat_sibulan',[
            'id_anggota_sibulan' => $id,
            'waktu <' => $tahun.'-12-31',
            'waktu >=' => $tahun.'-01-01'
        ])->result_array();

        // if ($id == 11) {
        if (is_null($cek)) {
            $anggota_data['saldo_tahun_lalu'] = $this->getSaldoTahunLalu($id, $tahun);
        }
        // }
        $kredit = 0;
        $bunga_tiap_bulan = [];
        $debet = [];
        $kredit_tiap_bulan[0] = floatval($anggota_data['kredit_tahun_lalu']);
        $saldo_tiap_bulan[0] = floatval($anggota_data['saldo_tahun_lalu']);
        $total_debet_tiap_bulan = [];
        $bunga = $this->db->get('tbl_bunga')->result_array();


        for ($i=1; $i <= count(_daftarBulanList()); $i++) { 
            $kredit_tiap_bulan[$i] = 0;
            $saldo_tiap_bulan[$i] = 0;
            foreach ($data as $d) {
                if ($d['jenis'] == 'saldo' && intval(explode('-',$d['waktu'])[1]) == $i && explode('-',$d['waktu'])[0] == $tahun) {
                    $saldo_tiap_bulan[$i] = $d['pilihan'] == 0 ? $saldo_tiap_bulan[$i] - $d['jumlah'] : $saldo_tiap_bulan[$i] + $d['jumlah'];
                }
                if ($d['jenis'] == 'kredit' && intval(explode('-',$d['waktu'])[1]) == $i && explode('-',$d['waktu'])[0] == $tahun) {
                    $kredit_tiap_bulan[$i] = $d['pilihan'] == 0 ? $kredit_tiap_bulan[$i] - $d['jumlah'] : $kredit_tiap_bulan[$i] + $d['jumlah'];
                }
            }
        }
       

        $debet = $saldo_tiap_bulan;
        $bunga_tiap_bulan_tampil = [];
        $saldo_tiap_bulan[1] = $saldo_tiap_bulan[0] + $saldo_tiap_bulan[1];
        
        foreach ($kredit_tiap_bulan as $k) {
            $kredit += $k;
        }

        for ($i=1; $i <= $bulan; $i++) { 
            $saldo_tiap_bulan[$i] -= $kredit_tiap_bulan[$i];
            $bunga_tiap_bulan[$i] = floatval(floatval($saldo_tiap_bulan[$i] * $bunga[$i - 1]['bunga']) / 100);
            if (intval(explode('-', $anggota_data['waktu_daftar'])[1]) == $i && intval(explode('-', $anggota_data['waktu_daftar'])[0]) == $tahun) {
                $bunga_tiap_bulan[$i] = 0;
            }
            
            
            $bunga_tiap_bulan_tampil[$i] = number_format($bunga_tiap_bulan[$i],0,'.',',');
            $saldo_tiap_bulan[$i] += $bunga_tiap_bulan[$i];
            
            if ($saldo_tiap_bulan[$i] <= round($bunga_tiap_bulan[$i])) {
                $saldo_tiap_bulan[$i] = 0;
            }
            
            if ($i < 12) {
                $saldo_tiap_bulan[$i + 1] += $saldo_tiap_bulan[$i];
            }
        }
        

        $total_debet_tiap_bulan_tampil = [];

        for ($i=1; $i <= count($bunga_tiap_bulan); $i++) { 
            $total_debet_tiap_bulan[$i] = floatval($debet[$i] + $bunga_tiap_bulan[$i]);
            $total_debet_tiap_bulan_tampil[$i] = str_replace(',','',number_format($total_debet_tiap_bulan[$i],0,'.',','));
        }

        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['tanggal'] = explode('-', $data[$i]['waktu'])[2];
            $data[$i]['bulan'] = explode('-', $data[$i]['waktu'])[1];
            $data[$i]['tahun'] = explode('-', $data[$i]['waktu'])[0];
            $data[$i]['waktu'] = _cetakWaktu($data[$i]['waktu']);
            $data[$i]['jenis'] = strtoupper($data[$i]['jenis']);
        }

        $saldo_tiap_bulan_tampil = [];
        $saldo_tiap_bulan_bulatkan = [];
        for ($i=0; $i < count($saldo_tiap_bulan); $i++) {
            $saldo_tiap_bulan_tampil[$i] = round($saldo_tiap_bulan[$i]);
            $saldo_tiap_bulan_bulatkan[$i] = round(str_replace(',','',$saldo_tiap_bulan_tampil[$i]));
        }
        $bunga_tiap_bulan_tampil[0] = 0;
        $total_debet_tiap_bulan_tampil[0] = 0;
        
        return [
            'kredit' => $kredit,
            'debet_tiap_bulan' => $debet,
            'total_debet_tiap_bulan' => $total_debet_tiap_bulan_tampil,
            'total_debet_tiap_bulan_float' => $total_debet_tiap_bulan,
            'kredit_tiap_bulan' => $kredit_tiap_bulan,
            'saldo' => $saldo_tiap_bulan[$bulan],
            'saldo_tampil' => floatval(str_replace(',','',number_format($saldo_tiap_bulan[$bulan],0,'.',','))),
            'saldo_tiap_bulan' => $saldo_tiap_bulan,
            'saldo_tiap_bulan_bulatkan' => $saldo_tiap_bulan_bulatkan,
            'saldo_tiap_bulan_tampil' => $saldo_tiap_bulan_tampil,
            'bunga' => $bunga[$bulan - 1]['bunga']. '%',
            'bunga_tiap_bulan' => $bunga_tiap_bulan_tampil,
            'bunga_tiap_bulan_float' => $bunga_tiap_bulan,
            'riwayat_sibulan' => $data,
        ];
    }
    public function getTahunLalu($data, $jenis)
    {
        $return = 0;
        foreach ($data as $d) {
            if (explode('-',$d['waktu'])[0] == $_SESSION['tahun'] - 1 && $d['jenis'] == $jenis) {
                $return += $d['jumlah'];
            }
        }
        return $return;
    }
    public function bukuBaru()
    {
        
        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar(12, $anggota);
        $data = $this->daftarSibulan(12, $anggota, true);
        foreach ($data['anggota'] as $d) {
            $this->db->set('saldo_tahun_lalu', $d['detail']['saldo']);
            $this->db->where('id_anggota_sibulan', $d['id_anggota_sibulan']);
            $this->db->update('tbl_anggota_sibulan');
        }
        $this->db->from('tbl_riwayat_sibulan');
        $this->db->truncate();
    }
    public function daftarSibulan($bulan, $anggota, $tahun_lalu = null)
    {
        $total_saldo = 0.0;
        $total_kredit = 0;
        $total_kredit_keluar = 0.0;
        $total_bunga = 0;
        $total_debet = 0;
        $total_saldo_arr = [];
        for ($i=0; $i < count($anggota); $i++) { 
            $anggota[$i]['detail'] = $this->getDetailAnggotaSibulan($anggota[$i]['id_anggota_sibulan'], $tahun_lalu);  
            $total_debet += $anggota[$i]['detail']['debet_tiap_bulan'][$bulan];
            if ($anggota[$i]['detail']['saldo_tiap_bulan'][$bulan] > 0) {
                $total_saldo += floatval($anggota[$i]['detail']['saldo_tiap_bulan'][$bulan]);
                $total_saldo_arr []= $anggota[$i]['detail']['saldo_tiap_bulan'][$bulan];
            }      
            $total_kredit += floatval($anggota[$i]['detail']['kredit_tiap_bulan'][$bulan]);
            $waktu_keluar = $anggota[$i]['waktu_keluar'] == null ? null : explode('-', $anggota[$i]['waktu_keluar']);
            if ((isset($waktu_keluar[1]) && intval($waktu_keluar[1]) > $bulan) || $waktu_keluar == null) {
                if (isset($anggota[$i]['detail']['bunga_tiap_bulan_float'][$bulan])) {
                    $total_bunga += floatval(str_replace(',','', $anggota[$i]['detail']['bunga_tiap_bulan_float'][$bulan]));
                }else{
                    $total_bunga += 0;
                }
            }
        }
        $return = [];
        foreach ($anggota as $a) {
            if (isset($a['detail']['saldo_tiap_bulan'])) {
                // if ($a['detail']['saldo_tiap_bulan'][$bulan] > 0) {
                if ($a['detail']['saldo_tiap_bulan'][$bulan] > 0 || $a['detail']['kredit_tiap_bulan'][$bulan] > 0) {
                    $a['detail']['kredit_tiap_bulan'][$bulan] = round($a['detail']['kredit_tiap_bulan'][$bulan]);
                    $return[]=$a;
                }
                if ($a['status_keluar'] == '1') {
                    if($a['detail']['kredit_tiap_bulan'][$bulan] > $a['detail']['saldo_tiap_bulan'][$bulan - 1])
                    {
                        $total_saldo += $a['detail']['saldo_tiap_bulan'][$bulan - 1] - $a['detail']['kredit_tiap_bulan'][$bulan];
                        $total_saldo_arr []= $a['detail']['saldo_tiap_bulan'][$bulan - 1] - $a['detail']['kredit_tiap_bulan'][$bulan];
                        $total_kredit_keluar += $a['detail']['kredit_tiap_bulan'][$bulan] - $a['detail']['saldo_tiap_bulan'][$bulan - 1] - floatval(str_replace(',', '', $a['detail']['bunga_tiap_bulan'][$bulan - 1]) - $a['detail']['bunga_tiap_bulan_float'][$bulan - 1]);
                    }
                }
            }
        }
        return [
            'anggota' => $return,
            'bulan' => $bulan,
            'anggota_full' => $anggota,
            'total_debet' => number_format(round($total_debet), 0, '.', ','),
            'total_saldo_sibulan' => number_format(round($total_saldo),0,'.',','),
            'total_bunga_sibulan' => number_format(round($total_bunga),0,'.',','),
            'total_kredit_sibulan' => number_format(round($total_kredit),0,'.',','),
            'total_kredit_sibulan_anggota_keluar' => $total_kredit_keluar,
            'total_saldo_sibulan_arr' => $total_saldo_arr,
            'total_saldo_sibulan_float' => array_sum($total_saldo_arr)
        ];
    }

    public function editSibulan($data)
    {
        $validasi = _cekValidasiLKSB($data['bulan'], $data['tahun'], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan($data['bulan']),
                'tahun' => $data['tahun'],
            ];
            die();
        }
        $this->db->set('waktu', _inputWaktu($data['tahun'],$data['bulan'],$data['tanggal']));
        $this->db->set('jumlah', str_replace(',','',$data['nilai']));
        $this->db->where('id_riwayat_sibulan', $data['id_sibulan']);
        $this->db->update('tbl_riwayat_sibulan');
    }

    public function hapusSibulan($data)
    {
        $id = $data['id_sibulan'];
        $row = $this->db->get_where('tbl_riwayat_sibulan', ['id_riwayat_sibulan' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        $this->db->delete('tbl_riwayat_sibulan',['id_riwayat_sibulan' => $id]);
    }
}