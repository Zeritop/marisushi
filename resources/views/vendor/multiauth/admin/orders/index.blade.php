@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Sección de Pedidos</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('orders.create') }}"> Agregar Nuevo Pedido</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <strong>{{ $message }}</strong>

        </div>

    @endif
    <form action="orders" method="get">

        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <select name="estado" class="form-control" style="height: 40px;">
                <option disabled selected>Selecciona un estado</option>
                  @foreach($estados as $estado)
                          <option value=" {{ $estado->name}} "> {{ $estado->name}} </option>
                  @endforeach
              </select>
            </div>


        </div>
            <div class="col-md-3">
             <div class="form-group">
              <input type="date" class="form-control" name="fecha_entrega" placeholder="Fecha">

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

            <th>Estado</th>

            <th>Fecha y Hora de Entrega</th>

            <th>Retira</th>

            <th width="200px">Acción</th>

        </tr>

        @foreach ($orders as $order)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $order->estado }}</td>

            <td>{{ $order->fecha_entrega->format('d/m/Y H:i') }}</td>

            <td>{{ $order->nombre_retira }}</td>

            <td>

                <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Ver</a>


            </td>

        </tr>

        @endforeach

    </table>


    {!! $orders->links() !!}

</div>



@endsection
