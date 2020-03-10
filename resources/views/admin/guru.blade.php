@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('JS')

    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/formplugins/select2/select2.bundle.js') }}"></script>

    <script>
        /* demo scripts for change table color */
        /* change background */


        $(document).ready(function()
        {   
            $('.select2').select2();

            $('#dt-basic-example').dataTable(
            {
                responsive: true,
                fixedHeader: true,
            });

            $('.js-thead-colors a').on('click', function()
            {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function()
            {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

            $("#js-btn-form").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-form")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
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
            <i class="fal fa-edit text-warning"></i>
        </div>
        <div class="flex-1">
            <span class="h5">Sukses Update Data</span>  
        </div>
    </div>
    </div>

    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesadd" role="alert">
    <div class="d-flex align-items-center">
        <div class="alert-icon">
            <i class="fal fa-shield-check text-warning"></i>
        </div>
        <div class="flex-1">
            <span class="h5">Sukses Tambah Data</span>  
        </div>
    </div>
    </div>

    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesdel" role="alert">
    <div class="d-flex align-items-center">
        <div class="alert-icon">
            <i class="fal fa-trash text-warning"></i>
        </div>
        <div class="flex-1">
            <span class="h5">Sukses Hapus data</span>  
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
    @if (session()->has('successadd'))
    <script>
        $("#suksesadd").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesadd").slideUp(900);
        });
    </script>
    @endif
    @if (session()->has('successdelete'))
    <script>
        $("#suksesdel").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesdel").slideUp(900);
        });
    </script>
    @endif
<!-- /////////////////////////////// Error Code /////////////////////////////// --> 
    @if ($errors->any())
        @if ($errors->addguru)
        <script>
            $(document).ready(function(){
                $('#adddata').modal({show: true});
            });
        </script>
        @endif
        @if ($errors->edit)
            
        @endif
    @endif
<!-- ///////////////////////////////////////////////////////////////////////// -->

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Guru
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                    <div class="row" style="margin-top:10px;">
                        <div class="col text-center">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#adddata"><span style="color:white;">Add Data</span></a>
                        </div>
                    </div>

                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>Nomor Identitas</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status</th>
                                        <th>Instansi</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Domisili</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    @foreach($guru as $i)
                                    <tr>
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> {{$i->no_identitas}}</td>
                                        <td> {{$i->nama_depan}}<span> <span>{{$i->nama_belakang}}</td>
                                        <td> {{$i->status_aktif}}</td>
                                        <td> {{$i->instansi->nama}}</td>
                                        <td> {{$i->tanggal_lahir}}</td>
                                        <td> {{$i->tempat_lahir}}</td>
                                        <td> {{$i->jenis_kelamin}}</td>
                                        <td> {{$i->agama}}</td>
                                        <td> {{$i->alamat}}</td>
                                        <td> {{$i->alamat_domisili}}</td>
                                        <td> {{$i->no_telp}}</td>
                                        <td> {{$i->email}}</td>
                                        <td> {{$i->tanggal_masuk}}</td>
                                        <td> {{$i->tanggal_keluar}}</td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData({{$i->id}})" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <a href="#" data-toggle="modal" 
                                            onclick="editData( 
                                                '{{$i->id}}',
                                                '{{$i->no_identitas}}',
                                                '{{$i->nama_depan}}', 
                                                '{{$i->nama_belakang}}',
                                                '{{$i->tanggal_lahir}}',
                                                '{{$i->tempat_lahir}}',
                                                '{{$i->jenis_kelamin}}',
                                                '{{$i->agama}}',
                                                '{{$i->alamat}}',
                                                '{{$i->alamat_domisili}}',
                                                '{{$i->no_telp}}',
                                                '{{$i->email}}',
                                                '{{$i->tanggal_masuk}}',
                                                '{{$i->tanggal_keluar}}',
                                                '{{$i->status_aktif}}',
                                                '{{$i->instansi->kode}}',)"
                                            data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>Nomor Identitas</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status</th>
                                        <th>Instansi</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Domisili</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- /////////////////////////////// Modal Tambah Data /////////////////////////////// -->
        <div class="modal fade bd-example-modal-lg" id="adddata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_guru" method="POST">
                {{ csrf_field() }}
                <!--Body-->
                
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput1">Nomor Identitas</label>
                            <input required value="{{ old('no_identitas') }}" type="text" name="no_identitas" class="form-control" id="formGroupExampleInput1" placeholder="Nomor Identitas">
                            @if ($errors->has('no_identitas'))
                                <div class="invalid-feedback d-block"> 
                                    Nomor Identitas Sudah Terdaftar
                                </div>
                            @endif
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nama Depan</label>
                                    <input required value="{{ old('nama_depan') }}" type="text" name="nama_depan" class="form-control" id="formGroupExampleInput2" placeholder="Nama Depan">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput23">Nama Belakang</label>
                                    <input value="{{ old('nama_belakang') }}" type="text" name="nama_belakang" class="form-control" id="formGroupExampleInput23" placeholder="Nama Belakang">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput24">Tempat Lahir</label>
                                    <input required value="{{ old('tempat_lahir') }}" type="text" name="tempat_lahir" class="form-control" id="formGroupExampleInput24" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput25">Tanggal Lahir</label>
                                    <input required value="{{ old('tanggal_lahir') }}" type="date" name="tanggal_lahir" class="form-control" id="formGroupExampleInput25" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput26">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="inputState" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput27">Agama</label>
                                    <input value="{{ old('agama') }}" required type="text" name="agama" class="form-control" id="formGroupExampleInput27" placeholder="Agama">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput28">Alamat</label>
                                    <input value="{{ old('alamat') }}" required type="text" name="alamat" class="form-control" id="formGroupExampleInput28" placeholder="Alamat">
                                    <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput29">Alamat Domisili</label>
                                    <input required value="{{ old('alamat_domisili') }}" type="text" name="alamat_domisili" class="form-control" id="formGroupExampleInput29" placeholder="Alamat Domisili">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput211">Telepon</label>
                                    <input required value="{{ old('no_telp') }}" type="text" name="no_telp" class="form-control" id="formGroupExampleInput212" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput213">Email</label>
                                    <input required value="{{ old('email') }}" type="text" name="email" class="form-control" id="formGroupExampleInput214" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput216">Status</label>
                                    <select name="status_aktif" id="status_aktif1" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Aktif" {{ old('status_aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ old('status_aktif') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput215">Tanggal Masuk</label>
                                    <input required value="{{ old('tanggal_masuk') }}" type="date" name="tanggal_masuk" class="form-control" id="formGroupExampleInput215" placeholder="Tanggal Masuk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput216">Tanggal Keluar</label>
                                    <input value="{{ old('tanggal_keluar') }}" type="date" name="tanggal_keluar" class="form-control" id="formGroupExampleInput216" placeholder="Tanggal Keluar">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput218">Instansi</label>
                                    <select name="kode_instansi" id="kode_instansi" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>                                       
                                        @foreach($instansi as $ins)
                                        <option value="{{$ins->kode}}" {{ (old("kode_instansi") == $ins->kode ? "selected":"") }}>{{$ins->kode}} - {{$ins->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput219">Nama Pengguna</label>
                                    <input required value="{{ old('username') }}" type="text" name="username" class="form-control" id="formGroupExampleInput219" placeholder="Username">
                                    <small id="usernameHelp" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                                    @if ($errors->has('username'))
                                        <div class="invalid-feedback d-block"> 
                                            Username sudah terdaftar atau tidak sesuai aturan
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput221">Password</label>
                                    <input required value="{{ old('password') }}" type="password" id="password" name="password" class="form-control" id="formGroupExampleInput221" placeholder="Password">
                                    <small id="passwordHelp" class="form-text text-muted">Minimal 8 karakter tanpa spasi</small>
                                    <input type="checkbox" onclick="showpass()">Tampilkan Password
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback d-block"> 
                                            Password tidak sesuai aturan
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" value="Simpan Data">Simpan</button>
                    </div>
                    
                </form>

            </div>
        </div>
        </div>

        <script>
            function showpass() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

<!-- /////////////////////////////// Modal Hapus Data /////////////////////////////// -->

   <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <form action="" id="deleteForm" method="post">
    {{ csrf_field() }}
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
        <p class="heading lead">Konfirmasi hapus data </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
        </div>

        <!--Body-->
        <div class="modal-body">
        <div class="text-center">
        <!-- <i class="fas fa-trash-alt"></i> -->
            <i class="fal fa-trash fa-6x mb-3"></i>
            <p>Apakah anda yakin akan menghapus data</p>
            <h2><span class="badge"></span></h2>
        </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
        </div>

    </div>
    </form>
    <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Danger-->


    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = "/admin/hapus_guru/"+id;
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>


<!-- /////////////////////////////// Modal Edit Data /////////////////////////////// -->

    <div class="modal fade bd-example-modal-lg" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editForm" method="POST">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="f0" class="form-control">

                    <!-- <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Identitas</label>
                        <input required type="text" name="no_identitas" class="form-control" id="f1" placeholder="Nomor Identitas">
                    </div> -->
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
                                <label for="formGroupExampleInput2">Tanggal Lahir</label>
                                <input required type="date" name="tanggal_lahir" class="form-control" id="f5" placeholder="Tanggal Lahir">
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

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Status</label>
                                <select name="status_aktif" id="f14" class="form-control" required>
                                    <option value="" disabled>Pilih.....</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Tanggal Masuk</label>
                                <input required type="date" name="tanggal_masuk" class="form-control" id="f12" placeholder="Tanggal Masuk">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" class="form-control" id="f13" placeholder="Tanggal Keluar">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Instansi</label>
                                <select name="kode_instansi" id="f15" class="form-control" required>                                    
                                    @foreach($instansi as $ins)
                                    <option value="{{$ins->kode}}">{{$ins->kode}} - {{$ins->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


        <script type="text/javascript">
            function editData(id, no_identitas, nama_depan, nama_belakang, tanggal_lahir, tempat_lahir, jenis_kelamin, agama, alamat, alamat_domisili, no_telp, email, tanggal_masuk, tanggal_keluar, status_aktif, kode_instansi)
            {   document.getElementById("f0").value = id;
                // document.getElementById("f1").value = no_identitas;
                document.getElementById("f2").value = nama_depan;
                document.getElementById("f3").value = nama_belakang;
                document.getElementById("f4").value = tempat_lahir;
                document.getElementById("f5").value = tanggal_lahir;
                document.getElementById("f6").value = jenis_kelamin;
                document.getElementById("f7").value = agama;
                document.getElementById("f8").value = alamat;
                document.getElementById("f9").value = alamat_domisili;
                document.getElementById("f10").value = no_telp;
                document.getElementById("f11").value = email;
                document.getElementById("f12").value = tanggal_masuk;
                document.getElementById("f13").value = tanggal_keluar;
                document.getElementById("f14").value = status_aktif;
                document.getElementById("f15").value = kode_instansi;


                var id = id;
                var url = "/admin/edit_guru/"+id;
                $("#editForm").attr('action', url);
            }

            function formSubmit2()
            {
                $("#editForm").submit();
            }


            function showpass2() {
                var x = document.getElementById("f17");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }


        </script>




@endsection