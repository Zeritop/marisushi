@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Inventario de Productos</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('products.create') }}"> Registrar Nuevo Producto</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <strong>{{ $message }}</strong>

        </div>

    @endif

    <ul>

            @foreach($products as $product)
                @if ($product->cantidad == 0 )
                <div class="alert alert-danger">
                    <li>
                        <strong>No queda {{ $product->name }} en el inventario</strong>
                    </li>
                </div>    
                @endif
            @endforeach

   </ul>

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Nombre</th>

            <th>Cantidad</th>

            <th>Unidad Medida</th>

            <th>Precio Actual</th>

            <th>Proveedor</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->cantidad }}</td>

            <td>{{ $product->unidad_medida }}</td>

            <td>{{ $product->precio_actual }}</td>

            <td>{{ $product->proveedor }}</td>

            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">



                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Ver</a>



                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>



                    @csrf

                    @method('DELETE')



                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $products->links() !!}

</div>



@endsection
