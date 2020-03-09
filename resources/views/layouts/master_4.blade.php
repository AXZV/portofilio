<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The ~</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/css.css') }}" />

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
        @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="/login">Login
                </a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
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
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>       
        @endif
    </ul>
    </div>
    <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->



<!-- ////////////////////////////////////  CONTENT  //////////////////////////////////////////// -->

<div>
    @yield('content')
</div>

<!-- ////////////////////////////////////  FOOTER  //////////////////////////////////////////// -->

    
    <!-- END OF FOOTER -->

</body>
</html>

