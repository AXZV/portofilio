<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> @yield('title') </title>

        <meta name="description" content="Generate Table Style">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">

        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">

        <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

        @yield('CSS')

    </head>
    <body class="mod-bg-1 ">
        
        <div class="page-wrapper">
            <div class="page-inner">

                <!-- Side nav -->
                @if(Auth::user()->role == 'Admin')
                    @include('component.sidenav', ['active' => $active ?? ''])
                @elseif(Auth::user()->role == 'Guru')
                    @include('component.sidenav_guru', ['active' => $active ?? ''])
                @elseif(Auth::user()->role == 'Siswa')

                @endif

                <div class="page-content-wrapper">
                    @include('component.headernav')

                    <main id="js-page-content" role="main" class="page-content">
                        <!-- bagian konten -->
                        @yield('Content')
                    </main>
                <div>

            </div>
        </div>

        <script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/app.bundle.js') }}"></script>

        @yield('JS')
    </body>
</html>
