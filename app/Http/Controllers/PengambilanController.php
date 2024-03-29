<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\pengambilan;
use App\Models\pemakaian;
use App\Models\stock;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengambilan = DB::table('pengambilan')
        ->leftJoin('pegawai','pengambilan.pegawai_id','=','pegawai.id')
        ->leftJoin('stock','pengambilan.stock_id','=','stock.id')
        ->select('pengambilan.id','pengambilan.tanggal','pengambilan.qty','pengambilan.nopol','stock.nama_sparepart', 'stock.kode_sparepart','stock.merk','pegawai.nama_pegawai')
        ->get();
        return view('pengambilan', ['pengambilan' => $pengambilan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table('pegawai')->get();
        $stock = DB::table('stock')->get();
        return view('createpengambilan',['pegawai'=>$pegawai, 'stock'=>$stock]);
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
        $merk = $request->get('merk');
        $qty = $request->get('qty');
        $harga = $request->get('harga');
        $pegawai =$request->get('pegawai_id');
        $stock =$request->get('stock_id');

        $stockquery = DB::table('stock') -> where('id','=',$stock) ->get();
        $results = DB::table('pengambilan')
        ->selectRaw('SUM(qty) AS qty, stock_id')
        ->groupBy('stock_id')
        ->where('stock_id','=',$stock)
        ->get();
        
        foreach ($stockquery as $stok) {
            foreach ($results as $result) {
                if ($stok->id==$result->stock_id){
                    $stok->qty=$stok->qty - $result->qty;
                    $stok->qty=$stok->qty - $qty;
                    if($stok->qty < 0 ){
                        $message = 'Gagal: Jumlah stok tidak mencukupi';
                        return View::make('errors', compact('message'));
                    }
                }
            }
        }
        /* Menyimpan data kedalam tabel */
        $save_pengambilan = new \App\Models\pengambilan;
        $save_pemakaian = new \App\Models\pemakaian;
        $save_pemakaian->tanggal = $tanggal;
        $save_pemakaian->nama_sparepart = $nama_sparepart;
        $save_pemakaian->kode_sparepart = $kode_sparepart;
        $save_pemakaian->qty = $qty;
        $save_pemakaian->merk = $merk;
        $save_pemakaian->harga = $harga;
        $save_pengambilan->tanggal = $tanggal;
        $save_pengambilan->nama_sparepart = $nama_sparepart;
        $save_pengambilan->kode_sparepart = $kode_sparepart;
        $save_pengambilan->merk = $merk;
        $save_pengambilan->qty = $qty;
        $save_pengambilan->pegawai_id = $pegawai;
        $save_pengambilan->stock_id = $stock;
        $save_pengambilan->save();
        $save_pemakaian->save();
        return redirect('pengambilan');
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
    public function edit( Pengambilan $pengambilan )
    {
        $pegawai = DB::table('pegawai')->get();
        $stock = DB::table('stock')->get();
        $pemakaian = DB::table('pemakaian')->get();
        return view('editpengambilan',[
        'pengambilan'=>$pengambilan,
        'pegawai'=>$pegawai,
        'stock'=>$stock,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengambilan $pengambilan , Pemakaian $pemakaian)
    {
        $data = $request->all();
        $pengambilan->update($data);
        $pemakaian->update($data);

        return redirect()->route('pengambilan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengambilan $pengambilan)
    {
        $pengambilan->delete();

        return redirect()->route('pengambilan.index');
    }

    public function search_pengambilan(Request $request, Pengambilan $pengambilan)
    {
        $searchTerm = $request->input('search_pengambilan');

        $pengambilan = pengambilan::where('kode_sparepart', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('pengambilan', ['pengambilan' => $pengambilan]);
    }
}
