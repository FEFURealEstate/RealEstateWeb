<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RealEstateSet;
use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    public function __invoke(Request $request) {
        $objects = RealEstateSet::all();

        if ($request->isMethod('post')) {
            // Добавление объекта, я пока не понял как добавлять тип, этаж и комнату
        }

        return view('admin_views/objects_view', ['objects' => $objects]);
    }
}
