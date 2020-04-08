@extends('layout.principal')

@section('content')


<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Mari Sushi"/>
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
			<li class="breadcrumb-item active" aria-current="page">Preguntas Frecuentes</li>
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
				<h3 class="w3ls-title mb-3">Preguntas <span>Frecuentes</span></h3>
			</div>
	</section>
<br>

<div class="container">
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        	<span class="fa fa-plus"></span>
          1. ¿Necesito registrarme para realizar un pedido?
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <h4> Si, es necesario estar registrado en nuestra página web para poder realizar un pedido.
      	</h4>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <span class="fa fa-plus"></span>
          2. Perdi mi contraseña, ¿Cómo la puedo recuperar?
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <h4>Debes ingresar a la sección 'Login' en la página principal y haz click en ¿Olvidaste tu contraseña?. 
        	Te enviaremos las instrucciones a tu email.
      	</h4>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <span class="fa fa-plus"></span>
          3. Me registre, pero no puedo realizar un pedido.
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
      	<h4>
         Revisa que recibiste un email de verificacion de cuenta de Mari Sushi, revisa también tu carpeta de SPAM. 
         Si no verificaste tu cuenta al momento de crearla, puedes pedir otro email en la sección 'Realizar Pedido', y te enviaremos otro.
         </h4>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          <span class="fa fa-plus"></span>
          4. ¿Hacen despacho a domicilio?, ¿Realizan despacho a lás demas comunas de la ciudad Los Álamos?
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
      <h4>
      	Actualmente solo realizamos entregas en nuestro local en la ciudad de Los Álamos.
      	<hr>
      	Dirección: Andalio Vigueras #200, Comuna de Los Alamos, Ciudad de Los Álamos, Región del Bío Bío.
      </h4>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          <span class="fa fa-plus"></span>
          5. ¿Cómo pago mi pedido?
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
      <h4>
      	Puedes pagar tu pedido cuando retires el pedido en nuestro local.
      </h4>
      </div>
    </div>
  </div>

</div>
</div>




	<!-- preguntas-->
	

	<script type="text/javascript">
$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".fa fa-plus").removeClass("fa-plus").addClass("fa-minus");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".fa fa-minus").removeClass("fa-minus").addClass("fa-plus");
});
	

	</script>

@endsection