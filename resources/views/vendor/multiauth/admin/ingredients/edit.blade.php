@extends('vendor.multiauth.admin.administrador.layout')

   

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar Ingrediente</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('ingredients.index') }}"> Atras</a>

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

  

    <form action="{{ route('ingredients.update',$ingredient->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>

                    <input type="text" name="name" value="{{ $ingredient->name }}" class="form-control" placeholder="Nombre">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
        
            <div class="form-group">

                <strong>Categoria:</strong>

                <select class="form-control" name="categoria" style="height: auto">
                    <option disabled selected> Selecciona una opción</option>

                    @foreach ($categorys as $category)

                    <option value=" {{ $category->name }} "> {{ $category->name }} </option>


                    @endforeach

                </select>

            </div>
        </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Actualizar</button>

            </div>

        </div>

   

    </form>
</div>
    
<br>
@endsection