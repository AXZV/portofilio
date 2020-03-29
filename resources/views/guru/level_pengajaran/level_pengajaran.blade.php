@section('CSS')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">
@endsection
@section('JS')
<script src="{{ asset('js/theme.js') }}"></script>
@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Guru</li>
        <li class="breadcrumb-item">Level Pengajaran</li>
        <li class="breadcrumb-item active">Daftar Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-chart-line'></i> Level Pengajaran
        </h1>
    </div>

        <!-- Team -->
        <section id="team" class="pb-5">
            <div class="container">
                <!-- <h5 class="section-title h1">Daftar Kelas</h5> -->
                <div class="row">
                    <!-- Team member -->
                    <?php $e=1 ?>
                    @foreach($guru_kelas as $gk)
                        @foreach($pengajaran->where('kode_guru_kelas','=',$gk->kode) as $p)
                            <div class="col-xs-8 col-sm-6 col-md-4"><!-- item -->
                                <!-- Card Narrower -->
                                <div class="card card-cascade mb-4">
                                <!-- Card image -->
                                        <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Label -->
                                        <h5 class="text-danger text-italic pb-2 pt-1 font-italic"><i class="fas fa-chalkboard-teacher"></i> #Sesi <?php echo $e++ ?></h5>
                                        <!-- Title -->
                                        <h4 class="font-weight-bold card-title">{{$gk->kelas->pelajaran->nama}}</h4>
                                        <!-- Text -->
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text fs-xl">
                                                        <i class="fas fa-user-graduate"></i>
                                                    </span>
                                                </div>
                                                <input disabled type="text" value="{{$p->siswa->count()}} Siswa" name="1" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="text-center">
                                            <a href="presensi/log_level_pengajaran/{{$p->kode}}" class="btn btn-danger text-white">Presensi</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Narrower -->

                            </div><!-- item -->
                        @endforeach
                    @endforeach
                    <!-- ./Team member -->
                </div>
            </div>
        </section>
        <!-- Team -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

@endsection