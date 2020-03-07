<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajaran_Level extends Model
{
    protected $table = "pengajaran_levels"; 
    use SoftDeletes; //soft

    public function pengajaran()
    {
        return $this->hasOne('App\Model\pengajaran', 'kode', 'kode_pengajaran');
    }
}
