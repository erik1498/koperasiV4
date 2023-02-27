<?php 

class pinjaman_model extends CI_Model{
    public function TambahPinjaman($data)
    {
        $validasi = _cekValidasiLKSB($data['bulan'], $data['tahun'], true);
        if (!$validasi) {
            echo json_encode([
                'validasi' => false,
                'bulan' => _getBulan($data['bulan']),
                'tahun' => $data['tahun'],
            ]);
            die();
        }
        $id_anggota = $data['id_anggota'];
        $lama_pinjaman = $data['lama_pinjaman'];
        $tanggal = $data['tanggal'];
        $bulan = $data['bulan'];
        $tahun = $data['tahun'];
        $pinjaman = array_keys($data['pinjaman']);
        $ket = $data['ket'];
        foreach ($pinjaman as $s) {
            if (!empty($data['pinjaman'][$s]) || $data['pinjaman'][$s] > 0) {
                $input = [
                    'id_anggota' => $id_anggota,
                    'jenis' => $s,
                    'ket' => $ket,
                    'waktu' => _inputWaktu($tahun, $bulan, $tanggal),
                    'lama_pinjaman' => $lama_pinjaman,
                    'jatuh_tempo' => _jatuhTempo($lama_pinjaman, true, _inputWaktu($tahun, $bulan, $tanggal)),
                    'jumlah' => str_replace(',','',$data['pinjaman'][$s])
                ];
                $this->db->insert('tbl_riwayat_pinjaman', $input);
            }
        }
        return true;
    }
}