<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pemakaian;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemakaian = DB::table('pemakaian')->get();
        return view('pemakaian', ['pemakaian' => $pemakaian]);
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
    public function edit(Pemakaian $pemakaian)
    {
        $transaksi = DB::table('transaksi')->get();
        return view('editstock',['stock'=>$stock,
        'transaksi'=>$transaksi]);
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
    public function destroy(Pemakaian $pemakaian)
    {
        $pemakaian->delete();

        return redirect()->route('pemakaian.index');
    }

    public function search_pemakaian(Request $request, Pemakaian $pemakaian)
    {
        $searchTerm = $request->input('search_pemakaian');

        $pemakaian = pemakaian::where('kode_sparepart', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('pemakaian', ['pemakaian' => $pemakaian]);
    }
}
