<div class="row mb-4">
    <div class="col-lg-4">
        <a href="<?=base_url('index.php/'.$lalu.'/laporan_simpanan/rekap/'.$bulan_lihat);?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <b>Kembali</b></a>
    </div>
</div>
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h1>Laporan Rekap Simpanan</h1>
        </div>
    <!-- /.col -->
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <object data="<?=base_url('assets/laporan/laporan_'.$halaman);?>#zoom=131" type="application/pdf" style="width:100%;height:730px;">
                <embed src="<?=base_url('assets/laporan/laporan_'.$halaman);?>" type="application/pdf">
            </object>
        </div>
    </div>        
</div>