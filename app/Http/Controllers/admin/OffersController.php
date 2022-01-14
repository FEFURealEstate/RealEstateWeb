<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PersonSet_Agent;
use App\Models\SupplySet;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function view() {
        $sells = SupplySet::query()
            ->where('agent_id', '=', null)
            ->get();

        return view('admin_views/offers_view', ['sells' => $sells]);
    }

    public function cur_view(Request $request)
    {
        $sell_id = $request['sell_id'];
        $supply = SupplySet::query()->whereId($sell_id)->first();
        $realtors = PersonSet_Agent::query()->get();
        return view('admin_views/agent_offers', ['sell_id' => $sell_id, 'supply' => $supply, 'realtors' => $realtors]);
    }

    public function realtor_select(Request $request)
    {
        $sell_id = $request['sell_id'];
        $realtor_id = $request['realtor_id'];
        $supply = SupplySet::query()->whereId($sell_id)->first();
        $supply->agent_id = $realtor_id;
        $supply->save();

        return redirect()->route('admin_offers');
    }
}
