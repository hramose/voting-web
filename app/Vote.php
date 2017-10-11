<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Member;
class Vote extends Model
{
    public function user(){
    	
    	return $this->belongsTo('App\User','voters_id','id');
    }

    public function users($candidate_id){
    	return User::where('id', $candidate_id)->get();
    }

     public function candidate($candidate_id){
    	return Member::where('user_id', $candidate_id)->get();
    }

    
}
