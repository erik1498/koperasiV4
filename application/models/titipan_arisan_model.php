<?php 

class titipan_arisan_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_titipan_arisan',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        // $hasil = $this->db->get_where('tbl_riwayat_simpanan', ['waktu >= ' => $tahun.'-'.$bulan.'-01', 'waktu <=' => $tahun.'-'.$bulan.'-31', 'jenis' => 'uang_arisan'])->result_array();

        // $jum = 0;
        // foreach ($hasil as $h) {
        //     $jum += floatval($h['jumlah']);
        // }
        // $return[] = [
        //     'waktu' => 'Bulan '._getBulan($bulan),
        //     'keterangan' => 'Akumulasi Uang arisan',
        //     'jumlah' => $jum,
        //     'jenis' => 0
        // ];
        return $return;
    }

    public function gettitipan_arisan($bulan, $tahun)
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
        $this->db->from('tbl_titipan_arisan');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['titipan_arisan']);
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $catatan = $this->getCatatan($i, $tahun);
            $jum = 0;
            foreach ($catatan as $c) {
                if ($c['jenis'] == 0) {
                    $jum += floatval($c['jumlah']);
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

    public function simpantitipan_arisan($data, $edit = null)
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
                'id_titipan_arisan' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_titipan_arisan', $simpan);
            }else{
                return $this->db->replace('tbl_titipan_arisan', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapustitipan_arisan($id)
    {

        $row = $this->db->get_where('tbl_titipan_arisan', ['id_titipan_arisan' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_titipan_arisan', ['id_titipan_arisan' => $id]);
    }
}