<?php $__env->startSection('CSS'); ?>
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/vendors.bundle.css')); ?>">
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/app.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
<script src="<?php echo e(asset('js/theme.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Guru</li>
        <li class="breadcrumb-item">Level Pengajaran</li>
        <li class="breadcrumb-item active">Daftar Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-chart-line'></i> Level Pengajaran
        </h1>
    </div>

        <!-- Team -->
        <section id="team" class="pb-5">
            <div class="container">
                <!-- <h5 class="section-title h1">Daftar Kelas</h5> -->
                <div class="row">
                    <!-- Team member -->
                    <?php $e=1 ?>
                    <?php $__currentLoopData = $guru_kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $pengajaran->where('kode_guru_kelas','=',$gk->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xs-8 col-sm-6 col-md-4"><!-- item -->
                            <!-- Card Narrower -->
                            <div class="card card-cascade mb-4 hover-highlight">
                                    <a href="presensi/log_level_pengajaran/<?php echo e($p->kode); ?>">
                                        <div class="card-body card-body-cascade chover-highlight">
                                            <h5 class="text-danger text-italic pb-2 pt-1 font-italic nama-kelas"><i class="fas fa-chalkboard-teacher"></i> #Sesi <?php echo e($p->guru_kelas->kelas->nama); ?></h5>
                                            <div class="text-center mb-4">
                                                <span class="fas fa-chalkboard-teacher fa-4x text-danger icon-kelas"> </span>
                                            </div>
                                            <div class="row no-gutters row-grid text-dark">
                                                <div class="col-6">
                                                    <div class="text-center py-3">
                                                        <h5 class="mb-0 fw-700">
                                                            Pelajaran
                                                            <small class="text-muted mb-0"><?php echo e($p->guru_kelas->kelas->pelajaran->nama); ?></small>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center py-3">
                                                        <h5 class="mb-0 fw-700">
                                                            Siswa
                                                            <small class="text-muted mb-0"><?php echo e($p->siswa->count()); ?> Orang</small>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>
                                    </a>
                                </div>
                            <!-- Card Narrower -->
                            </div><!-- item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- ./Team member -->
                </div>
            </div>
        </section>
        <!-- Team -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/guru/level_pengajaran/level_pengajaran.blade.php ENDPATH**/ ?>