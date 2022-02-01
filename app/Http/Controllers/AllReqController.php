<?php

namespace App\Http\Controllers;

use App\Models\DealSet;
use App\Models\DemandSet;
use App\Models\NotFinishDeals;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllReqController extends Controller
{
    public function all_req()
    {
        $user = Auth::user();
        $req_open = DemandSet::query()
            ->where('agent_id', $user->id)
            ->leftJoin('deal_sets', 'demand_sets.id', 'deal_sets.demand_id')
            ->whereNull('deal_sets.demand_id')
            ->select('demand_sets.*')
            ->orderByDesc('real_estate_filter_id')
            ->get();

        $req_close = DemandSet::query()
            ->where('agent_id', $user->id)
            ->leftJoin('deal_sets', 'demand_sets.id', 'deal_sets.demand_id')
            ->select('demand_sets.*')
            ->where('deal_sets.demand_id', '!=', null)
            ->orderByDesc('real_estate_filter_id')
            ->get();
        return view('realtor_views/req_view', ['req_open' => $req_open, 'req_close' => $req_close]);
    }

    public function cur_req($req_id)
    {
        $client = DemandSet::whereId($req_id)->first()->client;
        $agent = DemandSet::whereId($req_id)->first()->agent;
        $demand = DemandSet::whereId($req_id)->first();
        $filter = DemandSet::whereId($req_id)->first()->realEstateFilter;
        $finished = DealSet::query()->whereDemandId($demand->id)->get();
        $estate_type = null;

        $sells = SupplySet::query()
            ->where('client_id', '!=', $client->id)
            ->where('agent_id', '=', $agent->id)
            ->leftJoin('deal_sets', 'supply_sets.id', 'deal_sets.supply_id')
            ->whereNull('deal_sets.supply_id')
            ->select('supply_sets.*')
            ->leftJoin('not_finish_deals', 'supply_sets.id', 'not_finish_deals.supply_id')
            ->whereNull('not_finish_deals.supply_id')
            ->select('supply_sets.*')
            ->get();

        abort_if($demand === null, 404);

        if($filter->apartmentFilter !== null)
        {
            $estate_type = 1;
        }
        if($filter->houseFilter !== null)
        {
            $estate_type = 2;
        }
        if($filter->landFilter !== null)
        {
            $estate_type = 3;
        }
        abort_if($estate_type === null, 404);
        return view('realtor_views/req_info', ['sells' => $sells, 'finished' => $finished, 'client' => $client, 'demand' => $demand, 'filter' => $filter, 'type' => $estate_type]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function offer_estate(Request $request)
    {
        $demand_id = $request['req_id'];
        $supply_id = $request['supply_id'];

        $offer = new NotFinishDeals();
        $offer->demand_id = $demand_id;
        $offer->supply_id = $supply_id;
        $offer->save();
        //echo $demand_id;
        return redirect()->route('cur_req', ['req_id' => $demand_id]);
    }
}
