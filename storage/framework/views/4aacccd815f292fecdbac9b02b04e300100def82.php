<?php $__env->startSection('CSS'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-user-graduate'></i> Siswa
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
                                <div class="card card-cascade mb-4">
                                <!-- Card image -->
                                        <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Label -->
                                        <h5 class="text-danger text-italic pb-2 pt-1 font-italic"><i class="fas fa-chalkboard-teacher"></i> #Kelas <?php echo $e++ ?></h5>
                                        <!-- Title -->
                                        <h4 class="font-weight-bold card-title"><?php echo e($gk->kelas->nama); ?></h4>
                                        <!-- Text -->
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text fs-xl">
                                                        <i class="fas fa-user-graduate"></i>
                                                    </span>
                                                </div>
                                                <input disabled type="text" value="<?php echo e($p->siswa->count()); ?> Siswa" name="1" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text fs-xl">
                                                        <i class="fas fa-book"></i>
                                                    </span>
                                                </div>
                                                <input disabled type="text" value="<?php echo e($gk->kelas->pelajaran->nama); ?>" name="1" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="text-center">
                                            <a href="presensi/log_level_pengajaran/<?php echo e($p->kode); ?>" class="btn btn-danger text-white">Presensi</a>
                                        </div>
                                    </div>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/guru/siswa/siswa.blade.php ENDPATH**/ ?>