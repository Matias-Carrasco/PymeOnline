<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        $roles = [
            "admin" => 1,
            "cliente" => 2,
            "tienda" => 3,
        ];

        $roleIds = $roles[$role] ?? [];

        if(auth()->user()->rol_id != $roleIds){
            abort(403);
        }

        return $next($request);
    }
}
