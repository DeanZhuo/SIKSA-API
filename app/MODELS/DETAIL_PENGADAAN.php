<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DETAIL_PENGADAAN extends Model
{
    use SoftDeletes;

    protected $table = 'detail_pengadaan';
    protected $primaryKey = 'KODE_DETAIL_PENGADAAN';
    protected $fillable = ['NAMA_BARANG',
                            'JUMLAH_PESANAN',
                            'HARGA_SATUAN'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function kodePengadaan(){
        return $this->hasOne('app\MODELS\PENGADAAN','KODE_PENGADAAN');
    }
}
