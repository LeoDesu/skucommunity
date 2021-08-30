<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Subject;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDataController extends Controller
{
    public function faculties(){
        return response()->json(DB::table('majors')->select('faculty')->distinct()->orderBy('faculty')->get());
    }
    public function majors($faculty){
        return response()->json(Major::where('faculty', $faculty)->orderBy('name')->get());
    }
    public function buildings(){
        return response()->json(DB::table('classrooms')->select('building')->distinct()->orderBy('building')->get());
    }
    public function classrooms($building){
        return response()->json(Classroom::where('building', $building)->orderBy('name')->get());
    }
    public function subjects($major_id){
        if(Major::find($major_id)) return response()->json(Major::find($major_id)->subjects);
        else return abort(404);
    }
    public function teachers($subject_id){
        if(Subject::find($subject_id)) return response()->json(Subject::find($subject_id)->teachers);
        else return abort(404);
    }
    public function user($id){
        return User::find($id);
    }
    public function searchusers($search){
        return User::where('name', 'like', $search == ''? '':"%$search%")->orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function searchteachers($search){
        return User::where('role', 'teacher')->where('name', 'like', $search == ''? '':"%$search%")->orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function searchstudents($search){
        return User::where('role', 'student')->where('name', 'like', $search == ''? '':"%$search%")->orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function allusers(){
        return User::orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function allteachers(){
        return User::where('role', 'teacher')->orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function allstudents(){
        return User::where('role', 'student')->orderBy('name')->get()->each(function($i){
            $i->major = Major::find($i->major_id);
        });
    }
    public function searchsubjects($search){
        return Subject::where('name', 'like', $search == ''? '':"%$search%")->orderBy('name')->get();
    }
}
