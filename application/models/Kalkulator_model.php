<?php 

class kalkulator_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_kalkulator',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function getkalkulator($bulan, $tahun)
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
        $this->db->from('tbl_kalkulator');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        // $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Laporan_SHU']['biaya']['kalkulator']);
        $sisa = 0;
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $jumlah[$i]['jumlah'] = 0;
            $jumlah[$i]['bulan'] = _getBulan($i);
        }
        foreach ($hasil as $h) {
            $bulan = intval(explode('-', $h['waktu'])[1]);
            $jumlah[$bulan]['jumlah'] = floatval($h['jumlah']);
        }
        for ($i=1; $i <= count($jumlah); $i++) { 
            $sisa += $jumlah[$i]['jumlah'];
            $jumlah[$i]['total'] = $sisa;
        }
        return $jumlah;
    }

    public function simpankalkulator($data, $edit = null)
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
                'id_kalkulator' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_kalkulator', $simpan);
            }else{
                return $this->db->replace('tbl_kalkulator', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapuskalkulator($id)
    {
        $row = $this->db->get_where('tbl_kalkulator', ['id_kalkulator' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_kalkulator', ['id_kalkulator' => $id]);
    }
}