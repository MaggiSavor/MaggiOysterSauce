@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>
		 
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="../assets/images/title.png" style="width: 100%;" alt="...">
		      <div class="carousel-caption">
		      	<!-- <h3>Caption Text</h3> -->
		      </div>
		    </div>
		    <div class="item">
		      <img src="../assets/images/mission.png" style="width: 100%;" alt="...">
		      <div class="carousel-caption">
		      	<!-- <h3>Caption Text</h3> -->
		      </div>
		    </div>
		    <div class="item">
		      <img src="../assets/images/vision.png" style="width: 100%;" alt="...">
		      <div class="carousel-caption">
		      	<!-- <h3>Caption Text</h3> -->
		      </div>
		    </div>
		  </div>
		 
		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div> <!-- Carousel -->

    </div>
</div>
@endsection
