@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card card-dar-baja shadow-sm bg-light" style="border-radius: 10px; padding: 20px;">
        <h3 class="text-center mb-4">Confirmación de Baja</h3>
        <p class="text-center mb-4">
            ¿Estás seguro de que deseas darte de baja de nuestra plataforma? 
            Este proceso es irreversible y no podrás volver a acceder a nuestra plataforma de socio.
        </p>
        <hr class="my-4">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <form action="/perfil/dar-baja" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Sí, quiero darme de baja</button>
                </form>
            </div>
            <div class="col-md-4 text-center">
                <a href="/perfil" class="btn btn-danger w-100">Cancelar</a>
            </div>
        </div>
    </div>
</div>
@endsection
