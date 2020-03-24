@section('CSS')

@endsection
@section('JS')

@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->
    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesedit" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-shield-check text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Input Data Presensi</span>  
            </div>
        </div>
    </div>
    @if (session()->has('successadd'))
        <script>
            $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
                $("#suksesedit").slideUp(900);
            });
        </script>
    @endif

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-check'></i> Presensi
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
                                        <h5 class="text-danger text-italic pb-2 pt-1 font-italic"><i class="fas fa-chalkboard-teacher"></i> #Kelas <?php echo $e++ ?></h5>
                                        <!-- Title -->
                                        <h4 class="font-weight-bold card-title">{{$gk->kelas->nama}}</h4>
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

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text fs-xl">
                                                        <i class="fas fa-book"></i>
                                                    </span>
                                                </div>
                                                <input disabled type="text" value="{{$gk->kelas->pelajaran->nama}}" name="1" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="text-center">
                                            <a href="presensi/log_presensi/{{$p->kode}}" class="btn btn-danger text-white">Presensi</a>
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

@endsection