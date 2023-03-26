<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['nama_pegawai','alamat','no_telpon','email'];

    public function retur(){
        return $this->hasMany(retur::class);
    }
}
