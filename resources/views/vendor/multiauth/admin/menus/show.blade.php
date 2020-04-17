@extends('vendor.multiauth.admin.administrador.layout')


@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Ver Menu</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('menus.index') }}"> Atras</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Titulo:</strong>

                {{ $menu->titulo }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripcion:</strong>

                {{ $menu->descripcion }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Precio:</strong>

                {{ $menu->precio }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Ingredientes:</strong>

                @if($menu->esencial != null)
                     {{ $menu->esencial }}
                  @endif

            <p>

            @if($menu->principal != null)
            {{ $menu->principal }} -
            @endif

            @if($menu->secundario1 != null)
            {{ $menu->secundario1 }} -
            @endif

            @if($menu->secundario2 != null)
            {{ $menu->secundario2 }} -
            @endif

            @if($menu->secundario3 != null)
            {{ $menu->secundario3 }} -
            @endif

            @if($menu->envolturaInterna != null)
            {{ $menu->envolturaInterna }} -
            @endif

            @if($menu->envolturaExterna != null)
            {{ $menu->envolturaExterna }}
            @endif
          </p>


            <p>
            @if($menu->principal2 != null)
            {{ $menu->principal2 }} -
            @endif

            @if($menu->secundario4 != null)
            {{ $menu->secundario4 }} -
            @endif

            @if($menu->secundario5 != null)
            {{ $menu->secundario5 }} -
            @endif

            @if($menu->secundario6 != null)
            {{ $menu->secundario6 }} -
            @endif

            @if($menu->envolturaExterna2 != null)
            {{ $menu->envolturaExterna2 }}
            @endif

            </p>

            <p>
            @if($menu->principal3 != null)
            {{ $menu->principal3 }} -
            @endif

            @if($menu->secundario7 != null)
            {{ $menu->secundario7 }} -
            @endif

            @if($menu->secundario8 != null)
            {{ $menu->secundario8 }} -
            @endif

            @if($menu->secundario9 != null)
            {{ $menu->secundario9 }} -
            @endif

            @if($menu->envolturaExterna3 != null)
            {{ $menu->envolturaExterna3 }}
            @endif
            </p>

            <p>
            @if($menu->principal4 != null)
            {{ $menu->principal4 }} -
            @endif

            @if($menu->secundario10 != null)
            {{ $menu->secundario10 }} -
            @endif

            @if($menu->secundario11 != null)
            {{ $menu->secundario11 }} -
            @endif

            @if($menu->secundario12 != null)
            {{ $menu->secundario12 }} -
            @endif

            @if($menu->envolturaExterna4 != null)
            {{ $menu->envolturaExterna4 }}
            @endif
            </p>

                  @if($menu->ingrediente1 != null)
                    - {{ $menu->ingrediente1 }}
                  @endif

                  @if($menu->ingrediente2 != null)
                    - {{ $menu->ingrediente2 }}
                  @endif

                  @if($menu->ingrediente3 != null)
                    - {{ $menu->ingrediente3 }}
                  @endif

                  @if($menu->ingrediente4 != null)
                    - {{ $menu->ingrediente4 }}
                  @endif

                  @if($menu->ingrediente5 != null)
                    - {{ $menu->ingrediente5 }}
                  @endif

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Fecha Creacion:</strong>

                {{ $menu->created_at }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Fecha Modificacion:</strong>

                {{ $menu->updated_at }}

            </div>

        </div>
        <img width="500px;" src="/storage/{{ $menu->foto }}"  alt="">
    </div>
</div>
    

@endsection