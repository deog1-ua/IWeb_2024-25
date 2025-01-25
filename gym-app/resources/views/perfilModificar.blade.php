@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card card-modificar-perfil shadow-sm bg-light" style="border-radius: 10px; padding: 20px;">
        <h3 class="text-center mb-4">Modificar Datos del Perfil</h3>
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
        <form action="/perfil/modificar" method="POST" enctype="multipart/form-data">
            @csrf
            <h6 class="mb-0 mt-5">DATOS DE LA CUENTA</h6>
            <hr class="my-4 mt-0">
            <div class="row">
                <!-- Columna izquierda: Imagen de perfil y subida de archivo -->
                <div class="col-md-6 d-flex flex-column align-items-center">
                    <img src="/storage/{{ $user->imagen ?? '/images-profile/user-default.jpg' }}" 
                        alt="Foto de Perfil" 
                        style="width: 150px; height: 150px; border-radius: 50%;">
                    <label for="foto_perfil" class="form-label mt-3">Subir nueva imagen</label>
                    <input type="file" id="foto_perfil" name="imagen" class="form-control w-75">
                </div>

                <!-- Columna derecha: Datos de usuario -->
                <div class="col-md-6">
                    <div class="mt-1 mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
                        <input type="text" id="nombre_usuario" 
                            name="nombre_usuario" 
                            class="form-control @error('nombre_usuario') is-invalid @enderror"
                            value="{{ old('nombre_usuario', $user->nombre_usuario) }}" required>
                        @error('nombre_usuario')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" id="email" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="mb-0 mt-5">DATOS PERSONALES</h6>
            <hr class="my-4 mt-0">
            <!-- Nombre y Apellidos -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', $user->nombre) }}" required>
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror"
                           value="{{ old('apellidos', $user->apellidos) }}" required>
                    @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- DNI y Fecha de Nacimiento -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" id="dni" name="dni" class="form-control @error('dni') is-invalid @enderror"
                           value="{{ old('dni', $user->dni) }}" required>
                    @error('dni')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                           class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                           value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}" required>
                    @error('fecha_nacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Teléfono y Género -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                           value="{{ old('telefono', $user->telefono) }}" required>
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label">Género</label>
                    <select id="genero" name="genero" class="form-control @error('genero') is-invalid @enderror" required>
                        <option value="hombre" {{ old('genero', $user->genero) == 'hombre' ? 'selected' : '' }}>Hombre</option>
                        <option value="mujer" {{ old('genero', $user->genero) == 'mujer' ? 'selected' : '' }}>Mujer</option>
                        <option value="no binario" {{ old('genero', $user->genero) == 'no binario' ? 'selected' : '' }}>No binario</option>
                        <option value="prefiero no decirlo" {{ old('genero', $user->genero) == 'prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
                    </select>
                    @error('genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Peso y Altura -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" step="0.1" id="peso" name="peso" 
                           class="form-control @error('peso') is-invalid @enderror"
                           value="{{ old('peso', $user->peso) }}" required>
                    @error('peso')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="altura" class="form-label">Altura (cm)</label>
                    <input type="number" step="0.1" id="altura" name="altura" 
                           class="form-control @error('altura') is-invalid @enderror"
                           value="{{ old('altura', $user->altura) }}" required>
                    @error('altura')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Dirección -->
            <h6 class="mb-0 mt-5">DIRECCIÓN</h6>
            <hr class="my-4 mt-0">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="direccion_envio" class="form-label">Dirección</label>
                    <input type="text" id="direccion_envio" name="direccion_envio" 
                           class="form-control @error('direccion_envio') is-invalid @enderror"
                           value="{{ old('direccion_envio', $direccion->direccion_envio) }}" required>
                    @error('direccion_envio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-4 pb-3">
                <div class="col-md-4">
                    <label for="municipio" class="form-label">Municipio</label>
                    <input type="text" id="municipio" name="municipio" 
                           class="form-control @error('municipio') is-invalid @enderror"
                           value="{{ old('municipio', $direccion->municipio) }}" required>
                    @error('municipio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" id="provincia" name="provincia" 
                           class="form-control @error('provincia') is-invalid @enderror"
                           value="{{ old('provincia', $direccion->provincia) }}" required>
                    @error('provincia')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="cp" class="form-label">Código Postal</label>
                    <input type="text" id="cp" name="cp" 
                           class="form-control @error('cp') is-invalid @enderror"
                           value="{{ old('cp', $direccion->cp) }}" required>
                    @error('cp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" id="pais" name="pais" 
                class="form-control @error('pais') is-invalid @enderror"
                value="{{ old('pais', $direccion->pais) }}" required>
            </div>
            
            <!-- Botón de Guardar Cambios -->
            <div class="text-center actividad-estilos">
                <button type="submit" class="btn btn-danger m-2">Guardar Cambios</button>
                <a href="/perfil" class="btn a-volver">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
