<?php

class Hibah_donasi extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('index.php/Auth/login');
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
        $this->load->model('hibah_donasi_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_hibah_donasi';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/hibah_donasi/transaksi_hibah_donasi', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->hibah_donasi_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->hibah_donasi_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanhibah_donasi($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->hibah_donasi_model->simpanhibah_donasi($data, $edit));
    }

    public function hapushibah_donasi()
    {
        $id = $this->input->post('id');
        echo json_encode($this->hibah_donasi_model->hapushibah_donasi($id));
    }
}