<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajaran extends Model
{
    use SoftDeletes; //soft

    public function pengajaran_level()
    {
        return $this->belongsTo('App\Model\Pengajaran_Level', 'kode', 'kode_pengajaran');
    }
    public function presensi()
    {
        return $this->belongsTo('App\Model\Presensi', 'kode', 'kode_pengajaran');
    }
    public function guru_kelas()
    {
        return $this->hasOne('App\Model\Guru_Kelas', 'kode', 'kode_guru_kelas');
    }
    public function siswa()
    {
        return $this->hasOne('App\Model\Siswa', 'no_daftar', 'kode_siswa');
    }

}
