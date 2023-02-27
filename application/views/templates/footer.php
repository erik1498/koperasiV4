      
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
                          <a href="<?=base_url('index.php/auth/logout');?>" class="btn btn-danger">Logout</a>
                      </div>
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

<?php _cekKeyLoad($this->session->userdata('keyLoad')); ?>
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
<script src="<?=base_url('assets');?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
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

<script type="text/javascript">
  $('.validasiLKSBModal').hide();
  <?php if (!is_null($this->session->flashdata('validasiLKSB'))) { ?>
    $('.validasiLKSBModal').show();
  <?php } ?>

  $('.btnClosevalidasiLKSBModal').on('click', () => {
    $('.validasiLKSBModal').hide();
  });
  $('.loading').hide();
  $('.btn-loading').on('click', () => {
    $('.loading').show();
  })
  function loading() {
    $('.loading').show();
  }
</script>

<script src="<?=base_url('assets');?>/dist/js/main.js"></script>

<?php if (isset($page) && $page == 'transaksi_anggota') { ?>
    <script>
        let anggota_terpilih = 0;
        let sisa = 0;
        var riwayat_bulanan = [];
        function loadJumBulanIni() {
          $('.jum-bulan-ini-text').html(`<b>Riwayat Transaksi Simpanan Bulan ${$('#bulan')[0].options[$('#bulan')[0].options.selectedIndex].innerHTML}</b>`);
          if (riwayat_bulanan[$('#bulan').val()] === undefined) {
            $('.jum-bulan-ini').html('Tidak Ada');
          }else{
            $('.jum-bulan-ini').html('Rp. '+rupiah(riwayat_bulanan[$('#bulan').val()]));
          }
        }

        $('#bulan').on('change', ()=> {
          loadJumBulanIni();
        })
        function loadData() {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggota');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    let bulan = $('#bulan_pinjaman').val();
                    console.log(data);
                    riwayat_bulanan = data.riwayat_bulanan;
                    loadJumBulanIni();
                    if (data.detail_pinjaman !== null && data.detail_pinjaman.lunas === '0') {
                        $('.lama-pinjaman').val(data.detail_pinjaman.lama_pinjaman)
                        $('.waktu-pinjaman').val(data.detail_pinjaman.waktu)
                        $('#jatuh-tempo').val(data.detail_pinjaman.jatuh_tempo)
                        $('.waktuinfo').show();
                        // Pinjaman Field
                        $('.waktuisi').hide();
                        $('.pinjaman-field').hide();
                        $('.piutang-field').show();
                    }
                    else{
                        $('.lama-pinjaman').val('')
                        $('.waktu-pinjaman').val($('.waktu-pinjaman').data('waktu'))
                        $('.waktuisi').show();
                        $('.pinjaman-field').show();
                        $('.piutang-field').hide();
                    }
                    
                    $('.jumlah-pokok').html(data.jumlah_pokok)
                    $('.dana-kematian').html(data.jumlah_dana_kematian)
                    $('.jumlah-wajib').html(data.jumlah_wajib)
                    $('.jumlah-sukarela').html(data.jumlah_sukarela)
                    $('.jumlah-pokok-des').html(data.jumlah_pokok_des)
                    $('.jumlah-wajib-des').html(data.jumlah_wajib_des)
                    $('.jumlah-sukarela-des').html(data.jumlah_sukarela_des)
                    $('.pokok-tahun-lalu').html(data.pokok_tahun_lalu)
                    $('.wajib-tahun-lalu').html(data.wajib_tahun_lalu)
                    $('.sukarela-tahun-lalu').html(data.sukarela_tahun_lalu)
                    $('.jumlah-tahun-lalu').html(data.jumlah_tahun_lalu)
                    $('.jumlah-tahun-ini').html(data.jumlah_tahun_ini)
                    $('.jumlah-tahun-ini-des').html(data.jumlah_tahun_ini_des)
                    data.pokok = Object.values(data.pokok);
                    data.wajib = Object.values(data.wajib);
                    data.sukarela = Object.values(data.sukarela);
                    
                    for (let i = 0; i < data.pokok.length; i++) {
                        $('.pokok_'+(i+1)).html(rupiah(data.pokok[i]));
                        $('.wajib_'+(i+1)).html(rupiah(data.wajib[i]));
                        $('.sukarela_'+(i+1)).html(rupiah(data.sukarela[i]));
                    }
                    $('.riwayat-pinjaman').html('');
                    $('.daftar-riwayat-anggota').html('');
                    $('.daftar-riwayat-anggota-edit').html('');
                    
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
                        sisa = data.riwayat_pinjaman[i].sisa;
                    }

                    if (sisa == 0) {
                        $('.waktuinfo').show();
                        $('.waktuisi').show();
                    }
                    $('.daftar-riwayat-tarik-anggota').html('');
                    for (let i = 0; i < data.simpanan_riwayat.length; i++) {
                        $('.daftar-riwayat-anggota').append(`
                            <tr>
                                <td>${data.simpanan_riwayat[i].type}</td>
                                <td>${data.simpanan_riwayat[i].jenis}</td>
                                <td>${data.simpanan_riwayat[i].waktu}</td>
                                <td>${rupiah(data.simpanan_riwayat[i].jumlah)}</td>
                            </tr>
                        `)
                        if (data.simpanan_riwayat[i].type === 'TARIK') {
                            $('.daftar-riwayat-tarik-anggota').append(`
                                <tr>
                                    <td>${data.simpanan_riwayat[i].type}</td>
                                    <td>${data.simpanan_riwayat[i].jenis}</td>
                                    <td>${data.simpanan_riwayat[i].waktu}</td>
                                    <td>${rupiah(data.simpanan_riwayat[i].jumlah)}</td>
                                </tr>
                            `)
                        }
                    }

                    $('.riwayat-dana-kematian').html('');
                    for (let i = 0; i < data.simpanan_riwayat.length; i++) {
                        if (data.simpanan_riwayat[i].jenis === "DANA KEMATIAN" && data.simpanan_riwayat[i].tarik == 1) {
                            $('.riwayat-dana-kematian').append(`
                                <tr>
                                    <td>${data.simpanan_riwayat[i].ket}</td>
                                    <td>${data.simpanan_riwayat[i].waktu}</td>
                                </tr>
                            `)
                        }                        
                    }

                    for (let i = 0; i < data.simpanan_riwayat.length; i++) {
                        $('.daftar-riwayat-anggota-edit').append(`
                            <tr>
                                <td>${data.simpanan_riwayat[i].type}</td>
                                <td>${data.simpanan_riwayat[i].jenis}</td>
                                <td>${data.simpanan_riwayat[i].waktu}</td>
                                <td>${rupiah(data.simpanan_riwayat[i].jumlah)}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="editRiwayat(this);"
                                    data-jenis="${data.simpanan_riwayat[i].jenis}"
                                    data-id="${data.simpanan_riwayat[i].id}"
                                    data-tanggal="${data.simpanan_riwayat[i].tanggal}"
                                    data-bulan="${data.simpanan_riwayat[i].bulan}"
                                    data-tahun="${data.simpanan_riwayat[i].tahun}"
                                    data-jumlah="${rupiah(data.simpanan_riwayat[i].jumlah)}"
                                    data-ket="${data.simpanan_riwayat[i].ket}"
                                    data-lama="${data.simpanan_riwayat[i].lama_pinjaman}"
                                    data-tipe="${data.simpanan_riwayat[i].type}"
                                    >
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-${i}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="modal-hapus-${i}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Transaksi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Hapus Transaksi <b>${data.simpanan_riwayat[i].jenis}</b> Tanggal <b>${data.simpanan_riwayat[i].waktu}</b> ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-id="${data.simpanan_riwayat[i].id}" data-jenis="${data.simpanan_riwayat[i].jenis}" data-tanggal="'${data.simpanan_riwayat[i].waktu}'" onclick="HapusRiwayat(this)">Hapus Transaksi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `)
                    }

                    if (data.riwayat_pinjaman.length > 0) {
                        if (data.riwayat_pinjaman[data.riwayat_pinjaman.length - 1].sisa > 0)
                        {
                            $('#pinjaman_anggota')[0].value = '';
                            if (Object.values($('#piutang_anggota')).length > 0) {
                                $('.piutang-field').show();
                            }
                            $('#pinjaman_anggota')[0].value = rupiah(data.riwayat_pinjaman[data.riwayat_pinjaman.length - 1].sisa);  
                            $('#pinjaman_anggota').attr('disabled',true);
                            $('.pinjaman-field').hide();
                            $('.lama-pinjaman').attr('disabled',true);
                        }
                        else if (data.riwayat_pinjaman[data.riwayat_pinjaman.length - 1].sisa < 1)
                        {
                            $('#pinjaman_anggota')[0].value = '';  
                            $('.lama-pinjaman')[0].value = '';  
                            $('#pinjaman_anggota')[0].removeAttribute('disabled');  
                            $('.piutang-field').hide();
                            $('.pinjaman-field').show();
                            $('.lama-pinjaman')[0].removeAttribute('disabled');
                        }
                    }
                    else{
                        $('#pinjaman_anggota')[0].value = '';  
                        $('#pinjaman_anggota')[0].removeAttribute('disabled');  
                        $('.piutang-field').hide();
                        $('.lama-pinjaman')[0].removeAttribute('disabled');
                    }
                }
            });
        }
        
        loadData();

        function editRiwayat(element) {
            $('.btn-simpan-riwayat-edit').show();
            console.log(element.dataset);
            $('#tipe_riwayat').val(element.dataset.tipe)
            $('#jenis_riwayat').val(element.dataset.jenis)
            $('#tanggal_riwayat').val(element.dataset.tanggal)
            $('#bulan_riwayat')[0].selectedIndex = element.dataset.bulan - 1
            $('#tahun_riwayat').val(element.dataset.tahun)
            $('#jumlah_riwayat').val(element.dataset.jumlah)
            $('#id_riwayat').val(element.dataset.id)
            $('.ket-riwayat-field').hide();
            $('.lama-riwayat-field').hide();
            if (element.dataset.jenis === 'PIUTANG ANGGOTA' || element.dataset.jenis === 'DANA KEMATIAN') {
                $('.ket-riwayat-field').show();
                $('#ket_riwayat').val(element.dataset.ket)
            }
            if (element.dataset.jenis == 'PINJAMAN ANGGOTA') {
                $('.lama-riwayat-field').show();
                $('#lama_riwayat').val(element.dataset.lama)
            }
        }

        function HapusRiwayat(element) {
            $.ajax({
                url: "<?=base_url('index.php/admin/hapusRiwayat');?>",
                data:{
                    id:element.dataset.id,
                    jenis:element.dataset.jenis,
                    tanggal:element.dataset.tanggal
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      $('.modal-backdrop').remove();
                      Toast.fire({
                          icon: 'success',
                          title: 'Data Berhasil Di Hapus'
                      })
                      loadData();
                    }
                }
            });
        }

        $('.btn-tambah-pinjaman').on('click', () => {
            $('#pinjaman_anggota')[0].removeAttribute('disabled');  
            $('#pinjaman_anggota').val('');  
            $('.lama-pinjaman')[0].removeAttribute('disabled');
            $('.lama-pinjaman').val('')
            $('.waktu-pinjaman').val($('.waktu-pinjaman').data('waktu'))
            $('.waktuisi').show();
            $('.pinjaman-field').show();
            $('.piutang-field').hide();
        })
        
        $('.btn-simpan-tarik').on('click', ()=>{
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahSimpanan');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                    simpanan:{
                        dana_kematian:$('#dana_kematian_tarik').val(),
                    },
                    tanggal:$('#tahun').val()+'-'+$('#bulan').val()+'-'+$('#tanggal').val(),
                    ket:$('#ket_tarik').val(),
                    tarik: 1
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#ket_tarik').val('')
                  $('#dana_kematian_tarik').val('');
                  $('#dana_kematian_tarik')[0].focus();
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                  }
                }
            });
        })

        $('.btn-simpan-simpanan').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahSimpanan');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                    simpanan:{
                        simpanan_wajib:$('#simpanan_wajib')[0].value,
                        simpanan_sukarela:$('#simpanan_sukarela')[0].value,
                    },
                    tanggal:$('#tahun').val()+'-'+$('#bulan').val()+'-'+$('#tanggal').val(),
                    ket:''
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#simpanan_wajib')[0].value = ''
                  $('#simpanan_sukarela')[0].value = ''
                  $('#simpanan_wajib')[0].focus();
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                  }
                }
            });
        });

        $('.btn-simpan-piutang').on('click', function () {
            let valuePiutang = $('#piutang_anggota')[0].style.color === 'red' ? 0 : $('#piutang_anggota').val();
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahSimpanan');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                    simpanan:{
                        piutang_anggota:valuePiutang,
                    },
                    ket: $('#ket-piutang').val(),
                    tanggal:$('#tahun_piutang').val()+"-"+$('#bulan_piutang').val()+"-"+$('#tanggal_piutang').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#piutang_anggota').val('')
                  $('#tanggal_piutang').val('<?=$_SESSION['hari'];?>')
                  $('#bulan_piutang')[0].selectedIndex = '<?=$_SESSION['bulan'] - 1;?>'
                  $('#tahun_piutang').val('<?=$_SESSION['tahun'];?>')
                  $('#tanggal_piutang')[0].focus();
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    if (valuePiutang != '0') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil Di Simpan'
                        })
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: 'Data Melebihi Pinjaman'
                        })
                    }
                    loadData();
                  }
                }
            });
        });

        $('.btn-simpan-pinjaman').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahPinjaman');?>",
                data:{
                    id_anggota:$('#id_anggota').find(":selected").val(),
                    lama_pinjaman:$('.lama-pinjaman').val(),
                    pinjaman:{
                        pinjaman_anggota:$('#pinjaman_anggota')[0].disabled != false ? 0 : $('#pinjaman_anggota')[0].value
                    },
                    tanggal:$('#tanggal_pinjaman').val(),
                    bulan:$('#bulan_pinjaman').val(),
                    tahun:$('#tahun_pinjaman').val(),
                    ket:$('.ket-pinjaman').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#tanggal_pinjaman').val('<?=$_SESSION['hari'];?>')
                  $('#bulan_pinjaman')[0].selectedIndex = '<?=$_SESSION['bulan'] - 1;?>'
                  $('#tahun_pinjaman').val('<?=$_SESSION['tahun'];?>')
                  $('.lama-pinjaman').val('');
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                  }
                }
            });
        });

        $('.btn-simpan-transaksi-lainnya').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahSimpanan');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                    simpanan:{
                        uang_buku:$('#uang_buku').val(),
                        bunga:$('#bunga').val(),
                        materai:$('#materai').val(),
                        provisi:$('#provisi').val(),
                        dana_kematian:$('#dana_kematian').val(),
                        uang_konsumsi:$('#uang_konsumsi').val(),
                    },
                    tanggal:$('#tahun').val()+'-'+$('#bulan').val()+'-'+$('#tanggal').val(),
                    ket: ''
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#uang_buku')[0].value = ''
                  $('#bunga')[0].value = ''
                  $('#materai')[0].value = ''
                  $('#provisi')[0].value = ''
                  $('#dana_kematian')[0].value = ''
                  $('#uang_konsumsi')[0].value = ''
                  $('#uang_buku')[0].focus();
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    console.log(data);
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                  }
                }
            });
        })

        $('.btn-cetak-buku').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/CetakBuku');?>",
                data:{
                    id_anggota:$('#id_anggota').val(),
                    tanggal:$('#tanggal').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    loadData();
                }
            });
        });

        $('.btn-pinjaman').on('click', function () {
            $('.tgl-simpanan').hide();
            $('.simpanan-info').hide();
            $('.pinjaman-info').show();
            $('.tarik-info').hide();
            $('.transaksi-info').hide();
        })

        $('.btn-tarik').on('click', function () {
            $('.simpanan-info').hide();
            $('.pinjaman-info').hide();
            $('.tarik-info').show();
            $('.transaksi-info').hide();
        })

        $('.btn-transaksi-edit').on('click', function () {
            $('.btn-simpan-riwayat-edit').hide();
            $('.tgl-simpanan').hide();
            $('.simpanan-info').hide();
            $('.transaksi-info').show();
        })

        $('.btn-simpanan').on('click', function () {
            $('.tgl-simpanan').show();
            $('.simpanan-info').show();
            $('.pinjaman-info').hide();
            $('.tarik-info').hide();
            $('.transaksi-info').hide();
        })

        $('.btn-simpan-riwayat-edit').on('click', function () {
            $.ajax({
                url: "<?=base_url('index.php/admin/editRiwayat');?>",
                data:{
                    id_anggota:$('#id_anggota')[0].value,
                    jenis:$('#jenis_riwayat').val(),
                    tanggal:$('#tanggal_riwayat').val(),
                    bulan:$('#bulan_riwayat').val(),
                    tahun:$('#tahun_riwayat').val(),
                    jumlah:$('#jumlah_riwayat').val(),
                    ket:$('#ket_riwayat').val(),
                    id:$('#id_riwayat').val(),
                    lama:$('#lama_riwayat').val(),
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jenis_riwayat').val(''),
                    $('#tanggal_riwayat').val(''),
                    $('#bulan_riwayat').val(''),
                    $('#tahun_riwayat').val(''),
                    $('#jumlah_riwayat').val(''),
                    $('#ket_riwayat').val(''),
                    $('#id_riwayat').val(''),
                    $('#lama_riwayat').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      Toast.fire({
                          icon: 'success',
                          title: 'Data Berhasil Di Simpan'
                      })
                      loadData();
                    }
                    $('.btn-simpan-riwayat-edit').hide();
                }
            });
        })

        $('.pinjaman').on('click', function () {
            $('.nama-anggota').val($('#id_anggota').find(":selected").text())
        })

        $('#id_anggota').on('change', function () {
            anggota_terpilih = $('#id_anggota').val()
            loadData();
        })

        $('#piutang_anggota').on('input', function () {
            $('#piutang_anggota').css({'color':''})
            if (parseInt($('#piutang_anggota').val().toString().replaceAll(',','')) > sisa)
            {
                $('#piutang_anggota').css({'color':'red'})
            }
        })

        $('.lama-pinjaman').on('input', function () {
            hitungBulan();
        })

        function hitungBulan() {
            $.ajax({
                url: "<?=base_url('index.php/admin/hitungjatuhTempo');?>",
                data:{
                    lama_pinjaman:$('.lama-pinjaman').val(),
                    tanggal:$('#tanggal_pinjaman').val(),
                    bulan:$('#bulan_pinjaman').val(),
                    tahun:$('#tahun_pinjaman').val(),
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jatuh-tempo').val(data.jatuhTempoHitung)
                    $('.waktu-pinjaman').val(data.waktu)
                    $('.waktu-pinjaman')[0].dataset.waktu = data.waktu
                }
            });
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'transaksi_tak_terduga') { ?>
    <script>
        $('#uraian-masuk').focus();
        $('#uraian-keluar').hide();
        $('.keterangan-keluar-form').hide();
        $('.tak-terduga-keluar').on('input', function () {
            keluartampil();
        })
        $('.tak-terduga-masuk').on('input', function () {
            masuktampil();
        })

        function keluartampil() {
            $('#uraian-masuk').hide();
            $('#uraian-keluar').show();
            $('.keterangan-keluar-form').show();
            $('#jumlah').val('');
            $('#uraian-keluar').focus();
        }

        function masuktampil() {
            $('#uraian-masuk').show();
            $('#uraian-masuk').focus();
            $('#uraian-keluar').hide();
            $('#jumlah').val('');
            $('.keterangan-keluar-form').hide();
        }
        
        loadData()
        function loadData() {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataTakTerduga');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-takterduga-masuk').html('');
                    for (let i = 0; i < data.masuk.length; i++) {
                        if(data.masuk[i].id_tak_terduga_masuk) {
                            $('.riwayat-takterduga-masuk').append(`
                                <tr>
                                    <td>${data.masuk[i].uraian}</td>
                                    <td>${rupiah(data.masuk[i].jumlah)}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editTransaksiMasuk(this);"
                                        data-uraian="${data.masuk[i].uraian}"
                                        data-jumlah="${rupiah(data.masuk[i].jumlah)}"
                                        data-id="${data.masuk[i].id_tak_terduga_masuk}"
                                        data-tanggal="${data.masuk[i].tanggal}"
                                        data-bulan="${data.masuk[i].bulan}"
                                        data-tahun="${data.masuk[i].tahun}"
                                        >
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-${data.masuk[i].id_tak_terduga_masuk}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="modal-hapus-${data.masuk[i].id_tak_terduga_masuk}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Transaksi</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus Transaksi Masuk <b>${data.masuk[i].uraian}</b> ?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger" data-tipe="masuk" data-dismiss="modal" data-id="${data.masuk[i].id_tak_terduga_masuk}" onclick="HapusTakTerduga(this)">Hapus Transaksi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        }
                        else {
                            $('.riwayat-takterduga-masuk').append(`
                                <tr>
                                    <td>${data.masuk[i].uraian}</td>
                                    <td>${rupiah(data.masuk[i].jumlah)}</td>
                                    <td>${data.masuk[i].sumber}</td>
                                </tr>
                            `);
                        }
                    }

                  

                    $('.riwayat-takterduga-keluar').html('');
                    for (let i = 0; i < data.keluar.length; i++) {
                        if(data.keluar[i].id_tak_terduga_keluar) {
                            $('.riwayat-takterduga-keluar').append(`
                                <tr>
                                    <td>${data.keluar[i].uraian}</td>
                                    <td>${data.keluar[i].keterangan}</td>
                                    <td>${rupiah(data.keluar[i].jumlah)}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editTransaksiKeluar(this);"
                                        data-uraian="${data.keluar[i].uraian}"
                                        data-jumlah="${rupiah(data.keluar[i].jumlah)}"
                                        data-keterangan="${data.keluar[i].keterangan}"
                                        data-id="${data.keluar[i].id_tak_terduga_keluar}"
                                        data-tanggal="${data.keluar[i].tanggal}"
                                        data-bulan="${data.keluar[i].bulan}"
                                        data-tahun="${data.keluar[i].tahun}"
                                        >
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-${data.keluar[i].id_tak_terduga_keluar}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="modal-hapus-${data.keluar[i].id_tak_terduga_keluar}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Transaksi</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus Transaksi Keluar <b>${data.keluar[i].uraian}</b> ?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger" data-tipe="keluar" data-dismiss="modal" data-id="${data.keluar[i].id_tak_terduga_keluar}" onclick="HapusTakTerduga(this)">Hapus Transaksi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        }
                        else {
                            $('.riwayat-takterduga-keluar').append(`
                                <tr>
                                    <td>${data.keluar[i].uraian}</td>
                                    <td>${data.keluar[i].keterangan}</td>
                                    <td>${rupiah(data.keluar[i].jumlah)}</td>
                                    <td>${data.keluar[i].sumber}</td>
                                </tr>
                            `);
                        }
                    }
                }
            });

        }
        function HapusTakTerduga(element) {
            $.ajax({
                url: "<?=base_url('index.php/admin/HapusTakTerduga');?>",
                data:{
                    id:element.dataset.id,
                    jenis:element.dataset.tipe
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      $('.modal-backdrop').remove();
                      Toast.fire({
                          icon: 'success',
                          title: 'Data Berhasil Di Hapus'
                      })
                      loadData();
                    }
                }
            });
        }
        $('#bulan_tampil').on('change', function () {
            loadData();
        })

        function editTransaksiMasuk(element) {
            masuktampil();
            $('.tak-terduga-masuk')[0].checked = true;
            $('#tanggal').val(element.dataset.tanggal)
            $('#bulan')[0].selectedIndex = element.dataset.bulan - 1
            $('#tahun').val(element.dataset.tahun)
            $('#uraian-masuk').val(element.dataset.uraian)
            $('#jumlah').val(element.dataset.jumlah)
            $('.btn-batal').show()
            $('.btn-validasi').removeClass('col-lg-12')
            $('.btn-validasi').addClass('col-lg-6')
            $('.btn-simpan-tak-terduga')[0].dataset.id = element.dataset.id
        }

        function editTransaksiKeluar(element) {
            keluartampil();
            $('.tak-terduga-keluar')[0].checked = true;
            $('#tanggal').val(element.dataset.tanggal)
            $('#bulan')[0].selectedIndex = element.dataset.bulan - 1
            $('#tahun').val(element.dataset.tahun)
            $('#uraian-keluar').val(element.dataset.uraian)
            $('#keterangan-keluar').val(element.dataset.keterangan)
            $('#jumlah').val(element.dataset.jumlah)
            $('.btn-validasi').removeClass('col-lg-12')
            $('.btn-validasi').addClass('col-lg-6')
            $('.btn-batal').show()
            $('.btn-simpan-tak-terduga')[0].dataset.id = element.dataset.id
        }

        function batalTampil() {
            $('#tanggal').val('<?= $_SESSION['hari']; ?>')
            $('#bulan')[0].selectedIndex = <?= $_SESSION['bulan'] - 1; ?>;
            $('#tahun').val('<?= $_SESSION['tahun']; ?>')
            $('#uraian-masuk').val('')
            $('#uraian-keluar').val('')
            $('#keterangan-keluar').val('')
            $('#jumlah').val('')
            $('.btn-validasi').removeClass('col-lg-6')
            $('.btn-validasi').addClass('col-lg-12')
            $('.btn-batal').hide()
            $('.btn-simpan-tak-terduga')[0].dataset.id = ''
        }

        $('.btn-batal').on('click', () => {
            batalTampil()
        })

        $('.btn-simpan-tak-terduga').on('click', function () {
            let dataInput;
            if ($('.tak-terduga-masuk')[0].checked) {
                dataInput = {
                    uraian:$('#uraian-masuk').val(),
                    jumlah:$('#jumlah').val(),
                    jenis:'masuk',
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    edit:this.dataset.id
                }
                $('#uraian-masuk').val('');
                $('#uraian-masuk').focus();
                $('#jumlah').val('');
            }
            if ($('.tak-terduga-keluar')[0].checked) {
                dataInput = {
                    uraian:$('#uraian-keluar').val(),
                    keterangan:$('#keterangan-keluar').val(),
                    jumlah:$('#jumlah').val(),
                    jenis:'keluar',
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    edit:this.dataset.id
                }
                $('#keterangan-keluar').val('');
                $('#uraian-keluar').val('');
                $('#uraian-keluar').focus();
                $('#jumlah').val('');
            }
            $.ajax({
                url: "<?=base_url('index.php/admin/TambahTakTerduga');?>",
                data:{
                    dataInput:dataInput
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  batalTampil()
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan'
                    })
                    loadData();
                  }
                }
            });
        })
    </script>
<?php } ?>
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
                url: "<?=base_url('index.php/admin/DataAnggotaSibulan');?>",
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
                        $('.kredit_'+i).html(rupiah(Math.round(data.kredit_tiap_bulan[i])));
                        $('.bunga_'+i).html(data.bunga_tiap_bulan[i]);
                        $('.debet_'+i).html(data.debet_tiap_bulan[i]);
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
                                    <button class="badge badge-danger" data-toggle="modal" data-target="#modal-hapus-${data.riwayat_sibulan[i].id_riwayat_sibulan}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="modal-hapus-${data.riwayat_sibulan[i].id_riwayat_sibulan}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Transaksi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Hapus <b>${data.riwayat_sibulan[i].jenis}</b> Pada Tanggal ${data.riwayat_sibulan[i].waktu} ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-id="${data.riwayat_sibulan[i].id_riwayat_sibulan}" onclick="HapusSibulan(this)">Hapus Transaksi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
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
            $('#tanggal').val('<?=$_SESSION['hari'];?>')
            $('#bulan')[0].selectedIndex = <?=$_SESSION['bulan'] - 1;?>;
            $('#tahun').val('<?=$_SESSION['tahun'];?>') 
            $('.btn-plus-kredit').show();
            $('.saldo-field').show();
            $('.btn-edit-kredit').hide();
            $('#nilai_kredit').val('');
            $('#id_anggota').attr('disabled', false);
        }

        function batalSaldo() {
            $('#tanggal').val('<?=$_SESSION['hari'];?>')
            $('#bulan')[0].selectedIndex = <?=$_SESSION['bulan'] - 1;?>;
            $('#tahun').val('<?=$_SESSION['tahun'];?>') 
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
                    $('#tanggungan_edit').val(rupiah(data.tanggungan));
                }
            });
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_piutang') { ?>
    <script>
         function loadData() {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataPiutangAnggota');?>",
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
                                <td>${rupiah(data.anggota[i].sisa)}</td>
                                <td>${data.anggota[i].detail.waktu}</td>
                                <td>${data.anggota[i].detail.lama_pinjaman} Bulan</td>
                                <td>${data.anggota[i].detail.jatuh_tempo}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="getRiwayat(this)" data-id="${data.anggota[i].id_anggota}" data-nama="${data.anggota[i].nama_anggota}"> <i class="fa fa-list"></i></button>
                                    <a onClick="loading()" href="<?=base_url('index.php/cetak/riwayat_pinjaman_anggota/');?>${data.anggota[i].id_anggota}" class="btn btn-danger btn-sm" onClick="loading()"><i class="fa fa-sticky-note"></i></button>
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
                url: "<?=base_url('index.php/admin/DataAnggota');?>",
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
                url: "<?=base_url('index.php/admin/DataSibulanAnggota');?>",
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
                                <td>${i + 1}</td>
                                <td>${data.anggota[i].nama_anggota}</td>
                                <td>${rupiah(data.anggota[i].detail.saldo_tiap_bulan_tampil[0])}</td>
                                <td>${rupiah(data.anggota[i].detail.bunga_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.debet_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.total_debet_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.kredit_tiap_bulan[bulanSibulan])}</td>
                                <td>${rupiah(data.anggota[i].detail.saldo_tiap_bulan_tampil[bulanSibulan])}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="getSibulan(this)" data-id="${data.anggota[i].id_anggota_sibulan}" data-nama="${data.anggota[i].nama_anggota}"> <i class="fa fa-list"></i></button>
                                    <a href="<?=base_url('index.php/cetak/sibulan_anggota/');?>${data.anggota[i].id_anggota_sibulan}" class="btn btn-danger btn-sm" onClick="loading()"><i class="fa fa-sticky-note"></i></button>
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
                url: "<?=base_url('index.php/admin/DataAnggotaSibulan');?>",
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
                        $('.kredit_'+i).html(rupiah(Math.round(data.kredit_tiap_bulan[i])));
                        $('.bunga_'+i).html(data.bunga_tiap_bulan[i]);
                        $('.debet_'+i).html(rupiah(data.debet_tiap_bulan[i]));
                        $('.total_debet_'+i).html(rupiah(data.total_debet_tiap_bulan[i]));
                        $('.saldo_'+i).html(rupiah(data.saldo_tiap_bulan_tampil[i]));
                    }
                }
            })
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_bulansaham') { ?>
    <script>

        function loadData() {
            let bulanSibulan = $('#bulan_saham').val();
            $.ajax({
                url: "<?=base_url('index.php/admin/DataBulanSahamAnggota');?>",
                data:{
                    bulan:bulanSibulan
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.daftar-bulan-saham-anggota').html('');
                    for (let i = 0; i < data.anggota.length; i++) {
                        $('.daftar-bulan-saham-anggota').append(`
                            <tr>
                                <td>${i + 1}</td>
                                <td>${data.anggota[i].no_buku}</td>
                                <td>${data.anggota[i].nama_anggota}</td>
                                <td>${data.anggota[i].detail.jumlah_uang}</td>
                                <td>${data.anggota[i].detail.jumlah_saham}</td>
                                <td>${rupiah(data.anggota[i].detail.bulan_saham)}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="getBulanSaham(this)" data-id="${data.anggota[i].id_anggota}" data-nama="${data.anggota[i].nama_anggota}"> <i class="fa fa-list"></i></button>
                                    <a href="<?=base_url('index.php/cetak/bulansaham_anggota/');?>${data.anggota[i].id_anggota}" class="btn btn-danger btn-sm" onClick="loading()"><i class="fa fa-sticky-note"></i></button>
                                </td>
                            </tr>
                        `)
                    }
                    $('.total-uang').val(rupiah(data.total_uang));
                    $('.total-saham').val(rupiah(data.total_saham));
                    $('.total-bulanSaham').val(rupiah(data.total_bulanSaham));
                    $('.loading').hide();
                }
            });
        }

        loadData();

        $('#bulan_saham').on('change', () => {
            loading();
            loadData();
        })

        $('.btn-close-sibulan').on('click', () => {
            $('.detail-sibulan').hide();
            $('.daftar-sibulan').removeClass('col-lg-8');
            $('.daftar-sibulan').addClass('col-lg-12');
        })

        function getBulanSaham(param) {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggotaBulanSaham');?>",
                data:{
                    id_anggota:param.dataset.id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.nama-anggota').html(param.dataset.nama);
                    $('.daftar-sibulan').removeClass('col-lg-12');
                    $('.daftar-sibulan').addClass('col-lg-8');
                    $('.detail-sibulan').show();

                    $('.bulanSaham_0').html(data.bulan_saham[0]);
                    $('.bulanSaham_tahun_lalu').html(rupiah(data.bulan_saham_tahun_lalu));
                    $('.uang_0').html(data.jumlah_uang[0]);
                    $('.saham_0').html(data.jumlah_saham[0]);
                    
                    for (let i = 1; i <= 12; i++) {
                        $('.uang_'+i).html(data.jumlah_uang[i]);
                        $('.saham_'+i).html(data.jumlah_saham[i]);
                        $('.bulanSaham_'+i).html(data.bulan_saham[i]);
                    }
                    $('.uang_des').html(data.jumlah_uang['des']);
                    $('.saham_des').html(data.jumlah_saham['des']);
                    $('.bulanSaham_des').html(data.bulan_saham['des']);
                }
            })
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_bagiSHU') { ?>
    <script>
        function loadData() {
            let bulanSibulan = $('#bulan_saham').val();
            loading()
            // let bulanSibulan = 1;
            $.ajax({
                url: "<?=base_url('index.php/admin/DataBagiSHUAnggota');?>",
                data:{
                    bulan:bulanSibulan
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    cekValidasiBulanSaham()
                    // console.log(data);
                    $('.loading').hide();
                    $('.shu').html('Rp. '+data.SHUBulanSaham)
                    $('.jasa').html('Rp. '+data.BagianJasa)
                    $('.bjs').html('Rp. '+data.BJS)
                    $('.bjp').html('Rp. '+data.BJP)
                    $('.dcu').html('Rp. '+data.DCU)
                    $('.dcr').html('Rp. '+data.DCR)
                    $('.pengurus').html('Rp. '+data.Dana_Pengurus)
                    $('.total_di_terima').html('Rp. '+data.total_di_terima_bulatkan)
                    $('.total_sisa').html('Rp. '+data.total_sisa)

                    $('.daftar-bagiSHU').html('');
                    for (let i = 0; i < data.anggota.length; i++) {
                        $('.daftar-bagiSHU').append(`
                            <tr>
                                <td>${i + 1}</td>
                                <td>${data.anggota[i].no_buku}</td>
                                <td>${data.anggota[i].nama_anggota}</td>
                                <td>${data.anggota[i].detail.jumlah_saham}</td>
                                <td>${data.anggota[i].detail.bulan_saham}</td>
                                <td>${data.anggota[i].detail.bjs}</td>
                                <td>${data.anggota[i].detail.bjp}</td>
                                <td>${data.anggota[i].detail.total_di_terima}</td>
                                <td>${data.anggota[i].detail.diterima}</td>
                                <td>${data.anggota[i].detail.sisa}</td>
                            </tr>
                        `)
                    }
                    $('.total-saham').val(rupiah(data.total_saham));
                    $('.total-bulanSaham').val(rupiah(data.total_bulanSaham));
                    $('.total-bjs').val(data.total_bjs);
                    $('.total-bjp').val(rupiah(data.total_bjp));
                    $('.loading').hide();
                }
            });
        }

        loadData();

        $('#bulan_saham').on('change', () => {
            loading();
            loadData();
        })

        $('.btn-close-sibulan').on('click', () => {
            $('.detail-sibulan').hide();
            $('.daftar-sibulan').removeClass('col-lg-8');
            $('.daftar-sibulan').addClass('col-lg-12');
        })

        $('.btn-validasi-bagi_SHU').on('click', () => {
          $.ajax({
              url: "<?=base_url('index.php/admin/validasiBulanSaham');?>",
              data:{
                  
              },
              method:'post',
              dataType:'json',
              success:function (data) {
                  cekValidasiBulanSaham()
                  $('.loading').hide();
              }
          })
        })

        $('.btn-batalvalidasi-bagi_SHU').on('click', () => {
         $.ajax({
              url: "<?=base_url('index.php/admin/validasiBulanSaham');?>",
              data:{
                  batal:true
              },
              method:'post',
              dataType:'json',
              success:function (data) {
                  cekValidasiBulanSaham()
                  loadData();
              }
          })
        })

        function cekValidasiBulanSaham() {
          $('.btn-validasi-bagi_SHU').hide();
          $('.btn-batalvalidasi-bagi_SHU').hide();
          $.ajax({
              url: "<?=base_url('index.php/admin/cekvalidasiBulanSaham');?>",
              data:{
                  tahun:$('#bulan_saham').val() > 0 ? <?= $_SESSION['tahun'] ?> : <?= $_SESSION['tahun'] - 1 ?>
              },
              method:'post',
              dataType:'json',
              success:function (data) {
                if ($('#bulan_saham').val() == 12) {
                  if (data == true) {                
                    $('.btn-validasi-bagi_SHU').hide();
                    $('.btn-batalvalidasi-bagi_SHU').show();
                  }
                  else {
                    $('.btn-validasi-bagi_SHU').show();
                    $('.btn-batalvalidasi-bagi_SHU').hide();
                  }
                }
              }
          })
        }

        function getBulanSaham(param) {
            $.ajax({
                url: "<?=base_url('index.php/admin/DataAnggotaBulanSaham');?>",
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

                    $('.bulanSaham_0').html(data.bulan_saham[0]);
                    $('.bulanSaham_tahun_lalu').html(rupiah(data.bulan_saham_tahun_lalu));
                    $('.uang_0').html(data.jumlah_uang[0]);
                    $('.saham_0').html(data.jumlah_saham[0]);
                    
                    for (let i = 1; i <= 12; i++) {
                        $('.uang_'+i).html(data.jumlah_uang[i]);
                        $('.saham_'+i).html(data.jumlah_saham[i]);
                        $('.bulanSaham_'+i).html(data.bulan_saham[i]);
                    }
                    $('.uang_des').html(data.jumlah_uang['des']);
                    $('.saham_des').html(data.jumlah_saham['des']);
                    $('.bulanSaham_des').html(data.bulan_saham['des']);
                }
            })
        }
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'daftar_lksb') { ?>
    <script>
        $('.btn-print').on('click', ()=> {
          window.location = "<?=base_url();?>index.php/cetak/lksb/"+$('#bulan_tampil').val()
        });
        $('.btn-print-lksb-tahunan').on('click', ()=> {
          window.location = "<?=base_url();?>index.php/cetak/lksb_tahunan"
        });
        var data = [];
        async function loadData() {
            $('#bulan_tampil').attr('disabled', true);
            $('.datashow').hide();
            $('.loadtext').show();
            
            $('.btn-validasi').hide();
            $('.btn-batal-validasi').hide();
            $('.btn-print').hide();
            $('.message-box').html(`
            <h1>Sedang Memuat LKSB Bulan</h1>
            <br>
            <h2 class="bulantampiltext">${$('#bulan_tampil')[0].options[$('#bulan_tampil')[0].options.selectedIndex].innerHTML} Tahun `+<?= $_SESSION['tahun'] ?>+`</h2>`)


            // if (data[$('#bulan_tampil').val()] === undefined) {
            //   await $.ajax({
            //       url: "<?=base_url('index.php/admin/DataLKSB');?>",
            //       data:{
            //           bulan:$('#bulan_tampil').val()
            //       },
            //       method:'post',
            //       dataType:'json',
            //       success:(receive) => {
            //           data[$('#bulan_tampil').val()] = receive
            //           i = $('#bulan_tampil').val();
            //       }
            //   })
            // }
            // if (data[$('#bulan_tampil').val() - 1] === undefined) {
            //   await $.ajax({
            //       url: "<?=base_url('index.php/admin/DataLKSB');?>",
            //       data:{
            //           bulan:$('#bulan_tampil').val() - 1
            //       },
            //       method:'post',
            //       dataType:'json',
            //       success:(receive) => {
            //           data[$('#bulan_tampil').val() - 1] = receive
            //           i = $('#bulan_tampil').val();
            //       }
            //   })
            // }
            let validTahunLalu = true;
            for (let bulan_i = $('#bulan_tampil').val(); bulan_i <= $('#bulan_tampil').val(); bulan_i++) {
                if (data[bulan_i] === undefined || data[bulan_i - 1] === undefined) {
                  await $.ajax({
                      url: "<?=base_url('index.php/admin/DataLKSB');?>",
                      data:{
                          bulan:bulan_i
                      },
                      method:'post',
                      dataType:'json',
                      success:(receive) => {
                          if (receive !== null) {
                            if ($('#bulan_tampil').val() == 12) {
                              $('.btn-lksb-tahunan').show();
                              $('.btn-print-lksb-tahunan').show();
                            }else{
                              $('.btn-lksb-tahunan').hide();
                              $('.btn-print-lksb-tahunan').hide();
                            }
                            let key = Object.keys(receive);
                            for(i in key){
                              data[parseInt(key[i])] = receive[parseInt(key[i])]
                            }
                          }
                          if (receive === false) {
                            validTahunLalu = false;
                          }
                          // data[bulan_i] = receive
                          // $('.bulantampiltext').html(data[bulan_i].bulan+' '+data[bulan_i].tahun)
                          // i = $('#bulan_tampil').val();
                      }
                  })
                }
                console.log(data)
            }

            $('#bulan_tampil').removeAttr('disabled');
            if (validTahunLalu) {
              tampilkanData();
            }
        }

        $('.btn-validasi').on('click', async () => {
            await $.ajax({
                    url: "<?=base_url('index.php/admin/validasiLKSB');?>",
                    data:{
                        data:data[$('#bulan_tampil').val()]
                    },
                    method:'post',
                    dataType:'json',
                    success:(receive) => {
                        data[$('#bulan_tampil').val()].validasi = receive
                        tampilkanData();
                    }
                })
        });

        $('.btn-batal-validasi').on('click', async () => {
            await $.ajax({
                    url: "<?=base_url('index.php/admin/validasiLKSB');?>",
                    data:{
                        data:data[$('#bulan_tampil').val()],
                        batal:true
                    },
                    method:'post',
                    dataType:'json',
                    success:(receive) => {
                        // data[$('#bulan_tampil').val()].validasi = receive
                        for (var i = $('#bulan_tampil').val(); i < 13; i++) {
                          data.splice(data.indexOf(i), 1);
                        }
                        loadData();
                        tampilkanData(true);
                    }
                })
        });

        function tampilkanData(param = null) {
            if (data[$('#bulan_tampil').val() - 1] === undefined || data[$('#bulan_tampil').val()] === undefined) {
            // if (data[$('#bulan_tampil').val() - 1] === undefined) {
              if (param == null) {
                if ($('#bulan_tampil').val() == 1) {
                    $('.message-box').html(`
                      <h1>LKSB Bulan Desember Tahun Lalu Belum Divalidasi</h1>
                      <br>
                      <h2 class="bulantampiltext">Harap Untuk Divalidasi Terlebih Dahulu</h2>
                      <p>Buka Pengaturan Tanggal Komputer Anda Dan Setting Pada Tanggal 31 Desember `+<?= ($_SESSION['tahun'] - 1) ?>+`</p>`)
                  }
                else
                  {
                    $('.message-box').html(`
                    <h1>LKSB Bulan Sebelumnya Belum Divalidasi</h1>
                    <br>
                    <h2 class="bulantampiltext">Harap Untuk Divalidasi Terlebih Dahulu</h2>`)
                  }
              }
            }            
            else{
              $('.btn-validasi').show();
              $('.btn-print').show();
              $('.btn-batal-validasi').hide();

              if (data[$('#bulan_tampil').val()].validasi) {
                  $('.btn-validasi').hide();
                  $('.btn-batal-validasi').show();
              }
              $('.datashow').show();
              $('.loadtext').hide();
              // NAMA BULAN
              $('.bulan-lksb').html(data[$('#bulan_tampil').val()].bulan+' '+data[$('#bulan_tampil').val()].tahun)
              // NERACA
              $('.kas-bulan-ini').val(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.kas);
              $('.sibuhari-swastisari-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.sibuhari_swastisari));
              $('.piutang-pinjaman-anggota-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.piutang_pinjaman_anggota));
              $('.piutang-arisan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.piutang_arisan));
              $('.piutang-konsumsi-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.piutang_konsumsi));
              $('.investasi-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.investasi));
              $('.simapan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.simapan));
              $('.persediaan-barang-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.persediaan_barang));
              $('.neraca-1-total-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_lancar_1.total));
              
              $('.tanah-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_tetap_2.tanah));
              $('.gedung-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_tetap_2.gedung));
              $('.inventaris-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_tetap_2.inventaris));
              $('.neraca-2-total-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.Aktiva_tetap_2.total));

              $('.neraca-total-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Neraca.total));


              // LAPORAN SHU
              $('.bunga-pinjaman-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.bunga_pinjaman));
              $('.provisi-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.provisi));
              $('.uang-pangkal-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.uang_pangkal));
              $('.bunga-sibuhari-swastisari-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.bunga_sibuhari_swastisari));
              $('.laba-penjualan-barang-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.laba_penjualan_barang));
              $('.pendapatan-lainnya-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.pendapatan_lainnya));
              $('.administrasi-pelayanan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.administrasi_pelayanan));
              $('.jumlah-pendapatan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.pendapatan.jumlah));

              $('.simpanan-non-saham-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.simpanan_non_saham));
              $('.bayar-santunan-duka-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.bayar_santunan_duka));
              $('.saldo-uang-duka-di-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.saldo_uang_duka));
              $('.biaya-organisasi-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.biaya_organisasi));
              $('.beban-biaya-pengurus-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.beban_biaya_pengurus));
              $('.beban-simpanan-wajib-tarik-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.beban_simpanan_wajib_tarik));
              $('.cetak-sum-suk-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.cetak_sum_suk));
              $('.kalkulator-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.kalkulator));
              $('.biaya-jasa-karyawan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.biaya_jasa_karyawan));
              $('.biaya-simapan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.biaya_rat));
              $('.pajak-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.pajak));
              $('.jumlah-biaya-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.jumlah));
              $('.biaya-rat-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.biaya.biaya_rat));
              $('.SHU-Beban-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.SHU_Sebelum_Beban));

              $('.SHU-Murni-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Laporan_SHU.SHU_Murni));

              // DATA STATISTIK
              $('.jumlah-anggota-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.jumlah_anggota));
              $('.simpanan-saham-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.simpanan_saham));
              $('.jumlah-simpanan-non-saham-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.simpanan_non_saham));
              $('.kelalaian-pinjaman-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.kelalaian_pinjaman));
              $('.jumlah-pinjaman-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.pinjaman));
              $('.jumlah-pinjaman-sejak-berdiri-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.pinjaman_sejak_berdiri));
              $('.jumlah-uang-duka-sejak-berdiri-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.uang_duka_sejak_berdiri));
              $('.jumlah-uang-duka-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.uang_duka));
              $('.jumlah-santunan-duka-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.santunan_uang_duka));
              $('.jumlah-santunan-duka-sejak-berdiri-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.santunan_uang_duka_sejak_berdiri));
              $('.saldo-uang-duka-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Data_Statistik.saldo_uang_duka));

              // PASIVA
              $('.kewajiban-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.kewajiban))
              $('.sibulan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.sibulan))
              $('.biaya-yg-masih-harus-dibayar-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.biaya_yg_masih_harus_dibayar))
              $('.simpanan-wajib-tarik-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.simpanan_wajib_tarik))
              $('.investasi-simapan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.investasi_simapan))
              $('.total-pasiva-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Pasiva.total))

              // MODAL
              $('.simpanan-pokok-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.simpanan_pokok))
              $('.simpanan-wajib-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.simpanan_wajib))
              $('.simpanan-sukarela-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.simpanan_sukarela))
              $('.modal-saldo-uang-duka-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.saldo_uang_duka))
              $('.modal-dana-cadangan-umum-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.dana_cadangan_umum))
              $('.modal-dana-cadangan-resiko-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.dana_cadangan_resiko))
              $('.modal-hibah-resiko-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.hibah))
              $('.modal-titipan-simpanan-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.titipan_simpanan))
              $('.modal-titipan-konsumsi-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.titipan_konsumsi))
              $('.modal-shu-murni-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.SHU_Murni))
              $('.modal-total-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].Modal.total))

              // Total
              $('.total-bulan-ini').val(rupiah(data[parseInt($('#bulan_tampil').val())].total))
              

              // Bulan Lalu
              // NAMA BULAN
              $('.bulan-lalu-lksb').html(data[$('#bulan_tampil').val() - 1].bulan+' '+data[$('#bulan_tampil').val() - 1].tahun)
              // NERACA
              $('.kas-bulan-lalu').val(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.kas);
              $('.sibuhari-swastisari-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.sibuhari_swastisari));
              $('.piutang-pinjaman-anggota-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.piutang_pinjaman_anggota));
              $('.piutang-arisan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.piutang_arisan));
              $('.piutang-konsumsi-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.piutang_konsumsi));
              $('.investasi-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.investasi));
              $('.simapan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.simapan));
              $('.persediaan-barang-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.persediaan_barang));
              $('.neraca-1-total-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_lancar_1.total));
              
              $('.tanah-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_tetap_2.tanah));
              $('.gedung-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_tetap_2.gedung));
              $('.inventaris-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_tetap_2.inventaris));
              $('.neraca-2-total-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.Aktiva_tetap_2.total));

              $('.neraca-total-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Neraca.total));


              // LAPORAN SHU
              $('.bunga-pinjaman-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.bunga_pinjaman));
              $('.provisi-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.provisi));
              $('.uang-pangkal-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.uang_pangkal));
              $('.bunga-sibuhari-swastisari-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.bunga_sibuhari_swastisari));
              $('.laba-penjualan-barang-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.laba_penjualan_barang));
              $('.pendapatan-lainnya-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.pendapatan_lainnya));
              $('.administrasi-pelayanan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.administrasi_pelayanan));
              $('.jumlah-pendapatan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.pendapatan.jumlah));

              $('.simpanan-non-saham-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.simpanan_non_saham));
              $('.bayar-santunan-duka-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.bayar_santunan_duka));
              $('.saldo-uang-duka-di-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.saldo_uang_duka));
              $('.biaya-organisasi-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.biaya_organisasi));
              $('.beban-biaya-pengurus-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.beban_biaya_pengurus));
              $('.beban-simpanan-wajib-tarik-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.beban_simpanan_wajib_tarik));
              $('.cetak-sum-suk-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.cetak_sum_suk));
              $('.kalkulator-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.kalkulator));
              $('.biaya-jasa-karyawan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.biaya_jasa_karyawan));
              $('.biaya-simapan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.biaya_rat));
              $('.pajak-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.pajak));
              $('.jumlah-biaya-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.jumlah));
              $('.biaya-rat-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.biaya.biaya_rat));

              $('.SHU-Beban-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.SHU_Sebelum_Beban));
              $('.SHU-Murni-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Laporan_SHU.SHU_Murni));

              // DATA STATISTIK
              $('.jumlah-anggota-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.jumlah_anggota));
              $('.simpanan-saham-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.simpanan_saham));
              $('.jumlah-simpanan-non-saham-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.simpanan_non_saham));
              $('.kelalaian-pinjaman-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.kelalaian_pinjaman));
              $('.jumlah-pinjaman-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.pinjaman));
              $('.jumlah-pinjaman-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.pinjaman_sejak_berdiri));
              $('.jumlah-uang-duka-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.uang_duka_sejak_berdiri));
              $('.jumlah-uang-duka-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.uang_duka));
              $('.jumlah-santunan-duka-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.santunan_uang_duka));
              $('.jumlah-santunan-duka-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.santunan_uang_duka_sejak_berdiri));
              $('.saldo-uang-duka-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Data_Statistik.saldo_uang_duka));

              // PASIVA
              $('.kewajiban-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.kewajiban))
              $('.sibulan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.sibulan))
              $('.biaya-yg-masih-harus-dibayar-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.biaya_yg_masih_harus_dibayar))
              $('.simpanan-wajib-tarik-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.simpanan_wajib_tarik))
              $('.investasi-simapan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.investasi_simapan))
              $('.total-pasiva-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Pasiva.total))

              // MODAL
              $('.simpanan-pokok-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.simpanan_pokok))
              $('.simpanan-wajib-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.simpanan_wajib))
              $('.simpanan-sukarela-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.simpanan_sukarela))
              $('.modal-saldo-uang-duka-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.saldo_uang_duka))
              $('.modal-dana-cadangan-umum-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.dana_cadangan_umum))
              $('.modal-dana-cadangan-resiko-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.dana_cadangan_resiko))
              $('.modal-hibah-resiko-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.hibah))
              $('.modal-titipan-simpanan-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.titipan_simpanan))
              $('.modal-titipan-konsumsi-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.titipan_konsumsi))
              $('.modal-shu-murni-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.SHU_Murni))
              $('.modal-total-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].Modal.total))

              // Total
              $('.total-bulan-lalu').val(rupiah(data[parseInt($('#bulan_tampil').val() - 1)].total))
            }
        }

        function tampilkanDataTahunan() {
              // NAMA BULAN
              $('.bulan-lksb').html(data[12].bulan+' '+data[12].tahun)
              // NERACA
              $('.kas-bulan-ini').val(data[12].Neraca.Aktiva_lancar_1.kas);
              $('.sibuhari-swastisari-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.sibuhari_swastisari));
              $('.piutang-pinjaman-anggota-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.piutang_pinjaman_anggota));
              $('.piutang-arisan-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.piutang_arisan));
              $('.piutang-konsumsi-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.piutang_konsumsi));
              $('.investasi-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.investasi));
              $('.simapan-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.simapan));
              $('.persediaan-barang-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.persediaan_barang));
              $('.neraca-1-total-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_lancar_1.total));
              
              $('.tanah-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_tetap_2.tanah));
              $('.gedung-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_tetap_2.gedung));
              $('.inventaris-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_tetap_2.inventaris));
              $('.neraca-2-total-bulan-ini').val(rupiah(data[12].Neraca.Aktiva_tetap_2.total));

              $('.neraca-total-bulan-ini').val(rupiah(data[12].Neraca.total));


              // LAPORAN SHU
              $('.bunga-pinjaman-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.bunga_pinjaman));
              $('.provisi-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.provisi));
              $('.uang-pangkal-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.uang_pangkal));
              $('.bunga-sibuhari-swastisari-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.bunga_sibuhari_swastisari));
              $('.laba-penjualan-barang-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.laba_penjualan_barang));
              $('.pendapatan-lainnya-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.pendapatan_lainnya));
              $('.administrasi-pelayanan-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.administrasi_pelayanan));
              $('.jumlah-pendapatan-bulan-ini').val(rupiah(data[12].Laporan_SHU.pendapatan.jumlah));

              $('.simpanan-non-saham-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.simpanan_non_saham));
              $('.bayar-santunan-duka-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.bayar_santunan_duka));
              $('.saldo-uang-duka-di-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.saldo_uang_duka));
              $('.biaya-organisasi-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.biaya_organisasi));
              $('.beban-biaya-pengurus-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.beban_biaya_pengurus));
              $('.beban-simpanan-wajib-tarik-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.beban_simpanan_wajib_tarik));
              $('.cetak-sum-suk-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.cetak_sum_suk));
              $('.kalkulator-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.kalkulator));
              $('.biaya-jasa-karyawan-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.biaya_jasa_karyawan));
              $('.biaya-simapan-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.biaya_rat));
              $('.pajak-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.pajak));
              $('.jumlah-biaya-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.jumlah));
              $('.biaya-rat-bulan-ini').val(rupiah(data[12].Laporan_SHU.biaya.biaya_rat));
              $('.SHU-Beban-bulan-ini').val(rupiah(data[12].Laporan_SHU.SHU_Sebelum_Beban));

              $('.SHU-Murni-bulan-ini').val(rupiah(data[12].Laporan_SHU.SHU_Murni));

              // DATA STATISTIK
              $('.jumlah-anggota-bulan-ini').val(rupiah(data[12].Data_Statistik.jumlah_anggota));
              $('.simpanan-saham-bulan-ini').val(rupiah(data[12].Data_Statistik.simpanan_saham));
              $('.jumlah-simpanan-non-saham-bulan-ini').val(rupiah(data[12].Data_Statistik.simpanan_non_saham));
              $('.kelalaian-pinjaman-bulan-ini').val(rupiah(data[12].Data_Statistik.kelalaian_pinjaman));
              $('.jumlah-pinjaman-bulan-ini').val(rupiah(data[12].Data_Statistik.pinjaman));
              $('.jumlah-pinjaman-sejak-berdiri-bulan-ini').val(rupiah(data[12].Data_Statistik.pinjaman_sejak_berdiri));
              $('.jumlah-uang-duka-sejak-berdiri-bulan-ini').val(rupiah(data[12].Data_Statistik.uang_duka_sejak_berdiri));
              $('.jumlah-uang-duka-bulan-ini').val(rupiah(data[12].Data_Statistik.uang_duka));
              $('.jumlah-santunan-duka-bulan-ini').val(rupiah(data[12].Data_Statistik.santunan_uang_duka));
              $('.jumlah-santunan-duka-sejak-berdiri-bulan-ini').val(rupiah(data[12].Data_Statistik.santunan_uang_duka_sejak_berdiri));
              $('.saldo-uang-duka-bulan-ini').val(rupiah(data[12].Data_Statistik.saldo_uang_duka));

              // PASIVA
              $('.kewajiban-bulan-ini').val(rupiah(data[12].Pasiva.kewajiban))
              $('.sibulan-bulan-ini').val(rupiah(data[12].Pasiva.sibulan))
              $('.biaya-yg-masih-harus-dibayar-bulan-ini').val(rupiah(data[12].Pasiva.biaya_yg_masih_harus_dibayar))
              $('.simpanan-wajib-tarik-bulan-ini').val(rupiah(data[12].Pasiva.simpanan_wajib_tarik))
              $('.investasi-simapan-bulan-ini').val(rupiah(data[12].Pasiva.investasi_simapan))
              $('.total-pasiva-bulan-ini').val(rupiah(data[12].Pasiva.total))

              // MODAL
              $('.simpanan-pokok-bulan-ini').val(rupiah(data[12].Modal.simpanan_pokok))
              $('.simpanan-wajib-bulan-ini').val(rupiah(data[12].Modal.simpanan_wajib))
              $('.simpanan-sukarela-bulan-ini').val(rupiah(data[12].Modal.simpanan_sukarela))
              $('.modal-saldo-uang-duka-bulan-ini').val(rupiah(data[12].Modal.saldo_uang_duka))
              $('.modal-dana-cadangan-umum-bulan-ini').val(rupiah(data[12].Modal.dana_cadangan_umum))
              $('.modal-dana-cadangan-resiko-bulan-ini').val(rupiah(data[12].Modal.dana_cadangan_resiko))
              $('.modal-hibah-resiko-bulan-ini').val(rupiah(data[12].Modal.hibah))
              $('.modal-titipan-simpanan-bulan-ini').val(rupiah(data[12].Modal.titipan_simpanan))
              $('.modal-titipan-konsumsi-bulan-ini').val(rupiah(data[12].Modal.titipan_konsumsi))
              $('.modal-shu-murni-bulan-ini').val(rupiah(data[12].Modal.SHU_Murni))
              $('.modal-total-bulan-ini').val(rupiah(data[12].Modal.total))

              // Total
              $('.total-bulan-ini').val(rupiah(data[12].total))
              

              // Bulan Lalu
              // NAMA BULAN
              $('.bulan-lalu-lksb').html(data[0].bulan+' '+data[0].tahun)
              // NERACA
              $('.kas-bulan-lalu').val(data[parseInt(0)].Neraca.Aktiva_lancar_1.kas);
              $('.sibuhari-swastisari-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.sibuhari_swastisari));
              $('.piutang-pinjaman-anggota-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.piutang_pinjaman_anggota));
              $('.piutang-arisan-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.piutang_arisan));
              $('.piutang-konsumsi-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.piutang_konsumsi));
              $('.investasi-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.investasi));
              $('.simapan-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.simapan));
              $('.persediaan-barang-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.persediaan_barang));
              $('.neraca-1-total-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_lancar_1.total));
              
              $('.tanah-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_tetap_2.tanah));
              $('.gedung-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_tetap_2.gedung));
              $('.inventaris-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_tetap_2.inventaris));
              $('.neraca-2-total-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.Aktiva_tetap_2.total));

              $('.neraca-total-bulan-lalu').val(rupiah(data[parseInt(0)].Neraca.total));


              // LAPORAN SHU
              $('.bunga-pinjaman-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.bunga_pinjaman));
              $('.provisi-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.provisi));
              $('.uang-pangkal-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.uang_pangkal));
              $('.bunga-sibuhari-swastisari-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.bunga_sibuhari_swastisari));
              $('.laba-penjualan-barang-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.laba_penjualan_barang));
              $('.pendapatan-lainnya-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.pendapatan_lainnya));
              $('.administrasi-pelayanan-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.administrasi_pelayanan));
              $('.jumlah-pendapatan-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.pendapatan.jumlah));

              $('.simpanan-non-saham-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.simpanan_non_saham));
              $('.bayar-santunan-duka-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.bayar_santunan_duka));
              $('.saldo-uang-duka-di-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.saldo_uang_duka));
              $('.biaya-organisasi-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.biaya_organisasi));
              $('.beban-biaya-pengurus-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.beban_biaya_pengurus));
              $('.beban-simpanan-wajib-tarik-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.beban_simpanan_wajib_tarik));
              $('.cetak-sum-suk-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.cetak_sum_suk));
              $('.kalkulator-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.kalkulator));
              $('.biaya-jasa-karyawan-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.biaya_jasa_karyawan));
              $('.biaya-simapan-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.biaya_rat));
              $('.pajak-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.pajak));
              $('.jumlah-biaya-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.jumlah));
              $('.biaya-rat-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.biaya.biaya_rat));

              $('.SHU-Beban-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.SHU_Sebelum_Beban));
              $('.SHU-Murni-bulan-lalu').val(rupiah(data[parseInt(0)].Laporan_SHU.SHU_Murni));

              // DATA STATISTIK
              $('.jumlah-anggota-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.jumlah_anggota));
              $('.simpanan-saham-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.simpanan_saham));
              $('.jumlah-simpanan-non-saham-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.simpanan_non_saham));
              $('.kelalaian-pinjaman-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.kelalaian_pinjaman));
              $('.jumlah-pinjaman-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.pinjaman));
              $('.jumlah-pinjaman-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.pinjaman_sejak_berdiri));
              $('.jumlah-uang-duka-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.uang_duka_sejak_berdiri));
              $('.jumlah-uang-duka-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.uang_duka));
              $('.jumlah-santunan-duka-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.santunan_uang_duka));
              $('.jumlah-santunan-duka-sejak-berdiri-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.santunan_uang_duka_sejak_berdiri));
              $('.saldo-uang-duka-bulan-lalu').val(rupiah(data[parseInt(0)].Data_Statistik.saldo_uang_duka));

              // PASIVA
              $('.kewajiban-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.kewajiban))
              $('.sibulan-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.sibulan))
              $('.biaya-yg-masih-harus-dibayar-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.biaya_yg_masih_harus_dibayar))
              $('.simpanan-wajib-tarik-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.simpanan_wajib_tarik))
              $('.investasi-simapan-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.investasi_simapan))
              $('.total-pasiva-bulan-lalu').val(rupiah(data[parseInt(0)].Pasiva.total))

              // MODAL
              $('.simpanan-pokok-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.simpanan_pokok))
              $('.simpanan-wajib-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.simpanan_wajib))
              $('.simpanan-sukarela-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.simpanan_sukarela))
              $('.modal-saldo-uang-duka-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.saldo_uang_duka))
              $('.modal-dana-cadangan-umum-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.dana_cadangan_umum))
              $('.modal-dana-cadangan-resiko-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.dana_cadangan_resiko))
              $('.modal-hibah-resiko-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.hibah))
              $('.modal-titipan-simpanan-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.titipan_simpanan))
              $('.modal-titipan-konsumsi-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.titipan_konsumsi))
              $('.modal-shu-murni-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.SHU_Murni))
              $('.modal-total-bulan-lalu').val(rupiah(data[parseInt(0)].Modal.total))

              // Total
              $('.total-bulan-lalu').val(rupiah(data[parseInt(0)].total))
        }

        loadData();

        $('#bulan_tampil').on('change', () => {
          loadData();
        });

        $('.btn-lksb-tahunan').on('click', async () => {
          let bulan_get = [1, 12];
          for (let i = 0; i < bulan_get.length; i++) {
            if (data[bulan_get[i]] === undefined) {
              await $.ajax({
                url: "<?=base_url('index.php/admin/DataLKSB');?>",
                data:{
                    bulan:bulan_get[i]
                },
                method:'post',
                dataType:'json',
                success:(receive) => {
                  if (receive == null) {
                    console.log("OKE")
                  }
                  if (receive !== null) {
                    let key = Object.keys(receive);
                    for(i in key){
                      data[parseInt(key[i])] = receive[parseInt(key[i])]
                    }
                  }
                  if (receive === false) {
                    validTahunLalu = false;
                  }
                }
              })
            }
          }
          tampilkanDataTahunan()
        })

    </script>
<?php } ?>
<?php if (isset($page) && $page == 'laporan_sumsuk') { ?>
    <script>
        let data;
        
        function loadData() {
            $('.total-masuk').html('Loading...')
            $('.total-keluar').html('Loading...')
            $('.kas-bulan-ini').html('Loading...')
            loading();
            $('#bulan_sibulan').attr('disabled', true)
            $.ajax({
                url: "<?=base_url('index.php/admin/dataSUMSUK');?>",
                data:{
                    bulan:$('#bulan_sibulan').val()
                },
                method:'post',
                dataType:'json',
                success:function (dt) {
                    data = dt;
                    $('.loading').hide();
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
            $('.bulan-ket').html($('#bulan_sibulan')[0].options[$('#bulan_sibulan')[0].selectedIndex].text+" <?=$_SESSION['tahun'];?>")
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
<?php if (isset($page) && $page == 'pengaturan') { ?>
    <script>
        $('.bunga-field').on('input', (e) => {
            $.ajax({
                url: "<?=base_url('index.php/pengaturan/bungaSibulan');?>",
                data:{
                    id : e.currentTarget.dataset.id,
                    value : e.currentTarget.value
                },
                method:'post',
                dataType:'json',
                success:function (dt) {
                    console.log(dt);
                }
            })
        })
        $('.date-session-set').on('input', () => {
          let dateInput = $('.date-session-set')
          $.ajax({
              url: "<?=base_url('index.php/pengaturan/setDateSession');?>",
              data:{
                tahun:dateInput[0].value,
              },
              method:'post',
              dataType:'json',
              success:function (dt) {
                console.log(dt)
                dateInput[0].value = dt.tahun
                $('.brand-text').html(`<b>Koperasi UME MNASI [ Tahun Buku : ${dt.tahun} ]</b>`)
              }
          })
        })
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_sibuhari') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-sibuhari').show()
            $('.btn-ubah-sibuhari').hide()
            $.ajax({
                url: "<?=base_url('index.php/sibuhari/getCatatanSibuhari');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-sibuhari').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-sibuhari').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_sibuhari_swastisari}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_sibuhari_swastisari})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-sibuhari').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-sibuhari').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/sibuhari/hapusSibuhari');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                $('.jenis-sibuhari-masuk')[0].checked = true
                jenis = 0
            }
            if (_jenis == 1) {
                $('.jenis-sibuhari-keluar')[0].checked = true
                jenis = 1
            }
            $('.btn-simpan-sibuhari').hide()
            $('.btn-ubah-sibuhari').show()
            $('.btn-batal').show();
            $('.btn-ubah-sibuhari').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-sibuhari').show()
            $('.btn-ubah-sibuhari').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-sibuhari-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-sibuhari-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-sibuhari').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/sibuhari/simpanSibuhari');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    keterangan:$('#keterangan').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-sibuhari').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/sibuhari/simpanSibuhari/edit');?>",
                data:{
                    id:$('.btn-ubah-sibuhari').data('id'),
                    keterangan:$('#keterangan').val(),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_kalkulator') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-kalkulator').show()
            $('.btn-ubah-kalkulator').hide()
            $.ajax({
                url: "<?=base_url('index.php/kalkulator/getCatatankalkulator');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-kalkulator').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-kalkulator').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_kalkulator}, '${data.catatan[i].waktu}', '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_kalkulator})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-kalkulator').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-kalkulator').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].total)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/kalkulator/hapuskalkulator');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            $('.btn-simpan-kalkulator').hide()
            $('.btn-ubah-kalkulator').show()
            $('.btn-batal').show();
            $('.btn-ubah-kalkulator').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-kalkulator').show()
            $('.btn-ubah-kalkulator').hide()
            $('.btn-batal').hide();
        }

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-kalkulator').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/kalkulator/simpankalkulator');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    keterangan:$('#keterangan').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-kalkulator').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/kalkulator/simpankalkulator/edit');?>",
                data:{
                    id:$('.btn-ubah-kalkulator').data('id'),
                    keterangan:$('#keterangan').val(),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>



<?php if (isset($page) && $page == 'transaksi_rat') { ?>
    <script>
        let jenis = 0;
        function loadData() {
            $('.btn-simpan-rat').show()
            $('.btn-ubah-rat').hide()
            $.ajax({
                url: "<?=base_url('index.php/rat/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-rat').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-rat').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_rat}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_rat})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-rat').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-rat').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].total)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        loadData()

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/rat/hapusrat');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-rat-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-rat-keluar')[0].checked = true
            }
            $('.btn-simpan-rat').hide()
            $('.btn-ubah-rat').show()
            $('.btn-batal').show();
            $('.btn-ubah-rat').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-rat').show()
            $('.btn-ubah-rat').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-rat-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-rat-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-rat').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/rat/simpanrat');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-rat').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/rat/simpanrat/edit');?>",
                data:{
                    id:$('.btn-ubah-rat').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>


<?php if (isset($page) && $page == 'transaksi_pelunasan_biaya_organisasi') { ?>
    <script>
        let jenis = 0;
        function loadData() {
            $('.btn-simpan-pelunasan_biaya_organisasi').show()
            $('.btn-ubah-pelunasan_biaya_organisasi').hide()
            $.ajax({
                url: "<?=base_url('index.php/pelunasan_biaya_organisasi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-pelunasan_biaya_organisasi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-pelunasan_biaya_organisasi').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_pelunasan_biaya_organisasi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_pelunasan_biaya_organisasi})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-pelunasan_biaya_organisasi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-pelunasan_biaya_organisasi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].total)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        loadData()

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/pelunasan_biaya_organisasi/hapuspelunasan_biaya_organisasi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        }

        function getData(jumlah, id, waktu, jenis) {
            waktu = waktu.split('-')
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            $('.btn-simpan-pelunasan_biaya_organisasi').hide()
            $('.btn-ubah-pelunasan_biaya_organisasi').show()
            $('.btn-batal').show();
            $('.btn-ubah-pelunasan_biaya_organisasi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-pelunasan_biaya_organisasi').show()
            $('.btn-ubah-pelunasan_biaya_organisasi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-pelunasan_biaya_organisasi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-pelunasan_biaya_organisasi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-pelunasan_biaya_organisasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/pelunasan_biaya_organisasi/simpanpelunasan_biaya_organisasi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                    batal();
                  }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-pelunasan_biaya_organisasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/pelunasan_biaya_organisasi/simpanpelunasan_biaya_organisasi/edit');?>",
                data:{
                    id:$('.btn-ubah-pelunasan_biaya_organisasi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  batal();
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                    batal();
                  }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_biaya_organisasi') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-biaya_organisasi').show()
            $('.btn-ubah-biaya_organisasi').hide()
            $.ajax({
                url: "<?=base_url('index.php/biaya_organisasi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-biaya_organisasi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-biaya_organisasi').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_biaya_organisasi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_biaya_organisasi})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-biaya_organisasi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-biaya_organisasi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/biaya_organisasi/hapusbiaya_organisasi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                $('.jenis-biaya_organisasi-masuk')[0].checked = true
                jenis = 0;
            }
            if (_jenis == 1) {
                $('.jenis-biaya_organisasi-keluar')[0].checked = true
                jenis = 1;
            }
            $('.btn-simpan-biaya_organisasi').hide()
            $('.btn-ubah-biaya_organisasi').show()
            $('.btn-batal').show();
            $('.btn-ubah-biaya_organisasi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-biaya_organisasi').show()
            $('.btn-ubah-biaya_organisasi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-biaya_organisasi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-biaya_organisasi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-biaya_organisasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/biaya_organisasi/simpanbiaya_organisasi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val(''),
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-biaya_organisasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/biaya_organisasi/simpanbiaya_organisasi/edit');?>",
                data:{
                    id:$('.btn-ubah-biaya_organisasi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_pendapatan_lainnya') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-pendapatan_lainnya').show()
            $('.btn-ubah-pendapatan_lainnya').hide()
            $.ajax({
                url: "<?=base_url('index.php/pendapatan_lainnya/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-pendapatan_lainnya').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-pendapatan_lainnya').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_pendapatan_lainnya}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_pendapatan_lainnya})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-pendapatan_lainnya').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-pendapatan_lainnya').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/pendapatan_lainnya/hapuspendapatan_lainnya');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-pendapatan_lainnya-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1;
                $('.jenis-pendapatan_lainnya-keluar')[0].checked = true
            }
            $('.btn-simpan-pendapatan_lainnya').hide()
            $('.btn-ubah-pendapatan_lainnya').show()
            $('.btn-batal').show();
            $('.btn-ubah-pendapatan_lainnya').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-pendapatan_lainnya').show()
            $('.btn-ubah-pendapatan_lainnya').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-pendapatan_lainnya-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-pendapatan_lainnya-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-pendapatan_lainnya').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/pendapatan_lainnya/simpanpendapatan_lainnya');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-pendapatan_lainnya').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/pendapatan_lainnya/simpanpendapatan_lainnya/edit');?>",
                data:{
                    id:$('.btn-ubah-pendapatan_lainnya').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_hibah_donasi') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-hibah_donasi').show()
            $('.btn-ubah-hibah_donasi').hide()
            $.ajax({
                url: "<?=base_url('index.php/hibah_donasi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-hibah_donasi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-hibah_donasi').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_hibah_donasi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_hibah_donasi})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-hibah_donasi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-hibah_donasi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/hibah_donasi/hapushibah_donasi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-hibah_donasi-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-hibah_donasi-keluar')[0].checked = true
            }
            $('.btn-simpan-hibah_donasi').hide()
            $('.btn-ubah-hibah_donasi').show()
            $('.btn-batal').show();
            $('.btn-ubah-hibah_donasi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-hibah_donasi').show()
            $('.btn-ubah-hibah_donasi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-hibah_donasi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-hibah_donasi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-hibah_donasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/hibah_donasi/simpanhibah_donasi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-hibah_donasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/hibah_donasi/simpanhibah_donasi/edit');?>",
                data:{
                    id:$('.btn-ubah-hibah_donasi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>


<?php if (isset($page) && $page == 'transaksi_shu') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            loading()
            $('.btn-simpan-shu').show()
            $('.btn-ubah-shu').hide()
            $.ajax({
                url: "<?=base_url('index.php/shu/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('.loading').hide()
                    $('.riwayat-shu').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        if (data.catatan[i].id_shu === undefined) {
                          $('.riwayat-shu').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jumlah !== null ? rupiah(data.catatan[i].jumlah) : data.catatan[i].jumlah}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>
                                </td>
                            </tr>`);
                        }else{
                          $('.riwayat-shu').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jumlah !== null ? rupiah(data.catatan[i].jumlah) : data.catatan[i].jumlah_saham}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>
                                    <a class="badge badge-success"
                                    onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_shu}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                    ><i class="fa fa-pen"></i></a>
                                    <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_shu})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`);
                        }
                    }
                    $('.akumulasi-shu').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-shu').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/shu/hapusshu');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-shu-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-shu-keluar')[0].checked = true
            }
            $('.btn-simpan-shu').hide()
            $('.btn-ubah-shu').show()
            $('.btn-batal').show();
            $('.btn-ubah-shu').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-shu').show()
            $('.btn-ubah-shu').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-shu-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-shu-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-shu').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/shu/simpanshu');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-shu').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/shu/simpanshu/edit');?>",
                data:{
                    id:$('.btn-ubah-shu').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_inventaris') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-inventaris').show()
            $('.btn-ubah-inventaris').hide()
            $.ajax({
                url: "<?=base_url('index.php/inventaris/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-inventaris').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-inventaris').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_inventaris}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_inventaris})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-inventaris').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-inventaris').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/inventaris/hapusinventaris');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                $jenis = 0
                $('.jenis-inventaris-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-inventaris-keluar')[0].checked = true
            }
            $('.btn-simpan-inventaris').hide()
            $('.btn-ubah-inventaris').show()
            $('.btn-batal').show();
            $('.btn-ubah-inventaris').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-inventaris').show()
            $('.btn-ubah-inventaris').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-inventaris-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-inventaris-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-inventaris').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/inventaris/simpaninventaris');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-inventaris').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/inventaris/simpaninventaris/edit');?>",
                data:{
                    id:$('.btn-ubah-inventaris').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_tanah') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-tanah').show()
            $('.btn-ubah-tanah').hide()
            $.ajax({
                url: "<?=base_url('index.php/tanah/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-tanah').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-tanah').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_tanah}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_tanah})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-tanah').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-tanah').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/tanah/hapustanah');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-tanah-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1;
                $('.jenis-tanah-keluar')[0].checked = true
            }
            $('.btn-simpan-tanah').hide()
            $('.btn-ubah-tanah').show()
            $('.btn-batal').show();
            $('.btn-ubah-tanah').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-tanah').show()
            $('.btn-ubah-tanah').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-tanah-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-tanah-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-tanah').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/tanah/simpantanah');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-tanah').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/tanah/simpantanah/edit');?>",
                data:{
                    id:$('.btn-ubah-tanah').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_persediaan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-persediaan').show()
            $('.btn-ubah-persediaan').hide()
            $.ajax({
                url: "<?=base_url('index.php/persediaan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-persediaan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-persediaan').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_persediaan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_persediaan})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-persediaan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-persediaan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/persediaan/hapuspersediaan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
              jenis = 0
                $('.jenis-persediaan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-persediaan-keluar')[0].checked = true
            }
            $('.btn-simpan-persediaan').hide()
            $('.btn-ubah-persediaan').show()
            $('.btn-batal').show();
            $('.btn-ubah-persediaan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-persediaan').show()
            $('.btn-ubah-persediaan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-persediaan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-persediaan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-persediaan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/persediaan/simpanpersediaan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        })
        $('.btn-ubah-persediaan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/persediaan/simpanpersediaan/edit');?>",
                data:{
                    id:$('.btn-ubah-persediaan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_piutang_arisan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-piutang_arisan').show()
            $('.btn-ubah-piutang_arisan').hide()
            $.ajax({
                url: "<?=base_url('index.php/piutang_arisan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-piutang_arisan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-piutang_arisan').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_piutang_arisan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_piutang_arisan})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-piutang_arisan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-piutang_arisan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/piutang_arisan/hapuspiutang_arisan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-piutang_arisan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-piutang_arisan-keluar')[0].checked = true
            }
            $('.btn-simpan-piutang_arisan').hide()
            $('.btn-ubah-piutang_arisan').show()
            $('.btn-batal').show();
            $('.btn-ubah-piutang_arisan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-piutang_arisan').show()
            $('.btn-ubah-piutang_arisan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-piutang_arisan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-piutang_arisan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-piutang_arisan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/piutang_arisan/simpanpiutang_arisan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-piutang_arisan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/piutang_arisan/simpanpiutang_arisan/edit');?>",
                data:{
                    id:$('.btn-ubah-piutang_arisan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_piutang_konsumsi') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-piutang_konsumsi').show()
            $('.btn-ubah-piutang_konsumsi').hide()
            $.ajax({
                url: "<?=base_url('index.php/piutang_konsumsi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-piutang_konsumsi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-piutang_konsumsi').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_piutang_konsumsi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_piutang_konsumsi})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-piutang_konsumsi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-piutang_konsumsi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/piutang_konsumsi/hapuspiutang_konsumsi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
              jenis = 0
                $('.jenis-piutang_konsumsi-masuk')[0].checked = true
            }
            if (_jenis == 1) {
              jenis = 1
                $('.jenis-piutang_konsumsi-keluar')[0].checked = true
            }
            $('.btn-simpan-piutang_konsumsi').hide()
            $('.btn-ubah-piutang_konsumsi').show()
            $('.btn-batal').show();
            $('.btn-ubah-piutang_konsumsi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-piutang_konsumsi').show()
            $('.btn-ubah-piutang_konsumsi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-piutang_konsumsi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-piutang_konsumsi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-piutang_konsumsi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/piutang_konsumsi/simpanpiutang_konsumsi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-piutang_konsumsi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/piutang_konsumsi/simpanpiutang_konsumsi/edit');?>",
                data:{
                    id:$('.btn-ubah-piutang_konsumsi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_investasi') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-investasi').show()
            $('.btn-ubah-investasi').hide()
            $.ajax({
                url: "<?=base_url('index.php/investasi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-investasi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-investasi').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_investasi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_investasi})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-investasi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-investasi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/investasi/hapusinvestasi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
              jenis = 0
                $('.jenis-investasi-masuk')[0].checked = true
            }
            if (_jenis == 1) {
              jenis = 1
                $('.jenis-investasi-keluar')[0].checked = true
            }
            $('.btn-simpan-investasi').hide()
            $('.btn-ubah-investasi').show()
            $('.btn-batal').show();
            $('.btn-ubah-investasi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-investasi').show()
            $('.btn-ubah-investasi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-investasi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-investasi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-investasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/investasi/simpaninvestasi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-investasi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/investasi/simpaninvestasi/edit');?>",
                data:{
                    id:$('.btn-ubah-investasi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_titipan_simpanan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-titipan_simpanan').show()
            $('.btn-ubah-titipan_simpanan').hide()
            $.ajax({
                url: "<?=base_url('index.php/titipan_simpanan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-titipan_simpanan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-titipan_simpanan').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_titipan_simpanan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_titipan_simpanan})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-titipan_simpanan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-titipan_simpanan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/titipan_simpanan/hapustitipan_simpanan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-titipan_simpanan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-titipan_simpanan-keluar')[0].checked = true
            }
            $('.btn-simpan-titipan_simpanan').hide()
            $('.btn-ubah-titipan_simpanan').show()
            $('.btn-batal').show();
            $('.btn-ubah-titipan_simpanan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-titipan_simpanan').show()
            $('.btn-ubah-titipan_simpanan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-titipan_simpanan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-titipan_simpanan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-titipan_simpanan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_simpanan/simpantitipan_simpanan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-titipan_simpanan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_simpanan/simpantitipan_simpanan/edit');?>",
                data:{
                    id:$('.btn-ubah-titipan_simpanan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>


<?php if (isset($page) && $page == 'transaksi_titipan_konsumsi') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-titipan_konsumsi').show()
            $('.btn-ubah-titipan_konsumsi').hide()
            $.ajax({
                url: "<?=base_url('index.php/titipan_konsumsi/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-titipan_konsumsi').html('')
                    for (let i = 0; i < data.catatan.length; i++) {

                        if (data.catatan[i].id_titipan_konsumsi === undefined) {
                          $('.riwayat-titipan_konsumsi').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                </td>
                            </tr>`);
                        }
                        else{
                          $('.riwayat-titipan_konsumsi').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                
                                    <a class="badge badge-success"
                                    onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_titipan_konsumsi}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                    ><i class="fa fa-pen"></i></a>
                                    <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_titipan_konsumsi})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`);
                        }
                    }
                    $('.akumulasi-titipan_konsumsi').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-titipan_konsumsi').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/titipan_konsumsi/hapustitipan_konsumsi');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-titipan_konsumsi-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-titipan_konsumsi-keluar')[0].checked = true
            }
            $('.btn-simpan-titipan_konsumsi').hide()
            $('.btn-ubah-titipan_konsumsi').show()
            $('.btn-batal').show();
            $('.btn-ubah-titipan_konsumsi').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-titipan_konsumsi').show()
            $('.btn-ubah-titipan_konsumsi').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-titipan_konsumsi-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-titipan_konsumsi-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-titipan_konsumsi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_konsumsi/simpantitipan_konsumsi');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-titipan_konsumsi').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_konsumsi/simpantitipan_konsumsi/edit');?>",
                data:{
                    id:$('.btn-ubah-titipan_konsumsi').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    loadData();
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_titipan_arisan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-titipan_arisan').show()
            $('.btn-ubah-titipan_arisan').hide()
            $.ajax({
                url: "<?=base_url('index.php/titipan_arisan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-titipan_arisan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {

                        if (data.catatan[i].id_titipan_arisan === undefined) {
                          $('.riwayat-titipan_arisan').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                </td>
                            </tr>`);
                        }
                        else{
                          $('.riwayat-titipan_arisan').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                
                                    <a class="badge badge-success"
                                    onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_titipan_arisan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                    ><i class="fa fa-pen"></i></a>
                                    <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_titipan_arisan})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`);
                        }
                    }
                    $('.akumulasi-titipan_arisan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-titipan_arisan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/titipan_arisan/hapustitipan_arisan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-titipan_arisan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-titipan_arisan-keluar')[0].checked = true
            }
            $('.btn-simpan-titipan_arisan').hide()
            $('.btn-ubah-titipan_arisan').show()
            $('.btn-batal').show();
            $('.btn-ubah-titipan_arisan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-titipan_arisan').show()
            $('.btn-ubah-titipan_arisan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-titipan_arisan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-titipan_arisan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-titipan_arisan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_arisan/simpantitipan_arisan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-titipan_arisan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/titipan_arisan/simpantitipan_arisan/edit');?>",
                data:{
                    id:$('.btn-ubah-titipan_arisan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    loadData();
                }
            })
        });
    </script>
<?php } ?>


<?php if (isset($page) && $page == 'transaksi_dcu') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-dcu').show()
            $('.btn-ubah-dcu').hide()
            $.ajax({
                url: "<?=base_url('index.php/dcu/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-dcu').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        if (data.catatan[i].id_dcu === undefined) {
                          $('.riwayat-dcu').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${data.catatan[i].keterangan}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>
                              </td>
                          </tr>`);
                        }else{
                          $('.riwayat-dcu').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${data.catatan[i].keterangan}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>
                                  <a class="badge badge-success"
                                  onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_dcu}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                  ><i class="fa fa-pen"></i></a>
                                  <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_dcu})"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>`);
                        }
                    }
                    $('.akumulasi-dcu').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-dcu').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/dcu/hapusdcu');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-dcu-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-dcu-keluar')[0].checked = true
            }
            $('.btn-simpan-dcu').hide()
            $('.btn-ubah-dcu').show()
            $('.btn-batal').show();
            $('.btn-ubah-dcu').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-dcu').show()
            $('.btn-ubah-dcu').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-dcu-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-dcu-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-dcu').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/dcu/simpandcu');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-dcu').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/dcu/simpandcu/edit');?>",
                data:{
                    id:$('.btn-ubah-dcu').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    loadData();
                }
            })
        });
    </script>
<?php } ?>


<?php if (isset($page) && $page == 'transaksi_dcr') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-dcr').show()
            $('.btn-ubah-dcr').hide()
            $.ajax({
                url: "<?=base_url('index.php/dcr/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-dcr').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        if (data.catatan[i].id_dcr === undefined) {
                          $('.riwayat-dcr').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${data.catatan[i].keterangan}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>
                              </td>
                          </tr>`);
                        }else{
                          $('.riwayat-dcr').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${data.catatan[i].keterangan}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>
                                  <a class="badge badge-success"
                                  onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_dcr}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                  ><i class="fa fa-pen"></i></a>
                                  <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_dcr})"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>`);
                        }
                    }
                    $('.akumulasi-dcr').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-dcr').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/dcr/hapusdcr');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, jenis_, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (jenis_ == 0) {
                $('.jenis-dcr-masuk')[0].checked = true
                jenis = 0
            }
            if (jenis_ == 1) {
                $('.jenis-dcr-keluar')[0].checked = true
                jenis = 1
            }
            $('.btn-simpan-dcr').hide()
            $('.btn-ubah-dcr').show()
            $('.btn-batal').show();
            $('.btn-ubah-dcr').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-dcr').show()
            $('.btn-ubah-dcr').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-dcr-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-dcr-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-dcr').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/dcr/simpandcr');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-dcr').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/dcr/simpandcr/edit');?>",
                data:{
                    id:$('.btn-ubah-dcr').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_beban_simpanan_wajib_tarik') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-beban_simpanan_wajib_tarik').show()
            $('.btn-ubah-beban_simpanan_wajib_tarik').hide()
            $.ajax({
                url: "<?=base_url('index.php/beban_simpanan_wajib_tarik/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-beban_simpanan_wajib_tarik').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                      if (data.catatan[i].id_simpanan_wajib_tarik == undefined) {
                        $('.riwayat-beban_simpanan_wajib_tarik').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                        </tr>`);
                      }else{
                        $('.riwayat-beban_simpanan_wajib_tarik').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].keterangan}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_beban_simpanan_wajib_tarik}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_beban_simpanan_wajib_tarik})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                      }
                    }
                    $('.akumulasi-beban_simpanan_wajib_tarik').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-beban_simpanan_wajib_tarik').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/beban_simpanan_wajib_tarik/hapusbeban_simpanan_wajib_tarik');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-beban_simpanan_wajib_tarik-masuk')[0].checked = true
            }
            if (_jenis == 1) {
              jenis = 1
                $('.jenis-beban_simpanan_wajib_tarik-keluar')[0].checked = true
            }
            $('.btn-simpan-beban_simpanan_wajib_tarik').hide()
            $('.btn-ubah-beban_simpanan_wajib_tarik').show()
            $('.btn-batal').show();
            $('.btn-ubah-beban_simpanan_wajib_tarik').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-beban_simpanan_wajib_tarik').show()
            $('.btn-ubah-beban_simpanan_wajib_tarik').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-beban_simpanan_wajib_tarik-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-beban_simpanan_wajib_tarik-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-beban_simpanan_wajib_tarik').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/beban_simpanan_wajib_tarik/simpanbeban_simpanan_wajib_tarik');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val(''),
                    $('#keterangan').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        })
        $('.btn-ubah-beban_simpanan_wajib_tarik').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/beban_simpanan_wajib_tarik/simpanbeban_simpanan_wajib_tarik/edit');?>",
                data:{
                    id:$('.btn-ubah-beban_simpanan_wajib_tarik').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_beban_biaya_pengurus') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-beban_biaya_pengurus').show()
            $('.btn-ubah-beban_biaya_pengurus').hide()
            $.ajax({
                url: "<?=base_url('index.php/beban_biaya_pengurus/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-beban_biaya_pengurus').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        console.log(data.catatan);
                        if (data.catatan[i].id_beban_biaya_pengurus !== undefined) {
                          $('.riwayat-beban_biaya_pengurus').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                    <a class="badge badge-success"
                                    onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_beban_biaya_pengurus}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                    ><i class="fa fa-pen"></i></a>
                                    <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_beban_biaya_pengurus})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`);
                        }else{
                          $('.riwayat-beban_biaya_pengurus').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>
                                </td>
                            </tr>`);
                        }
                    }
                    $('.akumulasi-beban_biaya_pengurus').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-beban_biaya_pengurus').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/beban_biaya_pengurus/hapusbeban_biaya_pengurus');?>",
                data:{
                    id:id,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-beban_biaya_pengurus-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-beban_biaya_pengurus-keluar')[0].checked = true
            }
            $('.btn-simpan-beban_biaya_pengurus').hide()
            $('.btn-ubah-beban_biaya_pengurus').show()
            $('.btn-batal').show();
            $('.btn-ubah-beban_biaya_pengurus').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-beban_biaya_pengurus').show()
            $('.btn-ubah-beban_biaya_pengurus').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-beban_biaya_pengurus-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-beban_biaya_pengurus-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-beban_biaya_pengurus').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/beban_biaya_pengurus/simpanbeban_biaya_pengurus');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#jumlah').val('')
                  $('#keterangan').val('')
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        })
        $('.btn-ubah-beban_biaya_pengurus').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/beban_biaya_pengurus/simpanbeban_biaya_pengurus/edit');?>",
                data:{
                    id:$('.btn-ubah-beban_biaya_pengurus').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_investasi_simapan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-investasi_simapan').show()
            $('.btn-ubah-investasi_simapan').hide()
            $.ajax({
                url: "<?=base_url('index.php/investasi_simapan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-investasi_simapan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        if (data.catatan[i].id_investasi_simapan === undefined) {
                          $('.riwayat-investasi_simapan').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td></td>
                            </tr>`);
                        }else{
                          $('.riwayat-investasi_simapan').append(`
                            <tr>
                                <td>${data.catatan[i].waktu}</td>
                                <td>${data.catatan[i].keterangan}</td>
                                <td>${rupiah(data.catatan[i].jumlah)}</td>
                                <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                                <td>
                                    <a class="badge badge-success"
                                    onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_investasi_simapan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis}, '${data.catatan[i].keterangan}')"
                                    ><i class="fa fa-pen"></i></a>
                                    <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_investasi_simapan})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`);
                        }
                    }
                    $('.akumulasi-investasi_simapan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-investasi_simapan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/investasi_simapan/hapusinvestasi_simapan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis, keterangan) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#keterangan').val(keterangan)
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-investasi_simapan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-investasi_simapan-keluar')[0].checked = true
            }
            $('.btn-simpan-investasi_simapan').hide()
            $('.btn-ubah-investasi_simapan').show()
            $('.btn-batal').show();
            $('.btn-ubah-investasi_simapan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#keterangan').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-investasi_simapan').show()
            $('.btn-ubah-investasi_simapan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-investasi_simapan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-investasi_simapan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-investasi_simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/investasi_simapan/simpaninvestasi_simapan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {                  
                  $('#jumlah').val('')
                  $('#keterangan').val('')
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-investasi_simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/investasi_simapan/simpaninvestasi_simapan/edit');?>",
                data:{
                    id:$('.btn-ubah-investasi_simapan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val(),
                    keterangan:$('#keterangan').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_simapan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-simapan').show()
            $('.btn-ubah-simapan').hide()
            $.ajax({
                url: "<?=base_url('index.php/simapan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-simapan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-simapan').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_simapan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_simapan})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-simapan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-simapan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/simapan/hapusSimapan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                $('.jenis-simapan-masuk')[0].checked = true
                jenis = 0
            }
            if (_jenis == 1) {
                $('.jenis-simapan-keluar')[0].checked = true
                jenis = 1
            }
            $('.btn-simpan-simapan').hide()
            $('.btn-ubah-simapan').show()
            $('.btn-batal').show();
            $('.btn-ubah-simapan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-simapan').show()
            $('.btn-ubah-simapan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-simapan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-simapan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/simapan/simpanSimapan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#jumlah').val('')
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/simapan/simpanSimapan/edit');?>",
                data:{
                    id:$('.btn-ubah-simapan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>
<?php if (isset($page) && $page == 'transaksi_bunga_sibuhari') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-bunga_sibuhari').show()
            $('.btn-ubah-bunga_sibuhari').hide()
            $.ajax({
                url: "<?=base_url('index.php/bunga_sibuhari/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-bunga_sibuhari').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-bunga_sibuhari').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_bunga_sibuhari}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_bunga_sibuhari})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-bunga_sibuhari').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-bunga_sibuhari').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/bunga_sibuhari/hapusbunga_sibuhari');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0;
                $('.jenis-bunga_sibuhari-masuk')[0].checked = true
            }
            if (_jenis == 1) {
              jenis = 1;
                $('.jenis-bunga_sibuhari-keluar')[0].checked = true
            }
            $('.btn-simpan-bunga_sibuhari').hide()
            $('.btn-ubah-bunga_sibuhari').show()
            $('.btn-batal').show();
            $('.btn-ubah-bunga_sibuhari').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-bunga_sibuhari').show()
            $('.btn-ubah-bunga_sibuhari').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-bunga_sibuhari-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-bunga_sibuhari-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-bunga_sibuhari').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/bunga_sibuhari/simpanbunga_sibuhari');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#jumlah').val('')
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-bunga_sibuhari').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/bunga_sibuhari/simpanbunga_sibuhari/edit');?>",
                data:{
                    id:$('.btn-ubah-bunga_sibuhari').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_bunga_simapan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-bunga_simapan').show()
            $('.btn-ubah-bunga_simapan').hide()
            $.ajax({
                url: "<?=base_url('index.php/bunga_simapan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-bunga_simapan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        $('.riwayat-bunga_simapan').append(`
                        <tr>
                            <td>${data.catatan[i].waktu}</td>
                            <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                            <td>${rupiah(data.catatan[i].jumlah)}</td>
                            <td>
                                <a class="badge badge-success"
                                onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_bunga_simapan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                ><i class="fa fa-pen"></i></a>
                                <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_bunga_simapan})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }
                    $('.akumulasi-bunga_simapan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-bunga_simapan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/bunga_simapan/hapusbunga_simapan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0;
                $('.jenis-bunga_simapan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1;
                $('.jenis-bunga_simapan-keluar')[0].checked = true
            }
            $('.btn-simpan-bunga_simapan').hide()
            $('.btn-ubah-bunga_simapan').show()
            $('.btn-batal').show();
            $('.btn-ubah-bunga_simapan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-bunga_simapan').show()
            $('.btn-ubah-bunga_simapan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-bunga_simapan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-bunga_simapan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-bunga_simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/bunga_simapan/simpanbunga_simapan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    $('#jumlah').val('')
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-bunga_simapan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/bunga_simapan/simpanbunga_simapan/edit');?>",
                data:{
                    id:$('.btn-ubah-bunga_simapan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'transaksi_laba_penjualan') { ?>
    <script>
        let jenis = 0;
        loadData()
        function loadData() {
            
            $('.btn-simpan-laba_penjualan').show()
            $('.btn-ubah-laba_penjualan').hide()
            $.ajax({
                url: "<?=base_url('index.php/laba_penjualan/getCatatan');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.riwayat-laba_penjualan').html('')
                    for (let i = 0; i < data.catatan.length; i++) {
                        if (data.catatan[i].id_laba_penjualan === undefined) {
                          $('.riwayat-laba_penjualan').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>
                              </td>
                          </tr>`);
                        }else{
                          $('.riwayat-laba_penjualan').append(`
                          <tr>
                              <td>${data.catatan[i].waktu}</td>
                              <td>${rupiah(data.catatan[i].jumlah)}</td>
                              <td>${data.catatan[i].jenis == 0 ? 'Masuk' : 'Keluar'}</td>
                              <td>
                                  <a class="badge badge-success"
                                  onclick="getData(${data.catatan[i].jumlah}, ${data.catatan[i].id_laba_penjualan}, '${data.catatan[i].waktu}', ${data.catatan[i].jenis})"
                                  ><i class="fa fa-pen"></i></a>
                                  <a class="badge badge-danger" onclick="hapusData(${data.catatan[i].id_laba_penjualan})"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>`);
                        }
                    }
                    $('.akumulasi-laba_penjualan').html('')
                    data.akumulasi = Object.values(data.akumulasi)
                    for (let i = 0; i < data.akumulasi.length; i++) {
                        $('.akumulasi-laba_penjualan').append(`
                        <tr>
                            <td>${data.akumulasi[i].bulan}</td>
                            <td>${rupiah(data.akumulasi[i].debit)}</td>
                            <td>${rupiah(data.akumulasi[i].kredit)}</td>
                            <td>${rupiah(data.akumulasi[i].jumlah)}</td>
                        </tr>
                        `);
                    }
                }
            });
        }

        function hapusData(id) {
            $.ajax({
                url: "<?=base_url('index.php/laba_penjualan/hapuslaba_penjualan');?>",
                data:{
                    id:id
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                }
            })
        }

        function getData(jumlah, id, waktu, _jenis) {
            waktu = waktu.split('-')
            console.log(waktu);
            $('#jumlah').val(rupiah(jumlah))
            $('#tanggal').val(waktu[2])
            $('#bulan')[0].selectedIndex = parseInt(waktu[1]) - 1
            $('#tahun').val(waktu[0])
            if (_jenis == 0) {
                jenis = 0
                $('.jenis-laba_penjualan-masuk')[0].checked = true
            }
            if (_jenis == 1) {
                jenis = 1
                $('.jenis-laba_penjualan-keluar')[0].checked = true
            }
            $('.btn-simpan-laba_penjualan').hide()
            $('.btn-ubah-laba_penjualan').show()
            $('.btn-batal').show();
            $('.btn-ubah-laba_penjualan').data('id', id)
        }

        $('.btn-batal').on('click', () => {
            batal();
        })

        function batal() {
            $('#jumlah').val("")
            $('#tanggal').val(<?= $_SESSION['hari']; ?>)
            $('#bulan')[0].selectedIndex = parseInt(<?= $_SESSION['bulan']; ?>) - 1
            $('#tahun').val(<?= $_SESSION['tahun']; ?>)
            $('.btn-simpan-laba_penjualan').show()
            $('.btn-ubah-laba_penjualan').hide()
            $('.btn-batal').hide();
        }

        $('.jenis-laba_penjualan-keluar').on('click', () => {
            jenis = 1;
        })
        $('.jenis-laba_penjualan-masuk').on('click', () => {
            jenis = 0;
        })

        $('#bulan_tampil').on('change', () => loadData());
        $('.btn-simpan-laba_penjualan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/laba_penjualan/simpanlaba_penjualan');?>",
                data:{
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    tahun:$('#tahun').val(),
                    jenis:jenis,
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                  $('#jumlah').val('')
                  if (data.validasi === false) {
                    $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                    $('.validasiLKSBModal').show();
                  }else{
                    loadData();
                  }
                    // console.log(data);
                }
            })
        })
        $('.btn-ubah-laba_penjualan').on('click', () => {
            $.ajax({
                url: "<?=base_url('index.php/laba_penjualan/simpanlaba_penjualan/edit');?>",
                data:{
                    id:$('.btn-ubah-laba_penjualan').data('id'),
                    tanggal:$('#tanggal').val(),
                    bulan:$('#bulan').val(),
                    jenis:jenis,
                    tahun:$('#tahun').val(),
                    jumlah:$('#jumlah').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    batal();
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            })
        });
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'daftar_jatuh_tempo') { ?>
    <script>
        loadData()
        function loadData() {
            loading();
            $.ajax({
                url: "<?=base_url('index.php/admin/getDaftarJatuhTempo');?>",
                data:{
                    bulan:$('#bulan_tampil').val()
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('.loading').hide();
                    $('.daftar-jatuh-tempo').html('')
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].lalai === false) {
                            $('.daftar-jatuh-tempo').append(`
                                <tr>
                                    <td>${i+ 1}</td>
                                    <td>${data[i].no_buku}</td>
                                    <td>${data[i].nama_anggota}</td>
                                    <td>${rupiah(data[i].pinjaman.jumlah)}</td>
                                    <td>${rupiah(data[i].pinjaman.angsuran.sisa)}</td>
                                    <td>${data[i].pinjaman.waktu}</td>
                                    <td>${data[i].pinjaman.lama_pinjaman} Bulan</td>
                                    <td>${data[i].pinjaman.jatuh_tempo}</td>
                                    <td>${data[i].no_buku}</td>
                                    <td>
                                        <button class="badge badge-primary" onclick="daftarLalai(${data[i].id_anggota}, `+$('#bulan_tampil').val()+`, ${data[i].tahun})">
                                            Bukan Lalai
                                        </button>
                                    </td>
                                </tr>
                            `);
                        }
                        else{
                            $('.daftar-jatuh-tempo').append(`
                                <tr>
                                    <td>${i+ 1}</td>
                                    <td>${data[i].no_buku}</td>
                                    <td>${data[i].nama_anggota}</td>
                                    <td>${rupiah(data[i].pinjaman.jumlah)}</td>
                                    <td>${rupiah(data[i].pinjaman.angsuran.sisa)}</td>
                                    <td>${data[i].pinjaman.waktu}</td>
                                    <td>${data[i].pinjaman.lama_pinjaman} Bulan</td>
                                    <td>${data[i].pinjaman.jatuh_tempo}</td>
                                    <td>${data[i].no_buku}</td>
                                    <td>
                                        <button class="badge badge-danger" onclick="Lalai(${data[i].lalai}, `+$('#bulan_tampil').val()+`, ${data[i].tahun})">
                                            Lalai
                                        </button>
                                    </td>
                                </tr>
                            `);
                        }
                    }
                }
            });
        }

        function daftarLalai(id, bulan, tahun) {

            $.ajax({
                url: "<?=base_url('index.php/admin/daftarLalai');?>",
                data:{
                    id:id,
                    bulan:bulan,
                    tahun:tahun,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            });
        }

        function Lalai(id, bulan, tahun) {
            $.ajax({
                url: "<?=base_url('index.php/admin/daftarLalai/');?>"+id,
                data:{
                  bulan:bulan,
                  tahun:tahun,
                },
                method:'post',
                dataType:'json',
                success:function (data) {
                    if (data.validasi === false) {
                      $('.validasiLKSBModalText').html(`LKSB Bulan ${data.bulan} Tahun ${data.tahun} Telah Tervalidasi, Tidak Bisa Dilakukan Perubahan Data`);
                      $('.validasiLKSBModal').show();
                    }else{
                      loadData();
                    }
                }
            });
        }

        $('#bulan_tampil').on('change', () => loadData())
    </script>
<?php } ?>

<?php if (isset($page) && $page == 'bukuBesar') { ?>
  <script type="text/javascript">
    function loadData() {
      loading();
      $.ajax({
          url: "<?=base_url('index.php/bukuBesar/getDetail');?>",
          data:{

          },
          method:'post',
          dataType:'json',
          success:function (data) {
              $('.loading').hide();
              renderRekening(data, 'kas');
              renderRekening(data, 'sibuhari');
              renderRekening(data, 'piutang_arisan');
              renderRekening(data, 'simapan');
              renderRekening(data, 'persediaan');
              renderRekening(data, 'inventaris');
              renderRekening(data, 'investasi_simapan');
              renderRekening(data, 'hibah');
              renderRekening(data, 'dcu');
              renderRekening(data, 'dcr');
              renderRekening(data, 'titipan_simpanan');
              renderRekening(data, 'titipan_konsumsi');
              renderRekening(data, 'titipan_arisan');
              renderRekening(data, 'simpanan_pokok');
              renderRekening(data, 'simpanan_wajib');
              renderRekening(data, 'simpanan_sukarela');
              renderRekening(data, 'piutang_pinjaman_anggota');
              renderRekening(data, 'sibulan');
              renderRekening(data, 'biaya_yg_masih_harus_dibayar');
              renderRekening(data, 'simpanan_wajib_tarik_yg_masih_harus_dibayar');
              renderRekening(data, 'shu');
              renderRekening(data, 'saldo_uang_duka');
              renderRekening(data, 'bunga_pinjaman');
              renderRekening(data, 'provisi');
              renderRekening(data, 'uang_pangkal');
              renderRekening(data, 'bunga_sibuhari');
              renderRekening(data, 'laba_penjualan_barang');
              renderRekening(data, 'administrasi_pelayanan');
              renderRekening(data, 'pendapatan_lainnya');
              renderRekening(data, 'simpanan_non_saham');
              renderRekening(data, 'biaya_organisasi');
              renderRekening(data, 'beban_simpanan_wajib_tarik');
              renderRekening(data, 'beban_biaya_pengurus');
              renderRekening(data, 'foto_copy');
              renderRekening(data, 'dana_duka');
              renderRekening(data, 'rat');
          }
      });
    }

    function renderRekening(data, key) {
      for (var i = 0; i < Object.keys(data).length; i++) {
        $('.akumulasi-'+key).append(`
          <tr>
            <td>${data[i]['bulan'] === '' ? 'Desember <?=$_SESSION['tahun'] - 1?>' : data[i]['bulan']}</td>
            <td>${rupiah(data[i][key][key+'_masuk'])}</td>
            <td>${rupiah(data[i][key][key+'_keluar'])}</td>
            <td>${rupiah(data[i][key]['saldo'])}</td>
          </tr>`
        );
      }
    }

    loadData();
  </script>
<?php } ?>

</body>
</html>
