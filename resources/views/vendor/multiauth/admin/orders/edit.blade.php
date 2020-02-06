<head>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>

@extends('vendor.multiauth.admin.administrador.layout')
   

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar Pedido #000{{$order->id }}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('orders.show',$order->id) }}"> Atras</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> Parece haber algunos problemas con los siguientes campos.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('orders.update',$order->id) }}" method="POST">

        @csrf

        @method('PUT')

        <input type="hidden"  name="order_id" value="{{ $order->id }}">

            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado</label>
            <select name="estado" class="form-control" style="height: 40px;">
                <option disabled selected>Selecciona un estado</option>
                  @foreach($estados as $estado)
                          <option value=" {{ $estado->name}} "> {{ $estado->name}} </option>
                  @endforeach
              </select>
          </div>

            <div class="form-group">
            <label for="message-text" class="col-form-label">Nombre de Quien Retira el Pedido</label>
            <input type="text" class="form-control" value="{{ $order->nombre_retira }}" name="nombreRetira"> 
          </div>

          @if(!($order->estado === 'Pagado'))
          <div class="form-group">
            <label for="message-text" class="col-form-label">Porcentaje de descuento(Para eliminar un descuento, ingresar el valor 0)</label>
            <input type="number" class="form-control" value="{{ $order->descuento }}" name="descuento" placeholder="Ejemplo: 10 (sin el signo %)">
          </div>
          @endif

          <div class="form-group">
            <label for="message-text" class="col-form-label">Numero de Telefono</label>
            <input type="number" class="form-control" value="{{ $order->telefono }}" name="telefono">
          </div>

           <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha y Hora de Retiro del Pedido</label>
            <div class='input-group date' id='datetimepicker'>
                <input type='date' class="form-control" value="{{ $order->fechaEntrega }}"name="fechaEntrega"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>

            


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Actualizar</button>

            </div>

        


   

    </form>
</div>
    
<br>
@endsection

<script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                //format: 'DD/MM/YYYY HH:mm',
                minDate: new Date(),
                daysOfWeekDisabled: [6]




            });
        });

    
</script>