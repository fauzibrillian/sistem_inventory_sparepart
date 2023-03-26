<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $table = 'retur';
    protected $fillable = ['tanggal','nama_sparepart','kode_sparepart','qty','harga','merk','nopol', 'qty','supplier_id','pegawai_id'];

    public function supplier(){
        return $this->belongsTo(supplier::class);
    }

    public function pegawai(){
        return $this->belongsTo(pegawai::class);
    }
}
