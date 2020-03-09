<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<aside class="page-sidebar">
    <div class="page-logo">
        <a href="<?php echo e(url('dasboard_admin')); ?>" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <!-- <img src="<?php echo e(asset('img/logo.png')); ?>" alt="SmartAdmin WebApp" aria-roledescription="logo"> -->
            <span class="page-logo-text mr-1"><i class='fab fa-ravelry'></i> Kuanta Cendikia</span>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <ul id="js-nav-menu" class="nav-menu">

            <li>
                <a  href="<?php echo e(url('dasboard_admin')); ?>" title="Dashboard" data-filter-tags="application intel">
                    <i class="fas fa-desktop"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                </a>
            </li>
            

            <!-- GROUP Data -->

            <li class="nav-title">Data</li>
            <li class="<?php echo e($active == 'instansi' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/instansi')); ?>" title="instansi" data-filter-tags="instansi">
                    <i class="fas fa-university"></i>
                    <span class="nav-link-text" data-i18n="nav.instansi">Instansi</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'guru' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/guru')); ?>" title="guru" data-filter-tags="guru">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="nav-link-text" data-i18n="nav.guru">Guru</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'siswa' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/siswa')); ?>" title="siswa" data-filter-tags="siswa">
                    <i class="fas fa-user-graduate"></i>
                    <span class="nav-link-text" data-i18n="nav.siswa">Siswa</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'pelajaran' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/pelajaran')); ?>" title="pelajaran" data-filter-tags="pelajaran">
                    <i class="fas fa-book"></i>
                    <span class="nav-link-text" data-i18n="nav.pelajaran">Pelajaran</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'kelas' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/kelas')); ?>" title="kelas" data-filter-tags="kelas">
                    <i class="fas fa-flask"></i>
                    <span class="nav-link-text" data-i18n="nav.kelas">Kelas</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'produk' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/produk')); ?>" title="produk" data-filter-tags="produk">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span class="nav-link-text" data-i18n="nav.produk">Produk</span>
                </a>
            </li>

        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->
    <!-- <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div> END NAV FOOTER -->
</aside><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/component/sidenav.blade.php ENDPATH**/ ?>