@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Menu</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('menus.create') }}"> Crear Nuevo Menu</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <strong>{{ $message }}</strong>

        </div>

    @endif

   <form action="menus" method="get">
        
        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="titulo" placeholder="Titulo">
            </div>  
            
        </div>
            <div class="col-md-3">
             <div class="form-group">
              <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
                 
            </div>
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="height: 35px;"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        
    </form>

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Titulo</th>

            <th>Descripcion</th>

            <th>Precio</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($menus as $menu)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $menu->titulo }}</td>

            <td>{{ $menu->descripcion }}</td>

            <td>{{ $menu->precio }}</td>

            <td>

                <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('menus.show',$menu->id) }}">Ver</a>

    

                    <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Editar</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $menus->links() !!}

</div>
    
      

@endsection