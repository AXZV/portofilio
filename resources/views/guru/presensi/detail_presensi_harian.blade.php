@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection
@section('JS')
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

    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-check'></i> Presensi <span class='font-weight-light font-italic'>#{{$presensi[0]->id}}-{{$presensi[0]->pengajaran->guru_kelas->kelas->nama}}</span>
        </h1>
    </div>

    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Detail Presensi Kelas Tanggal @php echo date('d - F - yy', strtotime($presensi[0]->waktu)); @endphp
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
                        <th>Status Siswa</th>
                        <th>Presensi</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    @foreach($presensi[0]->pengajaran->siswa as $ps)
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> {{$ps->nama_depan}}</td>
                        <td style="text-align:center"> 
                            @if( $ps->status_aktif == 'Aktif')
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td style="text-align:center">
                            @foreach($presensi as $psx)
                                @if($psx->kehadiran_harian($ps->id)->first()->pivot->status == 'Masuk')
                                    <span class="badge badge-success">Masuk</span>
                                @elseif($psx->kehadiran_harian($ps->id)->first()->pivot->status == 'Ijin')
                                    <span class="badge badge-warning">Ijin</span>
                                @else
                                    <span class="badge badge-danger">Tidak Masuk</span>
                                @endif
                            @endforeach  
                        </td>
                        <td>
                            @foreach($presensi as $psx)
                                {{$psx->kehadiran_harian($ps->id)->first()->pivot->catatan}}
                            @endforeach  
                        </td>
                    </tr>  
                    @endforeach


                     
                    {{ logger('Test') }}
                </tbody>
            </table>
            <!-- conten end -->
        </div>
    </div>
    </div>
@endsection