<?php

class Tanah extends CI_Controller{

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
        $this->load->model('tanah_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_tanah';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/tanah/transaksi_tanah', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->tanah_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->tanah_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpantanah($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->tanah_model->simpantanah($data, $edit));
    }

    public function hapustanah()
    {
        $id = $this->input->post('id');
        echo json_encode($this->tanah_model->hapustanah($id));
    }
}