<?php

namespace App\Http\Resources;

use App\Enums\Roles;
use App\Models\PersonSet_Admin;
use App\Models\PersonSet_Agent;
use App\Models\PersonSet_Client;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
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
            LEFT JOIN person_set__clients
                ON person_sets.id = person_set__clients.id
            LEFT JOIN person_set__agents
                ON person_sets.id = person_set__agents.id
            LEFT JOIN person_set__admins
                ON person_sets.id = person_set__admins.id
            WHERE person_sets.id = ?
            ASD,
            [$this->id]
        )[0]->case;

        $payload = [];
        if ($role === $client) {
            $payload = PersonSet_Client::find($this->id);
        } else if ($role === $agent) {
            $payload = PersonSet_Agent::find($this->id);
        } else if ($role === $admin) {
            $payload = PersonSet_Admin::find($this->id);
        }

        return [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'login' => $this->login,
            'role' => $role,
            'payload' => $payload,
        ];
    }
}
