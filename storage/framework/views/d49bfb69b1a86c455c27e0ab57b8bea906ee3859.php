<?php $__env->startSection('content'); ?>
<style>
.container
{
    margin-top:7em;
    margin-bottom:7em;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Alamat e-mail</div>

                <div class="card-body">
                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            Sebuah tautan verifikasi baru telah dikirim ke alamat email anda.
                        </div>
                    <?php endif; ?>
                    

                    Alamat E-mail anda belum terverifikasi, silahkan cek email anda untuk tautan verifikasi. Jika anda tidak mendapatkan email,
                    <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">klik disini untuk mengirim ulang tautan verifikasi. ( <?php echo e(Auth::user()->email); ?> )</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/auth/verify.blade.php ENDPATH**/ ?>