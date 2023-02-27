<?php

class sumsuk_model2 extends CI_model{
  public function getSUMSUK($data, $tahunLalu = null)
  {
    $masuk = $this->getMasuk($data, $tahunLalu);
    $keluar = $this->getKeluar($data, $tahunLalu);
    return [
      'masuk' => $masuk,
      'keluar' => $keluar
    ];
  }

  public function getKeluar($data, $tahunLalu = null)
  {
    $tahun = is_null($tahunLalu) ? $_SESSION['tahun'] : $_SESSION['tahun'] - 1;
    $total_keluar = 0;
    $total_fix = [];
    $jum_col = 0;
    $anggota_valid = [];
    $bulan = intval($data['bulan']);
    foreach ($data['anggota'] as $a) {
      if (isset($a['detail']['daftar_pinjaman']) && count($a['detail']['daftar_pinjaman']) > 0) {
        $jumlahPinjaman = 0;
          foreach ($a['detail']['daftar_pinjaman'] as $dp) {
            if ($dp['lunas'] == 0) {
              $waktu = explode('-',$dp['waktu']);
              if (intval($waktu[1]) == $bulan && intval($waktu[0]) == $tahun) {
                $jumlahPinjaman += floatval($dp['jumlah']);
                $nama = strlen($dp['ket']) > 0 ? $a['nama_anggota'].' ( '.$dp['ket'].' )' : $a['nama_anggota'];
              }
            }
          }
          if ($jumlahPinjaman > 0) {
            $anggota_valid[] = [
              'nama_anggota' => $a['nama_anggota'],
              'pinjaman' => $jumlahPinjaman,
              'sibulan' => '',
              'dana_kematian' => $this->getTarik($a['detail']['simpanan_riwayat'], 'DANA KEMATIAN', $bulan),
              'pokok' => $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN POKOK', $bulan),
              'wajib' => $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN WAJIB', $bulan),
              'sukarela' => $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN SUKARELA', $bulan),
            ];
          }
      }
      if (isset($a['detail']['simpanan_riwayat']) && count($a['detail']['simpanan_riwayat']) > 0) {
        $dana_kematian = $this->getTarik($a['detail']['simpanan_riwayat'], 'DANA KEMATIAN', $bulan);
        $simpanan_pokok = $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN POKOK', $bulan);
        $simpanan_wajib = $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN WAJIB', $bulan);
        $simpanan_sukarela = $this->getTarik($a['detail']['simpanan_riwayat'], 'SIMPANAN SUKARELA', $bulan);
        $tarik_jum = $dana_kematian == "" ? 0 : $tarik_jum + $dana_kematian;
        $tarik_jum = $simpanan_pokok == "" ? $tarik_jum : $tarik_jum + $simpanan_pokok;
        $tarik_jum = $simpanan_wajib == "" ? $tarik_jum : $tarik_jum + $simpanan_wajib;
        $tarik_jum = $simpanan_sukarela == "" ? $tarik_jum : $tarik_jum + $simpanan_sukarela;
      
        if (floatval($tarik_jum) > 0) {
          if (count($anggota_valid) > 0 && $a['nama_anggota'] != $anggota_valid[count($anggota_valid) - 1]['nama_anggota']) {
            $anggota_valid[count($anggota_valid) - 1]['dana_kematian'] = $dana_kematian;
            $anggota_valid[count($anggota_valid) - 1]['pokok'] = $simpanan_pokok;
            $anggota_valid[count($anggota_valid) - 1]['wajib'] = $simpanan_wajib;
            $anggota_valid[count($anggota_valid) - 1]['sukarela'] = $simpanan_sukarela;
          }
          else{
            $anggota_valid[] = [
              'nama_anggota' => $a['nama_anggota'],
              'pinjaman' => '',
              'sibulan' => '',
              'dana_kematian' => $dana_kematian,
              'pokok' => $simpanan_pokok,
              'wajib' => $simpanan_wajib,
              'sukarela' => $simpanan_sukarela
            ];
          }
        }
      }
      $total_fix = [
        'pokok' => 0,
        'wajib' => 0,
        'sukarela' => 0,
        'pinjaman' => 0,
        'sibulan' => 0,
        'dana_kematian' => 0
      ];
    }

    $tak_terduga_keluar_valid = [];
    foreach ($data['tak_terduga_keluar'] as $tk) {
      $waktu = explode('-', $tk['waktu']);
      if ($waktu[0] == $tahun && intval($waktu[1]) == $bulan) {
        $tak_terduga_keluar_valid[] = $tk;
      }  
    }

    $daftar_uraian = [];
    foreach ($tak_terduga_keluar_valid as $t) {
      if (!is_numeric(array_search($t['uraian'], $daftar_uraian))) {
        $daftar_uraian[] = $t['uraian'];
      }
    }


    $daftar_fix = [];
    $daftar_keterangan = [];
    foreach ($daftar_uraian as $d) {
      $keterangan = [];
      foreach ($tak_terduga_keluar_valid as $t) {
        if ($t['uraian'] == $d) {
          $keterangan[] = [
            'keterangan' => $t['keterangan'],
            'jumlah' => $t['jumlah']
          ];
          $total_keluar += floatval($t['jumlah']);
          if (!is_numeric(array_search($t['keterangan'], $daftar_keterangan))) {
            $daftar_keterangan[] = $t['keterangan'];
            if (strtolower($t['keterangan']) != 'jumlah') {
              $jum_col++;
              $total_fix[$jum_col] = 0;
            }
          }
        }
      }
      $daftar_fix[] = [
        'uraian' => $d,
        'ket' => $keterangan
      ];
    }

    $i = 0;
    $total_fix[$i] = 0;
    foreach ($daftar_keterangan as $dk) {
      if ($dk != 'Jumlah') {
        $i++;
        $total_fix[$i] = 0;
        foreach ($daftar_fix as $df) {
          foreach ($df['ket'] as $ket) {
            if ($ket['keterangan'] == $dk) {
              $total_fix[$i] += floatval($ket['jumlah']);
            }
          }
        }
      }
    }

    $sibulan = $data['sibulan'];
    foreach ($sibulan as $s) {
      if (isset($s['detail']['kredit_tiap_bulan'][$bulan]) && $s['detail']['kredit_tiap_bulan'][$bulan] > 0) {
        if (is_null($s['id_anggota'])) {
          $anggota_valid[] = [
            'nama_anggota' => $s['nama_anggota'],
            'pinjaman' => '',
            'sibulan' => $s['detail']['kredit_tiap_bulan'][$bulan]
          ];
          $total_fix['sibulan'] += $s['detail']['kredit_tiap_bulan'][$bulan];
          $total_keluar += $s['detail']['kredit_tiap_bulan'][$bulan];
        }
        else{
          $anggota_valid = $this->_tambahSibulanData($anggota_valid, $s, $bulan);
        }
      }
    }

    for ($i=0; $i < count($anggota_valid); $i++) { 
      $jumlah = 0;
      if (is_numeric($anggota_valid[$i]['pinjaman'])) {
        $jumlah += $anggota_valid[$i]['pinjaman'];
        $total_fix['pinjaman'] += $anggota_valid[$i]['pinjaman'];
        $anggota_valid[$i]['pinjaman'] = number_format($anggota_valid[$i]['pinjaman'],0,'.',',');
      }
      if (is_numeric($anggota_valid[$i]['dana_kematian'])) {
        $jumlah += $anggota_valid[$i]['dana_kematian'];
        $total_fix['dana_kematian'] += $anggota_valid[$i]['dana_kematian'];
        $anggota_valid[$i]['dana_kematian'] = number_format($anggota_valid[$i]['dana_kematian'],0,'.',',');
      }
      if (is_numeric($anggota_valid[$i]['pokok'])) {
        $jumlah += $anggota_valid[$i]['pokok'];
        $total_fix['pokok'] += $anggota_valid[$i]['pokok'];
        $anggota_valid[$i]['pokok'] = number_format($anggota_valid[$i]['pokok'],0,'.',',');
      }
      if (is_numeric($anggota_valid[$i]['wajib'])) {
        $jumlah += $anggota_valid[$i]['wajib'];
        $total_fix['wajib'] += $anggota_valid[$i]['wajib'];
        $anggota_valid[$i]['wajib'] = number_format($anggota_valid[$i]['wajib'],0,'.',',');
      }
      if (is_numeric($anggota_valid[$i]['sukarela'])) {
        $jumlah += $anggota_valid[$i]['sukarela'];
        $total_fix['sukarela'] += $anggota_valid[$i]['sukarela'];
        $anggota_valid[$i]['sukarela'] = number_format($anggota_valid[$i]['sukarela'],0,'.',',');
      }
      if (is_numeric($anggota_valid[$i]['sibulan'])) {
        $jumlah += $anggota_valid[$i]['sibulan'];
        $total_fix['sibulan'] += $anggota_valid[$i]['sibulan'];
        $anggota_valid[$i]['sibulan'] = number_format($anggota_valid[$i]['sibulan'],0,'.',',');
      }
      $total_keluar += floatval($jumlah);
      $anggota_valid[$i]['jumlah'] = number_format($jumlah,0,'.',',');
    }

    return [
      'anggota' => $anggota_valid,
      'tak_terduga_keluar' => $daftar_fix,
      'daftar_keterangan' => $daftar_keterangan,
      'ket_jum_col' => $jum_col,
      'total' => $total_keluar,
      'totalSUKArray' => $total_fix
    ];  
  }

  public function getTarik($data, $type, $bulan)
  {
    $return = 0;
    foreach ($data as $d) {
      if (isset($d['tarik']) && $d['tarik'] == 1 && $d['jenis'] == $type) {
        if ($d['bulan'] == $bulan) {
          $return += floatval($d['jumlah']);
        }
      }
    }
    return $return == 0 ? '' : $return;
  }

  public function _tambahSibulanData($anggota, $sibulan, $bulan)
  {
    $ketemu = false;
    for ($i=0; $i < count($anggota); $i++) { 
      if ($anggota[$i]['nama_anggota'] == $sibulan['nama_anggota']) {
        $anggota[$i]['sibulan'] = $sibulan['detail']['kredit_tiap_bulan'][$bulan];
        $ketemu = true;
      }
    }
    if ($ketemu == false) {
      $anggota[] = [
        'dana_kematian' => '',
        'jumlah' => $sibulan['detail']['kredit_tiap_bulan'][$bulan],
        'nama_anggota' => $sibulan['nama_anggota'],
        'pinjaman' => '',
        'pokok' => '',
        'sibulan' => $sibulan['detail']['kredit_tiap_bulan'][$bulan],
        'wajib' => '',
        'sukarela' => '',
      ];
    }
    return $anggota;
  }
  
  public function getMasuk($data, $tahunLalu)
  {
    $tahun = is_null($tahunLalu) ? $_SESSION['tahun'] : $_SESSION['tahun'] - 1;
    $anggota = $data['anggota'];
    $sibulan = $data['sibulan'];
    $tak_terduga_masuk = $data['tak_terduga_masuk'];
    $bulan = intval($data['bulan']);
    $totalSUM = 0;
    $totalSUMArray = array_fill(0, 13, 0);

    $anggota_valid = [];
    for ($i=0; $i < count($anggota); $i++) {
      $anggota[$i]['jumlah_masuk'] = 0; 
      if (!is_null($anggota[$i]['tgl_keluar']) && explode('-',$anggota[$i]['tgl_keluar'])[1] == $bulan && explode('-',$anggota[$i]['tgl_keluar'])[0] == $tahun) {
        $anggota[$i]['detail']['pokok'][$bulan] = 0;
        $anggota[$i]['detail']['wajib'][$bulan] = 0;
        $anggota[$i]['detail']['sukarela'][$bulan] = 0;
      }
      $anggota[$i]['pokok'] = $anggota[$i]['detail']['pokok'][$bulan];
      $anggota[$i]['jumlah_masuk'] += floatval($anggota[$i]['pokok']);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['wajib'] = $anggota[$i]['detail']['wajib'][$bulan];
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['sukarela'] = $anggota[$i]['detail']['sukarela'][$bulan];
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['uang_pangkal'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'uang_pangkal', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['piutang_anggota'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'piutang_anggota', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['administrasi_pelayanan'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'administrasi_pelayanan', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['uang_buku'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'uang_buku', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['bunga'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'bunga', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['materai'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'materai', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['provisi'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'provisi', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['dana_kematian'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'dana_kematian', $bulan, $tahun);
      $anggota[$i]['jumlah_masuk'] += $anggota[$i]['uang_konsumsi'] = $this->getSelainSimpanan($anggota[$i]['detail']['data_selain_simpanan'], 'uang_konsumsi', $bulan, $tahun);
      if (floatval($anggota[$i]['jumlah_masuk']) > 0) {
        $anggota_valid[] = $anggota[$i];
        $totalSUMArray[0]  += floatval($anggota[$i]['pokok']);
        $totalSUMArray[1]  += floatval($anggota[$i]['wajib']);
        $totalSUMArray[2]  += floatval($anggota[$i]['sukarela']);
        $totalSUMArray[3]  += floatval($anggota[$i]['uang_pangkal']);
        $totalSUMArray[4]  += floatval($anggota[$i]['piutang_anggota']);
        $totalSUMArray[5]  += floatval($anggota[$i]['administrasi_pelayanan']);
        $totalSUMArray[6]  += floatval($anggota[$i]['uang_buku']);
        $totalSUMArray[7]  += floatval($anggota[$i]['bunga']);
        $totalSUMArray[9]  += floatval($anggota[$i]['materai']);
        $totalSUMArray[10] += floatval($anggota[$i]['provisi']);
        $totalSUMArray[11] += floatval($anggota[$i]['dana_kematian']);
        $totalSUMArray[12] += floatval($anggota[$i]['uang_konsumsi']);
        $totalSUM += $anggota[$i]['jumlah_masuk'];
      }


    }
    
    for ($i=0; $i < count($sibulan); $i++) { 
      $sibulan[$i]['sibulan'] = isset($sibulan[$i]['detail']['debet_tiap_bulan'][$bulan]) ? $sibulan[$i]['detail']['debet_tiap_bulan'][$bulan] : 0;
    }

    $sibulan_valid = [];
    for ($i=0; $i < count($sibulan); $i++) { 
      if (floatval($sibulan[$i]['sibulan']) > 0) {
        $sibulan_valid[] = $sibulan[$i];
        $totalSUMArray[8] += $sibulan[$i]['sibulan'];
        $totalSUM += floatval($sibulan[$i]['sibulan']);
      }
    }


    $tak_terduga_masuk_valid = [];
    foreach ($tak_terduga_masuk as $tm) {
      if (explode('-', $tm['waktu'])[1] == $bulan && explode('-', $tm['waktu'])[0] == $tahun) {
        $tak_terduga_masuk_valid[] = $tm;
        $totalSUM += floatval($tm['jumlah']);
      }
    }

    return [
      'anggota' => $anggota_valid,
      'sibulan' => $sibulan_valid,
      'tak_terduga_masuk' => $tak_terduga_masuk_valid,
      'total' => $totalSUM, 
      'totalSUMArray' => $totalSUMArray
    ];
  }
  
  public function getSelainSimpanan($data, $jenis, $bulan, $tahun)
  {
    $return = 0;
    foreach ($data as $d) {
      if ($d['jenis'] == $jenis && explode('-', $d['waktu'])[1] == $bulan && explode('-', $d['waktu'])[0] == $tahun) {
        if ($d['tarik'] == 0) {
          $return += floatval($d['jumlah']);
        }
      }
    }
    return $return;
  }
}