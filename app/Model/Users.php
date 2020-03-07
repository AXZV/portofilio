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
}
