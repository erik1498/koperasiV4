<?php

class rat extends CI_Controller{

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
        $this->load->model('rat_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_rat';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/rat/transaksi_rat', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->rat_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->rat_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanrat($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->rat_model->simpanrat($data, $edit));
    }

    public function hapusrat()
    {
        $id = $this->input->post('id');
        echo json_encode($this->rat_model->hapusrat($id));
    }
}