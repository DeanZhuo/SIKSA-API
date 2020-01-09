<?php

namespace App\MODELS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MOTOR extends Model
{

    use SoftDeletes;

    protected  $table = 'motor';
    protected $primaryKey = 'KODE_MOTOR';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = ['MERK_MOTOR',
                            'TIPE_MOTOR'];
}
