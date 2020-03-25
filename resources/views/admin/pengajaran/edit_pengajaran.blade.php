@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@endsection
@section('JS')
<script src="{{ asset('js/theme.js') }}"></script>
@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Pengajaran</li>
        <li class="breadcrumb-item">Daftar Pengajaran</li>
        <li class="breadcrumb-item active">Rubah Data Pengajaran</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Rubah Data Pengajaran
                        </h2>
                        <div class="panel-toolbar">
                            <a class="btn btn-primary" href="{{ URL::previous() }}">Kembali</a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            @foreach($pengajaran as $p)
                            <form action="{{ url('admin/proses_edit_pengajaran') }}" id="editForm" method="POST">
                            {{ csrf_field() }}
                            <!--Body-->
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="{{$p->id}}" class="form-control">
                                    <div class="form-group">
                                        <label for="kode_guru_kelas">Guru Kelas</label>
                                        <select name="kode_guru_kelas" id="kode_guru_kelas2" class="form-control" required>
                                            <option value="" disabled selected>Pilih.....</option>                                       
                                            @foreach($guru_kelas as $ins)
                                                <option value="{{$ins->kode}}" {{$p->kode_guru_kelas == $ins->kode  ? 'selected' : ''}}>{{$ins->guru->nama_depan}} {{$ins->guru->nama_belakang}} - {{$ins->kelas->nama}}</option>                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput216">Status</label>
                                                <select name="status_selesai" id="status_selesai1" class="form-control" required>
                                                    <option value="" disabled selected>Pilih.....</option>
                                                    <option value="Selesai" {{$p->status_selesai == 'Selesai'  ? 'selected' : ''}}>Selesai</option>
                                                    <option value="Belum Selesai" {{$p->status_selesai == 'Belum Selesai'  ? 'selected' : ''}}>Belum Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="">Tanggal Selesai</label>
                                                <div class="input-group">
                                                    <input type="text" value="{{$p->tanggal_selesai}}" autocomplete="off" name="tanggal_selesai" class="form-control" id="tanggal_selesai1" placeholder="Tanggal Selesai">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text fs-xl">
                                                            <i class="fal fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="kode_siswa">Siswa</label>
                                    <div class="row">
                                    <div class="col">
                                        <select name="from1[]" id="undo_redo1" class="form-control" size="15" multiple="multiple">
                                            @foreach($siswa as $ins)
                                                <option value="{{$ins->id}}">{{$ins->no_daftar}} - {{$ins->nama_depan}} {{$ins->nama_belakang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <style>

                                    </style>
                                    <div class="col-md-2" >
                                        <button type="button" id="undo_redo1_undo1" class="btn btn-primary btn-block">undo</button>
                                        <button type="button" id="undo_redo1_rightAll1" class="btn btn-default btn-block"><i class="fas fa-angle-double-right"></i></button>
                                        <button type="button" id="undo_redo1_rightSelected1" class="btn btn-default btn-block"><i class="fas fa-angle-right"></i></button>
                                        <button type="button" id="undo_redo1_leftSelected1" class="btn btn-default btn-block"><i class="fas fa-angle-left"></i></button>
                                        <button type="button" id="undo_redo1_leftAll1" class="btn btn-default btn-block"><i class="fas fa-angle-double-left"></i></button>
                                        <button type="button" id="undo_redo1_redo1" class="btn btn-warning btn-block">redo</button>
                                    </div>
                                        
                                    <div class="col">
                                        <select name="kode_siswa1[]" id="undo_redo1_to1" class="form-control" size="15" multiple="multiple">
                                                @foreach($p->siswa as $insi)
                                                    <option value="{{$insi->id}}">{{$insi->no_daftar}} - {{$insi->nama_depan}} {{$insi->nama_belakang}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>  
                                <!--Footer-->
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                                    <a href="{{ url('admin/pengajaran') }}" type="button" class="btn btn-light btn-sm waves-effect">Batal</a>
                                </div>
                                
                            </form>
                            @endforeach
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