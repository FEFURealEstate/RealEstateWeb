<?php

namespace App\Http\Controllers;

use App\Models\DealSet;
use App\Models\DemandSet;
use App\Models\NotFinishDeals;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllSellsController extends Controller
{
    public function all_sells()
    {
        $user = Auth::user();
        $sells_open = SupplySet::query()
            ->where('agent_id', $user->id)
            ->leftJoin('deal_sets', 'supply_sets.id', 'deal_sets.supply_id')
            ->whereNull('deal_sets.supply_id')
            ->select('supply_sets.*')
            ->orderByDesc('real_estate_id')
            ->get();
        
        $sells_close = SupplySet::query()
            ->where('agent_id', $user->id)
            ->leftJoin('deal_sets', 'supply_sets.id', 'deal_sets.supply_id')
            ->select('supply_sets.*')
            ->where('deal_sets.supply_id', '!=', null)
            ->orderByDesc('real_estate_id')
            ->get();
        return view('realtor_views/sell_view', ['sells_open' => $sells_open, 'sells_close' => $sells_close]);
    }

    public function cur_sell($sell_id)
    {
        $client = SupplySet::whereId($sell_id)->first()->client;
        $agent = SupplySet::whereId($sell_id)->first()->agent;
        $supply = SupplySet::whereId($sell_id)->first();
        $filter = SupplySet::whereId($sell_id)->first()->realEstate;
        $finished = DealSet::query()->whereSupplyId($supply->id)->get();
        $estate_type = null;

        $req = DemandSet::query()
            ->where('client_id', '!=', $client->id)
            ->where('agent_id', '=', $agent->id)
            ->leftJoin('deal_sets', 'demand_sets.id', 'deal_sets.demand_id')
            ->whereNull('deal_sets.demand_id')
            ->select('demand_sets.*')
            ->leftJoin('not_finish_deals', 'demand_sets.id', 'not_finish_deals.demand_id')
            ->whereNull('not_finish_deals.demand_id')
            ->select('demand_sets.*')
            ->get();

        abort_if($supply === null, 404);

        if($filter->apartment !== null)
        {
            $estate_type = 1;
        }
        if($filter->house !== null)
        {
            $estate_type = 2;
        }
        if($filter->land !== null)
        {
            $estate_type = 3;
        }
        abort_if($estate_type === null, 404);
        return view('realtor_views/sell_info', ['req' => $req, 'finished' => $finished, 'client' => $client, 'supply' => $supply, 'filter' => $filter, 'type' => $estate_type]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function offer_estate_sell(Request $request)
    {
        $demand_id = $request['req_id'];
        $supply_id = $request['sell_id'];

        $offer = new NotFinishDeals();
        $offer->demand_id = $demand_id;
        $offer->supply_id = $supply_id;
        $offer->save();

        return redirect()->route('cur_sell', ['sell_id' => $supply_id]);
    }
}
