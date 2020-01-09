<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SUPPLIER extends Model
{
    use SoftDeletes;

    protected  $table = 'supplier';
    protected $primaryKey = 'KODE_SUPPLIER';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['NAMA_SUPPLIER',
                            'ALAMAT_SUPPLIER',
                            'NAMA_SALES',
                            'NO_TELP_SALES'];

    public function supplierPengadaan(){
        return $this->belongsTo('app\MODELS\PENGADAAN_STOK','KODE_SUPPLIER');
    }
}
