<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catpop extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'nama',
    // ];
    public function pops()
    {
        return $this->hasMany(Pop::class,'catpop_id');
        
    }
}
