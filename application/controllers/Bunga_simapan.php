<?php

class Bunga_simapan extends CI_Controller{

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
        $this->load->model('bunga_simapan_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_bunga_simapan';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/bunga_simapan/transaksi_bunga_simapan', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->bunga_simapan_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->bunga_simapan_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanbunga_simapan($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->bunga_simapan_model->simpanbunga_simapan($data, $edit));
    }

    public function hapusbunga_simapan()
    {
        $id = $this->input->post('id');
        echo json_encode($this->bunga_simapan_model->hapusbunga_simapan($id));
    }
}