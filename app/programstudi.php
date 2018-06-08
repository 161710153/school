<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programstudi extends Model
{
    protected $table ='programstudis';
    protected $fillable = ['nama_program','fasilitas_id','industris_id','strukturs_id'];
    public $timestamps = true;

    public function fasilitas(){
        return $this->belongsTo('App\fasilitas','fasilitas_id');
    }
    public function industri(){
        return $this->belongsTo('App\industri','industris_id');
    }
    public function struktur(){
        return $this->belongsTo('App\struktur','strukturs_id');
    }
}
