<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes; //soft

    public function pembelian()
    {
        return $this->belongsTo('App\Model\Pembelian', 'kode', 'kode_instansi');
    }
    public function distribusi_produk()
    {
        return $this->belongsTo('App\Model\Distribusi_Produk', 'kode', 'kode_produk');
    }
    public function instansi()
    {
        return $this->hasOne('App\Model\Instansi', 'kode', 'kode_instansi');
    }
    
}
