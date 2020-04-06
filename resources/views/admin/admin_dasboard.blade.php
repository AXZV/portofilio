@extends('layouts.master_3')

@section('Content')
<style>
    .cardx {
        border-radius: 8px;
        border:none;
        color: white;
        padding: 10px;
        position: relative;
    }

    .zmdi {
		color: white;
		font-size: 38px;
		opacity: 0.3;
		position: absolute;
		right: 13px;
		top: 13px;
	}

	.stat {
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		font-size: 11px;
		margin-top: 25px;
		padding: 10px 10px 0;
		text-transform: uppercase;
	}

	.title {
		display: inline-block;
		font-size: 12px;
		padding: 10px 10px 0;
		text-transform: uppercase;
	}

	.value {
		font-size: 28px;
		padding: 0 10px;
	}
</style>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="js/statistics/chartjs/chartjs.bundle.js"></script>
    
    <main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Admin Dasboard</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <!-- ///////////////////////////////////////////////////////////////////////// -->  
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
    <!-- ///////////////////////////////////////////////////////////////////////// -->
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-chart-area'></i> Admin <span class='fw-300'>Dashboard</span>
            </h1>
        </div>

        <div class="card-list">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="card cardx bg-info">
                        <div class="title">Siswa Aktif</div>
                        <i class="zmdi fas fa-user-graduate"></i>                     
                        <div class="value">@php echo count($siswa->where('status_aktif', 'Aktif')) @endphp</div>
                        <div class="stat"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="card cardx bg-dark">
                        <div class="title">Guru Aktif</div>
                        <i class="zmdi fas fa-id-badge"></i>
                        <div class="value">@php echo count($guru->where('status_aktif', 'Aktif')) @endphp</div>
                        <div class="stat"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="card cardx bg-warning">
                        <div class="title">Kelas Aktif</div>
                        <i class="zmdi fas fa-chalkboard-teacher"></i>
                        <div class="value">{{$pengajaran->count()}}</div>
                        <div class="stat"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
            <!-- Rekap Kehadiran Siswa -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h3 class="mb-0 fs-xl">
                                    <i class="fas fa-user-check"></i>&nbsp;Persentase Kehadiran Siswa
                                </h3>
                            </div>
                        </div>
                        <div class="col-12">
                            @php
                                $jumlahmasuk = 0;
                                $jumlahtidakmasuk = 0;
                                $jumlahijin = 0; 
                            @endphp
                            @foreach($jumlah_presensi as $jp)
                                @php
                                    $jumlahmasuk += $jp->masuk;
                                    $jumlahtidakmasuk += $jp->tidak_masuk;
                                    $jumlahijin += $jp->ijin;
                                @endphp        
                            @endforeach
                            @php
                                $jumlahtotal = $jumlahmasuk + $jumlahtidakmasuk + $jumlahijin;
                                if($jumlahmasuk == 0)
                                {     
                                    $persen_jumlahmasuk = 0;
                                }
                                if($jumlahmasuk != 0)
                                {     
                                    $persen_jumlahmasuk = round($jumlahmasuk/$jumlahtotal*100);
                                }

                                if($jumlahtidakmasuk == 0)
                                {     
                                    $persen_jumlahtidakmasuk = 0;
                                }
                                if($jumlahtidakmasuk != 0)
                                {     
                                    $persen_jumlahtidakmasuk = round($jumlahtidakmasuk/$jumlahtotal*100);
                                }

                                if($jumlahijin == 0)
                                {     
                                    $persen_jumlahijin = 0;  
                                }
                                if($jumlahijin != 0)
                                {     
                                    $persen_jumlahijin = round($jumlahijin/$jumlahtotal*100);  
                                }

                            @endphp
                            <div class="row no-gutters row-grid">                       
                                <div class="col-sm-4 col-md-4">
                                    <div class="text-center py-1">
                                        <h6 class="mb-0 fw-700">
                                            <small class="mb-0 text-success font-weight-bold">MASUK</small>
                                            <div class="chart_masuk m-2 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{$persen_jumlahmasuk}}">
                                                <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                    <span class="text-success font-weight-bold">{{$persen_jumlahmasuk}} %</span>  
                                                </div>
                                            </div>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="text-center py-1">
                                        <h6 class="mb-0 fw-700">
                                            <small class="mb-0 text-danger font-weight-bold">TIDAK MASUK</small>
                                            <div class="chart_tmasuk m-2 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{$persen_jumlahtidakmasuk}}">
                                                <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                    <span class="text-danger font-weight-bold">{{$persen_jumlahtidakmasuk}} %</span>  
                                                </div>
                                            </div>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="text-center py-1">
                                        <h6 class="mb-0 fw-700">
                                            <small class="mb-0 text-warning font-weight-bold">IJIN</small>
                                            <div class="chart_ijin m-2 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{$persen_jumlahijin}}">
                                                <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                    <span class="text-warning font-weight-bold">{{$persen_jumlahijin}} %</span>  
                                                </div>
                                            </div>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Kelas -->
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2 class="mb-0 fs-xl text-dark">
                            <i class="fas fa-chalkboard-teacher"></i>&nbsp;Kelas Berjalan
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                                <div class="row no-gutters">
                                @foreach($pengajaran as $p)                       
                                    <div class="col-sm-6 col-md-6">
                                        <!-- Card Narrower -->
                                        <div class="card card-cascade hover-highlight m-1 text-center">
                                            <h5 class="text-dark pb-2 pt-1 text-capitalize font-weight-bold mt-2">{{$p->guru_kelas->kelas->nama}}</h5>
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-md-6">
                                                    <div class="text-center py-3">
                                                        <h6 class="mb-0 fw-700 text-dark">
                                                            Guru
                                                            <small class="text-muted mb-0 text-capitalize small">{{$p->guru_kelas->guru->nama_depan}} {{$p->guru_kelas->guru->nama_belakang}}</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center py-3">
                                                        <h6 class="mb-0 fw-700 text-dark">
                                                            Siswa
                                                            <small class="text-muted mb-0 small">{{$p->siswa->count()}} Orang</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-md-12">
                                                    <small class="text-muted mb-0 text-capitalize small"> <span class="fas fa-map-signs text-info"></span> {{$p->guru_kelas->guru->instansi->nama}}</small>
                                                </div>
                                            </div>
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-md-4">
                                                    <small class="text-success mb-0 text-capitalize small "> Masuk</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-danger mb-0 text-capitalize small"> Tidak Masuk</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-warning mb-0 text-capitalize small"> Ijin</small>
                                                </div>
                                            </div>

                                            @php
                                                $jumlahmasuk2 = 0;
                                                $jumlahtidakmasuk2 = 0;
                                                $jumlahijin2 = 0;
                                                $pertemuan = 0;
                                            @endphp
                                            @foreach($jumlah_presensi->where('id_pengajaran','=',$p->kode) as $jp)
                                                @php
                                                    $jumlahmasuk2 += $jp->masuk;
                                                    $jumlahtidakmasuk2 += $jp->tidak_masuk;
                                                    $jumlahijin2 += $jp->ijin;
                                                    $pertemuan += 1;
                                                @endphp 
                                                
                                            @endforeach
                                            @php
                                                $jumlahtotal2 = $jumlahmasuk2 + $jumlahtidakmasuk2 + $jumlahijin2;

                                                if($jumlahmasuk2 == 0)
                                                {     
                                                    $persen_jumlahmasuk2 = 0;
                                                }
                                                if($jumlahmasuk2 != 0)
                                                {     
                                                    $persen_jumlahmasuk2 = round($jumlahmasuk2/$jumlahtotal2*100);
                                                }

                                                if($jumlahtidakmasuk2 == 0)
                                                {     
                                                    $persen_jumlahtidakmasuk2 = 0;
                                                }
                                                if($jumlahtidakmasuk2 != 0)
                                                {     
                                                    $persen_jumlahtidakmasuk2 = round($jumlahtidakmasuk2/$jumlahtotal2*100);
                                                }

                                                if($jumlahijin2 == 0)
                                                {     
                                                    $persen_jumlahijin2 = 0;  
                                                }
                                                if($jumlahijin2 != 0)
                                                {     
                                                    $persen_jumlahijin2 = round($jumlahijin2/$jumlahtotal2*100);  
                                                }

                                            @endphp
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-md-4">
                                                    <small class="text-success mb-0">{{$persen_jumlahmasuk2 }} %</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-danger mb-0">{{$persen_jumlahtidakmasuk2 }} %</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-warning mb-0">{{$persen_jumlahijin2 }} %</small>
                                                </div>
                                                <div class="col-md-12">
                                                    <small class="text-muted mb-0">{{$pertemuan}} x Pertemuan</small>
                                                </div>
                                                
                                            </div>                                    
                                        </div>
                                        <!-- Card Narrower -->
                                    </div>
                                @endforeach
                                </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
            <!-- Jenis Kelamin Siswa -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h3 class="mb-0 fs-xl">
                                    <i class="fas fa-user-graduate"></i>&nbsp;Siswa
                                </h3>
                            </div>
                        </div>
                        <div class="col-12">
                            @php
                                $total_siswa = count($siswa);
                                $siswa_aktif = count($siswa->where('status_aktif', '=', 'Aktif'));
                                $siswa_tidak_aktif = count($siswa->where('status_aktif', '=', 'Tidak Aktif'));
                                $siswa_laki  = count($siswa->where('jenis_kelamin', '=', 'L')->where('status_aktif', '=', 'Aktif'));
                                $siswa_perempuan = count($siswa->where('jenis_kelamin', '=', 'P')->where('status_aktif', '=', 'Aktif'));

                                $p_siswa_laki = ($siswa_laki/$siswa_aktif)*100;
                                $p_siswa_perempuan = ($siswa_perempuan/$siswa_aktif)*100;

                                $p_siswa_aktif = ($siswa_aktif/$total_siswa)*100;
                                $p_siswa_tidak_aktif = ($siswa_tidak_aktif/$total_siswa)*100;
                            @endphp
                            <div class="row no-gutters row-grid"> 
                                <div class="col-sm-6 col-md-6 ">
                                    <div class="m-4">
                                        <div class="d-flex">
                                            Laki-Laki
                                            <span class="d-inline-block ml-auto"><?php echo $siswa_laki ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-danger-500 " role="progressbar" style="width:<?php echo $p_siswa_laki ?>%;" aria-valuenow="<?php echo $p_siswa_laki ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            Perempuan
                                            <span class="d-inline-block ml-auto"><?php echo $siswa_perempuan ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-fusion-400 " role="progressbar" style="width:<?php echo $p_siswa_perempuan ?>%;" aria-valuenow="<?php echo $p_siswa_perempuan?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 ">
                                    <div class="m-4">
                                        <div class="d-flex">
                                            Aktif
                                            <span class="d-inline-block ml-auto"><?php echo $siswa_aktif ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-fusion-400 " role="progressbar" style="width:<?php echo $p_siswa_aktif ?>%;" aria-valuenow="<?php echo $p_siswa_aktif ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            Tidak Aktif
                                            <span class="d-inline-block ml-auto"><?php echo $siswa_tidak_aktif ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-danger-500 " role="progressbar" style="width:<?php echo $p_siswa_tidak_aktif ?>%;" aria-valuenow="<?php echo $p_siswa_tidak_aktif?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Jenis Kelamin Guru -->
                 <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h4 class="mb-0 fs-xl">
                                    <i class="fas fa-id-badge"></i>&nbsp;Guru
                                </h4>
                            </div>
                        </div>
                        <div class="col-12">
                            @php
                                $total_guru = count($guru);
                                $guru_aktif = count($guru->where('status_aktif', '=', 'Aktif'));
                                $guru_tidak_aktif = count($guru->where('status_aktif', '=', 'Tidak Aktif'));                        
                                $guru_laki  = count($guru->where('jenis_kelamin', '=', 'L')->where('status_aktif', '=', 'Aktif'));
                                $guru_perempuan = count($guru->where('jenis_kelamin', '=', 'P')->where('status_aktif', '=', 'Aktif'));
                                $p_guru_laki = ($guru_laki/$guru_aktif)*100;
                                $p_guru_perempuan = ($guru_perempuan/$guru_aktif)*100;
                                $p_guru_aktif = ($guru_aktif/$total_guru)*100;
                                $p_guru_tidak_aktif = ($guru_tidak_aktif/$total_guru)*100;
                            @endphp
                            <div class="row no-gutters row-grid"> 
                                <div class="col-sm-6 col-md-6 ">
                                    <div class="m-4">
                                        <div class="d-flex">
                                            Laki-Laki
                                            <span class="d-inline-block ml-auto"><?php echo $guru_laki ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-warning-500 " role="progressbar" style="width:<?php echo $p_guru_laki ?>%;" aria-valuenow="<?php echo $p_guru_laki ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            Perempuan
                                            <span class="d-inline-block ml-auto"><?php echo $guru_perempuan ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-fusion-400 " role="progressbar" style="width:<?php echo $p_guru_perempuan ?>%;" aria-valuenow="<?php echo $p_guru_perempuan?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 ">
                                    <div class="m-4">
                                        <div class="d-flex">
                                            Aktif
                                            <span class="d-inline-block ml-auto"><?php echo $guru_aktif ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-fusion-400 " role="progressbar" style="width:<?php echo $p_guru_aktif ?>%;" aria-valuenow="<?php echo $p_guru_aktif ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            Tidak Aktif
                                            <span class="d-inline-block ml-auto"><?php echo $guru_tidak_aktif ?></span>
                                        </div>
                                        <div class="progress progress-sm mb-3">
                                            <div class="progress-bar bg-warning-500 " role="progressbar" style="width:<?php echo $p_guru_tidak_aktif ?>%;" aria-valuenow="<?php echo $p_guru_tidak_aktif?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Kelas -->
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2 class="mb-0 fs-xl text-dark">
                            <i class="fas fa-building"></i>&nbsp;Kantor
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                                <div class="row no-gutters">
                                @foreach($instansi as $i)                       
                                    <div class="col-sm-6 col-md-6">

                                        @php 
                                            $jumlahguru = 0;
                                            $jumlahsiswa = 0; 
                                        @endphp

                                        @foreach($guru->where('kode_instansi', '=', $i->kode)->where('status_aktif', '=', 'Aktif') as $g)
                                            @php 
                                                $jumlahguru += 1; 
                                            @endphp
                                        @endforeach
                                        @foreach($siswa->where('kode_instansi', '=', $i->kode)->where('status_aktif', '=', 'Aktif') as $s)
                                            @php 
                                                $jumlahsiswa += 1; 
                                            @endphp
                                        @endforeach

                                        <!-- Card Narrower -->
                                        <div class="card card-cascade hover-highlight m-1 text-center">
                                            <h5 class="text-dark pb-2 pt-1 text-capitalize font-weight-bold mt-2">{{$i->nama}}</h5>
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-md-6">
                                                    <div class="text-center py-3">
                                                        <h6 class="mb-0 fw-700 text-dark">
                                                            Guru
                                                            <small class="text-muted mb-0 text-capitalize small">{{$jumlahguru}} Guru</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center py-3">
                                                        <h6 class="mb-0 fw-700 text-dark">
                                                            Siswa
                                                            <small class="text-muted mb-0 small">{{$jumlahsiswa}} Siswa</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <h6 class="mb-0 fw-700 text-dark">
                                                        <small class="text-muted mb-0 text-capitalize small"> <span class="fas fa-map-signs text-info"></span> &nbsp; {{$i->status_pusat}}</small>
                                                    </h6>
                                                </div>
                                            </div>                                  
                                        </div>
                                        <!-- Card Narrower -->
                                    </div>
                                @endforeach
                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </main>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/statistics/easypiechart/easypiechart.bundle.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.chart_masuk').easyPieChart({
                trackColor:'#505050',
                barColor:'#1dc9b7',
                scaleColor:'#505050',
                scaleLength:4,
                lineWidth:8,
            });

            $('.chart_tmasuk').easyPieChart({
                trackColor:'#505050',
                barColor:'#fd3995',
                scaleColor:'#505050',
                scaleLength:4,
                lineWidth:8,
            });

            $('.chart_ijin').easyPieChart({
                trackColor:'#505050',
                barColor:'#ffc241',
                scaleColor:'#505050',
                scaleLength:4,
                lineWidth:8,
            });
        });
    </script>




@endsection