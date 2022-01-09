<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientChangeController extends Controller
{
    public function __invoke(Request $request) {
        if ($request->isMethod('post')) {
            // Изменение клиента, я пока не понял как изменять в бд

            return redirect()->route('admin_clients');
        }

        return view('admin_views/change_clients');
    }
}
