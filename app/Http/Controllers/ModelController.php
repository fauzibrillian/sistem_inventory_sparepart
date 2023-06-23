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
        $total_qty=0;
        $keterangan='';
        foreach ($abcmodel as $abc) {
            $abc -> hasil = $abc -> qty * $abc -> harga;

            $total_qty += $abc->qty;
            $total += $abc->hasil;

        }
        foreach ($abcmodel as $presentase){
            $presentase -> presentase = $presentase -> hasil / $total *100 ;

            if ($presentase->presentase > 20 && $presentase->presentase < 100 ) {
                $presentase->keterangan = 'A';
            } elseif ( $presentase->presentase > 10 && $presentase->presentase < 20 ){
                $presentase->keterangan = 'B';
            } elseif ( $presentase->presentase > 0 && $presentase->presentase < 20 ){
                $presentase->keterangan = 'C';
            } else {
                $presentase->keterangan = 'tidak ada';;
              }
        }
        
        return view('abcmodel', ['abcmodel' => $abcmodel,'total'=> $total,'total_qty'=> $total_qty]);
    }

    public function search_prediction(Request $request, Pemakaian $pemakaian)
    {
        $searchTerm = $request->input('search_prediction');
        $abcmodel = pemakaian::whereRaw("DATE_FORMAT( tanggal,'%m/%Y') = '$searchTerm' ")->get();
        $total_qty=[];
        foreach ($abcmodel as $abc) {
         $total_qty[] += $abc->qty;
        }

        $jumlahData = count($total_qty);
        // Jumlah bulan ke depan yang akan diprediksi
        $jangkaWaktu = 6;

        // Mengulang perhitungan rata-rata untuk setiap bulan ke depan
        $predictedData = [];
        for ($i = 0; $i < $jangkaWaktu; $i++) {
            $predictedData[] = round(array_sum(array_slice($total_qty, $jumlahData - $jangkaWaktu + $i, $jangkaWaktu))* 1.25);
        }
        
        return view('prediction', ['predictedData' => $predictedData,'total_qty'=> $total_qty , 'searchTerm' => $searchTerm]);
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

    public function search_abc(Request $request, Pemakaian $pemakaian)
    {
        $searchTerm = $request->input('search_abc');

        $abcmodel = pemakaian::whereRaw("DATE_FORMAT( tanggal,'%m/%Y') = '$searchTerm' ")->get();

        $hasil = 0;
        $total = 0;
        $presentase=0;
        $total_qty=0;
        $keterangan='';
        foreach ($abcmodel as $abc) {
            $abc -> hasil = $abc -> qty * $abc -> harga;

            $total_qty += $abc->qty;

            $total += $abc->hasil;

        }

        foreach ($abcmodel as $presentase){
            $presentase -> presentase = $presentase -> hasil / $total *100 ;

            if ($presentase->presentase > 20 && $presentase->presentase < 100 ) {
                $presentase->keterangan = 'A';
            } elseif ( $presentase->presentase > 10 && $presentase->presentase < 20 ){
                $presentase->keterangan = 'B';
            } elseif ( $presentase->presentase > 0 && $presentase->presentase < 20 ){
                $presentase->keterangan = 'C';
            } else {
                $presentase->keterangan = 'tidak ada';;
              }
        }
        
        return view('abcmodel', ['abcmodel' => $abcmodel,'total'=> $total,'total_qty'=> $total_qty]);
    }
}
