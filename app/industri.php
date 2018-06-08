<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    protected $table ='industris';
    protected $fillable = ['nama','tahun_kerjasama'];
    public $timestamps = true;
}
