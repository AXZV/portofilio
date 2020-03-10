<?php $__env->startSection('Content'); ?>
<!-- <section class="container">
<div style="margin: 2rem 0 2rem 0">
    <div class="row">
        <div class="col-lg-6 col-sm-12 py-5 px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 font-weight-bold">Masuk</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="username" class=""><?php echo e(__('Username')); ?></label>
                            <div class="">
                                <input id="username" type="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class=""><?php echo e(__('Kata sandi')); ?></label>

                            <div class="">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="">
                            <button class="btn btn-color white-text btn-block m-0 mb-3 border-0" type="submit">Masuk</button>
                            <a href="<?php echo e(route('password.request')); ?>">Lupa kata sandi?</a>
                        </div>

                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</section> -->


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