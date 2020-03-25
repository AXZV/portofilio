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
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item">Daftar Kelas</li>
        <li class="breadcrumb-item">Rekap Presensi Kelas</li>
        <li class="breadcrumb-item active">Rekap Presensi Harian</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-check'></i> Presensi <span class='font-weight-light font-italic'>#<?php echo e($presensi[0]->id); ?>-<?php echo e($presensi[0]->pengajaran->guru_kelas->kelas->nama); ?></span>
        </h1>
    </div>

    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Detail Presensi Kelas Tanggal <?php echo date('d - F - Y', strtotime($presensi[0]->waktu)); ?>
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
                        <th>Status Siswa</th>
                        <th>Presensi</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    <?php $__currentLoopData = $presensi[0]->pengajaran->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> <?php echo e($ps->nama_depan); ?></td>
                        <td style="text-align:center"> 
                            <?php if( $ps->status_aktif == 'Aktif'): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center">
                            <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $psx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($psx->kehadiran_harian($ps->id)->first()->pivot->status == 'Masuk'): ?>
                                    <span class="badge badge-success">Masuk</span>
                                <?php elseif($psx->kehadiran_harian($ps->id)->first()->pivot->status == 'Ijin'): ?>
                                    <span class="badge badge-warning">Ijin</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Tidak Masuk</span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </td>
                        <td>
                            <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $psx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($psx->kehadiran_harian($ps->id)->first()->pivot->catatan); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </td>
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                     
                    <?php echo e(logger('Test')); ?>

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
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/guru/presensi/detail_presensi_harian.blade.php ENDPATH**/ ?>