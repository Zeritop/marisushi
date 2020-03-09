@extends('layout.principal')

@section('content')
<div class="breadcrumb-agile bg-light py-2">
		<ol class="breadcrumb bg-light m-0">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
		</ol>
	</div>
	<!-- //page details -->
 <!-- banner -->
    <div class="main-banner-2">

    </div>
    <!-- //banner -->
<br>
<div class="container">
    @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach( $errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif   
    <div class="row">
        @if($cart)
             
        <div class="col-md-8">
            @foreach($cart->items as $menu)
            
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $menu['title'] }}
                    </h5>
                    
                    <div class="card-text">
                        
                        ${{ $menu['precio'] }} 
                        X
                        
                       
                        <form action="{{ route('menu.update', $menu['id']) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="qty" id="qty" value="{{ $menu['qty'] }}">
                            </div>
                            
                            <button type="submit" class="btn btn-secondart btn-sm ml-4">Cambiar</button>
                        </form>
                       <form action="{{ route('menu.destroy', $menu['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;">Eliminar</button>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                @if(($menu['title'] != "Sushi Personalizado: 10 piezas") && ($menu['title'] != "Handroll Personalizado"))
                                    <img src="/storage/{{ $menu['image'] }}" style="height: 200px; width: 200px;">
                                @endif    
                            </div>
                            <div class="col-md-8">
                            Ingredientes:
                                <p>{{ $menu['esencial'] }} - {{ $menu['principal'] }} - {{ $menu['secundario1'] }} - {{ $menu['secundario2'] }} - {{ $menu['envolturaExterna'] }}</p>
                                @if($menu['envolturaInterna'] != null)
                                    <p>- {{ $menu['envolturaInterna'] }}</p>
                                @endif
                                @if($menu['ingrediente1'] != null)
                                    <p>- {{ $menu['ingrediente1'] }}</p>
                                @endif
                                @if($menu['ingrediente2'] != null)
                                    <p>- {{ $menu['ingrediente2'] }}</p>
                                @endif
                                @if($menu['ingrediente3'] != null)
                                    <p>- {{ $menu['ingrediente3'] }}</p>
                                @endif
                                @if($menu['ingrediente4'] != null)
                                    <p>- {{ $menu['ingrediente4'] }}</p>
                                @endif
                                @if($menu['ingrediente5'] != null)
                                    <p>- {{ $menu['ingrediente5'] }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <br>
                        
                    </div>
                </div>
            </div>
            
            @endforeach
            
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-titel">
                        Su carrito.
                        <hr>
                    </h3>
                    <div class="card-text">
                        <p>Monto Total: ${{ $cart->totalPrice }}</p>
                        <p>Cantidad Total: {{ $cart->totalQty }}</p>
                        <a href="{{ route('cart.detalles') }}" class="btn btn-info">Realizar Pedido</a>
                    </div>    
                </div>
            </div>
        </div>
        @else
        <br>
        <p> No hay items en el carrito de compras.</p>
        
        @endif
    </div>
    
</div>

@endsection