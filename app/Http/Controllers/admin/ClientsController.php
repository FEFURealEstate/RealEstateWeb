<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandSet;
use App\Models\PersonSet;
use App\Models\PersonSet_Client;
use App\Models\SupplySet;
use App\Sanitizers\PhoneSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class ClientsController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'login' => 'unique:person_sets|required|between: 5, 30|regex: /^[a-z0-9\-._]+$/i',
            'password' => 'required|between: 10, 30|regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&].{10,}$/',
            'phone' => ['nullable', 'required_without:email', 'string', 'regex: /^(\+7|7|8){1}\ ?\(?[0-9]{3}\)?\ ?[0-9]{3}\ ?\-?\ ?[0-9]{2}\ ?\-?\ ?[0-9]{2}$/'],
            'email' => ['nullable', 'required_without:phone', 'string', 'email:rfc'],
        ]);

        DB::beginTransaction();
        try {
            $person_user = new PersonSet();
            $person_user->login = $validated['login'];
            $person_user->password_hash = Hash::make($validated['password']);
            $person_user->first_name = $request['first_name'];
            $person_user->middle_name = $request['middle_name'];
            $person_user->last_name = $request['last_name'];
            $person_user->save();

            $person_client = new PersonSet_Client();
            $person_client->id = $person_user->id;
            $person_client->email = $validated['email'];
            $person_client->phone = PhoneSanitizer::num_sanitize($validated['phone']);
            $person_client->save();
            DB::commit();
            $request->flush();
        } catch (Throwable $e) {
            DB::rollBack();
            echo $e;
        }
        return redirect()->route('admin_clients_get');
    }

    public function get()
    {
        $clients = PersonSet_Client::query()->paginate(50);
        return view('admin_views/clients_view', ['clients' => $clients]);
    }

    public function change(Request $request, $id)
    {
        $client = PersonSet_Client::whereId($id)->first();
        if ($client === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'phone' => ['nullable', 'required_without:email', 'string', 'regex: /^(\+7|7|8){1}\ ?\(?[0-9]{3}\)?\ ?[0-9]{3}\ ?\-?\ ?[0-9]{2}\ ?\-?\ ?[0-9]{2}$/'],
                'email' => ['nullable', 'required_without:phone', 'string', 'email:rfc'],
            ]);

            $person = PersonSet::whereId($id)->first();
            $person->first_name = $request['first_name'];
            $person->middle_name = $request['middle_name'];
            $person->last_name = $request['last_name'];
            $client->email = $validated['email'];
            $client->phone = PhoneSanitizer::num_sanitize($validated['phone']);

            $person->save();
            $client->save();
            return redirect()->route('admin_clients_get');
        }
        return view('admin_views/change_clients', ['client' => $client]);
    }

    public function delete(Request $request, $id)
    {
        $demandEmpty = DemandSet::whereClientId($id)->get()->isEmpty();
        $supplyEmpty = SupplySet::whereClientId($id)->get()->isEmpty();

        if ($demandEmpty && $supplyEmpty) {
            PersonSet_Client::whereId($id)->delete();
        } else {
            $request->session()->flash('error', 'Ошибка удаления: клиент связан с потребностью или предложением');
        }
        return redirect()->route('admin_clients_get');
    }
}
