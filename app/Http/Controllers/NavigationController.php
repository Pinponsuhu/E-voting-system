<?php

namespace App\Http\Controllers;

use App\Charts\ElectionChart;
use App\Charts\LastElection;
use App\Charts\LastVotePercentage;
use App\Models\Election;
use App\Models\Electorate;
use App\Models\Official;
use App\Models\User;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NavigationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::latest()->first();
        if($election == null){
            $electorate = 0;
        $voters = 0;
        $voted = 0;
        }else{
        $electorate = Electorate::where('election_id', $election->id)->count();
        $voters = Voter::where('election_id', $election->id)->count();
        $voted = Voter::where('election_id', $election->id)->where('status','Voted')->count();
        }
        return view('dashboard', [
            'voted' => $voted,
            'voters' => $voters,
            'electorate' => $electorate,
        ]);
    }

    public function position(){
        return view('position');
    }
    public function voters_list($id){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $voters = Voter::where('election_id',$id)->get();
        return view('voters-list',['voters'=> $voters, 'election' => $id]);
    }
    public function votes_list(){
        return view('votes-list');
    }
    public function official_overview(){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        // dd(auth()->user());
        $user = User::where('user_type', 'Official')->get();
        // dd($user);
        return view('official', [
            'officals' => $user
        ]);
    }

    public function add_official(Request $request){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required',
            'campus' => 'required',
            'faculty' => 'required',
            'phone_number' => 'required|min:11|max:11||unique:officials,phone_number',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:5|unique:users,username'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'user_type' => "Official",
            'password' => Hash::make($request->username. $request->faculty),
        ]);
        Official::create(
            [
                'user_id' => $user->id,
                'name' => $request->name,
                'campus' => $request->campus,
                'assigned_faculty' => $request->faculty,
                'phone_number' => $request->phone_number,
            ]
        );

        return redirect()->route('official_overview')->with('msg',"New Official Add Successfully");
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('login');
    }

    public function official_dashboard(){
        if(auth()->user()->user_type != "Official"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::where('status','Active')->latest()->first();
        return view('official-dashboard', ['election' => $election]);
    }

    public function view_password(){
        return view('change-password');
    }

    public function change_password(Request $request){
        $request->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find(auth()->user()->id);
        $check = Hash::check($request->old_password, $user->password);

        if($check == true){
            User::find(auth()->user()->id)->update(
                [
                    'password' => Hash::make($request->password)
                ]
            );

            auth()->logout();

            return redirect()->route('login');

        }else{
            return back()->with('message', "Old Password Incorrect");
        }
    }

    public function offical_password($id){

        return view('official-password', ['id' => $id]);
    }

    public function update_official(Request $request){
        $request->validate([
            'password' => 'confirmed|min:8|confirmed',
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);

        return redirect('/official');
    }

    public function offish_dash(){
        if(auth()->user()->user_type != "Official"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::latest()->first();
        $electorate = Electorate::where('election_id', $election->id)->count();
        $voters = Voter::where('election_id', $election->id)->count();
        $voted = Voter::where('election_id', $election->id)->where('status','Voted')->count();
        return view('official-login', [
            'voted' => $voted,
            'voters' => $voters,
            'electorate' => $electorate,
        ]);
    }

    public function official_voter_list(){
        if(auth()->user()->user_type != "Official"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::latest()->first();
        $voters = Voter::where('election_id',$election->id)->get();
        return view('official_accreditation',['voters'=> $voters, 'election' => $election->id]);
    }
}
