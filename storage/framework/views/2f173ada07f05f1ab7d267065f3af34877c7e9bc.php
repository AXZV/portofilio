<?php $__env->startSection('Content'); ?>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->
    <?php if(session()->has('gagal_login')): ?>
    <script>
        $(document).ready(function(){
            $('#errorModal').modal('show');
          });
    </script>
    <?php endif; ?>

    <!-- /////////////////////////////// Modal ERROR /////////////////////////////// -->

   <!-- Central Modal Medium Danger -->
   <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <form action="" id="errorForm" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
        <p class="heading lead">Informasi !</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
        </div>

        <!--Body-->
        <div class="modal-body">
        <div class="text-center">
        <!-- <i class="fas fa-trash-alt"></i> -->
            <i class="far fa-frown fa-6x mb-3"></i>
            <p>Anda sudah tidak memiliki hak akses lagi</p>
            <h2><span class="badge"></span></h2>
        </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
        </div>

    </div>
    </form>
    <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Danger-->


<!-- ///////////////////////////////////////////////////////////////////////// -->
<div class="row">
<div class="col col-md-6 col-lg-7 hidden-sm-down">
    <h2 class="fs-xxl fw-500 mt-4 text-white">
        The simplest UI toolkit for developers &amp; programmers
        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
            Presenting you with the next level of innovative UX design and engineering. The most modular toolkit available with over 600+ layout permutations. Experience the simplicity of SmartAdmin, everywhere you go!
        </small>
    </h2>
    <a href="#" class="fs-lg fw-500 text-white opacity-70">Learn more &gt;&gt;</a>
    <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
        <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
            Find us on social media
        </div>
        <div class="d-flex flex-row opacity-70">
            <a href="#" class="mr-2 fs-xxl text-white">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="#" class="mr-2 fs-xxl text-white">
                <i class="fab fa-twitter-square"></i>
            </a>
            <a href="#" class="mr-2 fs-xxl text-white">
                <i class="fab fa-google-plus-square"></i>
            </a>
            <a href="#" class="mr-2 fs-xxl text-white">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Login
    </h1>
    <div class="card p-4 rounded-plus bg-faded">
        <form id="js-login" novalidate="" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input id="username" type="username" class="form-control form-control-lg <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Username" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">Kami Tidak Dapat Menemukan Akun Terdaftar</div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="password" required autocomplete="current-password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">Password Salah</div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-lg">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master_4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/auth/login.blade.php ENDPATH**/ ?>