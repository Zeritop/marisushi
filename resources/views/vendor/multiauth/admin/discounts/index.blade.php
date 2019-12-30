@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Categoria de Descuentos</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('discounts.create') }}"> Agregar Nuevo Codigo</a>

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

            <th>Codigo</th>

            <th>Descuento</th>

            <th>Descripción</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($discounts as $discount)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $discount->codigo }}</td>

            <td>{{ $discount->descuento }}</td>

            <td>{{ $discount->descripcion }}</td>

            <td>

                <form action="{{ route('discounts.destroy',$discount->id) }}" method="POST">

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $discounts->links() !!}

</div>
    
      

@endsection