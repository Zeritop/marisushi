<head>

<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--   GRAFICO ESTADOS -->
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_estados as $cont)
          ['{{ $cont->estado }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Estados',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO ESTADOS -->

    <!-- GRAFICO MENUS -->
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_pedidos as $cont)
          ['{{ $cont->titulo }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Menus',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO MENUS -->

    <!-- GRAFICO INGREDIENTES -->
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_esencial as $cont)
          ['{{ $cont->esencial }}',    {{ $cont->contador }} ],
        @endforeach
        @foreach ($contador_principal as $cont)
          ['{{ $cont->principal }}',    {{ $cont->contador }} ],
        @endforeach
        @foreach ($contador_secundario1 as $cont)
          ['{{ $cont->secundario1 }}',    {{ $cont->contador }} ],
        @endforeach
        @foreach ($contador_secundario2 as $cont)
          ['{{ $cont->secundario2 }}',    {{ $cont->contador }} ],
        @endforeach
        @foreach ($contador_envoltura as $cont)
          ['{{ $cont->envolturaExterna }}',    {{ $cont->contador }} ],
        @endforeach
        @foreach ($contador_envoltura1 as $cont)
          ['{{ $cont->envolturaInterna }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Ingredientes Menu Personalizado',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO INGREDIENTES -->

    <!-- GRAFICO VENTAS -->
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_ventas as $cont)
          ['{{ $cont->estado }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Ventas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d3'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO VENTAS -->
     <!-- GRAFICO VENTAS ESTACIONALES -->
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_ventas_estaciones as $cont)
          ['{{ $cont->estado }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Ventas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d4'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO VENTAS ESTACIONALES -->
     <!-- GRAFICO MENUS ESTACIONALES-->
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        @foreach ($contador_pedidos_estaciones as $cont)
          ['{{ $cont->titulo }}',    {{ $cont->contador }} ],
        @endforeach
        ]);

        var options = {
          title: 'Menus',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d5'));
        chart.draw(data, options);
      }
    </script>
    <!-- FIN GRAFICO MENUS ESTACIONALES-->
  </head>

@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <strong>{{ $message }}</strong>

        </div>

    @endif


      <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <strong>Info:</strong> El campo año es necesario para generar gráficos.<br><br>
      </div>


  <div class="row">
    <form action="{{ route('estadisticas') }}" method="get">
      <div class="col-md-6">
         <select name="mes_estado" class="form-control" style="height: 40px;">
                  <option disabled selected>Selecciona un mes (Opcional)</option>
                  <option value="01">Enero</option>
                  <option value="02">Febrero</option>
                  <option value="03">Marzo</option>
                  <option value="04">Abril</option>
                  <option value="05">Mayo</option>
                  <option value="06">Junio</option>
                  <option value="07">Julio</option>
                  <option value="08">Agosto</option>
                  <option value="09">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
              </select>
      </div>
      <div class="col-md-4">
        <input type="text" name="ano_estado" class="form-control" placeholder="Año">
      </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>

    </form>

    </div>
       <br>
    <div class="row">

         <div id="piechart_3d" style="width: 500px; height: 250px;" class="col-md-6"></div>
         <div id="piechart_3d1" style="width: 500px; height: 250px;" class="col-md-6"></div>
    </div>
    <div class="row">
        <div id="piechart_3d2" style="width: 500px; height: 250px;" class="col-md-6"></div>
         <div id="piechart_3d3" style="width: 500px; height: 250px;" class="col-md-6"></div>
    </div>
    <br>

    <h4>Datos por Estaciones del año</h4>
    <dv class="row">

          <form action="{{ route('estadisticas') }}" method="get">
              <div class="col-md-4" >
    <select name="select_estacion" class="form-control" style="height: 40px;">
<!--		<option value="" selected="">...</option> -->
      <option value="01">Primavera </option>
      <option value="02">Verano </option>
        <option value="03">Otoño </option>
        <option value="04">Invierno </option>

</select>
                  </div>
              <div class="col-md-4">
              <input type="text" class="form-control" name="ano_estacion" placeholder="año">
              </div>
              <div class="col-md-4">
              <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>

    </form>


    </dv>


    <div class="row">
        <div id="piechart_3d4" style="width: 500px; height: 250px;" class="col-md-6"></div>
        <div id="piechart_3d5" style="width: 500px; height: 250px;" class="col-md-6"></div>
    </div>






</div>



@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
