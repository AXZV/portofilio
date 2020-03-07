<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presensi extends Model
{
    use SoftDeletes; //soft
    
    public function pengajaran()
    {
        return $this->hasOne('App\Models\pengajaran', 'kode', 'kode_pengajaran');
    }
}
