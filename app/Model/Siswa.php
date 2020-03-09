<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes; //soft
    
    public function instansi()
    {
        return $this->hasOne('App\Model\Instansi', 'kode', 'kode_instansi');
    }
    public function pengajaran()
    {
        return $this->belongsTo('App\Model\Pengajaran', 'no_daftar', 'kode_siswa');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'kode', 'kode_identitas');
    }
}
