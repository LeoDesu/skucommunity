<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use Illuminate\Http\Request;

class UpdateDataController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin')->only(['editSchedule', 'updateSchedule']);
    }
    public function editSchedule(Schedule $schedule)
    {
        return view('updatedata.edit-schedule', compact('schedule'));
    }
    
    public function updateSchedule(Request $request, Schedule $schedule)
    {
        if(($sch = ScheduleTime::where('from', $request->starttime)->get())->count())
            $endtime = $sch->first()?->to;
        else
            $endtime = '00:00:00';
        $schedule->update([
            'date' => $request->date,
            'starttime' => $request->starttime,
            'endtime' => $endtime,
            'classroom_id' => $request->classroom_id,
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id
        ]);
        foreach($schedule->majors as $major){
            $schedule->majors()->detach($major->id);
        }
        foreach ($request->major_id as $id) {
            $schedule->majors()->attach($id);
        }
        $schedule = Schedule::find($schedule->id);
        $date = date('Y-m-d', strtotime($request->date));
        foreach($schedule->majors as $major){
            foreach($major->users as $user){
                $user->notifications()->create([
                    'content' => 'ໄດ້ມີການແກ້ໄຂຕາລາງຮຽນສໍາລັບວັນທີ '.$date,
                    'reference' => '/showschedule/'.$date,
                    'read' => false
                ]);
            }
        }
        return redirect('/showschedule/'.$schedule->date->format('Y-m-d'));
    }
    
    //TODO: make methods for updating data
}
