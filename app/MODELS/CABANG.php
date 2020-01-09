<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CABANG extends Model
{
    use SoftDeletes;

    protected  $table = 'cabang';
    protected $primaryKey = 'KODE_CABANG';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $fillable = ['NAMA_CABANG',
                            'ALAMAT_CABANG',
                            'NO_TELP_CABANG'];

    public function cabangTransaksi(){
        return $this->belongsTo('app\MODELS\TRANSAKSI','KODE_CABANG');
    }
}
