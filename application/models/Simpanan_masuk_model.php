<?php 

class simpanan_masuk_model extends CI_Model{
    public function TambahSimpanan($data)
    {
        $validasi = _cekValidasiLKSB(explode('-', $data['tanggal'])[1], explode('-', $data['tanggal'])[0], true);
        if (!$validasi) {
            echo json_encode([
                'validasi' => false,
                'bulan' => _getBulan(explode('-', $data['tanggal'])[1]),
                'tahun' => explode('-', $data['tanggal'])[0],
            ]);
            die();
        }
        $id_anggota = $data['id_anggota'];
        $simpanan = array_keys($data['simpanan']);
        foreach ($simpanan as $s) {
            if (!empty($data['simpanan'][$s]) || $data['simpanan'][$s] > 0) {
                $input = [
                    'id_anggota' => $id_anggota,
                    'jenis' => $s,
                    'waktu' => date($data['tanggal']),
                    'jumlah' => str_replace(',','',$data['simpanan'][$s]),
                    'ket' => $data['ket'],
                    'tarik' => isset($data['tarik']) ? $data['tarik'] : 0
                ];
                $this->db->insert('tbl_riwayat_simpanan', $input);
            }     
        }
    }
    public function bukuBaru()
    {
        $anggota = $this->anggota_model->daftar_anggota_full();
        for ($i=0; $i < count($anggota); $i++) { 
            $anggota[$i]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$i]['id_anggota'], true);
            $wajib = $anggota[$i]['detail']['jumlah_wajib_des'];
            $sukarela = $anggota[$i]['detail']['jumlah_sukarela_des'];
            $pokok = $anggota[$i]['detail']['jumlah_pokok_des'];
            $this->db->delete('tbl_riwayat_simpanan', ['jenis' => 'simpanan_wajib', 'id_anggota' => $anggota[$i]['id_anggota']]);
            $this->db->delete('tbl_riwayat_simpanan', ['jenis' => 'simpanan_sukarela', 'id_anggota' => $anggota[$i]['id_anggota']]);
            $this->db->delete('tbl_riwayat_simpanan', ['jenis' => 'simpanan_pokok', 'id_anggota' => $anggota[$i]['id_anggota']]);
            $data = [
                'id_anggota' => $anggota[$i]['id_anggota'],
                'simpanan' => [
                    'simpanan_pokok' => $pokok,
                    'simpanan_wajib' => $wajib,
                    'simpanan_sukarela' => $sukarela,
                ],
                'tanggal' => ($_SESSION['tahun'] - 1).'-01-01',
                'ket' => ''
            ];
            $this->TambahSimpanan($data);
        }
    }
}