<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The ~</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-3.2.1.min.js')); ?>"></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('css/css.css')); ?>" />

    <?php include($_SERVER['DOCUMENT_ROOT'].'/link/link.php'); ?>

</head>

<style>


.content {
  /* height: 600px; */
  width: 100%;
  /* background-color: #f0f0f0; */
  text-align: center;
  box-sizing: border-box;
  padding: 60px 0px;
}


</style>
<body>

<!-- ///////////////////////////////////////  HEADER  ////////////////////////////////////////// -->
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar navx">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">
        <i class="fas fa-angry"></i>
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
            </a>
        </li>
    </ul>
    <!-- Links -->

    <ul class="navbar-nav ml-auto">
        <?php if(Auth::guest()): ?>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <?php
                        $role =  Auth::user()->role ;
                    if ( $role == "admin"){ ?>
                        <a class="dropdown-item" href="/dasboard_admin">
                            Dasboard Admin
                        </a>
                    <?php } 
                    else if($role == "guru") { ?>
                        <a class="dropdown-item" href="/dasboard_guru">
                            Dasboard Guru
                        </a>
                    <?php } 
                    else if ( $role == "kepala_guru"){ ?>
                        <a class="dropdown-item" href="/dasboard_kepalaguru">
                            Dasboard Kepala Guru
                        </a>
                    <?php } 
                    else if($role == "orangtua") { ?>
                        <a class="dropdown-item" href="/dasboard_orangtua">
                            Dasboard Orang Tua
                        </a>
                    <?php } ?>
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
    <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->



<!-- ////////////////////////////////////  CONTENT  //////////////////////////////////////////// -->

<div>
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- ////////////////////////////////////  FOOTER  //////////////////////////////////////////// -->

    
    <!-- END OF FOOTER -->

</body>
</html>

<?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/layouts/master_4.blade.php ENDPATH**/ ?>