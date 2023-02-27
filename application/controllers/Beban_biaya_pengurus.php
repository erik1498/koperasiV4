<?php

class Beban_biaya_pengurus extends CI_Controller{

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
        $this->load->model('beban_biaya_pengurus_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['page'] = 'transaksi_beban_biaya_pengurus';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/beban_biaya_pengurus/transaksi_beban_biaya_pengurus', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->beban_biaya_pengurus_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->beban_biaya_pengurus_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanbeban_biaya_pengurus($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->beban_biaya_pengurus_model->simpanbeban_biaya_pengurus($data, $edit));
    }

    public function hapusbeban_biaya_pengurus()
    {
        $id = $this->input->post('id');
        echo json_encode($this->beban_biaya_pengurus_model->hapusbeban_biaya_pengurus($id));
    }
}