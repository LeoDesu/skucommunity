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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function users($search){
        return User::where('name', 'like', $search == ''? '':"%$search%")->orderBy('name')->get();
    }
}
