<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>

    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script>
        $(document).ready(function()
        {   
            $('#dt-basic-example').dataTable(
            {
                scrollY: 500,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
            });

        });

    </script>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
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

    <?php if(session()->has('successedit')): ?>
    <script>
        $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesedit").slideUp(900);
        });
    </script>
    <?php endif; ?>
    <?php if(session()->has('successadd')): ?>
    <script>
        $("#suksesadd").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesadd").slideUp(900);
        });
    </script>
    <?php endif; ?>
    <?php if(session()->has('successdelete')): ?>
    <script>
        $("#suksesdel").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesdel").slideUp(900);
        });
    </script>
    <?php endif; ?>
<!-- /////////////////////////////// Error Code /////////////////////////////// -->

    <?php if($errors->any()): ?>
        <?php if($errors->has('kode')): ?>
        <script>
            $(document).ready(function(){
                $('#adddata').modal({show: true});
            });
        </script>
        <?php endif; ?>
        <?php if($errors->has('kode2')): ?>
            <!-- ////ERROREDIT -->
        <?php endif; ?>
    <?php endif; ?>
<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Pengajaran</li>
        <li class="breadcrumb-item active">Daftar Pengajaran</li>
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
                            Pengajaran
                        </h2>
                        <div class="panel-toolbar">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#adddata"><span style="color:white;">Add Data</span></a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="thead-dark">
                                <tr style="text-align:center; width:1px; white-space:nowrap;">
                                        <th>No</th>
                                        <th>Kode Pengajaran</th>
                                        <th>Instansi</th>
                                        <th>Guru</th>
                                        <th>Kelas</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Status</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    <?php $__currentLoopData = $pengajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="width:1px; white-space:nowrap;">
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> <a href="/admin/detail_pengajaran/<?php echo e($i->id); ?>"> <?php echo e($i->kode); ?> </a></td>
                                        <td> <?php echo e($i->guru_kelas->guru->instansi->nama); ?></td>
                                        <td> <?php echo e($i->guru_kelas->guru->nama_depan); ?> <?php echo e($i->guru_kelas->guru->nama_belakang); ?></td>
                                        <td> <?php echo e($i->guru_kelas->kelas->nama); ?></td>
                                        <td style="text-align:center">
                                            <?php echo e($i->siswa->count()); ?>                                           
                                        </td>
                                        <td style="text-align:center"> 
                                            <?php if( $i->status_selesai == 'Selesai'): ?> 
                                                <span class="badge badge-success">Selesai</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Belum Selesai</span>
                                            <?php endif; ?>
                                        <td style="text-align:center">
                                            <?php if( $i->tanggal_selesai != NULL): ?> 
                                                <?php echo e($i->tanggal_selesai); ?>

                                            <?php else: ?>
                                                ~
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData(<?php echo e($i->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-danger "> Delete</a>
                                            <a href="/admin/edit_pengajaran/<?php echo e($i->id); ?>" class="btn btn-sm btn-primary "> Edit</a>
                                        </td>
                                    </tr>                                              
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
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
                <?php echo e(csrf_field()); ?>

                <!--Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Pengajaran</label>
                            <input required value="<?php echo e(old('kode')); ?>" type="text" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Pengajaran">
                            <?php if($errors->has('kode')): ?>
                                <div class="invalid-feedback d-block"> 
                                    Kode Pengajaran Tidak Boleh Sama
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="kode_guru_kelas">Guru Kelas</label>
                            <select name="kode_guru_kelas" id="kode_guru_kelas" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>                                       
                                <?php $__currentLoopData = $guru_kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ins->kode); ?>" <?php echo e((old("kode_guru_kelas") == $ins->kode ? "selected":"")); ?> ><?php echo e($ins->guru->nama_depan); ?> <?php echo e($ins->guru->nama_belakang); ?> - <?php echo e($ins->kelas->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="formGroupExampleInput216">Status</label>
                                    <select name="status_selesai" id="status_selesai" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Selesai" <?php echo e(old('status_selesai') == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                                        <option value="Belum Selesai" <?php echo e(old('status_selesai') == 'Belum Selesai' ? 'selected' : ''); ?>>Belum Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="">Tanggal Selesai</label>
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" value="<?php echo e(old('tanggal_selesai')); ?>" name="tanggal_selesai" class="form-control" id="tanggal_selesai" placeholder="Tanggal Selesai">
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
                                    <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ins->id); ?>"><?php echo e($ins->no_daftar); ?> - <?php echo e($ins->nama_depan); ?> <?php echo e($ins->nama_belakang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <script src="<?php echo e(asset('js/multiselect.min.js')); ?>"></script>
        <script>
            jQuery(document).ready(function($){
                $('#undo_redo').multiselect();
            });
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

        <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
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
    <?php echo e(csrf_field()); ?>

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








<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/pengajaran/pengajaran.blade.php ENDPATH**/ ?>