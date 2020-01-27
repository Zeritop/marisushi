@extends('layout.principal')

@section('content')

<div class="container">
    
    @if($cart)
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Detalle del Pedido</h2>

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

            <th>Titulo</th>

            <th>Descripcion</th>

            <th>Precio</th>

            <th width="280px">Action</th>

        </tr>

        @foreach($cart->items as $menu)

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
    @endif
      

@endsection