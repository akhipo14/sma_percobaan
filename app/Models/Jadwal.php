<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function hari(){
        return $this->belongsTo(Hari::class,'hari_id');
    }

    public function pelajaran(){
        return $this->belongsTo(Pelajaran::class,'pelajaran_id');
    }

}
