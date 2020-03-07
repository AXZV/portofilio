<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //soft

class Users extends Model
{
    protected $table = "user";

    use SoftDeletes; //soft

    protected $fillable = [
        'username','password','kode_identitas','status','role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
