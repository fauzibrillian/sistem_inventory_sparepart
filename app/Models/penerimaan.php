<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';
    protected $fillable = ['tanggal','nama_sparepart','kode_sparepart','merk','nopol','pegawai_id','supplier_id'];
}
