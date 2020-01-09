<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KENDARAAN extends Model
{
    use SoftDeletes;

    protected  $table = 'kendaraan';
    protected $primaryKey = 'KODE_KENDARAAN';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['PLAT_KENDARAAN',
                            'MERK_KENDARAAN',
                            'TIPE_KENDARAAN'];

    public function kendaraanTransaksi(){
        return $this->belongsTo('app\MODELS\TRANSAKSI','KODE_KENDARAAN');
    }
}
