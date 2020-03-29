<?php $__env->startSection('CSS'); ?>
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/vendors.bundle.css')); ?>">
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/app.bundle.css')); ?>">
<link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
        <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <!-- this overlay is activated only when mobile menu is triggered -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
    
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
            <li class="breadcrumb-item active">Dasboard Siswa</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="row">
            <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
                <div class="card mb-g rounded-top">
                    <div class="row no-gutters row-grid">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                <i class="fas fa-user-graduate fa-5x text-primary"></i>
                                <h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: capitalize">
                                    <?php echo e($siswa->nama_depan); ?> <?php echo e($siswa->nama_belakang); ?>

                                    <small class="text-muted mb-0"><?php echo e($siswa->alamat); ?></small>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                    <span class="fa fa-venus-mars fa-2x"></span>
                                    <small class="text-muted mb-0"><?php if($siswa->jenis_kelamin == 'P'): ?> Perempuan <?php else: ?> Laki-Laki <?php endif; ?></small>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                <span class="fas fa-praying-hands fa-2x"></span>
                                    <small class="text-muted mb-0"><?php echo e($siswa->agama); ?></small>
                                </h5>
                            </div>
                        </div>
                        <?php if($siswa->status_aktif == 'Aktif'): ?>
                        <div class="col-12 text-center text-white bg-success">
                        <?php else: ?>
                        <div class="col-12 text-center text-white bg-danger">
                        <?php endif; ?>
                            <div class="row m-2">
                                <div class="col-12 text-center">
                                    <a  class="btn-link font-weight-bold"> Status <?php echo e($siswa->status_aktif); ?> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Daftar sesi -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                <i class="fas fa-chalkboard-teacher"></i>&nbsp;Sesi
                                </h2>
                            </div>
                        </div>
                        <?php $__currentLoopData = $pengajaran_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $pengajaran->where('id','=', $ps->kode_pengajaran); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-4">
                                    <a href="/siswa/sesi" class="text-center p-3 d-flex flex-column hover-highlight">
                                        <span class="profile-image rounded-circle d-block m-auto">
                                            <div class='icon-stack display-3 flex-shrink-0'>
                                                <i class="fas fa-chalkboard-teacher icon-stack-1x opacity-100 color-success-500"></i>
                                            </div>
                                        </span>
                                        <span class="d-block text-truncate text-muted fs-xs mt-1"><?php echo e($p->guru_kelas->kelas->pelajaran->nama); ?></span>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
            <!-- Phone numb -->
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                    <div class='icon-stack display-3 flex-shrink-0'>
                                        <i class="fal fa-circle icon-stack-3x opacity-100 color-primary-400"></i>
                                        <i class="fa fa-phone icon-stack-1x opacity-100 color-primary-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <strong>
                                            Phone Number
                                        </strong>
                                        <br>
                                            <?php echo e($siswa->no_telp); ?>

                                    </div>
                                </a>     
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                    <div class='icon-stack display-3 flex-shrink-0'>
                                        <i class="fal fa-circle icon-stack-3x opacity-100 color-warning-400"></i>
                                        <i class="far fa-envelope icon-stack-1x opacity-100 color-warning-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <strong>
                                            Email Address
                                        </strong>
                                        <br>
                                            <?php echo e($siswa->email); ?>

                                    </div>
                                </a>
                            </div>
                        </div>  
                    </div>
                </div>
            <!-- Rekap Presensi -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                    <i class="fas fa-user-check"></i>&nbsp;Rekap Presensi
                                </h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row no-gutters row-grid">                       
                                <div class="col-4">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="mb-0 text-success">Masuk</small>
                                        </h8>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="text-danger mb-0">Tidak Masuk</small>
                                        </h8>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center py-1">
                                        <h8 class="mb-0 fw-700">
                                            <small class="text-warning mb-0">Ijin</small>
                                        </h8>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $__currentLoopData = $pengajaran_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $pengajaran->where('id','=', $ps->kode_pengajaran); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 hover-highlight">
                                <a href="siswa/presensi/log_presensi/<?php echo e($p->kode); ?>" class="text-dark">
                                    <div class="p-3">
                                        <div class="fw-500 fs-xs"><?php echo e($p->guru_kelas->kelas->pelajaran->nama); ?></div>
                                        <div class="row no-gutters row-grid">                       
                                            <div class="col-4">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        <?php $__empty_1 = true; $__currentLoopData = $jumlah_presensi->where('id_pengajaran','=',$p->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge badge-success"><?php echo e($jp->masuk); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        -
                                                        <?php endif; ?>
                                                    </h8>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        <?php $__empty_1 = true; $__currentLoopData = $jumlah_presensi->where('id_pengajaran','=',$p->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge badge-danger"><?php echo e($jp->tidak_masuk); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        -
                                                        <?php endif; ?>
                                                    </h8>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-center py-1">
                                                    <h8 class="mb-0 fw-700">
                                                        <?php $__empty_1 = true; $__currentLoopData = $jumlah_presensi->where('id_pengajaran','=',$p->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge badge-warning"><?php echo e($jp->ijin); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        -
                                                        <?php endif; ?>
                                                    </h8>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <!-- rating -->
                <div class="card mb-g">
                    <div class="row row-grid no-gutters">
                        <div class="col-12">
                            <div class="p-3">
                                <h2 class="mb-0 fs-xl">
                                    <i class="fas fa-chart-line"></i>&nbsp;Level Siswa
                                </h2>
                            </div>
                        </div>
                        <?php $__currentLoopData = $pengajaran_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $pengajaran->where('id','=', $ps->kode_pengajaran); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                                <div class="col-12 hover-highlight">
                                    <a href="siswa/level_pengajaran/detail_level_pengajaran/<?php echo e($p->kode); ?>/<?php echo e($siswa->no_daftar); ?>" class="text-dark">
                                        <div class="p-3">
                                            <div class="fw-500 fs-xs"><?php echo e($p->guru_kelas->kelas->pelajaran->nama); ?></div>
                                            <?php $__empty_1 = true; $__currentLoopData = $pengajaran_level->where('id_siswa', $siswa->no_daftar)->where('kode_pengajaran', $p->kode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                                <?php for($i=0; $i<$pl->tingkat; $i++): ?>
                                                    <span class="fas fa-star text-warning"></span>
                                                <?php endfor; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <span class="fal fa-star text-warning"></span>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- /////////////////////////////// Modal Edit Data akun /////////////////////////////// -->
   <div class="modal fade bd-example-modal-lg" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Akun Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="edituserForm" method="POST">
            <?php echo e(csrf_field()); ?>

            <!--Body-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="form0x" class="form-control">

                    <div class="form-group">
                        <label for="nama1">Username</label>
                        <input required type="text" value="<?php echo e(old('username')); ?>" name="username" class="form-control" id="username" placeholder="Username">
                        <small id="usernameHelp" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                        <?php if($errors->has('username')): ?>
                            <div class="invalid-feedback d-block"> 
                                Username sudah terdaftar atau tidak sesuai aturan
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Masukan Password Akun ini</label>
                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                        <?php if(session()->has('passwordnotmatch1')): ?>
                            <div class="invalid-feedback d-block"> 
                                Kata sandi salah atau kosong
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-center">
                    <small id="passwordHelp" class="form-text text-muted" style="font-size:12px;">"Jika tidak ingin merubah kata sandi silahkan abaikan form dibawah ini"</small>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <small id="passwordHelp" class="form-text text-muted">Minimal 8 karakter tanpa spasi</small>
                        <?php if($errors->has('password')): ?>
                            <div class="invalid-feedback d-block"> 
                                Password tidak sesuai aturan
                            </div>
                        <?php endif; ?>
                    </div> 
                    <div class="form-group">
                        <label for="password_confirmation ">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                        <small id='message'></small>
                    </div>   
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="submitx" name="submitx" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>
    

    <script type="text/javascript">
        function edituser(id, username)
        {
            document.getElementById("form0x").value = id;
            document.getElementById("username").value = username;
            var id = id;
            var url = "/guru/edit_user/"+id;
            $("#edituserForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#edituserForm").submit();
        }
    </script>

    <script>
        $('document').ready(function(){
            $('#password_confirmation').on('keyup', function () {
            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').html('Password Cocok').css('color', 'green');
                document.getElementById("submitx").disabled = false; 
            } else 
            {
                $('#message').html('Password Tidak Cocok').css('color', 'red');
                document.getElementById("submitx").disabled = true; 
            }
            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views//siswa/siswa_dasboard.blade.php ENDPATH**/ ?>