<?php 

class dcr_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        if ($bulan == 0) {
            $bulan = 12;
            $tahun = $tahun - 1;
        }
        $return = [];
        $data = $this->db->get_where('tbl_dcr',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        $bunga_simapan = $this->bunga_simapan_model->getCatatan($bulan, $tahun);

        $this->db->from('tbl_riwayat_simpanan');
        $this->db->where('jenis', 'provisi');
        $this->db->where('waktu >=', $tahun.'-'.$bulan.'-01');
        $this->db->where('waktu <=', $tahun.'-'.$bulan.'-31');

        $provisi = $this->db->get()->result_array();
        $jum_provisi = 0;
        foreach ($provisi as $p) {
            $jum_provisi+=$p['jumlah'];
        }

        $jumlah = 0;
        foreach ($bunga_simapan as $b) { 
        	if ($b['jenis'] == 0) {
        		$jumlah += floatval($b['jumlah']);
        	}else{
        		$jumlah -= floatval($b['jumlah']);
        	}
        }
        
        if ($jumlah > 0) {
            $return[] = [
                'jenis' => 0,
                'jumlah' => $jumlah,
                'keterangan' => "Bunga Simapan",
                'waktu' => 'Bulan '._getBulan($bulan)
            ];
        }
        
        if ($jum_provisi > 0) {
            $return[] = [
                'jenis' => 0,
                'jumlah' => $jum_provisi,
                'keterangan' => "Provisi",
                'waktu' => 'Bulan '._getBulan($bulan)
            ];
        }

        if ($bulan == 1) {
            $anggota = $this->anggota_model->daftar_anggota_full();
            $anggota = $this->anggota_model->daftar_anggota_bulan_masuk(12, $anggota, $_SESSION['tahun'] - 1);

            $sisa = $this->bulansaham_model->daftarBagiSHU(0, $anggota)['total_sisa'];
            $sisa = floatval(str_replace(',', '', $sisa));
            // if ($beban_simpanan_wajib_tarik['jumlah'] > 0) {
            $return[] = [
                'jenis' => 0,
                'jumlah' => $sisa,
                'keterangan' => 'Sisa Bagi SHU',
                'waktu' => 'Bulan '._getBulan($bulan)
            ];
            // }
            // $beban_simpanan_wajib_tarik = $this->beban_simpanan_wajib_tarik_model->akumulasi($tahun)[$bulan];
            // if ($beban_simpanan_wajib_tarik['jumlah'] > 0) {
            //     $return[] = [
            //         'jenis' => 0,
            //         'jumlah' => $beban_simpanan_wajib_tarik['jumlah'],
            //         'keterangan' => 'Sisa Bagi SHU',
            //         'waktu' => 'Bulan '._getBulan($bulan)
            //     ];
            // }
        }
        // else{
            // $beban_simpanan_wajib_tarik = $this->beban_simpanan_wajib_tarik_model->getCatatan($bulan, $tahun);
            // $jum = 0;
            // foreach ($beban_simpanan_wajib_tarik as $b) {
            //     $jum += floatval($b['jumlah']);
            // }
            // echo json_encode($jum);
            // die();
            // $anggota = $this->anggota_model->daftar_anggota_full();
            // $anggota = $this->anggota_model->daftar_anggota_bulan_masuk(12, $anggota, $_SESSION['tahun'] - 1);

            // $sisa = $this->bulansaham_model->daftarBagiSHU(0, $anggota)['total_sisa'];
            // $sisa = floatval(str_replace(',', '', $sisa));
            // if ($beban_simpanan_wajib_tarik['jumlah'] > 0) {
            //     $return[] = [
            //         'jenis' => 0,
            //         'jumlah' => $sisa,
            //         'keterangan' => 'Sisa Bagi SHU',
            //         'waktu' => 'Bulan '._getBulan($bulan)
            //     ];
            // }
        // }


        $beban_biaya_pengurus = $this->beban_biaya_pengurus_model->akumulasi($tahun)[$bulan];
        if ($beban_biaya_pengurus['jumlah'] > 0) {
            $return[] = [
                'jenis' => 0,
                'jumlah' => $beban_biaya_pengurus['jumlah'],
                'keterangan' => 'Sisa Beban Biaya Pengurus',
                'waktu' => 'Bulan '._getBulan($bulan)
            ];
        }
        $simapan = $this->simapan_model->getCatatan($bulan, $tahun);
        foreach ($simapan as $s) {
            if ($s['jenis'] == 0) {
                $return[] = [
                    'jenis' => 1,
                    'jumlah' => $s['jumlah'],
                    'keterangan' => 'Setor Ke Simapan',
                    'waktu' => $s['waktu']
                ];
            }
            if ($s['jenis'] == 1) {
                $return[] = [
                    'jenis' => 0,
                    'jumlah' => $s['jumlah'],
                    'keterangan' => 'Ambil Dari Simapan',
                    'waktu' => $s['waktu']
                ];
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

    public function getdcr($bulan, $tahun)
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

        // $biaya_organisasi = $this->biaya_organisasi_model->akumulasi($tahun);
        // $hasil[] = [
        // 	'jenis' => 0,
        // 	'jumlah' => $bunga_simapan,
        // 	'keterangan' => "Bunga Simapan",
        // 	'waktu' => $tahun.'-'.$bulan.'-'.'1'
        // ];
        $sisa = str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['dana_cadangan_resiko']);
        // $sisa = $sisa * 10 / 100;
        // $sisa += floatval(str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['dana_cadangan_resiko']));
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
        // foreach ($hasil as $h) {
        //     $bulan = intval(explode('-', $h['waktu'])[1]);
        //     if ($h['jenis'] == 1) {
        //         $jumlah[$bulan]['kredit'] += floatval($h['jumlah']);
        //         continue;
        //     }
        // }
        for ($i=1; $i <= count($jumlah); $i++) { 
            $jumlah[$i]['jumlah'] += ($jumlah[$i]['debit'] - $jumlah[$i]['kredit']);
            $sisa += $jumlah[$i]['jumlah'];
            $jumlah[$i]['jumlah'] = $sisa;
        }
        for ($i=1; $i <= count($jumlah); $i++) { 
        	$jumlah[$i]['debit'] = strval($jumlah[$i]['debit']);
        	$jumlah[$i]['jumlah'] = strval($jumlah[$i]['jumlah']);
        }
        return $jumlah;
    }

    public function simpandcr($data, $edit = null)
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
                'id_dcr' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_dcr', $simpan);
            }else{
                return $this->db->replace('tbl_dcr', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapusdcr($id)
    {
        $row = $this->db->get_where('tbl_dcr', ['id_dcr' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_dcr', ['id_dcr' => $id]);
    }
}