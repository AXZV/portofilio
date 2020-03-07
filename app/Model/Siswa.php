<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes; //soft
    
    public function instansi()
    {
        return $this->hasOne('App\Models\Instansi', 'kode', 'kode_instansi');
    }
    public function pengajaran()
    {
        return $this->belongsTo('App\Models\Pengajaran', 'no_daftar', 'kode_siswa');
    }
}
