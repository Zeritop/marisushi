@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Categoria de Ingredientes</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('ingredients.create') }}"> Agregar Nuevo Ingrediente</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Nombre</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($ingredients as $ingredient)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $ingredient->name }}</td>

            <td>

                <form action="{{ route('ingredients.destroy',$ingredient->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('ingredients.show',$ingredient->id) }}">Ver</a>

    

                    <a class="btn btn-primary" href="{{ route('ingredients.edit',$ingredient->id) }}">Editar</a>


                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $ingredients->links() !!}

</div>
    
      

@endsection