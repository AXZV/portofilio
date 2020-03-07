<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SIM Senjata Api</span>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <ul id="js-nav-menu" class="nav-menu">

            <li>
                <a href="#" title="Dashboard" data-filter-tags="application intel">
                    <i class="fal fa-window"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="#" title="Profile Sistem" data-filter-tags="application intel">
                    <i class="fal fa-cog"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Profile Sistem</span>
                </a>
            </li>

            <!-- GROUP PEMINJAMAN -->

            <li class="nav-title">Data</li>
            <li class="<?php echo e($active == 'peminjamanAdd' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman/add')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Instansi</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'peminjaman' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Guru</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'peminjamanAdd' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman/add')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Siswa</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'peminjaman' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Pelajaran</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'peminjamanAdd' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman/add')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Kelas</span>
                </a>
            </li>

            <li class="<?php echo e($active == 'peminjaman' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/senjata/peminjaman')); ?>" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Produk</span>
                </a>
            </li>
            
            <!-- GROUP MASTER DATA -->

            <!-- <li class="nav-title">Master Data</li>

            <li class="<?php echo e($active == 'departement' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/master/departement')); ?>" title="Satuan Kerja" data-filter-tags="application intel">
                    <i class="fal fa-map-marker-alt"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Satuan Kerja</span>
                </a>
            </li>
            <li class="<?php echo e($active == 'pangkat' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/master/pangkat')); ?>" title="Pangkat" data-filter-tags="application intel">
                    <i class="fal fa-user"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Pangkat</span>
                </a>
            </li>
            <li class="<?php echo e($active == 'anggota' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/master/anggota')); ?>" title="Daftar Anggota" data-filter-tags="application intel">
                    <i class="fal fa-edit"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Daftar Anggota</span>
                </a>
            </li>
            
            <li class="active open">
                <a href="#" title="Senjata Api" data-filter-tags="plugins">
                    <i class="fal fa-shield-alt"></i>
                    <span class="nav-link-text" data-i18n="nav.plugins">Senjata Api</span>
                </a>
                <ul>
                    <li class="<?php echo e($active == 'senjata' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/master/produk/get')); ?>" title="Semua Data Senjata" data-filter-tags="plugins plugins faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Semua Data Senjata</span>
                        </a>
                    </li>
                    <li class="<?php echo e($active == 'kategori' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/master/produk/kategori')); ?>" title="Kategori Senjata" data-filter-tags="plugins plugins faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Kategori Senjata</span>
                        </a>
                    </li>
                    <li class="<?php echo e($active == 'jenis' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/master/produk/jenis')); ?>" title="Jenis Senjata" data-filter-tags="plugins plugins faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Jenis Senjata</span>
                        </a>
                    </li>
                    <li class="<?php echo e($active == 'merek' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/master/produk/merek')); ?>" title="Jenis Senjata" data-filter-tags="plugins plugins faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Merek Senjata</span>
                        </a>
                    </li>
                    <li class="<?php echo e($active == 'kondisi' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/master/produk/kondisi')); ?>" title="Daftar Kondisi Senjata" data-filter-tags="plugins plugins faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Daftar Kondisi Senjata</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!--  END MASTER DATAGROUP -->

            <!-- <li class="nav-title">Data Gudang</li>

            <li>
                <a href="#" title="Application Intel" data-filter-tags="application intel">
                    <i class="fal fa-credit-card-front"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Data Senjata Api</span>
                </a>
            </li>

            <li class="open>">
                <a href="#" title="Riwayat Gudang" data-filter-tags="gudang">
                    <i class="fal fa-chart-pie"></i>
                    <span class="nav-link-text" data-i18n="nav.plugins">Riwayat Pencatatan</span>
                </a>
                <ul>
                    <li>
                        <a href="plugin_faq.html" title="Penerimaan Senjata" data-filter-tags="gudang gudang faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Penerimaan Senjata</span>
                        </a>
                    </li>
                    <li>
                        <a href="plugin_faq.html" title="Pengeluaran Senjata" data-filter-tags="gudang gudang faq">
                            <span class="nav-link-text" data-i18n="nav.plugins_plugins_faq">Pengeluaran Senjata</span>
                        </a>
                    </li>
                </ul>
            </li> -->

        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
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
    </div> <!-- END NAV FOOTER -->
</aside><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/dashboard/component/sidenav.blade.php ENDPATH**/ ?>