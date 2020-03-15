<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //soft

class Users extends Model
{
    protected $table = "users";

    use SoftDeletes; //soft

    protected $fillable = [
        'username','password','kode_identitas','role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        return $this->hasOne('App\Model\Admin', 'kode', 'kode_identitas');
    }

    public function siswa()
    {
        return $this->hasOne('App\Model\Siswa', 'no_daftar', 'kode_identitas');
    }

    public function guru()
    {
        return $this->hasOne('App\Model\Guru', 'no_identitas', 'kode_identitas');
    }
}
