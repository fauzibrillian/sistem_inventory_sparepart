<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['tanggal','kode_transaksi','nama_sparepart','kode_sparepart','qty','merk','harga','supplier_id'];
}
