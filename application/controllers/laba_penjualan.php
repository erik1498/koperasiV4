<?php

class laba_penjualan extends CI_Controller{

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
        $this->load->model('laba_penjualan_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_laba_penjualan';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/laba_penjualan/transaksi_laba_penjualan', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->laba_penjualan_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->laba_penjualan_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanlaba_penjualan($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->laba_penjualan_model->simpanlaba_penjualan($data, $edit));
    }

    public function hapuslaba_penjualan()
    {
        $id = $this->input->post('id');
        echo json_encode($this->laba_penjualan_model->hapuslaba_penjualan($id));
    }
}