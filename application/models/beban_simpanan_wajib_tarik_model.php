<?php 

class beban_simpanan_wajib_tarik_model extends CI_model{
    public function getCatatan($bulan, $tahun)
    {
        $return = [];
        $data = $this->db->get_where('tbl_beban_simpanan_wajib_tarik',['waktu >='=> $tahun.'-01-01', 'waktu <=' => $tahun.'-12-31'])->result_array();
        foreach ($data as $d) {
            $waktu = explode('-', $d['waktu']);
            if ($waktu[0] == $tahun && $waktu[1] == $bulan) {
                $return[] = $d;
            }
        }
        if ($bulan == 1) {
            $anggota = $this->anggota_model->daftar_anggota_full();
            $anggota = $this->anggota_model->daftar_anggota_bulan_masuk(12, $anggota, $_SESSION['tahun'] - 1);

            $bulanSaham = $this->bulansaham_model->daftarBagiSHU(0, $anggota);
            $kredit = floatval(str_replace(',', '', $bulanSaham['total_di_terima_bulatkan']));
            $debit = floatval(str_replace(',', '', $bulanSaham['BagianJasa']));

            $bagiSHU = [
                'keterangan' => 'Bayar SHU',
                'waktu' => $_SESSION['tahun'].'-01-01',
                'jumlah' => $kredit,
                'jenis' => 1
            ];
            $return[] = $bagiSHU;

            $bagiSHU = [
                'keterangan' => 'Bayar SHU',
                'waktu' => $_SESSION['tahun'].'-01-01',
                'jumlah' => $debit,
                'jenis' => 0
            ];
            $return[] = $bagiSHU;
        }
        return $return;
    }

    public function getbeban_simpanan_wajib_tarik($bulan, $tahun)
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
        $this->db->from('tbl_beban_simpanan_wajib_tarik');
        $this->db->where('waktu >=', $tahun.'-01-01');
        $this->db->where('waktu <=', $tahun.'-12-31');
        $this->db->order_by('waktu', 'ASC');
        $hasil = $this->db->get()->result_array();
        $sisa = 0;
        // $sisa = floatval(str_replace(',', '', $sisa));
        // $sisa = $sisa * 10 / 100;
        // $sisa = 0;
        // $sisa += floatval(str_replace(',','', $this->lksb_model->getLKSB(0)['Modal']['dana_cadangan_umum']));
        $jumlah = [];
        for ($i=1; $i <= 12; $i++) { 
            $catatan = $this->getCatatan($i, $tahun);
            
            $deb = 0;
            $krt = 0;
            foreach ($catatan as $c) {
                if ($c['jenis'] == 1) {
                    $krt += floatval($c['jumlah']);
                }else{
                    $deb += floatval($c['jumlah']);
                }
            }
            $jumlah[$i]['debit'] =  $deb;
            $jumlah[$i]['kredit'] = $krt;
            $jumlah[$i]['jumlah'] = 0;
            $jumlah[$i]['bulan'] = _getBulan($i);
            // if ($i == 12) {
            //     $validasi = _cekValidasiLKSB($i, $tahun, true);
            //         if (!$validasi) {
            //             $lksb = $this->lksb_model->getLKSB($i)[$i];
            //         if (!is_null($lksb)) {
            //             $jumlah[$i]['debit'] = str_replace(',','', $lksb['Laporan_SHU']['biaya']['beban_simpanan_wajib_tarik']);
            //         }
            //     }
            // }
        }
        $sisa = 0;
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
            $jumlah[$i]['jumlah'] = number_format($jumlah[$i]['jumlah'], 2, '.', ',');
        }
        return $jumlah;
    }

    public function simpanbeban_simpanan_wajib_tarik($data, $edit = null)
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
                'id_beban_simpanan_wajib_tarik' => is_null($edit) ? '' : $data['id'],
                'waktu' => _inputWaktu($data['tahun'], $data['bulan'], $data['tanggal']),
                'jumlah' => str_replace(',','', $data['jumlah']),
                'keterangan' => $data['keterangan'],
                'jenis' => $data['jenis']
            ];
            if (is_null($edit)) {
                return $this->db->insert('tbl_beban_simpanan_wajib_tarik', $simpan);
            }else{
                return $this->db->replace('tbl_beban_simpanan_wajib_tarik', $simpan);
            }
        }else{
            return true;
        }
    }

    public function hapusbeban_simpanan_wajib_tarik($id)
    {
        $row = $this->db->get_where('tbl_beban_simpanan_wajib_tarik', ['id_beban_simpanan_wajib_tarik' => $id])->row_array();
        $validasi = _cekValidasiLKSB(explode('-', $row['waktu'])[1], explode('-', $row['waktu'])[0], true);
        if (!$validasi) {
            return [
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $row['waktu'])[1]),
                'tahun' => explode('-', $row['waktu'])[0],
            ];
            die();
        }
        return $this->db->delete('tbl_beban_simpanan_wajib_tarik', ['id_beban_simpanan_wajib_tarik' => $id]);
    }
}