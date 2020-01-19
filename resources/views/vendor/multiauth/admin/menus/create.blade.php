@extends('vendor.multiauth.admin.administrador.layout')

  

@section('content')
<br>
<div class="container">
    <div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar Nuevo Menu</h2>

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

   

<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="foto">
                    <input type="file" name="foto">
                </label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Titulo:</strong>

                <input type="text" name="titulo" class="form-control" placeholder="Titulo">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripcion:</strong>

                <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripcion"></textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Precio:</strong>

                <input type="text" name="precio" class="form-control" placeholder="Ejemplo 10000">

            </div>

        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente: ("Esencial")</strong>    
             <select class="form-control" name="esencial" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Esencial')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente: ("Principal")</strong>    
             <select class="form-control" name="principal" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Principal')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente: ("Secundarios")</strong>    
             <select class="form-control" name="secundario1" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Secundarios')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente: ("Secundarios")</strong>    
             <select class="form-control" name="secundario2" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Secundarios')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente: ("Envoltura")</strong>    
             <select class="form-control" name="envoltura" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Envoltura')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             <strong>Otros Ingredientes (Opcionales)</strong>
            </div>
             
         </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente 1:</strong>    
             <select class="form-control" name="ingrediente1" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Otros')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente 2:</strong>    
             <select class="form-control" name="ingrediente2" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Otros')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente 3:</strong>    
             <select class="form-control" name="ingrediente3" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Otros')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente 4:</strong>    
             <select class="form-control" name="ingrediente4" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Otros')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente 5:</strong>    
             <select class="form-control" name="ingrediente5" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Otros')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
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