<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'Harga',
        'Speed',
    ];
    // public function pops()
    // {
    //     return $this->hasMany(Pop::class,'catpop_id');
        
    // }
    public function registerpelanggan()
    {
        return $this->hasMany(Registerpelanggan::class,'pelanggan_id');
        
    }
}
