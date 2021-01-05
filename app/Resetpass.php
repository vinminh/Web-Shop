<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resetpass extends Model
{
    protected $fillable = [
        'token', 'email',
    ];
    public $timestamps = false;
    protected $table="reset_pass";
   

}
