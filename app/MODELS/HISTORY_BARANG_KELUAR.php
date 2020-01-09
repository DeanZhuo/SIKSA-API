<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HISTORY_BARANG_KELUAR extends Model
{
    use SoftDeletes;

    protected $table = 'history_barang_keluar';
    protected $fillable = ['TANGGAL_KELUAR',
                            'STOK_BARANG_KELUAR',
                            'HARGA_BARANG_KELUAR'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function kodeDetailTransaksi(){
        return $this->hasOne('app\MODELS\DETAIL_TRANSAKSI','KODE_DETAIL_TRANSAKSI');
    }

    public function kodeSparepart(){
        return $this->hasOne('app\MODELS\SPAREPART','KODE_SPAREPART');
    }
}
