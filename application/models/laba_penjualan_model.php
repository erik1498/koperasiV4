<?php 

class laba_penjualan_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_laba_penjualan', ['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        $materai = $this->db->get_where('tbl_riwayat_simpanan', [
            'waktu >=' => $tahun.'-'.$bulan.'-01',
            'waktu <=' => $tahun.'-'.$bulan.'-31',
            'jenis' => 'materai',
        ])->result_array();

        $uang_buku = $this->db->get_where('tbl_riwayat_simpanan', [
            'waktu >=' => $tahun.'-'.$bulan.'-01',
            'waktu <=' => $tahun.'-'.$bulan.'-31',
            'jenis' => 'uang_buku',
        ])->result_array();

        $hasil = array_merge($materai, $uang_buku);

        $jum = 0;
        foreach ($hasil as $h) {
            $jum += $h['jumlah'];
        }
        if ($jum > 0) {
            $return[] = [
                'waktu' => 'Bulan '._getBulan($bulan),
                'jumlah' => $jum,
                'jenis' => 0,
            ];
        }
        return $return;
    }

    public function getlaba_penjualan($bulan, $tahun)
    {
        $data = $this->getCatatan($bulan, $tahun);
        $jumlah = 0;
        foreach ($data as $d) {
            $jumlah += floatval($d['jumlah']);
        }
        return $jumlah;
    }

    public function akumulasi($tahun)
    {
        $this->db->from('tbl_laba_penjualan');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        // $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Laporan_SHU']['pendapatan']['laba_penjualan_barang']);
        $sisa = 0;
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $catatan = $this->getCatatan($i, $tahun);
            $jum = 0;
            foreach ($catatan as $c) {
                if ($c['jenis'] == 0) {
                    $jum += $c['jumlah'];
                }
            }
            $jumlah[$i]['debit'] = $jum;
            $jumlah[$i]['kredit'] = 0;
            $jumlah[$i]['jumlah'] = 0;
            $jumlah[$i]['bulan'] = _getBulan($i);
        }
        foreach ($hasil as $h) {
            $bulan = intval(explode('-', $h['waktu'])[1]);
            if ($h['jenis'] == 1) {
                $jumlah[$bulan]['kredit'] += floatval($h['jumlah']);
                continue;
            }
            $jumlah[$bulan]['debit'] += floatval($h['jumlah']);
        }
        for ($i=1; $i <= count($jumlah); $i++) { 
            $jumlah[$i]['jumlah'] = $jumlah[$i]['debit'] - $jumlah[$i]['kredit'];
            $sisa += $jumlah[$i]['jumlah'];
            $jumlah[$i]['jumlah'] = $sisa;
        }
        return $jumlah;
    }

    public function simpanlaba_penjualan($data, $edit = null)
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
        if (str_replace(',','', $data['jumlah']) != "") {
            $simpan = [
                'id_laba_penjualan' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_laba_penjualan', $simpan);
            }else{
                return $this->db->replace('tbl_laba_penjualan', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapuslaba_penjualan($id)
    {
        $row = $this->db->get_where('tbl_laba_penjualan', ['id_laba_penjualan' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_laba_penjualan', ['id_laba_penjualan' => $id]);
    }
}