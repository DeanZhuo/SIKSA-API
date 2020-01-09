<?php

namespace App\MODELS;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TRANSAKSI extends Model
{
    use SoftDeletes;

    protected $table = 'transaksi';
    protected $primaryKey = 'KODE_TRANSAKSI';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['TANGGAL_TRANSAKSI',
                            'KODE_LUNAS',
                            'KODE_PENJUALAN',
                            'DISKON'];

    public function kodeCust(){
        return $this->hasOne('App\MODELS\CUSTOMER','KODE_CUST');
    }

    public function kodeStatus(){
        return $this->hasOne('App\MODELS\STATUS_SERVICE','KODE_STATUS');
    }

    public function kodeCabang(){
        return $this->hasOne('App\MODELS\CABANG','KODE_CABANG');
    }

    public function kodeKendaraan(){
        return $this->hasOne('App\MODELS\KENDARAAN','KODE_KENDARAAN');
    }

    public function kodeCS(){
        return $this->hasOne('App\MODELS\PEGAWAI','KODE_PEGAWAI');
    }

    public function kodeMontir(){
        return $this->hasOne('App\MODELS\PEGAWAI','KODE_PEGAWAI');
    }

    public function kodeKasir(){
        return $this->hasOne('App\MODELS\PEGAWAI','KODE_PEGAWAI');
    }

    public function transaksiDetailTr(){
        return $this->belongsTo('App\MODELS\DETAIL_TRANSAKSI','KODE_TRANSAKSI');
    }
}
