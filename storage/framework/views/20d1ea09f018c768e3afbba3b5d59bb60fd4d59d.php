<?php $__env->startSection('Content'); ?>

    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="js/statistics/chartjs/chartjs.bundle.js"></script>
    
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-chart-area'></i> Admin <span class='fw-300'>Dashboard</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div id="panel-1" class="panel panel-locked" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                    <div class="panel-hdr">
                        <h2>
                            Data Siswa
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                            <!-- ///pembayaran -->
                            <div class="row no-gutters">
                                <div class="col-lg-7 col-xl-8">
                                    <div class="position-relative">
                                        <div id="updating-chart" style="height:242px"></div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4 pl-lg-3">
                                        <div class="row" style="justify-content:center;">  
                                            <h4 class="text-center fw-300 text-muted">
                                                Pembayaran
                                            </h4>
                                        </div>
                                    <div>
                                        <?php
                                            $total_siswa = count($siswa->where('status_aktif', '=', 'Aktif'));
                                            $siswa_belum_bayar = count($siswa->where('status_bayar', '=', 'Belum Bayar')->where('status_aktif', '=', 'Aktif'));
                                            $siswa_sudah_bayar = count($siswa->where('status_bayar', '=', 'Bayar')->where('status_aktif', '=', 'Aktif'));
                                        ?>
                                        <div class="row" style="height: 100%;" id="barStacked">
                                            <canvas style="width:60%; height:100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="panel-content p-0">
                            <div class="row row-grid no-gutters">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="px-3 py-2 d-flex align-items-center">
                                            <!-- // -->
                                        <div class="row" id="barStacked">
                                            <canvas style="width:100%; height:100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="px-3 py-2 d-flex align-items-center">
                                        <div class="js-easy-pie-chart color-success-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="79" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                            <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                <span class="js-percent d-block text-dark"></span>
                                            </div>
                                        </div>
                                        <span class="d-inline-block ml-2 text-muted">
                                            DISK SPACE
                                            <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                        </span>
                                        <div class="ml-auto d-inline-flex align-items-center">
                                            <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#1dc9b7" sparkfillcolor="false" sparklinewidth="1" values="5,9,7,3,5,2,5,3,9,6"></div>
                                            <div class="d-inline-flex flex-column small ml-2">
                                                <span class="d-inline-block badge badge-info opacity-50 text-center p-1 width-6">76%</span>
                                                <span class="d-inline-block badge bg-warning-300 opacity-50 text-center p-1 width-6 mt-1">3%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="px-3 py-2 d-flex align-items-center">
                                        <div class="js-easy-pie-chart color-info-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="23" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                            <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                <span class="js-percent d-block text-dark"></span>
                                            </div>
                                        </div>
                                        <span class="d-inline-block ml-2 text-muted">
                                            DATA TTF
                                            <i class="fal fa-caret-up color-success-500 ml-1"></i>
                                        </span>
                                        <div class="ml-auto d-inline-flex align-items-center">
                                            <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#51adf6" sparkfillcolor="false" sparklinewidth="1" values="3,5,2,5,3,9,6,5,9,7"></div>
                                            <div class="d-inline-flex flex-column small ml-2">
                                                <span class="d-inline-block badge bg-fusion-500 opacity-50 text-center p-1 width-6">10GB</span>
                                                <span class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="px-3 py-2 d-flex align-items-center">
                                        <div class="js-easy-pie-chart color-fusion-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="36" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                            <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                <span class="js-percent d-block text-dark"></span>
                                            </div>
                                        </div>
                                        <span class="d-inline-block ml-2 text-muted">
                                            TEMP.
                                            <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                        </span>
                                        <div class="ml-auto d-inline-flex align-items-center">
                                            <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#fd3995" sparkfillcolor="false" sparklinewidth="1" values="5,3,9,6,5,9,7,3,5,2"></div>
                                            <div class="d-inline-flex flex-column small ml-2">
                                                <span class="d-inline-block badge badge-danger opacity-50 text-center p-1 width-6">124</span>
                                                <span class="d-inline-block badge bg-info-300 opacity-50 text-center p-1 width-6 mt-1">40F</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- col -->
        </div>
    </div>

    </main>

    <script>
         function barChart()
            {
                var total_siswa= "Total : "+<?php echo json_encode($total_siswa); ?>+" Siswa";
                var belum_lunas = <?php echo json_encode($siswa_belum_bayar); ?>;
                var lunas = <?php echo json_encode($siswa_sudah_bayar); ?>;                   
                console.log(total_siswa);

                var barStackedData = {
                    labels: [total_siswa],
                    datasets: [
                    {
                        label: "Lunas",
                        backgroundColor: '#1dc9b7',
                        data: [lunas]
                    },
                    {
                        label: "Belum Lunas",
                        backgroundColor: '#505050;',
                        data: [belum_lunas]
                    }]

                };
                var config = {
                    type: 'bar',
                    data: barStackedData,
                    options:
                    {
                        legend:
                        {
                            display: true,
                            labels:
                            {
                                display: false
                            }
                        },
                        scales:
                        {
                            yAxes: [
                            {
                                stacked: true,
                                gridLines:
                                {
                                    display: true,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: true,
                                    fontSize: 11
                                }
                            }],
                            xAxes: [
                            {
                                stacked: true,
                                gridLines:
                                {
                                    display: true,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: true,
                                    fontSize: 11
                                }
                            }]
                        }
                    }
                }
                new Chart($("#barStacked > canvas").get(0).getContext("2d"), config);
            }

    </script>

    <script>
            $(document).ready(function()
            {
                barChart();
            });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views//admin/admin_dasboard.blade.php ENDPATH**/ ?>