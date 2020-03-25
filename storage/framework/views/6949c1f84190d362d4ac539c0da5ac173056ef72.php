<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
<script src="<?php echo e(asset('js/theme.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
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
                            <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>">Kembali</a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <?php $__currentLoopData = $pengajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form action="<?php echo e(url('admin/proses_edit_pengajaran')); ?>" id="editForm" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <!--Body-->
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?php echo e($p->id); ?>" class="form-control">
                                    <div class="form-group">
                                        <label for="kode_guru_kelas">Guru Kelas</label>
                                        <select name="kode_guru_kelas" id="kode_guru_kelas2" class="form-control" required>
                                            <option value="" disabled selected>Pilih.....</option>                                       
                                            <?php $__currentLoopData = $guru_kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ins->kode); ?>" <?php echo e($p->kode_guru_kelas == $ins->kode  ? 'selected' : ''); ?>><?php echo e($ins->guru->nama_depan); ?> <?php echo e($ins->guru->nama_belakang); ?> - <?php echo e($ins->kelas->nama); ?></option>                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput216">Status</label>
                                                <select name="status_selesai" id="status_selesai1" class="form-control" required>
                                                    <option value="" disabled selected>Pilih.....</option>
                                                    <option value="Selesai" <?php echo e($p->status_selesai == 'Selesai'  ? 'selected' : ''); ?>>Selesai</option>
                                                    <option value="Belum Selesai" <?php echo e($p->status_selesai == 'Belum Selesai'  ? 'selected' : ''); ?>>Belum Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="">Tanggal Selesai</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?php echo e($p->tanggal_selesai); ?>" autocomplete="off" name="tanggal_selesai" class="form-control" id="tanggal_selesai1" placeholder="Tanggal Selesai">
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
                                            <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ins->id); ?>"><?php echo e($ins->no_daftar); ?> - <?php echo e($ins->nama_depan); ?> <?php echo e($ins->nama_belakang); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php $__currentLoopData = $p->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($insi->id); ?>"><?php echo e($insi->no_daftar); ?> - <?php echo e($insi->nama_depan); ?> <?php echo e($insi->nama_belakang); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>  
                                <!--Footer-->
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                                    <a href="<?php echo e(url('admin/pengajaran')); ?>" type="button" class="btn btn-light btn-sm waves-effect">Batal</a>
                                </div>
                                
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?php echo e(asset('js/multiselect_edit.min.js')); ?>"></script>
    <script>
        jQuery(document).ready(function($){
            $('#undo_redo1').multiselect1();
        });
    </script>

    <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/pengajaran/edit_pengajaran.blade.php ENDPATH**/ ?>