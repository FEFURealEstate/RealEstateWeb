<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DemandSet;
use App\Models\PersonSet;
use App\Models\PersonSet_Client;
use App\Models\RealEstateFilterSet;
use App\Models\RealEstateFilterSet_ApartmentFilter;
use App\Models\RealEstateFilterSet_HouseFilter;
use App\Models\RealEstateFilterSet_LandFilter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateRequirementController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if($request->isMethod('post'))
        {
            $validated = $request->validate([
                'phone' => ['nullable','required_without:email','string', 'regex: /^(\+7|7|8){1}\ ?\(?[0-9]{3}\)?\ ?[0-9]{3}\ ?\-?\ ?[0-9]{2}\ ?\-?\ ?[0-9]{2}$/'],
                'email' => ['nullable','required_without:phone','string', 'email:rfc'],
            ]);
            DB::beginTransaction();
            try{
                $estate_filter_set = new RealEstateFilterSet();
                $estate_filter_set->save();
                
                if($request['estate_type'] == 1)
                {
                    $estate_filter_set_apartment = new RealEstateFilterSet_ApartmentFilter();
                    $estate_filter_set_apartment->min_floor = $request['min_floor'];
                    $estate_filter_set_apartment->max_floor = $request['max_floor'];
                    $estate_filter_set_apartment->min_area = $request['min_s'];
                    $estate_filter_set_apartment->max_area = $request['max_s'];
                    $estate_filter_set_apartment->min_rooms = $request['min_count'];
                    $estate_filter_set_apartment->max_rooms = $request['max_count'];
                    $estate_filter_set_apartment->id = $estate_filter_set->id;
                    $estate_filter_set_apartment->save();
                }

                if($request['estate_type'] == 2)
                {
                    $estate_filter_set_house = new RealEstateFilterSet_HouseFilter();
                    $estate_filter_set_house->min_floors = $request['min_floor'];
                    $estate_filter_set_house->max_floors = $request['max_floor'];
                    $estate_filter_set_house->min_area = $request['min_s'];
                    $estate_filter_set_house->max_area = $request['max_s'];
                    $estate_filter_set_house->min_rooms = $request['min_count'];
                    $estate_filter_set_house->max_rooms = $request['max_count'];
                    $estate_filter_set_house->id = $estate_filter_set->id;
                    $estate_filter_set_house->save();
                }


                if($request['estate_type'] == 3)
                {
                    $estate_filter_set_apartment = new RealEstateFilterSet_LandFilter();
                    $estate_filter_set_apartment->min_area = $request['min_s'];
                    $estate_filter_set_apartment->max_area = $request['max_s'];
                    $estate_filter_set_apartment->id = $estate_filter_set->id;
                    $estate_filter_set_apartment->save();
                }
                
                $demand_sets = new DemandSet();
                $demand_sets->address_city = $request['city'];
                $demand_sets->address_street = $request['street'];
                $demand_sets->address_house = $request['house_num'];
                $demand_sets->address_number = $request['flat_num'];
                $demand_sets->min_price = $request['min_price'];
                $demand_sets->max_price = $request['max_price'];
                $demand_sets->client_id = $request['user_id'];
                $demand_sets->real_estate_filter_id = $estate_filter_set->id;
                $demand_sets->save();

                DB::commit();
                
            }
            catch(Throwable $e){
                DB::rollBack();
                echo $e;//work pretty normal(maybe)
            }
            return redirect()->route('my_req');
        }
        
        $user = Auth::user();
        $payload = PersonSet_Client::find($user->id);
        return view('client_views/create_requirement', ['user' => $user, 'payload' => $payload]);
    }
}
