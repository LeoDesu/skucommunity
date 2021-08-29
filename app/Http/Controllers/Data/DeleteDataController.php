<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DeleteDataController extends Controller
{
    public function deleteSchedule(Schedule $schedule)
    {
        if($schedule->delete())
            return redirect('/dashboard');
        else return back();
    }
    //TODO: create methods for deleting data
}
