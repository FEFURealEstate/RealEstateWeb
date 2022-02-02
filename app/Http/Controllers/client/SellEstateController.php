<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\PersonSet_Client;
use App\Models\RealEstateSet;
use App\Models\RealEstateSet_Apartment;
use App\Models\RealEstateSet_House;
use App\Models\RealEstateSet_Land;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class SellEstateController extends Controller
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
            DB::beginTransaction();
            try{
                $estate_set = new RealEstateSet();
                $estate_set->address_city = $request['city'];
                $estate_set->address_street = $request['street'];
                $estate_set->address_house = $request['house_num'];
                $estate_set->address_number = $request['flat_num'];
                $estate_set->coordinate_latitude = $request['latitude'];
                $estate_set->coordinate_longitude = $request['longitude'];
                $estate_set->save();

                $supply = new SupplySet();
                $supply->price = $request['price'];
                $supply->client_id = $request['user_id'];
                $supply->real_estate_id = $estate_set->id;
                $supply->save();

                if($request['estate_type'] == 1)
                {
                    $estate_set_apartment = new RealEstateSet_Apartment();
                    $estate_set_apartment->floor = $request['floor'];
                    $estate_set_apartment->rooms = $request['rooms'];
                    $estate_set_apartment->total_area = $request['total_area'];
                    $estate_set_apartment->id = $estate_set->id;
                    $estate_set_apartment->save();
                }

                if($request['estate_type'] == 2)
                {
                    $estate_set_house = new RealEstateSet_House();
                    $estate_set_house->total_area = $request['total_area'];
                    $estate_set_house->total_floors = $request['floor'];
                    $estate_set_house->total_rooms = $request['rooms'];
                    $estate_set_house->id = $estate_set->id;
                    $estate_set_house->save();
                }


                if($request['estate_type'] == 3)
                {
                    $estate_set_land = new RealEstateSet_Land();
                    $estate_set_land->total_area = $request['total_area'];
                    $estate_set_land->id = $estate_set->id;
                    $estate_set_land->save();
                }
                DB::commit();
            }
            catch(Throwable $e){
                DB::rollBack();
                echo $e;//work pretty normal(maybe)
            }
            return redirect()->route('my_sell');
        }
        $user = Auth::user();
        $payload = PersonSet_Client::find($user->id);
        return view('client_views/create_sell', ['user' => $user, 'payload' => $payload]);
    }
}
