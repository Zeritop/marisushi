@extends('vendor.multiauth.admin.administrador.layout')

  

@section('content')
<br>
<div class="container">
    <div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar Nuevo Producto</h2>

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

   

<form action="{{ route('products.store') }}" method="POST">

    @csrf



     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Ingrediente:</strong>

                <select class="form-control" name="name" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>

                    @foreach ($ingredients as $ingredient)

                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>


                    @endforeach

                </select>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Marca:</strong>

                <input type="text" name="marca" class="form-control" placeholder="Ingresar marca si existe">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Cantidad:</strong>

                <input type="text" name="cantidad" class="form-control" placeholder="Ejemplo 10">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unidad de medida:</strong>
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

                <input type="text" name="precio_inicial" class="form-control" placeholder="Ejemplo 10000">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Precio Actual:</strong>

                <input type="text" name="precio_actual" class="form-control" placeholder="Ejemplo 15000">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Proveedor:</strong>

                <input type="text" name="proveedor" class="form-control" placeholder="Proveedor">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descuento:</strong>

                <input type="text" name="descuento" class="form-control" placeholder="Si no hay descuento poner 0">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Observaciones:</strong>

                <textarea class="form-control" style="height:150px" name="observaciones" placeholder="Observaciones"></textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Aceptar</button>

        </div>

    </div>

   

</form>

</div>
<br>
@endsection