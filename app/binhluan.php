<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    protected $table="binhluan";
    public function customer(){
    	return $this->belongsTo('App\customer','id_user','id');
    }
    public function product(){
    	return $this->belongsTo('App\product','id_sp','id');
    }
}
