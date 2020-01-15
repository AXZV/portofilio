<!-- Menghubungkan dengan view template master -->
@extends('layouts.master')

@section('content')
<?php 
// error_reporting(E_ALL ^ E_NOTICE); 
    // echo("<script>console.log('PHP: " . $img_slider1->caption . "');</script>");
    // echo "<script>console.log('" . json_encode($img_slider1) . "');</script>";
?>
<!-- ////////////////////////////////////  SLIDER  //////////////////////////////////////////// -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/slider_img/{{$img_slider1->img}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p>{{$img_slider1->caption}}</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider_img/{{$img_slider2->img}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p> {{$img_slider2 -> caption}}</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider_img/{{$img_slider3->img}}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Media heading</h5> -->
                <p> {{$img_slider3 -> caption}}</p>
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

@endsection