@extends('layout.master')

@section('title', '| Home')

@section('konten')
	
	<div class="row">
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <div class="carousel-inner">
			    <div class="item active">
			      <img src="{{ asset('images/image1.jpg') }}" alt="Chania" style="width: 100%; height: 450px">
			      <div class="carousel-caption">
			        <h3 class="wow bounceInDown" data-wow-delay="0.5s" data-wow-offset="100" data-wow-iteration="10">Los Angeles</h3>
			        <p class="wow bounceInUp" data-wow-delay="1s" data-wow-offset="100" data-wow-iteration="10">LA is always so much fun!</p>
			      </div>
			    </div>

			    <div class="item">
			      <img src="{{ asset('images/image2.jpg') }}" alt="Chicago" style="width: 100%; height: 450px">
			      <div class="carousel-caption">
			        <h3 class="wow bounceInDown" data-wow-delay="0.5s" data-wow-iteration="10">Chicago</h3>
			        <p class=" wow bounceInUp" data-wow-delay="1s" data-wow-iteration="10">Thank you, Chicago!</p>
			      </div>
			    </div>

			    <div class="item">
			      <img src="{{ asset('images/image2.jpg') }}" alt="New York" style="width: 100%; height: 450px">
			      <div class="carousel-caption">
			        <h3 class="wow bounceInDown" data-wow-delay="0.5s" data-wow-iteration="10">New York</h3>
			        <p class=" wow bounceInUp" data-wow-delay="1s" data-wow-iteration="10">We love the Big Apple!</p>
			      </div>
			    </div>
			  </div>

			  <!-- Wrapper for slides -->

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>

@stop  

