<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketenagaan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function setLakiLakiAttribute($value)
    {
        if ($value === null || $value === '') {
            // Mengatur nilainya menjadi 0
            $this->attributes['laki_laki'] = 0;
        } else {
            // Jika tidak kosong, maka set nilai sesuai yang diberikan
            $this->attributes['laki_laki'] = $value;
        }
    }

    public function setPerempuanAttribute($value)
    {
        $this->attributes['perempuan'] = $value !== null ? $value : 0;
    }

}
