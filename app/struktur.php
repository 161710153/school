<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class struktur extends Model
{
    protected $table ='strukturs';
    protected $fillable = ['nama','bidang'];
    public $timestamps = true;
}
