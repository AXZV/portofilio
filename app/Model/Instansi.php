<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instansi extends Model
{
    use SoftDeletes; //soft

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'kode', 'kode_instansi');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'kode', 'kode_instansi');
    }
}
