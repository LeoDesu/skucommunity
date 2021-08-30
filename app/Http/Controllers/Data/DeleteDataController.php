<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteDataController extends Controller
{
    public function deleteSchedule(Schedule $schedule)
    {
        if($schedule->delete())
            return redirect('/dashboard');
        else return back();
    }
    public function deleteUser(User $user)
    {
        if($user->delete())
            return redirect('/userinfo');
        else return back();
    }
    public function deleteSubject(Subject $subject)
    {
        if($subject->delete())
            return redirect('/subjectinfos');
        else return back();
    }public function deleteClassroom(Classroom $classroom)
    {
        if($classroom->delete())
            return redirect('/classroominfos');
        else return back();
    }
    //TODO: create methods for deleting data
}
