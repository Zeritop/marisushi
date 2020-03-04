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
				<p class="titile-para-text mx-auto">Inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo.Nemo
					enim totam rem aperiam.</p>
			</div>
	</section>
	
	<!-- gallery model-->
	<div class="container">
		<div class="row mt-4">
		@foreach($menus as $key => $menu)
				<div class="col-md-4">
					<div class="gallery-demo">
						<a href="#{{ $key }}">
							<img src="/storage/{{$menu->foto}}" alt=" " class="img-fluid" />
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
			<img class="img-fluid" src="/storage/{{$menu->foto}}" alt="">
			<h4 class="p-mask">{{ $menu->titulo }} - - <span>${{ $menu->precio }}</span></h4>
			<p>{{ $menu->descripcion }}</p>
            <p>{{ $menu->esencial }} - {{ $menu->principal }} -  {{ $menu->secundario1 }} - {{ $menu->secundario2 }} - {{ $menu->envoltura }}</p>
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
