<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="product";
    public function hang(){
    	return $this->belongsTo('App\hang','pro_hang','id');
    }
    public function chitiethoadon(){
    	return $this->hasMany('App\chitiethoadon','id_sp','id');
    }
    public function binhluan(){
    	return $this->hasMany('App\binhluan','id_sp','id');
    }
}
