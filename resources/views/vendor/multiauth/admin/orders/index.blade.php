<head>
    
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
       

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


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
    <form action="orders" method="get">
        
        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="estado" placeholder="Estado">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                //format: 'DD/MM/YYYY HH:mm',
                minDate: new Date(),
                daysOfWeekDisabled: [6]




            });
        });
        $(function () {
            $('#datetimepicker2').datetimepicker({
                //format: 'DD/MM/YYYY HH:mm',
                minDate: new Date(),
                daysOfWeekDisabled: [6]




            });
        });
    
    </script>

