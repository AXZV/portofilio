@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
@endsection
@section('JS')

    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>


@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->
    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesedit" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-edit text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Update Data</span>  
            </div>
        </div>
    </div>


    @if (session()->has('successedit'))
    <script>
        $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesedit").slideUp(900);
        });
    </script>
    @endif

<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item active">Siswa Setting</li>
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
                            Account Setting
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                        @foreach($pengaturan as $ac)
                            <form action="{{ url('/siswa/edit_pengaturan/') }}" id="editForm" method="POST">
                                {{ csrf_field() }}
                                <!--Body-->
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$ac->id}}" name="id" id="id" class="form-control">
                    
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input required type="text" value="{{$ac->username}}" name="username" class="form-control" id="username" placeholder="Username">
                                            <small id="usernameHelp" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                                            @if ($errors->has('username'))
                                                <div class="invalid-feedback d-block"> 
                                                    Username sudah terdaftar atau tidak sesuai aturan
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password1">Masukan Password Akun ini</label>
                                            <input required type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                                            @if (session()->has('passwordnotmatch'))
                                                <div class="invalid-feedback d-block"> 
                                                    Password Salah !
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                            <small id="passwordHelp" class="form-text text-muted">Minimal 8 karakter tanpa spasi</small>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback d-block"> 
                                                    Password tidak sesuai aturan
                                                </div>
                                            @endif
                                        </div> 
                                        <div class="form-group">
                                            <label for="password_confirmation ">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                                            <small id='message'></small>
                                        </div>   
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" id="submitx" name="submit" class="btn btn-primary btn-sm" >Simpan</button>
                                        <a type="button" href="/dasboard_admin" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</a>
                                    </div>
                                    
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <script>
        $('document').ready(function(){
            $('#password, #password_confirmation').on('keyup', function () {
            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').html('Password Cocok').css('color', 'green');
                document.getElementById("submitx").disabled = false; 
            } else 
            {
                $('#message').html('Password Tidak Cocok').css('color', 'red');
                document.getElementById("submitx").disabled = true; 
            }
            });
        });
    </script>

    

@endsection