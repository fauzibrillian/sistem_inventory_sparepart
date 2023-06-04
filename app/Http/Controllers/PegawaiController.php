<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = DB::table('pegawai')->get();
        return view('pegawai', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('createpegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_pegawai = $request->get('nama_pegawai');
        $alamat = $request->get('alamat');
        $no_telpon = $request->get('no_telpon');
        $email = $request->get('email');
        /* Menyimpan data kedalam tabel */
        $save_pegawai = new \App\Models\pegawai;
        $save_pegawai->nama_pegawai = $nama_pegawai;
        $save_pegawai->alamat = $alamat;
        $save_pegawai->email = $email;
        $save_pegawai->no_telpon = $no_telpon;
        $save_pegawai->save();
        return redirect('pegawai');
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
    public function edit( Pegawai $pegawai)
    {
        return view('editpegawai',['pegawai'=>$pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->all();

        $pegawai->update($data);

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index');
    }

    public function search_pegawai(Request $request, Pegawai $pegawai)
    {
        $searchTerm = $request->input('search_pegawai');

        $pegawai = pegawai::where('nama_pegawai', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('pegawai', ['pegawai' => $pegawai]);
    }
}
