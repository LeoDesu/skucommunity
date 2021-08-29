<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowDataController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function showTeaching(Request $request)
    {
        $user = Auth::user();
        return view('shows.show-teaching-info', compact('user'));
    }
    //TODO: every data should be accessible
}
