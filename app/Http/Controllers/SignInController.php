<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
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
            $request['login'] = strtolower($request['login']);
            $validated = $request->validate([
                'login' => 'required|between: 5, 30',
                'password' => 'required|between: 10, 30',
            ]);
            
            if(Auth::attempt($validated))
            {
                $request->session()->regenerate();
                return redirect()->route('profile');
            }
            return redirect()->route('sign_in')->with('error', 'Invalid login or password');
        }

        return view('sign_in_view');
    }
}
