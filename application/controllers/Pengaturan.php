<?php

class Pengaturan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('Auth/login');
            return false;
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
    public function index()
    {
        $data['page'] = 'pengaturan';
        $data['bunga'] = $this->db->get('tbl_bunga')->result_array();
        $this->load->view('templates/header');
        $this->load->view('ADMIN/pengaturan', $data);
        $this->load->view('templates/footer');
    }


    public function setDateSession()
    {
        $tahunMasuk = $this->input->post('tahun');
        if (intval($tahunMasuk) < intval(date('Y'))) {
            $session['hari'] = '31';
            $session['bulan'] = '12';
            $session['tahun'] = $tahunMasuk;
        }else{
            $session['hari'] = date('d');
            $session['bulan'] = date('m');
            $session['tahun'] = date('Y');
        }
        $this->session->set_userdata($session);
        echo json_encode($session);

        // $data['tanggal'] = intval($data['tanggal']);
        // $data['bulan'] = intval($data['bulan']);
        // $kosong = false;
        // foreach ($data as $d) {
        //     if (empty($d) || intval($d) < 1) {
        //         $kosong = true;
        //     }
        // }
        // if ($kosong == false) {
        //     $data['tanggal'] = $data['tanggal'] > 9 ? $data['tanggal'] : '0'.$data['tanggal'];
        //     $data['bulan'] = $data['bulan'] > 9 ? $data['bulan'] : '0'.$data['bulan']; 
            
        //     $session['hari'] = $data['tanggal'];
        //     $session['bulan'] = $data['bulan'];
        //     $session['tahun'] = $data['tahun'];

        //     $dateSetting = date($session['tahun'].'-'.$session['bulan'].'-'.$session['hari']);
        //     if (date($dateSetting) > date('Y-m-d')) {
        //         $session['hari'] = date('d');
        //         $session['bulan'] = date('m');
        //         $session['tahun'] = date('Y');
        //     }
        //     $this->session->set_userdata($session);
        //     echo json_encode($session);
        // }
    }

    public function bungaSibulan()
    {
        $this->db->set('bunga', $this->input->post('value'));
        $this->db->where('id_bunga', $this->input->post('id'));
        $this->db->update('tbl_bunga');
        echo json_encode(true);
    }
    public function bukuBaru()
    {
        $this->load->view('templates/header2');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/dashboardfooter2');
    }

    public function aturBukuBaru()
    {
        $data = $this->dataSUMSUK(12, true);
        $prop = [
            'field' => 'tanggal_buku_baru',
            'value' => ($this->session->userdata('tahun') + 1).'-01-01'
        ];
        
        $this->db->replace('tbl_pengaturan', $prop);
        
        $prop = [
            'field' => 'kas_tahun_lalu',
            'value' => str_replace(',','',$data['kas_tiap_bulan'][12])
        ];

        $this->db->replace('tbl_pengaturan', $prop);

        $this->sibulan_model->bukuBaru();
        $this->simpanan_masuk_model->bukuBaru();
        $this->tak_terduga_masuk_model->bukuBaru();
        $this->tak_terduga_keluar_model->bukuBaru();
        $this->load->view('Alert/buku_sibulan');
    }

    
    public function bulan_saham()
    {
        $data['page'] = 'daftar_bulansaham';
        $this->load->view('templates/header2');
        $this->load->view('PENGATURAN/daftar_bulansaham', $data);
        $this->load->view('templates/footer2');
    }

    public function daftar_bagiSHU()
    {
        $data['page'] = 'daftar_bagiSHU';
        $this->load->view('templates/header');
        $this->load->view('PENGATURAN/daftar_bagiSHU', $data);
        $this->load->view('templates/footer');
    }
    
    public function DataBulanSahamAnggota()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota);
        $data = $this->bulansaham_model->daftarBulanSaham($bulan, $anggota);
        echo json_encode($data);
    }
    
    public function DataBagiSHUAnggota()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota);
        $data = $this->bulansaham_model->daftarBagiSHU($bulan, $anggota);
        echo json_encode($data);
    }


    public function laporan_simpanan($halaman, $type = null)
    {
        $data['page'] = 'laporan_simpanan';
        $this->load->view('templates/header2');
        
        $data['anggota'] = $this->anggota_model->daftar_anggota();
        for ($i=0; $i < count($data['anggota']); $i++) { 
            $data['anggota'][$i]['detail'] = $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], true);
        }
        if (is_null($type)) {
            if ($halaman == 'rekap') {
                $data['judul'] = 'Rekap Simpanan Anggota Koperasi';
                $data['jenis'] = ['pokok', 'wajib', 'sukarela'];
                $this->load->view('PENGATURAN/laporan/laporan_'.$halaman, $data);
            }
            else{
                $data['jenis'] = $halaman;
                $data['judul'] = strtoupper($halaman);
                $this->load->view('PENGATURAN/laporan/laporan_simpanan', $data);
            }
        }
        else{
            if ($halaman == 'rekap') {
                $this->load->view('PENGATURAN/laporan/laporan_'.$halaman.'_view', $data);
            }
            else{
                $this->load->view('PENGATURAN/laporan/laporan_simpanan_view', $data);
            }
        }
        $this->load->view('templates/footer2');
    }

    public function laporan_sumsuk()
    {
        $data['page'] = 'laporan_sumsuk';
        $this->load->view('templates/header2');
        $this->load->view('PENGATURAN/sumsuk',$data);
        $this->load->view('templates/footer2');
    }

    public function dataSUMSUK($bulan = null, $return = null)
    {
        $bulan = is_null($bulan) ? intval($this->input->post('bulan')) : $bulan;
        $kas = $this->db->get_where('tbl_pengaturan',['field' => 'kas_tahun_lalu'])->row_array()['value'];
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
        
        $kirim = [];
        $total_masuk = [];
        $total_keluar = [];

        
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= $bulan; $i++) { 
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota);
            for ($j=0; $j < count($anggota); $j++) { 
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota'], true);
            }
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan'], true);
            }

            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $this->tak_terduga_masuk_model->daftar_tak_terduga($i, true),
                'tak_terduga_keluar' => $this->tak_terduga_keluar_model->daftar_tak_terduga($i, true),
            ];

        
            $data = $this->sumsuk_model->getSUMSUK($inputParameter, true);
            

            $total_masuk[$i] = $data['masuk']['total'];
            $total_keluar[$i] = $data['keluar']['total'];
            $kas_tiap_bulan_value += (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
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
        $kirim['bulan'] = _getBulan($this->input->post('bulan')).' '.($this->session->userdata('tahun') - 1);
        if (!is_null($return)) {
            return $kirim;
        }
        else{
            echo json_encode($kirim);
        }
    }

    public function daftar_piutang_anggota()
    {
        $data['page'] = 'daftar_piutang';
        $this->load->view('templates/header2');
        $this->load->view('PENGATURAN/daftar_piutang_anggota', $data);
        $this->load->view('templates/footer2');
    }

    public function DataPiutangAnggota()
    {
        $bulan = $this->input->post('bulan');
        $data = $this->anggota_model->daftarPiutang($bulan, true);
        echo json_encode($data);
    }

    public function DataAnggota()
    {
        $data = $this->anggota_model->getDetailAnggota($this->input->post('id_anggota'), true);
        echo json_encode($data);
    }

    public function daftar_sibulan()
    {
        $data['page'] = 'daftar_sibulan';
        $this->load->view('templates/header2');
        $this->load->view('PENGATURAN/daftar_sibulan', $data);
        $this->load->view('templates/footer2');
    }

    public function DataAnggotaSibulan()
    {
        $data = $this->sibulan_model->getDetailAnggotaSibulan($this->input->post('id_anggota'), true);
        echo json_encode($data);
    }

    public function DataSibulanAnggota()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($bulan, $anggota);
        $data = $this->sibulan_model->daftarSibulan($bulan, $anggota, true);
        echo json_encode($data);
    }
}