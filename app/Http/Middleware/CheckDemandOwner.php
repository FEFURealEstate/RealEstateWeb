<?php

namespace App\Http\Middleware;

use App\Models\DemandSet;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDemandOwner
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
        $user = Auth::user();
        $demandid = $request->route('req_id');
        $demand = DemandSet::query()->whereId($demandid)->whereClientId($user->id)->first();
        if($demand !== null)
        {
            return $next($request);
        }
        return abort(403);
    }
}
