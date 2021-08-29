<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Major;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InsertDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return redirect('/');
    }

    public function insertSubject(Request $request){
        if(Auth::user()->role != 'admin') return redirect('/');
        Subject::create([
            'name' => $request->name
        ]);
        return redirect('/dashboard');
    }

    public function insertMajor(Request $request){
        if(Auth::user()->role != 'admin') return redirect('/');
        Major::create([
            'name' => $request->name,
            'faculty' => $request->faculty
        ]);
        return redirect('/dashboard');
    }
    
    public function insertClassroom(Request $request){
        if(Auth::user()->role != 'admin') return redirect('/');
        Classroom::create([
            'name' => $request->name,
            'building' => $request->building
        ]);
        return redirect('/dashboard');
    }

    public function insertSchedulePage(Request $request){
        if(Auth::user()->role != 'admin') return redirect('/');
        return view('insertdata.schedule');
    }

    public function insertSchedule(Request $request){
        $role = Auth::user()->role;
        if($role != 'admin' && $role != 'teacher') return redirect('/');
        if(($sch = ScheduleTime::where('from', $request->starttime)->get())->count())
            $endtime = $sch->first()?->to;
        else
            $endtime = '00:00:00';
        $schedule = Schedule::create([
            'date' => $request->date,
            'starttime' => $request->starttime,
            'endtime' => $endtime,
            'classroom_id' => $request->classroom_id,
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id
        ]);
        foreach ($request->major_id as $id) {
            if(!$schedule->majors->contains($id))
                $schedule->majors()->attach($id);
        }
        $schedule = Schedule::find($schedule->id);
        $date = date('Y-m-d', strtotime($request->date));
        foreach($schedule->majors as $major){
            foreach($major->users as $user){
                $user->notifications()->create([
                    'content' => 'ໄດ້ມີຊົ່ວໂມງຮຽນຖືກເພີ່ມເຂົ້າມາໃໝ່ສໍາລັບວັນທີ '.$date,
                    'reference' => '/showschedule/'.$date,
                    'read' => false
                ]);
            }
        }
        return redirect('/dashboard');
    }
}
