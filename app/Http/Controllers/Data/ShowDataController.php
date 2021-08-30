<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Subject;
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
    public function showSubjects()
    {
        $subjects = Subject::orderBy('name', 'desc')->get();
        return view('shows.subjectinfos', compact('subjects'));
    }
    public function showClassrooms()
    {
        $classrooms = Classroom::orderBy('name')->orderBy('building', 'desc')->get();
        return view('shows.classroominfos', compact('classrooms'));
    }
    //TODO: every data should be accessible
}
