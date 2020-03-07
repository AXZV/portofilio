<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes; //soft
    
    public function pelajaran()
    {
        return $this->hasOne('App\Model\Pelajaran', 'kode', 'kode_pelajaran');
    }
    public function guru_kelas()
    {
        return $this->belongsTo('App\Model\Guru_Kelas', 'kode_kelas', 'kode');
    }
}
