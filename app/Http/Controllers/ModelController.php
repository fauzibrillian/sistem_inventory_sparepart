<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pemakaian;


class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abcmodel = DB::table('pemakaian')->get();
        $hasil = 0;
        $total = 0;
        $presentase=0;
        $keterangan='';
        foreach ($abcmodel as $abc) {
            $abc -> hasil = $abc -> qty * $abc -> harga;
            $total += $abc->hasil;
        }
        foreach ($abcmodel as $presentase){
            $presentase -> presentase = $presentase -> hasil / $total *100 ;
            if ($presentase->presentase > 80 && $presentase->presentase < 100 ) {
                $presentase->keterangan = 'A';
            } elseif ( $presentase->presentase > 50 && $presentase->presentase < 80 ){
                $presentase->keterangan = 'B';
            } elseif ( $presentase->presentase > 20 && $presentase->presentase < 50 ){
                $presentase->keterangan = 'C';
            } 
        }
        
        return view('abcmodel', ['abcmodel' => $abcmodel,'total'=> $total ,'presentase','keterangan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
