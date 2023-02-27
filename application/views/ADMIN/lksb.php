<div class="lksb">
  <div class="row">
    
    <div class="col-12">
    <div class="card shadow">
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
              <div class="col-lg-2">
                <div class="form-group">
                    <label for="anggota" class="form-label">Bulan</label>
                    <select class="form-control select2" style="width: 100%;" id="bulan_tampil" name="bulan">
                        <?php $i=0; foreach (_daftarBulanList() as $b) : $i++;?>
                            
                            <?php if ($i <= intval($_SESSION['bulan'])) { ?>
                                <option value="<?=$i;?>"
                                    <?php if ($i == intval($_SESSION['bulan'])) {
                                        echo('selected');
                                    } ?>
                                ><?= $b; ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
              </div>
              <div class="col-lg-2 offset-2">
                <div class="form-group">
                    <label for="anggota" class="form-label">&nbsp;</label>
                    <button class="btn btn-primary form-control btn-lksb-tahunan" style="display: none;"><b><i class="fa fa-calendar"></i> LKSB Tahunan</b></button>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                    <label for="anggota" class="form-label">&nbsp;</label>
                    <button class="btn btn-danger form-control btn-print-lksb-tahunan btn-loading" style="display: none;"><b><i class="fa fa-print"></i> Cetak LKSB Tahunan</b></button>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                    <label for="anggota" class="form-label">&nbsp;</label>
                    <button class="btn btn-success form-control btn-validasi"><b><i class="fa fa-check"></i> Validasi</b></button>
                    <button class="btn btn-warning form-control btn-batal-validasi"><b><i class="fa fa-times"></i> Batal Validasi</b></button>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <button class="btn btn-danger form-control btn-print btn-loading"><b><i class="fa fa-print"></i> Cetak LKSB</b></button>
                </div>
              </div>
          </div>
          <div class="row loadtext">
            <div class="col-lg-12 d-flex justify-content-center align-items-center flex-column message-box" style="height: 70vh;">

            </div>
          </div>
          <div class="row datashow"  style="height:70vh; overflow-y:scroll;">
            <div class="col-lg-6">
              <table class="table-sm" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="4" class="text-center">NERACA</th>
                </tr>
                <tr>
                  <th rowspan="2" width="5" class="text-center">No PERK</th>
                  <th class="text-center">AKTIVA 1</th>
                  <th class="text-center">JUMLAH</th>
                  <th class="text-center">JUMLAH</th>
                </tr>
                <tr>
                  <th class="text-center">AKTIVA LANCAR 1</th>
                  <th class="text-center bulan-lksb">Januari 2021</th>
                  <th class="text-center bulan-lalu-lksb">Desember 2020</th>
                </tr>
              </thead>
                            
              <tbody>
                <tr>
                  <td>100</td>
                  <td>KAS</td>
                  <td><input type="text" class="form-control form-control-sm kas-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm kas-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>120</td>
                  <td>SI BUHARI SWASTISARI</td>
                  <td><input type="text" class="form-control form-control-sm sibuhari-swastisari-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm sibuhari-swastisari-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>150</td>
                  <td>PIUTANG PINJAMAN ANGGOTA</td>
                  <td><input type="text" class="form-control form-control-sm piutang-pinjaman-anggota-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm piutang-pinjaman-anggota-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>151</td>
                  <td>PIUTANG ARISAN</td>
                  <td><input type="text" class="form-control form-control-sm piutang-arisan-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm piutang-arisan-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>191</td>
                  <td>PIUTANG KONSUMSI</td>
                  <td><input type="text" class="form-control form-control-sm piutang-konsumsi-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm piutang-konsumsi-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>195</td>
                  <td>INVESTASI</td>
                  <td><input type="text" class="form-control form-control-sm investasi-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm investasi-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>196</td>
                  <td>SIMAPAN</td>
                  <td><input type="text" class="form-control form-control-sm simapan-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm simapan-bulan-lalu" disabled></td>
                </tr>
                <tr>
                  <td>340</td>
                  <td>PERSEDIAAN BARANG</td>
                  <td><input type="text" class="form-control form-control-sm persediaan-barang-bulan-ini" disabled></td>
                  <td><input type="text" class="form-control form-control-sm persediaan-barang-bulan-lalu" disabled></td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-1-total-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-1-total-bulan-lalu" disabled></th>
                </tr>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">AKTIVA TETAP 2</th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>300</td>
                    <td>TANAH</td>
                    <td><input type="text" class="form-control form-control-sm tanah-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm tanah-bulan-lalu" disabled></td>
                </tr>
                <tr>
                    <td>310</td>
                    <td>GEDUNG</td>
                    <td><input type="text" class="form-control form-control-sm gedung-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm gedung-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>340</td>
                    <td>INVENTARIS</td>
                    <td><input type="text" class="form-control form-control-sm inventaris-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm inventaris-bulan-lalu" disabled></td>
                </tr> 
              </tbody>
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL AKTIVA TETAP</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-2-total-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-2-total-bulan-lalu" disabled></th>
                </tr>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL AKTIVA 1 + 2</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-total-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm neraca-total-bulan-lalu" disabled></th>
                </tr>
                <tr>
                    <th class="text-center"colspan="4">PASIVA</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td></td>
                    <td>KEWAJIBAN/UTANG</td>
                    <td><input type="text" class="form-control form-control-sm kewajiban-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm kewajiban-bulan-lalu" disabled></td>
                </tr>
                <tr>
                    <td>405</td>
                    <td>SI ANAS / SIBULAN</td>
                    <td><input type="text" class="form-control form-control-sm sibulan-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm sibulan-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>450</td>
                    <td>BIAYA YANG MASIH HARUS DIBAYAR</td>
                    <td><input type="text" class="form-control form-control-sm biaya-yg-masih-harus-dibayar-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm biaya-yg-masih-harus-dibayar-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>451</td>
                    <td>SIMPANAN WAJIB TARIK YANG HRS DIBAYAR</td>
                    <td><input type="text" class="form-control form-control-sm simpanan-wajib-tarik-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm simpanan-wajib-tarik-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>452</td>
                    <td>INVESTASI SIMAPAN</td>
                    <td><input type="text" class="form-control form-control-sm investasi-simapan-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm investasi-simapan-bulan-lalu" disabled></td>
                </tr> 
              </tbody>
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL KEWAJIBAN</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm total-pasiva-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm total-pasiva-bulan-lalu" disabled></th>
                </tr>
                <th class="text-center"colspan="4">MODAL</th>
              </thead>
              <tbody>
                <tr>
                    <td>500</td>
                    <td>SIMPANAN POKOK</td>
                    <td><input type="text" class="form-control form-control-sm simpanan-pokok-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm simpanan-pokok-bulan-lalu" disabled></td>
                </tr>
                <tr>
                    <td>501</td>
                    <td>SIMPANAN WAJIB</td>
                    <td><input type="text" class="form-control form-control-sm simpanan-wajib-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm simpanan-wajib-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>510</td>
                    <td>SIMPANAN SUKARELA</td>
                    <td><input type="text" class="form-control form-control-sm simpanan-sukarela-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm simpanan-sukarela-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>520</td>
                    <td>HIBAH/DONASI</td>
                    <td><input type="text" class="form-control form-control-sm modal-hibah-resiko-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-hibah-resiko-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>540</td>
                    <td>DANA CADANGAN UMUM</td>
                    <td><input type="text" class="form-control form-control-sm modal-dana-cadangan-umum-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-dana-cadangan-umum-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>541</td>
                    <td>DANA CADANGAN RESIKO</td>
                    <td><input type="text" class="form-control form-control-sm modal-dana-cadangan-resiko-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-dana-cadangan-resiko-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>542</td>
                    <td>TITIPAN SIMPANAN</td>
                    <td><input type="text" class="form-control form-control-sm modal-titipan-simpanan-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-titipan-simpanan-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>543</td>
                    <td>TITIPAN KONSUMSI</td>
                    <td><input type="text" class="form-control form-control-sm modal-titipan-konsumsi-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-titipan-konsumsi-bulan-lalu" disabled></td>
                </tr> 
                <tr>
                    <td>544</td>
                    <td>SALDO UANG DUKA</td>
                    <td><input type="text" class="form-control form-control-sm modal-saldo-uang-duka-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm modal-saldo-uang-duka-bulan-lalu" disabled></td>
                </tr> 
              </tbody>
              <thead>
                <tr>
                  <th>546</th>
                  <th class="text-center">SHU</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm modal-shu-murni-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm modal-shu-murni-bulan-lalu" disabled></th>
                </tr>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL MODAL SENDIRI</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm modal-total-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm modal-total-bulan-lalu" disabled></th>
                </tr>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-center">TOTAL 1 + 2</th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm total-bulan-ini" disabled></th>
                  <th class="text-center"><input type="text" class="form-control form-control-sm total-bulan-lalu" disabled></th>
                </tr>
              </thead>
            </table>
            </div>
            <div class="col-lg-6">
              <table class="table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="3" width="3" class="text-center">No PERK</th>
                    <th colspan="3" class="text-center">LAPORAN SHU</th>
                  </tr>
                  <tr>
                    <th class="text-center"  rowspan="2">PENDAPATAN</th>
                    <th class="text-center">JUMLAH</th>
                    <th class="text-center">JUMLAH</th>
                  </tr>
                  <tr>
                    <th class="text-center bulan-lksb">Januari 2021</th>
                    <th class="text-center bulan-lalu-lksb">Desember 2020</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td>600</td>
                    <td>BUNGA PINJAMAN</td>
                    <td><input type="text" class="form-control form-control-sm bunga-pinjaman-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm bunga-pinjaman-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>603</td>
                    <td>PROVISI KREDIT</td>
                    <td><input type="text" class="form-control form-control-sm provisi-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm provisi-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>604</td>
                    <td>UANG PANGKAL</td>
                    <td><input type="text" class="form-control form-control-sm uang-pangkal-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm uang-pangkal-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>610</td>
                    <td>BUNGA SIBUHARI SWASTISARI</td>
                    <td><input type="text" class="form-control form-control-sm bunga-sibuhari-swastisari-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm bunga-sibuhari-swastisari-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>619</td>
                    <td>LABA PENJUALAN BARANG</td>
                    <td><input type="text" class="form-control form-control-sm laba-penjualan-barang-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm laba-penjualan-barang-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>620</td>
                    <td>ADM. PELAYANAN</td>
                    <td><input type="text" class="form-control form-control-sm administrasi-pelayanan-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm administrasi-pelayanan-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <td>621</td>
                    <td>PENDAPATAN LAIN-LAIN</td>
                    <td><input type="text" class="form-control form-control-sm pendapatan-lainnya-bulan-ini" disabled></td>
                    <td><input type="text" class="form-control form-control-sm pendapatan-lainnya-bulan-lalu" disabled></td>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">JUMLAH</th>
                    <th class="text-center"><input type="text" class="form-control form-control-sm jumlah-pendapatan-bulan-ini" disabled></th>
                    <th class="text-center"><input type="text" class="form-control form-control-sm jumlah-pendapatan-bulan-lalu" disabled></th>
                  </tr>
                  <tr>
                      <td>622</td>
                      <td>NON USAHA (DUKA) SD BULAN INI</td>
                      <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">BIAYA - BIAYA</th>
                    <th class="text-center bulan-lksb">Januari 2021</th>
                    <th class="text-center bulan-lalu-lksb">Desember 2020</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>700</td>
                      <td>1. SIMPANAN NON SAHAM</td>
                      <td><input type="text" class="form-control form-control-sm simpanan-non-saham-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm simpanan-non-saham-bulan-lalu" disabled></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>2. BIAYA ORGANISASI</td>
                      <td><input type="text" class="form-control form-control-sm biaya-organisasi-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm biaya-organisasi-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>3. BEBAN SIMPANAN WAJIB TARIK</td>
                      <td><input type="text" class="form-control form-control-sm beban-simpanan-wajib-tarik-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm beban-simpanan-wajib-tarik-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>4. BEBAN BIAYA PENGURUS</td>
                      <td><input type="text" class="form-control form-control-sm beban-biaya-pengurus-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm beban-biaya-pengurus-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>5. CETAK SUM DAN SUK</td>
                      <td><input type="text" class="form-control form-control-sm cetak-sum-suk-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm cetak-sum-suk-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>6. KALKULATOR+FC+JILID+ NB+ B. SIBHARI.</td>
                      <td><input type="text" class="form-control form-control-sm kalkulator-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm kalkulator-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>7. BIAYA JASA KARYAWAN</td>
                      <td><input type="text" class="form-control form-control-sm biaya-jasa-karyawan-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm biaya-jasa-karyawan-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>8. BIAYA RAT</td>
                      <td><input type="text" class="form-control form-control-sm biaya-rat-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm biaya-rat-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>9. PAJAK</td>
                      <td><input type="text" class="form-control form-control-sm pajak-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm pajak-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td>810</td>
                      <td>BAYAR SANTUNAN DUKA</td>
                      <td><input type="text" class="form-control form-control-sm bayar-santunan-duka-bulan-ini" disabled></td>
                      <td><input type="text" class="form-control form-control-sm bayar-santunan-duka-bulan-lalu" disabled></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>TOTAL BIAYA</td>
                      <td><b><input type="text" class="form-control form-control-sm jumlah-biaya-bulan-ini" disabled></b></td>
                      <td><b><input type="text" class="form-control form-control-sm jumlah-biaya-bulan-lalu" disabled></b></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>SALDO UANG DUKA SAMPAI BULAN INI</td>
                      <td><b><input type="text" class="form-control form-control-sm saldo-uang-duka-di-bulan-ini" disabled></b></td>
                      <td><b><input type="text" class="form-control form-control-sm saldo-uang-duka-di-bulan-lalu" disabled></b></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>SHU SEBELUM BEBAN</td>
                      <td><b><input type="text" class="form-control form-control-sm SHU-Beban-bulan-ini" disabled></b></td>
                      <td><b><input type="text" class="form-control form-control-sm SHU-Beban-bulan-lalu" disabled></b></td>
                  </tr> 
                  <tr>
                      <td></td>
                      <td>SHU MURNI</td>
                      <td><b><input type="text" class="form-control form-control-sm SHU-Murni-bulan-ini" disabled></b></td>
                      <td><b><input type="text" class="form-control form-control-sm SHU-Murni-bulan-lalu" disabled></b></td>
                  </tr> 
                </tbody>
                <thead>
                  <tr>
                      <th class="text-center"colspan="4">DATA STATISTIK</th>
                  </tr>
                </thead>
                <tbody>
                      <tr>
                          <td colspan="2">Tanggal Pembentukan : 01 Maret 2007</td>
                          <th class = "text-center" rowspan="2"><b class="bulan-lksb">Januari</b></th>
                          <td class = "text-center" rowspan="2"><b class="bulan-lalu-lksb">Desember</b></td>
                      </tr>
                      <tr>
                          <td colspan="2">WILAYAH KERJA : KOTA KUPANG</td>
                        </tr> 
                        <tr>
                            <td>1.</td>
                            <td>JUMLAH ANGGOTA</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-anggota-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-anggota-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>JUMLAH SIMPANAN SAHAM SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm simpanan-saham-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm simpanan-saham-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>JUMLAH SIMPANAN NON SAHAM SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-simpanan-non-saham-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-simpanan-non-saham-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>JUMLAH KELALAIAN PINJAMAN SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm kelalaian-pinjaman-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm kelalaian-pinjaman-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>JUMLAH PINJAMAN SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-pinjaman-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-pinjaman-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>JUMLAH PINJAMAN SEJAK BERDIRI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-pinjaman-sejak-berdiri-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-pinjaman-sejak-berdiri-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>JUMLAH UANG DUKA SEJAK BERDIRI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-sejak-berdiri-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-sejak-berdiri-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>JUMLAH UANG DUKA SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-uang-duka-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>SANTUNAN DUKA SD BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-santunan-duka-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-santunan-duka-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>SANTUNAN DUKA SEJAK BERDIRI</td>
                            <td><input type="text" class="form-control form-control-sm jumlah-santunan-duka-sejak-berdiri-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm jumlah-santunan-duka-sejak-berdiri-bulan-lalu" disabled></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>SALDO UANG DUKA BULAN INI</td>
                            <td><input type="text" class="form-control form-control-sm saldo-uang-duka-bulan-ini" disabled></td>
                            <td><input type="text" class="form-control form-control-sm saldo-uang-duka-bulan-lalu" disabled></td>
                        </tr>
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
  </div>
</div>