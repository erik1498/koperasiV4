<?php 

class anggota_model extends CI_model{
    public function tambahAnggota($data){
        if (_cekKosong($data)) {
            $anggota = [
                'no_buku' => $data['no_buku'],
                'nama_anggota' => $data['nama'],
                'tgl_daftar' => _inputWaktu($data['tahun'],$data['bulan'], $data['tanggal']),
                'tanggungan' => str_replace(',', '', $data['tanggungan'])
            ];
            $this->db->insert('tbl_anggota',$anggota);
            $id_anggota = $this->db->insert_id();
    
            $simpanan = [
                'simpanan_pokok',
                'uang_pangkal',
                'administrasi_pelayanan'
            ];
    
            foreach ($simpanan as $s) {
                if (!empty($data[$s])) {
                    $input = [
                        'id_anggota' => $id_anggota,
                        'jenis' => $s,
                        'waktu' => _inputWaktu($data['tahun'],$data['bulan'], $data['tanggal']),
                        'jumlah' => str_replace(',','',$data[$s])
                    ];
                    $this->db->insert('tbl_riwayat_simpanan', $input);
                }
            }
        }
    }

    public function tambahAnggotaSiBulan($data){
        if (_cekKosong($data)) {
            if ($data['jenis'] == 'baru') {
                $input = [
                    'nama_anggota' => $data['nama'],
                    'waktu_daftar' => _inputWaktu($data['tahun'],$data['bulan'],$data['tanggal'])
                ];
                $this->db->insert('tbl_anggota_sibulan', $input);
            }
            
            if ($data['jenis'] == 'koperasi') {
                $cek = $this->db->get_where('tbl_anggota', ['id_anggota' => $data['id_anggota']])->row_array();
                $input = [
                    'id_anggota' => $cek['id_anggota'],
                    'nama_anggota' => $cek['nama_anggota'],
                    'waktu_daftar' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal'])
                ];
                $this->db->insert('tbl_anggota_sibulan', $input);
            }
        }
    }

    public function editAnggotaKeluar($id, $waktu)
    {
        $this->db->set('tgl_keluar', $waktu);
        $this->db->set('status_keluar', 1);
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota');
    }

    public function editAnggotaKeluarSibulan($id, $waktu)
    {
        $this->db->set('waktu_keluar', $waktu);
        $this->db->set('status_keluar', 1);
        $this->db->where('id_anggota_sibulan', $id);
        $this->db->update('tbl_anggota_sibulan');
    }
    
    public function editAnggota($dataterima){
        if (_cekKosong($dataterima)) {

            $input = [
                'no_buku' => $dataterima['no_buku'],
                'nama_anggota' => $dataterima['nama'],
                'tgl_daftar' => _inputWaktu($dataterima['tahun'],$dataterima['bulan'], $dataterima['tanggal']),
                'tanggungan' => str_replace(',', '', $dataterima['tanggungan'])
            ];

            $this->db->where('id_anggota', $dataterima['id']);
            $this->db->update('tbl_anggota', $input);

            $simpanan = [
                'simpanan_pokok',
                'uang_pangkal',
                'administrasi_pelayanan'
            ];
    
            foreach ($simpanan as $s) {
                if (!empty($dataterima[$s])) {
                    $input = [
                        'jumlah' => str_replace(',','',$dataterima[$s])
                    ];
                    $cek = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $dataterima['id'], 'jenis' => $s])->num_rows();
                    if ($cek > 0) {
                        $this->db->where('id_anggota',$dataterima['id']);
                        $this->db->where('jenis',$s);
                        $this->db->update('tbl_riwayat_simpanan', $input);
                    }
                    else{
                        $dataInput = [
                            'id_anggota' => $dataterima['id'],
                            'jenis' => $s,
                            'waktu' => _inputWaktu($dataterima['tahun'],$dataterima['bulan'], $dataterima['tanggal']),
                            'jumlah' => str_replace(',','',$dataterima[$s])
                        ];
                        $this->db->insert('tbl_riwayat_simpanan', $dataInput);
                    }
                }
            }
        }
    }
    
    public function editAnggotaSibulan($data){
        if (_cekKosong($data)) {
            $input = [
                'nama_anggota' => $data['nama'],
                'waktu_daftar' => _inputWaktu($data['tahun'],$data['bulan'], $data['tanggal'])
            ];
            $this->db->where('id_anggota_sibulan',$data['id']);
            $this->db->update('tbl_anggota_sibulan', $input);
        }
    }

    public function daftar_anggota()
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->order_by('no_buku', 'asc');
        $data = $this->db->get()->result_array();
        $return = $this->daftar_anggota_bulan_keluar($this->session->userdata('bulan'), $data);
        return $return;
    }

    public function daftar_anggota_full()
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->order_by('no_buku', 'asc');
        return $this->db->get()->result_array();
    }

    public function daftar_anggota_bulan_keluar($bulan, $data, $bulan_terima = null, $tahunTerima = null, $sumsuk = null)
    {
        $tahun = is_null($tahunTerima) ? $_SESSION['tahun'] : $tahunTerima;
        // if (!is_null($bulan_terima)) {
            $data = $this->seleksiAnggotaMasuk(is_null($bulan_terima) ? $bulan : $bulan - 1, $data, $tahun);
        // }
        $bulan = $tahun == $_SESSION['tahun'] ? $bulan : 0;
        $return = [];
        foreach ($data as $d) {
            // if (is_null($d['tgl_keluar']) || intval(explode('-', $d['tgl_keluar'])[1]) >= $bulan) {
            if (!is_null($d['tgl_keluar'])) {
                if (is_null($sumsuk)) {
                    if (date($d['tgl_keluar']) > date($tahun.'-'.$bulan.'-'.$this->session->userdata('hari'))) {
                        $return[] = $d;
                    }
                }else{
                    if (intval(explode('-', $d['tgl_keluar'])[1]) >= $bulan && explode('-', $d['tgl_keluar'])[0] == $tahun) {
                        $return[] = $d;
                    }
                    if (explode('-', $d['tgl_keluar'])[0] > $tahun) {
                        $return[] = $d;
                    }
                }
            }if (is_null($d['tgl_keluar'])) {
                $return[] = $d;
            }
            // else{
                // var_dump($d);
                // die();
            // }
        }
        // die();
        return $return;
    }

    public function seleksiAnggotaMasuk($bulan, $data, $tahun)
    {
        $tahun = $bulan == 0 ? $tahun - 1 : $tahun;
        $bulan = $bulan == 0 ? 12 : $bulan;
        $return = [];
        foreach ($data as $d) {
            if (date($d['tgl_daftar']) <= date($tahun.'-'.$bulan.'-'.$this->session->userdata('hari'))) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function daftar_anggota_bulan_masuk($bulan, $data, $tahun)
    {
        $data = $this->seleksiAnggotaMasuk($bulan, $data, $tahun);
        $return = [];
        foreach ($data as $d) {
            if (intval(explode('-', $d['tgl_daftar'])[1]) <= $bulan || intval(explode('-', $d['tgl_daftar'])[0]) < $tahun) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function getAnggotaData($id)
    {
        return $this->db->get_where('tbl_anggota',['id_anggota' => $id])->row_array();
    }

    public function getAnggotaSibulanData($id)
    {
        return $this->db->get_where('tbl_anggota_sibulan',['id_anggota_sibulan' => $id])->row_array();
    }

    public function daftar_anggota_sibulan()
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota_sibulan');
        $this->db->where('status_keluar', '0');
        $return = [];
        foreach ($this->db->get()->result_array() as $d) {
            if (explode('-',$d['waktu_keluar'])[0] < $_SESSION['tahun']) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function daftar_anggota_sibulan_full()
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota_sibulan');
        return $this->db->get()->result_array();
    }

    public function daftar_anggota_sibulan_bulan_keluar($bulan, $data)
    {
        $return = [];
        foreach ($data as $d) {
            if (is_null($d['waktu_keluar']) || intval(explode('-', $d['waktu_keluar'])[1]) >= $bulan) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function daftar_anggota_koperasi_sibulan($koperasi, $sibulan)
    {
        $valid = [];
        foreach ($koperasi as $k) {
            if (!_cariArray('id_anggota', $k['id_anggota'], $sibulan)) {
                $valid[] = $k;
            }
        }
        return $valid;
    }

    public function getRiwayatKeuangan($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_daftar_simpanan', 'tbl_anggota.id_anggota = tbl_daftar_simpanan.id_anggota');
        $this->db->join('tbl_jenis_simpanan', 'tbl_daftar_simpanan.id_jenis_simpanan = tbl_jenis_simpanan.id_jenis_simpanan');
        $this->db->where('tbl_anggota.id_anggota', $id);
        return $this->db->get()->result_array();
    }

    public function getDataAnggota($id)
    {
        return $this->db->get_where('tbl_anggota',['id_anggota' => $id])->row_array();
    }
    
    public function getDetailAnggota($id, $bulan = null, $tahun = null, $hari = null)
    {
        $tahun = is_null($tahun) ? $this->session->userdata('tahun') : $tahun;
        $bulan = is_null($bulan) ? $this->session->userdata('bulan') : $bulan;
        $hari = is_null($hari) ? $this->session->userdata('hari') : $hari;

        $pinjaman = $this->db->get_where('tbl_riwayat_pinjaman',['id_anggota' => $id, 'waktu <= ' => $tahun.'-'.$bulan.'-'.$hari])->result_array();
        $data = $this->db->get_where('tbl_riwayat_simpanan',['id_anggota' => $id, 'waktu <= ' => $tahun.'-'.$bulan.'-'.$hari])->result_array();
        foreach ($data as $d) {
            $pinjaman[] = $d;
        }

        // Untuk Rekapan Buku Baru
        // if (!is_null($tahunLalu)) {
        //     $data = [];
        //     foreach ($pinjaman as $p) {
        //         if (explode('-',$p['waktu'])[0] < $_SESSION['tahun']) {
        //             $data[] = $p;
        //         }
        //     }
        //     $rekap = $this->rekapData($data, true);
        //     return $rekap;
        // }
        $rekap = $this->rekapData($pinjaman);
        $rekap['tanggungan'] = $this->getDataAnggota($id)['tanggungan'];
        $rekap['bulan_saham'] = $this->getDataAnggota($id)['bulan_saham'];
        return $rekap;
    }

    public function rekapData($data)
    {
        $tahun = $_SESSION['tahun'];
        // Seleksi Pokok, Wajib, Dan Sukarela
        $uang_pangkal = 0;
        $administrasi = 0;
        $pokok = [];
        $total_pokok = 0;
        $jumlah_pokok = 0;
        $wajib = [];
        $jumlah_wajib = 0;
        $sukarela = [];
        $jumlah_sukarela = 0;
        $data_selain_simpanan = [];
        foreach ($data as $a) {
            if ($a['jenis'] == 'simpanan_pokok')
                $pokok[] = $a;
            if ($a['jenis'] == 'simpanan_wajib')
                $wajib[] = $a;
            if ($a['jenis'] == 'simpanan_sukarela')
                $sukarela[] = $a;
            if ($a['jenis'] == 'uang_pangkal'){
                $uang_pangkal += $a['jumlah'];
                $data_selain_simpanan[] = $a;
            }
            if ($a['jenis'] == 'administrasi_pelayanan'){
                $data_selain_simpanan[] = $a;
                $administrasi += $a['jumlah'];
            }
            if ($a['jenis'] == 'uang_buku')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'piutang_anggota')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'bunga')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'materai')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'provisi')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'dana_kematian')
                $data_selain_simpanan[] = $a;
            if ($a['jenis'] == 'uang_konsumsi')
                $data_selain_simpanan[] = $a;
        }
        $sukarela_tahun_ini = [];
        $wajib_tahun_ini = [];
        $pokok_tahun_ini = [];

        $pokok_tahun_lalu = 0;
        $sukarela_tahun_lalu = 0;
        $wajib_tahun_lalu = 0;
        foreach ($data as $a) {
            if ($a['jenis'] == 'simpanan_pokok')
                $total_pokok = $a['tarik'] == 0 ? $total_pokok + floatval($a['jumlah']) : $total_pokok - floatval($a['jumlah']);
            if ($a['jenis'] == 'simpanan_pokok' && explode('-',$a['waktu'])[0] <= $tahun - 1)
                $pokok_tahun_lalu = $a['tarik'] == 0 ? $pokok_tahun_lalu + floatval($a['jumlah']) : $pokok_tahun_lalu - floatval($a['jumlah']);
            if ($a['jenis'] == 'simpanan_wajib' && explode('-',$a['waktu'])[0] <= $tahun - 1)
                $wajib_tahun_lalu = $a['tarik'] == 0 ? $wajib_tahun_lalu + floatval($a['jumlah']) : $wajib_tahun_lalu - floatval($a['jumlah']);
            if ($a['jenis'] == 'simpanan_sukarela' && explode('-',$a['waktu'])[0] <= $tahun - 1)
                $sukarela_tahun_lalu = $a['tarik'] == 0 ? $sukarela_tahun_lalu + floatval($a['jumlah']) : $sukarela_tahun_lalu - floatval($a['jumlah']);
        }
        for ($i=1; $i <= 12; $i++) { 
            $sukarela_tahun_ini[$i] = 0;
            $pokok_tahun_ini[$i] = 0;
            $wajib_tahun_ini[$i] = 0;
            foreach ($sukarela as $s) {
                if (intval(explode('-',$s['waktu'])[1]) == $i && intval(explode('-',$s['waktu'])[0]) == $tahun) {
                    $sukarela_tahun_ini[$i] = $s['tarik'] == 0 ? $sukarela_tahun_ini[$i] + $s['jumlah'] : $sukarela_tahun_ini[$i] - $s['jumlah'];
                    $jumlah_sukarela = $s['tarik'] == 0 ? $jumlah_sukarela + floatval($s['jumlah']) : $jumlah_sukarela - floatval($s['jumlah']);
                }
            }
            foreach ($wajib as $s) {
                if (intval(explode('-',$s['waktu'])[1]) == $i && intval(explode('-',$s['waktu'])[0]) == $tahun) {
                    $wajib_tahun_ini[$i] = $s['tarik'] == 0 ? $wajib_tahun_ini[$i] + $s['jumlah'] : $wajib_tahun_ini[$i] - $s['jumlah'];
                    $jumlah_wajib = $s['tarik'] == 0 ? $jumlah_wajib + floatval($s['jumlah']) : $jumlah_wajib - floatval($s['jumlah']);
                }
            }
            foreach ($pokok as $s) {
                if (intval(explode('-',$s['waktu'])[1]) == $i && intval(explode('-',$s['waktu'])[0]) == $tahun) {
                    $pokok_tahun_ini[$i] = $s['tarik'] == 0 ? $pokok_tahun_ini[$i] + $s['jumlah'] : $pokok_tahun_ini[$i] - $s['jumlah'];
                    $jumlah_pokok = $s['tarik'] == 0 ? $jumlah_pokok + floatval($s['jumlah']) : $jumlah_pokok - floatval($s['jumlah']);
                }
            }
        }

        $riwayat_pijaman = $this->riwayatPinjaman($data);
        $sisa_pinjaman_anggota = count($riwayat_pijaman['riwayat']) > 0 ? $riwayat_pijaman['riwayat'][count($riwayat_pijaman['riwayat']) - 1]['sisa'] : 0;

        return [
            'administrasi' => number_format($administrasi,0,'.',','),
            'simpanan_riwayat' => $this->filterRiwayat($data, $tahun),
            'riwayat_bulanan' => $this->riwayatPerBulan($data),
            'uang_pangkal' => number_format($uang_pangkal,0,'.',','),
            'riwayat_pinjaman' => $riwayat_pijaman['riwayat'],
            'daftar_pinjaman' => $riwayat_pijaman['daftar_pinjaman'],
            'detail_pinjaman' => $riwayat_pijaman['detail'],
            'data_selain_simpanan' => $data_selain_simpanan,
            'pokok' => $pokok_tahun_ini,
            'total_pokok' => number_format($total_pokok,0,'.',','),
            'jumlah_pokok' => number_format($jumlah_pokok,0,'.',','),
            'wajib' => $wajib_tahun_ini,
            'jumlah_wajib' => number_format($jumlah_wajib,0,'.',','),
            'sukarela' => $sukarela_tahun_ini,
            'jumlah_sukarela' => number_format($jumlah_sukarela,0,'.',','),
            'jumlah_dana_kematian' => number_format($this->getSelainSimpanan($data_selain_simpanan,'dana_kematian'),0,'.',','),
            'pokok_tahun_lalu' => number_format($pokok_tahun_lalu,0,'.',','),
            'wajib_tahun_lalu' => number_format($wajib_tahun_lalu,0,'.',','),
            'sukarela_tahun_lalu' => number_format($sukarela_tahun_lalu,0,'.',','),
            'jumlah_pokok_des' => number_format($pokok_tahun_lalu + $jumlah_pokok,0,'.',','),
            'jumlah_wajib_des' => number_format($wajib_tahun_lalu + $jumlah_wajib,0,'.',','),
            'jumlah_sukarela_des' => number_format($sukarela_tahun_lalu + $jumlah_sukarela,0,'.',','),
            'jumlah_tahun_lalu' => number_format($pokok_tahun_lalu + $wajib_tahun_lalu + $sukarela_tahun_lalu, 0,'.',','),
            'jumlah_tahun_ini' => number_format($jumlah_pokok + $jumlah_wajib + $jumlah_sukarela, 0,'.',','),
            'jumlah_tahun_ini_des' => number_format(($pokok_tahun_lalu + $jumlah_pokok) + ($wajib_tahun_lalu + $jumlah_wajib) + ($sukarela_tahun_lalu + $jumlah_sukarela), 0, '.',','),
            'total_anggota' => ($pokok_tahun_lalu + $jumlah_pokok) + ($wajib_tahun_lalu + $jumlah_wajib) + ($sukarela_tahun_lalu + $jumlah_sukarela) - $sisa_pinjaman_anggota,
            'diambil' => ($pokok_tahun_lalu + $jumlah_pokok) + ($wajib_tahun_lalu + $jumlah_wajib) + ($sukarela_tahun_lalu + $jumlah_sukarela) - $sisa_pinjaman_anggota - 250000
        ];
    }

    public function riwayatPerBulan($data)
    {
        $riwayat = [];
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $_SESSION['tahun'] && $d['jenis'] != 'pinjaman_anggota') {
                if (!isset($riwayat[intval($waktu[1])])) {
                    $riwayat[intval($waktu[1])] = 0;
                }
                $riwayat[intval($waktu[1])] += floatval($d['jumlah']);
            }
        }
        return $riwayat;
    }

    public function getSelainSimpanan($data, $jenis)
    {
        $return = 0;
        foreach ($data as $d) {
            if ($d['jenis'] == $jenis) {
                if ($d['tarik'] == 0) {
                    $return += floatval($d['jumlah']);
                }
            }
        }
        return $return;
    }

    public function filterRiwayat($data, $tahun)
    {
        $return = [];
        for ($i=0; $i < count($data); $i++) {
            if (explode('-', $data[$i]['waktu'])[0] == $tahun) {
                $data[$i]['id'] = isset($data[$i]['id_riwayat_pinjaman']) ? $data[$i]['id_riwayat_pinjaman'] : $data[$i]['id_riwayat_simpanan'];
                $data[$i]['type'] = 'PINJAM';
                if (isset($data[$i]['tarik'])) {
                    $data[$i]['type'] = $data[$i]['tarik'] == 0 ? 'SIMPAN' : 'TARIK';
                }
                $data[$i]['jenis'] = strtoupper(str_replace('_',' ', $data[$i]['jenis']));
                $data[$i]['tanggal'] = explode('-',$data[$i]['waktu'])[2];
                $data[$i]['bulan'] = intval(explode('-',$data[$i]['waktu'])[1]);
                $data[$i]['tahun'] = explode('-',$data[$i]['waktu'])[0];
                $data[$i]['waktu'] = _cetakWaktu($data[$i]['waktu']);
                $return[] = $data[$i];
            }
        }
        return $return;
    }

    public function riwayatPinjaman($data)
    {
        $daftar_waktu = [];
        foreach ($data as $d) {
            if ($d['jenis'] == 'pinjaman_anggota' || $d['jenis'] == 'piutang_anggota') {
                $daftar_waktu[] = $d['waktu'];
            }
        }
        if (count($daftar_waktu) > 0) {
            $daftar_waktu = _sortingWaktu($daftar_waktu);
            $pinjaman = [];
            $angsuran = [];
            $angsurKet = [];
            foreach ($data as $d) {
                if ($d['jenis'] == 'pinjaman_anggota') {
                    if (count($pinjaman) > 0) {
                        if ($pinjaman[count($pinjaman) - 1]['waktu'] == $d['waktu']) {
                            $jumlah_pinjaman = $pinjaman[count($pinjaman) - 1]['jumlah'];
                            $pinjaman[count($pinjaman) - 1] = $d;
                            $pinjaman[count($pinjaman) - 1]['jumlah'] += $jumlah_pinjaman;
                        }
                        else
                            $pinjaman[] = $d;
                    }
                    else
                        $pinjaman[] = $d;
                }
                if ($d['jenis'] == 'piutang_anggota') {
                    if (count($angsuran) > 0) {
                        if ($angsuran[count($angsuran) - 1]['waktu'] == $d['waktu']) {
                            $angsuran[count($angsuran) - 1]['jumlah'] += $d['jumlah'];
                            if (strlen($angsuran[count($angsuran) - 1]['ket']) > 0) {
                                $angsuran[count($angsuran) - 1]['ket'] .= '_'.$d['ket']." ( ".number_format($d['jumlah'],0,'.',',')." )";
                            }
                            else if(strlen($angsuran[count($angsuran) - 1]['ket']) == 0 && !empty($d['ket'])){
                                $angsuran[count($angsuran) - 1]['ket'] = $d['ket']." ( ".number_format($d['jumlah'],0,'.',',')." )";
                            }
                        }
                        else
                            $angsuran[] = $d;
                    }
                    else
                        $angsuran[] = $d;
                }
            }
            $detail_pinjaman = null;
            $detail_pinjaman_angsuran = [];
            $pinjamanAmbil = [];
            $angsurAmbil = [];
            if (count($pinjaman) > 0) {
                
                $sisa = 0;
                foreach ($daftar_waktu as $dw) {
                    $tampil = true;
                    $besaran = $this->cekBesaran($dw, $pinjaman);
                    $besaran_ket = $besaran['ket'];
                    $besaran = $besaran['jumlah'];
                    $angsur = $this->cekAngsuran($dw, $angsuran);

                    if ($besaran == 0) {
                        $besaran = $sisa;
                        $tampil = false;
                    }
                    else{
                        $pinjamanAmbil[] = $this->cekPinjamanData($dw, $pinjaman);
                        $pinjamanAmbil[count($pinjamanAmbil) - 1]['lunas'] = 0;
                    }
                    
                    $cek_detail = $this->cekDetailPinjaman($dw, $pinjaman);
                    
                    if (!is_null($cek_detail)) {
                        $detail_pinjaman = $cek_detail;
                    }
                    
                    if (!$tampil && floatval($angsur['jumlah']) > 0) {
                        $sisa = floatval($besaran - $angsur['jumlah']);

                        $ket = '';
                        $ket = implode(',', explode('_', $angsur['ket']));
                        $ket = $ket != "" ? "( ".$ket." ) ": $ket;
                        $ket = $sisa > 0 ? $ket : $ket .= 'Lunas';

                        $detail_pinjaman_angsuran[] = [
                            'waktu' => _cetakWaktu($dw),
                            'besaran' => '',
                            'angsuran' => floatval($angsur['jumlah']),
                            'sisa' => $sisa,
                            'ket' => $ket
                        ];
                    }
                    if ($tampil && floatval($angsur['jumlah']) == 0) {
                        $sisa = $sisa > 0 ? $sisa : 0;
                        $sisa = $sisa + $besaran;
                        // $sisa = $besaran;

                        $ket = '';
                        $ket = implode(',', explode('_', $angsur['ket']));
                        $ket = $ket != "" ? "( ".$ket." ) ": $ket;
                        $ket = $sisa > 0 ? $ket : $ket .= 'Lunas';

                        $detail_pinjaman_angsuran[] = [
                            'waktu' => _cetakWaktu($dw),
                            'besaran' => $besaran,
                            'angsuran' => floatval($angsur['jumlah']),
                            'sisa' => $sisa,
                            'ket' => $besaran_ket
                        ];
                    }
                    if ($tampil && floatval($angsur['jumlah']) > 0) {
                        $sisa = floatval($sisa - $angsur['jumlah']);

                        $ket = '';
                        $ket = implode(',', explode('_', $angsur['ket']));
                        $ket = $ket != "" ? "( ".$ket." ) ": $ket;
                        $ket = $sisa > 0 ? $ket : $ket .= 'Lunas';

                        $detail_pinjaman_angsuran[] = [
                            'waktu' => _cetakWaktu($dw),
                            'besaran' => '',
                            'angsuran' => floatval($angsur['jumlah']),
                            'sisa' => $sisa,
                            'ket' => $ket
                        ];

                        $sisa = $besaran + $sisa;

                        $ket = '';
                        $ket = implode(',', explode('_', $angsur['ket']));
                        $ket = $ket != "" ? "( ".$ket." ) ": $ket;
                        $ket = $sisa > 0 ? $ket : $ket .= 'Lunas';

                        $detail_pinjaman_angsuran[] = [
                            'waktu' => _cetakWaktu($dw),
                            'besaran' => $besaran,
                            'angsuran' => 0,
                            'sisa' => $sisa,
                            'ket' => $besaran_ket
                        ];
                    }
                    if ($sisa == 0) {
                        $pinjamanAmbil[count($pinjamanAmbil) - 1]['lunas'] = 1;
                    }                    
                }
            }

            $this->validasiLunas($pinjamanAmbil, $pinjaman);

            return [
                'riwayat' => $detail_pinjaman_angsuran,
                'detail' => $detail_pinjaman,
                'daftar_pinjaman' => $pinjamanAmbil,
            ];
        }else{
            return [
                'riwayat' => [],
                'detail' => null,
                'daftar_pinjaman' => null
            ];
        }
    }

    public function validasiLunas($pinjamanAmbil, $pinjaman)
    {
        foreach ($pinjamanAmbil as $pA) {
            foreach ($pinjaman as $p) {
                if ($pA['id_riwayat_pinjaman'] == $p['id_riwayat_pinjaman']) {
                    if ($p['lunas'] == 0 && $pA['lunas'] == 1) {
                        $this->db->set('lunas', 1);
                        $this->db->where('id_riwayat_pinjaman', $p['id_riwayat_pinjaman']);
                        $this->db->update('tbl_riwayat_pinjaman');
                    }
                    if ($pA['lunas'] == 0) {
                        $this->db->set('lunas', 0);
                        $this->db->where('id_riwayat_pinjaman', $pA['id_riwayat_pinjaman']);
                        $this->db->update('tbl_riwayat_pinjaman');
                    }
                }
            }
        }
    }

    public function cekDetailPinjaman($waktu, $pinjaman)
    {
        $return = null;
        foreach ($pinjaman as $a) {
            if ($a['waktu'] == $waktu) {
                $return = $a;
                $return['waktu'] = _cetakWaktu($a['waktu']);
                $return['jatuh_tempo'] = _cetakWaktu($a['jatuh_tempo']);
                $return['status'] = _statusJatuhTempo(date($_SESSION['tahun'].'-'.$this->session->userdata('bulan').'-'.$this->session->userdata('hari')), $a['jatuh_tempo']) ? '( Telah Jatuh Tempo )' : '';
            }
        }
        return $return;
    }

    public function cekBesaran($waktu, $pinjaman)
    {
        foreach ($pinjaman as $a) {
            if ($a['waktu'] == $waktu) {
                return $a;
            }
        }
        return 0;
    }

    // Sama dengan Besaran Tapi Ambil Pinjaman
    public function cekPinjamanData($waktu, $pinjaman)
    {
        foreach ($pinjaman as $a) {
            if ($a['waktu'] == $waktu) {
                return $a;
            }
        }
        return null;
    }

    public function cekAngsuran($waktu, $angsuran)
    {
        foreach ($angsuran as $a) {
            if ($a['waktu'] == $waktu) {
                return $a;
            }
        }
        return 0;
    }

    public function getdatasimpanantiapbulan($bulan)
    {
        $anggota = $this->db->get('tbl_anggota')->result_array();
        $data = $this->db->get('tbl_daftar_simpanan')->result_array();
        $jenis_simpanan = $this->db->get_where('tbl_jenis_simpanan',['masuk' => 1])->result_array();
        $data_keluar=[];
        $j = 0;
        for ($i=0; $i < count($anggota); $i++) { 
            foreach ($data as $a) {
                $bulan_arr = explode('-',$a['waktu']);
                if ($a['id_anggota'] == $anggota[$i]['id_anggota'] && $bulan_arr[1] == $bulan && $bulan_arr[0] == $_SESSION['tahun']) {
                    $data_keluar[$j]['nama_anggota'] = $anggota[$i]['nama_anggota'];
                    $data_keluar[$j]['jenis_simpanan']['id_jenis'][]= $a['id_jenis_simpanan'];
                    $data_keluar[$j]['jenis_simpanan']['nominal_jenis'][]= $a['jumlah'];
                    $data_keluar[$j]['jenis_simpanan']['jenis'][]= $a['jenis'];
                }
            }
            $j++;
        }
        return $data_keluar;
    }
    
    public function daftarPiutang($bulan)
    {
        $tahun = $_SESSION['tahun'];
        $anggota = $this->daftar_anggota_full();
        $anggota = $this->daftar_anggota_bulan_keluar($bulan, $anggota, null, null, true);
        for ($i=0; $i < count($anggota); $i++) {
            $detail = $this->getDetailAnggota($anggota[$i]['id_anggota'], $bulan, $tahun, 31);
            foreach ($detail['riwayat_pinjaman'] as $r) {
                if (_getBulanAngka(explode(' ',$r['waktu'])[1]) <= $bulan || explode(' ', $r['waktu'])[2] <= $tahun) {
                    $anggota[$i]['riwayat_pinjaman'] = $r;
                }
            }
            $anggota[$i]['daftar_piutang'] = $detail['riwayat_pinjaman'];
            $anggota[$i]['detail'] = $detail['detail_pinjaman'];
            $anggota[$i]['sisa'] = 0;
        }
        $return = [];
        $total = 0;
        for ($i=0; $i < count($anggota); $i++) { 
            if (count($anggota[$i]['daftar_piutang']) > 0) {
                $sisa = 0;
                $daftar = [];
                if (isset($anggota[$i]['riwayat_pinjaman'])) {
                    $sisa = floatval($anggota[$i]['riwayat_pinjaman']['sisa']);
                }
                $total += floatval($sisa);
                $anggota[$i]['sisa'] = $sisa;
                // $anggota[$i]['daftar'] = $daftar;
                if (floatval($sisa) > 0) {
                    $return[] = $anggota[$i];
                }
            }
        }
        return [
            'anggota' => $return,
            'total' => $total
            // 'bulan' => $bulan,
            // 'tahun' => $tahun,
            // 'daftar' => $daftar
        ];
    }

    // public function getDetailPinjaman($id, $bulan)
    // {
    //     $return = [
    //         'riwayat_pinjaman' => [],
    //         'detail' => []
    //     ];
    //     return $return;
    // }

    public function editRiwayat($data)
    {   
        $validasi = _cekValidasiLKSB($data['bulan'], $data['tahun'], true);
        if (!$validasi) {
            echo json_encode([
                'validasi' => false,
                'bulan' => _getBulan($data['bulan']),
                'tahun' => $data['tahun'],
            ]);
            die();
        }
        $data['bulan'] = floatval($data['bulan']) < 10 ? '0'.$data['bulan'] : $data['bulan'];
        if ($data['jenis'] == 'PINJAMAN ANGGOTA') {
            $this->db->set('id_anggota', $data['id_anggota']);
            $this->db->set('jenis', strtolower(str_replace(' ', '_', $data['jenis'])));
            $this->db->set('waktu', _inputWaktu($data['tahun'],$data['bulan'],$data['tanggal']));
            $this->db->set('jumlah', str_replace(',','',$data['jumlah']));
            $this->db->set('lama_pinjaman', str_replace(',','',$data['lama']));
            $this->db->where('id_riwayat_pinjaman', $data['id']);
            $this->db->update('tbl_riwayat_pinjaman');
        }
        else{
            $this->db->set('id_anggota', $data['id_anggota']);
            $this->db->set('jenis', strtolower(str_replace(' ','_', $data['jenis'])));
            $this->db->set('waktu', _inputWaktu($data['tahun'],$data['bulan'],$data['tanggal']));
            $this->db->set('jumlah', str_replace(',','',$data['jumlah']));
            $this->db->set('ket', str_replace(',','',$data['ket']));
            $this->db->where('id_riwayat_simpanan', $data['id']);
            $this->db->update('tbl_riwayat_simpanan');
        }
    }

    public function hapusRiwayat($data)
    {
        $validasi = _cekValidasiLKSB(_getBulanAngka(explode(' ', $data['tanggal'])[1]), explode(' ', $data['tanggal'])[2], true);
        if (!$validasi) {
            echo json_encode([
                'validasi' => false,
                'bulan' => explode(' ', $data['tanggal'])[1],
                'tahun' => explode(' ', $data['tanggal'])[2],
            ]);
            die();
        }

        $data['jenis'] = strtolower(str_replace(' ','_', $data['jenis']));
        if ($data['jenis'] != 'pinjaman_anggota') {
            $this->db->delete('tbl_riwayat_simpanan', ['id_riwayat_simpanan' => $data['id']]);
        }
        else{
            $this->db->delete('tbl_riwayat_pinjaman', ['id_riwayat_pinjaman' => $data['id']]);
        }
    }

    public function no_buku($no_buku)
    {
        $get = $this->db->get_where('tbl_anggota',['no_buku' => $no_buku])->row_array();
        if (!is_null($get)) {
            return [
                'nama_anggota' => $get['nama_anggota'],
                'id' => $get['id_anggota']
            ];
        }
        return null;
    }

    public function filterRekap($bulan, $data)
    {
        // if ($nama_anggota == 'Yohanes Sabu') {
        //     var_dump($data['pokok'], $bulan);
        //     die();
        // }
        $simpanan = ['pokok', 'wajib', 'sukarela'];
        // $data['jumlah_tahun_lalu'] = 0;
        foreach ($simpanan as $s) {
            $data['jumlah_'.$s] = 0;
            $i = 1;
            foreach ($data[$s] as $p) {
                if ($i <= $bulan) {
                    $data['jumlah_'.$s] += $p;
                }
                $i++;
            }
            // $data['jumlah_'.$s] = floatval(str_replace(',', '', $data[$s.'_tahun_lalu']));
            $data['total_'.$s] = $data['jumlah_'.$s] + floatval(str_replace(',', '', $data[$s.'_tahun_lalu']));
            $data['jumlah_'.$s.'_des'] = number_format($data['total_'.$s],0,'.',',');
            $data['jumlah_'.$s] = number_format($data['jumlah_'.$s],0,'.',',');
            $data['total_'.$s] = number_format($data['total_'.$s],0,'.',',');
        }
        // var_dump($data);
        // die();  
        return $data;
    }
}