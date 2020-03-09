@extends('vendor.multiauth.admin.administrador.layoutDTpicker')


@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Ver Pedido #000{{ $order->id }}</h2>

                <h5>Este pedido fue realizado desde la sección de: <strong> {{ $order->seccion }} </strong></h5> 

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <strong>Whoops!</strong> Parece que encontramos un problema.<br><br>
                    
                        <ul>
                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach
                        </ul>
                    </div>

                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <strong class="mb-0">{{ $message }}</strong>

                    </div>

                @endif

                @if($order->estado === 'Listo para Retirar')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrarPago" data-whatever="@registrarPago">
                Registrar Pago</button>
                @endif

                
                <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Editar</a>

            </div>

            <div class="pull-right">
              
              @if($order->estado === 'Pendiente')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#personalizado" data-whatever="@personalizado">
                Agregar Item Personalizado</button>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#estandar" data-whatever="@estandar">
                Agregar Item Menu</button>
              @endif
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

                {{ $order->fecha_entrega->format('d/m/Y H:i') }}

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

                <strong>Descuento: %</strong>

                {{ $order->descuento }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Sección:</strong>

                {{ $order->seccion }}

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

            <th>Ingredientes</th>

            <th>Precio</th>

            <th>Cantidad</th>

            <th>Imagen</th>

            <th width="280px">Acción</th>

        </tr>

        @foreach ($menuItems as $menuItem)

        <tr>

            <td>{{ ++$i }} </td>

            <td> {{ $menuItem->titulo }}</td>
            

            <td> @if($menuItem->esencial != null)
                     {{ $menuItem->esencial }}
                  @endif

                  @if($menuItem->principal != null)
                    - {{ $menuItem->principal }}
                  @endif
                  
                  @if($menuItem->secundario1 != null)
                    - {{ $menuItem->secundario1 }}
                  @endif
                  
                  @if($menuItem->secundario2 != null)
                    - {{ $menuItem->secundario2 }}
                  @endif

                  @if($menuItem->envolturaInterna != null)
                    - {{ $menuItem->envolturaInterna }}
                  @endif

                  @if($menuItem->envolturaExterna != null)
                    - {{ $menuItem->envolturaExterna }}
                  @endif

                  @if($menuItem->ingrediente1 != null)
                    - {{ $menuItem->ingrediente1 }}
                  @endif

                  @if($menuItem->ingrediente2 != null)
                    - {{ $menuItem->ingrediente2 }}
                  @endif

                  @if($menuItem->ingrediente3 != null)
                    - {{ $menuItem->ingrediente3 }}
                  @endif

                  @if($menuItem->ingrediente4 != null)
                    - {{ $menuItem->ingrediente4 }}
                  @endif

                  @if($menuItem->ingrediente5 != null)
                    - {{ $menuItem->ingrediente5 }}
                  @endif

            </td>

            

            <td> {{ $menuItem->precio }}</td>

            <td> {{ $menuItem->cantidad }}</td>

            <td> 
                @if(($menuItem->titulo != 'Sushi Personalizado: 10 piezas') && ($menuItem->titulo != 'Handroll Personalizado'))
                    <img width="500px;" src="/storage/{{ $menuItem->foto }}" style="height: 100px; width: auto;" ></td>
                @endif
            <td>
              @if($order->estado === 'Pendiente')
                <form action="{{ route('orders.quitarItem',$order->id) }}" method="POST">
                    @csrf

                    <input type="hidden"  name="order_id" value="{{ $order->id }}">
                    <input type="hidden"  name="menuItem_id" value="{{ $menuItem->id }}">
                    <button type="submit" class="btn btn-danger">Quitar</button>

                </form>
              @endif
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
              @if($order->estado === 'Pendiente')
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">ELIMINAR PEDIDO</button>

                </form>
              @endif
            </div>

        </div>



</div> <!-- fin container -->
</div>


<!-- Modal de Pago-->
<div class="modal fade" id="registrarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
      </div>
      <div class="modal-body">
        <p><strong>Precio Total: </strong>$ {{ $order->precio_total_con_descuento }} </p>
        <form action="{{ route('orders.registrarPago',$order->id) }}" method="POST">
            @csrf

                          <!-- METODO DE PAGO -->
          <input type="hidden"  name="order_id" value=" {{ $order->id }} ">
          <input type="hidden"  name="precio_total" value=" {{ $order->precio_total_con_descuento }} ">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Metodo de Pago</label>
              <select name="metodo_pago" class="form-control" style="height: 40px;" onchange="yesnoCheckMetodo(this);">
                  <option disabled selected>Selecciona un Método de Pago</option>
                  <option value="Efectivo">Efectivo</option>
                  <option value="Tarjeta">Tarjeta de Crédito o Débito</option>
                  <option value="Transferencia">Transferencia Electronica</option>
              </select>
          </div>

          <div class="form-group" id="ifTransferencia" style="display: none;">
                  <label for="recipient-name" class="col-form-label">Rut: (Opcional)</label> 
                  <input type="text" class="form-control" id="txt_rut" name="rut" onblur="onRutBlur(this);" placeholder="Ejemplo: 11111111-1">               
                  <h5 class="text-primary" id="msgValidator"></h5>
                  
          </div>

                        <!-- TIPO DE DOCUMENTO-->

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tipo de Documento</label>
              <select name="tipo_documento" class="form-control" style="height: 40px;" onchange="yesnoCheck2(this);">
                  <option disabled selected>Selecciona un tipo de Documento</option>
                  <option value="Boleta">Boleta</option>
                  <option value="Factura">Factura</option>
              </select>
          </div>

          <div class="form-group" id="ifFactura" style="display: none;">
                  <label for="recipient-name" class="col-form-label">Nombre de Empresa: (Opcional)</label> 
                  <input type="text" class="form-control" id="txt_nombre_empresa" name="nombre_empresa" placeholder="Nombre de Empresa">
          </div>

          <div class="form-group" id="ifFactura2" style="display: none;">
                  <label for="recipient-name" class="col-form-label">Rut Empresa: (Opcional)</label> 
                  <input type="text" class="form-control" id="txt_rut_empresa" name="rut_empresa"  onblur="onRutEmpresaBlur(this);" placeholder="Ejemplo: 111111111-1">
                  <h5 class="text-primary" id="msgValidatorE"></h5>
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

<!-- Fin Modal Pago-->


<!-- MODAL PERSONALIZAR-->
<div class="modal fade" id="personalizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Item con Ingredientes Personalizado</h5>
      </div>
      <div class="modal-body">
          <form action="{{ route('orders.agregarItem',$order->id) }}" method="POST">
            @csrf

            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titulo</label>
              <select name="titulo" class="form-control" style="height: 40px;">
                  <option disabled selected>Selecciona la forma</option>
                  <option value="Handroll Personalizado">Handroll Personalizado</option>
                  <option value="Sushi Personalizado: 10 piezas">Sushi Personalizado: 10 piezas</option>
              </select>
          </div>



          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ingrediente Esencial</label>
              <select name="esencial" class="form-control" style="height: 40px;">
                <option disabled selected>Selecciona el ingrediente esencial</option>
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
            <label for="recipient-name" class="col-form-label">Envoltura Interna</label>
            <select name="envolturaInterna" class="form-control" style="height: auto">
                <option disabled selected>Selecciona una envoltura interna</option>
                <option value="Nori">Con Nori</option>
                <option value="sinNori">Sin Nori</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Envoltura Externa</label>
            <select name="envolturaExterna" class="form-control" style="height: 40px;">
                    <!--  <option value="" selected="">...</option> -->
              <option disabled selected>Selecciona una envoltura externa</option>
                  @foreach($personalizars as $personalizar)
                      @if($personalizar->categoria == 'Envoltura externa')
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar menu personalizado</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

<!-- Fin Modal NUEVO PERSONALIZAR-->

<!-- Nuevo modal ESTANDAR-->

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar menú estandar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

<!-- Fin modal NUEVO ESTANDAR-->



@endsection

<script type="text/javascript">
function yesnoCheckMetodo(that) {
    if (that.value == "Transferencia") {
        document.getElementById("ifTransferencia").style.display = "block";
    } else {
        document.getElementById("ifTransferencia").style.display = "none";
        document.getElementById("txt_rut").value = "";
    }

}

function yesnoCheck2(that) {
    if (that.value == "Factura") {
        document.getElementById("ifFactura").style.display = "block";
        document.getElementById("ifFactura2").style.display = "block";
    } 

    if (that.value == "Boleta") {
        document.getElementById("ifFactura").style.display = "none";
        document.getElementById("ifFactura2").style.display = "none";
        document.getElementById("txt_nombre_empresa").value = "";
        document.getElementById("txt_rut_empresa").value = "";
    } 
}

function onRutBlur(obj) {
        if (VerificaRut(obj.value))
          $("#msgValidator").html("El Rut Ingresado es Válido");
        else 
          $("#msgValidator").html("El Rut Ingresado es Invalido");
      }

function onRutEmpresaBlur(obj) {
        if (VerificaRut(obj.value))
          $("#msgValidatorE").html("El Rut Ingresado es Válido");
        else 
          $("#msgValidatorE").html("El Rut Ingresado es Invalido");
      }


function VerificaRut(rut) {
    if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
        var caracteres = new Array();
        var serie = new Array(2, 3, 4, 5, 6, 7);
        var dig = rut.toString().substr(rut.toString().length - 1, 1);
        rut = rut.toString().substr(0, rut.toString().length - 2);

        for (var i = 0; i < rut.length; i++) {
            caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
        }

        var sumatoria = 0;
        var k = 0;
        var resto = 0;

        for (var j = 0; j < caracteres.length; j++) {
            if (k == 6) {
                k = 0;
            }
            sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
            k++;
        }

        resto = sumatoria % 11;
        dv = 11 - resto;

        if (dv == 10) {
            dv = "K";
        }
        else if (dv == 11) {
            dv = 0;
        }

        if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase())
            return true;
        else
            return false;
    }
    else {
        return false;
    }
}




</script>

