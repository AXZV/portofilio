<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //soft

class Pegawai extends Model
{
    protected $table = "pegawai"; // menghandle tabel pegawai

    use SoftDeletes; //soft
    protected $id    = 'id';
    protected $dates = ['deleted_at']; //soft
    protected $fill  = [
        'nama',
        'alamat',
        'email',
        'nomor_telepon',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
