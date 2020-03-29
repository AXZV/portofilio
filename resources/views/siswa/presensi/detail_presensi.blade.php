@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection
@section('JS')
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
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
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item">Rekap Presensi</li>
        <li class="breadcrumb-item active">Rekap Presensi Siswa</li>
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
            Detail Presensi
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-primary" href="{{ URL::previous() }}">Kembali</a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>M</th>
                        <th>TM</th>
                        <th>I</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    @foreach($pengajaran->siswa as $ps)
                    
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> {{$ps->nama_depan}} {{$ps->nama_belakang}}</td>
                        <td style="text-align:center"> 
                            @if( $ps->status_aktif == 'Aktif')
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                        @foreach($jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode) as $jp)                           
                            @if($jp->masuk > 0)
                                <span class="badge badge-success">{{$jp->masuk}}</span>
                            @else
                                -
                            @endif
                        @endforeach  
                        </td>
                        <td class="text-center">
                        @foreach($jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode) as $jp)
                            @if($jp->tidak_masuk > 0)
                                <span class="badge badge-danger">{{$jp->tidak_masuk}}</span>
                            @else
                                -
                            @endif
                        @endforeach
                        </td>
                        <td class="text-center">
                        @foreach($jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode) as $jp)
                            @if($jp->ijin > 0)
                                <span class="badge badge-warning">{{$jp->ijin}}</span>
                            @else
                                -
                            @endif
                        @endforeach
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