<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Models\PersonSet_Admin;
use App\Models\PersonSet_Agent;
use App\Models\PersonSet_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $client = Roles::CLIENT;
        $agent = Roles::AGENT;
        $admin = Roles::ADMIN;

        $role = DB::select(/** @lang PostgreSQL */ <<<ASD
            SELECT CASE
                WHEN person_set__clients.id IS NOT NULL THEN $client
                WHEN person_set__agents.id IS NOT NULL THEN $agent
                WHEN person_set__admins.id IS NOT NULL THEN $admin
            ELSE -1
            END
            FROM person_sets
            LEFT JOIN person_set__clients ON person_sets.id = person_set__clients.id
            LEFT JOIN person_set__agents ON person_sets.id = person_set__agents.id
            LEFT JOIN person_set__admins ON person_sets.id = person_set__admins.id
            WHERE person_sets.id = ?
            ASD,
            [$user->id]
        )[0]->case;

        $payload = [];
        if ($role === $client) {
            $payload = PersonSet_Client::find($user->id);
        } else if ($role === $agent) {
            $payload = PersonSet_Agent::find($user->id);
        } else if ($role === $admin) {
            $payload = PersonSet_Admin::find($user->id);
        }

        return view('profile', ['user' => $user, 'role' => $role, 'payload' => $payload]);
    }
}
