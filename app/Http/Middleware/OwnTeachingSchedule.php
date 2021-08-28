<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnTeachingSchedule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($user = Auth::user()){
            if($user->role === 'admin' || $user->teachSchedules->find($request->route('schedule'))){
                return $next($request);
            }
            return abort(403);
        }
        return redirect(route('login'));
    }
}
