<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }



    public function process(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($request->only('username','password'))){
            // dd(auth()->user()->user_type);
            if (auth()->user()->user_type == 'Admin') {
                return redirect('/');
            } else {
                return redirect('/official/dashboard');
            }

        }else{
            return back()->with('message', 'Invalid Login Credentails');
        }
    }
}
