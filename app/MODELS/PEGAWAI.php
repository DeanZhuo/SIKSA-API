<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEGAWAI extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';
    protected $primaryKey = 'KODE_PEGAWAI';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['NAMA_PEGAWAI',
                            'USERNAME',
                            'PASSWORD',
                            'ALAMAT_PEGAWAI',
                            'NO_TELP_PEGAWAI',
                            'GAJI_PER_MINGGU'];

    public function kodeRole(){
        return $this->hasOne('app\MODELS\ROLE','KODE_ROLE');
    }

    public function pegawaiTransaksi(){
        return $this->belongsTo('app\MODELS\TRANSAKSI','KODE_PEGAWAI');
    }
}
