<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table="customer";
    public function hoadon(){
    	return $this->hasMany('App\hoadon','hd_user','id');
    }
    public function binhluan(){
    	return $this->hasMany('App\binhluan','id_user','id');
    }
}
