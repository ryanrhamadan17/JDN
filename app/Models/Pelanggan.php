<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tlp',
        'lat',
        'long',
        'tlp',
        'paket_id',
        'marketing_id',
    ];
    public function taskpelanggan()
    {
        return $this->hasMany(Task::class,'pelanggan_id');
        
    }
}
