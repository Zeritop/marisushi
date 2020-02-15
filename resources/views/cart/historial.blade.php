@extends('layout.principal')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Historial de pedidos</h2>
            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success text-center">
            <p>{{ $message }} </p>

        </div>

    @endif

    <h4>Estados</h4>
    <h5 class="text-secondary">Pendiente: El pedido ha sido registrado.</h5>
    <h5 class="text-secondary">Anulado: El pedido ha sido anulado por la administración.</h5>
    <h5 class="text-secondary">Listo para Entregar: El pedido esta listo para ser retirado.</h5>
    <h5 class="text-secondary">Pagado: El pedido ha sido pagado, pero aun no entregado.</h5>
    <h5 class="text-secondary">Entregado: El pedido ha sido entregado al cliente.</h5>

   <br>
    <h3>Pedidos</h3>
    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Estado</th>

            <th>Fecha y Hora de Entrega</th>

            <th width="280px">Acción</th>

        </tr>

        @foreach ($orders as $order)
            @if($order->seccion == 'Usuario' && $order->estado != 'Entregado')
        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $order->estado }}</td>

            <td>{{ Carbon\Carbon::parse($order->fecha_entrega)->format('d/m/Y H:i') }}</td>
            

            <td>

                <a class="btn btn-info" href="{{ route('cart.verhistorial',$order->id) }}">Ver</a>
                

            </td>

        </tr>
            @endif
        @endforeach
    
    </table>

    <br>
    <h3>Pedidos Entregados</h3>
    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Estado</th>

            <th>Fecha y Hora de Entrega</th>

            <th width="280px">Acción</th>

        </tr>

        @foreach ($orders as $order)
            @if($order->seccion == 'Usuario' && $order->estado == 'Entregado')
        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $order->estado }}</td>

            <td>{{ Carbon\Carbon::parse($order->fecha_entrega)->format('d/m/Y H:i') }}</td>
            

            <td>

                <a class="btn btn-info" href="{{ route('cart.verhistorial',$order->id) }}">Ver</a>
                

            </td>

        </tr>
            @endif
        @endforeach
    
    </table>

  

   {!! $orders->links() !!} 

</div>
    
      

@endsection