<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'desc',
        'lat',
        'long',
        'catpop_id',
    ];

    public function catpop()
    {
        return $this->belongsTo(Catpop::class,'catpop_id');
        
    }
}
