@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- page details -->
    <div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success text-center">
                {{ session()->get('success') }}
        </div>
    @endif
    </div>

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
				<p class="titile-para-text mx-auto">Elige entre las distintas opciones que mas te gusten</p>
			</div>
	</section>

	<!-- gallery model-->
	<div class="container">
		<div class="row mt-4">
		@foreach($menus as $key => $menu)
				<div class="col-md-4">
					<div class="gallery-demo">
						<a href="#{{ $key }}">
							<img src="/storage/{{$menu->foto}}" alt=" " class="img-fluid" style="height: 300px; width: auto;" />
							<h4 class="p-mask"> {{ $menu->titulo }} - <span>${{ $menu->precio }}</span></h4>
						</a>
					</div>
				</div>
				@endforeach
		</div>
	</div>


	<!-- gallery popup 1 -->
	@foreach($menus as $key => $menu)
	<div id="{{ $key }}" class="pop-overlay">
		<div class="popup">
			<img class="img-fluid" src="/storage/{{$menu->foto}}" style="max-height: 280px; width: auto;" alt="">
			<h4 class="p-mask">{{ $menu->titulo }} - - <span>${{ $menu->precio }}</span></h4>
			<p>{{ $menu->descripcion }}</p>

            <p>

            @if($menu->principal != null)
            {{ $menu->principal }} -
            @endif

            @if($menu->secundario1 != null)
            {{ $menu->secundario1 }} -
            @endif

            @if($menu->secundario2 != null)
            {{ $menu->secundario2 }} -
            @endif

            @if($menu->secundario3 != null)
            {{ $menu->secundario3 }} -
            @endif

            @if($menu->envolturaInterna != null)
            {{ $menu->envolturaInterna }} -
            @endif

            @if($menu->envolturaExterna != null)
            {{ $menu->envolturaExterna }}
            @endif
        	</p>


            <p>
            @if($menu->principal2 != null)
            {{ $menu->principal2 }} -
            @endif

            @if($menu->secundario4 != null)
            {{ $menu->secundario4 }} -
            @endif

            @if($menu->secundario5 != null)
            {{ $menu->secundario5 }} -
            @endif

            @if($menu->secundario6 != null)
            {{ $menu->secundario6 }} -
            @endif

            @if($menu->envolturaExterna2 != null)
            {{ $menu->envolturaExterna2 }}
            @endif

            </p>

            <p>
            @if($menu->principal3 != null)
            {{ $menu->principal3 }} -
            @endif

            @if($menu->secundario7 != null)
            {{ $menu->secundario7 }} -
            @endif

            @if($menu->secundario8 != null)
            {{ $menu->secundario8 }} -
            @endif

            @if($menu->secundario9 != null)
            {{ $menu->secundario9 }} -
            @endif

            @if($menu->envolturaExterna3 != null)
            {{ $menu->envolturaExterna3 }}
            @endif
            </p>

            <p>
            @if($menu->principal4 != null)
            {{ $menu->principal4 }} -
            @endif

            @if($menu->secundario10 != null)
            {{ $menu->secundario10 }} -
            @endif

            @if($menu->secundario11 != null)
            {{ $menu->secundario11 }} -
            @endif

            @if($menu->secundario12 != null)
            {{ $menu->secundario12 }} -
            @endif

            @if($menu->envolturaExterna4 != null)
            {{ $menu->envolturaExterna4 }}
            @endif
            </p>

            

            @if($menu->ingrediente1 != null)
            <p>- {{ $menu->ingrediente1 }}</p>
            @endif

            @if($menu->ingrediente2 != null)
            <p>- {{ $menu->ingrediente2 }}</p>
            @endif

            @if($menu->ingrediente3 != null)
            <p>- {{ $menu->ingrediente3 }}</p>
            @endif

            @if($menu->ingrediente4 != null)
            <p>- {{ $menu->ingrediente4 }}</p>
            @endif

            @if($menu->ingrediente5 != null)
            <p>- {{ $menu->ingrediente5 }}</p>
            @endif

			<a href="{{ route('cart.add', $menu->id)}}" class="button-w3ls active mt-3">Añadir al carrito
				<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
			</a>
			<a class="close" href="#gallery">×</a>
		</div>
	</div>
	@endforeach
</body>
</html>

@endsection
