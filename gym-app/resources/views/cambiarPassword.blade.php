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
                <label for="password_actual" class="form-label"><strong>Contraseña Actual</strong></label>
                <input type="password" id="password_actual" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                @error('password_actual')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_nuevo" class="form-label"><strong>Nueva Contraseña</strong></label>
                <a href="#" data-bs-toggle="modal" data-bs-target="#passwordModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="passwordModalLabel">Requisitos de la contraseña</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>Al menos 8 caracteres</li>
                                            <li>Una letra mayúscula</li>
                                            <li>Una letra minúscula</li>
                                            <li>Un número</li>
                                            <li>Un carácter especial (@ $ ! % * ? &)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                <input type="password" id="password_nuevo" name="password_nuevo" class="form-control @error('password_nuevo') is-invalid @enderror" required>
                @error('password_nuevo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="repetir_password" class="form-label"><strong>Repetir Nueva Contraseña</strong></label>
                <input type="password" id="repetir_password" name="repetir_password" class="form-control @error('repetir_password') is-invalid @enderror" required>
                @error('repetir_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center actividad-estilos">
                <button type="submit" class="button-password btn btn-danger m-2 ">Actualizar Contraseña</button>
                <a href="/perfil" class="btn a-volver">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
