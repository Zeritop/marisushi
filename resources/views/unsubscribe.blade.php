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

            <p class="mb-0">{{ $message }}</p>

        </div>

@endif



	<!-- newsletter -->
	<section class="subscribe-main py-5">
		<div class="container py-xl-5 py-3">
			<div class="row pb-lg-4 pt-lg-5">
				<div class="col-lg-6 col-md-9 text-center">
					<h3 class="w3ls-title mb-2">Newsletter</h3>
					<p class="mb-xl-5 mb-4">Elimina tu email de nuestro sistema newsletter</p>

					<form action="{{ route('unsubscribe.unsubscribe') }}" method="POST" class="d-flex newsletter-info">
						@csrf
						
						<input type="email" name="email" placeholder="Ingresa tu Email..." required="">
						
						<button type="submit">Aceptar</button>
					</form>

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