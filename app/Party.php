<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    public function members(){
    	return $this->hasMany('App\Member');
    }

    public function user(){
    	return $this->belongsto('App\User','user_id','id');
    }
}
