@extends('layout.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@if ($message = Session::get('success'))
        <div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
            <strong class="mb-0">{{ $message }}</strong>
        </div>
			@endif
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
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" placeholder="Ingresa tu contraseña actual" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autofocus>

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Ingresa una contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirma la contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar Contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

