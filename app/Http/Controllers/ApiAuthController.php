<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\PersonSet;
use App\Models\PersonSet_Client;
use App\Models\User;
use App\Sanitizers\PhoneSanitizer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ApiAuthController extends Controller
{
    public function sign_up(Request $request) : JsonResponse
    {
        $request['login'] = strtolower($request['login']);
        $validator = Validator::make($request->all(), [
            'login' => 'unique:person_sets|required|between: 5, 30|regex: /^[\w\-]+$/',
            'password' => 'required|between: 10, 30|regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&].{10,}$/',
            'phone' => ['nullable','required_without:email','string', 'regex: /^(\+7|7|8){1}\ ?\(?[0-9]{3}\)?\ ?[0-9]{3}\ ?\-?\ ?[0-9]{2}\ ?\-?\ ?[0-9]{2}$/'],
            'email' => ['nullable','required_without:phone','string', 'email:rfc'],
        ]);

        if($validator->fails())
        {
            $validate_err = $validator->errors()->all();
            return response()->json(['message' => $validate_err], 422);
        }

        DB::beginTransaction();
        try{
            $validated = $validator->validated();
            $person_user = new PersonSet();
            $person_user->login = $validated['login'];
            $person_user->password_hash = Hash::make($validated['password']);
            $person_user->first_name = $request['firstname'];
            $person_user->middle_name = $request['middlename'];
            $person_user->last_name = $request['lastname'];
            $person_user->save();

            $person_client = new PersonSet_Client();
            $person_client->id = $person_user->id;
            $person_client->email = $validated['email'] ?? null;
            $person_client->phone = PhoneSanitizer::num_sanitize($validated['phone'] ?? null);
            $person_client->save();

            DB::commit();
        }
        catch(Throwable $e){
            DB::rollBack();
            return response()->json(['message' => 'Create user error'], 422);
        }

        $token = $person_user->createToken('token')->plainTextToken;

        $response = [
            'token' => $token,
            'person' => new UserResource($person_user),
        ];

        return response()->json($response, 201);
    }

    public function sign_in(Request $request) : JsonResponse
    {
        $request['login'] = strtolower($request['login']);
        $validator = Validator::make($request->all(), [
            'login' => 'required|between: 5, 30',
            'password' => 'required|between: 10, 30',
        ]);

        if($validator->fails())
        {
            $validate_err = $validator->errors()->all();
            return response()->json(['message' => $validate_err], 422);
        }

        $validated = $validator->validated();

        if (!Auth::attempt(['login' => $validated['login'], 'password' => $validated['password']]))
            return response()->json(['message' => 'Invalid login or password'], 422);

        $person = PersonSet::query()->where('login', $validated['login'])->first();

        $token = $person->createToken('token')->plainTextToken;

        $response = [
            'token' => $token,
            'user' => new UserResource($person),
        ];

        return response()->json($response, 201);
    }

    public function profile(Request $request) : JsonResponse
    {
        $user = Auth::user();
        return response()->json([new UserResource($user)]);
    }

    public function logout(Request $request) : JsonResponse
    {
        Auth::user()->tokens->delete();
        return response()->json(['message' => 'exited']);
    }
}