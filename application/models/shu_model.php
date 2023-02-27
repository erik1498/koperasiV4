<?php 

class shu_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_shu',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        $shu = null;
        // if ($bulan != intval($this->session->userdata('bulan'))) {
	        if ($bulan > 1) {
	        	$lksb = $this->lksb_model->getLKSB($bulan);
	        	$shu = $lksb[$bulan]['Laporan_SHU']['SHU_Murni'] - $lksb[$bulan - 1]['Laporan_SHU']['SHU_Murni'];
	        }else{
	        	$shu = $this->lksb_model->getLKSB($bulan)[$bulan]['Laporan_SHU']['SHU_Murni'];
	        }
        // }
    	if (!is_null($shu)) {
    		$return[] = [
	    		'waktu' => 'Bulan '._getBulan($bulan),
	    		'keterangan' => 'SHU',
	    		'jumlah' => $shu,
	    		'jenis' => 0,
	    	];
    	}
        return $return;
    }

    public function getshu($bulan, $tahun)
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
        $this->db->from('tbl_shu');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        // $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Laporan_SHU']['SHU_Murni']);
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

    public function simpanshu($data, $edit = null)
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
                'id_shu' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_shu', $simpan);
            }else{
                return $this->db->replace('tbl_shu', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapusshu($id)
    {
        $row = $this->db->get_where('tbl_shu', ['id_shu' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_shu', ['id_shu' => $id]);
    }
}