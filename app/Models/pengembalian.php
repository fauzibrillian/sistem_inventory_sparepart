<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $fillable = ['tanggal','nama_sparepart','kode_sparepart','qty','harga','merk','nopol','pegawai_id','transaksi_id','ket'];
}
