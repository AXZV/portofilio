<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
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
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item active">Rekap Presensi Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-flask'></i> Sesi <span class='font-weight-light font-italic'>#<?php echo e($pengajaran->guru_kelas->kelas->nama); ?></span>
        </h1>
    </div>

    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Daftar Presensi
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-warning m-2" href="/siswa/presensi/detail_presensi/<?php echo e($pengajaran->kode); ?>"><span style="color:white;">Rekap Presensi</span></a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembahasan</th>
                        <th>Jumlah Bahasan</th>
                        <th>M</th>
                        <th>TM</th>
                        <th>I</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> <a href="/siswa/presensi/detail_presensi_harian/<?php echo e($ps->id); ?>"><?php echo date('d F Y', strtotime($ps->waktu)); ?></a></td>
                        <td> <?php echo e($ps->pembahasan); ?></td>
                        <td class="text-center"> <?php echo e($ps->jumlah_bahasan); ?></td>                        
                        <td class="text-center"> 
                            <?php if($ps->kehadiran('Masuk')->count() > 0): ?>
                                <span class="badge badge-success"><?php echo e($ps->kehadiran('Masuk')->count()); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>      
                        </td>
                        <td class="text-center"> 
                            <?php if($ps->kehadiran('Tidak Masuk')->count() > 0): ?>
                                <span class="badge badge-danger"><?php echo e($ps->kehadiran('Tidak Masuk')->count()); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>      
                        </td>
                        <td class="text-center"> 
                            <?php if($ps->kehadiran('Ijin')->count() > 0): ?>
                                <span class="badge badge-warning"><?php echo e($ps->kehadiran('Ijin')->count()); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>      
                        </td>  
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                </tbody>
            </table>
            <!-- conten end -->
        </div>
    </div>
    </div>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/siswa/presensi/log_presensi.blade.php ENDPATH**/ ?>