<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function __invoke(Request $request) {
        return view('admin_views/offers_view');
    }
}
