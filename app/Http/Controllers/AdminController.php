<?php

namespace App\Http\Controllers;

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
        }else return redirect('/');
    }
    public function manageTeaching(){
        if(Auth::user()->role == 'admin'){
            return view('admin.manageteaching');
        }else return redirect('/');
    }
}
