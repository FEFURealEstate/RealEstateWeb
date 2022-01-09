<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RealtorChangeController extends Controller
{
    public function __invoke(Request $request) {
        if ($request->isMethod('post')) {
            // Изменение риэлтора, я пока не понял как изменять в бд

            return redirect()->route('admin_realtors');
        }

        return view('admin_views/change_realtors');
    }
}
