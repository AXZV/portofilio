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

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item">Level Pengajaran</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item active">Detail Level Pengajaran Sesi</li>
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
            Tingkatan Pengajaran Siswa
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
                        <th>Tingakat</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    @foreach($pengajaran_level_siswa as $ps)
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> 
                            @for($i=0; $i<$ps->tingkat; $i++)
                                <span class="fa fa-star text-warning"></span>
                            @endfor
                        </td>
                        <td> {{$ps->catatan}} </td>
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
    <div class="modal fade bd-example-modal-lg" id="level" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Naikan Level Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="levelForm" method="POST">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body text-center">
                    <i class="fal fas fa-chart-line fa-6x mb-3"></i>
                    <p>Catatan untuk siswa </p>
                    <h2><span class="badge"></span></h2>

                <input required type="hidden" name="kode_pengajaran" id="kode_pengajaran" class="form-control">
                <input required type="hidden" name="kode_siswa" class="form-control" id="kode_siswa" >

                <div class="form-group">
                    <input required type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan">
                </div>   
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Naikan Level</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


    <script type="text/javascript">



        function level(kode_pengajaran, kode_siswa)
        {

            document.getElementById("kode_pengajaran").value = kode_pengajaran;
            document.getElementById("kode_siswa").value = kode_siswa;
            var id = id;
            var url = "/guru/level_pengajaran/proses_level_pengajaran";
            $("#levelForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#levelForm").submit();
        }

    </script>

@endsection