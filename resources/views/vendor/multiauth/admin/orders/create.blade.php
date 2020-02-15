<head>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment-with-locales.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>

@extends('vendor.multiauth.admin.administrador.layoutDTpicker')

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

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#personalizado" data-whatever="@personalizado">
                Agregar Item Personalizado</button>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#estandar" data-whatever="@estandar">Agregar item desde menu</button>



</div><!-- container -->

</div>


<!-- MODAL PERSONALIZAR-->
<div class="modal fade" id="personalizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Item con Ingredientes Personalizado</h5>
      </div>
      <div class="modal-body">
          <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <input type="hidden"  name="tipo" value="personalizado">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ingrediente Esencial</label>
              <select name="esencial" class="form-control" style="height: 40px;">
                    @foreach($personalizars as $personalizar)
                        @if($personalizar->categoria == 'Esencial')
                            <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
                        @endif
                    @endforeach

              </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ingrediente Principal</label>
            <select name="principal" class="form-control" style="height: 40px;">
                    <!--  <option value="" selected="">...</option> -->
              <option disabled selected>Selecciona el ingrediente principal</option>
                  @foreach($personalizars as $personalizar)
                      @if($personalizar->categoria == 'Principal')
                          <option value="{{ $personalizar->name}}"> {{ $personalizar->name}} </option>
                      @endif
                  @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Primer Ingrediente Secundario</label>
            <select name="secundario1" class="form-control" style="height: 40px;">
                    <!--  <option value="" selected="">...</option> -->
              <option disabled selected>Selecciona el primer ingrediente</option>
                  @foreach($personalizars as $personalizar)
                      @if($personalizar->categoria == 'Secundarios')
                          <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
                      @endif
                  @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Segundo Ingrediente Secundario</label>
            <select name="secundario2" class="form-control" style="height: 40px;">
                    <!--  <option value="" selected="">...</option> -->
              <option disabled selected>Selecciona el segundo ingrediente</option>
                  @foreach($personalizars as $personalizar)
                      @if($personalizar->categoria == 'Secundarios')
                          <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
                      @endif
                  @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Envoltura</label>
            <select name="envoltura" class="form-control" style="height: 40px;">
              <option disabled selected>Selecciona una envoltura</option>
                  @foreach($personalizars as $personalizar)
                      @if($personalizar->categoria == 'Envoltura')
                          <option value=" {{ $personalizar->name}} "> {{ $personalizar->name}} </option>
                      @endif
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
            <label for="message-text" class="col-form-label">Porcentaje de descuento(Opcional)</label>
            <input type="number" class="form-control" name="descuento" placeholder="Ejemplo: 10 (sin el signo %)">
          </div>

           <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha y Hora de Retiro del Pedido</label>
            <div class='input-group date' id='datetimepicker2'>
                <input type='text' class="form-control" name="fechaEntrega"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="message-text" class="col-form-label">Observación</label>
            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Opcional"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar Pago</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

<!-- Fin Modal NUEVO PERSONALIZAR-->

<!-- MODAL PERSONALIZAR-->
<div class="modal fade" id="estandar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Item del Menú</h5>
      </div>
      <div class="modal-body">
          <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <input type="hidden"  name="tipo" value="estandar">
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
            <label for="message-text" class="col-form-label">Porcentaje de descuento(Opcional)</label>
            <input type="number" class="form-control" name="descuento" placeholder="Ejemplo: 10 (sin el signo %)">
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
            <label for="message-text" class="col-form-label">Observación</label>
            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Opcional"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar Pago</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

<!-- Fin Modal NUEVO ESTANDAR-->



@endsection

<script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                //format: 'DD/MM/YYYY HH:mm',
                locale: 'es',
                minDate: new Date(),
                daysOfWeekDisabled: [6]




            });
        });
        $(function () {
            $('#datetimepicker2').datetimepicker({
                //format: 'DD/MM/YYYY HH:mm',
                locale: 'es',
                minDate: new Date(),
                daysOfWeekDisabled: [6]

            });
        });
    
    </script>



