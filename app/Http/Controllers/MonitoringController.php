<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\stock;

class MonitoringController extends Controller
{


    public function index()
    {
        $stock = DB::table('stock')->get();
        $results = DB::table('pengambilan')
        ->selectRaw('SUM(qty) AS qty, stock_id')
        ->groupBy('stock_id')
        ->get();

        $limit = 0;

        foreach ($stock as $stok) {
            foreach ($results as $result) {
                if ($stok->id==$result->stock_id){
                    $stok->qty=$stok->qty - $result->qty;
                    if($stok->qty < 3  )
                    $limit++ ;
                }
            }
        }
        return view('monitoring', compact('limit'));
    }

}

