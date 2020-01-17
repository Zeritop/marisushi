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

            <h2>Crear Nuevo Pedido</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Atras</a>

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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar menu personalizado</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar item desde menu</button>



<div class="form-group">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
      </div>

      <div class="modal-body">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Item del menu</label>
            <select class="form-control" name="menuItem" style="height: 50px;">
                    <option disabled selected>Selecciona una opción</option>

                    @foreach ($menuItems as $menuItem)

                    <option value=" {{ $menuItem->id }} "> {{ $menuItem->titulo }} </option>

                    @endforeach

            </select>
          </div>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cantidad</label>
            <input type="number" min="1" class="form-control" name="cantidad">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Nombre de Quien Retira el Pedido</label>
            <input type="text" class="form-control" name="nombreRetira">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Numero de Telefono</label>
            <input type="number" class="form-control" name="telefono">
          </div>

           <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha y Hora de Retiro del Pedido</label>
            <div class='input-group date' id='datetimepicker'>
                <input type='text' class="form-control" name="fechaEntrega"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="message-text" class="col-form-label">observacion</label>
            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Opcional"></textarea>
          </div>


      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
      </div>

</form>

    </div>
  </div>
</div>

</div><!-- form group -->

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



