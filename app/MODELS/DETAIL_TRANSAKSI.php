<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DETAIL_TRANSAKSI extends Model
{
    use SoftDeletes;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'KODE_DETAIL_TRANSAKSI';
    protected $fillable = ['TOTAL_BAYAR'];
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function kodeTransaksi(){
        return $this->hasOne('app\MODELS\TRANSAKSI','KODE_TRANSAKSI');
    }

    public function detailTrHBKeluar(){
        return $this->belongsTo('app\MODELS\HISTORY_BARANG_KELUAR','KODE_DETAIL_TRANSAKSI');
    }

    public function detailTrDetailJs(){
        return $this->belongsTo('app\MODELS\DETAIL_JASA','KODE_DETAIL_TRANSAKSI');
    }

}
