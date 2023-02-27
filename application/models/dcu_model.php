<?php 

class dcu_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_dcu', ['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }

        if ($bulan == 1) {
            $SHU = $tahun != '2021' ? 'SHU_Murni' : 'SHU_Sebelum_Beban';
            $jumlah = $this->lksb_model->getLKSB(0)['Laporan_SHU'][$SHU] * 10 / 100;
            $return[] = [
                'jenis' => 0,
                'jumlah' => $jumlah,
                'keterangan' => 'SHU Tahun Lalu',
                'waktu' => $tahun.'-01-01'
            ];
        }

        return $return;
    }

    public function getdcu($bulan, $tahun)
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
        $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['dana_cadangan_umum']);
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) {
            $catatan = $this->getCatatan($i, $tahun);
            $jum = 0;
            $krd = 0;

            // $arr = [];
            foreach ($catatan as $c) {
                if ($c['jenis'] == 0) {
                    $jum += floatval(str_replace(',', '', $c['jumlah']));
                }if ($c['jenis'] == 1) {
                    $krd += floatval(str_replace(',', '', $c['jumlah']));
                }
            }
            // echo json_encode($catatan);
            // die();
            // $jumlah[$i]['arr'] = array_sum($arr);
            $jumlah[$i]['debit'] = $jum;
            $jumlah[$i]['kredit'] = $krd;
            $jumlah[$i]['jumlah'] = 0.0;
            $jumlah[$i]['bulan'] = _getBulan($i);
        }
        for ($i=1; $i <= count($jumlah); $i++) { 
            $jumlah[$i]['jumlah'] += $jumlah[$i]['debit'] - $jumlah[$i]['kredit'];
            $sisa += $jumlah[$i]['jumlah'];
            $jumlah[$i]['jumlah'] = $sisa;
        }
        return $jumlah;
    }

    public function simpandcu($data, $edit = null)
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
                'id_dcu' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_dcu', $simpan);
            }else{
                return $this->db->replace('tbl_dcu', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapusdcu($id)
    {
        $row = $this->db->get_where('tbl_dcu', ['id_dcu' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_dcu', ['id_dcu' => $id]);
    }
}