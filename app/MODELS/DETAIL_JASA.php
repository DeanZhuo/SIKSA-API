<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DETAIL_JASA extends Model
{

    use SoftDeletes;
    protected $table = 'detail_jasa';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function kodeDetailTransaksi(){
        return $this->hasOne('app\MODELS\DETAIL_TRANSAKSI','KODE_DETAIL_TRANSAKSI');
    }

    public function kodeService(){
        return $this->hasOne('app\MODELS\JASA_SERVICE','KODE_SERVICE');
    }
}
