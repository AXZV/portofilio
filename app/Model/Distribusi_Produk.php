<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distribusi_Produk extends Model
{
    protected $table = "distribusi_produks";

    use SoftDeletes; //soft
    
    public function produk()
    {
        return $this->hasOne('App\Model\Instansi', 'kode', 'kode_produk');
    }
}
