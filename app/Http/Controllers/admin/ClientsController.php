<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PersonSet;
use App\Models\PersonSet_Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __invoke(Request $request) {
        $clients = PersonSet_Client::all();

        if ($request->isMethod('post')) {
            // Добавление клиента, я пока не понял как добавлять полное имя
        }

        return view('admin_views/clients_view', ['clients' => $clients]);
    }
}
