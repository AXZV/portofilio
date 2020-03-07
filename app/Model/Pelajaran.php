<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelajaran extends Model
{
    use SoftDeletes; //soft
    
    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kode', 'kode_pelajaran');
    }
}
