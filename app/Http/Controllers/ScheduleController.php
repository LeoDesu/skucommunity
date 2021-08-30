<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller{
    private const DAYS = ['Sun' => 0, 'Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' => 6];
    private const LAODAYS = ['Sun' => 'ອາທິດ', 'Mon' => 'ຈັນ', 'Tue' => 'ຄານ', 'Wed' => 'ພຸດ', 'Thu' => 'ພະຫັດ', 'Fri' => 'ສຸກ', 'Sat' => 'ເສົາ'];
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($date = null){
        $user = Auth::user();
        $update = $user->role === 'admin';
        $major = $user->major->name;
        //setup date for a week to show on schedule
        $days = self::DAYS;
        $laoDays = self::LAODAYS;
        if($date != null)$thisweek = $this->thisweek($date);
        else $thisweek = $this->thisweek(date('Y-m-d'));
        
        $from = $thisweek['Sun'];
        $lastsunday = date('Y-m-d', strtotime($thisweek['Sun'].' last Sunday'));
        $nextsunday = date('Y-m-d', strtotime($thisweek['Sun'].' next Sunday'));

        //setup times to show on schedule
        $times = $this->getTimesIn($thisweek, $user->major);
        $schedules = $this->getWeekScheduleForMajor($user->major, $thisweek, $times);
        return view('shows.ShowWeekSchedule', compact('major', 'schedules', 'times', 'days', 'laoDays', 'thisweek', 'lastsunday', 'nextsunday', 'update'));
    }
    public function showToday($date = '2021-01-05'){
        $times = $this->getTimesIn($date);
        return view('shows.showtodayschedule', compact('times'));
    }
    public function showTeach(){
        $today = date('Y-m-d');
        $timenow = date('H:i:s');
        if($schedules = ($sch = Auth::user()->teachSchedules)->count()
                ? $sch->toQuery()->where('date', '>=', $today)->orderBy('date')->orderBy('starttime')->get()
                : collect())
            return view('shows.showteachschedule', compact('schedules'));
        else return redirect('/');
    }
    public function cancelTeaching($id){
        if(Auth::user()->teachSchedules->find($id)->delete()){
            return true;
        }else{
            return false;
        }
    }
    public function manageSchedulesSelectMajor(Request $request){
        return view('admin.manageschedules-selectmajor', ['token' => $request->session()->token()]);
    }
    public function manageSchedules($major_id){
        if(Auth::user()->role == 'admin'){
            $major = Major::find($major_id);
            $update = true;
            //setup date for a week to show on schedule
            $days = self::DAYS;
            $laoDays = self::LAODAYS;$thisweek = $this->thisweek(date('Y-m-d'));
            
            $from = $thisweek['Sun'];
            $lastsunday = date('Y-m-d', strtotime($thisweek['Sun'].' last Sunday'));
            $nextsunday = date('Y-m-d', strtotime($thisweek['Sun'].' next Sunday'));

            //setup times to show on schedule
            $times = $this->getTimesIn($thisweek, $major);
            $schedules = $this->getWeekScheduleForMajor($major, $thisweek, $times);
            return view('admin.manageschedules', compact('major', 'schedules', 'times', 'days', 'laoDays', 'thisweek', 'lastsunday', 'nextsunday', 'update'));
        }else return abort(403);
    }

    public function manageSchedulesDate($major_id, $date){
        if(Auth::user()->role == 'admin'){
            $major = Major::find($major_id);
            //setup date for a week to show on schedule
            $days = self::DAYS;
            $laoDays = self::LAODAYS;
            $thisweek = $this->thisweek($date);
            
            $from = $thisweek['Sun'];
            $lastsunday = date('Y-m-d', strtotime($thisweek['Sun'].' last Sunday'));
            $nextsunday = date('Y-m-d', strtotime($thisweek['Sun'].' next Sunday'));

            //setup times to show on schedule
            $times = $this->getTimesIn($thisweek, $major);
            $schedules = $this->getWeekScheduleForMajor($major, $thisweek, $times);
            return view('admin.manageschedules', compact('major', 'schedules', 'times', 'days', 'laoDays', 'thisweek', 'lastsunday', 'nextsunday'));
        }else return abort(403);
    }
    /**
     * get schedules in a week for the major given user's in
     * @param App\Models\User $user
     * @param array $week associative array of [day => date]
     * @param array $times 2 dimensional array [['starttime' => time, 'endtime' => time]]
     * @return array $schedules 3 dimensional associative array with keys [day][starttime][endtime]
     */
    private function getWeekScheduleForMajor($major, $week, $times){
        $days = self::DAYS;
        $schedules = [];
        foreach ($week as $day => $date) {
            foreach ($times as $time) {
                $starttime = $time['starttime'];
                $endtime = $time['endtime'];
                if($schedule = ($sch = $major->schedules)->count()
                        ? $sch->toQuery()->where('date', $date)->where('starttime', $starttime)->where('endtime', $endtime)->first()
                        : '')
                    $schedules[$day][$starttime][$endtime] = $schedule;
            }
        }
        return $schedules;
    }
    /**
     * get times in Schedule model date is matched
     * @param array $week associative array of [day => date]
     * @param App\Models\Major $major
     * @return array [['starttime' => time, 'endtime' => time]]
     */
    private function getTimesIn($week, Major $major = null){
        $times = [];
        $starttimes = [];
        $endtimes = [];
        foreach($week as $date){
            if(!$major) $schedules = Schedule::where('date', $date)->orderBy('starttime')->get();
            else {
                $schedules = $major->schedules;
                if($schedules->count() > 0) $schedules = $schedules->toQuery()->where('date', $date)->orderBy('starttime')->get();
            }
            foreach($schedules as $key => $i){
                if(!in_array($i->starttime, $starttimes) && !in_array($i->endtime, $endtimes)){
                    array_push($starttimes, $i->starttime);
                    array_push($endtimes, $i->endtime);
                }
            }
        }
        asort($starttimes);
        foreach($starttimes as $key => $starttime){
            $times[$key] = ['starttime' => $starttime, 'endtime' => $endtimes[$key]];
        }
        return $times;
    }
    /**
     * get date for each day of the week
     * @param string $date
     * @return array [day => date]
     */
    private function thisweek($date){
        $days = self::DAYS;
        $thisweek = [];
        $today = date('D', strtotime($date));
        foreach ($days as $day => $value) {
            if($value < $days[$today]){
                $thisweek[$day] = date('Y-m-d', strtotime($date." last ".$day));
            }else{
                $thisweek[$day] = date('Y-m-d', strtotime($date." this ".$day));
            }
        }
        return $thisweek;
    }
    /**
     * copy the existing Schedule to another date
     * @param App\Models\Schedule $schedule
     * @param string $date string of date in format of yyyy-mm-dd
     * @return App\Models\Schedule created Schedule
     */
    public static function copySchedule(Schedule $schedule, string $date){
        $newSchedule = Schedule::create([
            'date' => $date,
            'starttime' => $schedule->starttime,
            'endtime' => $schedule->endtime,
            'classroom_id' => $schedule->classroom_id,
            'user_id' => $schedule->user_id,
            'subject_id' => $schedule->subject_id
        ]);
        foreach($schedule->majors as $major){
            $newSchedule->majors()->attach($major);
        }
        return $newSchedule;
    }
}
