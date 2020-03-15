@section('CSS')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
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
                            Pengajaran
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
                                        <th>Kode Pengajaran</th>
                                        <th>Instansi</th>
                                        <th>Guru</th>
                                        <th>Kelas</th>
                                        <th>Siswa</th>
                                        <th>Status</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    @foreach($pengajaran as $i)
                                    <tr>
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> {{$i->kode}}</td>
                                        <td> {{$i->guru_kelas->guru->instansi->nama}}</td>
                                        <td> {{$i->guru_kelas->guru->nama_depan}} {{$i->guru_kelas->guru->nama_belakang}}</td>
                                        <td> {{$i->guru_kelas->kelas->nama}}</td>
                                        <td>
                                                <li class="list-group-item text-center">
                                                    <span class="badge badge-primary badge-pill">{{$i->siswa->count()}}</span>
                                                </li>
                                                <?php $n=1 ?>
                                                @foreach($i->siswa as $s)
                                                    <li class="list-group-item">
                                                        <?php echo $n++ ?>. {{$s->nama_depan}} {{$s->nama_belakang}}
                                                    </li>
                                                @endforeach                                            
                                        </td>
                                        <td> {{$i->status_selesai}}</td>
                                        <td> {{$i->tanggal_selesai}}</td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData({{$i->id}})" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <!-- <a href="#" data-toggle="modal" onclick="editData( '{{$i->id}}', '{{$i->kode_guru_kelas}}', '{{$i->status_selesai}}', '{{$i->tanggal_selesai}}' )" data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a> -->
                                            <a href="/admin/edit_pengajaran/{{ $i->id }}" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Kode Pengajaran</th>
                                    <th>Instansi</th>
                                    <th>Guru</th>
                                    <th>Kelas</th>
                                    <th>Siswa</th>
                                    <th>Status</th>
                                    <th>Tanggal Selesai</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_pengajaran" method="POST">
                {{ csrf_field() }}
                <!--Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Pengajaran</label>
                            <input required value="{{ old('kode') }}" type="text" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Pengajaran">
                            @if ($errors->has('kode'))
                                <div class="invalid-feedback d-block"> 
                                    Kode Pengajaran Tidak Boleh Sama
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kode_guru_kelas">Guru Kelas</label>
                            <select name="kode_guru_kelas" id="kode_guru_kelas" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>                                       
                                @foreach($guru_kelas as $ins)
                                <option value="{{$ins->kode}}" {{ (old("kode_guru_kelas") == $ins->kode ? "selected":"") }} >{{$ins->guru->nama_depan}} {{$ins->guru->nama_belakang}} - {{$ins->kelas->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput216">Status</label>
                                    <select name="status_selesai" id="status_selesai" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Selesai" {{ old('status_selesai') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Belum Selesai" {{ old('status_selesai') == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="">Tanggal Selesai</label>
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" value="{{ old('tanggal_selesai') }}" name="tanggal_selesai" class="form-control" id="tanggal_selesai" placeholder="Tanggal Selesai">
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
                                <select name="from[]" id="undo_redo" class="form-control" size="15" multiple="multiple">
                                    @foreach($siswa as $ins)
                                        <option value="{{$ins->id}}">{{$ins->no_daftar}} - {{$ins->nama_depan}} {{$ins->nama_belakang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <style>

                            </style>
                            <div class="col-md-2" >
                                <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                                <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="fas fa-angle-double-right"></i></button>
                                <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="fas fa-angle-right"></i></button>
                                <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="fas fa-angle-left"></i></button>
                                <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="fas fa-angle-double-left"></i></button>
                                <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                            </div>
                                
                            <div class="col">
                                <select name="kode_siswa[]" id="undo_redo_to" class="form-control" size="15" multiple="multiple"></select>
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
        <script src="{{ asset('js/multiselect.min.js') }}"></script>
        <script>
            jQuery(document).ready(function($){
                $('#undo_redo').multiselect();
            });
        </script>

        <script src="{{ asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <script>
            var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
            jQuery(document).ready(function($){
                $('#tanggal_selesai').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
            })
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
            var url = "/admin/hapus_pengajaran/"+id;
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
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Pengajaran</h5>
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
                        <label for="formGroupExampleInput">Kode Pengajaran</label>
                        <input required type="text" id="form1x" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Pengajaran">
                    </div> -->
                    <div class="form-group">
                        <label for="kode_guru_kelas">Guru Kelas</label>
                        <select name="kode_guru_kelas" id="kode_guru_kelas2" class="form-control" required>
                            <option value="" disabled selected>Pilih.....</option>                                       
                            @foreach($guru_kelas as $ins)
                            <option value="{{$ins->kode}}">{{$ins->guru->nama_depan}} {{$ins->guru->nama_belakang}} - {{$ins->kelas->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput216">Status</label>
                                <select name="status_selesai" id="status_selesai1" class="form-control" required>
                                    <option value="" disabled selected>Pilih.....</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="">Tanggal Selesai</label>
                                <div class="input-group">
                                    <input type="text" autocomplete="off" name="tanggal_selesai" class="form-control" id="tanggal_selesai1" placeholder="Tanggal Selesai">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                        if(isset($_POST['kode'])) 
                        {
                            echo $_POST['kode'];
                            exit;
                        }
                        ?>
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
                            @foreach($pengajaran->where('kode','==','001pengajaran') as $ii)
                                @foreach($ii->siswa as $insi)
                                    <option value="{{$insi->id}}">{{$insi->no_daftar}} - {{$insi->nama_depan}} {{$insi->nama_belakang}}</option>
                                @endforeach
                            @endforeach
                        </select>
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

        function editData(id, kode_guru_kelas, status_selesai, tanggal_selesai)
        {

            document.getElementById("form0x").value = id;
            document.getElementById("kode_guru_kelas2").value = kode_guru_kelas;
            document.getElementById("status_selesai1").value = status_selesai;
            document.getElementById("tanggal_selesai1").value = tanggal_selesai;
        

            var id = id;
            var url = "/admin/edit_pengajaran/"+id;
            $("#editForm").attr('action', url);


          
        }

        function formSubmit2()
        {
            $("#editForm").submit();
        }

    </script>

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




@endsection