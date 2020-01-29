@extends('vendor.multiauth.admin.administrador.layout')


@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Ver Pedido #000{{ $order->id }}</h2>
                <h5>Este pedido fue realizado desde la sección de {{ $order->seccion }}</h5>
                <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Editar</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Registrar Pago</button>

            </div>

            <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#personalizado" data-whatever="@personalizado">Agregar Personalizado</button>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#estandar" data-whatever="@estandar">Agregar Item Menu</button>

                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Atras</a>

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

                <form action="{{ route('orders.quitarItem') }}" method="POST">
                    @csrf

                    <input type="hidden"  name="order_id" value="{{ $order->id }}">
                    <input type="hidden"  name="menuItem_id" value="{{ $menuItem->id }}">
                    <button type="submit" class="btn btn-danger">Quitar</button>

                </form>

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

    <br><br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="pull-right">

                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">ELIMINAR PEDIDO</button>

                </form>
            </div>

        </div>




<!-- modal  personalizado -->
<div class="form-group"> 

<div class="modal fade" id="personalizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Item Personalizado</h5>
      </div>

      <div class="modal-body">
        <form action="{{ route('orders.agregarItem',$order->id) }}" method="POST">
            @csrf
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
                    <!--  <option value="" selected="">...</option> -->
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
             <input type="hidden"  name="order_id" value="{{ $order->id }}">
             <input type="hidden"  name="tipo" value="personalizado">
          </div>

      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar Item</button>
      </div>

</form>

    </div>
  </div>
</div>

</div>

</div><!-- fin modal personalizado-->


<!-- modal estandar-->


<div class="modal fade" id="estandar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Item del Menú</h5>
      </div>

      <div class="modal-body">
        <form action="{{ route('orders.agregarItem',$order->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Item del menu</label>
            <select class="form-control" name="menuItem" style="height: 50px;">

                    <option disabled selected>Selecciona una opción</option>

                    @foreach ($menuItemsLists as $menuItemList)

                    <option value=" {{ $menuItemList->id }} "> {{ $menuItemList->titulo }} </option>

                    @endforeach

            </select>
          </div>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cantidad</label>
            <input type="number" min="1" class="form-control" name="cantidad">
             <input type="hidden"  name="order_id" value="{{ $order->id }}">
             <input type="hidden"  name="tipo" value="estandar">
          </div>

      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar Item</button>
      </div>

</form>

    </div>
  </div>
</div>


</div><!-- fin modal estandar-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('orders.agregarItem',$order->id) }}" method="POST">
            @csrf
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar Pago</button>
      </div>
    </div>
  </div>
</div>

<!-- FIN Modal Ejemplo-->

</div> <!-- fin container -->

@endsection