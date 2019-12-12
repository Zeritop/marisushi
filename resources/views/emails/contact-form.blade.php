@component('mail::message')
# Este correo fue recibido a través de la página Mari Sushi

<strong>Nombre</strong> {{ $data['nombre'] }}
<strong>Email</strong> {{ $data['email'] }}
<strong>Telefono</strong> {{ $data['telefono'] }}


<strong>Mensaje</strong> <br> 
{{ $data['mensaje'] }}



Fin del correo.<br>
{{ config('app.name') }}
@endcomponent
