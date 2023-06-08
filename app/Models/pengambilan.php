<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengambilan extends Model
{
    use HasFactory;
    protected $table = 'pengambilan';
    protected $fillable = ['tanggal','nama_sparepart','kode_sparepart','merk','qty','nopol'];
}
