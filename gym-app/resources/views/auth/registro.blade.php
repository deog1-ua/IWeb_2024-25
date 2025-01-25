@extends('layouts.app')

@section('content')
<div class="container">
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
    <div class="mt-3">
        <h3>Formulario de inscripción</h3>
    </div>
    <div class="card card-registro bg-light mr-4 p-4 shadow-sm" style="border-radius:10px"> 
        <div class="container-fluid mt-4">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <h6 class="mb-0">DATOS PERSONALES</h6>
                <hr class="my-4 mt-0">

                <!-- Campos Nombre y Apellidos en la misma línea -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre" class="col-form-label ">Nombre</label>
                        <input id="nombre" placeholder="Nombre" type="text" 
                            class="form-control @error('nombre') is-invalid @enderror" 
                            name="nombre" value="{{ old('nombre') }}" 
                            required autocomplete="nombre">
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="apellidos" class="col-form-label ">Apellidos</label>
                        <input id="apellidos" placeholder="Apellidos" type="text" 
                            class="form-control @error('apellidos') is-invalid @enderror" 
                            name="apellidos" value="{{ old('apellidos') }}" 
                            required autocomplete="apellidos">
                        @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Campos DNI, Fecha de Nacimiento y Teléfono en la misma línea -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="dni" class="col-form-label">DNI</label>
                        <input id="dni" placeholder="DNI" type="text" 
                            class="form-control @error('dni') is-invalid @enderror" 
                            name="dni" value="{{ old('dni') }}" 
                            required autocomplete="dni">
                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento</label>
                        <input id="fecha_nacimiento" type="date" 
                            class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                            name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" 
                            required autocomplete="fecha_nacimiento">
                        @error('fecha_nacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="telefono" class="col-form-label">Teléfono</label>
                        <input id="telefono" placeholder="Teléfono" type="number" 
                            class="form-control @error('telefono') is-invalid @enderror" 
                            name="telefono" value="{{ old('telefono') }}" 
                            required autocomplete="telefono">
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Campos Género, Peso y Altura en la misma línea -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="genero" class="col-form-label">Género</label>
                        <select id="genero" 
                            class="form-control @error('genero') is-invalid @enderror" 
                            name="genero" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="hombre" {{ old('genero') == 'hombre' ? 'selected' : '' }}>Hombre</option>
                            <option value="mujer" {{ old('genero') == 'mujer' ? 'selected' : '' }}>Mujer</option>
                            <option value="no binario" {{ old('genero') == 'no binario' ? 'selected' : '' }}>No binario</option>
                            <option value="prefiero no decirlo" {{ old('genero') == 'prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
                        </select>
                        @error('genero')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="peso" class="col-form-label">Peso (kg)</label>
                        <input id="peso" placeholder="Peso" type="number" step="0.1" 
                            class="form-control @error('peso') is-invalid @enderror" 
                            name="peso" value="{{ old('peso') }}" 
                            required autocomplete="peso" min="0">
                        @error('peso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="altura" class="col-form-label">Altura (cm)</label>
                        <input id="altura" placeholder="Altura" type="number" step="0.1" 
                            class="form-control @error('altura') is-invalid @enderror" 
                            name="altura" value="{{ old('altura') }}" 
                            required autocomplete="altura" min="0">
                        @error('altura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Campos de Dirección -->
                <h6 class="mb-0 mt-5">DIRECCIÓN</h6>
                <hr class="my-4 mt-0">
                <div class="row mb-3">
                    <!-- Campo Dirección-->
                    <div class="col-md-9">
                        <label for="direccion_envio" class="col-form-label">Dirección</label>
                        <input id="direccion_envio" placeholder="Dirección" type="text" 
                            class="form-control @error('direccion_envio') is-invalid @enderror" 
                            name="direccion_envio" value="{{ old('direccion_envio') }}" 
                            required autocomplete="direccion_envio">
                        @error('direccion_envio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Campo Municipio -->
                    <div class="col-md-3">
                        <label for="municipio" class="col-form-label">Municipio</label>
                        <input id="municipio" placeholder="Municipio" type="text" 
                            class="form-control @error('municipio') is-invalid @enderror" 
                            name="municipio" value="{{ old('municipio') }}" 
                            required autocomplete="municipio">
                        @error('municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Campo Código Postal -->
                    <div class="col-md-4">
                        <label for="cp" class="col-form-label">Código Postal</label>
                        <input id="cp" placeholder="Código Postal" type="text" 
                            class="form-control @error('cp') is-invalid @enderror" 
                            name="cp" value="{{ old('cp') }}" 
                            required autocomplete="cp">
                        @error('cp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>          
                    <!-- Campo Provincia -->
                    <div class="col-md-4">
                        <label for="provincia" class="col-form-label">Provincia</label>
                        <input id="provincia" placeholder="Provincia" type="text" 
                            class="form-control @error('provincia') is-invalid @enderror" 
                            name="provincia" value="{{ old('provincia') }}" 
                            required autocomplete="provincia">
                        @error('provincia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Campo País (No editable, predefinido a España) -->
                    <div class="col-md-4">
                        <label for="pais" class="col-form-label">País</label>
                        <input id="pais" type="text" 
                            class="form-control @error('pais') is-invalid @enderror" 
                            name="pais" value="España" 
                            readonly>
                        @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Campos de Cuenta -->
                <h6 class="mb-0 mt-5">DATOS DE LA CUENTA</h6>
                <hr class="my-4 mt-0">

                <!-- Imagen y Nombre de Usuario en la misma línea -->
                <div class="row align-items-center mb-4">
                    <!-- Foto de Perfil -->
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="me-3 text-center">
                            <img src="/storage/{{ $user->imagen ?? '/images-profile/user-default.jpg' }}" 
                                alt="Foto de Perfil" 
                                style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                        </div>
                        <div>
                            <label for="foto_perfil" class="col-form-label">Foto de perfil</label>
                            <span class="badge text-bg-light">(opcional)</span>
                            <input type="file" id="foto_perfil" name="imagen" class="form-control mt-2">
                        </div>
                    </div>
                    
                    <!-- Campo Nombre de Usuario -->
                    <div class="col-md-6">
                        <label for="nombre_usuario" class="col-form-label">Nombre de Usuario</label>
                        <input id="nombre_usuario" placeholder="Nombre de Usuario" type="text" 
                            class="form-control @error('nombre_usuario') is-invalid @enderror" 
                            name="nombre_usuario" value="{{ old('nombre_usuario') }}" 
                            required autocomplete="nombre_usuario">
                        @error('nombre_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <!-- Otros Campos de Datos de la Cuenta -->
                <div class="row mb-3">
                    <!-- Campo Correo Electrónico -->
                    <div class="col-md-6">
                        <label for="email" class="col-form-label">Correo Electrónico</label>
                        <input id="email" placeholder="Email" type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" 
                            required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="col-md-6">
                        <label for="password" class="col-form-label">Contraseña</label>
                        <!-- Icono para abrir el modal -->
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

                        <input id="password" placeholder="Contraseña" type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <!-- Botón de Solicitud -->
                <div class="row justify-content-center">
                    <div class="text-center mt-3 mb-3">
                        <button type="submit" class="btn btn-outline-danger button-solicitar">SOLICITAR</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection