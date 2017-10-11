<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vote;
use DB;
class Member extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function position(){
    	return $this->belongsTo('App\Position');
    }

    public function vote($candidate_id){
    	return Vote::where('candidate_id', $candidate_id)->count();
    }

    public function party(){
    	return $this->belongsTo('App\Party');
    }

    public function win($candidate_id){
       return Vote::where('candidate_id', $candidate_id)->count();

                    
                    
        




    }

    
}
