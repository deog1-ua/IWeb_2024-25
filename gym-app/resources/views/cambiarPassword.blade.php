@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card card-password shadow-sm bg-light">
        <h3 class="text-center mb-3">Modificar Contraseña</h3>
        <p class="text-center text-muted">Por favor, completa los campos para cambiar tu contraseña.</p>
        <hr class="my-4">
        @if ($errors->any())
            <div class="alert alert-danger text-danger text-danger-emphasis alert-dismissible fade show mt-2" role="alert">
                <ul class="mb-0" style="list-style: none; padding-left: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/perfil/modificar-password" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="password_actual" class="form-label"><strong>Contraseña Actual:</strong></label>
                <input type="password" id="password_actual" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                @error('password_actual')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_nuevo" class="form-label"><strong>Nueva Contraseña:</strong></label>
                <input type="password" id="password_nuevo" name="password_nuevo" class="form-control @error('password_nuevo') is-invalid @enderror" required>
                @error('password_nuevo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="repetir_password" class="form-label"><strong>Repetir Nueva Contraseña:</strong></label>
                <input type="password" id="repetir_password" name="repetir_password" class="form-control @error('repetir_password') is-invalid @enderror" required>
                @error('repetir_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="button-password btn btn-danger m-2 ">Actualizar Contraseña</button>
                <a href="/perfil">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
