@section('CSS')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">

@endsection
@section('JS')
        <script src="{{ asset('js/theme.js') }}"></script>
@endsection

@extends('layouts.master_3')

@section('Content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->
    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="successedituser" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-edit text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Update Akun Pengguna</span>  
            </div>
        </div>
    </div>

    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="successedit" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-shield-check text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Update Data Pengguna</span>  
            </div>
        </div>
    </div>


    @if (session()->has('successedituser'))
    <script>
        $("#successedituser").fadeTo(5000, 900).slideUp(900, function(){
            $("#successedituser").slideUp(900);
        });
    </script>
    @endif
    @if (session()->has('successedit'))
    <script>
        $("#successedit").fadeTo(5000, 900).slideUp(900, function(){
            $("#successedit").slideUp(900);
        });
    </script>
    @endif

<!-- /////////////////////////////// Error Code /////////////////////////////// -->
    @if ($errors->any())
        @if ($errors->has('username') | $errors->has('password'))
        <script>
            $(document).ready(function(){
                $('#edituser').modal({show: true});
            });
        </script>
        @endif
        @if ($errors->has('kode2'))
            <!-- ////ERROREDIT -->
        @endif
    @endif
    @if (session()->has('passwordnotmatch1'))
        <script>
            $(document).ready(function(){
                $('#edituser').modal({show: true});
            });
        </script>
    @endif
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <div class="row"> 
        <div class="col-lg">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div>
                    <a class="float-right m-2 text-success" href="#" data-toggle="modal" 
                            onclick="editData( 
                                '{{$guru->id}}',
                                '{{$guru->no_identitas}}',
                                '{{$guru->nama_depan}}', 
                                '{{$guru->nama_belakang}}',
                                '{{$guru->tanggal_lahir}}',
                                '{{$guru->tempat_lahir}}',
                                '{{$guru->jenis_kelamin}}',
                                '{{$guru->agama}}',
                                '{{$guru->alamat}}',
                                '{{$guru->alamat_domisili}}',
                                '{{$guru->no_telp}}',
                                '{{$guru->email}}',)"
                            data-target="#editdata"><span class="fas fa-user-cog fa-lg"></span></a>
                    <a class="float-right m-2 text-danger" data-toggle="modal" onclick="edituser( '{{$pengguna->id}}', '{{$pengguna->username}}')" data-target="#edituser"><span class="fas fa-user-lock fa-lg"></span></a>
                </div> 
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <i class="fa fa-chalkboard-teacher fa-7x text-primary"></i>
                            <h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: uppercase;">
                                {{$guru->nama_depan}} {{$guru->nama_belakang}}
                                <small class="text-muted mb-0" style="text-transform: capitalize">{{$guru->tempat_lahir}}, @php echo date('d F Y', strtotime($guru->tanggal_lahir)); @endphp</small>
                                <small class="text-muted mb-0" style="text-transform: capitalize"><span class="fa fa-phone"></span>&nbsp; {{$guru->no_telp}} &nbsp; &nbsp;<span class="far fa-envelope"></span>&nbsp; {{$guru->email}} </small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="m-2 fw-700">
                                Alamat
                                <small class="text-muted mb-0">{{$guru->alamat}}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="m-2 fw-700">
                                Domisili
                                <small class="text-muted mb-0">{{$guru->alamat_domisili}}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">@if($guru->jenis_kelamin == 'P') Perempuan @else Laki-Laki @endif </a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">{{$guru->agama}}</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Status {{$guru->status_aktif}}</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        
    </div>
<!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->


<!-- /////////////////////////////// Modal Edit Data akun /////////////////////////////// -->
   <div class="modal fade bd-example-modal-lg" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Akun Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="edituserForm" method="POST">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="form0x" class="form-control">

                    <div class="form-group">
                        <label for="nama1">Username</label>
                        <input required type="text" value="{{ old('username') }}" name="username" class="form-control" id="username" placeholder="Username">
                        <small id="usernameHelp" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                        @if ($errors->has('username'))
                            <div class="invalid-feedback d-block"> 
                                Username sudah terdaftar atau tidak sesuai aturan
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password1">Masukan Password Akun ini</label>
                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                        @if (session()->has('passwordnotmatch1'))
                            <div class="invalid-feedback d-block"> 
                                Kata sandi salah atau kosong
                            </div>
                        @endif
                    </div>
                    <div class="text-center">
                    <small id="passwordHelp" class="form-text text-muted" style="font-size:12px;">"Jika tidak ingin merubah kata sandi silahkan abaikan form dibawah ini"</small>
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
                    <button type="submit" id="submitx" name="submitx" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>
    

    <script type="text/javascript">
        function edituser(id, username)
        {
            document.getElementById("form0x").value = id;
            document.getElementById("username").value = username;
            var id = id;
            var url = "/guru/edit_user/"+id;
            $("#edituserForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#edituserForm").submit();
        }
    </script>

    <script>
        $('document').ready(function(){
            $('#password_confirmation').on('keyup', function () {
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

<!-- /////////////////////////////// Modal Edit Data pengguna /////////////////////////////// -->

    <div class="modal fade bd-example-modal-lg" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editForm" method="POST">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="f0" class="form-control">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Nama Depan</label>
                                <input required type="text" name="nama_depan" class="form-control" id="f2" placeholder="Nama Depan">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Nama Belakang</label>
                                <input type="text" name="nama_belakang" class="form-control" id="f3" placeholder="Nama Belakang">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Tempat Lahir</label>
                                <input required type="text" name="tempat_lahir" class="form-control" id="f4" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input required  type="text" autocomplete="off" name="tanggal_lahir" class="form-control" id="tanggal_lahir2" placeholder="tanggal_lahir">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="f6" class="form-control" required>
                                    <option value="" disabled selected>Pilih.....</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Agama</label>
                                <input required type="text" name="agama" class="form-control" id="f7" placeholder="Agama">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Alamat</label>
                                <input required type="text" name="alamat" class="form-control" id="f8" placeholder="Alamat">
                                <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Alamat Domisili</label>
                                <input required type="text" name="alamat_domisili" class="form-control" id="f9" placeholder="Alamat Domisili">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Telepon</label>
                                <input required type="text" name="no_telp" class="form-control" id="f10" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Email</label>
                                <input required type="text" name="email" class="form-control" id="f11" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


        <script type="text/javascript">
            function editData(id, no_identitas, nama_depan, nama_belakang, tanggal_lahir, tempat_lahir, jenis_kelamin, agama, alamat, alamat_domisili, no_telp, email)
            {   document.getElementById("f0").value = id;
                document.getElementById("f2").value = nama_depan;
                document.getElementById("f3").value = nama_belakang;
                document.getElementById("f4").value = tempat_lahir;
                document.getElementById("tanggal_lahir2").value = tanggal_lahir;
                document.getElementById("f6").value = jenis_kelamin;
                document.getElementById("f7").value = agama;
                document.getElementById("f8").value = alamat;
                document.getElementById("f9").value = alamat_domisili;
                document.getElementById("f10").value = no_telp;
                document.getElementById("f11").value = email;


                var id = id;
                var url = "/guru/edit_data_guru/"+id;
                $("#editForm").attr('action', url);
            }
            
        </script>
        <script src="{{ asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
            var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
            jQuery(document).ready(function($){
                // enable clear button 
                $('#tanggal_lahir2').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
            })
        </script>


@endsection