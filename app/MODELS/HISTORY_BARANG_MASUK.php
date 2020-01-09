<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HISTORY_BARANG_MASUK extends Model
{
    use SoftDeletes;

    protected $table = 'history_barang_masuk';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['TANGGAL_MASUK',
                            'STOK_BARANG_MASUK',
                            'HARGA_BARANG_MASUK'];

    public function kodePengadaan(){
        return $this->hasOne('app\MODELS\PENGADAAN_STOK','KODE_PENGADAAN');
    }

    public function kodeSparepart(){
        return $this->hasOne('app\MODELS\SPAREPART','KODE_SPAREPART');
    }
}
