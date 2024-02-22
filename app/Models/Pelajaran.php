<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

//     public function jadwals()
// {
//     return $this->belongsToMany(Jadwal::class);
// }

}
