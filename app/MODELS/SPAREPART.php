<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SPAREPART extends Model
{
    use SoftDeletes;

    protected  $table = 'sparepart';
    protected $primaryKey = 'KODE_SPAREPART';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['KODE_BARANG',
                            'TIPE_SPAREPART',
                            'NAMA_SPAREPART',
                            'HARGA_JUAL',
                            'HARGA_BELI',
                            'MERK_SPAREPART',
                            'KODE_PELETAKAN',
                            'JUMLAH_STOK',
                            'GAMBAR'];

    public function sparepartHBMasuk(){
        return $this->belongsTo('app\MODELS\HISTORY_BARANG_MASUK','KODE_SPAREPART');
    }

    public function sparepartHBKeluar(){
        return $this->belongsTo('app\MODELS\HISTORY_BARANG_KELUAR','KODE_SPAREPART');
    }
}
