      
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
    <strong>Copyright &copy; 2020 <a href="#">Koperasi UME MNASI</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets');?>/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets');?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets');?>/dist/js/demo.js"></script>
<!-- MAIN -->
<script src="<?=base_url('assets');?>/dist/js/main.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    'use strict'
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
  var mode = 'index'
  var intersect = true
  let bulan = 12;
  let dataKasTiapBulan = [];
  let dataUangMasuk = [];
  let dataUangKeluar = [];
  let dataPiutang = [];
  let dataSibulan = [];
  let dataRekap = [];
  function loadData() {
    $.ajax({
      url: "<?=base_url('index.php/dataManagement/dataSUMSUK/true');?>",
      data:{
        bulan:bulan
      },
      method:'post',
      dataType:'json',
      success:function (data) {
        dataKasTiapBulan = data.kas_tiap_bulan
        dataUangMasuk = Object.values(data.total_masuk)
        dataUangKeluar = Object.values(data.total_keluar)
        loadKas();
      }
    })
  }
  function loadPiutang() {
    $.ajax({
      url: "<?=base_url('index.php/dataManagement/dataPiutangAnggota/true');?>",
      data:{},
      method:'post',
      dataType:'json',
      success:function (data) {
        dataPiutang = data
        loadPiutangChart();
      }
    })
  }
  function loadSibulan() {
    $.ajax({
      url: "<?=base_url('index.php/dataManagement/dataSibulan/true');?>",
      data:{},
      method:'post',
      dataType:'json',
      success:function (data) {
        dataSibulan = data
        loadSibulanChart();
      }
    })
  }
  function loadRekap() {
    $.ajax({
      url: "<?=base_url('index.php/dataManagement/dataRekap');?>",
      data:{},
      method:'post',
      dataType:'json',
      success:function (data) {
        dataRekap = data
        loadRekapChart()
      }
    })
  }
  loadSibulan();
  loadRekap();
  loadData();
  loadPiutang();

  function loadRekapChart() {
    let donutData        = {
      labels: [
          'Pokok',
          'Wajib',
          'Sukarela'
      ],
      datasets: [
        {
          data: dataRekap,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    let pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    let pieData        = donutData;
    let pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  }
  function loadKas() {
    
    $('.text-kas-bulan-ini').html('Rp. '+ dataKasTiapBulan[bulan])
    if (parseInt(dataKasTiapBulan[bulan].toString().replaceAll(',','')) < parseInt(dataKasTiapBulan[bulan - 1].toString().replaceAll(',',''))) {
      $('.naikTurunSumsuk').removeClass('text-success')
      $('.naikTurunSumsuk').addClass('text-danger')
      $('.naikTurunSumsuk').html('<i class="fas fa-arrow-down"></i> Rp. '+ rupiah(parseInt(dataKasTiapBulan[bulan - 1].toString().replaceAll(',','')) - parseInt(dataKasTiapBulan[bulan].toString().replaceAll(',',''))));
    }
    else{
      $('.naikTurunSumsuk').addClass('text-success')
      $('.naikTurunSumsuk').removeClass('text-danger')
      $('.naikTurunSumsuk').html('<i class="fas fa-arrow-up"></i> Rp. '+ rupiah(parseInt(dataKasTiapBulan[bulan].toString().replaceAll(',','')) - parseInt(dataKasTiapBulan[bulan - 1].toString().replaceAll(',',''))) );
    }
    var $salesChart = $('#sales-chart1')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: dataUangMasuk
          },
          {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: dataUangKeluar
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return 'Rp.' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
    dataKasTiapBulan = Object.values(dataKasTiapBulan)
    for (let i = 0; i < dataKasTiapBulan.length; i++) {
      dataKasTiapBulan[i] = parseInt(dataKasTiapBulan[i].toString().replaceAll(',',''))
      $('.kas-'+(i+1)).html('<b>Rp. '+rupiah(dataKasTiapBulan[i])+'</b>');
    }
    var $salesChart = $('#sales-chart4')
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: dataKasTiapBulan
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return 'Rp.' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  }
  function loadPiutangChart() {
    // console.log(dataPiutang);
    $('.text-piutang-bulan-ini').html('Rp. '+ rupiah(dataPiutang[bulan - 1]))
    if (parseInt(dataPiutang[bulan - 1]) < parseInt(dataPiutang[bulan - 2])) {
      $('.naikTurunPinjaman').removeClass('text-success')
      $('.naikTurunPinjaman').addClass('text-danger')
      $('.naikTurunPinjaman').html('<i class="fas fa-arrow-down"></i> Rp. '+ rupiah(parseInt(dataPiutang[bulan - 2]) - parseInt(dataPiutang[bulan - 1])));
    }
    else{
      $('.naikTurunPinjaman').addClass('text-success')
      $('.naikTurunPinjaman').removeClass('text-danger')
      $('.naikTurunPinjaman').html('<i class="fas fa-arrow-up"></i> Rp. '+ rupiah(parseInt(dataPiutang[bulan - 1]) - parseInt(dataPiutang[bulan - 2])) );
    }
    var $salesChart = $('#sales-chart2')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: dataPiutang
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return 'Rp.' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  }
  function loadSibulanChart() {
    // console.log(dataPiutang);
    $('.text-sibulan-bulan-ini').html('Rp. '+ rupiah(dataSibulan.saldo[bulan - 1]))
    if (parseInt(dataSibulan.saldo[bulan - 1]) < parseInt(dataSibulan.saldo[bulan - 2])) {
      $('.naikTurunSibulan').removeClass('text-success')
      $('.naikTurunSibulan').addClass('text-danger')
      $('.naikTurunSibulan').html('<i class="fas fa-arrow-down"></i> Rp. '+ rupiah(parseInt(dataSibulan.saldo[bulan - 2]) - parseInt(dataSibulan.saldo[bulan - 1])));
    }
    else{
      $('.naikTurunSibulan').addClass('text-success')
      $('.naikTurunSibulan').removeClass('text-danger')
      $('.naikTurunSibulan').html('<i class="fas fa-arrow-up"></i> Rp. '+ rupiah(parseInt(dataSibulan.saldo[bulan - 1]) - parseInt(dataSibulan.saldo[bulan - 2])) );
    }
    var $salesChart = $('#sales-chart3')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: dataSibulan.saldo
          },
          {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: dataSibulan.kredit
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return 'Rp.' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  }
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    // var areaChartData = {
    //   labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //   datasets: [
    //     {
    //       label               : 'Digital Goods',
    //       backgroundColor     : 'rgba(60,141,188,0.9)',
    //       borderColor         : 'rgba(60,141,188,0.8)',
    //       pointRadius          : false,
    //       pointColor          : '#3b8bba',
    //       pointStrokeColor    : 'rgba(60,141,188,1)',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(60,141,188,1)',
    //       data                : [28, 48, 40, 19, 86, 27, 90]
    //     },
    //     {
    //       label               : 'Electronics',
    //       backgroundColor     : 'rgba(210, 214, 222, 1)',
    //       borderColor         : 'rgba(210, 214, 222, 1)',
    //       pointRadius         : false,
    //       pointColor          : 'rgba(210, 214, 222, 1)',
    //       pointStrokeColor    : '#c1c7d1',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : [65, 59, 80, 81, 56, 55, 40]
    //     },
    //   ]
    // }

    // var areaChartOptions = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    //   legend: {
    //     display: false
    //   },
    //   scales: {
    //     xAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }],
    //     yAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }]
    //   }
    // }

    // // This will get the first returned node in the jQuery collection.
    // var areaChart       = new Chart(areaChartCanvas, {
    //   type: 'line',
    //   data: areaChartData,
    //   options: areaChartOptions
    // })

    // //-------------
    // //- LINE CHART -
    // //--------------
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = $.extend(true, {}, areaChartOptions)
    // var lineChartData = $.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, {
    //   type: 'line',
    //   data: lineChartData,
    //   options: lineChartOptions
    // })

    // //-------------
    // //- DONUT CHART -
    // //-------------
    // // Get context with jQuery - using jQuery's .get() method.
    // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    // var donutData        = {
    //   labels: [
    //       'Pokok',
    //       'Wajib',
    //       'Sukarela'
    //   ],
    //   datasets: [
    //     {
    //       data: [700,500,400],
    //       backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
    //     }
    //   ]
    // }
    // // var donutOptions     = {
    // //   maintainAspectRatio : false,
    // //   responsive : true,
    // // }
    // // //Create pie or douhnut chart
    // // // You can switch between pie and douhnut using the method below.
    // // var donutChart = new Chart(donutChartCanvas, {
    // //   type: 'doughnut',
    // //   data: donutData,
    // //   options: donutOptions
    // // })

    // //-------------
    // //- PIE CHART -
    // //-------------
    // // Get context with jQuery - using jQuery's .get() method.
    // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    // var pieData        = donutData;
    // var pieOptions     = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    // }
    // //Create pie or douhnut chart
    // // You can switch between pie and douhnut using the method below.
    // var pieChart = new Chart(pieChartCanvas, {
    //   type: 'pie',
    //   data: pieData,
    //   options: pieOptions
    // })

    // //-------------
    // //- BAR CHART -
    // //-------------
    // var barChartCanvas = $('#barChart').get(0).getContext('2d')
    // var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

    // var barChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   datasetFill             : false
    // }

    // var barChart = new Chart(barChartCanvas, {
    //   type: 'bar',
    //   data: barChartData,
    //   options: barChartOptions
    // })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    // let bulan = <?=date('m');?>;
    // let dataUangMasuk = [];
    // let dataUangKeluar = [];
    // function loadData() {
    // $.ajax({
    //     url: "<?=base_url('index.php/admin/dataSUMSUK');?>",
    //     data:{
    //       bulan:bulan
    //     },
    //     method:'post',
    //     dataType:'json',
    //     success:function (data) {
    //       dataUangMasuk = Object.values(data.total_masuk)
    //       dataUangKeluar = Object.values(data.total_keluar)
    //       loadKas();
    //     }
    //   })
    // }
    // loadData();
    // function loadKas() {
    //   var areaChartData = {
    //     labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
    //     datasets: [
    //       {
    //         label               : 'Uang Masuk',
    //         backgroundColor     : 'rgba(60,141,188,0.9)',
    //         borderColor         : 'rgba(60,141,188,0.8)',
    //         pointRadius          : false,
    //         pointColor          : '#3b8bba',
    //         pointStrokeColor    : 'rgba(60,141,188,1)',
    //         pointHighlightFill  : '#fff',
    //         pointHighlightStroke: 'rgba(60,141,188,1)',
    //         data                : dataUangMasuk
    //       },
    //       {
    //         label               : 'Uang Keluar',
    //         backgroundColor     : 'rgba(210, 214, 222, 1)',
    //         borderColor         : 'rgba(210, 214, 222, 1)',
    //         pointRadius         : false,
    //         pointColor          : 'rgba(210, 214, 222, 1)',
    //         pointStrokeColor    : '#c1c7d1',
    //         pointHighlightFill  : '#fff',
    //         pointHighlightStroke: 'rgba(220,220,220,1)',
    //         data                : dataUangKeluar
    //       },
    //     ]
    //   }
    //   console.log(areaChartData);
    //   var barChartData = $.extend(true, {}, areaChartData)
    //   var temp0 = areaChartData.datasets[0]
    //   var temp1 = areaChartData.datasets[1]
    //   barChartData.datasets[0] = temp1
    //   barChartData.datasets[1] = temp0

    //   var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    //   var stackedBarChartData = $.extend(true, {}, barChartData)

    //   var stackedBarChartOptions = {
    //     responsive              : true,
    //     maintainAspectRatio     : false,
    //     scales: {
    //       xAxes: [{
    //         stacked: true,
    //       }],
    //       yAxes: [{
    //         stacked: true
    //       }]
    //     }
    //   }

    //   var stackedBarChart = new Chart(stackedBarChartCanvas, {
    //     type: 'bar',
    //     data: stackedBarChartData,
    //     options: stackedBarChartOptions
    //   })
    // }
  })
</script>

<script>
    function loading(element) {
        element.innerHTML = 'Loading...'
    }
</script>
</body>
</html>
