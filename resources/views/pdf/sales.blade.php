<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
</head>
<body>
	<h1>Informe de Ventas</h1>
	<table class="table table-bordered">

        <tr>

            <th>Fecha</th>

            <th>Método de Pago</th>

            <th>Rut (Transferencia Eléctronica)</th>

            <th>Documento</th>

            <th>Nombre Empresa</th>

            <th>Rut Empresa</th>

            <th>Precio</th>


        </tr>

        @foreach ($ventas as $venta)

        <tr>

            <td>{{ date('d/m/Y', strtotime($venta->fecha_pago)) }}</td>

            <td>{{ $venta->metodo_pago }}</td>

            <td>{{ $venta->rut }}</td>

            <td>{{ $venta->tipo_documento }}</td>

            <td>{{ $venta->nombre_empresa }}</td>

            <td>{{ $venta->rut_empresa }}</td>

            <td>${{ $venta->precio_total }}</td>


        </tr>

        @endforeach

    </table>

</body>
</html>