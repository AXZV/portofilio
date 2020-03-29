<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
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
        <li class="breadcrumb-item">Guru</li>
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item">Rekap Presensi</li>
        <li class="breadcrumb-item active">Rekap Presensi Siswa</li>
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
            Detail Presensi
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>">Kembali</a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>M</th>
                        <th>TM</th>
                        <th>I</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    <?php $__currentLoopData = $pengajaran->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> <?php echo e($ps->nama_depan); ?> <?php echo e($ps->nama_belakang); ?></td>
                        <td style="text-align:center"> 
                            <?php if( $ps->status_aktif == 'Aktif'): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                        <?php $__currentLoopData = $jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                            <?php if($jp->masuk > 0): ?>
                                <span class="badge badge-success"><?php echo e($jp->masuk); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </td>
                        <td class="text-center">
                        <?php $__currentLoopData = $jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($jp->tidak_masuk > 0): ?>
                                <span class="badge badge-danger"><?php echo e($jp->tidak_masuk); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="text-center">
                        <?php $__currentLoopData = $jumlah_presensi->where('id_siswa','=', $ps->id)->where('id_pengajaran','=', $pengajaran->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($jp->ijin > 0): ?>
                                <span class="badge badge-warning"><?php echo e($jp->ijin); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/siswa/presensi/detail_presensi.blade.php ENDPATH**/ ?>