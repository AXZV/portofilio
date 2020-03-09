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
    <div class="alert alert-success" style="display:none;" id="suksesedit" role="alert">
    Sukses Update Data
    </div>
    <div class="alert alert-success" style="display:none;" id="suksesadd" role="alert">
    Sukses Tambah data
    </div>
    <div class="alert alert-success" style="display:none;" id="suksesdel" role="alert">
    Sukses Hapus data
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
        @if ($errors->has('no_identitas') || $errors->has('username') || $errors->has('password'))
        <script>
            $(document).ready(function(){
                $('#adddata').modal({show: true});
            });
        </script>
        @endif
        @if ($errors->has('kode2'))
            <!-- ////ERROREDIT -->
        @endif
    @endif

<!-- ///////////////////////////////////////////////////////////////////////// -->

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Siswa
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
                                <thead class="thead-dark">
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>Nomor Daftar</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Status Siswa</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Lulus</th>
                                        <th>Status Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    @foreach($siswa as $i)
                                    <tr>
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> {{$i->no_daftar}}</td>
                                        <td> {{$i->nama_depan}}<span> <span>{{$i->nama_belakang}}</td>
                                        <td> {{$i->tanggal_lahir}}</td>
                                        <td> {{$i->tempat_lahir}}</td>
                                        <td> {{$i->jenis_kelamin}}</td>
                                        <td> {{$i->agama}}</td>
                                        <td> {{$i->alamat}}</td>
                                        <td> {{$i->no_telp}}</td>
                                        <td> {{$i->email}}</td>
                                        <td> {{$i->status_aktif}}</td>
                                        <td> {{$i->tanggal_masuk}}</td>
                                        <td> {{$i->tanggal_lulus}}</td>
                                        <td> {{$i->status_bayar}}</td>
                                        <td> {{$i->jumlah_bayar}}</td>
                                        <td> {{$i->tanggal_bayar}}</td>
                                        <td> {{$i->instansi->nama}}</td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData({{$i->id}})" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <a href="#" data-toggle="modal" 
                                            onclick="editData( 
                                                '{{$i->id}}',
                                                '{{$i->no_daftar}}',
                                                '{{$i->nama_depan}}', 
                                                '{{$i->nama_belakang}}',
                                                '{{$i->tanggal_lahir}}',
                                                '{{$i->tempat_lahir}}',
                                                '{{$i->jenis_kelamin}}',
                                                '{{$i->agama}}',
                                                '{{$i->alamat}}',
                                                '{{$i->no_telp}}',
                                                '{{$i->email}}',
                                                '{{$i->tanggal_masuk}}',
                                                '{{$i->tanggal_lulus}}',
                                                '{{$i->status_aktif}}',
                                                '{{$i->status_bayar}}',
                                                '{{$i->jumlah_bayar}}',
                                                '{{$i->tanggal_bayar}}',
                                                '{{$i->instansi->kode}}',)"
                                            data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-dark">
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>Nomor Daftar</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Status Siswa</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Lulus</th>
                                        <th>Status Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Instansi</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_siswa" method="POST">
                {{ csrf_field() }}
                <!--Body-->
                
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_daftar">Nomor Daftar</label>
                            <input required type="text" value="{{ old('no_daftar') }}" name="no_daftar" class="form-control" id="no_daftar" placeholder="Nomor Identitas">
                            @if ($errors->has('no_daftar'))
                                <div class="invalid-feedback d-block"> 
                                    Nomor Pendaftaran Sudah Terdaftar
                                </div>
                            @endif
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input required value="{{ old('nama_depan') }}" type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" value="{{ old('nama_belakang') }}" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Nama Belakang">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input required value="{{ old('tempat_lahir') }}" type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input required value="{{ old('tanggal_lahir') }}" type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input required value="{{ old('agama') }}" type="text" name="agama" class="form-control" id="agama" placeholder="Agama">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input required value="{{ old('alamat') }}" type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                                    <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="no_telp">Telepon</label>
                                    <input required value="{{ old('no_telp') }}" type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required value="{{ old('email') }}" type="text" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status_aktif">Status</label>
                                    <select name="status_aktif" id="status_aktif" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Aktif" {{ old('status_aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ old('status_aktif') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input required value="{{ old('tanggal_masuk') }}" type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Tanggal Masuk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_lulus">Tanggal Lulus</label>
                                    <input value="{{ old('tanggal_lulus') }}" type="date" name="tanggal_lulus" class="form-control" id="tanggal_lulus" placeholder="Tanggal Keluar">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="kode_instansi">Instansi</label>
                                    <select name="kode_instansi" id="kode_instansi" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>                                       
                                        @foreach($instansi as $ins)
                                        <option value="{{$ins->kode}}" {{ (old("kode_instansi") == $ins->kode ? "selected":"") }} >{{$ins->kode}} - {{$ins->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status_bayar">Status Bayar</label>
                                    <select name="status_bayar" id="status_bayar" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Bayar" {{ old('status_bayar') == 'Bayar' ? 'selected' : '' }}>Lunas</option>
                                        <option value="Belum Bayar" {{ old('status_bayar') == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah_bayar">Jumlah Bayar</label>
                                    <div class="input-group" >
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                    <input value="{{ old('jumlah_bayar') }}" type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Jumlah Bayar">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_bayar">Tanggal Bayar</label>
                                    <input value="{{ old('tanggal_bayar') }}" type="datetime-local" name="tanggal_bayar" class="form-control" id="tanggal_bayar" placeholder="Tanggal Bayar">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="username">Nama Pengguna</label>
                                    <input required value="{{ old('username') }}" type="text" name="username" class="form-control" id="username" placeholder="Username">
                                    <small id="username" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                                    @if ($errors->has('username'))
                                        <div class="invalid-feedback d-block"> 
                                            Username sudah terdaftar atau tidak sesuai aturan
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input required value="{{ old('password') }}" type="password" id="password" name="password" class="form-control" placeholder="Password">
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
            var url = "/admin/hapus_siswa/"+id;
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
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editForm" method="POST">
            {{ csrf_field() }}
            <!--Body-->
                <input type="hidden" name="id" id="form0x" class="form-control">
                <div class="modal-body">
                <!-- <div class="form-group">
                    <label for="no_daftar">Nomor Daftar</label>
                    <input required type="text" name="no_daftar" class="form-control" id="no_daftar1" placeholder="Nomor Identitas">
                </div> -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input required type="text" name="nama_depan" class="form-control" id="nama_depan1" placeholder="Nama Depan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang1" placeholder="Nama Belakang">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir1" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir1" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input required type="text" name="agama" class="form-control" id="agama1" placeholder="Agama">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input required type="text" name="alamat" class="form-control" id="alamat1" placeholder="Alamat">
                            <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="no_telp">Telepon</label>
                            <input required type="text" name="no_telp" class="form-control" id="no_telp1" placeholder="Telepon">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="text" name="email" class="form-control" id="email1" placeholder="Email">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="status_aktif">Status</label>
                            <select name="status_aktif" id="status_aktif1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input required type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk1" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_lulus">Tanggal Lulus</label>
                            <input type="date" name="tanggal_lulus" class="form-control" id="tanggal_lulus1" placeholder="Tanggal Keluar">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="kode_instansi">Instansi</label>
                            <select name="kode_instansi" id="kode_instansi1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>                                       
                                @foreach($instansi as $ins)
                                <option value="{{$ins->kode}}">{{$ins->kode}} - {{$ins->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="status_bayar">Status Bayar</label>
                            <select name="status_bayar" id="status_bayar1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Bayar">Lunas</option>
                                <option value="Belum Bayar">Belum Bayar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <div class="input-group" >
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                            <input type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar1" placeholder="Jumlah Bayar">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_bayar">Tanggal Bayar</label>
                            <input type="datetime" name="tanggal_bayar" class="form-control" id="tanggal_bayar1" placeholder="Tanggal Bayar">
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
            function editData(id, no_identitas, nama_depan, nama_belakang, tanggal_lahir, tempat_lahir, jenis_kelamin, agama, alamat, no_telp, email, tanggal_masuk, tanggal_lulus, status_aktif, status_bayar, jumlah_bayar, tanggal_bayar, kode_instansi)
            {   
                console.log("rrrr", tanggal_bayar);
                document.getElementById("form0x").value = id;
                // document.getElementById("no_daftar1").value = no_identitas;
                document.getElementById("nama_depan1").value = nama_depan;
                document.getElementById("nama_belakang1").value = nama_belakang;
                document.getElementById("tanggal_lahir1").value = tanggal_lahir;
                document.getElementById("tempat_lahir1").value = tempat_lahir;
                document.getElementById("jenis_kelamin1").value = jenis_kelamin;
                document.getElementById("agama1").value = agama;
                document.getElementById("alamat1").value = alamat;
                document.getElementById("no_telp1").value = no_telp;
                document.getElementById("email1").value = email;
                document.getElementById("tanggal_masuk1").value = tanggal_masuk;
                document.getElementById("tanggal_lulus1").value = tanggal_lulus;
                document.getElementById("status_aktif1").value = status_aktif;
                document.getElementById("status_bayar1").value = status_bayar;
                document.getElementById("jumlah_bayar1").value = jumlah_bayar;
                document.getElementById("tanggal_bayar1").value = tanggal_bayar;
                document.getElementById("kode_instansi1").value = kode_instansi;


                var id = id;
                var url = "/admin/edit_siswa/"+id;
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