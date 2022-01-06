<?php

namespace App\Http\Controllers;

use App\Models\PersonSet;
use App\Models\PersonSet_Client;
use App\Sanitizers\PhoneSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

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
            $request['login'] = strtolower($request['login']);
            $validated = $request->validate([
                'login' => 'unique:person_sets|required|between: 5, 30|regex: /^[\w\-]+$/',
                'password' => 'required|between: 10, 30|regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&].{10,}$/',
                'phone' => ['nullable','required_without:email','string', 'regex: /^(\+7|7|8){1}\ ?\(?[0-9]{3}\)?\ ?[0-9]{3}\ ?\-?\ ?[0-9]{2}\ ?\-?\ ?[0-9]{2}$/'],
                'email' => ['nullable','required_without:phone','string', 'email:rfc'],
            ]);

            DB::beginTransaction();
            try{
                $person_user = new PersonSet();
                $person_user->login = $validated['login'];
                $person_user->password_hash = Hash::make($validated['password']);
                $person_user->first_name = $request['firstname'];
                $person_user->middle_name = $request['middlename'];
                $person_user->last_name = $request['lastname'];
                $person_user->save();

                $person_client = new PersonSet_Client();
                $person_client->id = $person_user->id;
                $person_client->email = $validated['email'];
                $person_client->phone = PhoneSanitizer::num_sanitize($validated['phone']);
                $person_client->save();
                DB::commit();
            }
            catch(Throwable $e){
                DB::rollBack();
                echo $e;//сделать нормально
            }
                Auth::login($person_user);
                return redirect()->route('profile');
            
        }

        return view('sign_up_view');
    }
}
