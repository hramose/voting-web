<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Party;
use App\Member;
use App\Vote;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
class CandidateController extends Controller
{
   public function __construct(){
        $this->middleware('jwt.auth', ['only'=> ['store']]);
   }

    public function index()
    {
        return 'index';
    }

  

   
    public function store(Request $request)
    {
        // $val = $this->validate($request, [
        //     'president' => 'required',
        //     'vice' => 'required',
        //     'secretary' => 'required',
        //     'treasurer' => 'required',
        //     'auditor' => 'required',
        //     'pio' => 'required',
        //     'bus' => 'required',
        //     'peace'=> 'required',
        //     'peace2'=> 'required',
        //     'rep'=> 'required'
        // ]);

        // if($val){
        //     return response()->json(['status'=> 'no']);
        // }

        if(! $user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['status'=> 'invalid account']);
        }
        $find = Vote::where('voters_id', $user->id)->first();
        if($find){
            return response()->json(['status'=> 'ok']);
        }

        $pres = $request->input('president');
        $vice = $request->input('vice');
        $secretary = $request->input('secretary');
        $treasurer = $request->input('treasurer');
        $auditor = $request->input('auditor');
        $pio = $request->input('pio');
        $bus = $request->input('bus');

        $rep = $request->input('rep');
        $peace = $request->input('peace');
        $peace2 = $request->input('peace2');

        $vote1 = new Vote;
        $vote1->candidate_id = $pres == null ? "none" : $pres;
        $vote1->voters_id = $user->id;
        $vote1->save();
       

        $vote2 = new Vote;
        $vote2->candidate_id = $vice == null ? "none" : $vice;
        $vote2->voters_id = $user->id;
        $vote2->save();
        

        $vote3 = new Vote;
        $vote3->candidate_id = $secretary == null ? "none" : $secretary;
        $vote3->voters_id = $user->id;
        $vote3->save();
       

         $vote4 = new Vote;
        $vote4->candidate_id = $treasurer == null ? "none" : $treasurer;
        $vote4->voters_id = $user->id;
        $vote4->save();
       
         $vote5 = new Vote;
        $vote5->candidate_id = $auditor == null ? "none" : $auditor;
        $vote5->voters_id = $user->id;
        $vote5->save();
       
         $vote6 = new Vote;
        $vote6->candidate_id = $pio == null ? "none" : $pio;
        $vote6->voters_id = $user->id;
        $vote6->save();
       
        $vote7 = new Vote;
        $vote7->candidate_id = $bus == null ? "none" : $bus;
        $vote7->voters_id = $user->id;
        $vote7->save();
       
        $vote8 = new Vote;
        $vote8->candidate_id = $rep == null ? "none" : $rep;
        $vote8->voters_id = $user->id;
        $vote8->save();
       
         $vote9 = new Vote;
        $vote9->candidate_id = $peace == null ? "none" : $peace;
        $vote9->voters_id = $user->id;
        $vote9->save();
       
         $vote10 = new Vote;
        $vote10->candidate_id = $peace2 == null ? "none" : $peace2;
        $vote10->voters_id = $user->id;
        $vote10->save();

        $pres = $request->input('president');
        $vice = $request->input('vice');
        $secretary = $request->input('secretary');
        $treasurer = $request->input('treasurer');
        $auditor = $request->input('auditor');
        $pio = $request->input('pio');
        $bus = $request->input('bus');

        $rep = $request->input('rep');
        $peace = $request->input('peace');
        $peace2 = $request->input('peace2');

        if($pres || $vice || $secretary || $treasurer || $auditor || $pio || $bus || $rep || $peace || $peace2){
             return response()->json(['status'=> "no"]);
        }
       
      



    }

   
    public function show($id)
    {
        $member = Member::where('party_id', $id)->orderBy('position_id', 'asc')->get();
        foreach($member as $mem){
            $mem->user = $mem->user;
        }
        foreach($member as $me){
            $me->position = $me->position;
        }
        
        $party = Party::where('id', $id)->first();
        return response()->json(['party'=> $party, 'member'=> $member]);
    }

  
   
}
