<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>

    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('js/formplugins/select2/select2.bundle.js')); ?>"></script>
    <script>
        $(document).ready(function()
        {   
            $('.select2').select2();

            $('#dt-basic-example').dataTable(
            {
                responsive: true,
                fixedHeader: true,
            });

            $('.js-thead-colors a').on('click', function()
            {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function()
            {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

            $("#js-btn-form").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-form")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
            });

        });

    </script>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('Content'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->
    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesedit" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-edit text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Update Data</span>  
            </div>
        </div>
    </div>


    <?php if(session()->has('successedit')): ?>
    <script>
        $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesedit").slideUp(900);
        });
    </script>
    <?php endif; ?>

<!-- ///////////////////////////////////////////////////////////////////////// -->
<ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Admin Setting</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->
    <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Account Setting
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <a class="btn btn-panel btn-danger" href="/dasboard_admin" data-original-title="Close"></a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form action="<?php echo e(url('/admin/edit_useraccountset/')); ?>" id="editForm" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <!--Body-->
                                    <div class="modal-body">
                                        <input type="hidden" value="<?php echo e($ac->id); ?>" name="id" id="id" class="form-control">
                    
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input required type="text" value="<?php echo e($ac->username); ?>" name="username" class="form-control" id="username" placeholder="Username">
                                            <small id="usernameHelp" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                                            <?php if($errors->has('username')): ?>
                                                <div class="invalid-feedback d-block"> 
                                                    Username sudah terdaftar atau tidak sesuai aturan
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password1">Masukan Password Akun ini</label>
                                            <input required type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                                            <?php if(session()->has('passwordnotmatch')): ?>
                                                <div class="invalid-feedback d-block"> 
                                                    Password Salah !
                                                </div>
                                            <?php endif; ?>
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
                                        <button type="submit" id="submitx" name="submit" class="btn btn-primary btn-sm" >Simpan</button>
                                        <a type="button" href="/dasboard_admin" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</a>
                                    </div>
                                    
                                </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <script>
        $('document').ready(function(){
            $('#password, #password_confirmation').on('keyup', function () {
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
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/useraccountset.blade.php ENDPATH**/ ?>