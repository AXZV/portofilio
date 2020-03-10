<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <span class="page-logo-text mr-1"><i class='fab fa-ravelry'></i> Kuanta Cendikia</span>
                                </a>
                            </div>
                            <ul class="navbar-nav ml-auto">
                                <?php if(Auth::guest()): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="/login">Login
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            User <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <?php
                                                $role =  Auth::user()->role ;
                                            if ( $role == "Admin"){ ?>
                                                <a class="dropdown-item" href="/dasboard_admin">
                                                    Dasboard Admin
                                                </a>
                                            <?php } 
                                            else if($role == "Guru") { ?>
                                                <a class="dropdown-item" href="/dasboard_guru">
                                                    Dasboard Guru
                                                </a>
                                            <?php } 
                                            else if ( $role == "Siswa"){ ?>
                                                <a class="dropdown-item" href="/dasboard_siswa">
                                                    Dasboard Siswa
                                                </a>
                                            <?php }  ?>
                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                            </a>
                        
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </div>
                                    </li>       
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <?php echo $__env->yieldContent('Content'); ?>
                            <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                               <!-- ///footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            $("#js-login-btn").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-login")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
            });

        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/layouts/master_4.blade.php ENDPATH**/ ?>