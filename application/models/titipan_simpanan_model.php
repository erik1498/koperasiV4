<?php 

class titipan_simpanan_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_titipan_simpanan',['waktu >=' => ($tahun - 1).'-12-31', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        return $return;
    }

    public function gettitipan_simpanan($bulan, $tahun)
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
        $this->db->from('tbl_titipan_simpanan');
        $this->db->where('waktu >=',$tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['titipan_simpanan']);
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $jumlah[$i]['debit'] = 0;
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

    public function simpantitipan_simpanan($data, $edit = null)
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
                'id_titipan_simpanan' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_titipan_simpanan', $simpan);
            }else{
                return $this->db->replace('tbl_titipan_simpanan', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapustitipan_simpanan($id)
    {
        $row = $this->db->get_where('tbl_titipan_simpanan', ['id_titipan_simpanan' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_titipan_simpanan', ['id_titipan_simpanan' => $id]);
    }
}