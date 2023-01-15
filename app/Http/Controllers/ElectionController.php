<?php

namespace App\Http\Controllers;

use App\Charts\ElectionChart;
use App\Charts\LastElection;
use App\Charts\LastVotePercentage;
use App\Models\Election;
use App\Models\Electorate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(LastElection $chart, LastVotePercentage $chart2){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::where('status','Closed')->count();
        // dd($election);

        $election_c = Election::latest()->first();
        if($election != null){
        $presidency = Electorate::where('position','Presidency')->where('election_id', $election_c->id)->get();
        $ojo = Electorate::where('position','Vice Presidency(Ojo)')->where('election_id', $election_c->id)->get();
        $epe = Electorate::where('position','Vice Presidency(Epe)')->where('election_id', $election_c->id)->get();
        $ikeja = Electorate::where('position','Vice Presidency(Ikeja)')->where('election_id', $election_c->id)->get();
        $tresurer = Electorate::where('position','Tresurer')->where('election_id', $election_c->id)->get();
        $gen_sec = Electorate::where('position','Gen. Secretary')->where('election_id', $election_c->id)->get();
        $ass_sec = Electorate::where('position','Ass. Gen. Secretary')->where('election_id', $election_c->id)->get();
        $welfare = Electorate::where('position','Welfare Director')->where('election_id', $election_c->id)->get();
        $social = Electorate::where('position','Social Director')->where('election_id', $election_c->id)->get();
        }else{
            $ojo = null;
            $presidency = null;

        $epe = null;
        $ikeja = null;
        $tresurer =null;
        $gen_sec = null;
        $ass_sec = null;
        $welfare =null;
        $social =null;
        }
        return view('election', [
            'chart' => $chart->build(),
            'chart2' => $chart2->build(),
            'election' => $election,
            'presidency'=> $presidency,
            'ojos' => $ojo,
            'epes' => $epe,
            'ikejas' => $ikeja,
            'tresurers' => $tresurer,
            'gen_secs' => $gen_sec,
            'ass_secs' => $ass_sec,
            'welfares' => $welfare,
            'socials' => $social
    ],
    );
    }

    public function add_new(Request $request){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $today = Carbon::today()->format('Y-m-d');
        // dd($request->election_date);
        $election = $request->validate([
            'election_date' => 'required|date|after_or_equal:' . $today,
            'starting_time' => 'required',
            'closing_time' => 'required'
        ]);

        Election::create($election);

        return redirect()->route('election')->with('msg',"Election has been register successfully");
    }
    public function election_dashboard(){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $elections = Election::latest()->get();
        return view('election-dashboard', ['elections'=> $elections]);
    }

    public function all_election(){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::where('status','Active')->get();
        // dd($election);
    }

    public function election_details($id){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $election = Election::find($id);
        // dd(now());
        $candidates = Electorate::where('election_id',$id)->get();
        return view('election-details',['election' => $election, 'candidates' => $candidates]);
    }

    public function add_candidate(Request $request){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:1024',
            'position' => 'required',
            'fullname' => 'required',
            'faculty' => 'required',
            'department' => 'required',
        ]);

        $dest = 'public/candidate';

        $path = $request->file('image')->store($dest);
        Electorate::create(
            [
               'image' => str_replace('public/candidate/','storage/candidate/',$path),
               'election_id' => $request->id,
               'position' => $request->position,
               'fullname' => $request->fullname,
               'faculty' => $request->faculty,
               'department' => $request->department,
            ]
        );

        return redirect()->back();
    }

    public function toggleDisabled($id){
        if(auth()->user()->user_type != "Admin"){
            auth()->logout();

            return redirect()->route('login');
        }
        $user = User::find($id);

        $user->is_disabled = !$user->is_disabled;

        $user->update();

        return redirect()->back();
    }
}
