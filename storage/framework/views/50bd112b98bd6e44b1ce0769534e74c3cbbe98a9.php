<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script src="js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script>
    $(document).ready(function()
    {   
        $('#dt-basic-example').dataTable(
        {
            // scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            paging: false,
            // fixedColumns:
            // {
            //     leftColumns: 3,
            //     rightColumns:1
            // },
               
        });
    });
    </script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item">Rekap Presensi</li>
        <li class="breadcrumb-item active">Tambah Presensi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-flask'></i> Sesi <span class='font-weight-light font-italic'>#<?php echo e($pengajaran[0]->guru_kelas->kelas->nama); ?></span>
        </h1>
    </div>
    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Presensi
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>">Kembali</a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
        <form action="<?php echo e(url('guru/proses_presensi')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>M</th>
                        <th>TM</th>
                        <th>I</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    <?php $__currentLoopData = $pengajaran[0]->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="width:1px; white-space:nowrap;">
                        <td style="text-align:center" >
                        <?php echo $r++ ?>
                        <input type="hidden" value="<?php echo e($s->id); ?>" name="kode_siswa[<?php echo $r?>]">
                        </td>
                        <td> <?php echo e($s->nama_depan); ?> <?php echo e($s->nama_belakang); ?></td>
                        <td style="text-align:center"> 
                            <?php if( $s->status_aktif == 'Aktif'): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-radio">
                                <input required type="radio" value="Masuk" id="customRadio1<?php echo $r?>" name="presensi[<?php echo $r?>]" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1<?php echo $r?>"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-radio">
                                <input required type="radio" value="Tidak Masuk" id="customRadio2<?php echo $r?>" name="presensi[<?php echo $r?>]" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2<?php echo $r?>"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-radio">
                                <input required type="radio" value="Ijin" id="customRadio3<?php echo $r?>" name="presensi[<?php echo $r?>]" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3<?php echo $r?>"></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input  type="text" name="catatan[<?php echo $r?>]" class="form-control" placeholder="Catatan">
                            </div>
                        </td>

                    </tr>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                </tbody>
            </table>

            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo e($pengajaran[0]->kode); ?>" class="form-control" name="kode_pengajaran" id="kode_pengajaran">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <input required  type="text" autocomplete="off" name="waktu" class="form-control" id="waktu" placeholder="Tanggal Presensi">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <input required type="number" class="form-control" name="jumlah_bahasan" id="jumlah_bahasan" placeholder="Jumlah Bahasan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-group mb-4">
                            <textarea required class="form-control" name="pembahasan" rows="3" placeholder="Pembahasan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary text-white">Akhiri Presensi</button>
                    </div>
                </div>
            </div>
            </form>
            <!-- conten end -->
        </div>
    </div>
    </div>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script>
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        jQuery(document).ready(function($){
            // enable clear button 
            $('#waktu').datepicker(
            {
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                templates: controls
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/guru/presensi/tambah_presensi.blade.php ENDPATH**/ ?>