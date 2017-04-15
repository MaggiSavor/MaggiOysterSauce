
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex,follow" />
	<title>Home Page</title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,600,500,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="../assets/css/reset.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">

	<style>
		div.carousel-inner img {
			margin: auto;
			}
		a.list-group-item {
			height:auto;
			min-height:220px;
		}
		a.list-group-item.active small {
			color:#e3ecfd;
		}
		.stars {
			margin:20px auto 1px;    
		}
		#brgycarousel {
			height: auto;
			weight: 100px;
		}
		
		a{ 
			color:white;
			font-family:"Georgia, serif";
		}
		body {
			background-image: url("{!! asset('assets/images/bglogo.jpg')!!}");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat; 
			background-attachment: fixed;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	@include('admin.header')
	<div id="container">
		<div id="canvas">
			@include('admin.hamburger')
			<br>
			<br>
			<div class="container-fluid">
			<div class="carousel-inner img ">	
			<div id="brgycarousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#brgycarousel" data-slide-to="0" class="active"></li>
						<li data-target="##brgycarousel" data-slide-to="1"></li>
						<li data-target="##brgycarousel" data-slide-to="2"></li>
					</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img src="../assets/images/title.png" alt="a" class ="img-responsive">
					</div>	
					<div class="item">
						<img src="../assets/images/mission.png" alt="b" class ="img-responsive">
					</div>
					<div class="item">
						<img src="../assets/images/vision.png" alt="c" class ="img-responsive">
				</div>
				<a class="carousel-control left" href="#brgycarousel" data-slide="prev">
					<span class="icon-prev"> </span>
				</a>
				<a class="carousel-control right" href="#brgycarousel" data-slide="next">
					<span class="icon-next"></span>
				</a>
			</div>
			</div>
			</div>
			<!--  -->
			<br>
			<br>
		</div><!-- /.canvas -->
	</div>
</div>
		<div id="footer">
				<br><p align="center">&copy; <?php echo date("Y");?> All Rights Reserved</p>
			</div>
	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../assets/js/jquery-1.11.3.min"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/myJs.js"></script>
	
	<script>
		function view(get) {
			window.location.href = "BDetails.php?id=" + get;
		}
		
	</script>
</body>
</html>