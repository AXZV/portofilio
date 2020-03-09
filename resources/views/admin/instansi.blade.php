@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('JS')

    <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/formplugins/select2/select2.bundle.js') }}"></script>
    <script>
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
        @if ($errors->has('kode'))
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
                            Instansi
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
                                        <th>Kode Instansi</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Status Pusat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    @foreach($instansi as $i)
                                    <tr>
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> {{$i->kode}}</td>
                                        <td> {{$i->nama}}</td>
                                        <td> {{$i->alamat}}</td>
                                        <td> {{$i->no_telp}}</td>
                                        <td> {{$i->email}}</td>
                                        <td> {{$i->status_pusat}}</td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData({{$i->id}})" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <a href="#" data-toggle="modal" onclick="editData( '{{$i->id}}', '{{$i->kode}}', '{{$i->nama}}', '{{$i->alamat}}', '{{$i->no_telp}}', '{{$i->email}}', '{{$i->status_pusat}}')" data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-dark">
                                    <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Kode Instansi</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Status Pusat</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_instansi" method="POST">
                {{ csrf_field() }}
                <!--Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Instansi</label>
                            <input required value="{{ old('kode') }}" type="text" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Instansi">
                            @if ($errors->has('kode'))
                                <div class="invalid-feedback d-block"> 
                                    Kode Instansi Tidak Boleh Sama
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nama Instansi</label>
                            <input required value="{{ old('nama') }}" type="text" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama Instansi">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput3">Alamat</label>
                            <input required value="{{ old('alamat') }}" type="text" name="alamat" class="form-control" id="formGroupExampleInput3" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput4">Telepon</label>
                            <input required value="{{ old('telepon') }}" type="text" name="telepon" class="form-control" id="formGroupExampleInput4" placeholder="Telepon">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput5">Email</label>
                            <input required value="{{ old('email') }}" type="email" name="email" class="form-control" id="formGroupExampleInput5" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status Kantor</label>
                            <select name="status" id="inputState" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Pusat" {{ old('status') == 'Pusat' ? 'selected' : '' }}>Kantor Pusat</option>
                                <option value="Cabang" {{ old('status') == 'Cabang' ? 'selected' : '' }}>Kantor Cabang</option>
                            </select>
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
            var url = "/admin/hapus_instansi/"+id;
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
                    <input type="hidden" name="id" id="form0x" class="form-control">

                    <!-- <div class="form-group">
                        <label for="formGroupExampleInput">Kode Instansi</label>
                        <input required type="text" id="form1x" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Instansi">
                    </div> -->

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama Instansi</label>
                        <input required type="text" id="form2x" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama Instansi">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Alamat</label>
                        <input required type="text" id="form3x" name="alamat" class="form-control" id="formGroupExampleInput3" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput4">Telepon</label>
                        <input required type="text" id="form4x" name="telepon" class="form-control" id="formGroupExampleInput4" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput5">Email</label>
                        <input required type="email" id="form5x" name="email" class="form-control" id="formGroupExampleInput5" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status Kantor</label>
                        <select name="status" id="form6x" class="form-control" required>
                            <option value="Pusat">Kantor Pusat</option>
                            <option value="Cabang">Kantor Cabang</option>
                        </select>
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



        function editData(id, kode, nama, alamat, no_telp, email, status_pusat)
        {
            document.getElementById("form0x").value = id;
            // document.getElementById("form1x").value = kode;
            document.getElementById("form2x").value = nama;
            document.getElementById("form3x").value = alamat;
            document.getElementById("form4x").value = no_telp;
            document.getElementById("form5x").value = email;
            document.getElementById("form6x").value = status_pusat;

            var id = id;
            var url = "/admin/edit_instansi/"+id;
            $("#editForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#editForm").submit();
        }

    </script>




@endsection