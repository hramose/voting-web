<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\login;
use Auth;
class AuthController extends Controller
{
     public function login(){
    	return view('auth.login');
    }

    public function loginCheck(Request $request,login $check){
    	$data = array('class_id'=> $request['student_id'], 'password'=> $request['password']);
    	if(Auth::attempt($data)){
    		if(Auth::user()->role_id == 1){
                return redirect()->route('admin_main');
            }else{
                return redirect()->back()->with('error','Invalid ID and Password');
            }
    	}else{
    		return redirect()->back()->with('error','Invalid ID and Password');
    	}
    }
}
