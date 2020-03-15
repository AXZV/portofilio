<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes; //soft

    public function instansi()
    {
        return $this->hasOne('App\Model\Instansi', 'kode', 'kode_instansi');
    }
    public function guru_kelas()
    {
        return $this->belongsTo('App\Model\Guru_Kelas', 'no_identitas', 'kode_guru');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'no_identitas', 'kode_identitas');
    }

}
