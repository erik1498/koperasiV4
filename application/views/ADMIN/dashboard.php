<!-- <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laporan SUM dan SUK</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-kas-bulan-ini text-lg">Loading...</span>
                            <span>Kas Bulan Ini</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success naikTurunSumsuk">
                            </span>
                            <span class="text-muted">Dari Bulan Lalu</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart1" height="150"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Masuk
                            </span>

                            <span>
                            <i class="fas fa-square text-gray"></i> Keluar
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laporan Piutang</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-piutang-bulan-ini text-lg">Loading...</span>
                            <span>Total Pinjaman Bulan Ini</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success naikTurunPinjaman">
                            </span>
                            <span class="text-muted">Dari Bulan Lalu</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart2" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laporan Sibulan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                            <span class="text-bold text-sibulan-bulan-ini text-lg">Loading...</span>
                            <span>Total Saldo Bulan Ini</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success naikTurunSibulan">
                            </span>
                            <span class="text-muted">Dari Bulan Lalu</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart3" height="150"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Saldo
                            </span>

                            <span>
                            <i class="fas fa-square text-gray"></i> Kredit
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="card-title">Simpanan</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laporan Kas Bulanan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-kas-bulan-ini text-lg">Loading...</span>
                            <span>Kas Bulan Ini</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success naikTurunSumsuk">
                            </span>
                            <span class="text-muted">Dari Bulan Lalu</span>
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <canvas id="sales-chart4" height="100"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Kas Tiap Bulan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laporan Kas Bulanan ( Angka )</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tbody>
                                        <?php for ($j=1; $j <= 6; $j++) { ?>
                                            <tr>
                                                <td><?=_getBulan($j);?>'</td>
                                                <td>:</td>
                                                <td class="kas-<?=$j?>">-</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tbody>
                                        <?php for ($j=7; $j <= 12; $j++) { ?>
                                            <tr>
                                                <td><?=_getBulan($j);?>'</td>
                                                <td>:</td>
                                                <td class="kas-<?=$j?>">-</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->