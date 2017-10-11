<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\Party;
use App\Member;
use App\Result;
class UserController extends Controller
{
    public function login(Request $request){
    	$this->validate($request, [
    		'username'=> 'required|max:12', 
    		'password'=> 'required|max:12'
    	]);
    	$data = array('class_id'=> $request->input('username'), 'password'=> $request->input('password'));
    	try{
    		if(!$token = JWTAuth::attempt($data)){
    			return response()->json(['status'=> false]);
    			
    		}else{
    			return response()->json(['status'=> true, 'token'=> $token]);
    		}
    	}catch(JWTException $e){
    		return response()->json(['error'=> $e]);
    	}
    }


    public function party(){
    	
    	$party = Party::all();
        $winner = Result::all();
    	return response()->json(['data'=> $party, 'winner'=> $winner]);
    }

    public function candidate(){
        if(! $user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['status'=> false]);
        }
    	$pres = Member::where('position_id', 1)->get();
    	foreach($pres as $aw){
    		$aw->user = $aw->user;

    	}
        $vice = Member::where('position_id', 2)->get();
        foreach($vice as $vic){
            $vic->user = $vic->user;

        }

        $secretary = Member::where('position_id', 3)->get();
        foreach($secretary as $sec){
            $sec->user = $sec->user;

        }

        $treasurer = Member::where('position_id', 4)->get();
        foreach($treasurer as $tre){
            $tre->user = $tre->user;

        }

        $auditor = Member::where('position_id', 5)->get();
        foreach($auditor as $aud){
            $aud->user = $aud->user;

        }

         $pio = Member::where('position_id', 6)->get();
        foreach($pio as $pi){
            $pi->user = $pi->user;

        }

         $bus = Member::where('position_id', 7)->get();
        foreach($bus as $bu){
            $bu->user = $bu->user;

        }

        $peace = Member::where('position_id', 8)->get();
        foreach($peace as $pe){
            $pe->user = $pe->user;

        }

        $reps = Member::where('position_id', 9)->get();
        foreach($reps as $rep){
            $rep->user = $rep->user;

        }

      



    	return response()->json(['president'=> $pres, 'vice'=> $vice, 'secretary'=> $secretary, 'treasurer'=> $treasurer, 'auditor'=> $auditor,'pio'=> $pio, 'bus'=> $bus, 'peace'=> $peace, 'reps'=> $reps, 'user'=> $user]);
    	
    }







}
