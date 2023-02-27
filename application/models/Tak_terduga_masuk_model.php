<?php 

class tak_terduga_masuk_model extends CI_Model{
    public function daftar_tak_terduga($bulan, $tahun_lalu = null)
    {
        $tahun = $_SESSION['tahun'];
        // Tak Terduga Lainnya
        $piutang_arisan = $this->piutang_arisan_model->akumulasi($_SESSION['tahun']);
        
        $dcr = $this->dcr_model->getCatatan($bulan, $_SESSION['tahun']);
        $dcu = $this->dcu_model->getCatatan($bulan, $_SESSION['tahun']);
        $dcrFix = [];
        $dcuFix = [];
        for ($i=0; $i < count($dcr); $i++) { 
            if (isset($dcr[$i]['id_dcr'])) {
                $dcrFix[] = $dcr[$i];
            }
        }
        for ($i=0; $i < count($dcu); $i++) { 
            if (isset($dcu[$i]['id_dcu'])) {
                $dcuFix[] = $dcu[$i];
            }
        }

        $sibuhari = $this->sibuhari_model->akumulasi($_SESSION['tahun']);
        $simapan = $this->simapan_model->getCatatan($bulan, $_SESSION['tahun']);
        
        $simapanFix = [];
        for ($i=0; $i < count($simapan); $i++) { 
            if ($simapan[$i]['jenis'] == 1) {
                $simapanFix[] = $simapan[$i];
            }
        }

        $biaya_organisasi = $this->biaya_organisasi_model->akumulasi($_SESSION['tahun']);
        $rat = $this->rat_model->akumulasi($_SESSION['tahun']);
        
        $data = $this->db->get_where('tbl_riwayat_tak_terduga_masuk',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        $return = [];
        foreach ($data as $d) {
            if (explode('-', $d['waktu'])[1] == intval($bulan)) {
                $kirim = $d;
                $kirim['tanggal'] = explode('-', $d['waktu'])[2];
                $kirim['bulan'] = intval(explode('-', $d['waktu'])[1]);
                $kirim['tahun'] = explode('-', $d['waktu'])[0];
                if (!is_null($tahun_lalu)) {
                    if ($kirim['tahun'] < $_SESSION['tahun']) {
                        $return[] = $kirim;
                    }
                }else{
                    $return[] = $kirim;
                }
            }
        }

        $pendapatan_lainnya = $this->pendapatan_lainnya_model->getCatatan($bulan, $_SESSION['tahun']);
        $titipan_simpanan = $this->titipan_simpanan_model->getCatatan($bulan, $_SESSION['tahun']);
        $piutang_konsumsi = $this->piutang_konsumsi_model->getCatatan($bulan, $_SESSION['tahun']);
        $persediaan = $this->persediaan_model->getCatatan($bulan, $_SESSION['tahun']);
        $investasi = $this->investasi_model->getCatatan($bulan, $_SESSION['tahun']);
        $inventaris = $this->inventaris_model->getCatatan($bulan, $_SESSION['tahun']);
        $hibah = $this->hibah_donasi_model->getCatatan($bulan, $_SESSION['tahun']);


        $titipan_konsumsi = $this->titipan_konsumsi_model->getCatatan($bulan, $_SESSION['tahun']);
        $titipan_konsumsiFix = [];
        for ($i=0; $i < count($titipan_konsumsi); $i++) { 
            if (isset($titipan_konsumsi[$i]['id_titipan_konsumsi'])) {
                $titipan_konsumsiFix[] = $titipan_konsumsi[$i];
            }
        }

        $return = $this->gabung_masuk($return, $sibuhari, $bulan, 'Tarik di sibuhari', 'kredit', 'SIBUHARI ( Keluar )');
        $return = $this->gabung_masuk($return, $biaya_organisasi, $bulan, 'Terima Operasional Pengurus', 'selisih', 'Biaya Organisasi ( Selisih )');
        $return = $this->gabung_masuk($return, $piutang_arisan, $bulan, 'Terima Piutang Arisan', 'kredit', 'Piutang Arisan ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $pendapatan_lainnya, $bulan, 'Pendapatan Lainnya', 0, 'Pendapatan Lainnya ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $titipan_simpanan, $bulan, 'Jumlah', 0, 'Titipan Simpanan ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $titipan_konsumsiFix, $bulan, 'Jumlah', 0, 'Titipan Konsumsi ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $dcrFix, $bulan, 'Jumlah', 0, 'DCR ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $dcuFix, $bulan, 'Jumlah', 0, 'DCU ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $piutang_konsumsi, $bulan, 'Jumlah', 1, 'Piutang Konsumsi ( Keluar )');
        $return = $this->gabung_keluar_dinamic($return, $hibah, $bulan, 'Jumlah', 0, 'Hibah / Donasi ( Masuk )');
        $return = $this->gabung_keluar_dinamic($return, $persediaan, $bulan, 'Jumlah', 1, 'Persediaan ( Keluar )');
        $return = $this->gabung_keluar_dinamic($return, $investasi, $bulan, 'Jumlah', 1, 'Investasi ( Keluar )');
        $return = $this->gabung_keluar_dinamic($return, $inventaris, $bulan, 'Jumlah', 1, 'Inventaris ( Keluar )');
        $return = $this->gabung_keluar_dinamic($return, $simapanFix, $bulan, 'Tarik Dari Simapan', 1, 'Simapan ( Keluar )');
        return $return;

    }

    private function gabung_masuk($tak_terduga_masuk, $data, $i, $uraian, $field, $sumber)
    {
        $tak_terduga_masuk[] = [
            'bulan' => _getBulanAngka($data[$i]['bulan']),
            'tahun' => "".$_SESSION['tahun'],
            'tanggal' => "01",
            'jumlah' => strval($data[$i][$field]),
            'uraian' => $uraian,
            'waktu' => date($this->session->userdata('tahun').'-'.$i.'-'.$this->session->userdata('hari')),
            'sumber' => $sumber,
        ];
        return $tak_terduga_masuk;
    }

    private function gabung_keluar_dinamic($tak_terduga_masuk, $data, $i, $keterangan, $jenis, $sumber)
    {
        foreach ($data as $d) {
            if (isset($d['jenis']) && floatval($d['jenis']) == $jenis) {
                $tak_terduga_masuk[] = [
                    'bulan' => intval(explode('-', $d['waktu'])[1]),
                    'tahun' => "".explode('-', $d['waktu'])[0],
                    'tanggal' => "01",
                    'jumlah' => strval($d['jumlah']),
                    'uraian' => isset($d['keterangan']) ? $d['keterangan'] : $keterangan,
                    'waktu' => date($this->session->userdata('tahun').'-'.$i.'-'.$this->session->userdata('hari')),
                    'keterangan' => isset($d['keterangan']) ? $keterangan : 'Jumlah',
                    'sumber' => $sumber
                ];
            }if ($jenis === 'true') {
                $tak_terduga_masuk[] = [
                    'bulan' => intval(explode('-', $d['waktu'])[1]),
                    'tahun' => "".explode('-', $d['waktu'])[0],
                    'tanggal' => "01",
                    'jumlah' => strval($d['jumlah']),
                    'uraian' => isset($d['keterangan']) ? $d['keterangan'] : $keterangan,
                    'waktu' => date($this->session->userdata('tahun').'-'.$i.'-'.$this->session->userdata('hari')),
                    'keterangan' => isset($d['keterangan']) ? $keterangan : 'Jumlah', 
                    'sumber' => $sumber
                ];
            }
        }
        return $tak_terduga_masuk;
    }
    
    public function TambahTakTerduga($data)
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
        $input = [
            'uraian' => $data['uraian'],
            'jumlah' => str_replace(',','',$data['jumlah']),
            'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal'])
        ];
        if (_cekKosong($input)) {
            if (empty($data['edit'])) {
                $this->db->insert('tbl_riwayat_tak_terduga_masuk', $input);
            }else{
                $this->db->set('uraian', $input['uraian']);
                $this->db->set('jumlah', $input['jumlah']);
                $this->db->set('waktu', $input['waktu']);
                $this->db->where('id_tak_terduga_masuk', $data['edit']);
                $this->db->update('tbl_riwayat_tak_terduga_masuk');
            }
        }
        return true;
    }
    public function HapusTakTerduga($id)
    {
        $row = $this->db->get_where('tbl_riwayat_tak_terduga_masuk', ['id_tak_terduga_masuk' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_riwayat_tak_terduga_masuk', ['id_tak_terduga_masuk' => $id]);
    }

    public function bukuBaru()
    {
        $this->db->from('tbl_riwayat_tak_terduga_masuk');
        $this->db->truncate();
    }
}