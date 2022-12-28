<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
     // public function pops()
    // {
    //     return $this->hasMany(Pop::class,'catpop_id');
        
    // }
    public function registerpelanggan()
    {
        return $this->hasMany(Registerpelanggan::class,'pelanggan_id');
        
    }
}
