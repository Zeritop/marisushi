<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($orders as $order)
          ['{{ $order->estado }}',     11],
        
        @endforeach    
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>

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

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $order->estado }}</td>

            <td>{{ $order->fecha_entrega->format('d/m/Y H:i') }}</td>
            

            <td>

                <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Ver</a>
                
                <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Editar</a>

            </td>

        </tr>

        @endforeach
    
    </table>

  <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

    {!! $orders->links() !!} 

</div>
    
      

@endsection

