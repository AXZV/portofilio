<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script>
    $(document).ready(function()
    {   
        $('#dt-basic-example').dataTable(
        {
            scrollY: 500,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
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
<!-- ///////////////////////////////////////////////////////////////////////// -->
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fas fa-microscope'></i> Pengajaran <span class='font-weight-light font-italic'>#<?php echo e($pengajaran[0]->kode); ?></span>
            </h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Guru
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Nomor Identitas</div>
                                        <div class="col font-weight-bold">Nama</div>
                                        <div class="col font-weight-bold">Instansi</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->guru->no_identitas); ?> </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->guru->nama_depan); ?> <?php echo e($pengajaran[0]->guru_kelas->guru->nama_belakang); ?> </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->guru->instansi->nama); ?> </h3></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Nomor Telepon</div>
                                        <div class="col font-weight-bold">Alamat Email</div>
                                        <div class="col font-weight-bold">Status</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->guru->no_telp); ?> </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->guru->email); ?> </h3></div>
                                        <div class="col">
                                            <h3 class="display-5 font-weight-light"> 
                                                <?php if($pengajaran[0]->guru_kelas->guru->status_aktif == 'Aktif'): ?>
                                                    <span class="badge badge-success">Aktif</span> 
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                <?php endif; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Kelas
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="row mb-2">
                                        <div class="col font-weight-bold">Kode Kelas</div>
                                        <div class="col font-weight-bold">Nama</div>
                                        <div class="col font-weight-bold">Pelajaran</div>
                                        <div class="w-100"></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->kelas->kode); ?> </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->kelas->nama); ?> </h3></div>
                                        <div class="col"><h3 class="display-5 font-weight-light"> <?php echo e($pengajaran[0]->guru_kelas->kelas->pelajaran->nama); ?> </h3></div>
                                    </div>
                                </div>
                            </div>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Data Siswa
                        </h2>
                        <div class="panel-toolbar">
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="thead-dark">
                                <tr style="text-align:center; width:1px; white-space:nowrap;">
                                        <th>No</th>
                                        <th>Nomor Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Instansi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    <?php $__currentLoopData = $pengajaran[0]->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="width:1px; white-space:nowrap;">
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> <?php echo e($s->no_daftar); ?> </td>
                                        <td> <?php echo e($s->nama_depan); ?> <?php echo e($s->nama_belakang); ?></td>
                                        <td> <?php echo e($s->jenis_kelamin); ?></td>
                                        <td> <?php echo e($s->alamat); ?></td>
                                        <td> <?php echo e($s->instansi->nama); ?></td>
                                        <td style="text-align:center"> 
                                            <?php if( $s->status_aktif == 'Aktif'): ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                                </tbody>
                            </table>
                            <!-- conten end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?php echo e(asset('js/multiselect_edit.min.js')); ?>"></script>
    <script>
        jQuery(document).ready(function($){
            $('#undo_redo1').multiselect1();
        });
    </script>

    <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script>
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        jQuery(document).ready(function($){
            $('#tanggal_selesai1').datepicker(
            {
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                templates: controls
            });
        })
    </script>

    <script>          
        document.getElementById('status_selesai').addEventListener('change', function() {
            if(this.value == 'Selesai')
            {
                $("#tanggal_selesai").attr('required', '');
            }
            else
            {
                $("#tanggal_selesai").removeAttr('required');
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/pengajaran/detail_pengajaran.blade.php ENDPATH**/ ?>