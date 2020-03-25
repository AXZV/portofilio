@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('JS')
    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
    $(document).ready(function()
    {   
        $('#dt-basic-example').dataTable(
        {
            scrollY: 500,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
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
<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Pengajaran</li>
        <li class="breadcrumb-item">Daftar Pengajaran</li>
        <li class="breadcrumb-item active">Detail Data Pengajaran</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fas fa-microscope'></i> Pengajaran <span class='font-weight-light font-italic'>#{{$pengajaran->kode}}</span>
            </h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Guru
                        </h2>
                        <div class="panel-toolbar">
                            <a class="btn btn-primary" href="{{ URL::previous() }}">Kembali</a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Nomor Identitas</div>
                                        <div class="col font-weight-bold">Nama</div>
                                        <div class="col font-weight-bold">Instansi</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->guru->no_identitas}} </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->guru->nama_depan}} {{$pengajaran->guru_kelas->guru->nama_belakang}} </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->guru->instansi->nama}} </h3></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Nomor Telepon</div>
                                        <div class="col font-weight-bold">Alamat Email</div>
                                        <div class="col font-weight-bold">Status</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->guru->no_telp}} </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->guru->email}} </h3></div>
                                        <div class="col">
                                            <h3 class="display-5 font-weight-light"> 
                                                @if($pengajaran->guru_kelas->guru->status_aktif == 'Aktif')
                                                    <span class="badge badge-success">Aktif</span> 
                                                @else
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Kelas
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Kode Kelas</div>
                                        <div class="col font-weight-bold">Nama</div>
                                        <div class="col font-weight-bold">Pelajaran</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->kelas->kode}} </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->kelas->nama}} </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> {{$pengajaran->guru_kelas->kelas->pelajaran->nama}} </h3></div>
                                    </div>
                                </div>
                            </div>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Siswa
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="thead-dark">
                                <tr style="text-align:center; width:1px; white-space:nowrap;">
                                        <th>No</th>
                                        <th>Nomor Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Instansi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    @foreach($pengajaran->siswa as $s)
                                    <tr style="width:1px; white-space:nowrap;">
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> {{$s->no_daftar}} </td>
                                        <td> {{$s->nama_depan}} {{$s->nama_belakang}}</td>
                                        <td> {{$s->jenis_kelamin}}</td>
                                        <td> {{$s->alamat}}</td>
                                        <td> {{$s->instansi->nama}}</td>
                                        <td style="text-align:center"> 
                                            @if( $s->status_aktif == 'Aktif')
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Aktif</span>
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
            </div>
        </div>

    <script src="{{ asset('js/multiselect_edit.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($){
            $('#undo_redo1').multiselect1();
        });
    </script>

    <script src="{{ asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        jQuery(document).ready(function($){
            $('#tanggal_selesai1').datepicker(
            {
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                templates: controls
            });
        })
    </script>

    <script>          
        document.getElementById('status_selesai').addEventListener('change', function() {
            if(this.value == 'Selesai')
            {
                $("#tanggal_selesai").attr('required', '');
            }
            else
            {
                $("#tanggal_selesai").removeAttr('required');
            }
        });
    </script>

@endsection