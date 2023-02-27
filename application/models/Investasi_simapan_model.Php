<?php 

class investasi_simapan_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_investasi_simapan',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }

        $simapan = $this->simapan_model->getCatatan($bulan, $tahun);
        foreach ($simapan as $s) {
            if ($s['jenis'] == 0) {
                $return[] = [
                    'jenis' => 0,
                    'jumlah' => $s['jumlah'],
                    'keterangan' => 'Setor Ke Simapan',
                    'waktu' => $s['waktu']
                ];
            }
            if ($s['jenis'] == 1) {
                $return[] = [
                    'jenis' => 1,
                    'jumlah' => $s['jumlah'],
                    'keterangan' => 'Ambil Dari Simapan',
                    'waktu' => $s['waktu']
                ];
            }
        }

        return $return;
    }

    public function getinvestasi_simapan($bulan, $tahun)
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
        $this->db->from('tbl_investasi_simapan');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        $simapan = $this->simapan_model->akumulasi($tahun);
        $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Pasiva']['investasi_simapan']);
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $jumlah[$i]['debit'] = $simapan[$i]['debit'];
            $jumlah[$i]['kredit'] = $simapan[$i]['kredit'];
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

    public function simpaninvestasi_simapan($data, $edit = null)
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
                'id_investasi_simapan' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_investasi_simapan', $simpan);
            }else{
                return $this->db->replace('tbl_investasi_simapan', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapusinvestasi_simapan($id)
    {
        $row = $this->db->get_where('tbl_investasi_simapan', ['id_investasi_simapan' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_investasi_simapan', ['id_investasi_simapan' => $id]);
    }
}