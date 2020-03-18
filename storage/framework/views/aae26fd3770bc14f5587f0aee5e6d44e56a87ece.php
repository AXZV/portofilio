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
                fixedColumns:
                {
                    leftColumns: 3,
                    rightColumns:1
                },
                   
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
        <?php if($errors->has('kode')): ?>
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

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Instansi
                        </h2>
                        <div class="panel-toolbar">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#adddata"><span style="color:white;">Add Data</span></a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100" style="width:100%">
                                <thead class="thead-dark">
                                    <tr style="text-align:center; width:1px; white-space:nowrap;">
                                        <th>No</th>
                                        <th>Kode Instansi</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Email</th>
                                        <th>Email</th>
                                        <th>Email</th>
                                        <th>Email</th>
                                        <th>Email</th>
                                        <th>Status Pusat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    <?php $__currentLoopData = $instansi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="width:1px; white-space:nowrap;">
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> <?php echo e($i->kode); ?></td>
                                        <td> <?php echo e($i->nama); ?></td>
                                        <td> <?php echo e($i->alamat); ?></td>
                                        <td> <?php echo e($i->no_telp); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->email); ?></td>
                                        <td> <?php echo e($i->status_pusat); ?></td>
                                        <td>
                                            <div class="wrapper">
                                                <a href="#" data-toggle="modal" onclick="deleteData(<?php echo e($i->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                                <a href="#" data-toggle="modal" onclick="editData( '<?php echo e($i->id); ?>', '<?php echo e($i->kode); ?>', '<?php echo e($i->nama); ?>', '<?php echo e($i->alamat); ?>', '<?php echo e($i->no_telp); ?>', '<?php echo e($i->email); ?>', '<?php echo e($i->status_pusat); ?>')" data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                            </div>
                                        </td>
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
<!-- /////////////////////////////// Modal Tambah Data /////////////////////////////// -->
        <div class="modal fade bd-example-modal-lg" id="adddata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_instansi" method="POST">
                <?php echo e(csrf_field()); ?>

                <!--Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Instansi</label>
                            <input required value="<?php echo e(old('kode')); ?>" type="text" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Instansi">
                            <?php if($errors->has('kode')): ?>
                                <div class="invalid-feedback d-block"> 
                                    Kode Instansi Tidak Boleh Sama
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nama Instansi</label>
                            <input required value="<?php echo e(old('nama')); ?>" type="text" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama Instansi">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput3">Alamat</label>
                            <input required value="<?php echo e(old('alamat')); ?>" type="text" name="alamat" class="form-control" id="formGroupExampleInput3" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput4">Telepon</label>
                            <input required value="<?php echo e(old('telepon')); ?>" type="text" name="telepon" class="form-control" id="formGroupExampleInput4" placeholder="Telepon">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput5">Email</label>
                            <input required value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control" id="formGroupExampleInput5" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status Kantor</label>
                            <select name="status" id="inputState" class="form-control" required>
                                <option value="" disabled selected>Pilih.....</option>
                                <option value="Pusat" <?php echo e(old('status') == 'Pusat' ? 'selected' : ''); ?>>Kantor Pusat</option>
                                <option value="Cabang" <?php echo e(old('status') == 'Cabang' ? 'selected' : ''); ?>>Kantor Cabang</option>
                            </select>
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
            var url = "/admin/hapus_instansi/"+id;
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
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editForm" method="POST">
            <?php echo e(csrf_field()); ?>

            <!--Body-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="form0x" class="form-control">

                    <!-- <div class="form-group">
                        <label for="formGroupExampleInput">Kode Instansi</label>
                        <input required type="text" id="form1x" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Instansi">
                    </div> -->

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama Instansi</label>
                        <input required type="text" id="form2x" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama Instansi">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Alamat</label>
                        <input required type="text" id="form3x" name="alamat" class="form-control" id="formGroupExampleInput3" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput4">Telepon</label>
                        <input required type="text" id="form4x" name="telepon" class="form-control" id="formGroupExampleInput4" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput5">Email</label>
                        <input required type="email" id="form5x" name="email" class="form-control" id="formGroupExampleInput5" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status Kantor</label>
                        <select name="status" id="form6x" class="form-control" required>
                            <option value="Pusat">Kantor Pusat</option>
                            <option value="Cabang">Kantor Cabang</option>
                        </select>
                    </div>

                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" onclick="formSubmit2()" class="btn btn-primary btn-sm" >Simpan</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
                </div>
                
            </form>

        </div>
    </div>
    </div>


    <script type="text/javascript">



        function editData(id, kode, nama, alamat, no_telp, email, status_pusat)
        {
            document.getElementById("form0x").value = id;
            // document.getElementById("form1x").value = kode;
            document.getElementById("form2x").value = nama;
            document.getElementById("form3x").value = alamat;
            document.getElementById("form4x").value = no_telp;
            document.getElementById("form5x").value = email;
            document.getElementById("form6x").value = status_pusat;

            var id = id;
            var url = "/admin/edit_instansi/"+id;
            $("#editForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#editForm").submit();
        }

    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/instansi/instansi.blade.php ENDPATH**/ ?>