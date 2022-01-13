<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\DealSet;
use App\Models\DemandSet;
use App\Models\PersonSet_Client;
use App\Models\RealEstateFilterSet;
use App\Models\RealEstateSet;
use Faker\Core\Number;
use Illuminate\Http\Request;
use App\Models\NotFinishDeals;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class MyRequirementsController extends Controller
{
    public function get_requirements()
    {
        $user = Auth::user();
        $req_open = DemandSet::query()
            ->where('client_id', $user->id)
            ->leftJoin('deal_sets', 'demand_sets.id', 'deal_sets.demand_id')
            ->whereNull('deal_sets.demand_id')
            ->select('demand_sets.*')
            ->orderByDesc('real_estate_filter_id')
            ->get();
        
        $req_close = DemandSet::query()
            ->where('client_id', $user->id)
            ->leftJoin('deal_sets', 'demand_sets.id', 'deal_sets.demand_id')
            ->select('demand_sets.*')
            ->where('deal_sets.demand_id', '!=', null)
            ->orderByDesc('real_estate_filter_id')
            ->get();
        return view('client_views/my_requirements', ['req_open' => $req_open, 'req_close' => $req_close]);
    }

    public function get_req_info($req_id)
    {
        $user = Auth::user();
        $user_payload = PersonSet_Client::find($user->id);
        $demand = DemandSet::whereId($req_id)->first();
        $estate_type = null;
        $not_finish_deals = NotFinishDeals::query()->where('demand_id', $demand->id)->get();
        
        $finished = DealSet::query()->whereDemandId($demand->id)->get();


        abort_if($demand === null, 404);

        if($demand->realEstateFilter->apartmentFilter !== null)
        {
            $estate_type = 1;
            $estate_payload = $demand->realEstateFilter->apartmentFilter;
        }
        if($demand->realEstateFilter->houseFilter !== null)
        {
            $estate_type = 2;
            $estate_payload = $demand->realEstateFilter->houseFilter;
        }
        if($demand->realEstateFilter->landFilter !== null)
        {
            $estate_type = 3;
            $estate_payload = $demand->realEstateFilter->landFilter;
        }
        abort_if($estate_type === null, 404);

        return view('client_views/requirements_info', ['finished' => $finished, 'user' => $user, 'user_payload' => $user_payload, 'demand' => $demand, 'estate_payload' => $estate_payload, 'type' => $estate_type, 'not_finish_deals' => $not_finish_deals]);
    }

    public function delete_req($req_id)
    {
        $estate_id = DemandSet::whereId($req_id)->first()->realEstateFilter->id;
        RealEstateFilterSet::query()->whereId($estate_id)->delete();
        return redirect()->route('my_req');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function buy_estate(Request $request)
    {
        $demand_id = $request['req_id'];
        $supply_id = $request['supply_id'];

        $deal = new DealSet();
        $deal->demand_id = $demand_id;
        $deal->supply_id = $supply_id;
        $deal->save();

        NotFinishDeals::query()->whereDemandId($demand_id)->delete();
        NotFinishDeals::query()->whereSupplyId($supply_id)->delete();

        return redirect()->route('my_req_info', ['req_id' => $demand_id]);
    }
}
