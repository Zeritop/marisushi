@extends('vendor.multiauth.admin.administrador.layout') 
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="card-body">
                @include('multiauth::message')
                     You are logged in to {{ config('multiauth.prefix') }} side! jajaj
		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
