<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Password;
use App\Rules\ValidDni;

class PerfilController extends Controller
{
    public function verPerfil() {
        $user = auth()->user();

        $direccion = $user->direccion;
        return view('perfil', ['user' => $user, 'direccion' => $direccion]);
    }

    public function modificar() {
        $user = auth()->user();
        $direccion = $user->direccion;
        return view('perfilModificar', ['user' => $user, 'direccion' => $direccion]);
    }

    public function guardarModificacion(Request $request) {

        // Validación DNI: 'dni' => ['required','string', new ValidDni,'max:10',Rule::unique('usuarios', 'dni')->ignore(auth()->user()->id)],
        $datos_usuario = $request->validate(
            [
                'dni' => ['required','string','max:10',Rule::unique('usuarios', 'dni')->ignore(auth()->user()->id)],
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'nombre_usuario' => ['required','string','max:255',Rule::unique('usuarios', 'nombre_usuario')->ignore(auth()->user()->id)],
                'email' => ['required','email','max:255',Rule::unique('usuarios', 'email')->ignore(auth()->user()->id)],
                'peso' => 'required|numeric|min:10|max:300',
                'altura' => 'required|numeric|min:50|max:300',
                'fecha_nacimiento' => 'required|date|before:today',
                'telefono' => 'required|numeric|digits:9',
                'genero' => 'required|in:hombre,mujer,no binario,prefiero no decirlo',
                'imagen' => 'file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]
        );

        $datos_direccion = $request->validate(
            [
                'pais' => 'required|string|max:255',
                'provincia' => 'required|string|max:255',
                'municipio' => 'required|string|max:255',
                'cp' => 'required|string|max:5',
                'direccion_envio' => 'required|string|max:255',
            ]
        );
        // Si se ha definido un archivo de imagen, se guarda en la carpeta storage/app/public/images/images-profile y se guarda la ruta en la base de datos
        if($request->hasFile('imagen')){
            $datos_usuario['imagen'] = $request->file('imagen')->store('images-profile', 'public');
        }

        $user = auth()->user();
        $user->update($datos_usuario);

        $direccion = $user->direccion;
        $direccion->update($datos_direccion);

        return redirect('/perfil')->with('message', 'Datos actualizados correctamente');
    }

    public function modificarPassword(Request $request) {
        $datos_password = $request->validate(
            [
                'password_actual' => 'required|string',
                'password_nuevo' => 'required|string|min:8',
                'repetir_password' => 'required|string|min:8',

            ]
        );
        if (!password_verify($datos_password['password_actual'], auth()->user()->password)) {
            return back()->withErrors(['password' => 'La contraseña actual no es correcta']);
        }
        if($datos_password['password_nuevo'] != $datos_password['repetir_password']){
            return back()->withErrors(['password' => 'Las contraseñas no coinciden']);
        }
        //Comprobar que la contraseña nueva no es igual a las 5 últimas contraseñas
        $passwords = Password::where('usuario_id', auth()->user()->id)->get();
        foreach($passwords as $password){
            if(password_verify($datos_password['password_nuevo'], $password->password)){
                return back()->withErrors(['password' => 'La contraseña no puede ser igual a las últimas 5 contraseñas']);
            }
        }
        // Crear nueva contraseña y guardarla
        Password::create([
            'usuario_id' => auth()->user()->id,
            'password' => password_hash($datos_password['password_nuevo'], PASSWORD_DEFAULT)
        ]);
        // Si el usuario tiene más de 5 contraseñas, borramos la más antigua
        $passwords = Password::where('usuario_id', auth()->user()->id)->get();
        if($passwords->count() > 5){
            $passwords->first()->delete();
        }

        return redirect('/perfil')->with('message', 'Contraseña actualizada correctamente');
    }

    public function darBaja() {
        $user = auth()->user();
        $user->update(['activo' => 0, 'fecha_baja' => date('Y-m-d')]);
        auth()->logout();
        return redirect('/')->with('message', 'Te has dado de baja correctamente');
    }
}
