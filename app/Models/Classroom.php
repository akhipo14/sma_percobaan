<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function mapel(){
        return $this->belongsTo(Pelajaran::class);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function sdm(){
        return $this->belongsTo(SDM::class);
    }
}
