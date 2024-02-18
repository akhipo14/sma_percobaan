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
    public function mapel1(){
        return $this->belongsTo(Pelajaran::class,'mapel_1_id');
    }
    public function mapel2(){
        return $this->belongsTo(Pelajaran::class,'mapel_2_id');
    }
    public function mapel3(){
        return $this->belongsTo(Pelajaran::class,'mapel_3_id');
    }
    public function mapel4(){
        return $this->belongsTo(Pelajaran::class,'mapel_4_id');
    }
    public function mapel5(){
        return $this->belongsTo(Pelajaran::class,'mapel_5_id');
    }
    public function mapel6(){
        return $this->belongsTo(Pelajaran::class,'mapel_6_id');
    }
    public function mapel7(){
        return $this->belongsTo(Pelajaran::class,'mapel_7_id');
    }
    public function mapel8(){
        return $this->belongsTo(Pelajaran::class,'mapel_8_id');
    }
    public function mapel9(){
        return $this->belongsTo(Pelajaran::class,'mapel_9_id');
    }
    public function mapel10(){
        return $this->belongsTo(Pelajaran::class,'mapel_10_id');
    }
    public function mapel11(){
        return $this->belongsTo(Pelajaran::class,'mapel_11_id');
    }
    public function mapel12(){
        return $this->belongsTo(Pelajaran::class,'mapel_12_id');
    }

}
