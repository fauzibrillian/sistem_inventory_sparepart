<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abcmodel extends Model
{
    use HasFactory;
    protected $table = 'abcmodel';
    protected $fillable = ['hasil','presentase','kategori'];
}
