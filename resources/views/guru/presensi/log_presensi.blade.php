@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection
@section('JS')
    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
    $(document).ready(function()
    {   
        $('#dt-basic-example').dataTable(
        {
            // scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            paging: false,
            // fixedColumns:
            // {
            //     leftColumns: 3,
            //     rightColumns:1
            // },
               
        });
    });
    </script>
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
                <span class="h5">Sukses Input Presensi</span>  
            </div>
        </div>
    </div>
    @if (session()->has('successpresensi'))
        <script>
            $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
                $("#suksesedit").slideUp(900);
            });
        </script>
    @endif

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Guru</li>
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item active">Rekap Presensi Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-flask'></i> Sesi <span class='font-weight-light font-italic'>#{{$pengajaran->guru_kelas->kelas->nama}}</span>
        </h1>
    </div>

    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Daftar Presensi
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-warning m-2" href="/guru/presensi/detail_presensi/{{$pengajaran->kode}}"><span style="color:white;">Rekap Presensi</span></a>
            <a class="btn btn-success" href="/guru/presensi/tambah_presensi/{{$pengajaran->id}}"><span style="color:white;">Tambah Presensi</span></a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembahasan</th>
                        <th>Jumlah Bahasan</th>
                        <th>M</th>
                        <th>TM</th>
                        <th>I</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    @foreach($presensi as $ps)
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> <a href="/guru/presensi/detail_presensi_harian/{{$ps->id}}">@php echo date('d F Y', strtotime($ps->waktu)); @endphp</a></td>
                        <td> {{$ps->pembahasan}}</td>
                        <td class="text-center"> {{$ps->jumlah_bahasan}}</td>                        
                        <td class="text-center"> 
                            @if($ps->kehadiran('Masuk')->count() > 0)
                                <span class="badge badge-success">{{$ps->kehadiran('Masuk')->count()}}</span>
                            @else
                                -
                            @endif      
                        </td>
                        <td class="text-center"> 
                            @if($ps->kehadiran('Tidak Masuk')->count() > 0)
                                <span class="badge badge-danger">{{$ps->kehadiran('Tidak Masuk')->count()}}</span>
                            @else
                                -
                            @endif      
                        </td>
                        <td class="text-center"> 
                            @if($ps->kehadiran('Ijin')->count() > 0)
                                <span class="badge badge-warning">{{$ps->kehadiran('Ijin')->count()}}</span>
                            @else
                                -
                            @endif      
                        </td>  
                    </tr>  
                    @endforeach                                           
                </tbody>
            </table>
            <!-- conten end -->
        </div>
    </div>
    </div>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
@endsection