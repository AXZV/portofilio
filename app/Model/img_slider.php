<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //soft

class img_slider extends Model
{
    protected $table = "img_slider"; 

    use SoftDeletes; //soft
    protected $id    = 'id';
    protected $dates = ['deleted_at']; //soft
    protected $fill  = [
        'img',
        'caption',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
