<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cattask extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'nama',
    // ];
    public function task()
    {
        return $this->hasMany(task::class,'cattask_id');
        
    }
}
