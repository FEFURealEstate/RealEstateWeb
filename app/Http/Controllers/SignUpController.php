<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(Auth::check())
        {
            return redirect()->route('profile');
        }

        if($request->isMethod('post'))
        {
            //registration check
        }

        return view('sign_up_view');
    }
}
