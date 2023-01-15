<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Election;
use App\Models\Electorate;
use App\Models\Official;
use App\Models\Voter;
use App\Models\VotingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VotersController extends Controller
{
    public function accreditate_voters(Request $request){
        $request->validate([
            'matric_number' => 'required|size:9|unique:voters,matric_no',
            'email' => 'required|unique:voters,email,'
        ]);
        $token = rand(000000,9999999);
        Voter::create([
            'pin' => $token,
            'election_id' => $request->id,
            'email' => $request->email,
            'matric_no' => $request->matric_number,
        ]);
        Mail::to($request->email)->send(new ResetPasswordMail($request->matric_number, $token));

        return redirect()->back();
    }
    public function votersPage(Request $request){
        $request->validate([
            'pin' => 'required|size:7',
            'matric_number' => 'required|size:9'
        ]);
        $voter = Voter::where('matric_no',$request->matric_number)->where('status','Not Voted')->where('pin',$request->pin)->first();
        if($voter == null){
            return back()->with('message', 'Check email for PIN and make sure matric number is correct');
        }

        $election = Election::where('status', 'Active')->latest()->first();
        if($election == null){
            return back()->with('message', 'No active election');
        }
        // dd($election);

        $check_voted = VotingHistory::where('matric_number',$request->matric_number)->where('election_id',$election->id)->count();
       if($check_voted <= 0){
        return redirect('/voting/' . $request->matric_number . '/' . $request->pin);
       }
       return back()->with('message', 'User has already voted');

    }

    public function voting_view($matric_number, $pin){
        // dd($matric_number);
        $presidency = Electorate::where('position','Presidency')->get();
        $ojo = Electorate::where('position','Vice Presidency(Ojo)')->get();
        $epe = Electorate::where('position','Vice Presidency(Epe)')->get();
        $ikeja = Electorate::where('position','Vice Presidency(Ikeja)')->get();
        $tresurer = Electorate::where('position','Tresurer')->get();
        $gen_sec = Electorate::where('position','Gen. Secretary')->get();
        $ass_sec = Electorate::where('position','Ass. Gen. Secretary')->get();
        $welfare = Electorate::where('position','Welfare Director')->get();
        $social = Electorate::where('position','Social Director')->get();

        // dd($tresurer);
        return view('voting', [
            'presidency'=> $presidency,
            'ojos' => $ojo,
            'epes' => $epe,
            'ikejas' => $ikeja,
            'tresurers' => $tresurer,
            'gen_secs' => $gen_sec,
            'ass_secs' => $ass_sec,
            'welfares' => $welfare,
            'socials' => $social,
            'matric_number' => $matric_number,
            'pin' => $pin,
        ]);
    }

    public function voting(Request $request){
        // dd($request->all());

        $request->validate([
            'Presidency' => 'required',
            'ojo' => 'nullable',
            'epe' => 'nullable',
            'ikeja' => 'nullable',
            'Tresurer' => 'required',
            'Gen__Secretary' => 'required',
            'Ass__Gen__Secretary' => 'required',
            'Welfare_Director' => 'required',
            'Social_Director' => 'required',
        ]);

        $otherInfo = Official::where('user_id',auth()->user()->id)->first();

        if($otherInfo->campus == 'Ojo' && $request->ojo == null){
            return back()->with('ojo', 'Vice presidency has candidate has not been selected');
        }
        if($otherInfo->campus == 'Epe' && $request->epe == null){
            return back()->with('epe', 'Vice presidency has candidate has not been selected');
        }
        if($otherInfo->campus == 'Ikeja' && $request->ikeja == null){
            return back()->with('ikeja', 'Vice presidency has candidate has not been selected');
        }
        // dd($request->all());

        $election = Election::where('status','Active')->first();
        // dd($election);

        $other_info = Official::where('user_id',auth()->user()->id)->first();

        // dd($request->pin);
        VotingHistory::create([
            'presidency' => $request->Presidency,
            'ojo' => $request->ojo,
            'epe' => $request->epe,
            'ikeja' => $request->ikeja,
            'tresurer' => $request->Tresurer,
            'gen_sec' => $request->Gen__Secretary,
            'ass_gen_sec' => $request->Ass__Gen__Secretary,
            'welfare' => $request->Welfare_Director,
            'social' => $request->Social_Director,
            'matric_number' => $request->matric_number,
            'faculty' => $other_info->assigned_faculty,
            'campus' => $other_info->campus,
            'election_id' => $election->id,
        ]);

        $voting = Voter::where('election_id', $election->id)->where('matric_no', $request->matric_number)->first();
        $voting->status = "Voted";
        $voting->update();

        return redirect()->route('official_dashboard');
    }
}
