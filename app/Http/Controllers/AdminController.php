<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(Request $request){
        if(Auth::user()->role == 'admin'){
            $token = $request->session()->token();
            return view('admin.dashboard', compact('token'));
        }else return abort(403);
    }

    public function userInfo(Request $request){
        if(Auth::user()->role == 'admin'){
            
            return view('admin.dashboard', compact('token'));
        }else return abort(403);
    }

    public function manageTeaching(){
        if(Auth::user()->role == 'admin'){
            return view('admin.manageteaching');
        }else return abort(403);
    }
    public function manageTeachingFor(Request $request){
        if(Auth::user()->role == 'admin'){
            $user = User::find($request->user_id);
            if(!$user->teachsubjects->contains($request->subject_id))
                $user->teachsubjects()->attach($request->subject_id);
            return redirect('/dashboard');
        }else return abort(403);
    }
    public function manageSubjects(){
        if(Auth::user()->role == 'admin'){
            return view('admin.managesubjects');
        }else return abort(403);
    }
    public function manageSubjectsFor(Request $request){
        if(Auth::user()->role == 'admin'){
            $major = Major::find($request->major_id);
            if(!$major->subjects->contains($request->subject_id))
                $major->subjects()->attach([
                    $request->subject_id => [
                        'quota' => $request->quota
                    ]
                ]);
            return redirect('/dashboard');
        }else return abort(403);
    }
}
