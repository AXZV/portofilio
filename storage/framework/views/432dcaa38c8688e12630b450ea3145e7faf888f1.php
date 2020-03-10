<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
                <a class="btn-link text-white" href="/login">Login</a>
            </li>
        <?php else: ?>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <?php
                        $role =  Auth::user()->role ;
                    if ( $role == "Admin"){ ?>
                        <a class="dropdown-item text-white" href="/dasboard_admin">
                            Dasboard Admin
                        </a>
                    <?php } 
                    else if($role == "Guru") { ?>
                        <a class="dropdown-item text-white" href="/dasboard_guru">
                            Dasboard Guru
                        </a>
                    <?php } 
                    else if ( $role == "Siswa"){ ?>
                        <a class="dropdown-item text-white" href="/dasboard_siswa">
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
</div><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/component/headernav_dasboard.blade.php ENDPATH**/ ?>