<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\retur;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retur = DB::table('retur')->get();
        return view('retur', ['retur' => $retur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('createretur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $nama_sparepart = $request->get('nama_sparepart');
        $kode_sparepart = $request->get('kode_sparepart');
        $qty = $request->get('qty');
        $harga = $request->get('harga');
        $merk = $request->get('merk');
        $nopol = $request->get('nopol');
        /* Menyimpan data kedalam tabel */
        $save_retur = new \App\Models\retur;
        $save_retur->tangal = $tangal;
        $save_retur->nama_sparepart = $nama_sparepart;
        $save_retur->kode_sparepart = $kode_sparepart;
        $save_retur->qty = $qty;
        $save_retur->harga = $harga;
        $save_retur->merk = $merk;
        $save_retur->nopol = $nopol;
        $save_retur->save();
        return redirect('retur');
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
    public function edit(Retur $retur)
    {
        return view('editretur',['retur'=>$retur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retur $retur)
    {
        $data = $request->all();

        $retur->update($data);

        return redirect()->route('retur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retur->delete();

        return redirect()->route('retur.index');
    }
}
