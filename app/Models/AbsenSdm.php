<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSdm extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function SDM(){
        return $this->belongsTo(SDM::class,'s_d_m_s_id');
    }


}
