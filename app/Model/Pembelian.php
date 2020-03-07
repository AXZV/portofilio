<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembelian extends Model
{
    use SoftDeletes; //soft
    
    public function produk()
    {
        return $this->hasOne('App\Models\Instansi', 'kode', 'kode_produk');
    }
}
