<head>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
      
</head>

@extends('layout.principal1')

@section('content')

<div class="container">
    
    @if($cart)
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Detalle del Pedido</h2>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
     @if ($message = Session::get('danger'))

        <div class="alert alert-danger">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-hover">

        <tr>

            <th>No</th>

            <th>Titulo</th>

            <th>Precio</th>
            
            <th>Cantidad</th>

        </tr>

        @foreach($cart->items as $menu)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $menu['title'] }}</td>


            <td>{{ $menu['precio'] }}</td>
            
            <td>{{ $menu['qty'] }}</td>
            

        </tr>

        @endforeach
        
    </table>
    <div class="pull-right">
    <h4>Precio Total:  ${{ $cart->totalPrice}} -  Cantidad Total:  {{ $cart->totalQty }}</h4>
    </div>
    
    <br><br>
    <div class="col-md-4"> 
    <div class="card">
    <div class="card-body">
        <h3 class="card-titel">
            Formulario de entrega
            <hr>
        </h3>
        <div class="card-text">    
        <form action="{{ route('cart.store') }}" method="post">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Persona que retira</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre_retira">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Telefono</label>
    <input type="tel" class="form-control" id="exampleInputPassword1" name="telefono">
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Codigo de descuento</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="codigo">
  </div>
 <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha y Hora de Retiro del Pedido</label>
            <div class='input-group date' id='datetimepicker'>
                <input type='text' class="form-control" name="fecha_entrega" placeholder="00/00/2020 00:00 PM"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
  <button type="submit" class="btn btn-primary">Aceptar</button>
</form>
        </div>
    </div>
</div>

    </div>



</div>

    @endif
      

@endsection


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