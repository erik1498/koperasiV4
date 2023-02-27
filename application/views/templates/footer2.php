      
      <div class="modal fade" id="LogOut" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header border-0">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                      <div class="modal-body text-center">
                        <h3>Yakin Anda Ingin Logout ?</h3>
                      </div>
                      <div class="modal-footer border-0">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <a href="<?=base_url('index.php/Auth/logout');?>" class="btn btn-danger">Logout</a>
                      </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="BukuBaru" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header border-0">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                      <div class="modal-body text-center">
                        <h3>Yakin Buka Buku Baru Tahun <?= date('Y'); ?> ?</h3>
                      </div>
                    <form action="<?=base_url('index.php/pengaturan/aturBukuBaru');?>" method="post">
                      <div class="modal-footer border-0">
                            <input type="hidden" name="bulan">
                            <button type="submit" class="btn btn-primary btn-block" onClick="loading(this)">Ya</button>
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
              </div>
          </div>
      </div>


      <div class="modal fade" id="EditUser" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Edit Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?=base_url('index.php/admin/edit_admin/');?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="hidden" name="url" class="form-control" id="editNama" value="<?=uri_string();?>">
                              <label for="editNama">Nama</label>
                              <input type="text" name="nama" class="form-control" id="editNama" value="<?=$this->session->userdata('nama');?>">
                          </div>
                          <div class="form-group">
                              <label for="editPassLama">Password Lama</label>
                              <input type="text" name="password_lama" class="form-control" id="editPassLama" placeholder="Password Lama">
                          </div>
                          <div class="form-group">
                              <label for="editPassbaru">Password Baru</label>
                              <input type="text" name="password_baru" class="form-control" id="editPassbaru" placeholder="Password Baru">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="position:fixed;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Koperasi UME MNASI</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url('assets');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets');?>/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets');?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script><!-- Select2 -->
<script src="<?=base_url('assets');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets');?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets');?>/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    var Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
    })
</script>
<script src="<?=base_url('assets');?>/dist/js/main.js"></script>

<?php if (isset($page) && $page == 'sibulan') { ?>
    <script>

        function kirimData(nilai, id, jenis, pilihan) {
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahSibulan');?>",
                data:{
                    id_anggota:id,
                    nilai:nilai,
                    jenis:jenis,
                    pilihan:pilihan,
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                }
            });
        }

        let saldoList;
        function loadData() {
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/DataAnggotaSibulan');?>",
                data:{
                    id_anggota:$('#id_anggota').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    saldoList = data.saldo_tiap_bulan_tampil;
                    $('#nilai_kredit').val('');
                    $('#nilai_saldo').val('');
                    $('#saldoValue').val(rupiah(data.saldo_tampil))
                    $('#kreditValue').val(rupiah(data.kredit))
                    $('#Bunga').val(data.bunga)
                    data.bunga_tiap_bulan = Object.values(data.bunga_tiap_bulan)
                    data.saldo_tiap_bulan_tampil = Object.values(data.saldo_tiap_bulan_tampil)
                    data.kredit_tiap_bulan = Object.values(data.kredit_tiap_bulan)
                    data.debet_tiap_bulan = Object.values(data.debet_tiap_bulan)
                    data.total_debet_tiap_bulan = Object.values(data.total_debet_tiap_bulan)
                    $('.saldo_0').html(rupiah(data.saldo_tiap_bulan_tampil[0]));
                    for (let i = 1; i < data.bunga_tiap_bulan.length; i++) {
                        $('.kredit_'+i).html(rupiah(data.kredit_tiap_bulan[i]));
                        $('.bunga_'+i).html(rupiah(data.bunga_tiap_bulan[i]));
                        $('.debet_'+i).html(rupiah(data.debet_tiap_bulan[i]));
                        $('.total_debet_'+i).html(rupiah(data.total_debet_tiap_bulan[i]));
                        $('.saldo_'+i).html(rupiah(data.saldo_tiap_bulan_tampil[i]));
                    }
                    $('.btn-plus-kredit-all')[0].dataset.kredit = data.saldo_tiap_bulan_tampil[$('#bulan').val() - 1]
                    $('.riwayat_sibulan').html('');
                    if (data.riwayat_sibulan.length < 1) {
                        $('.riwayat_sibulan').append(`
                            <tr>
                                <td colspan="4">No data available in table.</td>
                            </tr>
                        `)
                    }
                    for (let i = 0; i < data.riwayat_sibulan.length; i++) {
                        $('.riwayat_sibulan').append(`
                            <tr>
                                <td>${data.riwayat_sibulan[i].jenis}</td>
                                <td>${data.riwayat_sibulan[i].waktu}</td>
                                <td>${rupiah(data.riwayat_sibulan[i].jumlah)}</td>
                                <td>
                                    <button class="badge badge-primary" 
                                    data-jenis="${data.riwayat_sibulan[i].jenis}"
                                    data-jumlah="${data.riwayat_sibulan[i].jumlah}"
                                    data-tanggal="${data.riwayat_sibulan[i].tanggal}"
                                    data-bulan="${data.riwayat_sibulan[i].bulan}"
                                    data-tahun="${data.riwayat_sibulan[i].tahun}"
                                    data-id="${data.riwayat_sibulan[i].id_riwayat_sibulan}"
                                    onClick="editRiwayatSibulan(this)"><i class="fa fa-pen"></i></button>
                                </td>
                            </tr>
                        `)
                    }
                }
            });
        }

        loadData();

        $('.btn-plus-kredit-all').on('click', (e) => {
            $('#nilai_kredit').val(rupiah(e.currentTarget.dataset.kredit))
        })

        function editRiwayatSibulan(element) {
            console.log(element.dataset);
            if (element.dataset.jenis == "KREDIT") {
                $('.btn-plus-kredit').hide();
                $('.saldo-field').hide();
                $('.btn-edit-kredit').show();
                $('#id_anggota').attr('disabled', true);
                $('#tanggal').val(element.dataset.tanggal)
                $('#bulan')[0].selectedIndex = element.dataset.bulan - 1;
                $('#tahun').val(element.dataset.tahun)
                $('.simpan-edit-kredit')[0].dataset.id = element.dataset.id
                $('#nilai_kredit').val(rupiah(element.dataset.jumlah));
            }
            if (element.dataset.jenis == "SALDO") {
                $('.btn-plus-saldo').hide();
                $('.kredit-field').hide();
                $('.btn-edit-saldo').show();
                $('#id_anggota').attr('disabled', true);
                $('#tanggal').val(element.dataset.tanggal)
                $('#bulan')[0].selectedIndex = element.dataset.bulan - 1;
                $('#tahun').val(element.dataset.tahun)
                $('.simpan-edit-saldo')[0].dataset.id = element.dataset.id
                $('#nilai_saldo').val(rupiah(element.dataset.jumlah));
            }
        }

        function HapusSibulan(element) {
            $.ajax({
                url: "<?=base_url('index.php/admin/HapusSibulan');?>",
                data:{
                    id_sibulan:element.dataset.id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.modal-backdrop').remove();
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Dihapus'
                    })
                    loadData();
                }
            });
        }

        $('.batal-edit-kredit').on('click', function () {
            batalKredit();
        })

        $('#bulan').on('change',() =>{
            $('.btn-plus-kredit-all')[0].dataset.kredit = saldoList[$('#bulan').val() - 1]
        })
        $('.batal-edit-saldo').on('click', function () {
            batalSaldo();
        })

        function batalKredit() {
            $('#tanggal').val('<?=date('d');?>')
            $('#bulan')[0].selectedIndex = <?=date('m') - 1;?>;
            $('#tahun').val('<?=date('Y');?>') 
            $('.btn-plus-kredit').show();
            $('.saldo-field').show();
            $('.btn-edit-kredit').hide();
            $('#nilai_kredit').val('');
            $('#id_anggota').attr('disabled', false);
        }

        function batalSaldo() {
            $('#tanggal').val('<?=date('d');?>')
            $('#bulan')[0].selectedIndex = <?=date('m') - 1;?>;
            $('#tahun').val('<?=date('Y');?>') 
            $('.kredit-field').show();
            $('.btn-plus-saldo').show();
            $('.btn-edit-saldo').hide();
            $('#nilai_saldo').val('');
            $('#id_anggota').attr('disabled', false);
        }

        $('#id_anggota').on('change', function () {
            loadData();
        })

        $('.btn-minus-kredit').on('click', function () {
            kirimData($('#nilai_kredit').val(), $('#id_anggota').val(), 'kredit', 0);
        });

        $('.simpan-edit-kredit').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/EditSibulan');?>",
                data:{
                    id_sibulan:this.dataset.id,
                    nilai:$('#nilai_kredit').val(),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    batalKredit();
                    loadData();
                }
            });
        })

        $('.simpan-edit-saldo').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/EditSibulan');?>",
                data:{
                    id_sibulan:this.dataset.id,
                    nilai:$('#nilai_saldo').val(),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    batalSaldo();
                    loadData();
                }
            });
        })

        $('.btn-plus-kredit').on('click', function () {
            kirimData($('#nilai_kredit').val(), $('#id_anggota').val(), 'kredit', 1);
        });
        $('.btn-minus-saldo').on('click', function () {
            kirimData($('#nilai_saldo').val(), $('#id_anggota').val(), 'saldo', 0);
        });
        $('.btn-plus-saldo').on('click', function () {
            kirimData($('#nilai_saldo').val(), $('#id_anggota').val(), 'saldo', 1);
        });
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_anggota') { ?>
    <script>
        
        $('.no_buku').on('input', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/cekNoBuku');?>",
                data:{
                    no_buku : this.value,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.alert-buku').hide();
                    $('.btn-tambah-anggota-save').show();
                    if (data != null) {
                        $('.alert-buku').show();
                        $('.btn-tambah-anggota-save').hide();
                        $('.alert-buku').html(`Milik ${data.nama_anggota}`);
                    }
                }
            })
        })

        $('#no_buku_edit').on('input', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/cekNoBuku');?>",
                data:{
                    no_buku : this.value,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.alert-buku-edit').hide();
                    $('.btn-edit-anggota-save').show();
                    if (data != null && data.id != $('#id_anggota_edit').val()) {
                        $('.alert-buku-edit').show();
                        $('.btn-edit-anggota-save').hide();
                        $('.alert-buku-edit').html(`Milik ${data.nama_anggota}`);
                    }
                }
            })
        })

        
        $('.btn-hapus-anggota').on('click', (e) => {
            $('.nama-anggota').html(e.currentTarget.dataset.nama);
            $('.no-anggota').html(e.currentTarget.dataset.no);
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggota');?>",
                data:{
                    id_anggota:e.currentTarget.dataset.id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.pokok-detail').html('Rp. '+ rupiah(data.jumlah_pokok_des))
                    $('.wajib-detail').html('Rp. '+ rupiah(data.jumlah_wajib_des))
                    $('.sukarela-detail').html('Rp. '+ rupiah(data.jumlah_sukarela_des))
                    $('.total-simpanan').html('Rp. '+ rupiah(data.jumlah_tahun_ini_des))
                    $('.total-anggota').html('Rp. '+ rupiah(data.total_anggota))
                    $('.diambil-anggota').html('Rp. '+ rupiah(data.diambil))
                    $('.pinjaman-detail').html('Rp. 0')
                    $('.id-anggota-hapus').val(e.currentTarget.dataset.id)
                    if (data.riwayat_pinjaman.length > 0)
                        $('.pinjaman-detail').html('Rp. '+ rupiah(data.riwayat_pinjaman[data.riwayat_pinjaman.length - 1].sisa))
                }
            });
        })
        let listSaldo;
        $('.btn-hapus-anggota-sibulan').on('click', (e) => {
            $('.nama-anggota').val(e.currentTarget.dataset.nama);
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggotaSibulan');?>",
                data:{
                    id_anggota:e.currentTarget.dataset.id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.id-anggota-hapus').val(e.currentTarget.dataset.id)
                    listSaldo = data.saldo_tiap_bulan_bulatkan
                    $('.saldo').val(rupiah(listSaldo[$('#bulan_sibulan').val() - 1]))
                }
            });
        })
        $('#bulan_sibulan').on('change', () => {
            $('.saldo').val(rupiah(listSaldo[$('#bulan_sibulan').val() - 1]))
        })

        $('.diterima').on('input',() => {
            let diterima = parseInt($('.diterima').val().toString().replaceAll(',',''))
            let sisa = listSaldo[$('#bulan_sibulan').val() - 1] - diterima
            $('.sisa').val(rupiah(sisa));
        })

        $('.btn-edit').on('click', function () {
            $('.form-title').html('<b>Edit Anggota</b>')
            $('#nama_anggota_edit').val(this.dataset.nama);
            $('#id_anggota_edit').val(this.dataset.id)
            $('#tanggal_edit').val(this.dataset.tanggal)
            $('#bulan_edit')[0].selectedIndex = this.dataset.bulan - 1
            $('#tahun_edit').val(this.dataset.tahun)
            $('#no_buku_edit').val(this.dataset.no_buku)
            getData(this.dataset.id);
        })
        $('.btn-batal').on('click', function () {
            $('.form-title').html('<b>Tambah Anggota</b>')
        })

        function getData(id) {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggota');?>",
                data:{
                    id_anggota:id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('#simpanan_pokok_edit').val(data.total_pokok);
                    $('#uang_pangkal_edit').val(data.uang_pangkal);
                    $('#administrasi_pelayanan_edit').val(data.administrasi);
                }
            });
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_piutang') { ?>
    <script>
         function loadData() {
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/DataPiutangAnggota');?>",
                data:{
                    bulan:$('#bulan_pinjaman').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.daftar-piutang-anggota').html('');
                    for (let i = 0; i < data.anggota.length; i++) {
                        $('.daftar-piutang-anggota').append(`
                            <tr>
                                <td>${i + 1}</td>
                                <td>${data.anggota[i].no_buku}</td>
                                <td>${data.anggota[i].nama_anggota}</td>
                                <td>${rupiah(data.anggota[i].riwayat_pinjaman.sisa)}</td>
                                <td>${data.anggota[i].detail.waktu}</td>
                                <td>${data.anggota[i].detail.lama_pinjaman} Bulan</td>
                                <td>${data.anggota[i].detail.jatuh_tempo}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="getRiwayat(this)" data-id="${data.anggota[i].id_anggota}" data-nama="${data.anggota[i].nama_anggota}"> <i class="fa fa-list"></i></button>
                                    <a href="<?=base_url('index.php/cetak/riwayat_pinjaman_anggota_lalu/');?>${data.anggota[i].id_anggota}" class="btn btn-danger btn-sm"><i class="fa fa-sticky-note"></i></button>
                                </td>
                            </tr>
                        `)
                    }
                    $('.total-piutang').val(rupiah(data.total));
                }
            });
        }
        loadData();
        $('#bulan_pinjaman').on('change', () => {
            loadData();
        })
        $('.btn-close-riwayat').on('click', () => {
            $('.detail-riwayat').hide();
            $('.daftar-piutang').removeClass('col-lg-8');
            $('.daftar-piutang').addClass('col-lg-12');
        })
        function getRiwayat(param) {
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/DataAnggota');?>",
                data:{
                    id_anggota:param.dataset.id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.nama-anggota').html(param.dataset.nama);
                    $('.daftar-piutang').removeClass('col-lg-12');
                    $('.daftar-piutang').addClass('col-lg-8');
                    $('.detail-riwayat').show();
                    $('.riwayat-pinjaman').html('');
                    
                    for (let i = 0; i < data.riwayat_pinjaman.length; i++) {
                        $('.riwayat-pinjaman').append(`
                            <tr>
                                <td>${data.riwayat_pinjaman[i].waktu}</td>
                                <td>${rupiah(data.riwayat_pinjaman[i].besaran)}</td>
                                <td>${rupiah(data.riwayat_pinjaman[i].angsuran)}</td>
                                <td>${rupiah(data.riwayat_pinjaman[i].sisa)}</td>
                                <td>${data.riwayat_pinjaman[i].ket}</td>
                            </tr>
                        `)
                    }
                }
            })
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_sibulan') { ?>
    <script>

        function loadData() {
            let bulanSibulan = $('#bulan_sibulan').val();
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/DataSibulanAnggota');?>",
                data:{
                    bulan:bulanSibulan
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.daftar-sibulan-anggota').html('');
                    for (let i = 0; i < data.anggota.length; i++) {
                        $('.daftar-sibulan-anggota').append(`
                            <tr>
                                <td>${data.anggota[i].id_anggota_sibulan}</td>
                                <td>${data.anggota[i].nama_anggota}</td>
                                <td>${rupiah(data.anggota[i].detail.saldo_tiap_bulan_tampil[0])}</td>
                                <td>${rupiah(data.anggota[i].detail.bunga_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.debet_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.total_debet_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.kredit_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.saldo_tiap_bulan_tampil[bulanSibulan])}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="getSibulan(this)" data-id="${data.anggota[i].id_anggota_sibulan}" data-nama="${data.anggota[i].nama_anggota}"> <i class="fa fa-list"></i></button>
                                    <a href="<?=base_url('index.php/cetak/sibulan_anggota_lalu/');?>${data.anggota[i].id_anggota_sibulan}" class="btn btn-danger btn-sm"><i class="fa fa-sticky-note"></i></button>
                                </td>
                            </tr>
                        `)
                    }
                    $('.total-saldo-sibulan').val(rupiah(data.total_saldo_sibulan));
                    $('.total-kredit-sibulan').val(rupiah(data.total_kredit_sibulan));
                }
            });
        }

        loadData();

        $('#bulan_sibulan').on('change', () => {
            loadData();
        })

        $('.btn-close-sibulan').on('click', () => {
            $('.detail-sibulan').hide();
            $('.daftar-sibulan').removeClass('col-lg-8');
            $('.daftar-sibulan').addClass('col-lg-12');
        })

        function getSibulan(param) {
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/DataAnggotaSibulan');?>",
                data:{
                    id_anggota:param.dataset.id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.nama-anggota').html(param.dataset.nama);
                    $('.daftar-sibulan').removeClass('col-lg-12');
                    $('.daftar-sibulan').addClass('col-lg-8');
                    $('.detail-sibulan').show();

                    data.bunga_tiap_bulan = Object.values(data.bunga_tiap_bulan)
                    data.saldo_tiap_bulan_tampil = Object.values(data.saldo_tiap_bulan_tampil)
                    data.kredit_tiap_bulan = Object.values(data.kredit_tiap_bulan)
                    data.debet_tiap_bulan = Object.values(data.debet_tiap_bulan)
                    data.total_debet_tiap_bulan = Object.values(data.total_debet_tiap_bulan)
                    $('.saldo_0').html(rupiah(data.saldo_tiap_bulan_tampil[0]));
                    
                    for (let i = 1; i <= data.bunga_tiap_bulan.length; i++) {
                        $('.kredit_'+i).html(rupiah(data.kredit_tiap_bulan[i]));
                        $('.bunga_'+i).html(rupiah(data.bunga_tiap_bulan[i]));
                        $('.debet_'+i).html(rupiah(data.debet_tiap_bulan[i]));
                        $('.total_debet_'+i).html(rupiah(data.total_debet_tiap_bulan[i]));
                        $('.saldo_'+i).html(rupiah(data.saldo_tiap_bulan_tampil[i]));
                    }
                }
            })
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'laporan_sumsuk') { ?>
    <script>
        let data;
        
        function loadData() {
            $('.total-masuk').html('Loading...')
            $('.total-keluar').html('Loading...')
            $('.kas-bulan-ini').html('Loading...')
            $('#bulan_sibulan').attr('disabled', true)
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/dataSUMSUK');?>",
                data:{
                    bulan:12
                },
                method:'post',
                dataType:'json',
                success:function (dt) {
                    data = dt;
                    console.log(dt);
                    $('#bulan_sibulan').removeAttr('disabled')
                    if ($('.slip-masuk')[0].checked) {
                        loadDataSUM();
                    }
                    else{
                        loadDataSUK();
                    }
                }
            })
        }

        function loadDataSUM() {
            $('.uang-masuk-card').show();
            $('.uang-keluar-card').hide();
            
            
            for (let i = 1; i <= $('#bulan_sibulan').val(); i++) {
                $('.kas_bulan_'+i).html('Rp. '+data.kas_tiap_bulan[i]);
            }
            
            $('.total-keluar').html('Rp. '+rupiah(data.data[$('#bulan_sibulan').val()].keluar.total));
            $('.total-masuk').html('Rp. '+rupiah(data.data[$('#bulan_sibulan').val()].masuk.total));
            $('.kas-bulan-ini').html('Rp. '+data.data[$('#bulan_sibulan').val()].kas_bulan_ini);
            $('.kas').html('Rp. '+data.kas);
            $('.bulan-ket').html(data.bulan)
            $('.daftar-sum').html('');
            if (data.data[$('#bulan_sibulan').val()].masuk.anggota.length == 0 && data.data[$('#bulan_sibulan').val()].masuk.sibulan.length == 0 && data.data[$('#bulan_sibulan').val()].masuk.tak_terduga_masuk.length == 0) {
                $('.daftar-sum').append(`<tr class="odd"><td colspan="16" class="dataTables_empty" valign="top">No data available in table</td></tr>`)
            }
            for (let i = 0; i < data.data[$('#bulan_sibulan').val()].masuk.anggota.length; i++) {
                $('.daftar-sum').append(`
                    <tr>
                        <td>${i + 1}</td>
                        <td>${data.data[$('#bulan_sibulan').val()].masuk.anggota[i].no_buku}</td>
                        <td>${data.data[$('#bulan_sibulan').val()].masuk.anggota[i].nama_anggota}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].pokok)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].wajib)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].sukarela)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].uang_pangkal)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].piutang_anggota)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].administrasi_pelayanan)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].uang_buku)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].bunga)}</td>
                        <td>0</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].materai)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].provisi)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].dana_kematian)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].uang_konsumsi)}</td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.anggota[i].jumlah_masuk)}</td>
                    </tr>
                `)                        
            }
            if (data.data[$('#bulan_sibulan').val()].masuk.sibulan.length > 0) {        
                $('.daftar-sum').append(`
                    <tr>
                        <td colspan="2" rowspan="${data.data[$('#bulan_sibulan').val()].masuk.sibulan.length + 1}">Sibulan</td>
                    </tr>`
                )
            }
            for (let i = 0; i < data.data[$('#bulan_sibulan').val()].masuk.sibulan.length; i++) {
                $('.daftar-sum').append(`
                    <tr>
                        <td>${data.data[$('#bulan_sibulan').val()].masuk.sibulan[i].nama_anggota}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.sibulan[i].sibulan)}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.sibulan[i].sibulan)}</td>
                    </tr>`
                )
            }
            for (let i = 0; i < data.data[$('#bulan_sibulan').val()].masuk.tak_terduga_masuk.length; i++) {
                $('.daftar-sum').append(`
                    <tr>
                        <td colspan="3">${data.data[$('#bulan_sibulan').val()].masuk.tak_terduga_masuk[i].uraian}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.tak_terduga_masuk[i].jumlah)}</td>
                    </tr>`
                )
            }
            $('.daftar-sum').append(`
                <tr>
                    <td colspan="3">Jumlah</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[0])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[1])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[2])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[3])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[4])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[5])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[6])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[7])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[8])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[9])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[10])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[11])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.totalSUMArray[12])}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].masuk.total)}</td>
                </tr>`
            )
        }
        function loadDataSUK() {
            $('.uang-masuk-card').hide();
            $('.uang-keluar-card').show();
            for (let i = 1; i <= $('#bulan_sibulan').val(); i++) {
                $('.kas_bulan_'+i).html('Rp. '+data.kas_tiap_bulan[i]);
            }

            $('.total-keluar').html('Rp. '+rupiah(data.data[$('#bulan_sibulan').val()].keluar.total));
            $('.total-masuk').html('Rp. '+rupiah(data.data[$('#bulan_sibulan').val()].masuk.total));
            $('.kas-bulan-ini').html('Rp. '+data.data[$('#bulan_sibulan').val()].kas_bulan_ini);
            $('.kas').html('Rp. '+data.kas);
            if (data.data[$('#bulan_sibulan').val()].keluar.anggota.length > 0 || data.data[$('#bulan_sibulan').val()].keluar.tak_terduga_keluar.length > 0) {
                $('.daftar-suk').html('');
            }
            else{
                $('.daftar-suk').html('');
                $('.daftar-suk').append(`<tr class="odd"><td colspan="11" class="dataTables_empty" valign="top">No data available in table</td></tr>`);
            }

            $('.field-keluar').html('');
            if (data.data[$('#bulan_sibulan').val()].keluar.ket_jum_col > 0) {
                $('.field-keluar').html(`
                    <th rowspan="2">Uraian</th>
                    <th class="ket" colspan="${data.data[$('#bulan_sibulan').val()].keluar.ket_jum_col}">Keterangan</th>
                    <th rowspan="2">Pokok</th>
                    <th rowspan="2">Wajib</th>
                    <th rowspan="2">Sukarela</th>
                    <th rowspan="2">Pinjaman</th>
                    <th rowspan="2">Sibulan</th>
                    <th rowspan="2">Dana Kematian</th>
                    <th rowspan="2">Jumlah</th>`)
            }
            else{
                $('.field-keluar').html(`
                    <th rowspan="2">Uraian</th>
                    <th rowspan="2">Pokok</th>
                    <th rowspan="2">Wajib</th>
                    <th rowspan="2">Sukarela</th>
                    <th rowspan="2">Pinjaman</th>
                    <th rowspan="2">Sibulan</th>
                    <th rowspan="2">Dana Kematian</th>
                    <th rowspan="2">Jumlah</th>`)
            }
            
            let td = '';
            $('.keluar-thead').html('');
            for (let i = 0; i < data.data[$('#bulan_sibulan').val()].keluar.daftar_keterangan.length; i++) {
                if (data.data[$('#bulan_sibulan').val()].keluar.daftar_keterangan[i] !== 'Jumlah') {
                    $('.keluar-thead').append(`<th>${data.data[$('#bulan_sibulan').val()].keluar.daftar_keterangan[i]}</th>`)
                    td += '<td></td>'
                }
            }
            
            

            if (data.data[$('#bulan_sibulan').val()].keluar.tak_terduga_keluar.length > 0) {
                for (let i = 0; i < data.data[$('#bulan_sibulan').val()].keluar.tak_terduga_keluar.length; i++) {
                    $('.daftar-suk').append(`
                        <tr>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.tak_terduga_keluar[i].uraian}</td>
                            ${getKeterangan(data.data[$('#bulan_sibulan').val()].keluar.tak_terduga_keluar[i]['ket'], data.data[$('#bulan_sibulan').val()].keluar.daftar_keterangan)}
                        </tr>
                    `)
                }
            }

            if (data.data[$('#bulan_sibulan').val()].keluar.anggota.length > 0) {
                for (let i = 0; i < data.data[$('#bulan_sibulan').val()].keluar.anggota.length; i++) {
                    $('.daftar-suk').append(`
                        <tr>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].nama_anggota}</td>
                            ${td}
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].pokok}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].wajib}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].sukarela}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].pinjaman}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].sibulan}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].dana_kematian}</td>
                            <td>${data.data[$('#bulan_sibulan').val()].keluar.anggota[i].jumlah}</td>
                        </tr>
                    `)                        
                }
            }
            td = "";
            for (let i = 0; i < data.data[$('#bulan_sibulan').val()].keluar.ket_jum_col; i++) {
                td += `<td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray[i + 1])}</td>`
            }
            $('.daftar-suk').append(`
                <tr>
                    <td>Jumlah</td>
                    ${td}
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.pokok)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.wajib)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.sukarela)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.pinjaman)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.sibulan)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.totalSUKArray.dana_kematian)}</td>
                    <td>${rupiah(data.data[$('#bulan_sibulan').val()].keluar.total)}</td>
                </tr>
            `)
        }

        function getKeterangan(keterangan, daftarKeterangan) {
            let td = ''
            let jumlah = 0;
            for (let i = 0; i < daftarKeterangan.length; i++) {
                let ketemu = false
                for (let j = 0; j < keterangan.length; j++) {
                    if (keterangan[j].keterangan == daftarKeterangan[i]) {
                       if (daftarKeterangan[i] !== 'Jumlah') {
                           td += `<td>${rupiah(keterangan[j].jumlah)}</td>`
                       }
                       ketemu = true 
                       jumlah += parseInt(keterangan[j].jumlah)
                    }                   
                }
                if (ketemu == false && daftarKeterangan[i] !== 'Jumlah') {
                    td += '<td></td>'
                }
            }
            td += ` <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>${rupiah(jumlah)}</td>`
            return td;
        }

        loadData();

        $('#bulan_sibulan').on('change',() => {
            if ($('.slip-masuk')[0].checked) {
                loadDataSUM();
            }
            else{
                loadDataSUK();
            }
        })

        $('.slip-keluar').on('click',()=>{
            loadDataSUK();
        })
        $('.slip-masuk').on('click',()=>{
            loadDataSUM();
        })
    </script>
<?php } ?>

<script>
    function loading(element) {
        element.innerHTML = 'Loading...'
    }
</script>
</body>
</html>
