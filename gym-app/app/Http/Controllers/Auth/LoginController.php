<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Direccion;
use App\Models\Password;

class LoginController extends Controller
{
    public function registro(Request $request) {

        $datos_usuario = $request->validate(
            [
                'dni' => 'required|string|max:10|unique:usuarios',
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'nombre_usuario' => 'required|string|max:255|unique:usuarios',
                'email' => 'required|string|email|max:255|unique:usuarios',
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

        $datos_password = $request->validate(
            [
                'password' => 'required|string|min:8',
            ]
        );

        $direccion = Direccion::create($datos_direccion);

        $datos_usuario['tipo_usuario'] = 'socio';
        $datos_usuario['activo'] = 0;
        $datos_usuario['saldo'] = 0.0;
        $datos_usuario['fecha_alta'] = date('Y-m-d');
        $datos_usuario['direccion_id'] = $direccion->id;
        if($request->hasFile('imagen')){
            $datos_usuario['imagen'] = $request->file('imagen')->store('images-profile', 'public');
        }
        else {
            // Asignar imagen predeterminada
            $datos_usuario['imagen'] = 'images-profile/user-default.jpg';
        }

        // Hash password
        $datos_password['password'] = password_hash($datos_password['password'], PASSWORD_DEFAULT);
        $user = User::create($datos_usuario);
        
        $datos_password['usuario_id'] = $user->id;
        $password = Password::create($datos_password);

        return view('usuario-registrado');
    }

    public function login(Request $request) {
        $datos = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ]
        );

        $user = User::where('email', $datos['email'])->first();
        if ($user) {
            
            //$password = Password::where('usuario_id', $user->id)->latest();
            $password = $user->password;
            if ($password && password_verify($datos['password'], $password)) {
                if ($user->activo) {
                    auth()->login($user);
                    return view('dashboard', ['user' => $user]);
                } else {
                    return redirect()->back()->withErrors(['general' => 'Tu cuenta no está activa. Inténtalo de nuevo más tarde.']);
                }
                
            }
            else {
                return redirect()->back()->withErrors(['general' => 'Credenciales incorrectas.']);
            }
        }
        else {
            return redirect()->back()->withErrors(['general' => 'Credenciales incorrectas.']);
        }

    }
}
