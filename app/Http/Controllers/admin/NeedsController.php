<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandSet;
use App\Models\PersonSet_Agent;
use Illuminate\Http\Request;

class NeedsController extends Controller
{
    public function view() {
        $req = DemandSet::query()
            ->where('agent_id', '=', null)
            ->get();

        return view('admin_views/needs_view', ['req' => $req]);
    }

    public function cur_view(Request $request)
    {
        $req_id = $request['req_id'];
        $demand = DemandSet::query()->whereId($req_id)->first();
        $realtors = PersonSet_Agent::query()->get();
        return view('admin_views/agent_needs', ['req_id' => $req_id, 'demand' => $demand, 'realtors' => $realtors]);
    }

    public function realtor_select(Request $request)
    {
        $req_id = $request['req_id'];
        $realtor_id = $request['realtor_id'];
        $demand = DemandSet::query()->whereId($req_id)->first();
        $demand->agent_id = $realtor_id;
        $demand->save();

        return redirect()->route('admin_needs');
    }
}
