<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;

class STATUS_SERVICE extends Model
{
    protected  $table = 'status_service';
    protected $primaryKey = 'KODE_STATUS';
    public $timestamps = false;
    protected $fillable = ['NAMA_STATUS'];

    public function statusTransaksi(){
        return $this->belongsTo('app\MODELS\TRANSAKSI','KODE_STATUS');
    }

}
