<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!auth()->check()){
            return redirect('/login');
        }
        $user = auth()->user();
        foreach($roles as $rol){
            if($user->tipo_usuario == $rol){
                return $next($request);
            }
        }

        return abort(403, 'No tienes permisos para acceder a esta página');
    }
}
