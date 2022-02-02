<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjectChangeController extends Controller
{
    public function __invoke(Request $request) {
        if ($request->isMethod('post')) {
            // Изменение объекта, я пока не понял как изменять в бд

            return redirect()->route('admin_objects');
        }

        return view('admin_views/change_objects');
    }
}
