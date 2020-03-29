@section('CSS')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">

@endsection
@section('JS')
        <script src="{{ asset('js/theme.js') }}"></script>
@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <!-- this overlay is activated only when mobile menu is triggered -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
    
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Guru</a></li>
            <li class="breadcrumb-item active">Dasboard Guru</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="row">
            <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
                <div class="card mb-g rounded-top">
                    <div class="row no-gutters row-grid">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                <i class="fas fa-id-badge fa-5x text-primary"></i>
                                <h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: capitalize">
                                    {{$guru->nama_depan}} {{$guru->nama_belakang}}
                                    <small class="text-muted mb-0">{{$guru->alamat}}</small>
                                    <small class="text-dark font-weight-bold mb-0">~ Domisili ~</small>
                                    <small class="text-muted mb-0">{{$guru->alamat_domisili}}</small>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                    <span class="fa fa-venus-mars fa-2x"></span>
                                    <small class="text-muted mb-0">@if($guru->jenis_kelamin == 'P') Perempuan @else Laki-Laki @endif</small>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                <span class="fas fa-praying-hands fa-2x"></span>
                                    <small class="text-muted mb-0">{{$guru->agama}}</small>
                                </h5>
                            </div>
                        </div>
                        @if($guru->status_aktif == 'Aktif')
                        <div class="col-12 text-center text-white bg-success">
                        @else
                        <div class="col-12 text-center text-white bg-danger">
                        @endif
                            <div class="row m-2">
                                <div class="col-12 text-center">
                                    <a  class="btn-link font-weight-bold"> Status {{$guru->status_aktif}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Daftar sesi -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                <i class="fas fa-chalkboard-teacher"></i>&nbsp;Sesi
                                </h2>
                            </div>
                        </div>
                        @foreach($guru_kelas as $gk)
                            @foreach($pengajaran->where('kode_guru_kelas','=', $gk->kode) as $p)
                                <div class="col-4 text-center">
                                    <span class="profile-image rounded-circle d-block m-auto">
                                        <div class='icon-stack display-3 flex-shrink-0'>
                                            <i class="fas fa-chalkboard-teacher icon-stack-1x opacity-100 color-success-500"></i>
                                        </div>
                                    </span>
                                    <span class="d-block text-truncate text-muted fs-xs mt-1">{{$p->guru_kelas->kelas->pelajaran->nama}}</span>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
            <!-- Phone numb -->
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                    <div class='icon-stack display-3 flex-shrink-0'>
                                        <i class="fal fa-circle icon-stack-3x opacity-100 color-primary-400"></i>
                                        <i class="fa fa-phone icon-stack-1x opacity-100 color-primary-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <strong>
                                            Phone Number
                                        </strong>
                                        <br>
                                            {{$guru->no_telp}}
                                    </div>
                                </a>     
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                    <div class='icon-stack display-3 flex-shrink-0'>
                                        <i class="fal fa-circle icon-stack-3x opacity-100 color-warning-400"></i>
                                        <i class="far fa-envelope icon-stack-1x opacity-100 color-warning-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <strong>
                                            Email Address
                                        </strong>
                                        <br>
                                            {{$guru->email}}
                                    </div>
                                </a>
                            </div>
                        </div>  
                    </div>
                </div>
            <!-- Rekap Presensi -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                    <i class="fas fa-user-check"></i>&nbsp;Rekap Presensi
                                </h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row no-gutters row-grid">                       
                                <div class="col-3">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="mb-0 text-success">Masuk</small>
                                        </h8>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="text-danger mb-0">Tidak Masuk</small>
                                        </h8>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="text-warning mb-0">Ijin</small>
                                        </h8>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="text-info mb-0">Pertemuan</small>
                                        </h8>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($guru_kelas as $gk)
                            @foreach($pengajaran->where('kode_guru_kelas','=', $gk->kode) as $p)
                            <div class="col-12 hover-highlight">
                                <a href="guru/presensi/log_presensi/{{$p->kode}}" class="text-dark">
                                    <div class="p-3">
                                        <div class="fw-500 fs-xs">{{$gk->kelas->pelajaran->nama}}</div>
                                        <div class="row no-gutters row-grid">                       
                                            <div class="col-3">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($jumlah_presensi->where('id_pengajaran','=',$p->kode) as $jp)
                                                            @php
                                                                $total += $jp->masuk;
                                                            @endphp                                      
                                                        @endforeach
                                                        @if($total > 0)
                                                        <span class="badge badge-success">{{$total}}</span>
                                                        @else
                                                        -
                                                        @endif
                                                    </h8>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($jumlah_presensi->where('id_pengajaran','=',$p->kode) as $jp)
                                                            @php
                                                                $total += $jp->tidak_masuk;
                                                            @endphp                                      
                                                        @endforeach
                                                        @if($total > 0)
                                                        <span class="badge badge-danger">{{$total}}</span>
                                                        @else
                                                        -
                                                        @endif
                                                    </h8>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($jumlah_presensi->where('id_pengajaran','=',$p->kode) as $jp)
                                                            @php
                                                                $total += $jp->ijin;
                                                            @endphp                                      
                                                        @endforeach
                                                        @if($total > 0)
                                                        <span class="badge badge-warning">{{$total}}</span>
                                                        @else
                                                        -
                                                        @endif
                                                    </h8>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($presensi->where('kode_pengajaran','=',$p->kode) as $jp)
                                                            @php
                                                                $total += 1;
                                                            @endphp                                  
                                                        @endforeach
                                                        <span class="badge badge-info">{{$total}}</span>
                                                    </h8>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            <!-- rating -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                    <i class="fas fa-chart-line"></i>&nbsp;Level Siswa
                                </h2>
                            </div>
                        </div>
                        @foreach($guru_kelas as $gk)
                            @foreach($pengajaran->where('kode_guru_kelas','=', $gk->kode) as $p)                     
                                <div class="col-12 hover-highlight">
                                    <a href="siswa/level_pengajaran/log_level_pengajaran/{{$p->kode}}" class="text-dark">
                                        <div class="p-3">
                                            <div class="fw-500 fs-xs">{{$gk->kelas->pelajaran->nama}}</div>
                                            @forelse($pengajaran_level->where('kode_pengajaran', $p->kode) as $pl)

                                                @for($i=0; $i<$pl->tingkat; $i++)
                                                    <span class="fas fa-star text-warning"></span>
                                                @endfor

                                                @empty
                                                    <span class="fal fa-star text-warning"></span>
                                            @endforelse
                                        </div>
                                    </a>
                                </div>                          
                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection