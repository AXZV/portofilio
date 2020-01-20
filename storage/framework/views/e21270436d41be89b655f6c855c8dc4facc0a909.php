<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Lure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-3.2.1.min.js')); ?>"></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('css/footermaster.css')); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('css/slider.css')); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('css/css.css')); ?>" />

    <?php include($_SERVER['DOCUMENT_ROOT'].'/link/link.php'); ?>

</head>

<style>


.content {
  /* height: 600px; */
  width: 100%;
  background-color: #f0f0f0;
  text-align: center;
  box-sizing: border-box;
  padding: 60px 0px;
}
.navx
{
    background-color:  #4d4d4d;
}


</style>
<body>

<!-- ///////////////////////////////////////  HEADER  ////////////////////////////////////////// -->
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark navx">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">The \_ure </a>

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
        <a class="nav-link" href="/home">Home
            <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
        </li>

        <!-- Dropdown -->
        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item drop" href="#">Action</a>
            <a class="dropdown-item drop" href="#">Another action</a>
            <a class="dropdown-item drop" href="#">Something else here</a>
        </div>
        </li> -->

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
                        <a class="dropdown-item" href="/admin_dasboard">
                            Admin Dasboard
                        </a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="/home">
                            Profile
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

    <div class="footer">
    <div class="contain">
    <div class="col">
        <h1>Company</h1>
        <ul>
        <li>About</li>
        <li>Mission</li>
        <li>Services</li>
        <li>Social</li>
        <li>Get in touch</li>
        </ul>
    </div>
    <div class="col">
        <h1>Products</h1>
        <ul>
        <li>About</li>
        <li>Mission</li>
        <li>Services</li>
        <li>Social</li>
        <li>Get in touch</li>
        </ul>
    </div>
    <div class="col">
        <h1>Accounts</h1>
        <ul>
        <li>About</li>
        <li>Mission</li>
        <li>Services</li>
        <li>Social</li>
        <li>Get in touch</li>
        </ul>
    </div>
    <div class="col">
        <h1>Resources</h1>
        <ul>
        <li>Webmail</li>
        <li>Redeem code</li>
        <li>WHOIS lookup</li>
        <li>Site map</li>
        <li>Web templates</li>
        <li>Email templates</li>
        </ul>
    </div>
    <div class="col">
        <h1>Support</h1>
        <ul>
        <li>Contact us</li>
        <li>Web chat</li>
        <li>Open ticket</li>
        </ul>
    </div>
    <div class="col social">
        <h1>Social</h1>
        <ul>
        <li><img src="https://svgshare.com/i/5fq.svg" width="32" style="width: 32px;"></li>
        <li><img src="https://svgshare.com/i/5eA.svg" width="32" style="width: 32px;"></li>
        <li><img src="https://svgshare.com/i/5f_.svg" width="32" style="width: 32px;"></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    <!-- END OF FOOTER -->

</body>
</html>

<?php /**PATH C:\xampp\htdocs\laravel_04\laravelx1\resources\views/layouts/master.blade.php ENDPATH**/ ?>