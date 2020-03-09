<?php $__env->startSection('CSS'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/datagrid/datatables/datatables.bundle.css')); ?>">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="<?php echo e(asset('css/formplugins/select2/select2.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('JS'); ?>

    <script src="<?php echo e(asset('js/datagrid/datatables/datatables.bundle.js')); ?>"></script>
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
                            Produk
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                    <div class="row" style="margin-top:10px;">
                        <div class="col text-center">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#adddata"><span style="color:white;">Add Data</span></a>
                        </div>
                    </div>

                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="thead-dark">
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r=1 ?>
                                    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align:center" ><?php echo $r++ ?></td>
                                        <td> <?php echo e($i->kode); ?></td>
                                        <td> <?php echo e($i->nama); ?></td>
                                        <td> <?php echo e($i->harga); ?></td>
                                        <td> <?php echo e($i->kategori); ?></td>
                                        <td> <?php echo e($i->stok_awal); ?></td>
                                        <td style="text-align:center">  
                                            <a href="#" data-toggle="modal" onclick="deleteData(<?php echo e($i->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                                            <a href="#" data-toggle="modal" onclick="editData( '<?php echo e($i->id); ?>', '<?php echo e($i->kode); ?>', '<?php echo e($i->nama); ?>', '<?php echo e($i->harga); ?>', '<?php echo e($i->kategori); ?>', '<?php echo e($i->stok_awal); ?>')" data-target="#editdata" class="btn btn-sm btn-primary"> Edit</a>
                                        </td>
                                    </tr>                                              
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="thead-dark">
                                    <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                    </tr>
                                </tfoot>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/tambah_produk" method="POST">
                <?php echo e(csrf_field()); ?>

                <!--Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Produk</label>
                            <input required value="<?php echo e(old('kode')); ?>" type="text" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Produk">
                            <?php if($errors->has('kode')): ?>
                                <div class="invalid-feedback d-block"> 
                                    Kode Produk Tidak Boleh Sama
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input required value="<?php echo e(old('nama')); ?>" type="text" name="nama" class="form-control" id="nama" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input required value="<?php echo e(old('harga')); ?>" type="number" name="harga" class="form-control" id="harga" placeholder="Harga">
                        </div> 
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input required value="<?php echo e(old('kategori')); ?>" type="number" name="kategori" class="form-control" id="kategori" placeholder="Kategori">
                        </div> 
                        <div class="form-group">
                            <label for="stok_awal">Stok Awal</label>
                            <input required value="<?php echo e(old('stok_awal')); ?>" type="number" name="stok_awal" class="form-control" id="stok_awal" placeholder="Stok Awal">
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
            var url = "/admin/hapus_produk/"+id;
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
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Produk</h5>
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
                        <label for="formGroupExampleInput">Kode Produk</label>
                        <input required type="text" id="form1x" name="kode" class="form-control" id="formGroupExampleInput" placeholder="Kode Produk">
                    </div> -->

                <div class="form-group">
                    <label for="nama1">Nama Produk</label>
                    <input required type="text" name="nama" class="form-control" id="nama1" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label for="harga1">Harga</label>
                    <input required type="number" name="harga" class="form-control" id="harga1" placeholder="Harga">
                </div> 
                <div class="form-group">
                    <label for="kategori1">Kategori</label>
                    <input required type="number" name="kategori" class="form-control" id="kategori1" placeholder="Kategori">
                </div> 
                <div class="form-group">
                    <label for="stok_awal1">Stok Awal</label>
                    <input required type="number" name="stok_awal" class="form-control" id="stok_awal1" placeholder="Stok Awal">
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



        function editData(id, kode, nama ,harga, kategori, stok_awal)
        {
            document.getElementById("form0x").value = id;
            // document.getElementById("form1x").value = kode;
            document.getElementById("nama1").value = nama;
            document.getElementById("harga1").value = harga;
            document.getElementById("kategori1").value = kategori;
            document.getElementById("stok_awal1").value = stok_awal;
            var id = id;
            var url = "/admin/edit_produk/"+id;
            $("#editForm").attr('action', url);
        }

        function formSubmit2()
        {
            $("#editForm").submit();
        }

    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_05\laravel Fix auth crud_2\resources\views/admin/produk.blade.php ENDPATH**/ ?>