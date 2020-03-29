<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    
    <script>
    $(document).ready(function()
    {   
        $('#dt-basic-example').dataTable(
        {
            // scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            paging: false,
            // fixedColumns:
            // {
            //     leftColumns: 3,
            //     rightColumns:1
            // },
               
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
                <i class="fal fa-shield-check text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Sukses Input Presensi</span>  
            </div>
        </div>
    </div>
    <?php if(session()->has('successadd')): ?>
        <script>
            $("#suksesedit").fadeTo(5000, 900).slideUp(900, function(){
                $("#suksesedit").slideUp(900);
            });
        </script>
    <?php endif; ?>

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
        <li class="breadcrumb-item">Guru</li>
        <li class="breadcrumb-item">Level Pengajaran</li>
        <li class="breadcrumb-item">Daftar Sesi</li>
        <li class="breadcrumb-item active">Level Pengajaran Sesi</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fas fa-flask'></i> Sesi <span class='font-weight-light font-italic'>#<?php echo e($pengajaran->guru_kelas->kelas->nama); ?></span>
        </h1>
    </div>

    <div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Tingkatan Pengajaran Siswa
        </h2>
        <div class="panel-toolbar">
            <a class="btn btn-primary" href="/guru/level_pengajaran">Kembali</a>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="thead-dark">
                <tr style="text-align:center; width:1px; white-space:nowrap;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tingkat</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $r=1 ?>
                    <?php $__currentLoopData = $pengajaran->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style=" width:1px; white-space:nowrap;">
                        <td class="text-center"> <?php echo $r++ ?></td>
                        <td> <a href="/guru/level_pengajaran/detail_level_pengajaran/<?php echo e($pengajaran->kode); ?>/<?php echo e($ps->no_daftar); ?>"> <?php echo e($ps->nama_depan); ?> <?php echo e($ps->nama_belakang); ?> </a> </td>
                        <td style="text-align:center"> 
                            <?php if( $ps->status_aktif == 'Aktif'): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-warning">
                        <?php $__currentLoopData = $pengajaran_level->where('id_siswa', $ps->no_daftar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php for($i=0; $i<$pl->tingkat; $i++): ?>
                                <span class="fa fa-star"></span>
                            <?php endfor; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                        <?php $__currentLoopData = $pengajaran_level->where('id_siswa', $ps->no_daftar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($pl->catatan); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success text-white" data-toggle="modal" onclick="level( '<?php echo e($pengajaran->kode); ?>', '<?php echo e($ps->no_daftar); ?>')" data-target="#level"> <span class="fas fa-angle-double-up"></span> Tingkatkan</a>
                        </td>                      
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <!-- conten end -->
        </div>
    </div>
    </div>
<!-- ///////////////////////////////////////////////////////////////////////// -->  
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// -->

    <div class="modal fade bd-example-modal-lg" id="level" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Naikan Level Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="levelForm" method="POST">
            <?php echo e(csrf_field()); ?>

            <!--Body-->
                <div class="modal-body text-center">
                    <i class="fal fas fa-chart-line fa-6x mb-3"></i>
                    <p>Catatan untuk siswa </p>
                    <h2><span class="badge"></span></h2>

                <input required type="hidden" name="kode_pengajaran" id="kode_pengajaran" class="form-control">
                <input required type="hidden" name="kode_siswa" class="form-control" id="kode_siswa" >

                <div class="form-group">
                    <input required type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan">
                </div>   
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Naikan Level</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


    <script type="text/javascript">



        function level(kode_pengajaran, kode_siswa)
        {

            document.getElementById("kode_pengajaran").value = kode_pengajaran;
            document.getElementById("kode_siswa").value = kode_siswa;
            var id = id;
            var url = "/guru/level_pengajaran/proses_level_pengajaran";
            $("#levelForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#levelForm").submit();
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/guru/level_pengajaran/log_level_pengajaran.blade.php ENDPATH**/ ?>