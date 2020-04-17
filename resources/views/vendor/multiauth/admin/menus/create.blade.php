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

        <strong>Whoops!</strong> Parece haber algunos problemas con los siguientes campos.<br><br>

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

            <hr>
            <strong><h4>Menú Sushi</h4></strong>
                
            <strong>Ingrediente Esencial</strong>    
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
                
            <strong>Ingrediente Principal</strong>    
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
                
            <strong>Ingrediente Secundario 1</strong>    
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
                
            <strong>Ingrediente Secundarios 2</strong>    
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
                
            <strong>Ingrediente Secundarios 3</strong>    
             <select class="form-control" name="secundario3" style="height: auto">
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
                
            <strong>Ingrediente Envoltura Interna</strong>    
             <select class="form-control" name="envolturaInterna" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                        <option value="Nori">Con Nori</option>
                        <option value="">Sin Nori</option>
                </select>
                
            </div> 
        </div>


          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente Envoltura Externa</strong>    
             <select class="form-control" name="envolturaExterna" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Envoltura externa')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>
         
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <hr>
            <div class="form-group">
            </div>
             
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente Principal 2</strong>    
             <select class="form-control" name="principal2" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 4</strong>    
             <select class="form-control" name="secundario4" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 5</strong>    
             <select class="form-control" name="secundario5" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 6</strong>    
             <select class="form-control" name="secundario6" style="height: auto">
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
                
            <strong>Ingrediente Envoltura Externa 2</strong>    
             <select class="form-control" name="envolturaExterna2" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Envoltura externa')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <hr>
            <div class="form-group">
            </div>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente Principal 3</strong>    
             <select class="form-control" name="principal3" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 7</strong>    
             <select class="form-control" name="secundario7" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 8</strong>    
             <select class="form-control" name="secundario8" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 9</strong>    
             <select class="form-control" name="secundario9" style="height: auto">
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
                
            <strong>Ingrediente Envoltura Externa 3</strong>    
             <select class="form-control" name="envolturaExterna3" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Envoltura externa')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <hr>
            <div class="form-group">
            </div>
         </div>
   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <strong>Ingrediente Principal 4</strong>    
             <select class="form-control" name="principal4" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 10</strong>    
             <select class="form-control" name="secundario10" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 11</strong>    
             <select class="form-control" name="secundario11" style="height: auto">
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
                
            <strong>Ingrediente Secundarios 12</strong>    
             <select class="form-control" name="secundario12" style="height: auto">
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
                
            <strong>Ingrediente Envoltura Externa 4</strong>    
             <select class="form-control" name="envolturaExterna4" style="height: auto">
                    <option disabled selected>Selecciona una opción</option>
                    
                    @foreach ($ingredients as $ingredient)
                    @if($ingredient->categoria == 'Envoltura externa')
                 
                    <option value=" {{ $ingredient->name }} "> {{ $ingredient->name }} </option>
                
                    @endif
                    @endforeach

                </select>
                
            </div>

        
         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <hr>
            <strong><h4>Otros Menús (Opcional)</h4></strong>
            <div class="form-group">
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