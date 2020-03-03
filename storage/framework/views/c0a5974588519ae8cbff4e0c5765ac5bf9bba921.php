<?php $__env->startSection('content'); ?>
<style>
    .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
    .file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    .file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
    .file-upload .file-select.file-select-disabled{opacity:0.65;}
    .file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
</style>
<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->

    <?php if(session()->has('successuploadimg')): ?>
    <?php  echo 
            "<script> 
                    toastr.success('Sukses update image slider');
            </script>"; ?>
    <?php endif; ?>

    <?php if(session()->has('successupdatecaption')): ?>
    <?php  echo 
            "<script> 
                    toastr.success('Sukses update caption');
            </script>"; ?>
    <?php endif; ?>

<style>
    #image-preview{
        display:none;
        width : 100%;
        height : 300px;
    }
    .imgcard
    {
        height :200px;
        object-fit: cover;
    }
</style>
<div class="container mt-4 text-center">
  <div class="row">
    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm">
        <!-- Card Wider -->
            <div class="card card-cascade wider">
                <div class="view view-cascade overlay">
                    <img  class="card-img-top imgcard" src="/assets/slider_img/<?php echo e($s->img); ?>" alt="Card image cap">
                    <a href="">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body card-body-cascade text-center">
                    <h5 class="pb-2"><strong>Caption</strong></h5>
                    <p class="card-text"><?php echo e($s -> caption); ?></p>
                    <a href="javascript:;" data-toggle="modal" onclick="editimgslider( '<?php echo e($s -> id); ?>')" data-target="#modaleditimg" class="btn btn-info btn-sm"><i class="far fa-image"></i> Edit Image</a>
                    <a href="javascript:;" data-toggle="modal" onclick="editcaption( '<?php echo e($s -> id); ?>', '<?php echo e($s -> caption); ?>')" data-target="#modaleditcaption" class="btn btn-info btn-sm"><i class="far fa-comment-alt"></i> Edit Caption</a>
                </div>
            </div>
        <!-- Card Wider -->
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>


<!-- /////////////////////////////// Modal Edit Caption /////////////////////////////// -->

    <div class="modal fade" id="modaleditcaption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Edit Caption</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <form action="/admin_dasboard/proses_edit_captionslider" id="editForm1" method="post">
        <?php echo e(csrf_field()); ?>

        <!--Body-->
            <div class="modal-body">

                    <input type="hidden" name="id" id="form0x" class="form-control">
                    <div class="md-form mb-5">
                        <textarea name="caption" id="form1x" class="form-control md-textarea" rows="4" autofocus></textarea>
                        <label for="form1x">Caption</label>
                    </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
            </div>
            
        </form>
    </div>
        <!--/.Content-->
    </div>

    </div>

    <script type="text/javascript">
        function editcaption(id, caption)
        {
            document.getElementById("form0x").value = id;
            document.getElementById("form1x").value = caption;
        }
    </script>
<!-- /////////////////////////////// Modal Edit image /////////////////////////////// -->

    <div class="modal fade" id="modaleditimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify" role="document">
            <!--Content-->
            <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Edit Image</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <form action="/admin_dasboard/proses_edit_imgslider" id="editForm" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <!--Body-->
                <div class="modal-body">

                        <input type="hidden" name="id" id="form4x">
                        <div class="md-form mb-5">
                            <img style="object-fit: cover;" id="image-preview" alt="image preview"/>
                            <br/>
                        </div>
                        <div class="file-upload">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Choose File</div>
                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                            <input type="file" name="image" id="chooseFile" onchange="previewImage();">
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
            <!--/.Content-->
        </div>

    </div>




    <script type="text/javascript">
        function editimgslider(id)
        {
            document.getElementById("form4x").value = id;
        }

        function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("chooseFile").files[0]);
        
            oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };


        $('#chooseFile').bind('change', function () {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen..."); 
        }
        else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
        }
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_04\laravel Fix auth crud_2\resources\views//admin/image_slider.blade.php ENDPATH**/ ?>