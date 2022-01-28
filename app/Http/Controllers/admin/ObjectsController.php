<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RealEstateSet;
use App\Models\RealEstateSet_Apartment;
use App\Models\RealEstateSet_House;
use App\Models\RealEstateSet_Land;
use App\Models\SupplySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ObjectsController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            // TODO сделать валидацию
        ]);

        DB::beginTransaction();
        try {
            $real_estate = new RealEstateSet();
            $real_estate->address_city = $request['address_city'];
            $real_estate->address_street = $request['address_street'];
            $real_estate->address_house = $request['address_house'];
            $real_estate->address_number = $request['address_number'];
            $real_estate->coordinate_latitude = $request['coordinate_latitude'];
            $real_estate->coordinate_longitude = $request['coordinate_longitude'];
            $real_estate->save();

            switch ($request['estate_type']) {
                case "Квартира":
                    $estate_typed = new RealEstateSet_Apartment();
                    $estate_typed->id = $real_estate->id;
                    $estate_typed->total_area = $request['total_area'];
                    $estate_typed->floor = $request['floor'];
                    $estate_typed->rooms = $request['rooms'];
                    break;
                case "Дом":
                    $estate_typed = new RealEstateSet_House();
                    $estate_typed->id = $real_estate->id;
                    $estate_typed->total_area = $request['total_area'];
                    $estate_typed->total_floors = $request['total_floors'];
                    $estate_typed->total_rooms = $request['total_rooms'];
                    break;
                case "Земельный участок":
                    $estate_typed = new RealEstateSet_Land();
                    $estate_typed->id = $real_estate->id;
                    $estate_typed->total_area = $request['total_area'];
                    break;
            }
            $estate_typed->save();
            DB::commit();
            $request->flush();
        } catch (Throwable $e) {
            DB::rollBack();
            $request->flash();
            $request->session()->flash('error', 'Ошибка создания');
        }
        return redirect()->route('admin_objects_get');
    }

    public function get()
    {
        $objects = RealEstateSet::query()->paginate(50);
        return view('admin_views.objects_view', ['objects' => $objects]);
    }

    public function change(Request $request, $id)
    {
        $real_estate = RealEstateSet::whereId($id)->first();
        if ($real_estate === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $real_estate->address_city = $request['address_city'];
            $real_estate->address_street = $request['address_street'];
            $real_estate->address_house = $request['address_house'];
            $real_estate->address_number = $request['address_number'];
            $real_estate->coordinate_latitude = $request['coordinate_latitude'];
            $real_estate->coordinate_longitude = $request['coordinate_longitude'];
            $real_estate->save();

            switch ($request['estate_type']) {
                case "Квартира":
                    if ($real_estate->house !== null) {
                        RealEstateSet_House::whereId($id)->delete();
                    }
                    if ($real_estate->land !== null) {
                        RealEstateSet_Land::whereId($id)->delete();
                    }
                    $estate_typed = RealEstateSet_Apartment::whereId($id)->firstOrNew();
                    $estate_typed->total_area = $request['total_area'];
                    $estate_typed->floor = $request['floor'];
                    $estate_typed->rooms = $request['rooms'];
                    break;
                case "Дом":
                    if ($real_estate->apartment !== null) {
                        RealEstateSet_Apartment::whereId($id)->delete();
                    }
                    if ($real_estate->land !== null) {
                        RealEstateSet_Land::whereId($id)->delete();
                    }
                    $estate_typed = RealEstateSet_House::whereId($id)->firstOrNew();
                    $estate_typed->total_area = $request['total_area'];
                    $estate_typed->total_floors = $request['total_floors'];
                    $estate_typed->total_rooms = $request['total_rooms'];
                    break;
                case "Земельный участок":
                    if ($real_estate->apartment !== null) {
                        RealEstateSet_Apartment::whereId($id)->delete();
                    }
                    if ($real_estate->house !== null) {
                        RealEstateSet_House::whereId($id)->delete();
                    }
                    $estate_typed = RealEstateSet_Land::whereId($id)->firstOrNew();
                    $estate_typed->total_area = $request['total_area'];
                    break;
            }
            $estate_typed->id = $real_estate->id;
            $estate_typed->save();
            DB::commit();

            return redirect()->route('admin_objects_get');
        }
        return view('admin_views.change_objects', ['real_estate' => $real_estate]);
    }

    public function delete(Request $request, $id)
    {
        $supplyEmpty = SupplySet::whereRealEstateId($id)->get()->isEmpty();

        if ($supplyEmpty) {
            RealEstateSet::whereId($id)->delete();
        } else {
            $request->session()->flash('error', 'Ошибка удаления: объект связан с предложением');
        }
        return redirect()->route('admin_objects_get');
    }
}
