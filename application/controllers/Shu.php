<?php

class Shu extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('index.php/auth/login');
            return false;
        }
        $this->load->model('simpanan_masuk_model');
        $this->load->model('pinjaman_model');
        $this->load->model('tak_terduga_masuk_model');
        $this->load->model('tak_terduga_keluar_model');
        $this->load->model('anggota_model');
        $this->load->model('sumsuk_model');
        $this->load->model('bulansaham_model');
        $this->load->model('sibulan_model');
        $this->load->model('lksb_model');
        $this->load->model('laporan_simpanan_model');
        $this->load->library('form_validation');
        $this->load->model('sibuhari_model');
        $this->load->model('rat_model');
        $this->load->model('biaya_organisasi_model');
        $this->load->model('simapan_model');
        $this->load->model('bunga_sibuhari_model');
        $this->load->model('bunga_simapan_model');
        $this->load->model('laba_penjualan_model');
        $this->load->model('investasi_model');
        $this->load->model('investasi_simapan_model');
        $this->load->model('inventaris_model');
        $this->load->model('pendapatan_lainnya_model');
        $this->load->model('piutang_arisan_model');
        $this->load->model('piutang_konsumsi_model');
        $this->load->model('persediaan_model');
        $this->load->model('hibah_donasi_model');
        $this->load->model('sibuhari_model');
        $this->load->model('kalkulator_model');
        $this->load->model('tanah_model');
        $this->load->model('dcu_model');
        $this->load->model('dcr_model');
        $this->load->model('beban_simpanan_wajib_tarik_model');
        $this->load->model('beban_biaya_pengurus_model');
        $this->load->model('pelunasan_biaya_organisasi_model');
        $this->load->model('titipan_simpanan_model');
        $this->load->model('titipan_konsumsi_model');
        $this->load->model('titipan_arisan_model');
        $this->load->model('shu_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_shu';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/shu/transaksi_shu', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->shu_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->shu_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanshu($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->shu_model->simpanshu($data, $edit));
    }

    public function hapusshu()
    {
        $id = $this->input->post('id');
        echo json_encode($this->shu_model->hapusshu($id));
    }
}