<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> <?php echo $__env->yieldContent('title'); ?> </title>

        <meta name="description" content="Generate Table Style">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/vendors.bundle.css')); ?>">
        <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/app.bundle.css')); ?>">

        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('img/favicon/apple-touch-icon.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('img/favicon/favicon-32x32.png')); ?>">

        <link rel="mask-icon" href="<?php echo e(asset('img/favicon/safari-pinned-tab.svg')); ?>" color="#5bbad5">

        <?php echo $__env->yieldContent('CSS'); ?>

    </head>
    <body class="mod-bg-1 ">
        
        <div class="page-wrapper">
            <div class="page-inner">

                <!-- Side nav -->
                <?php echo $__env->make('component.sidenav', ['active' => $active ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="page-content-wrapper">
                    <?php echo $__env->make('component.headernav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <main id="js-page-content" role="main" class="page-content">
                        <!-- bagian konten -->
                        <?php echo $__env->yieldContent('Content'); ?>
                    </main>
                <div>

            </div>
        </div>

        <script src="<?php echo e(asset('js/vendors.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('js/app.bundle.js')); ?>"></script>

        <?php echo $__env->yieldContent('JS'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/layouts/master_guru.blade.php ENDPATH**/ ?>