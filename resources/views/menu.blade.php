@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Tasty Burger Restaurants Category Bootstrap Responsive Web Template | Menu :: W3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Tasty Burger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link
		href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
		rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	
	<!-- page details -->
	<div class="breadcrumb-agile bg-light py-2">
		<ol class="breadcrumb bg-light m-0">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Menu</li>
		</ol>
	</div>
	<!-- //page details -->

    <!-- banner -->
    <div class="main-banner-2">

    </div>
    <!-- //banner -->

	<!-- menu -->
	<section class="portfolio py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-section text-center mb-md-5 mb-4">
				<h3 class="w3ls-title mb-3">Nuestro <span>Menu</span></h3>
				<p class="titile-para-text mx-auto">Inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo.Nemo
					enim totam rem aperiam.</p>
			</div>
			<div class="row mt-4">
				<div class="col-md-4">
					<div class="gallery-demo">
						<a href="#gal1">
							<img src="images/blog1.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">French Burger - <span>$22</span></h4>
						</a>
					</div>
				</div>
				<div class="col-md-4 mt-md-0 mt-4">
					<div class="gallery-demo">
						<a href="#gal2">
							<img src="images/blog2.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">Veg Muffin - <span>$16</span></h4>
						</a>
					</div>
				</div>
				<div class="col-md-4 mt-md-0 mt-4">
					<div class="gallery-demo">
						<a href="#gal3">
							<img src="images/blog3.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">Brioche - <span>$18</span></h4>
						</a>
					</div>
				</div>
			</div>
			<div class="row mt-md-5">
				<div class="col-md-4 mt-md-0 mt-4">
					<div class="gallery-demo">
						<a href="#gal4">
							<img src="images/g1.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">Cheese Burger - <span>$20</span></h4>
						</a>
					</div>
				</div>
				<div class="col-md-4 mt-md-0 mt-4">
					<div class="gallery-demo">
						<a href="#gal5">
							<img src="images/g2.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">Chicken Burger - <span>$22</span></h4>
						</a>
					</div>
				</div>
				<div class="col-md-4 mt-md-0 mt-4">
					<div class="gallery-demo">
						<a href="#gal6">
							<img src="images/g3.jpg" alt=" " class="img-fluid" />
							<h4 class="p-mask">Veg Burger - <span>$16</span></h4>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- gallery model-->
	<!-- gallery popup 1 -->
	<div id="gal1" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/blog1.jpg" alt="">
			<h4 class="p-mask">French Burger - - <span>$22</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 1 -->
	<!-- gallery popup 2 -->
	<div id="gal2" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/blog2.jpg" alt="">
			<h4 class="p-mask">Veg Muffin - <span>$16</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 2 -->
	<!-- gallery popup 3 -->
	<div id="gal3" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/blog3.jpg" alt="">
			<h4 class="p-mask">Brioche - <span>$18</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 3 -->
	<!-- gallery popup 4 -->
	<div id="gal4" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/g1.jpg" alt="">
			<h4 class="p-mask">Cheese Burger - <span>$20</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 4 -->
	<!-- gallery popup 5 -->
	<div id="gal5" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/g2.jpg" alt="">
			<h4 class="p-mask">Chicken Burger - <span>$22</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 5 -->
	<!-- gallery popup 6 -->
	<div id="gal6" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="images/g3.jpg" alt="">
			<h4 class="p-mask">Veg Burger - <span>$16</span></h4>
			<a href="login.html" class="button-w3ls active mt-3">Order Now
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">??</a>
		</div>
	</div>
	<!-- //gallery popup 6 -->
	<!-- //menu -->


</body>

</html>
@endsection