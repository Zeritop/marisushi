@extends('vendor.multiauth.admin.administrador.layout')

   

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar {{$product->name}}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Atras</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> Parece haber algunos problemas con los siguientes campos.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('products.update',$product->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Cantidad:</strong>

                    <input type="number" name="cantidad" min="0" value="{{ $product->cantidad }}" class="form-control" placeholder="Cantidad">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Unidad de Medida</strong>

                    <select name="unidad_medida" class="form-control" style="height: 40px;">
                <option disabled selected>Selecciona la unidad de medida</option>
                    @foreach($medidas as $medida)
                            <option value=" {{ $medida->name }}"> {{ $medida->name}} </option>
                    @endforeach

              </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Precio Inicial:</strong>

                    <input type="number" name="precio_inicial" value="{{ $product->precio_inicial }}" class="form-control" placeholder="Precio inicial">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Precio Actual:</strong>

                    <input type="number" name="precio_actual" value="{{ $product->precio_actual }}" class="form-control" placeholder="Precio Actual">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Proveedor:</strong>

                    <input type="text" name="proveedor" value="{{ $product->proveedor }}" class="form-control" placeholder="Proveedor">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Descuento:</strong>

                    <input type="text" name="descuento" value="{{ $product->descuento }}" class="form-control" placeholder="Descuento">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Observaciones:</strong>

                    <textarea class="form-control" style="height:150px" name="observaciones" placeholder="Observaciones">{{ $product->observaciones }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Modificar</button>

            </div>

        </div>

   

    </form>
</div>
    
<br>
@endsection