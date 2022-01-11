<?php

namespace App\Http\Middleware;

use App\Models\PersonSet_Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUser
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
        if(Auth::check())
        {   
            $user = Auth::user()->client;
            if($user !== null)
            {
                return $next($request);
            }
            return abort(403);
        }
        return redirect()->route('sign_in');
    }
}
