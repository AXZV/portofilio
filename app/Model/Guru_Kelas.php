<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru_Kelas extends Model
{
    protected $table = "guru_kelas"; 

    use SoftDeletes; //soft
    
    public function kelas()
    {
        return $this->hasOne('App\Model\Kelas', 'kode', 'kode_kelas');
    }
    public function guru()
    {
        return $this->hasOne('App\Model\Guru', 'no_identitas', 'kode_guru');
    }
    public function pengajaran()
    {
        return $this->belongsTo('App\Model\Pengajaran', 'kode', 'kode_guru_kelas');
    }
}
