<?php $__env->startSection('CSS'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
<script src="<?php echo e(asset('js/theme.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item">Presensi</li>
        <li class="breadcrumb-item active">Daftar Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-check'></i> Presensi
        </h1>
    </div>
    <!-- Team -->
    <style>
    .card-class-list:hover
    {
        background-color:#505050;
    }
    </style>
    <section id="team" class="pb-5">
    <div class="container">
    <div class="row">
        <?php $__currentLoopData = $pengajaran_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $pengajaran->where('id','=', $ps->kode_pengajaran); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-8 col-sm-6 col-md-4">
                    <!-- Card Narrower -->
                    <a href="presensi/log_presensi/<?php echo e($p->kode); ?>">
                        <div class="card card-cascade mb-4 card-class-list">
                            <div class="card-body card-body-cascade">
                                <h5 class="text-danger text-italic pb-2 pt-1 font-italic nama-kelas"><i class="fas fa-chalkboard-teacher"></i> #Sesi <?php echo e($p->guru_kelas->kelas->pelajaran->nama); ?></h5>
                                <div class="text-center mb-4">
                                    <span class="fas fa-chalkboard-teacher fa-4x text-danger icon-kelas"> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- Card Narrower -->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </section>
    <!-- Team -->
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/siswa/presensi/presensi.blade.php ENDPATH**/ ?>