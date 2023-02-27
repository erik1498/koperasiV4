<?php

class dataManagement extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('login')) {
            echo json_encode("Error");
        }
        $this->load->model('simpanan_masuk_model');
        $this->load->model('pinjaman_model');
        $this->load->model('tak_terduga_masuk_model');
        $this->load->model('tak_terduga_keluar_model');
        $this->load->model('anggota_model');
        $this->load->model('sumsuk_model');
        $this->load->model('sibulan_model');
        $this->load->model('laporan_simpanan_model');
    }
    public function dataAnggota()
    {
        $data['anggota'] = $this->anggota_model->daftar_anggota();
        for ($i=0; $i < count($data['anggota']); $i++) { 
            $data['anggota'][$i]['detail'] = $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota']);
        }
        echo json_encode($data);
    }

    public function dataRekap()
    {
        $data = $this->db->query('SELECT * FROM tbl_riwayat_simpanan WHERE waktu <= "'.$this->session->userdata('tahun').'-'.$this->session->userdata('bulan').'-31"')->result_array();
        $pokok = 0;
        $wajib = 0;
        $sukarela = 0;
        foreach ($data as $d) {
            if ($d['jenis'] == 'simpanan_pokok') {
                $pokok = $d['tarik'] == 0 ? $pokok += floatval($d['jumlah']) : $pokok -= floatval($d['jumlah']);
            }
            if ($d['jenis'] == 'simpanan_wajib') {
                $wajib = $d['tarik'] == 0 ? $wajib += floatval($d['jumlah']) : $wajib -= floatval($d['jumlah']);
            }
            if ($d['jenis'] == 'simpanan_sukarela') {
                $sukarela = $d['tarik'] == 0 ? $sukarela += floatval($d['jumlah']) : $sukarela -= floatval($d['jumlah']);
            }
        }
        echo json_encode([
            $pokok, $wajib, $sukarela
        ]);
    }

    public function DataPiutangAnggota($tahunLalu = null)
    {
        $bulan = is_null($tahunLalu) ? intval($this->session->userdata('bulan')) : 12;
        $return = [];
        for ($i=1; $i <= $bulan; $i++) {
            $return[] = $this->anggota_model->daftarPiutang($i, $tahunLalu)['total'];
        }
        echo json_encode($return);
    }
    
    public function dataSibulan($tahunLalu = null)
    {
        $bulan = is_null($tahunLalu) ? intval($this->session->userdata('bulan')) : 12;
        $kredit = []; $saldo = [];
        for ($i=1; $i <= $bulan; $i++) {
            $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
            $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota);
            $data = $this->sibulan_model->daftarSibulan($i, $anggota, $tahunLalu);
            $kredit[] = floatval(str_replace(',','',$data['total_kredit_sibulan']));
            $saldo[] = floatval(str_replace(',','', $data['total_saldo_sibulan']));
        }
        // echo json_encode($bulan);
        echo json_encode([
            'kredit' => $kredit,
            'saldo' => $saldo
        ]);
    }

    public function dataSUMSUK($tahunLalu = null)
    {
        $kas = $this->db->get_where('tbl_pengaturan',['field' => 'kas_tahun_lalu'])->row_array()['value'];
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
        $bulan = is_null($tahunLalu) ? intval($this->session->userdata('bulan')) : 12;
        $kirim = [];
        $total_masuk = [];
        $total_keluar = [];

        
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= $bulan; $i++) { 
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota);
            for ($j=0; $j < count($anggota); $j++) {
                if (!is_null($tahunLalu)) {
                    $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota'], true);
                    continue;
                }
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota']);
            }
            
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                if (!is_null($tahunLalu)) {
                    $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan'], true);
                    continue;
                }
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan']);
            }

            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $this->tak_terduga_masuk_model->daftar_tak_terduga($i, $tahunLalu),
                'tak_terduga_keluar' => $this->tak_terduga_keluar_model->daftar_tak_terduga($i, $tahunLalu),
            ];
            $data = $this->sumsuk_model->getSUMSUK($inputParameter, $tahunLalu);
            $total_masuk[$i] = $data['masuk']['total'];
            $total_keluar[$i] = $data['keluar']['total'];
            $kas_tiap_bulan_value = $kas_tiap_bulan_value + (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
            $kas_tiap_bulan[$i] = number_format($kas_tiap_bulan_value,0,'.',',');
            $sumsuk[$i] = $data;
            $sumsuk[$i]['kas_bulan_ini'] = number_format((floatval($data['masuk']['total']) - floatval($data['keluar']['total'])),0,',','.');
        }
        $kirim['data'] = $sumsuk;

        $kirim['total_masuk'] = $total_masuk;
        $kirim['total_keluar'] = $total_keluar;
        $kirim['kas_tiap_bulan'] = $kas_tiap_bulan;
        $kirim['kas'] = number_format($kas,0,'.',',');
        $kirim['kas_bulan_ini'] = number_format($kas_bulan_ini,0,'.',',');
        $kirim['bulan'] = _getBulan($bulan).' '.$this->session->userdata('tahun');
        echo json_encode($kirim);
    }

}