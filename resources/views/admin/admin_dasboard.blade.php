@extends('layouts.master_3')

@section('Content')

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
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

                <div id="panel-1" class="panel" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-refresh="false" data-panel-reset="false">
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
                                        @php
                                            $total_siswa = count($siswa->where('status_aktif', '=', 'Aktif'));
                                            $siswa_belum_bayar = count($siswa->where('status_bayar', '=', 'Belum Bayar')->where('status_aktif', '=', 'Aktif'));
                                            $siswa_sudah_bayar = count($siswa->where('status_bayar', '=', 'Bayar')->where('status_aktif', '=', 'Aktif'));
                                        @endphp
                                        <div class="row h-100" id="barStacked">
                                            <canvas style="width:80%; height:100%"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-content p-0">
                                <div class="container">
                                    <div class="row">
                                        @php
                                            $total_siswa2  = count($siswa);
                                            $siswa_aktif2  = count($siswa->where('status_aktif', '=', 'Aktif'));
                                            $siswa_tidak_aktif2 = count($siswa->where('status_aktif', '=', 'Tidak Aktif'));
                                            $p_siswa_aktif = ($siswa_aktif2/$total_siswa2)*100;
                                            $p_siswa_tidak_aktif = ($siswa_tidak_aktif2/$total_siswa2)*100;
                                        @endphp
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex">
                                                        Aktif
                                                        <span class="d-inline-block ml-auto"><?php echo $siswa_aktif2 ?></span>
                                                    </div>
                                                    <div class="progress progress mb-3">
                                                        <div class="progress-bar bg-success-500 progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $p_siswa_aktif ?>%" aria-valuenow="<?php echo $p_siswa_aktif ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        Tidak Aktif
                                                        <span class="d-inline-block ml-auto"><?php echo $siswa_tidak_aktif2 ?></span>
                                                    </div>
                                                    <div class="progress progress mb-3">
                                                        <div class="progress-bar bg-fusion-400 progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $p_siswa_tidak_aktif ?>%" aria-valuenow="<?php echo $p_siswa_tidak_aktif ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>

                                        @php
                                            $siswa_laki  = count($siswa->where('jenis_kelamin', '=', 'L')->where('status_aktif', '=', 'Aktif'));
                                            $siswa_perempuan = count($siswa->where('jenis_kelamin', '=', 'P')->where('status_aktif', '=', 'Aktif'));
                                            $p_siswa_laki = ($siswa_laki/$total_siswa)*100;
                                            $p_siswa_perempuan = ($siswa_perempuan/$total_siswa)*100;
                                        @endphp
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex">
                                                        Laki-Laki
                                                        <span class="d-inline-block ml-auto"><?php echo $siswa_laki ?></span>
                                                    </div>
                                                    <div class="progress progress mb-3">
                                                        <div class="progress-bar bg-warning-500 progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $p_siswa_laki ?>%;" aria-valuenow="<?php echo $p_siswa_laki ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        Perempuan
                                                        <span class="d-inline-block ml-auto"><?php echo $siswa_perempuan ?></span>
                                                    </div>
                                                    <div class="progress progress mb-3">
                                                        <div class="progress-bar bg-fusion-400 progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $p_siswa_perempuan ?>%;" aria-valuenow="<?php echo $p_siswa_perempuan?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
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
                var total_siswa= "Total : "+<?php echo json_encode($total_siswa); ?>+" Siswa Aktif";
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

@endsection