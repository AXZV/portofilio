<!-- Menghubungkan dengan view template master -->


<?php $__env->startSection('content'); ?>

<!-- ////////////////////////////////////  SLIDER  //////////////////////////////////////////// -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/slider_img/<?php echo e($img_slider1->img); ?>" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p><?php echo e($img_slider1->caption); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider_img/<?php echo e($img_slider2->img); ?>" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p> <?php echo e($img_slider2 -> caption); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider_img/<?php echo e($img_slider3->img); ?>" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p> <?php echo e($img_slider3 -> caption); ?></p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
	<!-- ////////////////////////////////////  END SLIDER  //////////////////////////////////////////// -->
    <section class="background-color-2 mb-4">
        <div class="container py-5">
            <div class="heading text-center ">
				<h2 class="font-weight-bold">Layanan Kami</h2>
				<hr>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-4 col-sm-12">
                    <!-- Card Wider -->
                        <div class="card card-cascade wider">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img  class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg" alt="Card image cap">
                            <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                            <!-- Title -->
                            <h4 class="card-title"><strong>Alison Belmont</strong></h4>
                            <!-- Subtitle -->
                            <h5 class="blue-text pb-2"><strong>Graffiti Artist</strong></h5>
                            <!-- Text -->
                            <p class="card-text">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totam rem aperiam. </p>

                            <!-- Linkedin -->
                            <a class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Twitter -->
                            <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                            <!-- Dribbble -->
                            <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>

                        </div>

                        </div>
                    <!-- Card Wider -->
                </div>
            </div>
        </div>
    </section>

	<section class="background-color-2">
		<div class="container py-5">
			<div class="heading text-center mb-5">
				<h2 class="font-weight-bold">Mengapa Memilih Kami?</h2>
				<hr>
			</div>
			<div class="row text-center">
				<div class="col-md-4 col-sm-12">
					<i style="font-size: 5rem" class="fas fa-user-shield font-color mb-1"></i>
					<h4 class="font-weight-bold font-color">Keamanan</h4>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur sunt in culpa qui officia.</p>
				</div>
				<div class="col-md-4 col-sm-12">
					<i style="font-size: 5rem" class="fas fa-shipping-fast font-color mb-1"></i>
					<h4 class="font-weight-bold font-color">Layanan</h4>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div class="col-md-4 col-sm-12">
					<i style="font-size: 5rem" class="fas fa-money-check-alt font-color mb-1"></i>
					<h4 class="font-weight-bold font-color">Kemudahan</h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>
		</div>
    </section>

    



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_04\laravelx2\resources\views/dasboard.blade.php ENDPATH**/ ?>