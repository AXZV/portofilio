<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presensi extends Model
{
    use SoftDeletes; //soft
    
    public function pengajaran()
    {
        return $this->hasOne('App\Model\pengajaran', 'kode', 'kode_pengajaran');
    }
    public function siswa()
    {
        return $this->belongsToMany('App\Model\Siswa', 'presensi_siswa', 'id_presensi', 'id_siswa',)->withPivot('status', 'catatan')->withTimestamps();
    }
    public function kehadiran($status)
    {
        return $this->siswa()->wherePivot('status','=', $status);
    }
    public function kehadiran_harian($id_siswa)
    {
        return $this->siswa()->wherePivot('id_siswa','=', $id_siswa);
    }
    public function kehadiran_persiswa($id_presensi, $id_siswa, $status)
    {
        return $this->siswa()->wherePivot('id_presensi','=', $id_presensi)->wherePivot('id_siswa','=', $id_siswa)->wherePivot('status','=', $status);
    }

    public function kehadiran_x($id_siswa, $status)
    {
        return $this->siswa()->wherePivot('id_siswa','=', $id_siswa)->wherePivot('status','=', $status)->get();
    }
    // public function kehadiran_persiswa2($status, $id_siswa)
    // {
    //     return $this->siswa()->wherePivot('status','=', $status)->wherePivot('id_siswa','=', $id_siswa)->get();
    // }
}
