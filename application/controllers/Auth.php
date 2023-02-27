<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->load->view('Auth/login');
    }
    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('tanggal_buku_baru_sibulan');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_admin');
        redirect('index.php/Auth/login');
    }
    public function loginsubmit()
    {
        $data = $this->input->post();
        $cek = $this->db->get_where('tbl_admin',['password' => md5($data['password'])])->row_array();
        if ($cek) {
            $this->session->set_userdata($cek);
            $pengaturan = $this->db->get('tbl_pengaturan')->result_array();
            $session = [];
            foreach ($pengaturan as $p) {
                $session[$p['field']] = $p['value'];
            }
            $session['login'] = true;
            $session['tahun'] = date('Y');
            $session['bulan'] = date('m');
            $session['hari'] = date('d');
            $this->session->set_userdata($session);
            redirect('index.php/admin');
        }
        else{
            $this->session->set_flashdata('input_anggota_message','<div class="badge badge-warning" role="alert">Password Salah</div>');
            redirect('index.php/Auth/login');
        }
    }
}