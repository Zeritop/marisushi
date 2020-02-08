<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Maria Sushi</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Maria Sushi" />
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<!-- Bootstrap-Core-CSS -->
	<link href=" {{ asset('css/css_slider.css') }} " type="text/css" rel="stylesheet" media="all">
	<!-- css slider -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }} " type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="{{ asset('css/font-awesome.min.css') }} " rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link
		href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
		rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
		  <link href="{{ asset('assetss/css/bootstrap.min.css') }} " rel="stylesheet" />
	<link href="{{ asset('assetss/css/paper-bootstrap-wizard.css') }} " rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('assetss/css/themify-icons.css') }} " rel="stylesheet">
	<!-- //Web-Fonts -->
 
</head>

<body>
	<!-- header -->
	<header id="home">
		<!-- top-bar -->
		<div class="top-bar py-2 border-bottom">
			<div class="container">
				<div class="row middle-flex">
					<div class="col-xl-7 col-md-5 top-social-agile mb-md-0 mb-1 text-lg-left text-center">
						<div class="row">
							<div class="col-xl-3 col-6 header-top_w3layouts">
								<p class="text-da">
									<span class="fa fa-map-marker mr-2"></span>Los Alamos, Región del Bío Bío
								</p>
							</div>
							<div class="col-xl-3 col-6 header-top_w3layouts">
								<p class="text-da">
									<span class="fa fa-phone mr-2"></span>9 7849 0869
								</p>
							</div>
							<div class="col-xl-6"></div>
						</div>
					</div>


					<div class="col-xl-5 col-md-7 top-social-agile text-md-right text-center pr-sm-0 mt-md-0 mt-2">
						<div class="row middle-flex">
							<div class="pull-left"> 
                            
                            </div>	
							
					<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
						<ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                    	<!-- <span class="caret"></span> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                	<a class="dropdown-item" href="{{ route('cart.historial') }}">Mis Pedidos</a>
                                	<div class="divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                     
                        @endguest
                          
                    </ul>
					</nav>		
							
						</div>

					</div>

				</div>

			</div>

		</div>

	</header>
	<!-- //top-bar -->

	<!-- header 2 -->
	<!-- navigation -->
	<div class="main-top py-1">
		<div class="container">
			<div class="nav-content">
				<!-- logo -->
				<h1>
					<a id="logo" class="logo" href="/">
						<img src="images/sushiAnimado2.jpg" alt="" class="img-fluid" style="width:120px;"><span>Maria</span> Sushi
					</a>
				</h1>
				<!-- //logo -->
				<!-- nav -->
				<div class="nav_web-dealingsls">
					<nav>
						<label for="drop" class="toggle">Menu</label>
						<input type="checkbox" id="drop" />
						<ul class="menu">
							<li><a href="/">Home</a></li>
							<li><a href="about">Nosotros</a></li>
							<li>
								<!-- First Tier Drop Down -->
								<label for="drop-3" class="toggle toogle-2">Pages <span class="fa fa-angle-down"
										aria-hidden="true"></span>
								</label>
								<a href="#pages">Pages <span class="fa fa-angle-down" aria-hidden="true"></span></a>
								<input type="checkbox" id="drop-3" />
								<ul>
									<li><a class="drop-text" href="#services">Services</a></li>
									<li><a class="drop-text" href="about">Our Chefs</a></li>
									<li><a class="drop-text" href="#blog">Blog</a></li>
									<li><a class="drop-text" href="single.html">Single Page</a></li>
									<li><a class="drop-text" href="{{ route('login') }}">Login</a></li>
									<li><a class="drop-text" href="{{ route('register') }}">Register</a></li>
								</ul>
							</li>
							<li><a href="menu">Menu</a></li>
							<li><a href="personalizar">Personalizar</a></li>
							<li><a href="contacto">Contactanos</a></li>
                            <li><a href="{{ route('cart.show') }}"><span class="fa fa-shopping-cart">My cart ({{ session()->has('cart') ? session()->get('cart')->totalQty : '0'}})</span></a></li>
                            
						</ul>
					</nav>
				</div>
				<!-- //nav -->
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- //header 2 -->

	@yield('content')

	<!-- footer -->
	<footer class="py-5">
		<div class="container py-xl-4">
			<div class="row footer-top">
				<div class="col-lg-6 footer-grid_section_1its footer-text">
					<!-- logo -->
					<h2>
						<a class="logo text-wh" href="index.html">
							<img src="images/sushiAnimado2.jpg" alt="" class="img-fluid" style="width: 80px;"><span>Maria</span> Sushi
						</a>
					</h2>
					<!-- //logo -->
					<p class="mt-lg-4 mt-3 mb-lg-5 mb-4">Sed ut perspiciatis unde omnis iste natus errorhjhsit lupt
						atem
						accursit lupt atem accu
						dfdsa
						ntium doloremque laudan tium accu santium dolore.</p>
					<!-- social icons -->
					<ul class="top-right-info">
						<li>
							<p>Siguenos en:</p>
						</li>
						<li class="facebook-w3">
							<a href="#facebbok">
								<span class="fa fa-facebook-f"></span>
							</a>
						</li>
						<li class="twitter-w3">
							<a href="#twitter">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li class="google-w3">
							<a href="#google">
								<span class="fa fa-google-plus"></span>
							</a>
						</li>
						<li class="dribble-w3">
							<a href="#dribble">
								<span class="fa fa-dribbble"></span>
							</a>
						</li>
					</ul>
					<!-- //social icons -->
				</div>
				<div class="col-lg-6 footer-grid_section_1its my-lg-0 my-sm-4 my-4">
					<div class="footer-title">
						<h3>Encuéntranos</h3>
					</div>
					<div class="footer-text mt-4">
						<p>Direccion : Andalio Vigueras #200, Los Alamos, Región del Bío Bío</p>
						<p class="my-2">Telefono : 9 7849 0869</p>
						<p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
					</div>
					<div class="footer-title mt-4 pt-md-2">
						<h3>Métodos de Pago</h3>
					</div>
					<ul class="list-unstyled payment-links mt-4">
						<li>
							<a href="login.html"><img src="images/pay2.png" alt=""></a>
						</li>
						<li>
							<a href="login.html"><img src="images/pay5.png" alt=""></a>
						</li>
						<li>
							<a href="login.html"><img src="images/pay1.png" alt=""></a>
						</li>
						<li>
							<a href="login.html"><img src="images/pay4.png" alt=""></a>
						</li>
						<li>
							<a href="login.html"><img src="images/pay6.png" alt=""></a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="cpy-right text-center py-3">
		<p>© 2019 Mari Sushi. Todos los derechos reservados | Design by
			<a href="http://w3layouts.com"> W3layouts.</a>
		</p>
	</div>
	<!-- //copyright -->
	<!-- move top icon -->
	<a href="#home" class="move-top text-center">
		<span class="fa fa-level-up" aria-hidden="true"></span>
	</a>
	<!-- //move top icon -->

</body>
    
    
<script src="{{ asset('/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('/assets/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('/assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('/assets/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('../assets/js/demo.js') }}"></script>
<!--   Core JS Files   -->
	<script src="assetss/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assetss/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assetss/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	
	<script src="assetss/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="assetss/js/jquery.validate.min.js" type="text/javascript"></script>
    
 
</html>