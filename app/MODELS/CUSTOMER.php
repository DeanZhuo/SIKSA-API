<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CUSTOMER extends Model
{
    use SoftDeletes;
    
    protected  $table = 'customer';
    protected $primaryKey = 'KODE_CUST';
    protected $fillable = ['NAMA_CUST',
                            'NO_TELP_CUST'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function custTransaksi(){
        return $this->belongsTo('app\MODELS\TRANSAKSI','KODE_CUST');
    }
}
