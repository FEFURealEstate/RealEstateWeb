<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DealSet;
use Illuminate\Http\Request;

class DealsController extends Controller
{
    public function __invoke(Request $request) {
        $deals = DealSet::all();

        return view('admin_views/deals_view', ['deals' => $deals]);
    }
}
