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
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;">Eliminar</button>
                        </form>
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
                        <a class="btn btn-info">Pedir</a>
                    </div>    
                </div>
            </div>
        </div>
        @else
        <p> No hay menus en el carrito.</p>
        
        @endif
    </div>
    
</div>

@endsection