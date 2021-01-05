<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hang extends Model
{
    protected $table="hang";
    public function product(){
    	return $this->hasMany('App\product','pro_hang','id');
    }

}
