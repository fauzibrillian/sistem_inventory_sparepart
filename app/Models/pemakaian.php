<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemakaian extends Model
{
    use HasFactory;
    protected $table = 'pemakaian';
    protected $fillable = ['nama_sparepart','kode_sparepart','qty','merk','harga'];
}
