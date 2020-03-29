<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jumlah_Presensi extends Model
{
    protected $table = "jumlah_presensis";

    public function pengajaran()
    {
        return $this->hasOne('App\Model\Instansi', 'id', 'id');
    }
    public function siswa()
    {
        return $this->hasOne('App\Model\Instansi', 'id', 'id');
    }
}
