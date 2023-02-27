<?php 

class tak_terduga_keluar_model extends CI_Model{
    public function daftar_tak_terduga($bulan, $tahun_lalu = null)
    {
        $tahun = $_SESSION['tahun'];
        // Tak Terduga Lainnya
        $piutang_arisan = $this->piutang_arisan_model->getCatatan($bulan, $_SESSION['tahun']);
        $sibuhari = $this->sibuhari_model->getCatatan($bulan, $_SESSION['tahun']);
        // $simapan = $this->simapan_model->getCatatan($bulan, $_SESSION['tahun']);
        $persediaan = $this->persediaan_model->getCatatan($bulan, $_SESSION['tahun']);
        $kalkulator = $this->kalkulator_model->getCatatan($bulan, $_SESSION['tahun']);
        $dcu = $this->dcu_model->getCatatan($bulan, $_SESSION['tahun']);
        $dcr = $this->dcr_model->getCatatan($bulan, $_SESSION['tahun']);
        // $bunga_sibuhari = $this->bunga_sibuhari_model->getCatatan($bulan, $_SESSION['tahun']);
        $biaya_organisasi = $this->biaya_organisasi_model->getCatatan($bulan, $_SESSION['tahun']);
        $pelunasan_biaya_organisasi = $this->pelunasan_biaya_organisasi_model->getCatatan($bulan, $_SESSION['tahun']);
        $rat = $this->rat_model->getCatatan($bulan, $_SESSION['tahun']);
        $titipan_konsumsi = $this->titipan_konsumsi_model->getCatatan($bulan, $_SESSION['tahun']);
        $beban_biaya_pengurus = $this->beban_biaya_pengurus_model->getCatatan($bulan, $_SESSION['tahun']);
        $beban_simpanan_wajib_tarik = $this->beban_simpanan_wajib_tarik_model->getCatatan($bulan, $_SESSION['tahun']);
        $pendapatan_lainnya = $this->pendapatan_lainnya_model->getCatatan($bulan, $_SESSION['tahun']);
        $titipan_simpanan = $this->titipan_simpanan_model->getCatatan($bulan, $_SESSION['tahun']);
        $piutang_konsumsi = $this->piutang_konsumsi_model->getCatatan($bulan, $_SESSION['tahun']);
        $investasi = $this->investasi_model->getCatatan($bulan, $_SESSION['tahun']);
        $inventaris = $this->inventaris_model->getCatatan($bulan, $_SESSION['tahun']);
        $hibah = $this->hibah_donasi_model->getCatatan($bulan, $_SESSION['tahun']);
        
        $data = $this->db->get_where('tbl_riwayat_tak_terduga_keluar',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
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
        // Sibuhari - Bunga
        // $sibuhari[$bulan]['debit'] -= $sibuhari[$bulan]['debit'] > 0 ? $bunga_sibuhari[$bulan]['debit'] : 0;

        $return = $this->gabung_keluar($return, $sibuhari, $bulan, 'Jumlah', 0, 'SIBUHARI ( Masuk )');
        $return = $this->gabung_keluar($return, $dcu, $bulan, 'Jumlah', 1, 'DCU ( Keluar )');
        $return = $this->gabung_keluar($return, $dcr, $bulan, 'Jumlah', 1, 'DCR ( Keluar )');
        // $return = $this->gabung_keluar($return, $simapan, $bulan, 'Setor ke Simapan', 0);
        $return = $this->gabung_keluar($return, $persediaan, $bulan, 'Persediaan Barang', 0, 'Persediaan ( Masuk )');
        $return = $this->gabung_keluar($return, $piutang_arisan, $bulan, 'Pinjaman Arisan', 1, 'Pinjaman Arisan ( Keluar )');
        $return = $this->gabung_keluar($return, $biaya_organisasi, $bulan, 'Biaya Operasional Pengurus', 0, 'Biaya Organisasi ( Masuk )');
        $return = $this->gabung_keluar($return, $kalkulator, $bulan, 'Jumlah', 'true', 'Kalkulator dll');
        $return = $this->gabung_keluar($return, $pelunasan_biaya_organisasi, $bulan, 'Bayar Operasional Pengurus', 0, 'Pelunasan Biaya Organisasi');
        $return = $this->gabung_keluar($return, $rat, $bulan, 'Biaya RAT', 1, 'RAT ( Keluar )');
        $return = $this->gabung_keluar($return, $titipan_konsumsi, $bulan, 'Jumlah', 1, 'Titipan Konsumsi ( Tarik )');
        $return = $this->gabung_keluar($return, $beban_simpanan_wajib_tarik, $bulan, 'Jumlah', 1, 'Beban Simpanan Wajib Tarik ( Keluar )');
        $return = $this->gabung_keluar($return, $beban_biaya_pengurus, $bulan, 'Jumlah', 1, 'Beban Biaya Pengurus ( Keluar )');
        $return = $this->gabung_keluar($return, $pendapatan_lainnya, $bulan, 'Jumlah', 1, 'Pendapatan Lainnya ( Keluar )');
        $return = $this->gabung_keluar($return, $titipan_simpanan, $bulan, 'Jumlah', 1, 'Titipan Simpanan ( Keluar )');
        $return = $this->gabung_keluar($return, $piutang_konsumsi, $bulan, 'Jumlah', 0, 'Piutang Konsumsi ( Masuk )');
        $return = $this->gabung_keluar($return, $investasi, $bulan, 'Jumlah', 0, 'Investasi ( Masuk )');
        $return = $this->gabung_keluar($return, $inventaris, $bulan, 'Jumlah', 0, 'Inventaris ( Masuk )');
        $return = $this->gabung_keluar($return, $hibah, $bulan, 'Jumlah', 1, 'Hibah / Donasi ( Keluar )');
        // $return = $this->gabung_keluar($return, $simapan, $bulan, 'Setor ke simapan', 'debit', 'Jumlah');
        return $return;
    }
    
    private function gabung_keluar($tak_terduga_keluar, $data, $i, $keterangan, $jenis, $sumber)
    {
        foreach ($data as $d) {
            if (isset($d['jenis']) && floatval($d['jenis']) == $jenis) {
                $tak_terduga_keluar[] = [
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
                $tak_terduga_keluar[] = [
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
        return $tak_terduga_keluar;
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
            'keterangan' => $data['keterangan'],
            'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal'])
        ];
        if (empty($input['keterangan'])) {
            $input['keterangan'] = 'Jumlah';
        }
        if (_cekKosong($input)) {
            if (empty($data['edit'])) {
                return $this->db->insert('tbl_riwayat_tak_terduga_keluar', $input);
            }else{
                $this->db->set('uraian', $data['uraian']);
                $this->db->set('keterangan', $input['keterangan']);
                $this->db->set('jumlah', str_replace(',','',$data['jumlah']));
                $this->db->set('waktu', _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']));
                $this->db->where('id_tak_terduga_keluar', $data['edit']);
                return $this->db->update('tbl_riwayat_tak_terduga_keluar');
            }
        }
    }
    public function HapusTakTerduga($id)
    {
        $row = $this->db->get_where('tbl_riwayat_tak_terduga_keluar', ['id_tak_terduga_keluar' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_riwayat_tak_terduga_keluar', ['id_tak_terduga_keluar' => $id]);
    }

    public function bukuBaru()
    {
        $this->db->from('tbl_riwayat_tak_terduga_keluar');
        $this->db->truncate();
    }
}