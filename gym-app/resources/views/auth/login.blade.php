@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-login bg-dark mr-4 p-4 shadow-sm" style="border-radius:15px"> 
        <div class="text-center">
            <h3>Iniciar sesión</h3>
        </div>
        <div class="container-fluid mt-4">
            <form action="" method="POST">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <label for="email" class="col-sm-10 col-form-label h6">Correo electrónico</label>
                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <label for="password" class="col-sm-10 col-form-label h6">Contraseña</label>
                        <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-outline-dark">Iniciar sesión</button>
                    </div>
                    
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            ¿No tienes cuenta? <a href="/registro">Regístrate</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection