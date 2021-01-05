<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
    protected $table="chitiethoadon";
    public function product(){
    	return $this->belongsTo('App\product','id_sp','id');
    }
    public function hoadon(){
    	return $this->belongsTo('App\hoadon','id_hd','id');
    }
}
