@extends('vendor.multiauth.admin.administrador.layout')

   

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar Menu</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('menus.index') }}"> Atras</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('menus.update',$menu->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Titulo:</strong>

                    <input type="text" name="titulo" value="{{ $menu->titulo }}" class="form-control" placeholder="Titulo">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Descripcion:</strong>

                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripcion">{{ $menu->descripcion }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Precio:</strong>

                    <input type="text" name="precio" value="{{ $menu->precio }}" class="form-control" placeholder="Precio">

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