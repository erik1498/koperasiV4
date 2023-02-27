<?php

class admin extends CI_Controller{

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

    public function cekvalidasiBulanSaham()
    {
        $tahun = $this->input->post('tahun');
        if ($tahun != $this->session->userdata('tahun')) {
            echo json_encode(null);
        }
        echo json_encode(file_exists(FCPATH.'assets/bulansaham_json/'.$tahun.'.json'));
    }

    public function validasiBulanSaham()
    {
        if ($this->input->post('batal') == true) {
            echo json_encode(unlink(FCPATH.'assets/bulansaham_json/'.$this->session->userdata('tahun').'.json'));
            die();
        }
        $bulan = 12;
        $tahun = $this->session->userdata('tahun');
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_masuk($bulan, $anggota, $tahun);
        $data = $this->bulansaham_model->daftarBagiSHU($bulan, $anggota);
        $json = json_encode($data);
        file_put_contents(FCPATH.'assets/bulansaham_json/'.$this->session->userdata('tahun').'.json', $json);
        echo json_encode(true);
    }

    public function bukuBesar()
    {
        $data['page'] = 'bukuBesar';
        $this->load->view('templates/header', $data);
        $this->load->view('ADMIN/bukuBesar/detail_bukuBesar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function index()
    {
        // if (intval($this->session->userdata('bulan')) > 5 && $this->session->userdata('tahun') > 2021) {
        //     removeAll();
        // }
        $this->load->view('templates/header');
        $this->load->view('ADMIN/dashboard');
        $this->load->view('templates/dashboardfooter');
    }

    public function cekNoBuku()
    {
        $data = $this->anggota_model->no_buku($this->input->post('no_buku'));
        echo json_encode($data);
    }
    
    public function transaksi_simpanan(){
        $data['anggota'] = $this->anggota_model->daftar_anggota();
        $data['bulan'] = _listBulan();
        $data['page'] = 'transaksi_anggota';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/transaksi_simpanan', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_anggota_koperasi(){

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('simpanan_pokok','Simpanan Pokok','required');
        $this->form_validation->set_rules('uang_pangkal','Uang Pangkal','required');
        $this->form_validation->set_rules('administrasi_pelayanan','Administrasi Pelayanan','required');
        $this->form_validation->set_rules('tanggungan','Tanggungan','required');
        if ($this->form_validation->run() == true) {
            if (!empty($this->input->post('edit'))) {
                $this->anggota_model->editAnggota($this->input->post());
            }
            else{
                $this->anggota_model->tambahAnggota($this->input->post());
            }
        }
        $data['page'] = 'daftar_anggota';
        $data['anggota'] = $this->anggota_model->daftar_anggota();
        $data['no_buku'] = $data['anggota'][count($data['anggota']) - 1]['no_buku'] + 1;
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_anggota_sibulan(){
        $this->form_validation->set_rules('nama','Nama','required');
        if ($this->form_validation->run() == true) {
            if (!empty($this->input->post('edit'))) {
                $this->anggota_model->editAnggotaSiBulan($this->input->post());
            }
            else{
                $this->anggota_model->tambahAnggotaSiBulan($this->input->post());
            }
        }
        $data['page'] = 'daftar_anggota';
        $data['anggota'] = $this->anggota_model->daftar_anggota_sibulan();
        $data['anggota_koperasi'] = $this->anggota_model->daftar_anggota_koperasi_sibulan($this->anggota_model->daftar_anggota(), $data['anggota']);
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_anggota_sibulan', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_jatuh_tempo(){
        $data['page'] = 'daftar_jatuh_tempo';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_jatuh_tempo');
        $this->load->view('templates/footer', $data);
    }

    public function daftarLalai($id = null)
    {
        $data = $this->input->post();
        $validasi = _cekValidasiLKSB($data['bulan'], $data['tahun'], true);
        if (!$validasi) {
            echo json_encode([
                'validasi' => false,
                'bulan' => _getBulan($data['bulan']),
                'tahun' => $data['tahun'],
            ]);
            die();
        }
        else{
            if (is_null($id)) {
                $simpan = [
                    'id_anggota' => $data['id'],
                    'bulan' => $data['bulan'],
                    'tahun' => $data['tahun'],
                ];
                $this->db->insert('tbl_lalai', $simpan);
                echo json_encode($data);
            }else{
                echo json_encode($this->db->delete('tbl_lalai', ['id_lalai' => $id]));
            }
        }
    }

    public function getDaftarJatuhTempo($tahunLalu = null)
    {
        $tahun = is_null($tahunLalu) ? $this->session->userdata('tahun') : $this->session->userdata('tahun') - 1;
        $bulan = intval($this->input->post('bulan'));
        $anggota = $this->anggota_model->daftar_anggota();
        $anggota_valid = [];
        $lalai = $this->db->get_where('tbl_lalai')->result_array();

        for ($i=0; $i < count($anggota); $i++) { 
            $detail = $this->anggota_model->getDetailAnggota($anggota[$i]['id_anggota']);
            if (count($detail['riwayat_pinjaman']) > 0) {
                $data = $detail['detail_pinjaman'];
                $data['angsuran']['sisa'] = 0;
                $riwayat = $detail['riwayat_pinjaman'];
                foreach ($riwayat as $r) {
                    if (_getBulanAngka(explode(' ', $r['waktu'])[1]) <= $bulan || intval(explode(' ', $r['waktu'])[2]) < $tahun) {
                        $data['angsuran'] = $r;
                    }
                }
                // $jtempo = explode(' ', $data['jatuh_tempo']);
                // if ($jtempo[2] < $tahun || (_getBulanAngka($jtempo[1]) <= $bulan && $jtempo[2] <= $tahun)) {
                    $anggota[$i]['pinjaman'] = $data;
                    if (floatval($data['angsuran']['sisa']) > 0) {
                        $anggota[$i]['tahun'] = $tahun;
                        $anggota[$i]['lalai'] = _cekLalai($anggota[$i], $lalai, $bulan, $tahun);
                        $anggota_valid[] = $anggota[$i];
                    }
                // }
            }
        }
        echo json_encode($anggota_valid);
    }

    public function transaksi_sibulan(){

        $data['anggota'] = $this->anggota_model->daftar_anggota_sibulan();
        $data['anggota_koperasi'] = $this->anggota_model->daftar_anggota_koperasi_sibulan($this->anggota_model->daftar_anggota(), $data['anggota']);
        $data['bulan'] = _listBulan();
        $data['page'] = 'sibulan';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/transaksi_sibulan', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_piutang_anggota()
    {
        $data['page'] = 'daftar_piutang';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_piutang_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_sibulan()
    {
        $data['page'] = 'daftar_sibulan';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_sibulan', $data);
        $this->load->view('templates/footer');
    }

    public function bulan_saham()
    {
        $data['page'] = 'daftar_bulansaham';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_bulansaham', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_bagiSHU()
    {
        $data['page'] = 'daftar_bagiSHU';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/daftar_bagiSHU', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_lksb()
    {
        $data['page'] = 'daftar_lksb';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/lksb', $data);
        $this->load->view('templates/footer');
    }
    

    public function TambahSimpanan()
    {
        $data = $this->input->post();
        $data['ket'] = empty($data['ket']) ? '' : $data['ket'];
        $this->simpanan_masuk_model->TambahSimpanan($data);
        echo json_encode(true);
    }

    public function anggota_keluar()
    {
        $detail = $this->anggota_model->getDetailAnggota($this->input->post('id_anggota'));
        $data_anggota = $this->anggota_model->getAnggotaData($this->input->post('id_anggota'));
        $tanggal = _inputWaktu($this->input->post('tahun_keluar'), $this->input->post('bulan_keluar'), $this->input->post('tanggal_keluar'));

        _cekValidasiLKSB($this->input->post('bulan_keluar'), $this->input->post('tahun_keluar'));

        $simpanan = [
            'id_anggota' => $this->input->post('id_anggota'),
            'simpanan' => [
                'simpanan_pokok' => $detail['jumlah_pokok_des'],
                'simpanan_wajib' => $detail['jumlah_wajib_des'],
                'simpanan_sukarela' => $detail['jumlah_sukarela_des'],
            ],
            'ket' => 'Keluar',
            'tarik' => 1,
            'tanggal' => $tanggal
        ];
        $transaksiMasuk = [
            'keterangan' => 'ADM Anggota Keluar '.$data_anggota['nama_anggota'],
            'jumlah' => 250000,
            'jenis' => 0,
            'tahun' => $this->input->post('tahun_keluar'),
            'bulan' => $this->input->post('bulan_keluar'),
            'tanggal' => $this->input->post('tanggal_keluar')
        ];
        $sisa_pinjaman = $detail['riwayat_pinjaman'][count($detail['riwayat_pinjaman']) - 1]['sisa'];
        if ($sisa_pinjaman > 0) {
            $pinjaman_setor = [
                'id_anggota' => $this->input->post('id_anggota'),
                'simpanan' => [
                    'piutang_anggota' => $sisa_pinjaman,
                ],
                'ket' => 'Keluar',
                'tarik' => 0,
                'tanggal' => $tanggal
            ];
            $this->simpanan_masuk_model->TambahSimpanan($pinjaman_setor);
        }
        $this->pendapatan_lainnya_model->simpanpendapatan_lainnya($transaksiMasuk);
        $this->simpanan_masuk_model->TambahSimpanan($simpanan);
        $this->anggota_model->editAnggotaKeluar($this->input->post('id_anggota'), $tanggal);
        $data['nama_anggota'] = $data_anggota['nama_anggota'];
        $data['page'] = 'daftar_anggota_koperasi';
        $this->load->view('Alert/hapus_anggota', $data);
    }

    public function anggota_keluar_sibulan()
    {
        $detail = $this->sibulan_model->getDetailAnggotaSibulan($this->input->post('id_anggota'));
        $waktu = _inputWaktu($this->input->post('tahun_keluar'),$this->input->post('bulan_keluar'),$this->input->post('tanggal_keluar'));

        _cekValidasiLKSB($this->input->post('bulan_keluar'), $this->input->post('tahun_keluar'));

        $selisihBunga = $detail['bunga_tiap_bulan_float'][$this->input->post('bulan_keluar') - 1] - floatval(str_replace(',', '', $detail['bunga_tiap_bulan'][$this->input->post('bulan_keluar') - 1]));
        $selisihSaldo = ($detail['saldo_tiap_bulan_bulatkan'][$this->input->post('bulan_keluar') - 1] - $detail['saldo_tiap_bulan'][$this->input->post('bulan_keluar') - 1]);

        $selisihSaldo *= $selisihSaldo < 0 ? -1 : 1;
        $selisihBunga *= $selisihBunga < 0 ? -1 : 1;
        
        $kreditValue = $detail['saldo_tiap_bulan_bulatkan'][$this->input->post('bulan_keluar') - 1];

        $kredit = [
            'id_anggota' => $this->input->post('id_anggota'),
            'jenis' => 'kredit',
            'nilai' => $kreditValue,
            'pilihan' => 1,
            'tanggal' => $this->input->post('tanggal_keluar'),
            'bulan' => $this->input->post('bulan_keluar'),
            'tahun' => $this->input->post('tahun_keluar'),
        ];

        $dcr_masuk = [
            'keterangan' => 'Selisih Dana Sibulan '.$this->input->post('nama_anggota'),
            'tanggal' => $this->input->post('tanggal_keluar'),
            'bulan' => $this->input->post('bulan_keluar'),
            'tahun' => $this->input->post('tahun_keluar'),
            'jumlah' => $kredit['nilai'] - floatval(str_replace(',', '', $this->input->post('diterima'))),
            'jenis' => 0
        ];

        // $tak_terduga_masuk = [
        //     'uraian' => 'Selisih Dana Sibulan '.$this->input->post('nama_anggota'),
        //     'tanggal' => $this->input->post('tanggal_keluar'),
        //     'bulan' => $this->input->post('bulan_keluar'),
        //     'tahun' => $this->input->post('tahun_keluar'),
        //     'jumlah' => $kredit['nilai'] - floatval(str_replace(',', '', $this->input->post('diterima')))
        // ];

        $this->anggota_model->editAnggotaKeluarSibulan($this->input->post('id_anggota'), $waktu);
        // $this->tak_terduga_masuk_model->TambahTakTerduga($tak_terduga_masuk);
        $this->dcr_model->simpandcr($dcr_masuk);
        $this->sibulan_model->TambahSibulan($kredit);
        $data['nama_anggota'] = $this->input->post('nama_anggota');
        $data['page'] = 'daftar_anggota_sibulan';
        $this->load->view('Alert/hapus_anggota',$data);
    }

    public function TambahPinjaman()
    {
        $data = $this->input->post();
        $data = $this->pinjaman_model->TambahPinjaman($data);
        echo json_encode($data);
    }

    public function TambahSibulan()
    {
        $data = $this->input->post();
        $this->sibulan_model->TambahSibulan($data);
        echo json_encode(true);
    }

    public function dataSUMSUK($bulan = null)
    {
        $bulan = is_null($bulan) ? $this->input->post('bulan') : $bulan;
        // $bulan = 2;
        $kas = str_replace(',','', $this->lksb_model->getLKSB(0)['Neraca']['Aktiva_lancar_1']['kas']);
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
        
        $kirim = [];
        $total_masuk = [];
        $total_keluar = [];
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota_full = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= intval($bulan); $i++) { 
            // echo('<br>'.$i);
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota_full, null, null, true);
            for ($j=0; $j < count($anggota); $j++) { 
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota']);
            }            
            // echo('<br>Berhasil Detail Anggota');
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan']);
            }
            // echo('<br>Berhasil Detail Anggota Sibulan');
            
            // Ke Tak Teduga Masuk
            $tak_terduga_masuk = $this->tak_terduga_masuk_model->daftar_tak_terduga($i);
            // echo('<br>Berhasil Tak Terduga Masuk');
            
            // Ke Tak Terduga Keluar
            $tak_terduga_keluar = $this->tak_terduga_keluar_model->daftar_tak_terduga($i);
            // echo('<br>Berhasil Tak Terduga Keluar');
            
            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $tak_terduga_masuk,
                'tak_terduga_keluar' => $tak_terduga_keluar,
            ];
            $data = $this->sumsuk_model->getSUMSUK($inputParameter);
            // echo('<br>Berhasil getSumsuk');
            $sumsuk[$i] = $data;
            $total_masuk[$i] = $data['masuk']['total'];
            $total_keluar[$i] = $data['keluar']['total'];
            $kas_tiap_bulan_value = $kas_tiap_bulan_value + (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
            $kas_tiap_bulan[$i] = number_format($kas_tiap_bulan_value,0,'.',',');
            $sumsuk[$i]['kas_bulan_ini'] = number_format((floatval($data['masuk']['total']) - floatval($data['keluar']['total'])),0,',','.');
        }
        $kirim['data'] = $sumsuk;
        $kirim['total_masuk'] = $total_masuk;
        $kirim['total_keluar'] = $total_keluar;
        $kirim['kas_tiap_bulan'] = $kas_tiap_bulan;
        $kirim['kas'] = number_format($kas,0,'.',',');
        $kirim['kas_bulan_ini'] = number_format($kas_bulan_ini,0,'.',',');
        $kirim['bulan'] = _getBulan($bulan).' '.$this->session->userdata('tahun');
        echo json_encode($kirim);
    }

    public function TambahTakTerduga()
    {
        $data = $this->input->post('dataInput');
        if ($data['jenis'] == 'masuk') {
            echo json_encode($this->tak_terduga_masuk_model->TambahTakTerduga($data));
        }
        if ($data['jenis'] == 'keluar') {
            echo json_encode($this->tak_terduga_keluar_model->TambahTakTerduga($data));
        }
    }

    public function HapusTakTerduga()
    {
        $data = $this->input->post();
        if ($data['jenis'] == 'masuk') {
            echo json_encode($this->tak_terduga_masuk_model->HapusTakTerduga($data['id']));
        }
        if ($data['jenis'] == 'keluar') {
            ;
            echo json_encode($this->tak_terduga_keluar_model->HapusTakTerduga($data['id']));
        }
    }

    public function DataAnggota()
    {
        $data = $this->anggota_model->getDetailAnggota($this->input->post('id_anggota'));
        echo json_encode($data);
    }

    public function editRiwayat()
    {
        $this->anggota_model->editRiwayat($this->input->post());
        echo json_encode(true);
    }
    
    public function hapusRiwayat()
    {
        $this->anggota_model->hapusRiwayat($this->input->post());
        echo json_encode(true);
    }

    public function DataSibulanAnggota()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($bulan, $anggota);
        $data = $this->sibulan_model->daftarSibulan($bulan, $anggota);
        echo json_encode($data);
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
        $tahun = $this->session->userdata('tahun');
        if ($bulan == 0) {
            $bulan = 12;
            $tahun--;
        }
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_masuk($bulan, $anggota, $tahun);
        // $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota, true, $tahun);
        $data = $this->bulansaham_model->daftarBagiSHU($this->input->post('bulan'), $anggota);
        echo json_encode($data);
    }

    public function DataLKSB()
    {
        $bulan = $this->input->post('bulan');
        $data = $this->lksb_model->getLKSB($bulan);
        echo json_encode($data);
    }

    public function validasiLKSB()
    {
        $data = $this->input->post();
        $result = $this->lksb_model->validasi($data);
        echo json_encode($result);
    }

    public function DataPiutangAnggota()
    {
        $bulan = $this->input->post('bulan');
        $data = $this->anggota_model->daftarPiutang($bulan);
        echo json_encode($data);
    }

    public function DataAnggotaSibulan()
    {
        $data = $this->sibulan_model->getDetailAnggotaSibulan($this->input->post('id_anggota'));
        echo json_encode($data);
    }

    public function DataAnggotaBulanSaham()
    {
        $data = $this->bulansaham_model->getDetailAnggotaBulanSaham($this->input->post('id_anggota'), null, true);
        echo json_encode($data);
    }

    public function EditSibulan()
    {
        $data = $this->input->post();
        $this->sibulan_model->editSibulan($data);
        echo json_encode(true);
    }

    public function HapusSibulan()
    {
        $data = $this->input->post();
        $this->sibulan_model->hapusSibulan($data);
        echo json_encode(true);
    }

    public function CetakBuku()
    {
        $this->simpanan_masuk_model->CetakBuku($this->input->post());
        echo json_encode(true);
    }

    public function laporan_sumsuk()
    {
        $data['page'] = 'laporan_sumsuk';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/sumsuk',$data);
        $this->load->view('templates/footer');
    }

    public function DataTakTerduga()
    {
        $data['masuk'] = $this->tak_terduga_masuk_model->daftar_tak_terduga($this->input->post('bulan'));
        $data['keluar'] = $this->tak_terduga_keluar_model->daftar_tak_terduga($this->input->post('bulan'));
        echo json_encode($data);
    }

    public function TambahAnggota()
    {
        $this->anggota_model->tambahAnggota($this->input->post());
        redirect('index.php/admin/transaksi_anggota');
    }

    public function TambahAnggotaSiBulan()
    {
        $this->anggota_model->tambahAnggotaSiBulan($this->input->post());
        redirect('index.php/admin/sibulan');
    }

    public function hitungJatuhTempo()
    {
        $lama_pinjaman = $this->input->post('lama_pinjaman');
        $waktu = _inputWaktu($this->input->post('tahun'), $this->input->post('bulan'), $this->input->post('tanggal'));
        $data = [
            'jatuhTempoHitung' => _jatuhTempoHitung($waktu, $lama_pinjaman),
            'waktu' => _cetakWaktu($waktu)
        ];
        echo json_encode($data);
    }

    public function transaksi_tak_terduga()
    {
        $data['page'] = 'transaksi_tak_terduga';
        $this->load->view('templates/header');
        $this->load->view('ADMIN/transaksi_tak_terduga', $data);
        $this->load->view('templates/footer');
    }

    
    // public function laporan_simpanan($halaman, $type = null)
    public function laporan_simpanan($halaman, $bulan = null)
    {
        $bulan = is_null($bulan) ? $this->session->userdata('bulan') : $bulan;
        $data['page'] = 'laporan_simpanan';
        $this->load->view('templates/header');
        
        $anggota = $this->anggota_model->daftar_anggota_full();
        if ($halaman != 'dana_kematian' && $halaman != 'uang_konsumsi') {
            $data['anggota'] = $this->anggota_model->daftar_anggota_bulan_keluar(intval($bulan), $anggota);
        }else{
            $data['anggota'] = $this->anggota_model->daftar_anggota_bulan_masuk(intval($bulan), $anggota, $this->session->userdata('tahun')); 
        }
        $data['bulan_lihat'] = $bulan;
        for ($i=0; $i < count($data['anggota']); $i++) {
            // $data['anggota'][$i]['detail'] = $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], null, $data['anggota'][$i]['tgl_daftar']);
            $data['anggota'][$i]['detail'] = $this->anggota_model->filterRekap($bulan, $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], null));
            // if ($data['anggota'][$i]['nama_anggota'] == 'Firmus Salem') {
            //     var_dump($data['anggota'][$i]['detail']);
            //     die();
            // }
        }
        // if (is_null($type)) {
            if ($halaman == 'rekap') {
                $data['judul'] = 'Rekap Simpanan Anggota Koperasi';
                $data['jenis'] = ['pokok', 'wajib', 'sukarela'];
                $this->load->view('ADMIN/laporan/laporan_'.$halaman, $data);
            }
            else if($halaman != 'pokok' && $halaman != 'wajib' && $halaman != 'sukarela'){
                $data['jenis'] = $halaman;
                $data['judul'] = strtoupper($halaman);
                if ($halaman == 'dana_kematian') {
                    $this->load->view('ADMIN/laporan/laporan_kematian', $data);
                }else{
                    $this->load->view('ADMIN/laporan/laporan_lainnya', $data);
                }
            }
            else{
                $data['jenis'] = $halaman;
                $data['judul'] = strtoupper($halaman);
                $this->load->view('ADMIN/laporan/laporan_simpanan', $data);
            }
        // }
        // else{
        //     if ($halaman == 'rekap') {
        //         $this->load->view('ADMIN/laporan/laporan_'.$halaman.'_view', $data);
        //     }
        //     else{
        //         $this->load->view('ADMIN/laporan/laporan_simpanan_view', $data);
        //     }
        // }
        $this->load->view('templates/footer');
    }

    public function edit_admin()
    {
        $data['nama'] = $this->input->post('nama');
        $data['password_lama'] = $this->input->post('password_lama');
        $data['password_baru'] = $this->input->post('password_baru');
        $cek = $this->db->get_where('tbl_admin',['id_admin' => $this->session->userdata('id_admin')])->row_array();
        if (_cekKosong($data)) {
            if ($cek['password'] == md5($data['password_lama'])) {
                $this->db->set('nama', $data['nama']);
                $this->db->set('password', md5($data['password_baru']));
                $this->db->where('id_admin', $this->session->userdata('id_admin'));
                $this->db->update('tbl_admin');
                $session=[
                    'nama' => $data['nama']
                ];
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Disimpan</div>');
            }
            else
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Tidak Sesuai</div>');
        }
        redirect('index.php/admin');
    }
}