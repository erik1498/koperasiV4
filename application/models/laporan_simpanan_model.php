<?php 

class laporan_simpanan_model extends CI_model{
    public function getRekap() {
        $anggota = $this->db->get('tbl_anggota')->result_array();
        for ($i=0; $i < count($anggota); $i++) { 
            $riwayat = $this->db->get_where('tbl_riwayat_simpanan', ['id_anggota' => 1])->result_array();
            $anggota['detail'] = $this->getDetail($riwayat, 'simpanan_pokok');
        }
    }

    public function getDetail($riwayat, $jenis)
    {
        $array_jenis = [];
        foreach ($riwayat as $r) {
            if ($r['jenis'] == $jenis) {
                $array_jenis[] = $r;
            }
        }
        return $array_jenis;
    }
}