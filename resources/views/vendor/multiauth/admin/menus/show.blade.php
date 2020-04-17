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

                  @if($menu->principal != null)
                    - {{ $menu->principal }}
                  @endif
                  
                  @if($menu->secundario1 != null)
                    - {{ $menu->secundario1 }}
                  @endif
                  
                  @if($menu->secundario2 != null)
                    - {{ $menu->secundario2 }}
                  @endif

                  @if($menu->envolturaInterna != null)
                    - {{ $menu->envolturaInterna }}
                  @endif

                  @if($menu->envolturaExterna != null)
                    - {{ $menu->envolturaExterna }}
                  @endif

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