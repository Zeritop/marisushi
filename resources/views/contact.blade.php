@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Tasty Burger Restaurants Category Bootstrap Responsive Web Template | Contact Us :: W3layouts</title>
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
			<li class="breadcrumb-item active" aria-current="page">Contactanos</li>
		</ol>
	</div>
	<!-- //page details -->

@if ($errors->any())

    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>

        <strong>Whoops!</strong> Parece que encontramos un problema.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
@if ($message = Session::get('success'))

        <div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif


    <!-- banner -->
	<div class="main-banner-2">

</div>
<!-- //banner -->

	<!-- contact -->
	<section class="ab-info-main py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-section text-center mb-md-5 mb-4">
				<h3 class="w3ls-title mb-3">Conta<span>ctanos</span></h3>
				<p class="titile-para-text mx-auto">Contactate con nosotros a través de un correo electrónico. Puedes enviarnos sugerencias.</p>
			</div>
			<div class="row contact-agileinfo pt-lg-4">
				<!-- contact address -->
				<div class="col-md-5 address">
					<h3 class="footer-title mb-4 pb-lg-2">Nuestra Direccion</h3>
					<div class="row address-info-w3ls">
						<div class="col-3 address-left">
							<img src="images/c1.png" alt="" class="img-fluid">
						</div>
						<div class="col-9 address-right mt-2">
							<h5 class="address mb-2">Direccion</h5>
							<p>Los Alamos, Región del Bio Bio, Chile</p>
						</div>
					</div>
					<div class="row address-info-w3ls my-2">
						<div class="col-3 address-left">
							<img src="images/c2.png" alt="" class="img-fluid">
						</div>
						<div class="col-9 address-right mt-2">
							<h5 class="address mb-2">Email</h5>
							<p>
								<p>ariassusana205@gmail.com</p>
							</p>
						</div>
					</div>
					<div class="row address-info-w3ls">
						<div class="col-3 address-left">
							<img src="images/c3.png" alt="" class="img-fluid">
						</div>
						<div class="col-9 address-right mt-2">
							<h5 class="address mb-2">Telefono</h5>
							<p>9 7849 0896</p>
						</div>
					</div>
				</div>
				<!-- //contact address -->
				<!-- contact form -->
				<div class="col-lg-7 contact-right mt-lg-0 mt-5">
					<form action="{{ route('contacto.store') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-lg-6 form-group pr-lg-2">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre" required="">
							</div>
							<div class="col-lg-6 form-group pl-lg-2">
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required="">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        		@enderror
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="telefono" placeholder="Telefono o celular" required="">
						</div>
						<div class="form-group">
							<textarea name="mensaje" class="form-control" placeholder="Mensaje" required=""></textarea>
						</div>
						<button type="submit" class="btn submit-contact-main ml-auto">Enviar</button>
					</form>
				</div>
				<!-- contact form -->
			</div>
		</div>
	</section>
	<!-- contact -->
	<!-- map -->
	<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1580.0121116110433!2d-73.4663536!3d-37.625118!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9641fda0193459bf%3A0x9beb51652124b256!2sMari%20Sushi%2C%20Los%20Alamos!5e0!3m2!1ses-419!2scl!4v1572223579524!5m2!1ses-419!2scl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</section>
	<!-- //map -->

</body>

</html>
@endsection