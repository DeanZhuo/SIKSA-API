<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PENGADAAN_STOK extends Model
{
    use SoftDeletes;

    protected $table = 'pengadaan_stok';
    protected $primaryKey = 'KODE_PENGADAAN';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['TANGGAL_PENGADAAN',
                            'PEMBAYARAN_PEMESANAN'];

    public function kodeSupplier(){
        return $this->hasOne('app\MODELS\SUPPLIER','KODE_SUPPLIER');
    }

    public function pengadaanHBMasuk(){
        return $this->belongsTo('app\MODELS\HISTORY_BARANG_MASUK','KODE_PENGADAAN');
    }

    public function pengadaanDetailPd(){
        return $this->belongsTo('app\MODELS\DETAIL_PENGADAAN','KODE_PENGADAAN');
    }

}
