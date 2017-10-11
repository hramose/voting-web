<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\admin\partyChecker;
use App\Http\Requests\admin\votersChecker;
use App\Http\Requests\admin\candidateChecker;


use Charts;
use DB;

use App\Party;
use App\User;
use App\Member;
use App\Position;
use App\Result;
use App\Vote;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('usercheck');
    }

    public function admin_main(){
        $voter = User::where('role_id',2)->count();
        $candi = Member::count();
        $party = Party::count();

        

    	return view('admin.dash', compact('voter','candi','party'));
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function system(){
        $user = User::where('role_id',1)->get();
    	return view('admin.system.system', compact('user'));
    }
    	public function backup(){
    		return view('admin.system.backup');
    	}

     public function register(){
    	return view('admin.register.register');
    }

    	public function candidates(){
    		$party = Party::all();
            $pos = Position::all();
    		return view('admin.register.candidates', compact('party','pos'));
    	}

        public function admin_voter_search(Request $request){
            $this->validate($request, [
                'lname'=> 'required|max:20'
            ]);

            $list = User::where('lname', 'like', '%'.$request['lname'].'%')->get();

            return view('admin.register.candidate_new_search', compact('list'));
        }

        public function admin_voter_for_candidacy($id){
            $find = User::findOrFail($id);
            $party = Party::all();
            $position = Position::all();
            return view('admin.register.candidate_form', compact('find','party','position'));
        }

        // public function admin_register_candidate(Request $request,$id){
        //     $this->validate($request, [
        //         'party' => 'required|max:5',
        //         'position' => 'required|max:5',
        //         'image'=> 'required'
        //     ]);

        //     $find = User::where('id',$id)->first();
        //     $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(('candidate'), $imageName);

        //     $member = new Member;
        //     $member->party_id = $request['party'];
        //     $member->position_id = $request['position'];
        //     $member->image = $imageName;
        //     $find->members()->save($member);

            
        //     return redirect()->back()->with('success','New Voters Added Successfully!');
        // }

    	public function new_voters(Request $request){
            $this->validate($request, [
                'email'=> 'required|email|max:50',
                'class_id'=> 'required|unique:users|max:20',
                'fname' => 'required|max:20|unique:users',
                'lname' => 'required|max:20|unique:users',
                'mname' => 'required|max:20',
                'grade'  => 'required|max:3',
                'section'  => 'required|max:25',
                'password'=> 'required|max:12'


            ]);
    		$user = new User;
    		$user->class_id = $request['class_id'];
    		$user->fname = $request['fname'];
    		$user->mname = $request['mname'];
    		$user->lname = $request['lname'];
    		$user->grade = $request['grade'];
    		$user->section = $request['section'];
    		$user->email = $request['email'];
    		$user->password = bcrypt($request['password']);
    		$user->role_id = 2;
    		$user->save();

    		return redirect()->back()->with('success','New Voters Added Successfully!');
    	}

     public function party(){
     	$party = Party::all();
    	return view('admin.party.party', compact('party'));
    }

     public function votes(){
        $party = Party::all();
        $pres = Member::where('position_id',1)->orderBy('party_id','asc')->get();
        $vice = Member::where('position_id',2)->orderBy('party_id','asc')->get();
        $secretary = Member::where('position_id',3)->orderBy('party_id','asc')->get();
        $treasurer = Member::where('position_id',4)->orderBy('party_id','asc')->get();
        $auditor = Member::where('position_id',5)->orderBy('party_id','asc')->get();
        $pio = Member::where('position_id',6)->orderBy('party_id','asc')->get();
        $bus = Member::where('position_id',7)->orderBy('party_id','asc')->get();

        $peace = Member::where('position_id',8)->orderBy('party_id','asc')->get();
        $reps = Member::where('position_id',9)->orderBy('party_id','asc')->get();


        

        
    	return view('admin.votes.votes', compact('pres','vice','secretary','treasurer','auditor','pio','bus','party','peace','reps'));
    }

    public function partyCheck(Request $request, partyChecker $check){
    	$party = new Party;
    	$party->name = $request['party'];
    	$party->platform = $request['platform'];
    	$party->objectives = $request['objective'];
    	$party->save();

    	return redirect()->back()->with('success', 'New Party Added Successfully!');
    }

    public function new_candidates(Request $request, $id){
         $this->validate($request, [
                'party' => 'required|max:5',
                'position' => 'required|max:5',
                'image'=> 'required'
            ]);

         $mem_check = Member::where('user_id', $id)->first();
         if($mem_check){
            return redirect()->back()->with('err', 'This person is already a candidate!');
         }

        $checker = Member::where('party_id', $request['party'])->where('position_id', $request['position'])->first();

        if($checker){
            if($checker->position_id  == "1" || $checker->position_id  == "2" || $checker->position_id  == "3" || $checker->position_id  == "4" || $checker->position_id  == "5" || $checker->position_id  == "6" || $checker->position_id  == "7"){
                return redirect()->back()->with('err', 'You only need to have one candidate for this position');
            }

            if($checker->position_id == "8"){
                $count =  Member::where('party_id', $request['party'])->where('position_id', $request['position'])->count();

                if($count == 2){
                    return redirect()->back()->with('err', 'You only need to have two candidate for this position');
                }

            }

            if($checker->position_id == "9"){
                $reps = Member::where('party_id', $request['party'])->where('position_id', $request['position'])->get();

                foreach($reps as $rep){
                    if($rep->user->grade == 12){
                        if($rep->user->count() > 1){
                            return redirect()->back()->with('err', 'You only need to have one candidate for this position');
                        }
                    }
                }
                
            }
        }



            
             $find = User::where('id',$id)->first();

             if($request['position'] == 1){
                if($find->grade != 12){
                    return redirect()->back()->with('err', 'Only Grade 12 can run the position of the President.');
                }
                
             }

             if($request['position'] == 2){
                if($find->grade != 12 &&  $find->grade != 11){
                    return redirect()->back()->with('err', 'Only Grade 11 and 12 can run the position of the Vice-President.');
                }
                
             }

             if($request['position'] == 3){
                if($find->grade != 12 && $find->grade != 11 && $find->grade != 10){
                    return redirect()->back()->with('err', 'Only Grade 10 ,11 and 12 can run the position of the Secretary.');
                }
                
             }

             if($request['position'] == 4){
                if($find->grade != 12 && $find->grade != 11 && $find->grade != 10){
                    return redirect()->back()->with('err', 'Only Grade 10 ,11 and 12 can run the position of the Treasurer.');
                }
                
             }

             if($request['position'] == 5){
                if($find->grade != 12 && $find->grade != 11 && $find->grade != 10){
                    return redirect()->back()->with('err', 'Only Grade 10 ,11 and 12 can run the position of the Auditor.');
                }
                
             }

             if($request['position'] == 6){
                if($find->grade != 12 &&$find->grade != 11 && $find->grade != 10){
                    return redirect()->back()->with('err', 'Only Grade 10 ,11 and 12 can run the position of the P.I.O.');
                }
                
             }

             if($request['position'] == 7){
                if($find->grade != 12 && $find->grade != 11 && $find->grade != 10 && $find->grade != 9){
                    return redirect()->back()->with('err', 'Only Grade 9,10 ,11 and 12 can run the position of the Bus. Mngr');
                }
                
             }

              if($request['position'] == 8){
                if($find->grade != 12 && $find->grade != 11 && $find->grade != 10 && $find->grade != 9){
                    return redirect()->back()->with('err', 'Only Grade 9,10 ,11 and 12 can run the position of the Peace Officer');
                }
                
             }

            $file = $request->image;;
            $image_name = time()."-".$file->getClientOriginalName();
            $file->move('candidate', $image_name);

            $member = new Member;
            $member->party_id = $request['party'];
            $member->position_id = $request['position'];
            $member->image = $image_name;
            $find->members()->save($member);

     
         if($find){
         	
    		return redirect()->back()->with('success', 'New Candidate Successfully Added.!');

         }
    }


    public function voter_list(){
        $voters = User::where('role_id',2)->get();
        return view('admin.register.voterlist', compact('voters'));
    }

    public function candidate_list(){
        $candidate = Member::orderBy('position_id', 'asc')->get();
        return view('admin.register.candidatelist', compact('candidate'));
    }

    public function new_admin(Request $request){
        $this->validate($request, [
            'class_id' => 'required|max:20|unique:users',
            'fname' => 'required|max:20',
            'mname' => 'required|max:20',
            'lname' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12'
        ]);

        $duplicate = User::where('fname', $request['fname'])->where('lname', $request['lname'])->first();
        if($duplicate){
            return redirect()->back()->with('success', 'User already exist!');
        }

        $new = new User;
        $new->class_id = $request['class_id'];
        $new->fname = $request['fname'];
        $new->mname = $request['mname'];
        $new->lname = $request['lname'];
        $new->email = $request['email'];
        $new->password = bcrypt($request['password']);
        $new->grade = "none";
        $new->section = "none";
        $new->role_id = 1;
        $new->save();

        return redirect()->back()->with('success', 'You have Successfully added new Admin');
    }


    public function admin_backup(){
      
    }

    public function party_delete($id){
       $find =  Party::where('id',$id)->first();
       $find->members()->delete();
       $find->delete();

       return redirect()->back()->with('delete', 'You have Successfully delete party list and their member!');
    }

    public function party_edit($id){
        $party = Party::where('id',$id)->first();
        return view('admin.party.edit', compact('party'));
    }

    public function party_editCheck(Request $request, $id){
            $this->validate($request, [
                'party' => 'required|max:30',
                'platform'  => 'required|max:200',
                'objective'  => 'required|max:200'
            ]);

            $update = Party::where('id',$id)->update(['name'=> $request['party'], 'platform'=> $request['platform'], 'objectives'=> $request['objective']]);

            if($update){
                 return redirect()->back()->with('update', 'You have Successfully updated the partylist!');
            }
    }


    public function candidate_delete($id){
       $find = User::where('id',$id)->first();
       $find->members()->delete();
       $find->delete();
        return redirect()->back()->with('delete', 'You have Successfully delete candidate from the list!');
    }


    public function voter_delete($id){
        $find = User::where('id', $id)->first();
        $find->votes()->delete();
        $find->delete();

        return redirect()->back()->with('delete', 'You have Successfully delete Voter from the list!');
    }

    public function voter_edit($id){
         $voter = User::where('id', $id)->first();
        return view('admin.register.edit_voter', compact('voter'));


    }

    public function voter_update_check(Request $request,$id){
        $this->validate($request, [
            'class_id' => 'required|max:12',
            'fname' => 'required|max:20',
            'mname' => 'required|max:20',
            'lname' => 'required|max:20',
            'grade' => 'required|max:2',
            'section' => 'required|max:25',
            'email' => 'required|email|max:30'
        ]);

        $find = User::where('id', $id)->update(['class_id'=> $request['class_id'], 'fname'=> $request['fname'], 'mname'=> $request['mname'], 'lname'=> $request['lname'],'grade'=> $request['grade'], 'section'=> $request['section'],'email'=> $request['email']]);

        if($find){
            return redirect()->back()->with('update', 'You have Successfully updated Voter information from  the list!');
        }
    }

    public function delete_admin($id){
        $find = User::where('id', $id)->delete();
        if($find){
            return redirect()->back()->with('delete', 'You have Successfully deleted Admin account from  the list!');
        }
    }


    public function voter_list_search(Request $request){
        $this->validate($request, [
            'search'=> 'required|max:20'
        ]);
        $lname = $request['search'];

        $voters = User::where('lname', 'like', '%'.$lname.'%')->get();
        return view('admin.register.voter_search', compact('voters'));
    }

    public function candidate_list_search(Request $request){
        $this->validate($request, [
            'search'=> 'required|max:20'
        ]);

        $lname = $request['search'];

         $candidate = User::where('lname', 'like', '%'.$lname.'%')->get();
        return view('admin.register.candidate_search', compact('candidate'));
    }


    public function admin_result(){
        $party = Party::all();
        $pres = Member::where('position_id',1)->orderBy('party_id','asc')->get();
        $vice = Member::where('position_id',2)->orderBy('party_id','asc')->get();
        $secretary = Member::where('position_id',3)->orderBy('party_id','asc')->get();
        $treasurer = Member::where('position_id',4)->orderBy('party_id','asc')->get();
        $auditor = Member::where('position_id',5)->orderBy('party_id','asc')->get();
        $pio = Member::where('position_id',6)->orderBy('party_id','asc')->get();
        $bus = Member::where('position_id',7)->orderBy('party_id','asc')->get();

        $peace = Member::where('position_id',8)->orderBy('party_id','asc')->get();
        $reps = Member::where('position_id',9)->orderBy('party_id','asc')->get();


        

        
        return view('admin.result.result', compact('pres','vice','secretary','treasurer','auditor','pio','bus','party','peace','reps'));
        
        
    }

    public function admin_result_check(Request $request){
        $this->validate($request, [
            'w_president'   => 'required',
            'w_vice'    => 'required',
            'w_secretary'   => 'required',
            'w_treasurer'    => 'required',
            'w_auditor'     => 'required',
            'w_pio'         => 'required',
            'w_bus'         => 'required',
            'w_peace'       => 'required',
            'w_g7'          => 'required',
            'w_g8'          => 'required',
            'w_g9'          => 'required',
            'w_g10'         => 'required',
            'w_g11'         => 'required',
            'w_g12'          => 'required'
        ]);
        

        $winner = new Result;
        $winner->position = trim($request['president']);
        $winner->candidate = trim($request['w_president']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['vice_president']);
        $winner->candidate = trim($request['w_vice']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['secretary']);
        $winner->candidate = trim($request['w_secretary']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['treasurer']);
        $winner->candidate = trim($request['w_treasurer']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['auditor']);
        $winner->candidate = trim($request['w_auditor']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['pio']);
        $winner->candidate = trim($request['w_pio']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['bus']);
        $winner->candidate = trim($request['w_bus']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['peace']);
        $winner->candidate = trim($request['w_peace']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['president']);
        $winner->candidate = trim($request['w_president']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g7']);
        $winner->candidate = trim($request['w_g7']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g8']);
        $winner->candidate = trim($request['w_g8']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g9']);
        $winner->candidate = trim($request['w_g9']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g10']);
        $winner->candidate = trim($request['w_g10']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g10']);
        $winner->candidate = trim($request['w_g11']);
        $winner->save();

        $winner = new Result;
        $winner->position = trim($request['g12']);
        $winner->candidate = trim($request['w_g12']);
        $winner->save();

        return redirect()->back()->with('ok', 'success');

    }

    public function admin_party_show_candidate($id){
        $voters = Member::where('party_id', $id)->get();
        return view('admin.party.show_party', compact('voters'));
    }

    public function admin_party_list_search(Request $request){
        $search = $request['search'];
        $party = Party::where('name','like', '%'.$search.'%')->get();
        return view('admin.party.search',compact('party','search'));
    }

    public function admin_view_vote_history(){
        $voters =   Vote::select('voters_id')->distinct()->get();
        return view('admin.history.history', compact('voters'));
    }

    public function admin_view_voters_history($id){
        $voted = Vote::where('voters_id', $id)->get();
        return view('admin.history.votes',compact('voted'));
    }

}
