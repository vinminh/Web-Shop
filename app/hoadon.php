<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    protected $table="hoadon";
    public function chitiethoadon(){
    	return $this->hasMany('App\chitiethoadon','id_hd','id');
    }
    public function customer(){
    	return $this->belongsTo('App\customer','hd_user','id');
    }
}
