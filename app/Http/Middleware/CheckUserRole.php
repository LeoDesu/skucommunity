<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($user = Auth::user()){
            if($user->role === 'admin' || $user->role === $role){
                return $next($request);
            }
            return abort(403);
        }
        return redirect(route('login'));
    }
}
