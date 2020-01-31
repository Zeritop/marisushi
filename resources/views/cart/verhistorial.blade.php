@extends('layout.principal')


@section('content')
<br>
<div class="container">
    <div class="row">
       
        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Ver Pedido </h2>
                
            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('cart.historial') }}"> Atras</a>

            </div>

        </div>



    </div>

    <br>

   
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Registro la compra:</strong>

                {{ $order->nombre_registra_compra }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Retira el pedido:</strong>

                {{ $order->nombre_retira }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Telefono:</strong>

                {{ $order->telefono }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Fecha de entrega:</strong>

                {{ $order->fecha_entrega }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Estado:</strong>

                {{ $order->estado }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Observación:</strong>

                {{ $order->observacion }}

            </div>

        </div>

        
    </div> <!-- fin row pedidos -->

    <br>

    <h4>ITEMS</h4>

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Item</th>

            <th>Precio</th>

            <th>Cantidad</th>

            <th>Imagen</th>

            <th width="280px">Acción</th>

        </tr>

        @foreach ($menuItems as $menuItem)

        <tr>

            <td>{{ ++$i }} </td>

            <td> {{ $menuItem->titulo }}</td>

            <td> {{ $menuItem->precio }}</td>

            <td> {{ $menuItem->cantidad }}</td>

            <td> imagen</td>

            <td>


            </td>

        </tr>

        @endforeach
    
    </table>

    <br>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            
            <div class="pull-right">

                <strong>Precio sin descuento: $</strong>

                {{ $order->precio_total_sin_descuento }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="pull-right">

                <strong>Descuento aplicado: %</strong>

                {{ $order->descuento }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="pull-right">
                <br>    

                <strong>Precio TOTAL: $</strong>

                {{ $order->precio_total_con_descuento }}

            </div>

        </div>

    </div>

    <br>







</div> <!-- fin container -->

@endsection