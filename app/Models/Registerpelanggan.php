<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registerpelanggan extends Model
{
    use HasFactory;
    
    

    // public function catpop()
    // {
    //     return $this->belongsTo(Catpop::class,'catpop_id');
        
    // }
    public function marketing()
    {
        return $this->belongsTo(Marketing::class,'marketing_id');
        
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
        
    }


}
