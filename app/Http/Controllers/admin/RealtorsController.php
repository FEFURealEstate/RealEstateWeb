<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PersonSet_Agent;
use App\Models\PersonSet_Client;
use Illuminate\Http\Request;

class RealtorsController extends Controller
{
    public function __invoke(Request $request) {
        $realtors = PersonSet_Agent::all();

        if ($request->isMethod('post')) {
            // Добавление риэлтора, я пока не понял как добавлять полное имя
        }

        return view('admin/realtors_view', ['realtors', $realtors]);
    }
}
