<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ROLE extends Model
{
    use SoftDeletes;

    protected  $table = 'role';
    protected $primaryKey = 'KODE_ROLE';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['JENIS_ROLE'];

    public function rolePegawai(){
        return $this->belongsTo('app\MODELS\PEGAWAI','KODE_ROLE');
    }

}
