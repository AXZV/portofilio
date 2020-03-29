<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('js/formplugins/select2/select2.bundle.js')); ?>"></script>
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

    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesadd" role="alert">
    <div class="d-flex align-items-center">
        <div class="alert-icon">
            <i class="fal fa-shield-check text-warning"></i>
        </div>
        <div class="flex-1">
            <span class="h5">Sukses Tambah Data</span>  
        </div>
    </div>
    </div>

    <div class="alert bg-fusion-400 border-0 fade" style="display:none;" id="suksesdel" role="alert">
    <div class="d-flex align-items-center">
        <div class="alert-icon">
            <i class="fal fa-trash text-warning"></i>
        </div>
        <div class="flex-1">
            <span class="h5">Sukses Hapus data</span>  
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
    <?php if(session()->has('successadd')): ?>
    <script>
        $("#suksesadd").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesadd").slideUp(900);
        });
    </script>
    <?php endif; ?>
    <?php if(session()->has('successdelete')): ?>
    <script>
        $("#suksesdel").fadeTo(5000, 900).slideUp(900, function(){
            $("#suksesdel").slideUp(900);
        });
    </script>
    <?php endif; ?>
<!-- /////////////////////////////// Error Code /////////////////////////////// -->
    <?php if($errors->any()): ?>
        <?php if($errors->has('no_daftar') || $errors->has('username') || $errors->has('password')): ?>
        <script>
            $(document).ready(function(){
                $('#adddata').modal({show: true});
            });
        </script>
        <?php endif; ?>
        <?php if($errors->has('kode2')): ?>
            <!-- ////ERROREDIT -->
        <?php endif; ?>
    <?php endif; ?>

<!-- ///////////////////////////////////////////////////////////////////////// -->
    <ol class="breadcrumb page-breadcrumb ">
    <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item active">Daftar Siswa</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Siswa
                        </h2>
                        <div class="panel-toolbar">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#adddata"><span style="color:white;">Add Data</span></a>   
                        </div>
                    </div>
                    <div class="panel-container show">

                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="thead-dark">
                                    <tr style="text-align:center; width:1px; white-space:nowrap;">
                                        <th>No</th>
                                        <th>Nomor Daftar</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Status Siswa</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Lulus</th>
                                        <th>Status Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="width:1px; white-space:nowrap;">
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> <?php echo e($i->no_daftar); ?></td>
                                        <td> <?php echo e($i->nama_depan); ?><span> <span><?php echo e($i->nama_belakang); ?></td>
                                        <td> <?php echo e($i->tanggal_lahir); ?></td>
                                        <td> <?php echo e($i->tempat_lahir); ?></td>
                                        <td> <?php echo e($i->jenis_kelamin); ?></td>
                                        <td> <?php echo e($i->agama); ?></td>
                                        <td> <?php echo e($i->alamat); ?></td>
                                        <td> <?php echo e($i->no_telp); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td style="text-align:center">
                                            <?php if($i->status_aktif == 'Aktif'): ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td> <?php echo e($i->tanggal_masuk); ?></td>
                                        <td style="text-align:center">
                                            <?php if($i->status_aktif == 'Aktif'): ?>
                                                ~
                                            <?php else: ?>
                                                <?php echo e($i->tanggal_lulus); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($i->status_bayar == 'Bayar'): ?>
                                                <span class="badge badge-success">Lunas</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Belum Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($i->status_bayar == 'Bayar'): ?>
                                                <?php echo e($i->jumlah_bayar); ?>

                                            <?php else: ?>
                                                ~
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php if($i->status_bayar == 'Bayar'): ?>
                                                <?php echo e($i->tanggal_bayar); ?>

                                            <?php else: ?>
                                                ~
                                            <?php endif; ?>
                                        </td>
                                        <td> <?php echo e($i->instansi->nama); ?></td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData(<?php echo e($i->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <a href="#" data-toggle="modal" 
                                            onclick="editData( 
                                                '<?php echo e($i->id); ?>',
                                                '<?php echo e($i->no_daftar); ?>',
                                                '<?php echo e($i->nama_depan); ?>', 
                                                '<?php echo e($i->nama_belakang); ?>',
                                                '<?php echo e($i->tanggal_lahir); ?>',
                                                '<?php echo e($i->tempat_lahir); ?>',
                                                '<?php echo e($i->jenis_kelamin); ?>',
                                                '<?php echo e($i->agama); ?>',
                                                '<?php echo e($i->alamat); ?>',
                                                '<?php echo e($i->no_telp); ?>',
                                                '<?php echo e($i->email); ?>',
                                                '<?php echo e($i->tanggal_masuk); ?>',
                                                '<?php echo e($i->tanggal_lulus); ?>',
                                                '<?php echo e($i->status_aktif); ?>',
                                                '<?php echo e($i->status_bayar); ?>',
                                                '<?php echo e($i->jumlah_bayar); ?>',
                                                '<?php echo e($i->tanggal_bayar); ?>',
                                                '<?php echo e($i->instansi->kode); ?>',)"
                                            data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- ///////////////////////////////////////////////////////////////////////// -->  
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- ///////////////////////////////////////////////////////////////////////// --
<!-- /////////////////////////////// Modal Tambah Data /////////////////////////////// -->
        <div class="modal fade bd-example-modal-lg" id="adddata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_siswa" method="POST">
                <?php echo e(csrf_field()); ?>

                <!--Body-->
                
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_daftar">Nomor Daftar</label>
                            <input required type="text" value="<?php echo e(old('no_daftar')); ?>" name="no_daftar" class="form-control" id="no_daftar" placeholder="Nomor Identitas">
                            <?php if($errors->has('no_daftar')): ?>
                                <div class="invalid-feedback d-block"> 
                                    Nomor Pendaftaran Sudah Terdaftar
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input required value="<?php echo e(old('nama_depan')); ?>" type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" value="<?php echo e(old('nama_belakang')); ?>" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Nama Belakang">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input required value="<?php echo e(old('tempat_lahir')); ?>" type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-alt"></i>
                                            </span>
                                            <input required  type="text" autocomplete="off" value="<?php echo e(old('tanggal_lahir')); ?>" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="L" <?php echo e(old('jenis_kelamin') == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                                        <option value="P" <?php echo e(old('jenis_kelamin') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="agama">Agama <span class="text-white">xxxxxxxxx</span> </label>
                                    <input required value="<?php echo e(old('agama')); ?>" type="text" name="agama" class="form-control" id="agama" placeholder="Agama">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input required value="<?php echo e(old('alamat')); ?>" type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                                    <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_telp">Telepon</label>
                                    <input required value="<?php echo e(old('no_telp')); ?>" type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required value="<?php echo e(old('email')); ?>" type="text" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="status_aktif">Status <span class="text-white">xxxxxxxxx</span> </label>
                                    <select name="status_aktif" id="status_aktif" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>
                                        <option value="Aktif" <?php echo e(old('status_aktif') == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php echo e(old('status_aktif') == 'Tidak Aktif' ? 'selected' : ''); ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="">Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-alt"></i>
                                            </span>
                                            <input required  type="text" autocomplete="off" value="<?php echo e(old('tanggal_masuk')); ?>" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Tanggal Masuk">
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="">Tanggal Lulus</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-alt"></i>
                                            </span>
                                            <input type="text" autocomplete="off" value="<?php echo e(old('tanggal_lulus')); ?>" name="tanggal_lulus" class="form-control" id="tanggal_lulus" placeholder="Tanggal Lulus">
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="kode_instansi">Instansi <span class="text-white">xxxxxxxxx</span> </label>
                                    <select name="kode_instansi" id="kode_instansi" class="form-control" required>
                                        <option value="" disabled selected>Pilih.....</option>                                       
                                        <?php $__currentLoopData = $instansi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ins->kode); ?>" <?php echo e((old("kode_instansi") == $ins->kode ? "selected":"")); ?> ><?php echo e($ins->kode); ?> - <?php echo e($ins->nama); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_bayar">Status Bayar</label>
                            <select name="status_bayar" id="status_bayar" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Bayar" <?php echo e(old('status_bayar') == 'Bayar' ? 'selected' : ''); ?>>Lunas</option>
                                <option value="Belum Bayar" <?php echo e(old('status_bayar') == 'Belum Bayar' ? 'selected' : ''); ?>>Belum Bayar</option>
                            </select>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jumlah_bayar">Jumlah Bayar</label>
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                            <input value="<?php echo e(old('jumlah_bayar')); ?>" type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Jumlah Bayar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="">Tanggal Bayar</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-alt"></i>
                                            </span>
                                            <input type="text" autocomplete="off" value="<?php echo e(old('tanggal_bayar')); ?>" name="tanggal_bayar" class="form-control" id="tanggal_bayar" placeholder="Tanggal Bayar">
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="username">Nama Pengguna</label>
                                    <input required value="<?php echo e(old('username')); ?>" type="text" name="username" class="form-control" id="username" placeholder="Username">
                                    <small id="username" class="form-text text-muted">Berisi antara 3-12 karakter tanpa spasi</small>
                                    <?php if($errors->has('username')): ?>
                                        <div class="invalid-feedback d-block"> 
                                            Username sudah terdaftar atau tidak sesuai aturan
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input required value="<?php echo e(old('password')); ?>" type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    <small id="passwordHelp" class="form-text text-muted">Minimal 8 karakter tanpa spasi</small>
                                    <input type="checkbox" onclick="showpass()">Tampilkan Password
                                    <?php if($errors->has('password')): ?>
                                        <div class="invalid-feedback d-block"> 
                                            Password tidak sesuai aturan
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" value="Simpan Data">Simpan</button>
                    </div>
                    
                </form>

            </div>
        </div>
        </div>

        <script>          
            document.getElementById('status_aktif').addEventListener('change', function() {
                if(this.value == 'Tidak Aktif')
                {
                    $("#tanggal_lulus").attr('required', '');
                }
                else
                {
                    $("#tanggal_lulus").removeAttr('required');
                }
            });
        </script>

        <script>
            document.getElementById('status_bayar').addEventListener('change', function() {
                if(this.value == 'Bayar')
                {
                    $("#jumlah_bayar").attr('required', '');
                    $("#tanggal_bayar").attr('required', '');
                }
                else
                {
                    $("#jumlah_bayar").removeAttr('required');
                    $("#tanggal_bayar").removeAttr('required');
                }
            });
        </script>

        <script>
            function showpass() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            
        </script>
        <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
        <script>
            var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
            jQuery(document).ready(function($){
                // enable clear button 
                $('#tanggal_lahir').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_masuk').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_lulus').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_bayar').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
            })
        </script>

<!-- /////////////////////////////// Modal Hapus Data /////////////////////////////// -->

   <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <form action="" id="deleteForm" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
        <p class="heading lead">Konfirmasi hapus data </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
        </div>

        <!--Body-->
        <div class="modal-body">
        <div class="text-center">
        <!-- <i class="fas fa-trash-alt"></i> -->
            <i class="fal fa-trash fa-6x mb-3"></i>
            <p>Apakah anda yakin akan menghapus data</p>
            <h2><span class="badge"></span></h2>
        </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
        </div>

    </div>
    </form>
    <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Danger-->


    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = "/admin/hapus_siswa/"+id;
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>


<!-- /////////////////////////////// Modal Edit Data /////////////////////////////// -->

    <div class="modal fade bd-example-modal-lg" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editForm" method="POST">
            <?php echo e(csrf_field()); ?>

            <!--Body-->
                <input type="hidden" name="id" id="form0x" class="form-control">
                <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input required type="text" name="nama_depan" class="form-control" id="nama_depan1" placeholder="Nama Depan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang1" placeholder="Nama Belakang">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir1" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="">Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                    <input required  type="text" autocomplete="off" name="tanggal_lahir" class="form-control" id="tanggal_lahir1" placeholder="Tanggal Lahir">
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="agama">Agama <span class="text-white">xxxxxxxxx</span> </label>
                            <input required type="text" name="agama" class="form-control" id="agama1" placeholder="Agama">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input required type="text" name="alamat" class="form-control" id="alamat1" placeholder="Alamat">
                            <small id="alamatHelp" class="form-text text-muted">Alamat Sesuai KTP</small>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_telp">Telepon</label>
                            <input required type="text" name="no_telp" class="form-control" id="no_telp1" placeholder="Telepon">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="text" name="email" class="form-control" id="email1" placeholder="Email">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="status_aktif">Status <span class="text-white">xxxxxxxxx</span> </label>
                            <select name="status_aktif" id="status_aktif1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="">Tanggal Masuk</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                    <input required  type="text" autocomplete="off" name="tanggal_masuk" class="form-control" id="tanggal_masuk1" placeholder="Tanggal Masuk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="">Tanggal Lulus</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" autocomplete="off" name="tanggal_lulus" class="form-control" id="tanggal_lulus1" placeholder="Tanggal Lulus">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="kode_instansi">Instansi <span class="text-white">xxxxxxxxx</span> </label>
                            <select name="kode_instansi" id="kode_instansi1" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>                                       
                                <?php $__currentLoopData = $instansi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ins->kode); ?>"><?php echo e($ins->kode); ?> - <?php echo e($ins->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status_bayar">Status Bayar</label>
                    <select name="status_bayar" id="status_bayar1" class="form-control" required>
                        <option value="" disabled selected>Pilih.....</option>
                        <option value="Bayar">Lunas</option>
                        <option value="Belum Bayar">Belum Bayar</option>
                    </select>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <div class="input-group" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar1" placeholder="Jumlah Bayar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Tanggal Bayar</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" autocomplete="off" name="tanggal_bayar" class="form-control" id="tanggal_bayar1" placeholder="Tanggal Bayar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


        <script type="text/javascript">
            function editData(id, no_identitas, nama_depan, nama_belakang, tanggal_lahir, tempat_lahir, jenis_kelamin, agama, alamat, no_telp, email, tanggal_masuk, tanggal_lulus, status_aktif, status_bayar, jumlah_bayar, tanggal_bayar, kode_instansi)
            {   
                console.log("rrrr", tanggal_bayar);
                document.getElementById("form0x").value = id;
                // document.getElementById("no_daftar1").value = no_identitas;
                document.getElementById("nama_depan1").value = nama_depan;
                document.getElementById("nama_belakang1").value = nama_belakang;
                document.getElementById("tanggal_lahir1").value = tanggal_lahir;
                document.getElementById("tempat_lahir1").value = tempat_lahir;
                document.getElementById("jenis_kelamin1").value = jenis_kelamin;
                document.getElementById("agama1").value = agama;
                document.getElementById("alamat1").value = alamat;
                document.getElementById("no_telp1").value = no_telp;
                document.getElementById("email1").value = email;
                document.getElementById("tanggal_masuk1").value = tanggal_masuk;
                document.getElementById("tanggal_lulus1").value = tanggal_lulus;
                document.getElementById("status_aktif1").value = status_aktif;
                document.getElementById("status_bayar1").value = status_bayar;
                document.getElementById("jumlah_bayar1").value = jumlah_bayar;
                document.getElementById("tanggal_bayar1").value = tanggal_bayar;
                document.getElementById("kode_instansi1").value = kode_instansi;


                var id = id;
                var url = "/admin/edit_siswa/"+id;
                $("#editForm").attr('action', url);
            }
        </script>
        <script>          
            document.getElementById('status_aktif1').addEventListener('change', function() {
                if(this.value == 'Tidak Aktif')
                {
                    $("#tanggal_lulus1").attr('required', '');
                }
                else
                {
                    $("#tanggal_lulus1").removeAttr('required');
                }
            });
        </script>

        <script>
            document.getElementById('status_bayar1').addEventListener('change', function() {
                if(this.value == 'Bayar')
                {
                    $("#jumlah_bayar1").attr('required', '');
                    $("#tanggal_bayar1").attr('required', '');
                }
                else
                {
                    $("#jumlah_bayar1").removeAttr('required');
                    $("#tanggal_bayar1").removeAttr('required');
                }
            });
        </script>

        <script src="<?php echo e(asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
        <script>
            var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
            jQuery(document).ready(function($){
                // enable clear button 
                $('#tanggal_lahir1').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_masuk1').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_lulus1').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
                $('#tanggal_bayar1').datepicker(
                {
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });
            })
        </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/siswa/siswa.blade.php ENDPATH**/ ?>