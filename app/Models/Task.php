<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'subject',
        'desc',
        'report',
        'level',
        'status',
        'cattask',
        'petugas_id',
        'pelanggan_id',
        
    ];
    public function cattask()
    {
        return $this->belongsTo(Cattask::class,'cattask_id');
        
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'pelanggan_id');
        
    }
    public function petugas()
    {
        return $this->belongsTo(Admin::class,'petugas_id');
        
    }
}
