<?php

class Beban_simpanan_wajib_tarik extends CI_Controller{

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
        $this->load->model('beban_simpanan_wajib_tarik_model');
    }

    public function index()
    {
        
    }

    public function transaksi()
    {
        $data['anggota'] = $this->anggota_model->daftar_anggota_full();
        $data['anggota'] = $this->anggota_model->daftar_anggota_bulan_keluar(1, $data['anggota']);
        $data['page'] = 'transaksi_beban_simpanan_wajib_tarik';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/beban_simpanan_wajib_tarik/transaksi_beban_simpanan_wajib_tarik', $data);
        $this->load->view('templates/footer');
    }

    public function getCatatan()
    {
        $bulan = $this->input->post('bulan');
        $catatan = $this->beban_simpanan_wajib_tarik_model->getCatatan(intval($bulan), $this->session->userdata('tahun'));
        $akumulasi = $this->beban_simpanan_wajib_tarik_model->akumulasi($this->session->userdata('tahun'));
        echo json_encode(
            [
                'catatan' => $catatan,
                'akumulasi' => $akumulasi
            ]);
    }
    
    public function simpanbeban_simpanan_wajib_tarik($edit = null)
    {
        $data = $this->input->post();
        echo json_encode($this->beban_simpanan_wajib_tarik_model->simpanbeban_simpanan_wajib_tarik($data, $edit));
    }

    public function hapusbeban_simpanan_wajib_tarik()
    {
        $id = $this->input->post('id');
        echo json_encode($this->beban_simpanan_wajib_tarik_model->hapusbeban_simpanan_wajib_tarik($id));
    }
}