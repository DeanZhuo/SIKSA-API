<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JASA_SERVICE extends Model
{
    use SoftDeletes;

    protected  $table = 'jasa_service';
    protected $primaryKey = 'KODE_JASA';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['NAMA_SERVICE',
                            'HARGA_SERVICE'];

    public function kodeService(){
        return $this->belongsTo('app\MODELS\DETAIL_JASA','KODE_SERVICE');
    }
}
