<?php

namespace App\Http\Middleware;

use App\Models\PersonSet;
use App\Models\PersonSet_Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
            $admin = Auth::user()->admin;
            if($admin !== null)
            {
                return $next($request);
            }
            return abort(403);
        }
        return redirect()->route('sign_in');
    }
}
