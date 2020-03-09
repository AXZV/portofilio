<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password','kode_identitas','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->hasOne('App\Model\Admin', 'kode', 'kode_identitas');;
    }

    public function guru()
    {
        return $this->hasOne('App\Model\Guru', 'no_identitas', 'kode_identitas');;
    }

    public function siswa()
    {
        return $this->hasOne('App\Model\Siswa', 'no_daftar', 'kode_identitas');;
    }
}
