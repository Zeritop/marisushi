@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Maria Sushi</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Maria Sushi Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">
	<!-- css slider -->
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

@if ($message = Session::get('success'))
        <div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
            <p class="mb-0">{{ $message }}</p>
        </div>
@endif

	<!-- banner -->
	<div class="baneer-w3ls">
		<div class="row no-gutters">
			<div class="col-xl-5 col-lg-6">
				<div class="banner-left-w3">
					<div class="container">
						<div class="banner-info_agile_w3ls">
							<h5>Solamente Sushi Fresco</h5>
							<h3 class="text-da mb-4">Sushi <span>Al Momento</span> </h3>
							<p>El sushi lo hacemos en el mismo instante que es pedido, manteniendo su frescura y sabor</p>
							<a href="about" class="button-w3ls active mt-5">Leer Más..
								<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
							</a>
							<a href="menu" class="button-w3ls mt-5 ml-2">Ver Más
								<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-7 col-lg-6 callbacks_container">
				<!-- banner slider -->
				<div class="csslider infinity" id="slider1">
					<input type="radio" name="slides" checked="checked" id="slides_1" />
					<input type="radio" name="slides" id="slides_2" />
					<input type="radio" name="slides" id="slides_3" />
					<ul class="banner_slide_bg">
						<li>
							<div class="banner-top1"></div>
						</li>
						<li>
							<div class="banner-top2"></div>
						</li>
						<li>
							<div class="banner-top3"></div>
						</li>
					</ul>
					<div class="arrows">
						<label for="slides_1"></label>
						<label for="slides_2"></label>
						<label for="slides_3"></label>
					</div>
					<div class="navigation">
						<div>
							<label for="slides_1"></label>
							<label for="slides_2"></label>
							<label for="slides_3"></label>
						</div>
					</div>
				</div>
				<!-- //banner slider -->
			</div>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>

	<!-- about -->
	<div class="about-bottom">
		<div class="row no-gutters">
			<div class="col-lg-5 col-md-6 about">

			</div>
			<div class="col-lg-7 col-md-6 about-right-w3 text-right py-md-5">
				<div class="right-space py-xl-5 py-lg-3">
					<div class="title-section mb-4">
						<p class="w3ls-title-sub">Nosotros</p>
						<h3 class="w3ls-title">Bienvenido a <span>Maria Sushi</span></h3>
					</div>
					<p class="about-text" style="color: white;">Ofrecemos un sushi fresco y al instante para que
					puedas disfrutar de todo su sabor en el mejor momento.</p>
					<a href="about" class="button-w3ls mt-5" style="color: white;">Ver Más
						<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- specials -->
	<section class="blog_w3ls py-5">
		<div class="container pb-xl-5 pb-lg-3">
			<div class="title-section text-center mb-md-5 mb-4">
				<p class="w3ls-title-sub">Nuestro</p>
				<h3 class="w3ls-title">Sushi <span>Especial</span></h3>
			</div>
			<div class="row">
				<!-- blog grid -->
				<div class="col-lg-4 col-md-6">
					<div class="card border-0 med-blog">
						<div class="card-header p-0">
							<a href="menu">
								<img class="card-img-bottom" src="images/sushiEspecial2.jpg" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-0">
							<h5 class="blog-title card-title m-0"><a href="menu">Sushi Panda</a></h5>
							<p class="mt-3">Cras ultricies ligula sed magna dictum porta auris blandita.</p>
							<a href="menu" class="btn button-w3ls mt-4 mb-3">Ver Más
								<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-6 mt-md-0 mt-5">
					<div class="card border-0 med-blog">
						<div class="card-header p-0">
							<a href="menu">
								<img class="card-img-bottom" src="images/sushiEspecial1.jpg" alt="Card image cap">
							</a>
						</div>
						<div class="card-body border border-top-0">
							<h5 class="blog-title card-title m-0"><a href="menu">Veg Muffin</a></h5>
							<p class="mt-3">Cras ultricies ligula sed magna dictum porta auris blandita.</p>
							<a href="menu" class="button-w3ls active mt-4 mb-3">Ver Más
								<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
					<div class="card border-0 med-blog">
						<div class="card-header p-0">
							<a href="menu">
								<img class="card-img-bottom" src="images/sushiEspecial4.jpg" alt="Card image cap" style="height: 260px;">
							</a>
						</div>
						<div class="card-body border border-top-0">
							<h5 class="blog-title card-title m-0"><a href="menu">Hashbrown Brioche</a></h5>
							<p class="mt-3">Cras ultricies ligula sed magna dictum porta auris blandita.</p>
							<a href="menu" class="button-w3ls mt-4 mb-3">Ver Más
								<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
			</div>
		</div>
	</section>
	<!-- //specials -->

	<!-- two grids -->
	<section class="offer pt-lg-3">
		<div class="row no-gutters">
			<div class="col-md-6 p-0">
				<div class="blog-sec-w3">
					<div class="text-blog-w3 text-center p-2">
						<h4 class="text-wh mb-3"><a href="menu">Best Fast Food Collection</a></h4>
						<p class="text-li">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris Sed
							ut perspiciatis
							unde omnis iste natus error.</p>
						<a href="menu" class="button-w3ls active mt-5">Ver Más
							<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 p-0">
				<div class="blog-sec-w3 blog-sec-w3-2">
					<div class="text-blog-w3 text-center p-2">
						<h4 class="text-wh mb-3"><a href="menu">Organic Best & Fresh Food</a></h4>
						<p class="text-li">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris Sed
							ut perspiciatis
							unde omnis iste natus error.</p>
						<a href="menu" class="button-w3ls active mt-5">Ver Más
							<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //two grids -->

	<!-- services -->
	<section class="middle py-5" id="services">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-section text-center mb-md-5 mb-4">
				<p class="w3ls-title-sub">Nuestro Trabajo</p>
				<h3 class="w3ls-title mb-3">Excelentes <span>Servicios</span></h3>
			</div>
			<div class="row grids-w3 py-xl-5 py-lg-4 pt-lg-0 pt-4">
				<div class="col-lg-5 w3pvt-lauits_banner_bottom_left">
					<div class="row">
						<div class="col-8 wthree_banner_bottom_grid_right text-right">
							<h4 class="mb-3"><a href="login">Free Shipping</a></h4>
							<p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
						</div>
						<div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center">
							<img src="images/s1.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				<div class="col-lg-2 w3pvt-lauits_banner_bottom_left">

				</div>
				<div class="col-lg-5 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
					<div class="row">
						<div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center">
							<img src="images/s2.png" alt="" class="img-fluid">
						</div>
						<div class="col-8 wthree_banner_bottom_grid_right">
							<h4 class="mb-3"><a href="login">Free & Easy Returns</a></h4>
							<p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row grids-w3 py-xl-5 py-lg-4 mt-lg-0 mt-4">
				<div class="col-lg-4 w3pvt-lauits_banner_bottom_left">
					<div class="row">
						<div class="col-8 wthree_banner_bottom_grid_right text-right pl-lg-0">
							<h4 class="mb-3"><a href="login">Online Order</a></h4>
							<p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
						</div>
						<div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center pr-lg-0">
							<img src="images/s3.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				<div class="col-lg-4 w3pvt-lauits_banner_bottom_left pr-0">

				</div>
				<div class="col-lg-4 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
					<div class="row">
						<div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center pl-lg-0">
							<img src="images/s4.png" alt="" class="img-fluid">
						</div>
						<div class="col-8 wthree_banner_bottom_grid_right pr-lg-0">
							<h4 class="mb-3"><a href="login">24/7 Support</a></h4>
							<p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="img-blog-2">
			<img src="images/sushi12.png" alt="" class="img-fluid" style="width:1000px;">
		</div>
	</section>
	<!-- //services -->

	

	<!-- slides images -->
	<section class="wthree-slider" id="masthead">

	</section>
	<!-- //slides images -->

	<!-- newsletter -->
	<section class="subscribe-main py-5">
		<div class="container py-xl-5 py-3">
			<div class="row pb-lg-4 pt-lg-5">
				<div class="col-lg-6 col-md-9 text-center">
					<h3 class="w3ls-title mb-2">Suscribete al Newsletter</h3>
					<p class="mb-xl-5 mb-4">Recibe noticias de nuevos productos y descuentos!</p>

					<form action="{{ route('home.subscribe') }}" method="POST" class="d-flex newsletter-info">
						@csrf
						<div class="row">
						<div class="form-group">
						<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresa tu Email..." required="">
						@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                       </div>

						<button type="submit">Subscribir</button>
					</form>
					</div>
				</div>
				<div class="col-lg-6 col-md-3">

				</div>
			</div>
			<img src="images/sushi10.png" alt="" class="img-fluid sub-img">
		</div>
	</section>
	<!-- //newsletter -->

	
</body>

</html>
@endsection