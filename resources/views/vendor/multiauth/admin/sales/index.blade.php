@extends('vendor.multiauth.admin.administrador.layout')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h3>Generar Informe de Ventas</h3>

            </div>

        </div>

    </div>

    <form action="{{ route('sales.generarInforme') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="year" placeholder="Ingresa un año">
            </div>  
            
        </div>
            <div class="col-md-4">
             <div class="form-group">
              <select name="month" class="form-control" style="height: 40px;">
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
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="height: 35px;">Generar Informe</button>
            </div>
        </div>
        
    </form>

</div>

<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h3>Historial de Ventas</h3>

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

            <th>Fecha</th>

            <th>Método de Pago</th>

            <th>Rut (Transferencia Eléctronica)</th>

            <th>Documento</th>

            <th>Nombre Empresa</th>

            <th>Rut Empresa</th>

            <th>Precio</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($ventas as $venta)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $venta->fecha_pago->format('d/m/Y') }}</td>

            <td>{{ $venta->metodo_pago }}</td>

            <td>{{ $venta->rut }}</td>

            <td>{{ $venta->tipo_documento }}</td>

            <td>{{ $venta->nombre_empresa }}</td>

            <td>{{ $venta->rut_empresa }}</td>

            <td>${{ $venta->precio_total }}</td>

            <td>   

                    <a class="btn btn-info" href="{{ route('orders.show',$venta->id_pedido) }}">Ver Pedido</a>


            </td>

        </tr>

        @endforeach

    </table>


    {!! $ventas->links() !!}

</div> <!-- fin container-->


    
      

@endsection