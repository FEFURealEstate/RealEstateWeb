<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandSet;
use App\Models\PersonSet;
use App\Models\PersonSet_Agent;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RealtorsController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'login' => 'unique:person_sets|required|between: 5, 30|regex: /^[a-z0-9\-._]+$/i',
            'password' => 'required|between: 10, 30|regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&].{10,}$/',
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

            $person_agent = new PersonSet_Agent();
            $person_agent->id = $person_user->id;
            if ($request['deal_share'] != null) {
                $person_agent->deal_share = $request['deal_share'];
            }
            $person_agent->save();
            DB::commit();
            $request->flush();
        } catch (Throwable $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Ошибка создания');
        }
        return redirect()->route('admin_realtors_get');
    }

    public function get()
    {
        $agents = PersonSet_Agent::query()->paginate(50);
        return view('admin_views.realtors_view', ['agents' => $agents]);
    }

    public function change(Request $request, $id)
    {
        $agent = PersonSet_Agent::whereId($id)->first();
        if ($agent === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $person = PersonSet::whereId($id)->first();
            $person->first_name = $request['first_name'];
            $person->middle_name = $request['middle_name'];
            $person->last_name = $request['last_name'];
            if ($request['deal_share'] != null) {
                $agent->deal_share = $request['deal_share'];
            }
            $person->save();
            $agent->save();
            return redirect()->route('admin_realtors_get');
        }
        return view('admin_views.change_realtors', ['agent' => $agent]);
    }

    public function delete(Request $request, $id)
    {
        $demandEmpty = DemandSet::whereAgentId($id)->get()->isEmpty();
        $supplyEmpty = SupplySet::whereAgentId($id)->get()->isEmpty();

        if ($demandEmpty && $supplyEmpty) {
            PersonSet::whereId($id)->delete();
        } else {
            $request->session()->flash('error', 'Ошибка удаления: клиент связан с потребностью или предложением');
        }
        return redirect()->route('admin_realtors_get');
    }

    public function view($id)
    {
        $agent = PersonSet_Agent::whereId($id)->first();
        if ($agent === null) {
            abort(404);
        }
        $demands = DemandSet::whereAgentId($id)->get();
        $supplies = SupplySet::whereAgentId($id)->get();

        return view('admin_views.realtors_view_all_d&s', ['agent' => $agent, 'demands' => $demands, 'supplies' => $supplies]);
    }
}
