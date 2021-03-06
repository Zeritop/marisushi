@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- CSS Files -->
  
</head>
<body>
<!-- page details -->
	<div class="breadcrumb-agile bg-light py-2">
		<ol class="breadcrumb bg-light m-0">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Personalizar Menu</li>
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
				<h3 class="w3ls-title mb-3">Personaliza tu <span>Menu</span></h3>
				<p class="titile-para-text mx-auto">Elige entre los distintos ingredientes disponibles y fabrica tu propio sushi.</p>
			</div>
	</section>
	<!-- gallery model-->

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
	
	<!-- End Google Tag Manager (noscript) -->
	<div class="image-container set-full-height" style="background-image: url('images/sushi7MME.jpg')">
	    <!--   Creative Tim Branding   -->
	   

		<!--  Made With Paper Kit  -->
		

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="red" id="wizardProfile">
		                    <form action="{{ route('personalizar.addToCart') }}" method="POST">
		                    	@csrf
		                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Personaliza tu Menu</h3>
									<p class="category">Elige entre los distintos ingredientes y arma tu propio sushi.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#esencial" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-notepad"></i>
												</div>
												Esencial
											</a>
										</li>
			                            <li>
											<a href="#principal" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-notepad"></i>
												</div>
												Principal
											</a>
										</li>
			                            <li>
											<a href="#secundario" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-notepad"></i>
												</div>
												Secundario
											</a>
										</li>
										<li>
											<a href="#envoltura" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-notepad"></i>
												</div>
												Envoltura
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="esencial">
		                            	<h5 class="info-text">Ingrediente Esencial</h5>
		                            	<div class="row">


		                            		<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Forma</label>
													
													<select name="titulo" class="form-control" style="height: 40px;">
														<option disabled selected>Selecciona la forma</option>
		                                                <option value="Handroll Personalizado">Handroll Personalizado</option>
		                                                <option value="Sushi Personalizado: 10 piezas">Sushi Personalizado: 10 piezas</option>
		                                            </select>
		                                            
												</div>
											</div>
										
											<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Ingrediente esencial</label>
													
													<select name="esencial" class="form-control" style="height: 40px;">
														<option disabled selected>Selecciona el ingrediente esencial</option>
														@foreach($personalizars as $personalizar)
														@if($personalizar->categoria == 'Esencial')
		                                                <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
		                                                @endif
		                                                @endforeach

		                                            </select>
		                                            
												</div>
											</div>
											  
										</div>
		                            </div>
		                            <div class="tab-pane" id="principal">
		                                <h5 class="info-text"> Elige entre nuestros ingredientes principales </h5>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Ingrediente <small>(requerido)</small></label>
													
													<select name="principal" class="form-control" style="height: 40px;">
													<!--	<option value="" selected="">...</option> -->
													<option disabled selected>Selecciona un ingrediente principal</option>
														@foreach($personalizars as $personalizar)
														@if($personalizar->categoria == 'Principal')
		                                                <option value="{{ $personalizar->name}}"> {{ $personalizar->name}} </option>
		                                                @endif
		                                                @endforeach

		                                            </select>
		                                            
												</div>
											</div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="secundario">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h5 class="info-text">Elige 2 ingredientes secundarios </h5>
		                                    </div>
		                                     <div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Primer ingrediente <small>(requerido)</small></label>
													
													<select name="secundario1" class="form-control" style="height: 40px;">
												<!--		<option value="" selected="">...</option> -->
												<option disabled selected>Selecciona un ingrediente secundario</option>
														@foreach($personalizars as $personalizar)
														@if($personalizar->categoria == 'Secundarios')
		                                                <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
		                                                @endif
		                                                @endforeach

		                                            </select>
		                                            
												</div>
											</div>
											 <div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Segundo ingrediente <small>(requerido)</small></label>
													
													<select name="secundario2" class="form-control" style="height: 40px;">
												<!--		<option value="" selected="">...</option> -->
												<option disabled selected>Selecciona un ingrediente secundario</option>
														@foreach($personalizars as $personalizar)
														@if($personalizar->categoria == 'Secundarios')
		                                                <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
		                                                @endif
		                                                @endforeach

		                                            </select>
		                                            
												</div>
											</div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="envoltura">
		                                <h5 class="info-text"> Elige entre nuestras envolturas </h5>
		                                <div class="row">

		                                	<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Envoltura Interna<small>(requerido)</small></label>
													
													<select class="form-control" name="envolturaInterna" style="height: auto">
                    									<option disabled selected>Selecciona una opci??n</option>
                        									<option value="Nori">Con Nori</option>
                        									<option value="sinNori">Sin Nori</option>
                									</select>
		                                            
												</div>
											</div>

		                                    <div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Envoltura Externa<small>(requerido)</small></label>
													
													<select name="envolturaExterna" class="form-control" style="height: 40px;">
												<!--		<option value="" selected="">...</option> -->
												<option disabled selected>Selecciona una envoltura</option>
														@foreach($personalizars as $personalizar)
														@if($personalizar->categoria == 'Envoltura externa')
		                                                <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
		                                                @endif
		                                                @endforeach

		                                            </select>
		                                            
												</div>
											</div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Siguiente' />
		                               
		                                <button type="submit" class="btn btn-finish btn-fill btn-danger btn-wd">Agregar al carrito</button>
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Atras' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	            Made with <i class="fa fa-heart heart"></i> by <a href="https://www.creative-tim.com">Creative Tim</a>.>
	        </div>
	    </div>
	</div>



	
	



	
</body>

</html>

@endsection
