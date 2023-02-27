<?php 
	
    function _getLaporanLainnya($jenis, $anggota)
    {
    	for ($i=0; $i < count($anggota); $i++) {
    		$jenisArr = [];
    		// var_dump($anggota[$i]['detail']['data_selain_simpanan']);
    		// die();
    		foreach ($anggota[$i]['detail']['data_selain_simpanan'] as $d) {
    			$waktu = explode('-', $d['waktu']);
				$tahun = $waktu[0];
    			if ($d['jenis'] == $jenis && $d['tarik'] == 0 && $tahun == $_SESSION['tahun']) {
    				$bulan = intval($waktu[1]);
    				if (!isset($jenisArr[$bulan])) {
    					$jenisArr[$bulan] = floatval($d['jumlah']);
    				}else{
    					$jenisArr[$bulan] += floatval($d['jumlah']);
    				}
    			}
    		}
    		for ($j=0; $j < 13; $j++) { 
    			if (!isset($jenisArr[$j])) {
    				$jenisArr[$j] = 0;
    			}
    		}
    		$anggota[$i]['detail'] = [];
    		$anggota[$i]['detail'][$jenis] = $jenisArr;
    	}
    	return $anggota;
    }

    $jumlah_tahun_lalu = 0;
    $jumlah_tahun_ini = 0;
    $jumlah_hingga_des = 0;
    $jumlah_tiap_bulan = [];
    $anggota = _getLaporanLainnya($jenis, $anggota);

?>

<div class="card shadow p-3 mb-3" style="height:auto">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
            Laporan Simpanan <?= $judul; ?>
            <small class="float-right">Hari/Tanggal : <?= _cetakWaktu(date($_SESSION['tahun'].'-'.$_SESSION['bulan'].'-'.$_SESSION['hari'])); ?></small>
            </h4>
        </div>
    <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="card-body" style="font-size:13px;height: auto;">
            <table class="table text-center table-sm text-nowrap table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th width="20">No Anggota</th>
                        <th>Nama</th>
                        <?php $i=1; foreach (_daftarBulanList() as $b) : 
                            if ($i <= $bulan_lihat) { ?>
                                <th><?= substr($b,0,3); ?></th>
                            <?php } ?>
                            <?php $jumlah_tiap_bulan[$i - 1] = 0; ?>
                        <?php $i++; endforeach; ?>
                        <?php $jumlah_tiap_bulan[12] = 0; ?>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $a) : ?>
                    		<?php $jumlah = 0; ?>
                            <tr>
                                <td><?= $a['no_buku']; ?></td>
                                <td><?= $a['nama_anggota']; ?></td>
                                <?php $jumlah = 0; $i=1; foreach (_daftarBulanList() as $b) : 
                                    if ($i <= $bulan_lihat) { $jumlah += $a['detail'][$jenis][$i]; ?>
                                        <td><?= number_format($a['detail'][$jenis][$i], 0, '', ','); ?></td>
                                        <?php $jumlah_tiap_bulan[$i - 1] += $a['detail'][$jenis][$i]; ?>
                                    <?php } ?>
                                <?php $i++; endforeach; ?>
                                <td><?= number_format($jumlah, 0, '', ','); ?></td>
                                <?php $jumlah_tiap_bulan[12] += $jumlah; ?>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.col -->
    <div class="row">
        <div class="card-body table-responsive" style="font-size:13px;">
                <table class="table text-center table-sm table-head-fixed text-nowrap table-bordered table-striped">
                    <thead>
                        <?php $i=0; foreach (_daftarBulanList() as $b) :  if ($i < $bulan_lihat) { ?>
                            <th><?= substr($b,0,3); ?></th>
                        <?php $i++; } endforeach; ?>
                        <th>Jumlah</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php for ($i=0; $i < 13; $i++) {  ?>
                                <?php if ($i <= $bulan_lihat || $i > 12): ?>
                                    <td><?= number_format($jumlah_tiap_bulan[$i],0,'.',','); ?></td>
                                <?php endif ?>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-lg-9">
            <?php $i = 1; foreach (_daftarBulanList() as $b) { ?>
                <?php if ($i <= intval($_SESSION['bulan'])): ?>
                <a href="<?=base_url('index.php/admin/laporan_simpanan/'.$jenis.'/'.$i);?>" class="btn <?=intval($bulan_lihat) == $i ? "btn-warning btn-loading" : "btn-primary btn-loading" ?>"><?=$b;?></a>                    
                <?php endif ?>
            <?php $i++; } ?>
        </div>
        <div class="col-lg-3">
            <a href="<?=base_url('index.php/cetak/laporan_simpanan/'.$jenis.'/'.$bulan_lihat);?>" class="btn btn-danger btn-loading float-right" style="margin-right: 5px;">
                <i class="fas fa-sticky-note"></i> <b>Lihat PDF</b>
            </a>
        </div>
    </div>
</div>