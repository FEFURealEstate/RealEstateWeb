<?php

namespace App\Http\Middleware;

use App\Models\PersonSet_Agent;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsRealtor
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
            $user_id = Auth::user()->id;
            $realtor_id = PersonSet_Agent::query()->where('id', $user_id)->value('id');
            if($realtor_id !== null)
            {
                // echo "<script>console.log(' $userid ');</script>";
                // echo "<script>console.log(' $adm ');</script>";
                return $next($request);
            }
            return abort(404);
        }
        return redirect()->route('sign_in');
    }
}
