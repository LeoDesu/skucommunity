<?php

namespace App\Http\Controllers;

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
        // $roles = [
        //     ['admin', 'all', 'all', 1],
        //     ['student', 'wrote', 'none', 0],
        //     ['teacher', 'wrote', 'empty', 0],
        // ];
        // foreach($roles as $i){
        //     Role::create(['role' => $i[0], 'manage_blogs' => $i[1], 'manage_schedules' => $i[2], 'manage_user_data' => $i[3]]);
        // }

        // $majors = [
        //     ['BIT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
        //     ['BNT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
        //     ['BMT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
        // ];
        // foreach ($majors as $i) {
        //     Major::create(['name' => $i[0], 'faculty' => $i[1]]);
        // }
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
        if(count(ScheduleTime::where('from', $request->starttime)->get()))
            $endtime = ScheduleTime::where('from', $request->starttime)->get()[0]->to;
        else
            $endtime = '00:00:00';
        Schedule::create([
            'date' => $request->date,
            'starttime' => $request->starttime,
            'endtime' => $endtime,
            'classroom_id' => $request->classroom_id,
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id
        ]);
        $schedule = Schedule::where('date', $request->date)->where('starttime', $request->starttime)->where('user_id', $request->user_id)->first();
        foreach ($request->major_id as $id) {
            if(!$schedule->majors->contains($id))
                $schedule->majors()->attach($id);
        }
        return redirect('/dashboard');
    }
}
