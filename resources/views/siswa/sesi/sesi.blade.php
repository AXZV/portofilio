@section('CSS')

@endsection
@section('JS')
<script src="{{ asset('js/theme.js') }}"></script>
@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item">Sesi</li>
        <li class="breadcrumb-item active">Daftar Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-check'></i> Sesi
        </h1>
    </div>
    <!-- Team -->

    <section id="team" class="pb-5">
    <div class="container">
    <div class="row">
        @foreach($pengajaran_siswa as $ps)
            @foreach($pengajaran->where('id','=', $ps->kode_pengajaran) as $p)
                <div class="col-xs-8 col-sm-6 col-md-4">
                    <!-- Card Narrower -->
                        <div class="card card-cascade mb-4 card-class-list">
                            <div class="card-body card-body-cascade">
                                <h5 class="text-danger text-italic pb-2 pt-1 font-italic nama-kelas"><i class="fas fa-chalkboard-teacher"></i> #Sesi {{$p->guru_kelas->kelas->pelajaran->nama}}</h5>
                                <div class="text-center mb-4">
                                    <span class="fas fa-chalkboard-teacher fa-4x text-danger icon-kelas"> </span>
                                </div>
                                <div class="row no-gutters row-grid">
                                    <div class="col-6">
                                        <div class="text-center py-3">
                                            <h5 class="mb-0 fw-700">
                                                Guru
                                                <small class="text-muted mb-0">{{$p->guru_kelas->guru->nama_depan}}</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center py-3">
                                            <h5 class="mb-0 fw-700">
                                                Siswa
                                                <small class="text-muted mb-0">{{$p->siswa->count()}} Orang</small>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Card Narrower -->
                </div>
            @endforeach
        @endforeach
    </div>
    </div>
    </section>
    <!-- Team -->
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
@endsection