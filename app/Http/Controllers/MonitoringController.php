<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\stock;

class MonitoringController extends Controller
{


    public function index()
    {
        $count = stock::where('qty', '<', 2 )->count();
        return view('monitoring', compact('count'));
    }

}

