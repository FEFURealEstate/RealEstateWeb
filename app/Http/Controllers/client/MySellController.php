<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\DealSet;
use App\Models\NotFinishDeals;
use App\Models\PersonSet_Client;
use App\Models\RealEstateSet;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySellController extends Controller
{
    public function get_sell()
    {
        $user = Auth::user();
        $sells_open = SupplySet::query()
            ->where('client_id', $user->id)
            ->leftJoin('deal_sets', 'supply_sets.id', 'deal_sets.supply_id')
            ->whereNull('deal_sets.supply_id')
            ->select('supply_sets.*')
            ->orderByDesc('real_estate_id')
            ->get();
        
        $sells_close = SupplySet::query()
            ->where('client_id', $user->id)
            ->leftJoin('deal_sets', 'supply_sets.id', 'deal_sets.supply_id')
            ->select('supply_sets.*')
            ->where('deal_sets.supply_id', '!=', null)
            ->orderByDesc('real_estate_id')
            ->get();
        return view('client_views/my_sells', ['sells_open' => $sells_open, 'sells_close' => $sells_close]);
    }

    public function get_sell_info($sell_id)
    {
        $user = Auth::user();
        $user_payload = PersonSet_Client::find($user->id);
        $supply = SupplySet::whereId($sell_id)->first();
        $estate_type = null;

        $finished = DealSet::query()->whereSupplyId($supply->id)->get();
        $not_finish_deals = NotFinishDeals::query()->where('supply_id', $supply->id)->get();

        abort_if($supply === null, 404);


        $estate = $supply->realEstate;

        if($estate->apartment !== null)
        {
            $estate_type = 1;
            $estate_payload = $estate->apartment;
        }

        if($estate->house !== null)
        {
            $estate_type = 2;
            $estate_payload = $estate->house;
        }

        if($estate->land !== null)
        {
            $estate_type = 3;
            $estate_payload = $estate->land;
        }
        abort_if($estate_type === null, 404);

        return view('client_views/sell_info', ['finished' => $finished,'not_finish_deals' => $not_finish_deals, 'user' => $user, 'user_payload' => $user_payload, 'supply' => $supply, 'estate' => $estate, 'estate_payload' => $estate_payload, 'type' => $estate_type]);
    }

    public function delete_sell($sell_id)
    {
        $estate_id = SupplySet::whereId($sell_id)->first()->realEstate->id;
        RealEstateSet::query()->whereId($estate_id)->delete();
        return redirect()->route('my_sell');

    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sell_estate(Request $request)
    {
        $demand_id = $request['demand_id'];
        $supply_id = $request['sell_id'];

        $deal = new DealSet();
        $deal->demand_id = $demand_id;
        $deal->supply_id = $supply_id;
        $deal->save();

        NotFinishDeals::query()->whereDemandId($demand_id)->delete();
        NotFinishDeals::query()->whereSupplyId($supply_id)->delete();

        return redirect()->route('my_sell_info', ['sell_id' => $supply_id]);
    }
}

