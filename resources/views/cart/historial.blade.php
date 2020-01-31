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

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Estado</th>

            <th>Fecha y Hora de Entrega</th>

            <th width="280px">Acción</th>

        </tr>

        @foreach ($orders as $order)
            @if($order->id_user_registra_compra == auth()->user()->id)
        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $order->estado }}</td>

            <td>{{ $order->fecha_entrega->format('d/m/Y H:i') }}</td>
            

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