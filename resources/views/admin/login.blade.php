<?php
  use App\Models\Users;
?>
<!doctype html>    
<html>
<head>
	<title> LOGIN PAGE </title>
	<link href="{!! asset('assets/css/bootstrap-theme.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/css/bootstrap.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
	<script src="{!! asset('assets/sweetalert-master/dist/sweetalert.min.js') !!}"></script>
	<link rel="stylesheet" href="{!! asset('assets/sweetalert-master/dist/sweetalert.css') !!}">
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
		@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

		body {
			margin: 0;
			padding: 0;
			background: #fff;
			color: #fff;
		}

		.back-image {
			position: absolute;
			top:0;
			left:0;
			bottom:0;
			right:0;
			width: auto;
			height: auto;
			background: url("{!! asset('assets/images/loginbg.jpg')!!}") center no-repeat;
			background-size: cover;
			-moz-filter: blur(5px);
			-webkit-filter: blur(5px);
			-ms-filter: blur(5px);
			filter: blur(5px);
			z-index: 0;
		}

		.back-gradient {
			position: absolute;
			top:0;
			left:0;
			bottom:0;
			right:0;
			width: auto;
			height: auto;
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.3)), color-stop(100%,rgba(0,0,0,0.83)));
			background: -moz-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.3)), color-stop(100%,rgba(0,0,0,0.83)));
			background: gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.3)), color-stop(100%,rgba(0,0,0,0.9)));
			z-index: 0;
			opacity: 0.7;
		}
		.login {
			position: absolute;
			text-align: center;
			top: 50%;
			left: 50%;
			transform:translate(-50%,-50%);
			width: 300px;
			padding: 10px;
			z-index: 2;
		}
		.login h2 {
			margin-bottom: 17px;
			text-align: center;
			color: #fff;
			font-family: 'Exo', sans-serif;
			font-size: 35px;
			font-weight: 200;
			letter-spacing: 0.15em;
		}
		.login input {
			display: block;
			margin-bottom: 13px;
		}
		.login input[type=text],.login input[type=password] {
			padding: 4px;
			padding-left: 7px;
			width: 280px;
			height: 32px;
			background: transparent;
			border: 1px solid rgba(255,255,255,0.6);
			border-radius: 2px;
			color: #fff;
			font-family: 'Exo', sans-serif;
			font-size: 15px;
			font-weight: 400;
		}
		.login input[type=button] {
			box-sizing:border-box;
			padding: 5px;
			width: 300px;
			height: 35px;
			background: #fff;
			border: 1px solid #fff;
			border-radius: 2px;
			color: #151719;
			font-family: 'Exo', sans-serif;
			font-size: 17px;
			font-weight: 400;
			cursor: pointer;
		}
		.login input[type=button]:hover {
			opacity: 0.8;
		}
		.login input[type=button]:active {
			opacity: 0.6;
		}
		.login input[type=text]:focus,.login input[type=password]:focus {
			outline: none;
			border: 1px solid rgba(255,255,255,0.9);
		}
		.login input[type=button]:focus {
			outline: none;
		}
		::-webkit-input-placeholder {
		   color: rgba(255,255,255,0.6);
		}
		::-moz-input-placeholder {
		   color: rgba(255,255,255,0.6);
		}
	</style>

</head>

<body>
<div class="back-image"></div>
<div class="back-gradient"></div>	
	<div class="container">
        <div id="loginbox" style="margin-top:0%;" class="login">                    
<a href="{{ url('/') }}" style="text-decoration:none"><h2>Barangay 5 Zone 1</h2></a>

                           
	<form id="loginform" class="form-horizontal" role="form" action="{{URL::Route('loggedIn')}}" method="post" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <input id='email' type="text" placeholder="Enter Username" autocomplete="off" name="email" required />
		<input id='login-password' type="password" placeholder="Enter Password" name="login-password" />			

	    <div style="margin-top:10px" class="form-group">
			<!-- Button -->
		<div class="col-sm-12 controls">
		<p style="text-align: center"><button style="width:280px;" type="submit"  class="btn btn-primary"> Login</button></p>
		</div>

		</div> 
		<!-- <p style="text-align: center"><a href="{{ url('/password/reset') }}"><button type="button" class="btn btn-danger"  style="width:280px;">Forgot Password?</button></a></p> -->
		<p style="text-align: center"><a href="{{URL::Route('resetOptions')}}"><button type="button" class="btn btn-danger"  style="width:280px;">Forgot Password?</button></a></p>
	</form>	


@if (Session::has('sweet_alert.alert'))
	<script>
		swal({!! Session::get('sweet_alert.alert') !!});
	</script>
@endif				

</body>
		
</html>
