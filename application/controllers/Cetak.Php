<?php

class cetak extends CI_Controller{

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
        $this->load->model('shu_model');
        $this->load->model('bukuBesar_model');
        $this->load->model('beban_simpanan_wajib_tarik_model');
        $this->load->model('beban_biaya_pengurus_model');
        $this->load->model('pelunasan_biaya_organisasi_model');
        $this->load->model('titipan_simpanan_model');
        $this->load->model('titipan_konsumsi_model');
        $this->load->model('titipan_arisan_model');
    }

    public function riwayat_pinjaman()
    {
        $daftar = $this->anggota_model->daftarPiutang($this->input->post('bulan'));
        $data['bulan'] = _getBulan($this->input->post('bulan'));
        $data['anggota'] = $daftar['anggota'];
        $data['total'] = number_format($daftar['total'],0,'.',',');
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_piutang_anggota' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/daftar_piutang_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_piutang_anggota/daftar_piutang_anggota');
    }

    public function riwayat_pinjaman_lalu()
    {
        $daftar = $this->anggota_model->daftarPiutang($this->input->post('bulan'), true);
        $data['bulan'] = _getBulan($this->input->post('bulan'));
        $data['anggota'] = $daftar['anggota'];
        $data['total'] = number_format($daftar['total'],0,'.',',');
        $data['tahun'] = $this->session->userdata('tahun') - 1;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_piutang_anggota' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/daftar_piutang_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_piutang_anggota/daftar_piutang_anggota/2');
    }

    public function daftar_sibulan()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($bulan, $anggota);
        $data = $this->sibulan_model->daftarSibulan($bulan, $anggota);
        $data['bulan'] = $bulan;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_sibulan' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/daftar_sibulan.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_sibulan/daftar_sibulan');
    }

    public function daftar_sibulan_lalu()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_sibulan_full();
        $anggota = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($bulan, $anggota);
        $data = $this->sibulan_model->daftarSibulan($bulan, $anggota, true);
        $data['bulan'] = $bulan;
        $data['tahun'] = $this->session->userdata('tahun') - 1;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_sibulan' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/daftar_sibulan.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_sibulan/daftar_sibulan/2');
    }

    public function sum()
    {
        $bulan = intval($this->input->post('bulan'));

        $kas = $this->db->get_where('tbl_pengaturan',['field' => 'kas_tahun_lalu'])->row_array()['value'];
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
         
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota_full = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= intval($bulan); $i++) { 
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota_full, null, null, true);
            for ($j=0; $j < count($anggota); $j++) { 
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota']);
            }
            
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan']);
            }

            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $this->tak_terduga_masuk_model->daftar_tak_terduga($i),
                'tak_terduga_keluar' => $this->tak_terduga_keluar_model->daftar_tak_terduga($i),
            ];
            $data = $this->sumsuk_model->getSUMSUK($inputParameter);
            $kas_tiap_bulan_value = $kas_tiap_bulan_value + (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
            $kas_tiap_bulan[$i] = number_format($kas_tiap_bulan_value,0,'.',',');
            $sumsuk[$i] = $data;
            $sumsuk[$i]['kas_bulan_ini'] = number_format((floatval($data['masuk']['total']) - floatval($data['keluar']['total'])),0,',','.');
        }
        $data['laporan'] = $sumsuk[$bulan];
        $data['bulan'] = $bulan;
        $data['tahun'] = $this->session->userdata('tahun');
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/sum' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
        $html = $this->load->view('ADMIN/cetak/suk' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/sumsuk.pdf','F');
        redirect('index.php/cetak/laporan_view/sumsuk/laporan_sumsuk');
    }


    public function sumlalu()
    {
        $bulan = intval($this->input->post('bulan'));

        $kas = $this->db->get_where('tbl_pengaturan',['field' => 'kas_tahun_lalu'])->row_array()['value'];
        $kas_bulan_ini = floatval($kas);
        $kas_tiap_bulan_value = floatval($kas);
        $kas_tiap_bulan = [];
         
        
        $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_full();
        
        $anggota = $this->anggota_model->daftar_anggota_full();
        $sumsuk = [];
        for ($i=1; $i <= intval($bulan); $i++) { 
            $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($i, $anggota);
            for ($j=0; $j < count($anggota); $j++) { 
                $anggota[$j]['detail'] = $this->anggota_model->getDetailAnggota($anggota[$j]['id_anggota'], true);
            }
            
            $anggota_sibulan = $this->anggota_model->daftar_anggota_sibulan_bulan_keluar($i, $anggota_sibulan);
            for ($j=0; $j < count($anggota_sibulan); $j++) { 
                $anggota_sibulan[$j]['detail'] = $this->sibulan_model->getDetailAnggotaSibulan($anggota_sibulan[$j]['id_anggota_sibulan'], true);
            }

            $inputParameter = [
                'bulan' => $i,
                'anggota' => $anggota,
                'sibulan' => $anggota_sibulan,
                'tak_terduga_masuk' => $this->tak_terduga_masuk_model->daftar_tak_terduga($i, true),
                'tak_terduga_keluar' => $this->tak_terduga_keluar_model->daftar_tak_terduga($i, true),
            ];
            $data = $this->sumsuk_model->getSUMSUK($inputParameter, true);
            $kas_tiap_bulan_value = $kas_tiap_bulan_value + (floatval($data['masuk']['total']) - floatval($data['keluar']['total']));
            $kas_tiap_bulan[$i] = number_format($kas_tiap_bulan_value,0,'.',',');
            $sumsuk[$i] = $data;
            $sumsuk[$i]['kas_bulan_ini'] = number_format((floatval($data['masuk']['total']) - floatval($data['keluar']['total'])),0,',','.');
        }
        $data['laporan'] = $sumsuk[$bulan];
        $data['bulan'] = $bulan;
        $data['tahun'] = $this->session->userdata('tahun') - 1;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/sum' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
        $html = $this->load->view('ADMIN/cetak/suk' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/sumsuk.pdf','F');
        redirect('index.php/cetak/laporan_view/sumsuk/laporan_sumsuk/2');
    }


    public function sibulan_anggota($id)
    {
        $data['detail'] = $this->anggota_model->getAnggotaSibulanData($id);
        $data['sibulan'] = $this->sibulan_model->getDetailAnggotaSibulan($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/sibulan_anggota' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/sibulan_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/sibulan_anggota/daftar_sibulan');
    }

    public function sibulan_anggota_lalu($id)
    {
        $data['detail'] = $this->anggota_model->getAnggotaSibulanData($id);
        $data['sibulan'] = $this->sibulan_model->getDetailAnggotaSibulan($id, true);
        $this->load->view('ADMIN/cetak/sibulan_anggota' ,$data);

  //       $mpdf = new \Mpdf\Mpdf();
  //       $html = $this->load->view('ADMIN/cetak/sibulan_anggota' ,$data,true);
  //       $mpdf->AddPage('L');
		// $mpdf->WriteHTML($html);
		// $mpdf->Output('assets/laporan/sibulan_anggota.pdf','F');
  //       redirect('index.php/cetak/laporan_view/sibulan_anggota/daftar_sibulan/2');
    }

    public function riwayat_pinjaman_anggota($id)
    {
        $data['data'] = $this->anggota_model->getDataAnggota($id);
        $data['detail'] = $this->anggota_model->getDetailAnggota($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/piutang_anggota' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/piutang_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/piutang_anggota/daftar_piutang_anggota');
    }

    public function jatuh_tempo()
    {
        $data['tahun'] = $tahun = $this->session->userdata('tahun');
        $data['bulan'] = $bulan = intval($this->input->post('bulan'));
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
        $data['anggota_valid'] = $anggota_valid;
        $data['tahun'] = $tahun = $this->session->userdata('tahun');
        $data['bulan'] = $bulan;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/jatuh_tempo' ,$data,true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/jatuh_tempo.pdf','F');
        redirect('index.php/cetak/laporan_view/jatuh_tempo/daftar_jatuh_tempo');
    }

    public function riwayat_pinjaman_anggota_lalu($id)
    {
        $data['data'] = $this->anggota_model->getDataAnggota($id);
        $data['detail'] = $this->anggota_model->getDetailAnggota($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/piutang_anggota' ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/piutang_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/piutang_anggota/daftar_piutang_anggota/2');
    }
    public function laporan_view($file, $backPage, $lalu = '')
    {
        $data['file'] = $file;
        $data['lalu'] = $lalu == '' ? 'admin' : 'pengaturan';
        $data['backPage'] = $backPage;
        $this->load->view('templates/header'.$lalu);
        $this->load->view('ADMIN/view/laporan_view',$data);
        $this->load->view('templates/footer');
    }

    public function laporan_simpanan($halaman, $bulan)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['jenis'] = $halaman;
        $data['jenis'] = $halaman == 'rekap' ? ['pokok', 'wajib', 'sukarela'] : $halaman;
        
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_masuk(intval($bulan), $anggota, $this->session->userdata('tahun'));
        $data['anggota'] = $anggota; 
        // $data['anggota'] = $this->anggota_model->daftar_anggota_bulan_keluar(intval($bulan), $anggota);

        for ($i=0; $i < count($data['anggota']); $i++) { 
            $data['anggota'][$i]['detail'] = $this->anggota_model->filterRekap($bulan, $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], null));
            // $data['anggota'][$i]['detail'] = $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], null, $data['anggota'][$i]['tgl_daftar']);
        }
        $file = $halaman == 'rekap' ? 'rekap' : 'simpanan';
        if ($halaman != 'rekap' && $halaman != 'pokok' && $halaman != 'wajib' && $halaman != 'sukarela') {
            $file = $halaman;
        }
        $data['bulan_lihat'] = $bulan;
        $data['jenis'] = $halaman == 'rekap' ? ['pokok', 'wajib', 'sukarela'] : $halaman;
        $this->load->view('ADMIN/cetak/'.$file , $data);
        $html = $this->load->view('ADMIN/cetak/'.$file , $data, true);
        
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/laporan_'.$file.'.pdf','F');
        redirect('index.php/cetak/laporan_simpanan_view/'.$halaman.'/'.$file.'/'.$bulan);
    }
    
    public function laporan_simpanan_view($halaman, $file, $bulan, $lalu = '')
    {
        $data['halaman'] = $file.'.pdf';       
        $data['jenis'] = $halaman;
        $data['bulan_lihat'] = $bulan;
        $data['lalu'] = $lalu == '' > 0 ? 'admin' : 'pengaturan';
        $file = $file != 'rekap' ? 'simpanan' : $file;
        $this->load->view('templates/header'.$lalu);
        $this->load->view('ADMIN/view/laporan_'.$file, $data);
        $this->load->view('templates/footer');
    }

    public function laporan_simpanan_lalu($halaman)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['jenis'] = $halaman == 'rekap' ? ['pokok', 'wajib', 'sukarela'] : $halaman;
        $data['anggota'] = $this->anggota_model->daftar_anggota();
        for ($i=0; $i < count($data['anggota']); $i++) { 
            $data['anggota'][$i]['detail'] = $this->anggota_model->getDetailAnggota($data['anggota'][$i]['id_anggota'], true);
        }
        $file = $halaman == 'rekap' ? 'rekap' : 'simpanan';
        $html = $this->load->view('ADMIN/cetak/'.$file ,$data,true);
        $mpdf->AddPage('L');
		$mpdf->WriteHTML($html);
		$mpdf->Output('assets/laporan/laporan_'.$file.'.pdf','F');
        redirect('index.php/cetak/laporan_simpanan_view/'.$halaman.'/'.$file.'/2');
    }

    public function lksb($bulan)
    {
        $data['lksb'] = $this->lksb_model->getLKSB($bulan);
        $data['bulan_lalu'] = $bulan - 1;
        $data['bulan'] = $bulan;
        // var_dump($data['lksb']);
        // die();
        // $this->load->view('ADMIN/cetak/lksb' ,$data);
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 0,
        ]);
        $html = $this->load->view('ADMIN/cetak/lksb' ,$data,true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/lksb.pdf','F');
        redirect('index.php/cetak/laporan_view/lksb/daftar_lksb');
    }

    public function lksb_tahunan()
    {
        $data['lksb_tahunIni'] = $this->lksb_model->getLKSB(12);
        $data['lksb_tahunLalu'] = $this->lksb_model->getLKSB(1);
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 0,
        ]);
        $html = $this->load->view('ADMIN/cetak/lksb_tahunan' ,$data,true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/lksb_tahunan.pdf','F');
        redirect('index.php/cetak/laporan_view/lksb_tahunan/daftar_lksb');
    }

    public function bulansaham_anggota($id)
    {
        $data['bulan_saham'] = $this->bulansaham_model->getDetailAnggotaBulanSaham($id);
        // var_dump($data);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/bulan_saham_anggota' ,$data,true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/bulan_saham_anggota.pdf','F');
        redirect('index.php/cetak/laporan_view/bulan_saham_anggota/bulan_saham');
    }

    public function daftar_bulansaham()
    {
        $bulan = $this->input->post('bulan');
        $anggota = $this->anggota_model->daftar_anggota_full();
        $anggota = $this->anggota_model->daftar_anggota_bulan_keluar($bulan, $anggota);
        $data['bulan_saham_daftar'] = $this->bulansaham_model->daftarBulanSaham($bulan, $anggota);
        $data['tahun'] = $bulan < 1 ? $this->session->userdata('tahun') - 1 : $this->session->userdata('tahun');
        $bulan = $bulan < 1 ? 12 : $bulan;
        $data['bulan'] = $bulan;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_bulansaham' ,$data, true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/daftar_bulansaham.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_bulansaham/bulan_saham');
    }

    public function bukuBesar()
    {
        $data['bukuBesar'] = $this->bukuBesar_model->getDatail();
        // $this->load->view('ADMIN/cetak/bukuBesar' ,$data);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/bukuBesar' ,$data, true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/bukuBesar.pdf','F');
        redirect('index.php/cetak/laporan_view/bukuBesar/bukuBesar');
    }

    public function daftar_BagiSHU()
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
        $data['bulan'] = $bulan;

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('ADMIN/cetak/daftar_BagiSHU', $data, true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output('assets/laporan/daftar_BagiSHU.pdf','F');
        redirect('index.php/cetak/laporan_view/daftar_BagiSHU/daftar_BagiSHU');
    }
}